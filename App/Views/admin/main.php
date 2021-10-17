<!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include _VIEW_ .'/admin/head.php'; ?>
    </head>
    <body class="hold-transition sidebar-mini layout-footer-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
        <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        <!-- /.navbar -->

        <?php include _VIEW_ . '/admin/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php include _VIEW_ .'/alert.php'; ?>

            <!-- Main content -->
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?=$title?></h3>
                        </div>
                        <?php include _VIEW_ .'/admin/' . $template . '.php'; ?>
                    </div>
                </div>
            </section>


        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <?php include _VIEW_ .'/admin/footer.php'; ?>
    </body>
</html>
