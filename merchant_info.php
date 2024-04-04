<?php include 'server/server.php' ?>
<?php

$state = $_GET['state'];

if ($state == 'all') {
    $query = "SELECT * FROM tblresident";
    $result = $conn->query($query);
}

$resident = array();
while ($row = $result->fetch_assoc()) {
    $resident[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'templates/header.php' ?>
    <title>Merchant Information - Bidding Management System</title>
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
                                <h2 class="text-white fw-bold"><?php if ($state == 'all') {
                                                                    echo 'Merchant Information';
                                                                } ?></h2>
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
                        <div class="col-md-<?= $state != 'voters' ? '9' : '12' ?>">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">
                                            <?php
                                            if ($state == 'all') {
                                                echo 'All Merchants';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="residenttable" class="display table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Merchant Name</th>
                                                    <th scope="col">Order Receipt No.</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($resident)) : ?>
                                                    <?php $no = 1;
                                                    foreach ($resident as $row) : ?>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar avatar-xs">
                                                                    <img src="<?= preg_match('/data:image/i', $row['picture']) ? $row['picture'] : 'assets/uploads/resident_profile/' . $row['picture'] ?>" alt="Resident Profile" class="avatar-img rounded-circle">
                                                                </div>
                                                                &nbsp; <?= ucwords($row['firstname']) ?>
                                                            </td>
                                                            <td><?= $row['national_id'] ?></td>
                                                            <td><?= $row['phone'] ?></td>
                                                            <td><?= $row['address'] ?></td>
                                                        </tr>
                                                    <?php $no++;
                                                    endforeach ?>
                                                <?php endif ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">Merchant Name</th>
                                                    <th scope="col">Order Receipt No.</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($state != 'voters') : ?>
                            <div class="col-md-3">
                                <div class="card card-stats card-<?php
                                                                    if ($state == 'male') {
                                                                        echo 'secondary';
                                                                    } elseif ($state == 'female') {
                                                                        echo 'warning';
                                                                    } elseif ($state == 'voters') {
                                                                        echo 'success';
                                                                    } elseif ($state == 'non_voters') {
                                                                        echo 'info';
                                                                    } else {
                                                                        echo 'primary';
                                                                    } ?> card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <?php
                                                    if ($state == 'all') {
                                                        echo '<i class="flaticon-users"></i>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-4 col-stats">
                                            </div>
                                            <div class="col-5 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">
                                                        <?php
                                                        if ($state == 'all') {
                                                            echo 'All Merchant';
                                                        }
                                                        ?>
                                                    </p>
                                                    <h4 class="card-title"><?= number_format(count($resident)) ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <!-- Main Footer -->
            <?php include 'templates/main-footer.php' ?>
            <!-- End Main Footer -->

        </div>

    </div>
    <?php include 'templates/footer.php' ?>
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#residenttable').DataTable();
        });
    </script>
</body>

</html>