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
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="/registerNewUser">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name" required autofocus>
                                <?php if(isset($_GET['name'])) echo " <label class='text-danger'>*".  $_GET['name'] ."</label>"; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                                <?php if(isset($_GET['email'])) echo " <label class='text-danger'>*".  $_GET['email'] ."</label>"; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="Phone" required>
                                <?php if(isset($_GET['phone'])) echo " <label class='text-danger'>*".  $_GET['phone'] ."</label>"; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Date of birth</label>
                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" placeholder="Date of birth" required>
                                <?php if(isset($_GET['date_of_birth'])) echo " <label class='text-danger'>*".  $_GET['date_of_birth'] ."</label>"; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                <?php if(isset($_GET['password'])) echo " <label class='text-danger'>*".  $_GET['password'] ."</label>"; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
