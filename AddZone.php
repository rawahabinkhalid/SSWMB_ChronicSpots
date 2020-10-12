<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Zone | Dashboard</title>

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
                                <li class="breadcrumb-item active">Zone</li>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District Name:</label>
                                    <select type="text" name="districtname" id="districtname" class="form-control"
                                        required>
                                        <option value="">Please Select District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Zone Name:</label>
                                    <input type="text" name="zonename" id="zonename" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <button type="button" id="submitbutton" class="btn shadow form_button">Submit</button>
                            </div>
                        </div>
                        <br><br><br>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="myTable">
                                <thead style="background-color: #8CE88C">
                                    <tr>
                                        <th>S.No</th>
                                        <th>District Name</th>
                                        <th>Zone Name</th>
                                    </tr>
                                </thead>
                                <tbody id="zonename_tabledata">
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
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
    // ALL FIELD REQUIRED FUNCTIONALITY -> SIMPLE FORM
    $('#submitbutton').click(function() {
        if ($('#districtname').val() == '' || $('#zonename').val() == '') {
            alert('Input can not be left blank');
        } else {
            save();            
        }
    });
    </script>

    <script>
    $('#header_heading').html("ADD ZONE");
    </script>

    <!-- Firebase API -->
    <script src="FireBase.js"></script>

    <script>
    //FETCH "DISTRICT NAME" IN SELECT BOX
    db.collection("DISTRICT").get().then(function(querySnapshot) {
        var options = '<option value="">Please Select District</option>';
        querySnapshot.forEach(function(doc) {
            var childKey = doc.id;
            options += '<option value="' + childKey + '">' + childKey + '</option>';
            // console.log(doc.id, " => ", childKey);
        });
        $('#districtname').html(options);
    });


    // DATA INSERT IN FIREBASE -> FIRESTORE TABLE(DISTRICT)
    function save() {

        var districtname = document.getElementById('districtname').value;
        var zonename = document.getElementById('zonename').value;

        db.collection("DISTRICT").doc(districtname).collection("Zone").add({
            Name: zonename
        })
        .then(function() {
            location.reload(alert("Your Form Has Been Submitted Successfully"));
            // console.log("Document successfully written!");
        })
        .catch(function(error) {
            console.error("Error writing document: ", error);
        });

        // //ZONENAME ADD IN ARRAYFORM IN DISTRICT TABLE
        // // db.collection("DISTRICT").doc(districtname).get().then(function(doc) {
        // //     if (doc.exists) {
        // //         console.log("Document data:", doc.data());
        // //         var zones = [];
        // //         if (doc.data().zonename !== undefined)
        // //             zones = doc.data().zonename;
        // //         zones.push(zonename);

        //         db.collection("DISTRICT").doc(districtname).update({
        //             // document.getElementById('zonename').value: []
        //         })
        // //         .then(function() {
        // //             location.reload(alert("Your Form Has Been Submitted Successfully"));
        // //         })
        // //         .catch(function(error) {
        // //             console.error("Error writing document: ", error);
        // //         });
        // //     } else {
        // //         // doc.data() will be undefined in this case
        // //         console.log("No such document!");
        // //     }
        // // }).catch(function(error) {
        // //     console.log("Error getting document:", error);
        // // });
    }
    </script>

    <!-- GET DATA IN ***TABLE (DISTRICT)*** FIREBASE -> FIRESTORE -->
    <script>
    db.collection("DISTRICT").get().then(function(querySnapshot) {
        count = 1;
        content = '';
        querySnapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.id;
            db.collection("DISTRICT/" + childKey + "/Zone/").get().then(function(
                subCollectionSnapshot) {
                    zones = [];
                    subCollectionSnapshot.forEach(function(subCollectionChildSnapshot) {
                        if (subCollectionChildSnapshot.exists) {
                            var subCollectionChildKey = subCollectionChildSnapshot.id;
                            
                            console.log(childKey + ' => ' + subCollectionChildSnapshot.data().Name);
                            zones.push(subCollectionChildSnapshot.data().Name);
                        }
                    });
                    
                    var zoneName = '<span style="font-weight: bold">Not Defined</span>';
                    if(zones !== undefined && zones.length > 0)
                        zoneName = zones.join(', ');
                    content += '<tr>';
                    content += '<td>' + count++ + '</td>';
                    content += '<td>' + childKey + '</td>';
                    content += '<td>' + zoneName + '</td>';
                    content += '</tr>';
                    $('#zonename_tabledata').html(content);
            });
        });
    });

    </script>

</body>

</html>