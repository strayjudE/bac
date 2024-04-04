<?php include 'server/server.php' ?>
<?php
$query = "SELECT * FROM tblresident ORDER BY `id` ASC";
$result = $conn->query($query);

$resident = array();
while ($row = $result->fetch_assoc()) {
    $resident[] = $row;
}

$query1 = "SELECT * FROM tblpurok ORDER BY `name`";
$result1 = $conn->query($query1);

$purok = array();
while ($row = $result1->fetch_assoc()) {
    $purok[] = $row;
}

$query2 = "SELECT * FROM tblchairmanship ORDER BY `title`";
$result2 = $conn->query($query2);

$category = array();
while ($row = $result2->fetch_assoc()) {
    $category[] = $row;
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
                                <h2 class="text-white fw-bold">Merchants</h2>
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
                                        <div class="card-title">Merchant Information</div>
                                        <?php if (isset($_SESSION['username'])) : ?>
                                            <div class="card-tools">
                                                <a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
                                                    <i class="fa fa-plus"></i>
                                                    Merchant
                                                </a>
                                                <a href="model/export_resident_csv.php" class="btn btn-danger btn-border btn-round btn-sm">
                                                    <i class="fa fa-file"></i>
                                                    Export CSV
                                                </a>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="residenttable" class="display table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Merchant Name</th>
                                                    <th>Order Receipt</th>
                                                    <th>Contact Number</th>
                                                    <td>Category for Bidding</td>
                                                    <th>Project to Bid</th>
                                                    <th>SEC / DTI / CDA</th>
                                                    <?php if (isset($_SESSION['username'])) : ?>
                                                        <th scope="col">Action</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($resident)) : ?>
                                                    <?php $no = 1;
                                                    foreach ($resident as $row) : ?>
                                                        <tr>
                                                            <td class="text-uppercase">
                                                                <div class="avatar avatar-xs">
                                                                    <img src="<?= preg_match('/data:image/i', $row['picture']) ? $row['picture'] : 'assets/uploads/resident_profile/' . $row['picture'] ?>" alt="Resident Profile" class="avatar-img rounded-circle">
                                                                </div>
                                                                &nbsp; <?= $row['firstname'] ?>
                                                                <button type="button" class="btn btn-link btn-primary" title="Copy to Clipboard" data-clipboard-text="<?= strtoupper($row['firstname']) ?>">
                                                                    <i class="fa fa-copy"></i>
                                                                </button>
                                                            </td>
                                                            <td><?= $row['national_id'] ?></td>
                                                            <td><?= $row['phone'] ?></td>
                                                            <td><?= $row['category'] ?></td>
                                                            <td class="text-uppercase"><?= $row['purok'] ?></td>
                                                            <td><?= $row['sec'] . ' / ' . $row['dti'] . ' / ' . $row['cda'] ?></td>
                                                            <?php if (isset($_SESSION['username'])) : ?>
                                                                <td>
                                                                    <div class="form-button-action">
                                                                        <a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-secondary" title="Edit Merchant" onclick="editResident(this)" data-id="<?= $row['id'] ?>" data-sec="<?= $row['sec'] ?>" data-category="<?= $row['category'] ?>" data-dti="<?= $row['dti'] ?>" data-cda="<?= $row['cda'] ?>" data-oname="<?= $row['o_name'] ?>" data-ncontract="<?= $row['n_contract'] ?>" data-cduration="<?= $row['c_duration'] ?>" data-enduser="<?= $row['sales'] ?>" data-dcontract="<?= $row['d_contract'] ?>" data-datedelivery="<?= $row['d_delivery'] ?>" data-kgoods="<?= $row['k_goods'] ?>" data-noa="<?= $row['noa'] ?>" data-production="<?= $row['production'] ?>" data-manpower="<?= $row['manpower'] ?>" data-after="<?= $row['aftersales'] ?>" data-contractvalue="<?= $row['c_value'] ?>" data-crole="<?= $row['c_role'] ?>" data-dcompletion="<?= $row['d_completion'] ?>" data-nwork="<?= $row['n_work'] ?>" data-vcompletion="<?= $row['v_completion'] ?>" data-percentage="<?= $row['percentage'] ?>" data-notice="<?= $row['notice'] ?>" data-cert="<?= $row['cert'] ?>" data-national="<?= $row['national_id'] ?>" data-fname="<?= $row['firstname'] ?>" data-number="<?= $row['phone'] ?>" data-email="<?= $row['email'] ?>" data-address="<?= $row['address'] ?>" data-purok="<?= $row['purok'] ?>" data-img="<?= $row['picture'] ?>" data-dead="<?= $row['resident_type']; ?>">
                                                                            <?php if (isset($_SESSION['username'])) : ?>
                                                                                <i class="fa fa-edit"></i>
                                                                            <?php else : ?>
                                                                                <i class="fa fa-eye"></i>
                                                                            <?php endif ?>
                                                                        </a>
                                                                        <?php if (isset($_SESSION['username']) && $_SESSION['role'] == 'administrator') : ?>
                                                                            <a type="button" data-toggle="tooltip" href="https://open.philgeps.gov.ph/analytics/load/merchantInfo" target="_blank" class="btn btn-link btn-info" data-original-title="View Merchant">
                                                                                <i class="fa fa-building"></i>
                                                                            </a>
                                                                            <a type="button" data-toggle="tooltip" href="generate_goods.php?id=<?= $row['id'] ?>" class="btn btn-link btn-warning" data-original-title="Generate Goods">
                                                                                <i class="fa fa-truck"></i>
                                                                            </a>
                                                                            <a type="button" data-toggle="tooltip" href="generate_infra.php?id=<?= $row['id'] ?>" class="btn btn-link btn-info" data-original-title="Generate Infra">
                                                                                <i class="fa fa-archway"></i>
                                                                            </a>
                                                                            <a type="button" data-toggle="tooltip" href="model/remove_merchant.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this merchant?');" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        <?php endif ?>
                                                                    </div>
                                                                </td>
                                                            <?php endif ?>

                                                        </tr>
                                                    <?php $no++;
                                                    endforeach ?>
                                                <?php endif ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">Merchant Name</th>
                                                    <th>Order Receipt</th>
                                                    <th>Contact Number</th>
                                                    <td>Category for Bidding</td>
                                                    <th>Project to Bid</th>
                                                    <th>SEC / DTI / CDA</th>
                                                    <?php if (isset($_SESSION['username'])) : ?>
                                                        <th scope="col">Action</th>
                                                    <?php endif ?>
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
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Merchant Registration Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_merchant.php" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="1000000">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div style="width: 370px; height: 250;" class="text-center" id="my_camera">
                                            <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250">
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam">Open Camera</button>
                                            <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo()">Capture</button>
                                        </div>
                                        <div id="profileImage">
                                            <input type="hidden" name="profileimg">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="img" accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label>Order Receipt No.</label>
                                            <input type="text" class="form-control" name="national" placeholder="Enter Receipt No." required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Merchant Name</label>
                                                    <input type="text" class="form-control text-uppercase" placeholder="Enter Merchant Name" name="fname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email Address (Optional)</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contact Number (Optional)</label>
                                                    <input type="text" class="form-control" placeholder="Enter Contact Number" name="number">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Project to Bid</label>
                                                    <div class="d-flex align-items-center">
                                                        <select class="form-control text-uppercase" required id="purokSelect" name="purok">
                                                            <option disabled selected>Select Project to Bid</option>
                                                            <?php foreach ($purok as $row) : ?>
                                                                <option value="<?= strtoupper($row['name']) ?>" data-abc="<?= $row['abc'] ?>"><?= strtoupper($row['name']) ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <strong class="ml-3">ABC: <span id="abcDisplay" style="display: none;"></span></strong>
                                                        <input type="hidden" id="abcInput" name="abc" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" required placeholder="Enter Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Bidding Category</label>
                                                    <select class="form-control" required name="category">
                                                        <option disabled selected>Select Bidding Category</option>
                                                        <?php foreach ($category as $row) : ?>
                                                            <option value="<?= $row['title'] ?>"><?= $row['title'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit/View Merchant Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_merchant.php" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="1000000">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="my_camera1" style="width: 370px; height: 250;" class="text-center">
                                            <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250" id="image">
                                        </div>
                                        <?php if (isset($_SESSION['username'])) : ?>
                                            <div class="form-group d-flex justify-content-center">
                                                <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam1">Open Camera</button>
                                                <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo1()">Capture</button>
                                            </div>
                                            <div id="profileImage1">
                                                <input type="hidden" name="profileimg">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="img" accept="image/*">
                                            </div>
                                        <?php endif ?>
                                        <div class="form-group">
                                            <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="inactive" value="1" class="selectgroup-input" checked="" id="active">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-check-circle"></i></span>
                                                </label>
                                                <p class="mt-1 mr-3"><b>Active</b></p>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="inactive" value="0" class="selectgroup-input" id="inactived">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-times-circle"></i></span>
                                                </label>
                                                <p class="mt-1 mr-3"><b>Inactive</b></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Receipt No.</label>
                                            <input type="text" class="form-control" name="national" id="nat_id" placeholder="Enter Receipt No.">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Merchant Name</label>
                                                    <input type="text" class="form-control text-uppercase" placeholder="Enter Merchant Name" name="fname" id="fname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email Address (Optional)</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contact Number (Optional)</label>
                                                    <input type="text" class="form-control" placeholder="Enter Contact Number" name="number" id="number">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Project to Bid</label>
                                                    <select class="form-control text-uppercase" disabled name="purok" id="purok">
                                                        <option disabled selected>Select Project to Bid</option>
                                                        <?php foreach ($purok as $row) : ?>
                                                            <option value="<?= strtoupper($row['name']) ?>"><?= strtoupper($row['name']) ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" id="address" name="address" required placeholder="Enter Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Bidding Category</label>
                                                    <select class="form-control" disabled id="category" name="category">
                                                        <option disabled selected>Select Bidding Category</option>
                                                        <?php foreach ($category as $row) : ?>
                                                            <option value="<?= $row['title'] ?>"><?= $row['title'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SEC</label>
                                                    <select class="form-control sec" required name="sec" id="sec">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>DTI</label>
                                                    <select class="form-control dti" required name="dti" id="dti">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CDA</label>
                                                    <select class="form-control cda" required name="cda" id="cda">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <label><strong>GENERAL:</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Owner’s Name and Address:</label>
                                                    <select class="form-control" required name="ownername" id="ownername">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Name of Contract:</label>
                                                    <select class="form-control" required name="ncontract" id="ncontract">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contract Duration:</label>
                                                    <select class="form-control" required name="cduration" id="cduration">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Date of Contract:</label>
                                                    <select class="form-control" required name="dcontract" id="dcontract">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="accordion" id="goodsAccordion">
                                            <!-- Goods Information Header -->
                                            <div class="card">
                                                <div class="card-header" id="goodsHeading">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#goodsCollapse" aria-expanded="false" aria-controls="goodsCollapse">
                                                            <strong>for GOODS:</strong>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <!-- Goods Information Collapse -->
                                                <div id="goodsCollapse" class="collapse collapsed" aria-labelledby="goodsHeading" data-parent="#goodsAccordion">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Date of Delivery -->
                                                            <div class="form-group">
                                                                <label>Date of Delivery:</label>
                                                                <select class="form-control" name="datedelivery" id="datedelivery">
                                                                    <option disabled selected value="">Select Option</option>
                                                                    <option value="None">None</option>
                                                                    <option value="Pass">Pass</option>
                                                                    <option value="Fail">Fail</option>
                                                                </select>
                                                            </div>
                                                            <!-- Kind of Goods -->
                                                            <div class="form-group">
                                                                <label>Kind of Goods:</label>
                                                                <select class="form-control" name="kgoods" id="kgoods">
                                                                    <option disabled selected value="">Select Option</option>
                                                                    <option value="None">None</option>
                                                                    <option value="Pass">Pass</option>
                                                                    <option value="Fail">Fail</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NOA, CONTRACT & NTP (IF ANY):</label>
                                                            <select class="form-control" name="noa" id="noa">
                                                                <option disabled selected value="">Select Option</option>
                                                                <option value="None">None</option>
                                                                <option value="Pass">Pass</option>
                                                                <option value="Fail">Fail</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>End User’s Acceptance or Official Receipts/ Sales Invoice:</label>
                                                            <select class="form-control" name="enduser" id="enduser">
                                                                <option disabled selected value="">Select Option</option>
                                                                <option value="None">None</option>
                                                                <option value="Pass">Pass</option>
                                                                <option value="Fail">Fail</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Production/delivery schedule:</label>
                                                            <select class="form-control" name="production" id="production">
                                                                <option disabled selected value="">Select Option</option>
                                                                <option value="None">None</option>
                                                                <option value="Pass">Pass</option>
                                                                <option value="Fail">Fail</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Manpower Requirements:</label>
                                                            <select class="form-control" name="manpower" id="manpower">
                                                                <option disabled selected value="">Select Option</option>
                                                                <option value="None">None</option>
                                                                <option value="Pass">Pass</option>
                                                                <option value="Fail">Fail</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>After sales/parts (if applicable):</label>
                                                            <select class="form-control" name="after" id="after">
                                                                <option disabled selected value="">Select Option</option>
                                                                <option value="None">None</option>
                                                                <option value="Pass">Pass</option>
                                                                <option value="Fail">Fail</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <!-- dito yun ah -->
                                    <div class="col-md-6">
                                        <div class="accordion" id="infraAccordion">
                                            <!-- INFRA Information Header -->
                                            <div class="card">
                                                <div class="card-header" id="infraHeading">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#infraCollapse" aria-expanded="true" aria-controls="infraCollapse">
                                                            <strong>for INFRA:</strong>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <!-- INFRA Information Collapse -->
                                                <div id="infraCollapse" class="collapse collapsed" aria-labelledby="infraHeading" data-parent="#infraAccordion">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Nature of Work:</label>
                                                                    <select class="form-control" name="nwork" id="nwork">
                                                                        <option disabled selected value="">Select Option</option>
                                                                        <option value="None">None</option>
                                                                        <option value="Pass">Pass</option>
                                                                        <option value="Fail">Fail</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Total Value at Completion:</label>
                                                                    <select class="form-control" name="vcompletion" id="vcompletion">
                                                                        <option disabled selected value="">Select Option</option>
                                                                        <option value="None">None</option>
                                                                        <option value="Pass">Pass</option>
                                                                        <option value="Fail">Fail</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Percentage of Planned:</label>
                                                                    <select class="form-control" name="percentage" id="percentage">
                                                                        <option disabled selected value="">Select Option</option>
                                                                        <option value="None">None</option>
                                                                        <option value="Pass">Pass</option>
                                                                        <option value="Fail">Fail</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Supported by Notice of Award/Notice to Proceed (if any):</label>
                                                                    <select class="form-control" name="notice" id="notice">
                                                                        <option disabled selected value="">Select Option</option>
                                                                        <option value="None">None</option>
                                                                        <option value="Pass">Pass</option>
                                                                        <option value="Fail">Fail</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Certificate of Final Inspection/Acceptance:</label>
                                                                    <select class="form-control" name="cert" id="cert">
                                                                        <option disabled selected value="">Select Option</option>
                                                                        <option value="None">None</option>
                                                                        <option value="Pass">Pass</option>
                                                                        <option value="Fail">Fail</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Total Contract Value at Award:</label>
                                                                            <select class="form-control" name="contractvalue" id="contractvalue">
                                                                                <option disabled selected value="">Select Option</option>
                                                                                <option value="None">None</option>
                                                                                <option value="Pass">Pass</option>
                                                                                <option value="Fail">Fail</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Contractor’s Role:</label>
                                                                            <select class="form-control" name="crole" id="crole">
                                                                                <option disabled selected value="">Select Option</option>
                                                                                <option value="None">None</option>
                                                                                <option value="Pass">Pass</option>
                                                                                <option value="Fail">Fail</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Date of Completion:</label>
                                                                            <select class="form-control" name="dcompletion" id="dcompletion">
                                                                                <option disabled selected value="">Select Option</option>
                                                                                <option value="None">None</option>
                                                                                <option value="Pass">Pass</option>
                                                                                <option value="Fail">Fail</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        <div class=" modal-footer">
                            <input type="hidden" name="id" id="res_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php if (isset($_SESSION['username'])) : ?>
                                <button type="submit" class="btn btn-primary">Update</button>
                            <?php endif ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Goods Modal -->
            <!--<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit/View Merchant Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_merchant.php" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="1000000">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="my_camera1" style="width: 370px; height: 250;" class="text-center">
                                            <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250" id="image">
                                        </div>
                                        <?php if (isset($_SESSION['username'])) : ?>
                                            <div class="form-group d-flex justify-content-center">
                                                <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam1">Open Camera</button>
                                                <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo1()">Capture</button>
                                            </div>
                                            <div id="profileImage1">
                                                <input type="hidden" name="profileimg">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="img" accept="image/*">
                                            </div>
                                        <?php endif ?>
                                        <div class="form-group">
                                            <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="inactive" value="1" class="selectgroup-input" checked="" id="active">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-check-circle"></i></span>
                                                </label>
                                                <p class="mt-1 mr-3"><b>Active</b></p>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="inactive" value="0" class="selectgroup-input" id="inactive">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-times-circle"></i></span>
                                                </label>
                                                <p class="mt-1 mr-3"><b>Inactive</b></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Receipt No.</label>
                                            <input type="text" class="form-control" name="national" id="nat_id" placeholder="Enter Receipt No.">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Merchant Name</label>
                                                    <input type="text" class="form-control text-uppercase" placeholder="Enter Merchant Name" name="fname" id="fname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" placeholder="Enter Contact Number" name="number" id="number">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Project to Bid</label>
                                                    <select class="form-control text-uppercase" required name="purok" id="purok">
                                                        <option disabled selected>Select Project to Bid</option>
                                                        <?php foreach ($purok as $row) : ?>
                                                            <option value="<?= strtoupper($row['name']) ?>"><?= strtoupper($row['name']) ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SEC</label>
                                                    <select class="form-control sec" required name="sec" id="sec">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>DTI</label>
                                                    <select class="form-control dti" required name="dti" id="dti">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CDA</label>
                                                    <select class="form-control cda" required name="cda" id="cda">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" required placeholder="Enter Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Bidding Category</label>
                                                    <select class="form-control" disabled id="category" name="category">
                                                        <option disabled selected>Select Bidding Category</option>
                                                        <?php foreach ($category as $row) : ?>
                                                            <option value="<?= $row['title'] ?>"><?= $row['title'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <label><strong>GENERAL:</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Owner’s Name and Address:</label>
                                                    <select class="form-control" required name="ownername" id="ownername">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Name of Contract:</label>
                                                    <select class="form-control" required name="ncontract" id="ncontract">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contract Duration:</label>
                                                    <select class="form-control" required name="cduration" id="cduration">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Date of Contract:</label>
                                                    <select class="form-control" required name="dcontract" id="dcontract">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label><strong>for GOODS:</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Date of Delivery:</label>
                                                    <select class="form-control" required name="datedelivery" id="datedelivery">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Kind of Goods:</label>
                                                    <select class="form-control" required name="kgoods" id="kgoods">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>NOA,CONTRACT & NTP (IF ANY):</label>
                                                    <select class="form-control" required name="noa" id="noa">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Production/delivery schedule:</label>
                                                    <select class="form-control" required name="production" id="production">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Manpower Requirements:</label>
                                                    <select class="form-control" required name="manpower" id="manpower">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>for GOODS:</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>End User’s Acceptance or Official Receipts/ Sales Invoice:</label>
                                                    <select class="form-control" required name="enduser" id="enduser">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>After sales/parts (if applicable):</label>
                                                    <select class="form-control" required name="after" id="after">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                        </div>
                        <div class=" modal-footer">
                            <input type="hidden" name="id" id="res_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php if (isset($_SESSION['username'])) : ?>
                                <button type="submit" class="btn btn-primary">Update</button>
                            <?php endif ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>-->

            <!-- Infra Modal -->
            <!--<div class="modal fade" id="edit2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit/View Merchant Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_merchant.php" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="1000000">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="my_camera1" style="width: 370px; height: 250;" class="text-center">
                                            <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250" id="image">
                                        </div>
                                        <?php if (isset($_SESSION['username'])) : ?>
                                            <div class="form-group d-flex justify-content-center">
                                                <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam1">Open Camera</button>
                                                <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo1()">Capture</button>
                                            </div>
                                            <div id="profileImage1">
                                                <input type="hidden" name="profileimg">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="img" accept="image/*">
                                            </div>
                                        <?php endif ?>
                                        <div class="form-group">
                                            <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="inactive" value="1" class="selectgroup-input" checked="" id="active">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-check-circle"></i></span>
                                                </label>
                                                <p class="mt-1 mr-3"><b>Active</b></p>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="inactive" value="0" class="selectgroup-input" id="inactive">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-times-circle"></i></span>
                                                </label>
                                                <p class="mt-1 mr-3"><b>Inactive</b></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Receipt No.</label>
                                            <input type="text" class="form-control" name="national" id="nat_id" placeholder="Enter Receipt No.">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Merchant Name</label>
                                                    <input type="text" class="form-control text-uppercase" placeholder="Enter Merchant Name" name="fname" id="fname" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" placeholder="Enter Contact Number" name="number" id="number">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Project to Bid</label>
                                                    <select class="form-control text-uppercase" required name="purok" id="purok">
                                                        <option disabled selected>Select Project to Bid</option>
                                                        <?php foreach ($purok as $row) : ?>
                                                            <option value="<?= strtoupper($row['name']) ?>"><?= strtoupper($row['name']) ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SEC</label>
                                                    <select class="form-control sec" required name="sec" id="sec">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>DTI</label>
                                                    <select class="form-control dti" required name="dti" id="dti">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CDA</label>
                                                    <select class="form-control cda" required name="cda" id="cda">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" required placeholder="Enter Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Bidding Category</label>
                                                    <select class="form-control" disabled id="category" name="category">
                                                        <option disabled selected>Select Bidding Category</option>
                                                        <?php foreach ($category as $row) : ?>
                                                            <option value="<?= $row['title'] ?>"><?= $row['title'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <label><strong>GENERAL:</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Owner’s Name and Address:</label>
                                                    <select class="form-control" required name="ownername" id="ownername">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Name of Contract:</label>
                                                    <select class="form-control" required name="ncontract" id="ncontract">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contract Duration:</label>
                                                    <select class="form-control" required name="cduration" id="cduration">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Date of Contract:</label>
                                                    <select class="form-control" required name="dcontract" id="dcontract">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label><strong>for INFRA:</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Total Contract Value at Award:</label>
                                                    <select class="form-control" required name="contractvalue" id="contractvalue">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Contractor’s Role:</label>
                                                    <select class="form-control" required name="crole" id="crole">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Date of Completion:</label>
                                                    <select class="form-control" required name="dcompletion" id="dcompletion">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Supported by Notice of Award/Notice to Proceed (if any):</label>
                                                    <select class="form-control" required name="notice" id="notice">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>for INFRA:</strong></label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Nature of Work:</label>
                                                    <select class="form-control" required name="nwork" id="nwork">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Total Value at Completion:</label>
                                                    <select class="form-control" required name="vcompletion" id="vcompletion">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Percentage of Planned:</label>
                                                    <select class="form-control" required name="percentage" id="percentage">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Certificate of Final Inspection/Acceptance:</label>
                                                    <select class="form-control" required name="cert" id="cert">
                                                        <option disabled selected value="">Select Option</option>
                                                        <option value="None">None</option>
                                                        <option value="Pass">Pass</option>
                                                        <option value="Fail">Fail</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class=" modal-footer">
                            <input type="hidden" name="id" id="res_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php if (isset($_SESSION['username'])) : ?>
                                <button type="submit" class="btn btn-primary">Update</button>
                            <?php endif ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>-->

            <!-- Main Footer -->
            <?php include 'templates/main-footer.php' ?>
            <!-- End Main Footer -->

        </div>

    </div>
    <?php include 'templates/footer.php' ?>
    <script>
        document.getElementById('purokSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var abcValue = selectedOption.getAttribute('data-abc');
            var formattedAbcValue = parseFloat(abcValue).toLocaleString(); // Number formatting
            document.getElementById('abcDisplay').innerText = formattedAbcValue;
            document.getElementById('abcDisplay').style.display = 'block';

            document.getElementById('abcInput').value = abcValue;

        });
    </script>

    <script>
        var clipboard = new ClipboardJS('.btn-primary');
    </script>
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#residenttable').DataTable();
        });
    </script>
</body>

</html>