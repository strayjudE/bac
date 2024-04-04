<?php

require("../server/server.php");

// get Users
$query = "SELECT national_id,firstname,purok,phone,email,address FROM tblresident";
if (!$result = $conn->query($query)) {
    exit($conn->error);
}

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=List of Merchants.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('National ID', 'Merchant Name', 'Purok', 'Contact Number', 'Email Address', 'Address'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
