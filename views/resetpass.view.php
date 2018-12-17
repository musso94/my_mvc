<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Job">

    <title>PHP MM</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/datatables.css">
    <link rel="stylesheet" href="public/css/font-awesome.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand text-muted font-weight-bold" href="/">
            Task
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link text-muted" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="/register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="/saveNewPassword">
                        <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirmPassword" class="col-sm-4 col-form-label text-md-right">Confirm password</label>
                            <div class="col-md-6">
                                <input id="confirmPassword" type="password" class="form-control" name="confirm_password" placeholder="Confirm password" required autofocus>
                            </div>
                        </div>
                        <?php
                            if(isset($_GET['message'])) {
                                echo "<div class='form-group row'>
                                        <div class='offset-4 col-md-6'>
                                            <div class='alert alert-warning' role='alert'>
                                                ".  $_GET['message'] ."
                                            </div>
                                        </div>
                                    </div>";
                            }
                            if(isset($_GET['messageOk'])) {
                                echo "<div class='form-group row'>
                                        <div class='offset-4 col-md-6'>
                                            <div class='alert alert-success' role='alert'>
                                                ".  $_GET['messageOk'] ."
                                            </div>
                                        </div>
                                    </div>";
                            }
                        ?>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save new password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="public/js/jquery-3.3.1.slim.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.js"></script>
<script src="public/js/datatables.js"></script>
<script src="public/js/app.js"></script>

</body>
</html>
