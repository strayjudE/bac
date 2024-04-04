<?php
include '../server/server.php';

$username 	= $conn->real_escape_string($_REQUEST['username']);
$password	= sha1($conn->real_escape_string($_REQUEST['password']));


if ($username != '' and $password != '') {
	$query 		= "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";

	$result 	= $conn->query($query);

	if ($result->num_rows) {
		while ($row = $result->fetch_assoc()) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['role'] = $row['user_type'];
			$_SESSION['avatar'] = $row['avatar'];
		}

		$_SESSION['message'] = 'You have successfully logged in to Bidding Management System!';
		$_SESSION['success'] = 'success';

		echo 'success';
	} else {
		$_SESSION['message'] = 'Username or password is incorrect!';
		$_SESSION['success'] = 'danger';
		echo 'Username or password is incorrect!';
	}
} else {
	$_SESSION['message'] = 'Username or password is empty!';
	$_SESSION['success'] = 'danger';
}



$conn->close();
exit();
