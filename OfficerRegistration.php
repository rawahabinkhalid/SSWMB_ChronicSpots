<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Officer Registration | Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https:////cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />

    <!-- firebase -->
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-storage.js"></script>


    <style>
    .form_button {
        padding: 10px 30px;
        border-radius: 10px;
        border: none;
        background-color: #9BBAE6;
        color: #fff;
        font-weight: bold;
        font-size: 16.5px;
        letter-spacing: 1.5px;
    }

    .form_button:hover {
        padding: 10px 30px;
        border-radius: 10px;
        border: none;
        background-color: #8CE88C;
        color: #000;
        font-weight: bold;
        font-size: 16.5px;
        letter-spacing: 1.5px;
    }
    </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
          include "header.php";
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
          include "sidebar_menu.php";
        ?>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Officer Registration</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name Of Officer:</label>
                                <input type="text" name="nameofofficer" id="nameofofficer" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Designation:</label>
                                <input type="text" name="designation" id="designation" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile #:</label>
                                <input type="text" name="mobileno" id="mobileno" class="form-control"
                                    data-inputmask="'mask': '9999-9999999'" id="cellno" onchange="checkNumber();"
                                    placeholder="e.g. 0300-0000000" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                <label> <input type="radio" id="Android" name="devicename" value="Android" class="ml-3">
                                    Android</label>
                                <label> <input type="radio" id="Iphone" name="devicename" value="Iphone" class="ml-3"
                                        checked>
                                    Iphone</label><br>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="macIdImei">UDID Number:</label>
                                <input type="text" name="macid_imei" id="macid_imei" class="form-control" required>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>IMEI Of Device:</label>
                                <input type="text" name="macid_imei" id="macid_imei" class="form-control" required>
                            </div>
                        </div> -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Employee Code:</label>
                                <input type="text" name="empcode" id="empcode" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Other:</label>
                                <input type="text" name="other" id="other" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <button type="button" id="submitbutton" class="btn shadow form_button">Submit</button>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="myTable">
                                <thead style="background-color: #8CE88C">
                                    <tr>
                                        <th>Name Of Officer</th>
                                        <th>Designation</th>
                                        <th>Mobile #</th>
                                        <th>DeviceName</th>
                                        <th>Mac Address / IMEI Of Device</th>
                                        <th>Emp Code</th>
                                        <th>Other</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="officerRegistration_tabledata">
                                    <!-- <tr>
                                <td>Abdul Rafay Ahmed</td>
                                <td>Web Developer</td>
                                <td>65432-7654321</td>
                                <td>1</td>
                                <td>None</td>
                                <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                                </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br><br>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Officer Registration Edit Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Name Of Officer:</label>
                                    <input type="text" id="editnameofofficer" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Designation:</label>
                                    <input type="text" id="editdesignation" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile #:</label>
                                    <input type="text" id="editmobileno" class="form-control"
                                        data-inputmask="'mask': '9999-9999999'" onchange="checkNumber();"
                                        placeholder="e.g. 0300-0000000" required>
                                </div>
                            </div>
                            <div class="col-md-3 mt-1">
                                <div class="form-group">
                                    <label><input type="radio" id="editAndroid" name="editdevicename" value="Android">
                                        Android</label><br>
                                    <label><input type="radio" id="editIphone" name="editdevicename" value="Iphone">
                                        Iphone</label><br>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label id="editmacIdImei">UDID/IMEI Number:</label>
                                    <input type="text" id="editmacid_imei" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Emp Code:</label>
                                    <input type="text" id="editempcode" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Other:</label>
                                    <input type="text" id="editother" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="submitButtonEdit" class="btn btn-success">SUBMIT</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="https://matz.group/" target="_blank">Matz Solutions Pvt
                    Ltd</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.0-rc.1
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- CELL NO VALIDATION -->
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <script>
    // ALL FIELD REQUIRED FUNCTIONALITY -> SIMPLE FORM
    $('#submitbutton').click(function() {
        if ($('#nameofofficer').val() == '' || $('#designation').val() == '' || $('#mobileno').val() == '' || $(
                '#macid_imei').val() == '' || $('#empcode').val() == '' || $('#other').val() == '') {
            alert('Input can not be left blank');
        } else {
            save();
        }
    });

    // ALL FIELD REQUIRED FUNCTIONALITY -> MODAL BOX FORM
    $('#submitButtonEdit').click(function() {
        if ($('#editnameofofficer').val() == '' || $('#editdesignation').val() == '' || $('#editmobileno')
        .val() == '' || $('#editmacid_imei').val() == '' || $('#editempcode').val() == '' || $('#editother')
            .val() == '') {
            alert('Input can not be left blank');
        } else {
            save_edit(this.value);
        }
    });
    </script>

    <script>
    //  Mac/IMEI Device Number radio button checked and change input box
    $('#Android').on('click', function() {
        if ($(this).is(':checked')) {
            $('#macIdImei').html('IMEI Number');
        } else {
            $('#macIdImei').html('UDID Number');
        }
    })
    $('#Iphone').on('click', function() {
        if ($(this).is(':checked')) {
            $('#macIdImei').html('UDID Number');
        } else {
            $('#macIdImei').html('IMEI Number');
        }
    })
    </script>

    <script>
    // Mobile Number Validation FUnctionality
    $(":input").inputmask();

    function checkNumber() {
        str = document.getElementById('mobileno').value;
        console.log(str)
        if (str.substring(0, 2) == '03') {
            jQuery('#submitbutton').prop("disabled", false);
        } else {
            alert('Please enter correct mobile number');
            jQuery('#submitbutton').prop("disabled", true);
            return false;
        }
    }
    </script>

    <script>
    $('#header_heading').html("OFFICER REGISTRATION");
    </script>

    <!-- Firebase API -->
    <script src="FireBase.js"></script>

    <!-- ///////////////////////////////////////////////////////////////////////////////////// -->


    <!-- DATA INSERT IN FIREBASE -> FIRESTORE TABLE (SSWMB) -->
    <script>
    function save() {
        var nameofofficer = document.getElementById('nameofofficer').value;
        var designation = document.getElementById('designation').value;
        var mobileno = document.getElementById('mobileno').value;
        var devicename = '';
        if ($('#Iphone').is(':checked')) {
            devicename = 'Iphone';
        } else {
            devicename = 'Android';
        }
        var macid_imei = document.getElementById('macid_imei').value;
        var empcode = document.getElementById('empcode').value;
        var other = document.getElementById('other').value;

        // Add a new document in collection "SSWMB"
        db.collection("SSWMB").doc(macid_imei).set({
                nameofofficer: nameofofficer,
                designation: designation,
                mobileno: mobileno,
                devicename: devicename,
                macid_imei: macid_imei,
                empcode: empcode,
                other: other,
                status: 'Active',
            })
            .then(function() {
                location.reload(alert("Your Form Has Been Submitted Successfully"));
                // console.log("Document successfully written!");
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
    }
    </script>

    <!-- GET DATA IN ***TABLE (SSWMB)*** FIREBASE -> FIRESTORE -->
    <script>
    db.collection("SSWMB").get().then(function(querySnapshot) {
        content = '';
        querySnapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.id;
            console.log(childSnapshot);
            console.log(childKey);
            var childData = childSnapshot.data();
            content += '<tr>';
            content += '<td>' + childData.nameofofficer + '</td>';
            content += '<td>' + childData.designation + '</td>';
            content += '<td>' + childData.mobileno + '</td>';
            content += '<td>' + childData.devicename + '</td>';
            content += '<td>' + childData.macid_imei + '</td>';
            content += '<td>' + childData.empcode + '</td>';
            content += '<td>' + childData.other + '</td>';
            var status = 'Inactive';
            if (childData.status == 'Inactive')
                status = 'Active';
            content += '<td><button type="button" value="' + childKey +
                '"  class="btn btn-primary editButton" data-toggle="modal" data-target="#myModal">Edit</button> <button type="button" value="' +
                childKey +
                '" class="btn btn-danger deletebutton">Delete</button> <button type="button" value="' +
                childKey + '" class="btn btn-warning active_inactivebutton">' + status +
                '</button></td>';
            content += '</tr>';
        });
        $('#officerRegistration_tabledata').html(content);

        $('#myTable').DataTable();
    });
    </script>

    <script>
    // OFFICER STATUS CHANGED FUNTIONALITY
    $(document).on('click', '.active_inactivebutton', function() {
        var id = $(this).val();
        var html = $(this).html();
        console.log(id)
        console.log(html)

        var status = 'Active';
        if (html == 'Inactive')
            status = 'Inactive';
        db.collection("SSWMB").doc(id).update({
                status: status
            })
            .then(function() {
                location.reload(alert("Officer Status Changed Successfully"));
                // console.log("Document successfully written!");
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
    })
    </script>

    <script>
    // ***** ThIS IS DELEGATE FUNCTION *****

    //  EDIT Mac/IMEI Device Number radio button checked
    $('#editAndroid').on('click', function() {
        if ($(this).is(':checked')) {
            $('#editmacIdImei').html('IMEI Number');

            $("input").attr({
                "max": 15, // substitute your own
                "min": 10 // values (or variables) here
            });
            
        } else {
            $('#editmacIdImei').html('UDID Number');

            $("input").attr({
                "max": 21, // substitute your own
                "min": 15 // values (or variables) here
            });
        }
    })
    $('#editIphone').on('click', function() {
        if ($(this).is(':checked')) {
            $('#editmacIdImei').html('UDID Number');
        } else {
            $('#editmacIdImei').html('IMEI Number');
        }
    })

    // EDIT-FORM USING MODAL BOX IN FIREBASE -> FIRESTORE
    $(document).on('click', '.editButton', function() {
        var id = $(this).val();
        $('#submitButtonEdit').val(id);
        // alert(id);
        db.collection("SSWMB").doc(id).get().then(function(doc) {
            if (doc.exists) {
                var editChild = doc.data();
                console.log(editChild);
                $('#editnameofofficer').val(editChild.nameofofficer);
                $('#editdesignation').val(editChild.designation);
                $('#editmobileno').val(editChild.mobileno);
                if (editChild.devicename == "Iphone")
                    $('#editIphone').prop('checked', true);
                else
                    $('#editAndroid').prop('checked', true);
                $('#editmacid_imei').val(editChild.macid_imei);


                $('#editempcode').val(editChild.empcode);
                $('#editother').val(editChild.other);
            }
        });
    })

    // EDIT-FORM SUBMIT IN FIREBASE -> FIRESTORE (SSWMB) TABLE
    function save_edit(id) {
        var editnameofofficer = document.getElementById('editnameofofficer').value;
        var editdesignation = document.getElementById('editdesignation').value;
        var editmobileno = document.getElementById('editmobileno').value;
        var editdevicename = '';
        if ($('#editIphone').is(':checked')) {
            editdevicename = 'Iphone';
        } else {
            editdevicename = 'Android';
        }
        var editmacid_imei = document.getElementById('editmacid_imei').value;
        var editempcode = document.getElementById('editempcode').value;
        var editother = document.getElementById('editother').value;

        // console.log(editnameofofficer + ' ' + editdesignation + ' ' + editmobileno);

        db.collection("SSWMB").doc(editmacid_imei).update({
                nameofofficer: editnameofofficer,
                designation: editdesignation,
                mobileno: editmobileno,
                devicename: editdevicename,
                macid_imei: editmacid_imei,
                empcode: editempcode,
                other: editother,
            })
            .then(function() {
                location.reload(alert("Your Form Has Been Submitted Successfully"));
                // console.log("Document successfully written!");
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
    }

    // DELETE ROW IN TABLE USING FIREBASE -> FIRESTORE (SSWMB) TABLE
    $(document).on('click', '.deletebutton', function() {
        var id = $(this).val();
        db.collection("SSWMB").doc(id).delete().then(function() {
                console.log("Remove succeeded.")
            })
            .then(function() {
                location.reload(alert("Row Has Been Deleted Successfully"));
                // console.log("Document successfully written!");
            })
            .catch(function(error) {
                console.log("Remove failed: " + error.message)
            });
    })
    </script>

</body>

</html>