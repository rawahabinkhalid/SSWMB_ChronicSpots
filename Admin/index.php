<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Admin | Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
    <!-- IonIcons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https:////cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"
    />

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
        background-color: #9bbae6;
        color: #fff;
        font-weight: bold;
        font-size: 16.5px;
        letter-spacing: 1.5px;
      }

      .form_button:hover {
        padding: 10px 30px;
        border-radius: 10px;
        border: none;
        background-color: #8ce88c;
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
      <?php include 'header.php'; ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php include 'sidebar_menu.php'; ?>
      <!-- /.sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Home</li>
                  <!-- <li class="breadcrumb-item active">District</li> -->
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="tab-content">
                  <div
                    class="tab-pane tabs-animation fade show active"
                    id="tab-content-0"
                    role="tabpanel"
                  >
                    <div class="row">
                      <div class="col-md-6">
                        <div class="main-card mb-3 card">
                          <div class="card-body" style="height: 575px">
                            <h5 class="card-title">Status Wise Report</h5>
                            <canvas id="bar" style="height: 575px"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="main-card mb-3 card">
                          <div class="card-body">
                            <h5 class="card-title">Monthly Report</h5>
                            <!-- <div class="card-body"> -->
                            <div class="tab-content">
                              <div
                                class="tab-pane fade show active"
                                id="tabs-eg-77"
                              >
                                <div
                                  class="card mb-3 widget-chart widget-chart2 text-left w-100"
                                >
                                  <div class="widget-chat-wrapper-outer">
                                    <div
                                      class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0"
                                      style="height: 500px"
                                    >
                                      <canvas
                                        id="myChart"
                                        style="height: 500px"
                                      ></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- </div> -->
                          </div>
                        </div>
                        <!-- <div class="main-card mb-3 card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Total Registered Complaint</h5>
                                                    <p>Zone Wise (Complaint)</p>
                                                    <canvas id="zonewise"></canvas>
                                                </div>
                                            </div> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="main-card mb-3 card">
                          <div class="card-body" style="height: 500px">
                            <h5 class="card-title">Zone Wise Report</h5>
                            <canvas
                              id="zonewised"
                              style="height: 500px"
                            ></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- <table class="table table-bordered" id="myTable">
                                <thead style="">
                                    <tr>
                                        <th>S.No</th>
                                        <th>District Name</th>
                                    </tr>
                                </thead>
                                <tbody id="districtname_tabledata">
                                </tbody>
                            </table> -->
              </div>
            </div>
            <br /><br />
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
        <strong
          >Copyright &copy; 2020
          <a href="https://matz.group/" target="_blank"
            >Matz Solutions Pvt Ltd</a
          >.</strong
        >
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
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
      // ALL FIELD REQUIRED FUNCTIONALITY -> SIMPLE FORM
      $('#submitbutton').click(function () {
        if ($('#districtname').val() == '') {
          alert('Input can not be left blank')
        } else {
          save()
        }
      })
    </script>

    <script>
      $('#header_heading').html('DASHBOARD')
    </script>

    <script src="../FireBase.js"></script>
    <script>
      $(document).ready(function () {
        $('a[href="index.php"]').addClass('active')
      })
    </script>

    <script>
      var labels2 = []
      db.collection('DISTRICT')
        .get()
        .then(function (querySnapshot) {
          querySnapshot.forEach(function (doc) {
            database
              .collection('DISTRICT/' + doc.id + '/Zone/')
              .get()
              .then(function (subSnapshot) {
                subSnapshot.forEach(function (subDoc) {
                  labels2.push(subDoc.data().Name)
                })
                drawCategoryWiseComplaint()
                totalRegisteredTimeComplaint()
              })
          })
        })

      var categories = ['Cleaned', 'Partially Cleaned', 'Not Cleaned']
      var count = [0, 0, 0]
      var vcount = [0, 0, 0]
      var color = ['#7bce45', '#ffca43', '#ee2222']
      var cleanedTotalRegistered = [0, 0, 0, 0, 0]
      var partiallyCleanedTotalRegistered = [0, 0, 0, 0, 0]
      var notCleanedTotalRegistered = [0, 0, 0, 0, 0]

      drawCategoryWiseComplaint()
      totalRegisteredTimeComplaint()
      var database = db
      var date = new Date()
      var currentMonth = parseInt(date.getMonth()) + 1
      var today = date.getFullYear() + '/' + currentMonth + '/' + date.getDate()
      database
        .collection('SSWMB')
        .get()
        .then(function (snapshot) {
          var content = ''
          snapshot.forEach(function (data) {
            var key = data.id
            database
              .collection('SSWMB/' + data.id + '/Evaluation')
              .get()
              .then(function (snapshot1) {
                snapshot1.forEach(function (data1) {
                  var val = data1.data()
                  status = isset(val.Status) ? val.Status : 'Not Cleaned'

                  if (categories.indexOf(status) >= 0) {
                    count[categories.indexOf(status)]++
                  }
                  database
                    .collection('SPOTS')
                    .doc(data1.data().SpotId)
                    .get()
                    .then(function (snapshot2) {
                      val2 = snapshot2.data()
                      if (
                        val2 != undefined &&
                        labels2.indexOf(val2.zone) >= 0
                      ) {
                        if (status == 'Cleaned')
                          cleanedTotalRegistered[labels2.indexOf(val2.zone)]++
                        else if (status == 'Partially Cleaned')
                          partiallyCleanedTotalRegistered[
                            labels2.indexOf(val2.zone)
                          ]++
                        else if (status == 'Not Cleaned')
                          notCleanedTotalRegistered[
                            labels2.indexOf(val2.zone)
                          ]++
                      }

                      drawCategoryWiseComplaint()
                      totalRegisteredTimeComplaint()
                    })
                })
              })
          })
          drawCategoryWiseComplaint()
          totalRegisteredTimeComplaint()
          count = [0, 0, 0]
          vcount = [0, 0, 0]
          cleanedTotalRegistered = [0, 0, 0, 0, 0]
          partiallyCleanedTotalRegistered = [0, 0, 0, 0, 0]
          notCleanedTotalRegistered = [0, 0, 0, 0, 0]
        })

      function drawCategoryWiseComplaint () {
        var ctx = document.getElementById('bar')
        var myChart = new Chart(ctx, {
          type: 'horizontalBar',
          data: {
            labels: categories,
            datasets: [
              {
                data: count,
                backgroundColor: ['#7bce45', '#ffca43', '#ee2222'],
                borderWidth: 1
              }
            ]
          },
          maintainAspectRatio: false,
          options: {
            legend: {
              display: false,
              labels: {},
              onClick: function () {
                return false
              }
            }
          }
        })
        myChart.aspectRatio = 0
      }

      function totalRegisteredTimeComplaint () {
        var ctx = document.getElementById('zonewised')
        var myChart = new Chart(document.getElementById('zonewised'), {
          type: 'bar',
          data: {
            labels: labels2,
            datasets: [
              {
                label: 'Cleaned',
                backgroundColor: '#7bce45',
                data: cleanedTotalRegistered
              },
              {
                label: 'Partially Cleaned',
                backgroundColor: '#ffca43',
                data: partiallyCleanedTotalRegistered
              },
              {
                label: 'Not Cleaned',
                backgroundColor: '#ee2222',
                data: notCleanedTotalRegistered
              }
            ]
          },
          maintainAspectRatio: false,
          options: {
            scales: {
              xAxes: [
                {
                  barThickness: 25
                }
              ]
            },
            title: {
              display: true,
              text: 'Zone Wise Report'
            },
            legend: {
              display: true
            }
          }
        })
        myChart.aspectRatio = 0
      }

      function isset (ref) {
        return typeof ref !== 'undefined'
      }
    </script>
    <script>
      function padMonth (month) {
        if (month < 10) return '0' + month
        else return month
      }

      var last12Month = function () {
        var dates = []
        var today = new Date()
        ;(d = new Date()), (y = d.getFullYear()), (m = d.getMonth())

        if (m === 11) {
          for (var i = 1; i < 13; i++) dates.push(y + '-' + padMonth(i))
        } else {
          for (var i = m + 1; i < m + 13; i++) {
            if (i % 12 > m) dates.push(y - 1 + '-' + padMonth(i + 1))
            else dates.push(y + '-' + padMonth((i % 12) + 1))
          }
        }

        return dates
      }
      var last12Active = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      var last12Assigned = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      var last12Invalid = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      var last12Months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
      last12Months = last12Month()

      var total = 0

      var database = db
      var date = new Date()
      var currentMonth = parseInt(date.getMonth()) + 1
      var currentMonth1 = parseInt(date.getMonth()) + 1
      var today = date.getFullYear() + '/' + currentMonth + '/' + date.getDate()
      database
        .collection('SSWMB')
        .get()
        .then(function (snapshot) {
          var content = ''
          snapshot.forEach(function (data) {
            var key = data.id
            database
              .collection('SSWMB/' + key + '/Evaluation')
              .get()
              .then(function (snapshot1) {
                var currentDate = ''
                snapshot1.forEach(function (data1) {
                  var val = data1.data()
                  status = isset(val.Status) ? val.Status : 'Not Cleaned'
                  total = parseInt(total) + 1

                  currentDate = val.DateTime.toDate().getDate()

                  currentMonth = padMonth(val.DateTime.toDate().getMonth() + 1)
                  currentYear = val.DateTime.toDate().getFullYear()
                  if (
                    last12Months.indexOf(currentYear + '-' + currentMonth) >= 0
                  ) {
                    if (status == 'Cleaned') {
                      last12Active[
                        last12Months.indexOf(currentYear + '-' + currentMonth)
                      ]++
                    } else if (status == 'Partially Cleaned') {
                      last12Assigned[
                        last12Months.indexOf(currentYear + '-' + currentMonth)
                      ]++
                    } else if (status == 'Not Cleaned') {
                      last12Invalid[
                        last12Months.indexOf(currentYear + '-' + currentMonth)
                      ]++
                    }
                  }
                  drawGraph()
                })
              })
          })
          drawGraph()
        })
    </script>
    <script>
      function drawGraph () {
        ;(function (code) {
          code(window.jQuery, window, document)
        })(function ($, window, document) {
          var exportPdfBtn = null
          var tableReport = $('#table-report')

          $(function () {
            var ctx = document.getElementById('myChart')
            var myChart = new Chart(document.getElementById('myChart'), {
              type: 'bar',
              data: {
                labels: last12Months,
                datasets: [
                  {
                    label: 'Cleaned',
                    data: last12Active,
                    backgroundColor: '#7bce45'
                  },
                  {
                    label: 'Partially Cleaned',
                    data: last12Assigned,
                    backgroundColor: '#ffca43'
                  },
                  {
                    label: 'Not Cleaned',
                    data: last12Invalid,
                    backgroundColor: '#ee2222'
                  }
                ]
              },
              maintainAspectRatio: false,
              options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                  xAxes: [{}]
                },
                title: {
                  display: true,
                  text: 'Monthly Report'
                }
              }
            })
            myChart.aspectRatio = 0
          })
        })
      }
    </script>
  </body>
</html>
