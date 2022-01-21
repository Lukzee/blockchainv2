<?php
if (!defined('permit')) {
	exit('<br><br><br><h1>Error 404</h1><h2>Object not found!</h2>');
}

if (@$_SESSION['admin'] != "exam-officer") {
	?><script>window.location = '<?php echo root; ?>';</script><?php
}
?>
<a class="nav-link" href="<?php echo root; ?>out"></i> Log out</a>
	<div class="row">
        	<div class="col-md-4">
        		<div class="leftpane">
			<label>Score cancel &nbsp;&nbsp;&nbsp;<input class="checkbox" type="checkbox" name="password" id="password"></input></label>
			<br>
			<label>Score course &nbsp;&nbsp;&nbsp;<input class="checkbox" type="checkbox" name="password" id="password"></input></label>
		</div>
		<select class="form-control">
 					<option value="">--department--</option>
 					<option value="admin">Computer science</option>
 					<option value="examiner">SLT</option>
 					<option value="auditor">Business admin</option>
 				</select>
 				<br>
 		<button class="btn btn-primary">Correct</button>
 		<br>
 		<br>
 		<h3>LIST OF STUDENTS</h3>
 		<div class="loS" style="height: 400px; background-color: rgba(0,0,0,0.1);">
 		</div>
        	</div>
        	<div class="col-md-4">
        		<div class="viewpane" style="overflow-y: auto; overflow-x: auto; white-space: nowrap; height: 580px; background-color: rgba(0,0,0,0.1);">
        			<ol>
        			<l1><h6>EZEKIEL JEREMIAH</h6></l1>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        			<h6>EZEKIEL JEREMIAH</h6>
        		</ol>
        		</div>
        		<br>
        		<button class="btn btn-success">Save</button>
        			<button class="btn btn-primary">Update</button>
        	</div>
        	<div class="col-md-4">
        		<div class="rightpane">
        		<button class="btn btn-primary form-control" style="margin-top: 10%;">Save to data</button>
        	</div>
        	</div>
        </div>