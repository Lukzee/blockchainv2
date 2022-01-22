<?php
if (!defined('permit')) {
	exit('<br><br><br><h1>Error 404</h1><h2>Object not found!</h2>');
}

if (@$_SESSION['admin'] != "examiner") {
	?><script>window.location = '<?php echo root; ?>';</script><?php
}
?>
	<h3 class="center">Examiner Dashboard</h3>
	<div class="row" style="padding: 20px">
		<div class="col-md-3">
			<div style="height: 500px; background-color: rgba(0,0,0,0.1); overflow-y:scroll;">
				<h4 class="center">All Uploaded Results</h4>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th style="width: 2%;">S/N</th>
								<th style="width: 40%;">Course</th>
								<th style="width: 58%;">Department</th>
							</tr>
						</thead>
						<tbody id="exUpldCrs"></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="body" style="height: 435px; background-color: rgba(0,0,0,0.1);"></div><br>

			<div class="btn-3 center">
				<button class="btn btn-primary form-control" onclick="tgglPopUp();">Upload Result</button>
			</div>
		</div>
		<div class="col-md-3">
			<div style="height: 435px; background-color: rgba(0,0,0,0.1);"></div><br>

			<a class="btn btn-primary form-control" href="<?php echo root; ?>out"></i> Log out</a>
		</div>
	</div>