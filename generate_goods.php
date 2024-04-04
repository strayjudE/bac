<?php include 'server/server.php' ?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM tblresident WHERE id='$id'";
$result = $conn->query($query);
$resident = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'templates/header.php' ?>
    <title>Generate Checklist - Bidding Management System GOODS</title>
    <style>
        .border-bottom {
            border-bottom: 30px solid #000;
            display: inline-block;
            padding-bottom: 5px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
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
                                <h2 class="text-white fw-bold">Generate Checklist</h2>
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
                                        <div class="card-title">Checklist</div>
                                        <div class="card-tools">
                                            <button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
                                                <i class="fa fa-print"></i>
                                                Print Report
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body m-5" id="printThis">
                                    <div class="d-flex flex-wrap justify-content-center align-items-center" style="border-bottom: 1px solid red">
                                        <div class="text-center">
                                            <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100">
                                        </div>
                                        <div class="text-center flex-grow-1">
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Office of the City Mayor</h3>
                                            <h3 class="fw-bold mb-0">BIDS AND AWARDS COMMITTEE</h3>
                                            <p><i>San Carlos City, Pangasinan</i></p>
                                        </div>
                                        <div class="ms-auto mt-3 text-end">
                                            <h3 class="col-lg-12 col-md-12 col-sm-12 text-left">GOODS TECHNICAL 1</h3>
                                            <h3 class="mt-2 col-lg-12 col-md-12 col-sm-12 text-left">Date:________________</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">NAME OF CONTRACT:
                                                            <div class="col border-bottom">
                                                                <?= strtoupper($resident['purok']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">BIDDER/(S) NAME: <div class="border-bottom">
                                                                <?= strtoupper($resident['firstname']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">APPROVED BUDGET FOR THE CONTRACT: ₱<div class="border-bottom">
                                                                <?= number_format($resident['abc']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>TECHNICAL COMPONENT</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/border.png" alt="" class="img-fluid" style>
                                            </div>
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Class "A" Documents</strong></h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left"><strong>Legal Documents</strong></h3>
                                            </div>
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>a.</strong> Valid <strong>PHILGEPS Registration Certificate (Platinum Membership)</strong> (all pages) <br>
                                                    &nbsp;&nbsp;Date of Registration:__________ Expiry Date:_________________ <br><br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<strong>Registration Certificate:</strong> <br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?= ($resident['sec'] == 'None' || $resident['sec'] == '') ? '____SEC' : (($resident['sec'] == 'Pass') ? '__/__SEC' : '__X__SEC') ?>&nbsp;&nbsp;or&nbsp;&nbsp;<?= ($resident['dti'] == 'None' || $resident['dti'] == '') ? '____DTI' : (($resident['dti'] == 'Pass') ? '__/__DTI' : '__X__DTI') ?>&nbsp;&nbsp;or&nbsp;&nbsp;<?= ($resident['cda'] == 'None' || $resident['cda'] == '') ? '____CDA' : (($resident['cda'] == 'Pass') ? '__/__CDA' : '__X__CDA') ?></strong><br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<strong>Mayor’s or Business Permit</strong> issued by the City/Municipality where the principal place of the business of the prospective bidder is located. <br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<strong>Tax Clearance</strong> per E.O. No. 398, s. 2005 as finally reviewed and approved by the Bureau of Internal Revenue (BIR)
                                                </h3>
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Other Related Certifications/ Registration and Permits.</strong></h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Technical Documents</strong></h3>
                                            </div>
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>b.</strong> <strong>Statement of the prospective bidder of all its ongoing government and private Contracts, including contracts awarded but not yet started</strong>, if any, whether similar or not similar in nature and complexity to the contract to be bid; Statement shall indicate the ff.
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['o_name'] == 'None' || $resident['o_name'] == '') ? 'fa-regular fa-square' : (($resident['o_name'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Owner’s Name and Address
                                                        </label>
                                                        <i class="<?= ($resident['n_contract'] == 'None' || $resident['n_contract'] == '') ? 'fa-regular fa-square' : (($resident['n_contract'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Name of Contracts
                                                        </label>
                                                    </div>
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['d_delivery'] == 'None' || $resident['d_delivery'] == '') ? 'fa-regular fa-square' : (($resident['d_delivery'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Date of Delivery
                                                        </label>
                                                        <i class="<?= ($resident['c_duration'] == 'None' || $resident['c_duration'] == '') ? 'fa-regular fa-square' : (($resident['c_duration'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Contract Duration
                                                        </label>
                                                        <i class="<?= ($resident['d_contract'] == 'None' || $resident['d_contract'] == '') ? 'fa-regular fa-square' : (($resident['d_contract'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Date of Contract
                                                        </label>
                                                    </div>
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['noa'] == 'None' || $resident['noa'] == '') ? 'fa-regular fa-square' : (($resident['noa'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            NOA,CONTRACT & NTP (IF ANY)
                                                        </label>
                                                        <i class="<?= ($resident['k_goods'] == 'None' || $resident['k_goods'] == '') ? 'fa-regular fa-square' : (($resident['k_goods'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label" style="font-size: 0.5em;">
                                                            Kind of Goods
                                                        </label>
                                                    </div>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="d-flex flex-wrap justify-content-center align-items-center" style="border-bottom: 1px solid red">
                                        <div class="text-center">
                                            <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100">
                                        </div>
                                        <div class="text-center flex-grow-1">
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Office of the City Mayor</h3>
                                            <h3 class="fw-bold mb-0">BIDS AND AWARDS COMMITTEE</h3>
                                            <p><i>San Carlos City, Pangasinan</i></p>
                                        </div>
                                        <div class="ms-auto mt-3 text-end">
                                            <h3 class="col-lg-12 col-md-12 col-sm-12 text-left">GOODS TECHNICAL 2</h3>
                                            <h3 class="mt-2 col-lg-12 col-md-12 col-sm-12 text-left">Date:________________</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">NAME OF CONTRACT:
                                                            <div class="col border-bottom">
                                                                <?= strtoupper($resident['purok']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">BIDDER/(S) NAME: <div class="border-bottom">
                                                                <?= ucwords($resident['firstname']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>c.</strong> <strong>Statement of the bidder’s Single Largest Completed Contract (SLCC)</strong> similar to the contract to be bid, except under conditions provided for in Sections 23.4.1.3 and 23.4.2.4 of the 2016 revised IRR of R.A. No. 9184, within the relevant period as provided in the Bidding Documents; Statement shall indicate the ff.
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['o_name'] == 'None' || $resident['o_name'] == '') ? 'fa-regular fa-square' : (($resident['o_name'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Owner’s Name and Address
                                                        </label>
                                                        <i class="<?= ($resident['n_contract'] == 'None' || $resident['n_contract'] == '') ? 'fa-regular fa-square' : (($resident['n_contract'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Name of Contracts
                                                        </label>
                                                        <i class="<?= ($resident['k_goods'] == 'None' || $resident['k_goods'] == '') ? 'fa-regular fa-square' : (($resident['k_goods'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Kind of Goods
                                                        </label>
                                                    </div>
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['d_delivery'] == 'None' || $resident['d_delivery'] == '') ? 'fa-regular fa-square' : (($resident['d_delivery'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Date of Delivery
                                                        </label>
                                                        <i class="<?= ($resident['c_duration'] == 'None' || $resident['c_duration'] == '') ? 'fa-regular fa-square' : (($resident['c_duration'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Contract Duration
                                                        </label>
                                                        <i class="<?= ($resident['d_contract'] == 'None' || $resident['d_contract'] == '') ? 'fa-regular fa-square' : (($resident['d_contract'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Date of Contract
                                                        </label>
                                                    </div>
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['sales'] == 'None' || $resident['sales'] == '') ? 'fa-regular fa-square' : (($resident['sales'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            End User’s Acceptance or Official Receipts/ Sales Invoice
                                                        </label>
                                                    </div>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>d.</strong> <strong>Original copy of Bid Security</strong>. If in the form of a Surety Bond, submit also a certification issued by the Insurance Commission <strong>or</strong>Original copy of <strong>Notarized Bid Securing Declaration;</strong>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-sm-0"> <!-- Use mt-sm-0 to remove margin on small screens -->
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>e.</strong> <strong>Conformity with the Technical Specification </strong> which may include;
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['production'] == 'None' || $resident['production'] == '') ? 'fa-regular fa-square' : (($resident['production'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Production/delivery schedule
                                                        </label>
                                                        <i class="<?= ($resident['manpower'] == 'None' || $resident['manpower'] == '') ? 'fa-regular fa-square' : (($resident['manpower'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            Manpower Requirements
                                                        </label>
                                                    </div>
                                                    <div class="form-check row">
                                                        <i class="<?= ($resident['aftersales'] == 'None' || $resident['aftersales'] == '') ? 'fa-regular fa-square' : (($resident['aftersales'] == 'Pass') ? 'far fa-check-square' : 'far fa-times-circle') ?>" style="font-size: 1.5em;"></i>
                                                        <label class="form-check-label">
                                                            After sales/parts (if applicable)
                                                        </label>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>f.</strong> Original duly signed <strong>Omnibus Sworn Statement (OSS); </strong> and if applicable, original Notarized Secretary’s Certificate in case of a corporation , partnership, or cooperative; or original Special Power of Attorney of all members of the joint venture giving power of authority to its officer to sign the OSS and do acts to represent the Bidder.
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Financial Documents</strong></h3>
                                            </div>
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong> The Supplier’s Audited Financial Statements</strong>, showing among others, the Supplier’s total assets and liabilities, stamped “received” by the BIR or its duly accredited and authorize institution, for the preceding calendar year which should not be earlier than two (2) years from the date of bid submission;
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex flex-wrap justify-content-center align-items-center" style="border-bottom: 1px solid red">
                                        <div class="text-center">
                                            <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100">
                                        </div>
                                        <div class="text-center flex-grow-1">
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Office of the City Mayor</h3>
                                            <h3 class="fw-bold mb-0">BIDS AND AWARDS COMMITTEE</h3>
                                            <p><i>San Carlos City, Pangasinan</i></p>
                                        </div>
                                        <div class="ms-auto mt-3 text-end">
                                            <h3 class="col-lg-12 col-md-12 col-sm-12 text-left">GOODS TECHNICAL 3</h3>
                                            <h3 class="mt-2 col-lg-12 col-md-12 col-sm-12 text-left">Date:________________</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">NAME OF CONTRACT:
                                                            <div class="col border-bottom">
                                                                <?= strtoupper($resident['purok']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">BIDDER/(S) NAME: <div class="border-bottom">
                                                                <?= ucwords($resident['firstname']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>g.</strong> The prospective bidder’s computation of <strong>Net Financial Contracting Capacity (NFCC);</strong> or A committed Line Of Credit from a Universal or Commercial Bank in lieu of its NFCC computation;
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Class "B" Documents</strong></h3>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid" style>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>h.</strong> If applicable, a duly signed <strong> Joint Venture Agreement (JVA) </strong> in case the joint venture is already existence; or duly notarized statements from all the potential joint venture stating that they will enter into and abide by the provision of the JVA in the instance that the bid is successful;
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br><br>
                                    <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<strong>Note:</strong> Any missing documents in the above-mentioned checklist is a ground for outright rejection of the bid.
                                    </h3>
                                    <br>
                                    <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-center">
                                        <strong>REMARK: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa-regular fa-square" style="font-size: 1.5em;"></i>
                                            COMPLYING&nbsp;&nbsp;&nbsp;&nbsp; <i class="<?=
                                                                                        ($resident['dti'] == 'Fail' || $resident['sec'] == 'Fail' || $resident['cda'] == 'Fail' || $resident['o_name'] == 'Fail' || $resident['n_contract'] == 'Fail' || $resident['k_goods'] == 'Fail' || $resident['d_delivery'] == 'Fail' || $resident['c_duration'] == 'Fail' || $resident['d_contract'] == 'Fail' || $resident['noa'] == 'Fail' || $resident['sales'] == 'Fail' || $resident['production'] == 'Fail' || $resident['manpower'] == 'Fail' || $resident['aftersales'] == 'Fail')
                                                                                            ? 'far fa-check-square'
                                                                                            : 'fa-regular fa-square'
                                                                                        ?>" style="font-size: 1.5em;"></i>
                                            NON-COMPLYING
                                        </strong>
                                    </h3>
                                    <h2 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-center">
                                        <strong>BIDS AND AWARDS COMMITTEE</strong>
                                    </h2>

                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>ARLAINE M. DE VERA</strong><br>BAC Member</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>ATTY. TEOFILO J. ROYULADA, JR.</strong><br>BAC Member</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>ALEJANDRO R. FERMIN III, CPA</strong><br>BAC Member</h3>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>JHULIANO G. NAZARENO</strong><br>BAC Member</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>LOURDES R. PINTO</strong><br>BAC Vice-Chairperson</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>_______________________</strong><br>BAC– End User</h3>
                                        </div>
                                    </div>
                                    <br><br>
                                    <h3 class="mt5 text-center"><strong>VOLTAIRE ENRICO R. CABUAY</strong><br>BAC Chairperson</h3>
                                    <h3 class="mt-5 text-right">
                                        <strong>__________________________</strong>
                                        <br>
                                        <span class="d-block mx-auto">Evaluator</span>
                                    </h3>

                                    <br><br><br><br><br><br><br><br><br>
                                    <div class="d-flex flex-wrap justify-content-center align-items-center" style="border-bottom: 1px solid red">
                                        <div class="text-center">
                                            <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100">
                                        </div>
                                        <div class="text-center flex-grow-1">
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Office of the City Mayor</h3>
                                            <h3 class="fw-bold mb-0">BIDS AND AWARDS COMMITTEE</h3>
                                            <p><i>San Carlos City, Pangasinan</i></p>
                                        </div>
                                        <div class="ms-auto mt-3 text-end">
                                            <h3 class="col-lg-12 col-md-12 col-sm-12 text-left">GOODS FINANCIAL 1</h3>
                                            <h3 class="mt-2 col-lg-12 col-md-12 col-sm-12 text-left">Date:________________</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">NAME OF CONTRACT:
                                                            <div class="col border-bottom">
                                                                <?= strtoupper($resident['purok']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">BIDDER/(S) NAME: <div class="border-bottom">
                                                                <?= ucwords($resident['firstname']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">APPROVED BUDGET FOR THE CONTRACT: ₱<div class="border-bottom">
                                                                <?= number_format($resident['abc']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>FINANCIAL COMPONENT</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/border.png" alt="" class="img-fluid" style>
                                            </div>
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Class "B" Documents</strong></h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <!-- <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left"><strong>Legal Documents</strong></h3> -->.
                                            </div>
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>i.</strong> Original of duly signed and accomplished <strong>Financial Bid Form;</strong>
                                                </h3>
                                                <!-- <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Other Related Certifications/ Registration and Permits.</strong></h3> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <!-- <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left"><strong>Legal Documents</strong></h3> -->
                                            </div>
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>j.</strong> Original of duly signed and accomplished <strong>Price Schedule (s)</strong>
                                                </h3>
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">Other documentary requirements under RA No. 9184 (as applicable)</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>k.</strong> (For foreign bidders claiming by the reason of their country’s extension of reciprocal rights to Filipinos) certification from the relevant government office of their country stating that Filipinos are allowed to participate in government procurement activities for the same item or product.
                                                </h3>
                                                <!-- <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Other Related Certifications/ Registration and Permits.</strong></h3> -->
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div class="d-flex flex-wrap justify-content-center align-items-center" style="border-bottom: 1px solid red">
                                        <div class="text-center">
                                            <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="100">
                                        </div>
                                        <div class="text-center flex-grow-1">
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Office of the City Mayor</h3>
                                            <h3 class="fw-bold mb-0">BIDS AND AWARDS COMMITTEE</h3>
                                            <p><i>San Carlos City, Pangasinan</i></p>
                                        </div>
                                        <div class="ms-auto mt-3 text-end">
                                            <h3 class="col-lg-12 col-md-12 col-sm-12 text-left">GOODS FINANCIAL 2</h3>
                                            <h3 class="mt-2 col-lg-12 col-md-12 col-sm-12 text-left">Date:________________</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">NAME OF CONTRACT:
                                                            <div class="col border-bottom">
                                                                <?= strtoupper($resident['purok']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">BIDDER/(S) NAME: <div class="border-bottom">
                                                                <?= ucwords($resident['firstname']) ?>
                                                            </div>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                <img src="./assets/img/bordersss.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                                    <strong>l.</strong> Certification from the DTI if the bidder claims preference as a Domestic Bidder or Domestic Entity.
                                                </h3>
                                                <!-- <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left"><strong>Other Related Certifications/ Registration and Permits.</strong></h3> -->
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br><br>
                                    <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-left">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<strong>Note:</strong> Any missing documents in the above-mentioned checklist is a ground for outright rejection of the bid.
                                    </h3>
                                    <br>
                                    <h3 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-center">
                                        <strong>REMARK: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa-regular fa-square" style="font-size: 1.5em;"></i>
                                            COMPLYING&nbsp;&nbsp;&nbsp;&nbsp; <i class="<?=
                                                                                        ($resident['dti'] == 'Fail' || $resident['sec'] == 'Fail' || $resident['cda'] == 'Fail' || $resident['o_name'] == 'Fail' || $resident['n_contract'] == 'Fail' || $resident['k_goods'] == 'Fail' || $resident['d_delivery'] == 'Fail' || $resident['c_duration'] == 'Fail' || $resident['d_contract'] == 'Fail' || $resident['noa'] == 'Fail' || $resident['sales'] == 'Fail' || $resident['production'] == 'Fail' || $resident['manpower'] == 'Fail' || $resident['aftersales'] == 'Fail')
                                                                                            ? 'far fa-check-square'
                                                                                            : 'fa-regular fa-square'
                                                                                        ?>" style="font-size: 1.5em;"></i>
                                            NON-COMPLYING
                                        </strong>
                                    </h3>
                                    <h2 class="mt-5 col-lg-12 col-md-12 col-sm-12 mt-sm-2 text-center">
                                        <strong>BIDS AND AWARDS COMMITTEE</strong>
                                    </h2>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>ARLAINE M. DE VERA</strong><br>BAC Member</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>ATTY. TEOFILO J. ROYULADA, JR.</strong><br>BAC Member</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>ALEJANDRO R. FERMIN III, CPA</strong><br>BAC Member</h3>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>JHULIANO G. NAZARENO</strong><br>BAC Member</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>LOURDES R. PINTO</strong><br>BAC Vice-Chairperson</h3>
                                        </div>
                                        <div class="col-3">
                                            <h3 class="mt-5 text-center"><strong>_______________________</strong><br>BAC– End User</h3>
                                        </div>
                                    </div>
                                    <h3 class="mt5 text-center"><strong>VOLTAIRE ENRICO R. CABUAY</strong><br>BAC Chairperson</h3>
                                    <h3 class="mt-5 text-right">
                                        <strong>__________________________</strong>
                                        <br>
                                        <span class="d-block mx-auto">Evaluator</span>
                                    </h3>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <?php include 'templates/main-footer.php' ?>
    <!-- End Main Footer -->

    </div>

    </div>
    <?php include 'templates/footer.php' ?>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>