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
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?= $user_info->name ?> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" >
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card mt-4 mb-4 border shadow bg-light" >
                <div class="card-body">
                    <span class="font-weight-bold text-uppercase text-black-50"> Пользователи  </span>
                    <hr class="mt-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped"  >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ФИО</th>
                                <th>email</th>
                                <th>Телефон</th>
                                <th>Дата рождения</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td> <?= $i++; ?> </td>
                                    <td> <?= $user->name; ?> </td>
                                    <td> <?= $user->email; ?> </td>
                                    <td> <?= $user->phone; ?></td>
                                    <td> <?= $user->date_of_birth; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card mt-4 mb-4 border shadow bg-light">
                <div class="card-body">
                    <span class="font-weight-bold text-uppercase text-black-50"> Личные данные </span>
                    <hr class="mt-0">
                    <?php if(isset($_GET['edit_message']))
                         echo "
                            <div class='alert alert-danger'>
                                <ul class='list-unstyled'>
                                    <li>".  $_GET['edit_message'] ."</li>
                                </ul>
                            </div>";
                    ?>
                    <form method="post" action="/updateUser/<?= $user_info->id ?>">
                        <div class="form-group mt-2">
                            <label for="personName" >Полное имя:</label>
                            <input type="text" class="form-control " id="personName" placeholder="Полное имя" name="name" value="<?= $user_info->name ?>">
                            <?php if(isset($_GET['edit_name'])) echo " <label class='text-danger'>*".  $_GET['edit_name'] ."</label>"; ?>
                        </div>
                        <div class="form-group mt-2">
                            <label for="personEmail" >Email:</label>
                            <input type="email" class="form-control" id="personEmail" placeholder="Email" name="email" value="<?= $user_info->email ?>">
                            <?php if(isset($_GET['edit_email'])) echo " <label class='text-danger'>*".  $_GET['edit_email'] ."</label>"; ?>
                        </div>
                        <div class="form-group mt-2">
                            <label for="personPhone" >Телефон:</label>
                            <input type="text" class="form-control " id="personPhone" placeholder="Телефон" name="phone" value="<?= $user_info->phone ?>">
                            <?php if(isset($_GET['edit_phone'])) echo " <label class='text-danger'>*".  $_GET['edit_phone'] ."</label>"; ?>
                        </div>
                        <div class="form-group mt-2">
                            <label for="date_of_birth" >Дата рождения:</label>
                            <input type="text" class="form-control" id="date_of_birth" placeholder="Дата рождения" name="date_of_birth" value="<?= $user_info->date_of_birth ?>">
                            <?php if(isset($_GET['edit_date_of_birth'])) echo " <label class='text-danger'>*".  $_GET['edit_date_of_birth'] ."</label>"; ?>
                        </div>
                        <button class="btn btn-success btn-sm float-right mb-1"> Изменить </button>
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
