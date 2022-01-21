<?php
if (!defined('permit')) {
	exit('<br><br><br><h1>Error 404</h1><h2>Object not found!</h2>');
}

if (@$_SESSION['admin'] != "admin") {
	?><script>window.location = '<?php echo root; ?>';</script><?php
}

if (isset($_POST['editUser'])) {
    $stfEml = protect::check($conn, $_POST['edUemail']);
    $gs = crud::select('user', "WHERE email='$stfEml'", $conn);
    $grow = mysqli_fetch_array($gs);
}
?>
	<!--Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <!-- <a class="navbar-brand" href="home" style="color: blue;">Young_<span style="color:red;">AB</span></a> -->
        
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo root; ?>admin"></i> Examiner</a>
            </li>

          <li class="nav-item">
            <a class="nav-link active" href="<?php echo root; ?>panelau"></i> Auditor</a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="<?php echo root; ?>paneleo"></i> Exam Officer</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo root; ?>out"></i> Log out</a>
          </li>
        </ul>
    </div>
</nav>
<!--/.Navbar -->

<form id="addUser">
	<div class="row" style="margin-top: 100px; padding-left: 10px;">
		<div class="col-md-3">
			<input class="form-control" type="email" name="newUemail" id="email" placeholder="email" required <?php if (!empty($grow['email'])) { echo 'value="'.$grow['email'].'"'; } ?>>
		</div>
		<div class="col-md-3">
			<input class="form-control" type="password" name="password" id="password" placeholder="password" required>
		</div>
		<div class="col-md-3">
			<select class="form-control" name="dep" required>
				<option value=""> -- select department -- </option>
				<?php
				$q = crud::select('department', "ORDER BY depname ASC", $conn);
				while ($rr = mysqli_fetch_array($q)) { ?>
					<option value="<?php echo $rr[0]; ?>" <?php if (!empty($grow['dep']) && ($grow['dep'] == $rr[0])) { echo 'selected'; } ?>><?php echo $rr[1]; ?></option>
				<?php } ?>
			</select>
		</div>
		<input type="hidden" name="role" value="auditor">
		<div class="col-md-3">
			<input type="submit" name="login" class="btn btn-primary">
		</div>
	</div>
</form>
<br>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>S/N</th>
				<th>email</th>
				<th>department</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody id="allAuditor"></tbody>
	</table>
</div>
