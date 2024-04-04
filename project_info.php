<?php include 'server/server.php' ?>
<?php

$state = $_GET['state'];

if ($state == 'projects') {
    $query = "SELECT *,tblofficials.id as id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY `status`='Active' DESC ";
    $result = $conn->query($query);
} else {
    $query = "SELECT *,tblofficials.id as id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY `status`='Active' DESC";
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
    <title>Project Information - Bidding Management System</title>
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
                                <h2 class="text-white fw-bold"><?php if ($state == 'projects') {
                                                                    echo 'Project Information';
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
                                            if ($state == 'projects') {
                                                echo 'All Projects';
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
                                                    <th scope="col">Project Name</th>
                                                    <th scope="col">Bidding Project Category</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($resident)) : ?>
                                                    <?php $no = 1;
                                                    foreach ($resident as $row) : ?>
                                                        <tr>
                                                            <td>
                                                                &nbsp; <?= $row['name'] ?>
                                                            </td>
                                                            <td><?= $row['title'] ?></td>
                                                        </tr>
                                                    <?php $no++;
                                                    endforeach ?>
                                                <?php endif ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">Project Name</th>
                                                    <th scope="col">Bidding Project Category</th>
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
                                                                    if ($state == 'projects') {
                                                                        echo 'success';
                                                                    } ?> card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <?php
                                                    if ($state == 'projects') {
                                                        echo '<i class="icon-docs"></i>';
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
                                                        if ($state == 'projects') {
                                                            echo 'All Projects';
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