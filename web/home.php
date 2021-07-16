<?php
// error_reporting(E_ALL);
// ini_set('display_errors',1);
session_start();

if (!$_SESSION['token']) {
    header('Location:login');
}

require_once("functions/routes.php");
$pg = (isset($_GET['p'])) ? $_GET['p'] : "";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashboard | UMKM Jati</title>

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
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
    <!-- END Stylesheets -->

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- Page Container -->
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed sidebar-inverse">

        <!-- Sidebar -->
        <?php include_once("template/sidebar.php") ?>
        <!-- END Sidebar -->

        <!-- Header -->
        <?php include_once("template/header.php") ?>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="content">
                <?php menu($pg); ?>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <?php include_once("template/footer.php") ?>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <script src="assets/js/codebase.core.min.js"></script>

    <script src="assets/js/codebase.app.min.js"></script>


    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/be_tables_datatables.min.js"></script>

    <script src="alert.js"></script>
</body>

</html>