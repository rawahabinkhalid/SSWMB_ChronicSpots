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

    .editButton {
        width: 70px;
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
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="myTable">
                                <thead style="background-color: #8CE88C">
                                    <tr>
                                        <th>Name Of Officer</th>
                                        <th>Designation</th>
                                        <th>Mobile #</th>
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
    $('#header_heading').html("ARCHIVE OFFICER");
    </script>

    <!-- Firebase API -->
    <script src="FireBase.js"></script>

<!-- ///////////////////////////////////////////////////////////////////////////////////// -->

    <!-- GET DATA IN ***TABLE (SSWMB)*** FIREBASE -> FIRESTORE -->
    <script>
    db.collection("SSWMB/").where("status", "==", 'Inactive').get().then(function(querySnapshot) {
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
            content += '<td>' + childData.macid_imei + '</td>';
            content += '<td>' + childData.empcode + '</td>';
            content += '<td>' + childData.other + '</td>';
            content += '<td>  <p><b>Inactive</b></p> </td>';
            content += '</tr>';
        });
        $('#officerRegistration_tabledata').html(content);
        
        $('#myTable').DataTable();
    });
    </script>

</body>

</html>