function editPos(that) {
    pos = $(that).attr('data-pos');
    order = $(that).attr('data-order');
    id = $(that).attr('data-id');

    $('#position').val(pos);
    $('#order').val(order);
    $('#pos_id').val(id);
}

function editChair(that) {
    title = $(that).attr('data-title');
    id = $(that).attr('data-id');

    $('#chair').val(title);
    $('#chair_id').val(id);
}

function editPurok(that) {
    purok = $(that).attr('data-name');
    details = $(that).attr('data-details');
    budg = $(that).attr('data-budget');
    id = $(that).attr('data-id');

    $('#budget').val(budg);
    $('#purok').val(purok);
    $('#details').val(details);
    $('#purok_id').val(id);
}

function editPrecinct(that) {
    precinct = $(that).attr('data-precinct');
    details = $(that).attr('data-details');
    id = $(that).attr('data-id');

    $('#precinct').val(precinct);
    $('#details').val(details);
    $('#precinct_id').val(id);
}

function editOfficial(that) {
    id = $(that).attr('data-id');
    na = $(that).attr('data-name');
    budg = $(that).attr('data-budget');
    chair = $(that).attr('data-chair');
    pos = $(that).attr('data-pos');
    start = $(that).attr('data-start');
    end = $(that).attr('data-end');
    status = $(that).attr('data-status');

    $('#off_id').val(id);
    $('#name').val(na);
    $('#budget').val(budg);
    $('#chair').val(chair);
    $('#position').val(pos);
    $('#start').val(start);
    $('#end').val(end);
    $('#status').val(status);
}

function editResident(that) {
    id = $(that).attr('data-id');
    cat = $(that).attr('data-category');
    pic = $(that).attr('data-img');
    nat_id = $(that).attr('data-national');
    fname = $(that).attr('data-fname');
    mname = $(that).attr('data-mname');
    lname = $(that).attr('data-lname');
    alias = $(that).attr('data-alias');
    bplace = $(that).attr('data-bplace');
    bdate = $(that).attr('data-bdate');
    age = $(that).attr('data-age');
    cstatus = $(that).attr('data-cstatus');
    gender = $(that).attr('data-gender');
    purok = $(that).attr('data-purok');
    vstatus = $(that).attr('data-vstatus');
    indetity = $(that).attr('data-indetity');
    email = $(that).attr('data-email');
    number = $(that).attr('data-number');
    address = $(that).attr('data-address');
    citi = $(that).attr('data-citi');
    occu = $(that).attr('data-occu');
    dead = $(that).attr('data-dead');
    remarks = $(that).attr('data-remarks');

    sec = $(that).attr('data-sec');
    dti = $(that).attr('data-dti');
    cda = $(that).attr('data-cda');
    oname = $(that).attr('data-oname');
    ncontract = $(that).attr('data-ncontract');
    cduration = $(that).attr('data-cduration');
    enduser = $(that).attr('data-enduser');
    dcontract = $(that).attr('data-dcontract');
    ddelivery = $(that).attr('data-datedelivery');
    kgoods = $(that).attr('data-kgoods');
    noa = $(that).attr('data-noa');
    production = $(that).attr('data-production');
    manpower = $(that).attr('data-manpower');
    after = $(that).attr('data-after');
    cvalue = $(that).attr('data-contractvalue');
    crole = $(that).attr('data-crole');
    dcompletion = $(that).attr('data-dcompletion');
    nwork = $(that).attr('data-nwork');
    vcompletion = $(that).attr('data-vcompletion');
    percentage = $(that).attr('data-percentage');
    notice = $(that).attr('data-notice');
    cert = $(that).attr('data-cert');

    $('#sec').val(sec);
    $('#dti').val(dti);
    $('#cda').val(cda);
    $('#ownername').val(oname);
    $('#ncontract').val(ncontract);
    $('#cduration').val(cduration);
    $('#dcontract').val(dcontract);
    $('#datedelivery').val(ddelivery);
    $('#kgoods').val(kgoods);
    $('#noa').val(noa);
    $('#enduser').val(enduser);
    $('#production').val(production);
    $('#manpower').val(manpower);
    $('#nwork').val(nwork);
    $('#vcompletion').val(vcompletion);
    $('#percentage').val(percentage);
    $('#notice').val(notice);
    $('#cert').val(cert);
    $('#after').val(after);
    $('#contractvalue').val(cvalue);
    $('#crole').val(crole);
    $('#dcompletion').val(dcompletion);

    $('#indetity').prop('disabled', false);
    $('#category').val(cat);
    $('#res_id').val(id);
    $('#nat_id').val(nat_id);
    $('#fname').val(fname);
    $('#mname').val(mname);
    $('#lname').val(lname);
    $('#alias').val(alias);
    $('#bplace').val(bplace);
    $('#bdate').val(bdate);
    $('#age').val(age);
    $('#cstatus').val(cstatus);
    $('#gender').val(gender);
    $('#purok').val(purok);
    $('#vstatus').val(vstatus);
    if (indetity === '') {
        $('#indetity').prop('disabled', 'disabled');
    } else {
        $('#indetity').val(indetity);

    }
    $('#email').val(email);
    $('#number').val(number);
    $('#address').text(address);
    $('#occupation').val(occu);
    $('#citizenship').val(citi);
    $('#remarks').val(remarks);

    if (dead == 1) {
        $("#active").prop("checked", true);
    } else {
        $("#inactived").prop("checked", true);
    }

    var str = pic;
    var n = str.includes("data:image");
    if (!n) {
        pic = 'assets/uploads/resident_profile/' + pic;
    }
    $('#image').attr('src', pic);
}



function editBlotter1(that) {
    id = $(that).attr('data-id');
    complainant = $(that).attr('data-complainant');
    respondent = $(that).attr('data-respondent');
    victim = $(that).attr('data-victim');
    type = $(that).attr('data-type');
    l = $(that).attr('data-l');
    date = $(that).attr('data-date');
    time = $(that).attr('data-time');
    details = $(that).attr('data-details');
    status = $(that).attr('data-status');

    $('#blotter_id').val(id);
    $('#complainant').val(complainant);
    $('#respondent').val(respondent);
    $('#victim').val(victim);
    $('#type').val(type);
    $('#location').val(l);
    $('#date').val(date);
    $('#time').val(time);
    $('#details').val(details);
    $('#status').val(status);
}

$('.vstatus').change(function () {
    var val = $(this).val();
    if (val == 'No') {
        $('.indetity').prop('disabled', 'disabled');
    } else {
        $('.indetity').prop('disabled', false);
    }
});

$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});


Webcam.set({
    height: 250,
    image_format: 'jpeg',
    jpeg_quality: 90
});

$('#open_cam').click(function () {
    Webcam.attach('#my_camera');
});

function save_photo() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap(function (data_uri) {
        // display results in page
        document.getElementById('my_camera').innerHTML =
            '<img src="' + data_uri + '"/>';
        document.getElementById('profileImage').innerHTML =
            '<input type="hidden" name="profileimg" id="profileImage" value="' + data_uri + '"/>';
    });
}

$('#open_cam1').click(function () {
    Webcam.attach('#my_camera1');
});

function save_photo1() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap(function (data_uri) {
        // display results in page
        document.getElementById('my_camera1').innerHTML =
            '<img src="' + data_uri + '"/>';
        document.getElementById('profileImage1').innerHTML =
            '<input type="hidden" name="profileimg" id="profileImage1" value="' + data_uri + '"/>';
    });
}

function goBack() {
    window.history.go(-1);
}