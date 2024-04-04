<?php include 'server/server.php' ?>
<?php
if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] == 'staff') {
		$off_q = "SELECT *,tblofficials.id as id, tblchairmanship.id as chair_id FROM tblofficials JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY `status` = 'Active' DESC ";
	} else {
		$off_q = "SELECT *,tblofficials.id as id, tblchairmanship.id as chair_id FROM tblofficials JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship ORDER BY `status` = 'Active' DESC ";
	}
} else {
	$off_q = "SELECT *,tblofficials.id as id, tblchairmanship.id as chair_id, abc FROM tblofficials JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY `status` = 'Active' DESC ";
}

$res_o = $conn->query($off_q);

$official = array();
while ($row = $res_o->fetch_assoc()) {
	$official[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'templates/header.php' ?>
	<title>Projects - Bidding Management System</title>
</head>

<body>
	<?php include 'templates/loading_screen.php' ?>

	<div class="wrapper">
		<!-- Main Header -->
		<?php include 'templates/main-header.php' ?>
		<!-- End Main Header -->

		<!-- Sidebar -->
		<?php include 'templates/sidebar.php' ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white fw-bold">Bidding Projects</h2>
							</div>
							<div class="ml-md-auto">
								<h2 class="text-white" id="realtime-clock"></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner">
					<?php if (isset($_SESSION['message'])) : ?>
						<div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success'] == 'danger' ? 'bg-danger text-light' : null ?>" role="alert">
							<?php echo $_SESSION['message']; ?>
						</div>
						<?php unset($_SESSION['message']); ?>
					<?php endif ?>
					<div class="row mt--2">

						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-wrap pb-2 justify-content-between">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100">
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<h2 class="fw-bold mt-3"><?= ucwords($brgy) ?></h2>
											<h4 class="fw-bold mt-3"><i><?= ucwords($town) ?></i></h4>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<img src="assets/img/brgy-logo.png" class="img-fluid" width="100" style="visibility:hidden;">
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Upcoming/Bidded Projects</div>
										<?php if (isset($_SESSION['username'])) : ?>
											<div class="card-tools">
												<a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
													<i class="fa fa-plus"></i>
													Project
												</a>
											</div>
										<?php endif ?>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th scope="col">Project Name</th>
													<th scope="col">Bidding Project Category</th>
													<th>Approved Budget Contract</th>
													<?php if (isset($_SESSION['username'])) : ?>
														<?php if ($_SESSION['role'] == 'administrator') : ?>
															<th>Status</th>
														<?php endif ?>
														<th>Action</th>
													<?php endif ?>
												</tr>
											</thead>
											<tbody>
												<?php if (!empty($official)) : ?>
													<?php foreach ($official as $row) : ?>
														<tr>
															<td class="text-uppercase"><?= $row['name'] ?></td>
															<td><?= $row['title'] ?></td>
															<th><?= number_format($row['abc']) . ' pesos' ?></th>
															<?php if (isset($_SESSION['username'])) : ?>
																<?php if ($_SESSION['role'] == 'administrator') : ?>
																	<td><?= $row['status'] == 'Active' ? '<span class="badge badge-primary">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?></td>
																<?php endif ?>
																<td>
																	<a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" title="Edit Position" onclick="editOfficial(this)" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-budget="<?= $row['abc'] ?>" data-chair="<?= $row['chair_id'] ?>" data-start="<?= $row['termstart'] ?>" data-end="<?= $row['termend'] ?>" data-status="<?= $row['status'] ?>">
																		<i class="fa fa-edit"></i>
																	</a>
																	<?php if ($_SESSION['role'] == 'administrator') : ?>
																		<a type="button" data-toggle="tooltip" href="model/remove_project.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this official?');" class="btn btn-link btn-danger" data-original-title="Remove">
																			<i class="fa fa-times"></i>
																		</a>
																	<?php endif ?>
																</td>
															<?php endif ?>
														</tr>
													<?php endforeach ?>
												<?php else : ?>
													<tr>
														<td colspan="3" class="text-center">No Available Data</td>
													</tr>
												<?php endif ?>
											</tbody>
											<tfoot>
												<tr>
													<th scope="col">Project Name</th>
													<th scope="col">Bidding Project Category</th>
													<th>Approved Budget Contract</th>
													<?php if (isset($_SESSION['username'])) : ?>
														<?php if ($_SESSION['role'] == 'administrator') : ?>
															<th>Status</th>
														<?php endif ?>
														<th>Action</th>
													<?php endif ?>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="model/save_project.php">
								<div class="form-group">
									<label>Project Name</label>
									<input type="text" class="form-control" placeholder="Enter Project Name" name="name" required>
								</div>
								<div class="form-group">
									<label>Project Category</label>
									<select class="form-control" id="pillSelect" required name="chair">
										<option disabled selected>Select Bidding Project Category</option>
										<?php foreach ($chair as $row) : ?>
											<option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label>Approved Budget for Contract</label>
									<input type="number" class="form-control" placeholder="Enter Approved Budget" name="budget" required>
								</div>
								<div class="form-group">
									<label>Start of Bidding</label>
									<input type="date" class="form-control" name="start" required>
								</div>
								<div class="form-group">
									<label>End of Bidding</label>
									<input type="date" class="form-control" name="end" required>
								</div>

						</div>
						<div class="modal-footer">
							<input type="hidden" id="pos_id" name="id">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="model/edit_project.php">
								<div class="form-group">
									<label>Project Name</label>
									<input type="text" class="form-control" id="name" placeholder="Enter Fullname" name="name" required>
								</div>
								<div class="form-group">
									<label>Project Category</label>
									<select class="form-control" id="chair" required name="chair">
										<option disabled selected>Select Bidding Project Category</option>
										<?php foreach ($chair as $row) : ?>
											<option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label>Approved Budget for Contract</label>
									<input type="number" class="form-control" placeholder="Enter Approved Budget" id="budget" name="budget" required>
								</div>
								<div class="form-group">
									<label>Start of Bidding</label>
									<input type="date" class="form-control" id="start" name="start" required>
								</div>
								<div class="form-group">
									<label>End of Bidding</label>
									<input type="date" class="form-control" id="end" name="end" required>
								</div>

						</div>
						<div class="modal-footer">
							<input type="hidden" id="off_id" name="id">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->

		</div>

	</div>
	<?php include 'templates/footer.php' ?>
</body>

</html>