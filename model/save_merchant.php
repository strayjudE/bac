<?php
include '../server/server.php';

if (!isset($_SESSION['username'])) {
	if (isset($_SERVER["HTTP_REFERER"])) {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}

$national_id 		= $conn->real_escape_string($_POST['national']);
$fname 		= $conn->real_escape_string($_POST['fname']);
$email 	    = $conn->real_escape_string($_POST['email']);
$number 	= $conn->real_escape_string($_POST['number']);
$address 	= $conn->real_escape_string($_POST['address']);
$category   = $conn->real_escape_string($_POST['category']);
$project 	= $conn->real_escape_string($_POST['purok']);
$abc		= $conn->real_escape_string($_POST['abc']);
$profile 	= $conn->real_escape_string($_POST['profileimg']); // base 64 image
$profile2 	= $_FILES['img']['name'];

// change profile2 name
$newName = date('dmYHis') . str_replace(" ", "", $profile2);

// image file directory
$target = "../assets/uploads/resident_profile/" . basename($newName);
$check = "SELECT id FROM tblresident WHERE national_id='$national_id'";
$nat = $conn->query($check)->num_rows;

if ($nat == 0) {
	if (!empty($fname)) {

		if (!empty($profile) && !empty($profile2)) {

			$query = "INSERT INTO tblresident (`national_id`,`picture`, `firstname`,`phone`, `email`,`address`, `purok`,`category`, `abc`) 
							VALUES ('$national_id','$profile','$fname','$number','$email','$address', '$project', '$category', '$abc')";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been saved!';
				$_SESSION['success'] = 'success';
			}
		} else if (!empty($profile) && empty($profile2)) {

			$query = "INSERT INTO tblresident (`national_id`, `picture`, `firstname`,`phone`, `email`, `address`, `purok`, `category`, `abc`) 
							VALUES ('$national_id','$profile','$fname','$number','$email','$address', '$project', '$category', '$abc')";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been saved!';
				$_SESSION['success'] = 'success';
			}
		} else if (empty($profile) && !empty($profile2)) {

			$query = "INSERT INTO tblresident (`national_id`, `picture`, `firstname`, `phone`, `email`, `address`, `purok`, `category`, `abc`) 
							VALUES ('$national_id','$newName','$fname','$number','$email','$address', '$project', '$category', '$abc')";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been saved!';
				$_SESSION['success'] = 'success';

				if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {

					$_SESSION['message'] = 'Merchant Information has been saved!';
					$_SESSION['success'] = 'success';
				}
			}
		} else {
			$query = "INSERT INTO tblresident (`national_id`, `picture`,`firstname`, `phone`, `email`, `address`, `purok`, `category`, `abc`) 
							VALUES ('$national_id','person.png','$fname','$number','$email','$address', '$project', '$category', '$abc')";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been saved!';
				$_SESSION['success'] = 'success';
			}
		}
	} else {

		$_SESSION['message'] = 'Please complete the form!';
		$_SESSION['success'] = 'danger';
	}
} else {
	$_SESSION['message'] = 'Order Receipt No. is already taken. Please enter a unique Receipt No.!';
	$_SESSION['success'] = 'danger';
}
header("Location: ../merchant.php");

$conn->close();
