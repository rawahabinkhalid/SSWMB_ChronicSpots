<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Spot Assign | Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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

    .map-container {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-container iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
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
                                <li class="breadcrumb-item active">Spot Assign</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <form action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Spot Id:</label>
                                    <select type="text" name="spotid" id="spotid" class="form-control" required>
                                        <option value="">Please select Spots ID</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Emp Code:</label>
                                    <select name="empcode" id="empcode" class="form-control" required>
                                        <option value="">Please select Employee Code</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Contact Person:</label>
                                    <input type="text" name="contactperson" id="contactperson" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Concerned AD:</label>
                                    <input type="text" name="concerned_ad" id="concerned_ad" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mac ID/IMEI of Device:</label>
                                    <input type="text" name="macid_imei" id="macid_imei" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <button type="button" id="submitbutton" class="btn shadow form_button">Submit</button>
                            </div>
                        </div>
                        <br><br><br>
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="https://matz.group/" target="_blank">Matz Solutions Pvt Ltd</a>.</strong>
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

    <script>
    // ALL FIELD REQUIRED FUNCTIONALITY -> SIMPLE FORM
    $('#submitbutton').click(function() {
        if ($('#spotid').val() == '' || $('#empcode').val() == '' || $('#contactperson').val() == '' || $('#concerned_ad').val() == '' || $('#macid_imei').val() == '') {
            alert('Input can not be left blank');
        } else {
            save();            
        }
    });
    </script>

    <script>
    $('#header_heading').html("SPOT ASSIGNING");
    </script>

    <!-- Firebase API -->
    <script src="FireBase.js"></script>

    <!-- ////////////////////////////////////////////////////////////////////////////// -->

    <script>
    //FETCH "DISTRICT NAME" IN SELECT BOX
    db.collection("SPOTS").get().then(function(querySnapshot) {
        var options = '<option value="">Please Select Spots ID</option>';
        querySnapshot.forEach(function(doc) {
            var childKey = doc.id;
            options += '<option value="' + childKey + '">' + childKey + '</option>';
            // console.log(doc.id, " => ", childKey);
        });
        $('#spotid').html(options);
    });
    </script>

    <script>
    // DATA INSERT IN FIREBASE -> FIRESTORE TABLE(SPOTS)
    function save() {
        var spotid = document.getElementById('spotid').value;
        var empcode = document.getElementById('empcode').value;
        var contactperson = document.getElementById('contactperson').value;
        var concerned_ad = document.getElementById('concerned_ad').value;
        var macid_imei = document.getElementById('macid_imei').value;

        // console.log(sno + ' ' + spotid + ' ' + district);

        // Add a new document in collection "SSWMB"
        db.collection("SPOTS").doc(spotid).update({
            empcode: empcode,
            contactperson: contactperson,
            concerned_ad: concerned_ad,
            macid_imei: macid_imei,
        });

        //SPOTS ADD IN ARRAYFORM IN SSWMB TABLE
        db.collection("SSWMB").doc(macid_imei).get().then(function(doc) {
            if (doc.exists) {
                console.log("Document data:", doc.data());
                var spots = [];
                if (doc.data().spotid !== undefined)
                    spots = doc.data().spotid;
                spots.push(spotid);

                db.collection("SSWMB").doc(macid_imei).update({
                        spotid: spots,
                    })
                    .then(function() {
                        location.reload(alert("Your Form Has Been Submitted Successfully"));
                        // console.log("Document successfully written!");
                    })
                    .catch(function(error) {
                        console.error("Error writing document: ", error);
                    });
            } else {
                // doc.data() will be undefined in this case
                console.log("No such document!");
            }
        }).catch(function(error) {
            console.log("Error getting document:", error);
        });
    }
    </script>

    <script>
    //FETCH "EMPLOYEE_CODE" IN SELECT BOX
    var options = '<option value="">Please select Employee Code</option>';
    db.collection("SSWMB").where("status", "==", 'Active').get().then(function(querySnapshot) {
        querySnapshot.forEach(function(doc) {
            options += '<option value="' + doc.get('empcode') + '">' + doc.get('empcode') + '</option>';
            // console.log(doc.id, " => ", doc.get('empcode'));
        });
        $('#empcode').html(options);
    });

    // ON CHANGE EMPLOYEE_CODE AND SHOW DETAILS IN NEXT 3-BOX 
    $('#empcode').on('change', function() {
        var id = $(this).val();
        // console.log(id)
        var docRef = db.collection("SSWMB").where("empcode", "==", id);
        docRef.get().then(function(querySnapshot) {
                querySnapshot.forEach(function(doc) {
                    $("#contactperson").val(doc.get('nameofofficer'));
                    $("#concerned_ad").val(doc.get('designation'));
                    $("#macid_imei").val(doc.get('macid_imei'));
                });
            })
            .then(function() {
                console.log("Data Get Successfully!");
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
    })
    </script>


</body>

</html>