<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Spot Registration | Dashboard</title>

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
                                <li class="breadcrumb-item active">Spot Registration</li>
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
                            <div class="col-md-2">
                                <label>S No:</label>
                                <input type="text" value="" name="sno" id="sno" class="form-control" readonly>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Spot Id:</label>
                                    <input type="text" name="spotid" id="spotid" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>District:</label>
                                    <select type="text" name="district" id="district" class="form-control" required>
                                        <option value="">Please Select District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Zone:</label>
                                    <select type="text" name="zone" id="zone" class="form-control" required>
                                        <option value="">Please Select Zone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>UC:</label>
                                    <select type="text" name="uc" id="uc" class="form-control" required>
                                        <option value="">Please Select UC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address of Spot:</label>
                                    <input type="text" name="addressofspot" id="addressofspot" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Road:</label>
                                    <input type="text" name="road" id="road" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Name Of Chronic Spot:</label>
                                    <input type="text" name="nameofchronic" id="nameofchronic" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <!--Google map-->
                                <div id="map-container-google-1" class="z-depth-1-half map-container">
                                    <div id="mapDiv" style="height: 500px"></div>
                                </div>
                                <!--Google Maps-->
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Lat:</label>
                                    <input type="text" name="lat" id="lat" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Long:</label>
                                    <input type="text" name="long" id="long" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
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
    <script async="" defer=""
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt2aetmzxdEDsDMB5a63ajqWovxKUIRQg&amp;callback=initMap&amp;libraries=places">
    </script>

    <script>
    // ALL FIELD REQUIRED FUNCTIONALITY -> SIMPLE FORM
    $('#submitbutton').click(function() {
        if ($('#spotid').val() == '' || $('#district').val() == '' || $('#zone').val() == '' || $('#uc').val() == '' || $('#addressofspot').val() == '' || $('#road').val() == '' || $('#nameofchronic').val() == '' || $('#lat').val() == '' || $('#long').val() == '') {
            alert('Input can not be left blank');
        } else {
            save();            
        }
    });
    </script>

    <script>
    $('#header_heading').html("SPOT REGISTRATION");
    </script>

    <!-- Firebase API -->
    <script src="FireBase.js"></script>

    <!-- ////////////////////////////////////////////////////////////////////////////// -->

    <script>
    // Auto Increment SNo According To Spots
    db.collection("SPOTS").get().then(snap => {
        size = snap.size;
        console.log(size);
        $('#sno').val(size + 1);
    });
    </script>

    <script>
    //FETCH "DISTRICT NAME" IN SELECT BOX
    db.collection("DISTRICT").get().then(function(querySnapshot) {
        var options = '<option value="">Please Select District</option>';
        querySnapshot.forEach(function(doc) {
            var childKey = doc.id;
            options += '<option value="' + childKey + '">' + childKey + '</option>';
            // console.log(doc.id, " => ", childKey);
        });
        $('#district').html(options);
    });

    // ON CHANGE "District" AND SHOW DETAILS IN "Zone" 
    $('#district').on('change', function() {
        var id = $(this).val();
        db.collection("DISTRICT/" + id + "/Zone/").get().then(function(
            subCollectionSnapshot) {
            var options = '<option value="">Please Select Zone</option>';
            subCollectionSnapshot.forEach(function(subCollectionChildSnapshot) {
                if (subCollectionChildSnapshot.exists) {
                    var subCollectionChildKey = subCollectionChildSnapshot.id;
                    options += '<option value="' + subCollectionChildSnapshot.data().Name +
                        '">' + subCollectionChildSnapshot.data().Name + '</option>';
                }
            });
            $('#zone').html(options);
        });
    })

    // ON CHANGE "Zone" AND SHOW DETAILS IN "UC" 
    $('#zone').on('change', function() {
        var district = $('#district').val();
        var id = $(this).val();
        db.collection("DISTRICT/" + district + "/Zone/").where("Name", "==", id).get().then(function(subCollectionSnapshot) {
            var options = '<option value="">Please Select UC</option>';
            subCollectionSnapshot.forEach(function(doc) {
                if (doc.exists){
                    var uc = [];
                    if (doc.data().UCSpots !== undefined)
                        uc = doc.data().UCSpots;
                    uc.forEach((individualUC) => {
                        console.log("individualUC: " + individualUC);
                        options += '<option value="' + individualUC +
                            '">' + individualUC + '</option>';
                    })
                }
            });
            $('#uc').html(options);
        });
    })
    </script>

    <script>
    // DATA INSERT IN FIREBASE -> FIRESTORE TABLE(SPOTS)
    function save() {
        var spotid = document.getElementById('spotid').value;
        var district = document.getElementById('district').value;
        var zone = document.getElementById('zone').value;
        var uc = document.getElementById('uc').value;
        var addressofspot = document.getElementById('addressofspot').value;
        var road = document.getElementById('road').value;
        var nameofchronic = document.getElementById('nameofchronic').value;
        var lat = document.getElementById('lat').value;
        var long = document.getElementById('long').value;

        // console.log(sno + ' ' + spotid + ' ' + district);

        // Add a new document in collection "SSWMB"
        db.collection("SPOTS").doc(spotid).set({
            spotid: spotid,
            district: district,
            zone: zone,
            uc: uc,
            addressofspot: addressofspot,
            road: road,
            nameofchronic: nameofchronic,
            lat: lat,
            long: long,
        })
        .then(function() {
            location.reload(alert("Spot has been submitted Successfully"));
            // console.log("Document successfully written!");
        })
        .catch(function(error) {
            console.error("Error writing document: ", error);
        });
    }
    </script>

    <!-- GOOGLE MAP DRAGGABLE  -->
    <script>
    function initMap() {
        var myLatlng = new google.maps.LatLng(24.8669743, 67.0816445);
        var mapOptions = {
            zoom: 18,
            center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById("mapDiv"), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true,
            title: "Drag me!"
        });
        var geocoder = new google.maps.Geocoder();

        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({
                'latLng': marker.getPosition()
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#lat').val(marker.getPosition().lat());
                        $('#long').val(marker.getPosition().lng());
                    }
                }
            });
        });
    }
    </script>

</body>

</html>