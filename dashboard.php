<?php include 'server/server.php' ?>
<?php

$query = "SELECT * FROM tblresident WHERE resident_type=1";
$result = $conn->query($query);
$total = $result->num_rows;

$query1 = "SELECT * FROM tblofficials WHERE status='Active'";
$result1 = $conn->query($query1);
$projects = $result1->num_rows;

// $query2 = "SELECT * FROM tblresident WHERE gender='Female' AND resident_type=1";
// $result2 = $conn->query($query2);
// $female = $result2->num_rows;

// $query3 = "SELECT * FROM tblresident WHERE voterstatus='Yes' AND resident_type=1";
// $result3 = $conn->query($query3);
// $totalvoters = $result3->num_rows;

// $query4 = "SELECT * FROM tblresident WHERE voterstatus='No' AND resident_type=1";
// $non = $conn->query($query4)->num_rows;

// $query5 = "SELECT * FROM tblpurok";
// $purok = $conn->query($query5)->num_rows;

$query6 = "SELECT * FROM tblprecinct";
$precinct = $conn->query($query6)->num_rows;

$query7 = "SELECT * FROM tblblotter";
$blotter = $conn->query($query7)->num_rows;

$date = date('Y-m-d');
$query8 = "SELECT SUM(amounts) as am FROM tblpayments WHERE `date`='$date'";
$revenue = $conn->query($query8)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'templates/header.php' ?>
	<title>Dashboard - Barangay Management System</title>
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
								<h2 class="text-white fw-bold">Dashboard</h2>
							</div>
							<div class="ml-md-auto">
								<h2 class="text-white" id="realtime-clock"></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--2">
					<?php if (isset($_SESSION['message'])) : ?>
						<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success'] == 'danger' ? 'bg-danger text-light' : null ?>" role="alert">
							<?php echo $_SESSION['message']; ?>
						</div>
						<?php unset($_SESSION['message']); ?>
					<?php endif ?>
					<div class="row">
						<div class="col-md-4">
							<div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-users"></i>
											</div>
										</div>
										<div class="col-3 col-stats">
										</div>
										<div class="col-6 col-stats">
											<div class="numbers mt-4">
												<h2 class="fw-bold text-uppercase">Active Merchant</h2>
												<h3 class="fw-bold text-uppercase"><?= number_format($total) ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<a href="merchant_info.php?state=all" class="card-link text-light">Total Merchants </a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-stats card-warning card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="icon-direction"></i>
											</div>
										</div>
										<div class="col-3 col-stats">
										</div>
										<div class="col-6 col-stats">
											<div class="numbers mt-4">
												<h2 class="fw-bold text-uppercase">Projects</h2>
												<h3 class="fw-bold"><?= number_format($projects) ?></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<a href="project_info.php?state=projects" class="card-link text-light">Total Projects</a>
								</div>
							</div>
						</div>
						<?php if (isset($_SESSION['username']) && $_SESSION['role'] == 'administrator') : ?>

					</div>
				<?php endif ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<div class="card-title fw-bold">LGU Mission Statement</div>
								</div>
							</div>
							<div class="card-body">
								<p><?= !empty($db_txt) ? $db_txt : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim.' ?></p>
								<div class="text-center">
									<img class="img-fluid" src="<?= !empty($db_img) ? 'assets/uploads/' . $db_img : 'assets/img/bg-abstract.png' ?>" />
								</div>
							</div>
						</div>
					</div>
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