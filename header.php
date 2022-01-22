<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlockChain</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo root; ?>bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <!-- Font_awesome CSS -->
    <link rel="stylesheet" href="<?php echo root; ?>font_awesome/fontawesome-4.3.0.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo root; ?>css/style.css">
</head>
<body>

<div id="mypopUp" style="width: 100%; height: 100vh; position: fixed; top:0; left:0; z-index: 99999; display: none; padding: 20px; background-color: rgba(0,0,0,0.8);">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 center" style="margin-top: 10%; background-color: white; padding: 30px;">
            <form id="uploadResltFrm" enctype="multipart/form-data">
                <input type="hidden" name="uType" value="<?php echo @$_SESSION['admin']; ?>">
                <input type="hidden" name="dep" value="<?php echo @$_SESSION['dep']; ?>">

                <select name="course" class="form-control" required>
                    <option value="">-- select course --</option>
                    <?php
                    $eml = $_SESSION['email'];
                    $q = crud::select('user', "WHERE email='$eml'", $conn);
                    $r = mysqli_fetch_array($q);
                    $crs = explode(',', $r['course']);
                    foreach ($crs as $course) {
                        ?><option value="<?php echo $course; ?>"><?php echo $course; ?></option><?php
                    }
                    ?>
                </select><br>

                <input type="file" name="filename" id="filename" class="form-control" required onchange="valImg();"><br>

                <input type="submit" value="Upload" class="btn btn-primary"> &nbsp; 
                <input type="button" value="Close" class="btn btn-danger" onclick="closePopUp();">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>