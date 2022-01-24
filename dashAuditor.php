<?php
if (!defined('permit')) {
	exit('<br><br><br><h1>Error 404</h1><h2>Object not found!</h2>');
}

if (@$_SESSION['admin'] != "auditor") {
	?><script>window.location = '<?php echo root; ?>';</script><?php
}
?>
<h3 class="center">Auditor Dashboard</h3>
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
						<tbody id="othersUpldCrs"></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="" id="excel_data" style="height: 435px; background-color: rgba(0,0,0,0.1); overflow-y:scroll;"></div><br>

			<div class="btn-3 center">
				<button class="btn btn-primary form-control" onclick="tgglPopUp();">Upload Result</button>
			</div>
		</div>
		<div class="col-md-3">
			<div style="height: 435px; background-color: rgba(0,0,0,0.1); padding: 20px;">
				<h5 class="center">Feedback</h5>
				<form id="updUpldFrmm">
					<input type="hidden" name="courseTitle" id="courseTitle">
					<select name="statuss" id="statuss" class="form-control" required>
						<option value=""> -- select feedback --</option>
						<option value="Approve">Approve</option>
						<option value="Reject">Reject</option>
					</select><br>

					<textarea name="commentt" id="commentt" class="form-control" required placeholder="Write your comments here..."></textarea><br>

					<input type="submit" value="Submit" class="btn btn-primary form-control">
				</form>
			</div><br>

			<a class="btn btn-primary form-control" href="<?php echo root; ?>out"></i> Log out</a>
		</div>
	</div>