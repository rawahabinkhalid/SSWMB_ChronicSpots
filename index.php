<html>

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!-- firebase -->
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-storage.js"></script>

    <style>
    body#LoginForm {
        background-image: url("img/bg1.jpg");
        /* background-image: url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    .form-heading {
        color: #fff;
        font-size: 23px;
    }

    .panel h2 {
        color: #444444;
        font-size: 18px;
        margin: 0 0 8px 0;
    }

    .panel p {
        color: #777777;
        font-size: 14px;
        margin-bottom: 30px;
        line-height: 24px;
    }

    .login-form .form-control {
        background: #f7f7f7 none repeat scroll 0 0;
        border: 1px solid #d4d4d4;
        border-radius: 4px;
        font-size: 14px;
        height: 50px;
        line-height: 50px;
    }

    .main-div {
        background: #ffffff none repeat scroll 0 0;
        border-radius: 2px;
        margin: 10px auto 30px;
    }

    @media only screen and (min-width: 992px) {
        .container {

        }

        .main-div {
            max-width: 38%;
            padding: 50px 70px 70px 71px;
        }
    }

    @media only screen and (max-width: 1000px) {
        .login-form {
            zoom: 2 !important;
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            width: 85%;            
        }

        .container {
            max-width: 90%;
        }

        .main-div {
            max-width: 100%;
            padding: 50px 20px 70px 20px;
        }
    }


    .login-form .form-group {
        margin-bottom: 10px;
    }

    .login-form {
        text-align: center;
    }

    .forgot a {
        color: #777777;
        font-size: 14px;
        text-decoration: underline;
    }

    .login-form .btn.btn-primary {
        background: #f0ad4e none repeat scroll 0 0;
        border-color: #f0ad4e;
        color: #ffffff;
        font-size: 14px;
        width: 100%;
        height: 50px;
        line-height: 50px;
        padding: 0;
    }

    .forgot {
        text-align: left;
        margin-bottom: 30px;
    }

    .botto-text {
        color: #ffffff;
        font-size: 14px;
        margin: auto;
    }

    .login-form .btn.btn-primary.reset {
        background: #ff9900 none repeat scroll 0 0;
    }

    .back {
        text-align: left;
        margin-top: 10px;
    }

    .back a {
        color: #444444;
        font-size: 13px;
        text-decoration: none;
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
    </style>

</head>

<body id="LoginForm">
    <div class="loaderContainer"><div class="loader"></div></div>
    <div class="container">
        <br><br><br>  
        <div class="login-form">
            <div class="main-div">
                <h4><b><span class="text-danger">SSWMB</span> LOGIN FORM</b></h4>
                <div class="panel">
                    <br>
                    <img src="img/logo.jpg" alt="" style="width: 100px">
                    <p></p>
                </div>
                <!-- <form id="Login"> -->

                    <div class="form-group">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <br>
                    <button type="button" onclick="login();" class="btn btn-primary">Login</button>

                <!-- </form> -->
            </div>
        </div>
    </div>
    </div>

    <!-- Firebase API -->
    <script src="FireBase.js"></script>

    <script>
    $(document).on('ready', function() {
        hideLoader();        
    })
    function showLoader() {
        $('.loaderContainer').css('display', '');
        $('.container').css('display', 'none');
    }

    function hideLoader() {
        $('.loaderContainer').css('display', 'none');
        $('.container').css('display', '');
    }
    </script>
    <script>
    // LOGIN functionality
    function login() {
        showLoader();
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        var docRef = db.collection("User/").where("Username", "==", username).where("Password", "==", password);
        docRef.get().then(function(snapshot) {
            console.log("snapshot: ", snapshot);
            if(snapshot.size > 0) {
                snapshot.forEach((doc) => {
                    console.log("doc: ", doc);
                    if(doc.exists) {
                        if(doc.data().usertype == 'normal')
                            window.open("dashboard.php", "_self")
                        else if(doc.data().usertype == 'admin')
                            window.open("Admin/", "_self")
                    } else {
                        // location.reload(alert("Username or password is not correct"));
                        console.error("Error writing document1: ");
                    }
                })
            } else {
                alert("Username or password is not correct");
            }
        })
        .then(function() {
            hideLoader()
            // alert("incorrect Username and Password");
            console.error("Error writing document2: ");
        })
        .catch(function(error) {
            hideLoader()
            // alert("incorrect Username and Password");
            console.error("Error writing document: ", error);
        });
                }
    </script>

</body>

</html>