<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'templates/header.php' ?>
	<title>Login - Bidding Management System</title>

<body class="login">
	<?php include 'templates/loading_screen.php' ?>
	<div class="wrapper wrapper-login">

		<div class="container container-login animated fadeIn">
			<?php if (isset($_SESSION['message'])) : ?>
				<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success'] == 'danger' ? 'bg-danger text-light' : null ?>" role="alert">
					<?= $_SESSION['message']; ?>
				</div>
				<?php unset($_SESSION['message']); ?>
			<?php endif ?>
			<h3 class="text-center">Sign In Here</h3>
			<div class="login-form">
				<form method="POST" action="model/login.php" id="login-form">
					<div class="form-group form-floating-label">
						<input id="username" name="username" type="text" class="form-control input-border-bottom">
						<label for="username" class="placeholder">Username</label>
						<span>
							<p id="check-inputUsername" class="text-danger" style="font-size:13px;"></p>
						</span>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom">
						<label for="password" class="placeholder">Password</label>
						<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						<span>
							<p id="check-inputPassword" class="text-danger " style="font-size:13px;"></p>
						</span>
					</div>
					<div class="form-action mb-3">
						<button type="submit" id="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include 'templates/footer.php' ?>
	<script>
		$(document).ready(function() {
			$("#login-form").submit(function(e) {
				e.preventDefault();
				if ($("#username").val() == "") {
					$("check-inputUsername").html("Empty username field.");
				}
				if ($("#password").val() == "") {
					$("check-inputPassword").html("Empty password field.");
				} else {
					$.ajax({
						url: "model/login.php",
						type: "POST",
						data: {
							'username': $("#username").val(),
							'password': $("#password").val(),
						},
						success: function(data) {
							console.log(data);
							if (data == "success") {
								$("#login-form").unbind("submit").submit();
								setTimeout(function() {
									swal("Success!", "Login successfully.", "success");
									window.location.href = "dashboard.php";
								}, 2000);
							} else {
								setTimeout(function() {
									swal("Error!", "Incorrect username or password", "error");
								}, 2000);
							}
						}
					});
				}
			});
		});
	</script>
</body>

</html>