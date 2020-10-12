<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin | Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
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

    
    .loader {
        border: 5px solid #f3f3f3;
        border-top: 5px solid #555;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        margin: 0;
        position: absolute;
        top: 40%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .loaderContainer {
        text-align: center;
        align-content: center;
        align-items: center;
        margin: auto;
        width: 10%;
        height: 100%;
        padding: 10px;
        overflow: hidden;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    
    @media only screen and (min-width: 992px) {
        .loaderContainer {
            max-width: 38%;
            padding: 50px 70px 70px 71px;
        }
    }

    @media only screen and (max-width: 1000px) {
        .loaderContainer {
            zoom: 0.5 !important;
        }
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
                                <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Date Wise Report</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="loaderContainer"><div class="loader"></div></div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- <div class="col-md-12"> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date:</label>
                                <div class="input-group mb-3">
                                    <div id="reportrange" style="width: calc(100% - 100px) !important; display: inline-block; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%;">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="daterange" id="daterange" style="width: calc(100% - 100px); display: inline-block;">
                            </div>
                        </div>
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button class="btn btn-secondary mt-4" id="search"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="tableData" style="display: none;">
                        <div class="col-md-12">
                            <table class="table table-bordered table-responsive w-100 d-block d-md-table" id="myTable">
                                <thead style="">
                                    <tr>
                                        <th>S.No</th>
                                        <th>District Name</th>
                                        <th>Zone Name</th>
                                        <th>UC Name</th>
                                        <th>Officer Name</th>
                                        <th>Officer Code</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody id="districtname_tabledata">
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
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../dist/js/pages/dashboard3.js"></script>
    <script src="../plugins/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
    // ALL FIELD REQUIRED FUNCTIONALITY -> SIMPLE FORM
    $('#submitbutton').click(function() {
        if ($('#districtname').val() == '' ) {
            alert('Input can not be left blank');
        } else {
            save();            
        }
    });
    </script>
    <script>
    hideLoader();

    function showLoader() {
        $('.loaderContainer').css('display', '');
        $('.content').css('display', 'none');
    }

    function hideLoader() {
        $('.loaderContainer').css('display', 'none');
        $('.content').css('display', '');
    }
    </script>
    <script>
        $('#header_heading').html("DATE WISE REPORT");
    </script>

    <!-- Firebase API -->
    <script src="../FireBase.js"></script>
    <script>
        $(document).ready(function() {
            $('a[href="dateReport.php"]').addClass("active");
        });
    </script>
    <script>
    $('#daterangeCheck').on('click', function() {
        if ($(this).is(':checked')) {
            $('#reportrange').css('pointer-events', '');
            $('#reportrange').css('background-color', '#fff');
        } else {
            $('#reportrange').css('pointer-events', 'none');
            $('#reportrange').css('background-color', '#e9ecef');
        }
    })
    </script>
    <script type="text/javascript">
    $(function() {
        var temp_range = {
            // 'Please select Date Range': [],
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                .endOf('month')
            ]
        };
        var start = ($('#daterange').val() != '') ? moment($('#daterange').val().split(" - ")[0]) : moment();
        var end = ($('#daterange').val() != '') ? moment($('#daterange').val().split(" - ")[1]) : moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#daterange').val(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'))
        }


        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: temp_range
        }, cb);

        cb(start, end);

    });

    $('.ranges ul li').on('click', function() {
        console.log($(this).attr('data-range-key'));
    })
    </script>
    <script>
        $('#search').on('click', function() {
            showLoader();
            $('#tableData').css('display', '');
            $('#myTable').dataTable().fnDestroy();
            $('#districtname_tabledata').html("");
            $('#myTable').DataTable();

            var fromDate = new Date($('#daterange').val().split(' - ')[0]);
            var toDate = new Date($('#daterange').val().split(' - ')[1]);
            toDate.setDate(toDate.getDate() + 1);

            console.log(fromDate)

            db.collection("SSWMB").get().then(function(querySnapshot) {
                content = '';
                serialNo = 1;
                querySnapshot.forEach(function(doc) {
                    var childKey = doc.id;
                    db.collection("SSWMB/" + childKey + "/Evaluation").get().then(function(subQuerySnapshot) {
                        subQuerySnapshot.forEach(function(subDoc) {
                            var subDocChildKey = subDoc.id;
                            if(subDoc.data().DateTime.toDate() >= fromDate && subDoc.data().DateTime.toDate() <= toDate) {
                                db.collection("SPOTS/").doc(subDoc.data().SpotId).get().then(function(microDoc) {
                                    showLoader();
                                    if(microDoc.data() != undefined) {
                                        var microChildKey = subDoc.id;
                                        content += '<tr>';
                                        content += '<td>' + (serialNo++) + '</td>';
                                        content += '<td>' + microDoc.data().district + '</td>';
                                        content += '<td>' + microDoc.data().zone + '</td>';
                                        content += '<td>' + microDoc.data().uc + '</td>';
                                        content += '<td>' + doc.data().nameofofficer + '</td>';
                                        content += '<td>' + doc.data().empcode + '</td>';
                                        content += '<td>' + moment(subDoc.data().DateTime.toDate()).format("LL") + '</td>';
                                        content += '<td>' + moment(subDoc.data().DateTime.toDate()).format("LTS") + '</td>';
                                        content += '<td>' + subDoc.data().Status + '</td>';
                                        content += '<td><a href="' + subDoc.data().ImageUrl + '" target="_blank"><img src="' + subDoc.data().ImageUrl + '" style="height: 100px"></a></td>';
                                        content += '</tr>';
                                        $('#tableData').css('display', '');
                                        $('#myTable').dataTable().fnDestroy();
                                        $('#districtname_tabledata').html("");
                                        $('#districtname_tabledata').html(content);
                                        $('#myTable').DataTable();

                                    }
                                    hideLoader();
                                });

                            }
                        });
                    });
                });
            });
        })
    </script>




</body>

</html>