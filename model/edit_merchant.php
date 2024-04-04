<?php
include '../server/server.php';

if (!isset($_SESSION['username'])) {
	if (isset($_SERVER["HTTP_REFERER"])) {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}

$id 		= $conn->real_escape_string($_POST['id']);
$national_id 		= $conn->real_escape_string($_POST['national']);
$fname 		= $conn->real_escape_string($_POST['fname']);
$email 	    = $conn->real_escape_string($_POST['email']);
$number 	= $conn->real_escape_string($_POST['number']);
$address 	= $conn->real_escape_string($_POST['address']);
$oname 		= $conn->real_escape_string($_POST['ownername']);
$ncontract 		= $conn->real_escape_string($_POST['ncontract']);
$cduration 		= $conn->real_escape_string($_POST['cduration']);
$dcontract 		= $conn->real_escape_string($_POST['dcontract']);
$ddelivery 		= $conn->real_escape_string($_POST['datedelivery']);
$goods 		= $conn->real_escape_string($_POST['kgoods']);
$noa 		= $conn->real_escape_string($_POST['noa']);
$sale		= $conn->real_escape_string($_POST['enduser']);
$production 		= $conn->real_escape_string($_POST['production']);
$manpower 		= $conn->real_escape_string($_POST['manpower']);
$aftersales		= $conn->real_escape_string($_POST['after']);
$cvalue 		= $conn->real_escape_string($_POST['contractvalue']);
$crole 		= $conn->real_escape_string($_POST['crole']);
$dcompletion 		= $conn->real_escape_string($_POST['dcompletion']);
$nwork 		= $conn->real_escape_string($_POST['nwork']);
$vcompletion 		= $conn->real_escape_string($_POST['vcompletion']);
$percentage 		= $conn->real_escape_string($_POST['percentage']);
$notice 		= $conn->real_escape_string($_POST['notice']);
$cert 		= $conn->real_escape_string($_POST['cert']);
$project 	= $conn->real_escape_string($_POST['purok']);
$category = $conn->real_escape_string($_POST['category']);
$inactive 	= $conn->real_escape_string($_POST['inactive']);
$profile 	= $conn->real_escape_string($_POST['profileimg']); // base 64 image
$profile2 	= $_FILES['img']['name'];

// change profile2 name
$newName = date('dmYHis') . str_replace(" ", "", $profile2);

// image file directory
$target = "../assets/uploads/resident_profile/" . basename($newName);
$check = "SELECT id FROM tblresident WHERE national_id='$national_id'";
$nat = $conn->query($check)->fetch_assoc();
if ($nat['id'] == $id || count($nat) <= 0) {
	if (!empty($id)) {

		if (!empty($profile) && !empty($profile2)) {

			$query = "UPDATE tblresident SET national_id='$national_id',`picture`='$profile', `firstname`='$fname',`phone`='$number', `email`='$email',`address`='$address',
						`o_name`='$oname',`n_contract`='$ncontract',`c_duration`='$cduration',`d_contract`='$dcontract',
						`d_delivery`='$ddelivery',`k_goods`='$goods',`noa`='$noa',`sales`='$sale',`production`='$production',`manpower`='$manpower',`aftersales`='$aftersales',`c_value`='$cvalue',`c_role`='$crole',`d_completion`='$dcompletion',`n_work`='$nwork',`v_completion`='$vcompletion', `percentage`='$percentage',`notice`='$notice', `cert`='$cert',`resident_type`='$inactive'
						WHERE id=$id;";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been updated!';
				$_SESSION['success'] = 'success';
			}
		} else if (!empty($profile) && empty($profile2)) {

			$query = "UPDATE tblresident SET national_id='$national_id',`picture`='$profile', `firstname`='$fname',`phone`='$number', `email`='$email',`address`='$address',
						o_name`='$oname',`n_contract`='$ncontract',`c_duration`='$cduration',`d_contract`='$dcontract',
						`d_delivery`='$ddelivery',`k_goods`='$goods',`noa`='$noa',`sales`='$sale',`production`='$production',`manpower`='$manpower',`aftersales`='$aftersales',`c_value`='$cvalue',`c_role`='$crole',`d_completion`='$dcompletion',`n_work`='$nwork',`v_completion`='$vcompletion', `percentage`='$percentage',`notice`='$notice', `cert`='$cert',`resident_type`='$inactive'
						WHERE id=$id;";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been updated!';
				$_SESSION['success'] = 'success';
			}
		} else if (empty($profile) && !empty($profile2)) {

			$query = "UPDATE tblresident SET national_id='$national_id',`picture`='$newName', `firstname`='$fname',`phone`='$number', `email`='$email',`address`='$address',
							`o_name`='$oname',`n_contract`='$ncontract',`c_duration`='$cduration',`d_contract`='$dcontract',
							`d_delivery`='$ddelivery',`k_goods`='$goods',`noa`='$noa',`sales`='$sale',`production`='$production',`manpower`='$manpower',`aftersales`='$aftersales',`c_value`='$cvalue',`c_role`='$crole',`d_completion`='$dcompletion',`n_work`='$nwork',`v_completion`='$vcompletion', `percentage`='$percentage',`notice`='$notice', `cert`='$cert',`resident_type`='$inactive'
							WHERE id=$id;";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been updated!!';
				$_SESSION['success'] = 'success';

				if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {

					$_SESSION['message'] = 'Merchant Information has been updated!!';
					$_SESSION['success'] = 'success';
				}
			}
		} else {
			$query = "UPDATE tblresident SET national_id='$national_id', `firstname`='$fname', `phone`='$number', `email`='$email',`address`='$address',
							`o_name`='$oname',`n_contract`='$ncontract',`c_duration`='$cduration',`d_contract`='$dcontract',
							`d_delivery`='$ddelivery',`k_goods`='$goods',`noa`='$noa',`sales`='$sale',`production`='$production',`manpower`='$manpower',`aftersales`='$aftersales',`c_value`='$cvalue',`c_role`='$crole',`d_completion`='$dcompletion',`n_work`='$nwork',`v_completion`='$vcompletion', `percentage`='$percentage',`notice`='$notice', `cert`='$cert',`resident_type`='$inactive'
							WHERE id=$id;";

			if ($conn->query($query) === true) {

				$_SESSION['message'] = 'Merchant Information has been updated!';
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
