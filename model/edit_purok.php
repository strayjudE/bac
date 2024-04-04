<?php
include('../server/server.php');

if (!isset($_SESSION['username'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$abc             = $conn->real_escape_string($_POST['budget']);
$purok         = $conn->real_escape_string($_POST['purok']);
$details     = $conn->real_escape_string($_POST['details']);
$id         = $conn->real_escape_string($_POST['id']);

if (!empty($purok)) {

    $query         = "UPDATE tblpurok SET `name` = '$purok', `details`='$details', `abc`='$abc' WHERE id=$id;";
    $result     = $conn->query($query);

    if ($result === true) {
        $_SESSION['message'] = 'Project to bid has been updated!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Something went wrong!';
        $_SESSION['success'] = 'danger';
    }
} else {

    $_SESSION['message'] = 'No project ID found!';
    $_SESSION['success'] = 'danger';
}

header("Location: ../purok.php");

$conn->close();
