<?php
include('../server/server.php');

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$name     = $conn->real_escape_string($_POST['name']);
$chair     = $conn->real_escape_string($_POST['chair']);
$abc = $conn->real_escape_string($_POST['budget']);
$start     = $conn->real_escape_string($_POST['start']);
$end     = $conn->real_escape_string($_POST['end']);
$status     = $conn->real_escape_string($_POST['status']);

$currentDate = date("Y-m-d");

$status = ($end < $currentDate) ? 'Inactive' : 'Active';

if (!empty($name) && !empty($chair) && !empty($start) && !empty($end) && !empty($status)) {

    $insert  = "INSERT INTO tblofficials (`name`, `chairmanship`, `abc`, termstart, termend, `status`) VALUES ('$name', '$chair', '$abc', '$start','$end', '$status')";
    $result  = $conn->query($insert);

    if ($result === true) {
        $_SESSION['message'] = 'Project added!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }
} else {

    $_SESSION['message'] = 'Please fill up the form completely!';
    $_SESSION['success'] = 'danger';
}

header("Location: ../projects.php");

$conn->close();
