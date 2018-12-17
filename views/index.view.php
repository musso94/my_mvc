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
    <link rel="stylesheet" href="public/css/font-awesome.css">
</head>

<body class="bg-light">
<div class="container bg-white shadow" style="min-height: 700px;">
    <div class="row">
        <div class="col-md-12 text-center">
           <span class="h1 text-center text-success text-uppercase"> Tasks </span>

            <a  href="/user">
                <i class="fa fa-users float-right text-success m-3" style="font-size: 28px;" aria-hidden="true"></i>
            </a>
            <a href="/">
                <i class="fa fa-tasks float-right text-success m-3" style="font-size: 28px;" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <hr>

    <form method="POST" action="/addNewTask">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlInput1">Users</label>
                <select class="form-control" id="exampleFormControlSelect1" name="user">
                    <option value='-1' disabled selected>Выберите </option>
                    <?php
                        foreach ($users as $user){
                            printf("<option value='%s'>%s</option>",
                                $user->id,
                                $user->full_name
                            );
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlInput1">Название задачи</label>
                <input type="text" class="form-control" name="task" id="exampleFormControlInput1" placeholder="Название задачи">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlInput1">Статус</label>
                <select class="form-control" name="status" id="exampleFormControlSelect1">
                    <option value='Назначен'>Назначен</option>
                    <option value='Закончен'>Закончен</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlInput1">Описание</label>
                <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="Описание">
            </div>
        </div>
        <div class="col-md-1">
            <br>
            <button class="btn btn-success" type="submit"> Добавить </button>
        </div>
    </div>
    </form>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped" id="ApplicationTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>email</th>
                    <th>Задача</th>
                    <th>Статус</th>
                    <th>Описание</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                <?php foreach ($tasks as $task) : ?>
                    <tr>
                        <td> <?= $i++; ?></td>
                        <td> <?= $task->full_name; ?> </td>
                        <td> <?= $task->email; ?> </td>
                        <td> <?= $task->name; ?></td>
                        <td> <?= $task->status; ?></td>
                        <td> <?= $task->description; ?></td>
                        <td>
                            <a href="delete/<?= $task->task_id; ?>">
                                <button class="btn btn-danger"> Удалить </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Scripts -->
<script src="public/js/jquery-3.3.1.slim.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.js"></script>
<script src="public/js/app.js"></script>

</body>
</html>
