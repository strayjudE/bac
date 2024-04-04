<?php
include '../server/server.php';

if (!isset($_SESSION['username'])) {
	if (isset($_SERVER["HTTP_REFERER"])) {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}

$id 	= $conn->real_escape_string($_POST['id']);
$name 	= $conn->real_escape_string($_POST['name']);
$chair 	= $conn->real_escape_string($_POST['chair']);
$start 	= $conn->real_escape_string($_POST['start']);
$end 	= $conn->real_escape_string($_POST['end']);
$status = $conn->real_escape_string($_POST['status']);
$abc = $conn->real_escape_string($_POST['budget']);

$currentDate = date("Y-m-d");

$status = ($end < $currentDate) ? 'Inactive' : 'Active';

if (!empty($id)) {

	$query 		= "UPDATE tblofficials SET `name`='$name', `chairmanship`='$chair',`abc`='$abc', termstart='$start', termend='$end', `status`='$status' WHERE id=$id;";
	$result 	= $conn->query($query);

	if ($result === true) {

		$_SESSION['message'] = 'Project has been updated!';
		$_SESSION['success'] = 'success';
	} else {

		$_SESSION['message'] = 'Something went wrong!';
		$_SESSION['success'] = 'danger';
	}
} else {
	$_SESSION['message'] = 'No Project ID found!';
	$_SESSION['success'] = 'danger';
}

header("Location: ../projects.php");

$conn->close();
