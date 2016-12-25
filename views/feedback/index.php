<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "Зворотній зв'язок";
    require_once 'views/blocks/head.php';
    ?>
</head>
<body>
<? require_once 'views/blocks/header.php' ?>
<div class="content">
    <h1 class="display-4 titlePage"> Залиште свій відгук! </h1>
    <div class="form container">
        <form name="feedback" action="" method="post">

            <div class="form-group row">
                <label for="name" class="col-sm-2 form-control-label">Ваше ім'я:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Введіть ім'я...">
                </div>
                <label for="name" class="error alert alert-danger" id="nameError" class="col-sm-3 form-control-label"></label>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 form-control-label">Ваша електронна пошта:</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Введіть пошту...">
                </div>
                <label for="email" class="error alert alert-danger" id="emailError" class="col-sm-3 form-control-label"></label>
            </div>

            <div class="form-group row">
                <label for="message" class="col-sm-2 form-control-label">Ваш відгук:</label>
                <div class="col-sm-7">
                    <textarea class="form-control" id="message" name="message" placeholder="Ваш відгук..."></textarea>
                </div>
                <label for="message" id="messageError" class="error alert alert-danger" class="col-sm-3 form-control-label "></label>
            </div>

            <input type="submit" class="btn btn-outline-secondary" name="done" id="done" value="Відправити">
        </form>
    </div>
</div>
<? require_once 'views/blocks/footer.php' ?>
</body>
</html>
