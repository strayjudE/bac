<?php include 'server/server.php' ?>
<?php
$query = "SELECT * FROM tblpurok ORDER BY `name`";
$result = $conn->query($query);

$purok = array();
while ($row = $result->fetch_assoc()) {
    $purok[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'templates/header.php' ?>
    <title>Projects for Bidding - Bidding Management System</title>
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
                                <h2 class="text-white fw-bold">Settings</h2>
                            </div>
                            <div class="ml-md-auto">
                                <h2 class="text-white" id="realtime-clock"></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row mt--2">
                        <div class="col-md-12">

                            <?php if (isset($_SESSION['message'])) : ?>
                                <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success'] == 'danger' ? 'bg-danger text-light' : null ?>" role="alert">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                                <?php unset($_SESSION['message']); ?>
                            <?php endif ?>

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Projects to Bid</div>
                                        <div class="card-tools">
                                            <a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
                                                <i class="fa fa-plus"></i>
                                                Add Project to Bid
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Project</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col">Approved Budget</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($purok)) : ?>
                                                    <?php $no = 1;
                                                    foreach ($purok as $row) : ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td class="text-uppercase"><?= $row['name'] ?></td>
                                                            <td><?= $row['details'] ?></td>
                                                            <th><?= number_format($row['abc']) . ' pesos' ?></th>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" title="Edit Purok" onclick="editPurok(this)" data-name="<?= $row['name'] ?>" data-budget="<?= $row['abc'] ?>" data-details="<?= $row['details'] ?>" data-id="<?= $row['id'] ?>">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a type="button" data-toggle="tooltip" href="model/remove_purok.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this project?');" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php $no++;
                                                    endforeach ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Available Data</td>
                                                    </tr>
                                                <?php endif ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Project</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col">Approved Budget</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Project to Bid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_purok.php">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Project Name" name="purok" required>
                                </div>
                                <div class="form-group">
                                    <label>Project Details(Optional)</label>
                                    <textarea class="form-control" placeholder="Set details for Project" name="details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Approved Budget for Contract</label>
                                    <input type="number" class="form-control" placeholder="Enter Budget for Contract" name="budget" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Purok</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_purok.php">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control text-uppercase" id="purok" placeholder="Enter Project Name" name="purok" required>
                                </div>
                                <div class="form-group">
                                    <label>Project Details(Optional)</label>
                                    <textarea class="form-control" id="details" placeholder="Set details for Project" name="details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Approved Budget for Contract</label>
                                    <input type="number" class="form-control" placeholder="Enter Budget for Contract" id="budget" name="budget" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="purok_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Footer -->
            <?php include 'templates/main-footer.php' ?>
            <!-- End Main Footer -->

        </div>

    </div>
    <?php include 'templates/footer.php' ?>
</body>

</html>