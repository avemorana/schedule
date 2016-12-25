<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "Розклад лекцій";
    require_once 'views/blocks/head.php';
    ?>
</head>
<!--<body style="width:800px; margin:auto">-->
<body>
<? require_once 'views/blocks/header.php' ?>
<div class="content" align="center">

    <h1 class="display-4 titlePage"> Вітаємо на головній сторінці!</h1>
    <div class="btn-group">
        <h1 class="display-5"> Оберіть, будь ласка, корпус: </h1>

        <form name="choosingBuilding" action="" method="post">
            <? for ($i = 1; $i < 36; $i++) {
                if ($i != 32 and $i != 34) {
                    ?>
                    <input type="submit" class="btn numBuild" name="<?=$i ?>" value="<?=$i ?>">
                    <? if ($i % 12 == 0) {
                        echo "<br><br>";
                    }
                }
            } ?>
        </form>
    </div>

    <div class="choosingTeacher" align="center">
        <form name="choosingTeacher" action="" method="post">
            <span> Оберіть викладача: </span>
            <input type="text" class=" who form-control" id="nameOfTeacher" name="nameOfTeacher" placeholder="Введіть ім'я викладача..."
                   autocomplete="off">
            <div class="search">
                <ul class="search_result"></ul>
            </div>
            <input type="submit" class="btn btn-secondary" id="submitTeacher" name="submitTeacher" value="Обрати">
        </form>
    </div>

</div>
<? require_once 'views/blocks/footer.php' ?>
</body>
</html>
