<?php
if (!defined('permit')) {
	exit('<br><br><br><h1>Error 404</h1><h2>Object not found!</h2>');
}

if (@$_SESSION['admin'] != "auditor") {
	?><script>window.location = '<?php echo root; ?>';</script><?php
}
?>
<a class="nav-link" href="<?php echo root; ?>out"></i> Log out</a>
		<div class="row">
        	<div class="col-md-4">
        		<div class="leftpane" style="overflow-y: auto; overflow-x: auto;white-space: nowrap; height: 500px; background-color: rgba(0,0,0,0.1)";>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
				</div>
			</div>
			<div class="col-md-4">
				<div class="mainwindow" style="overflow-y: auto; overflow-x: auto;white-space: nowrap; height: 500px; background-color: rgba(0,0,0,0.1)";>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        			<h6>score sheet</h6>
        		</div>
        	</div>
        	<div class="col-md-4">
				<div class="mainwindow" style="overflow-y: auto; overflow-x: auto;white-space: nowrap; height: 500px; background-color: rgba(0,0,0,0.1)";>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						<h6>score sheet</h6>
						
				</div>
        	</div>
      
			<div class="col-md-4">
					<br>
				<input class="form-control" type="number" name="regNo" id="regNo" placeholder="Registration Number">
			</div>
			<div class="col-md-4">
					<br>
				<input class="form-control" type="number" name="score" id="score" placeholder="Score">
			</div>
			<div class="col-md-4">
					<br>
				<button class="btn btn-primary form-control">Update</button>
			</div>
			<div class="col-md-4">
					<br>
				<input class="form-control" type="text" name="name" id="name" placeholder="Name">
			</div>
		</div>
