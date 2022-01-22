<?php
require_once 'connection.php';
require_once 'path.php';
require_once 'class/crud_class.php';
require_once 'class/dprot_class.php';

// sign in
if(isset($_POST['email'])){
    $email = protect::check($conn, $_POST['email']);
    $pass = md5(protect::check($conn, $_POST['password']));
    $utype = protect::check($conn, $_POST['role']);
    
    $ar = "WHERE email= '$email' AND password='$pass' AND role='$utype'";
    
    $qu = crud::select('user', $ar, $conn);
    if (mysqli_num_rows($qu) == 1) {
        $rw = mysqli_fetch_array($qu);

        $_SESSION['admin'] = $rw['role'];
        $_SESSION['dep'] = $rw['dep'];
        $_SESSION['email'] = $rw['email'];
        echo $rw['role'];
        
    } else {
        echo 'incorrect email or password';
    }
}

//add new user
if (isset($_POST['newUemail'])) {
    $newUemail = @protect::check($conn, $_POST['newUemail']);
    $password = @md5(protect::check($conn, $_POST['password']));
    $dep = @protect::check($conn, $_POST['dep']);
    $course = @protect::check($conn, $_POST['course']);
    $role = @protect::check($conn, $_POST['role']);

    if (!empty($newUemail) && !empty($password) && !empty($role)) {
        $args1 = "WHERE email='$newUemail'";
        $q = crud::select('user', $args1, $conn);

        if (mysqli_num_rows($q) == 0) {
            # new item
            $args = "email='$newUemail',password='$password',role='$role',dep='$dep',course='$course'";
            if (crud::insert('user', $args, $conn)) {
                echo 'Saved';
            } else {
                echo 'error occur!';
            }
        } else {
            # update item
            $args = "password='$password',role='$role',dep='$dep',course='$course' WHERE email='$newUemail'";
            if (crud::update('user', $args, $conn)) {
                echo 'Updated';
            } else {
                echo 'error occur!';
            }
        }
    }
}

# get all items
if (isset($_POST['reqtype'])) {
    if ($_POST['reqtype'] == 'getExaminer') {
        $role = 'examiner';
        $urll = 'admin';
    } elseif ($_POST['reqtype'] == 'getAuditor') {
        $role = 'auditor';
        $urll = 'panelau';
    } elseif ($_POST['reqtype'] == 'getExamOfficer') {
        $role = 'exam-officer';
        $urll = 'paneleo';
    }

    $q = crud::select('user', "WHERE role='$role' ORDER BY id ASC", $conn);
    $i=0;
    while ($r = mysqli_fetch_array($q)) {
        $i++;
        $depID = $r['dep'];
        $depq = crud::select('department', "WHERE id='$depID'", $conn);
        $mydep = mysqli_fetch_array($depq);
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $mydep['depName']; ?></td>
            <?php if ($role == 'examiner') { ?>
            <td><?php echo $r['course'] ?></td>
            <?php } ?>
            <td>
                <form action="<?php echo root . $urll; ?>" method="POST">
                    <input type="hidden" name="edUemail" value="<?php echo $r['email'] ?>">

                    <input type="submit" name="editUser" value="Edit" class="btn-primary">

                    &nbsp; 
                    <input type="button" value="Delete" class="btn-danger" onclick="dellstud('<?php echo $r['email'] ?>', '<?php echo $r['email']; ?>', 'user', 'email');">
                </form>
            </td>
        </tr>
        <?php
    }
}

# delete record
if (isset($_POST['dl_Studt'])) {
    $studnt_ID = protect::check($conn, $_POST['studnt_ID']);
    $table = protect::check($conn, $_POST['table']);
    $clmn = protect::check($conn, $_POST['clmn']);

    if (!empty($studnt_ID)) {
        crud::del($table, $clmn."='$studnt_ID'", $conn);
    }
}

# upload result
if (isset($_POST['uType'])) {
    $uType = protect::check($conn, $_POST['uType']);
    $course = protect::check($conn, $_POST['course']);
    $dep = protect::check($conn, $_POST['dep']);
    if($_FILES["filename"]["name"] != '') {
        $test = explode('.', $_FILES["filename"]["name"]);
        $ext = end($test);
        $name = rand(100, 999) . '.' . $ext;
        $location = 'upload/' . $name;
        if (move_uploaded_file($_FILES["filename"]["tmp_name"], $location)) {
            if($uType == 'examiner') {
                # check existing record
                $arg = "WHERE course='$course'";
                $q = crud::select('records', $arg, $conn);
                if (mysqli_num_rows($q) == 0) {
                    # insert
                    $examnounce = rand(100, 999);
                    $examphash = '000000000000000000000';
                    $examnhash = md5(md5_file($location). $examnounce);
                    if (crud::insert('records', "course='$course', dep='$dep', uType='$uType', filename='$name', nounce='$examnounce', phash='$examphash', nhash='$examnhash', status='Approve', comments=''", $conn)) {
                        $audnounce = $examnounce*2;
                        $audnhash = md5(md5_file($location). $audnounce);
                        if (crud::insert('records', "course='$course', dep='$dep', uType='auditor', filename='$name', nounce='$audnounce', phash='$examnhash', nhash='$audnhash', status='Approve', comments=''", $conn)) {
                            $eonounce = $audnounce*2;
                            $eonhash = md5(md5_file($location). $eonounce);
                            if (crud::insert('records', "course='$course', dep='$dep', uType='exam-officer', filename='$name', nounce='$eonounce', phash='$audnhash', nhash='$eonhash', status='Approve', comments=''", $conn)) {
                                echo 'Uploaded successfully...';
                            }
                        }
                    }
                } else {
                    # update
                    $examnounce = rand(100, 999);
                    $examphash = '000000000000000000000';
                    $examnhash = md5(md5_file($location). $examnounce);
                    if (crud::update('records', "filename='$name', nounce='$examnounce', phash='$examphash', nhash='$examnhash', status='Approve', comments='' WHERE course='$course' AND uType='$uType' AND dep='$dep'", $conn)) {
                        $audnounce = $examnounce*2;
                        $audnhash = md5(md5_file($location). $audnounce);
                        if (crud::update('records', "filename='$name', nounce='$audnounce', phash='$examnhash', nhash='$audnhash', status='Approve', comments='' WHERE course='$course' AND uType='auditor' AND dep='$dep'", $conn)) {
                            $eonounce = $audnounce*2;
                            $eonhash = md5(md5_file($location). $eonounce);
                            if (crud::update('records', "filename='$name', nounce='$eonounce', phash='$audnhash', nhash='$eonhash', status='Approve', comments='' WHERE course='$course' AND uType='exam-officer' AND dep='$dep'", $conn)) {
                                echo 'Updated successfully...';
                            }
                        }
                    }
                }
            } else {
                # update
                $q1 = crud::select('records', "WHERE course='$course' AND uType='$uType' AND dep='$dep'", $conn);
                $r1 = mysqli_fetch_array($q1);
                $dnounce = $r1['nounce'];
                $dnhash = md5(md5_file($location). $dnounce);

                if (crud::update('records', "filename='$name', nhash='$dnhash' WHERE course='$course' AND uType='$uType' AND dep='$dep'", $conn)) {
                    echo 'Updated successfully...';
                }
            }
        }
    }
}

# fetch request
if (isset($_POST['request']) && $_POST['request'] == 'getexUpldCrs') {
    
    $uReqq = protect::check($conn, $_POST['spec']);
    $dep = @$_SESSION['dep'];
    $uType = @$_SESSION['admin'];
    if ($uReqq == 'examiner') {
        $eml = $_SESSION['email'];
        $q = crud::select('user', "WHERE email='$eml'", $conn);
        $r = mysqli_fetch_array($q);
        $spec = $r['course'];

        $crs = explode(',', $spec);
        foreach ($crs as $course) {
            $q = crud::select('records', "WHERE course='$course' AND dep='$dep' AND uType='$uType' ORDER BY course ASC", $conn);
            $i=0;
            while ($rr = mysqli_fetch_array($q)) {
                $i++;
                $depId = $rr['dep'];
                $q2 = crud::select('department', "WHERE id='$depId'", $conn);
                $r2 = mysqli_fetch_array($q2);
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rr['course']; ?></td>
                    <td><?php echo $r2['depName']; ?></td>
                </tr>
                <?php
            }
        }
    } else {
        $q = crud::select('records', "WHERE dep='$dep' AND uType='$uType' ORDER BY course ASC", $conn);
        $i=0;
        while ($rr = mysqli_fetch_array($q)) {
            $i++;
            $depId = $rr['dep'];
            $q2 = crud::select('department', "WHERE id='$depId'", $conn);
            $r2 = mysqli_fetch_array($q2);
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rr['course']; ?></td>
                <td><?php echo $r2['depName']; ?></td>
            </tr>
            <?php
        }
    }
}

?>