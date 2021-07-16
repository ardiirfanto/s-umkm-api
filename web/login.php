<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login | UMKM Jati</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/icon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon.png">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('assets/img/umkm.jpg');">
                <div class="row mx-0 bg-black-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-30 invisible" data-toggle="appear">
                            <p class="font-size-h3 font-w600 text-white">
                                Sistem Informasi UMKM Jati
                            </p>
                            <p class="font-italic text-white-op">
                                Copyright &copy; <span class="js-year-copy"></span>
                            </p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-30 py-10">
                                <a class="link-effect font-w700" href="index.html">
                                    <i class="si si-handbag"></i>
                                    <span class="font-size-xl text-primary-dark">si</span><span class="font-size-xl">UMKM</span>
                                </a>
                                <h1 class="h3 font-w700 mt-30 mb-10">Selamat Datang Di Sistem Informasi UMKM Jati</h1>
                                <h2 class="h5 font-w400 text-muted mb-0">Silahkan Login</h2>
                            </div>
                            <!-- END Header -->
                            <form class=" px-30" action="" method="post">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control" id="username">
                                            <label for="login-username">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="password" class="form-control" id="password" >
                                            <label for="login-password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button onclick="login()" type="button" class="btn btn-sm btn-hero btn-alt-primary">
                                        <i class="si si-login mr-10"></i> Login
                                    </button>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="assets/js/codebase.core.min.js"></script>

    <script src="assets/js/codebase.app.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/op_auth_signin.min.js"></script>

    <script src="alert.js"></script>

    <script>
        function login() {

            var username = $('#username').val()
            var password = $('#password').val()
            var url = "functions/auth/login";

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    "username": username,
                    "password": password
                },
                success: function(res) {
                    console.log(res);
                    if (res == 1) {
                        processSuccess("Login Berhasil", "home");
                    } else if (res == 2) {
                        processFailed("Akun tidak ada")
                    } else if (res == 0) {
                        processFailed("Password Salah")
                    } else {
                        processFailed(res)
                    }
                }
            })

        }
    </script>
</body>

</html>