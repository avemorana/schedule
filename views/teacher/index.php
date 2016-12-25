<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "Розклад лекцій";
    require_once 'views/blocks/head.php';
    ?>
</head>
<body>
<? require_once 'views/blocks/header.php' ?>

<? $i = 0;
$list = array();
while ($row = mysqli_fetch_array($result_set)) {
    $list[$i] = $row;
    $i++;
} ?>
<div class="content">
    <?
    if (count($list) == 0) {
        ?>
        <div class="alert alert-info" role="alert">
            <h1 class="display-5" align="center">Сьогодні в цього викладача лекцій немає.<br>Спробуйте іншим разом</h1>
        </div>
    <? } else { ?>

        <h1 class="display-4" align="right"><?= $list[0]["lesson_teacher"] ?></h1>
        <div class="buttonPanel">
            <span class="align-middle">Будьте ласкаві, оберіть номер пари:</span>
            <a href="#firstLesson">
                <button type="button" class="btn btn-secondary">1</button>
            </a>
            <a href="#secondLesson">
                <button type="button" class="btn btn-secondary">2</button>
            </a>
            <a href="#thirdLesson">
                <button type="button" class="btn btn-secondary">3</button>
            </a>
            <a href="#fourthLesson">
                <button type="button" class="btn btn-secondary">4</button>
            </a>
            <a href="#fifthLesson">
                <button type="button" class="btn btn-secondary">5</button>
            </a>

        </div>


        <div class="bigListOfLessons">

            <? for ($j = 1; $j < 6; $j++) {
                switch ($j) {
                    case 1:
                        $id = "firstLesson";
                        $name = "Перша";
                        break;
                    case 2:
                        $id = "secondLesson";
                        $name = "Друга";
                        break;
                    case 3:
                        $id = "thirdLesson";
                        $name = "Третя";
                        break;
                    case 4:
                        $id = "fourthLesson";
                        $name = "Четверта";
                        break;
                    case 5:
                        $id = "fifthLesson";
                        $name = "П'ята";
                        break;
                    default:
                        break;
                } ?>
                <div class="listOfLessond">
                    <h1 id="<?= $id ?>" class="display-5" align="center"><?= $name ?> пара</h1>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Ауд.</th>
                            <th>Корпус</th>
                            <th>Назва лекції</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? for ($i = 0; $i < count($list); $i++) {
                            if ($list[$i]["lesson_number"] == $j) {
                                ?>
                                <tr>
                                    <td class="col1"><?= $list[$i]["room"] ?></td>
                                    <td class="col1"><a
                                            href="/building/<?= $list[$i]["building"] ?>"><?= $list[$i]["building"] ?></a>
                                    </td>
                                    <td class="col2"><?= $list[$i]["lesson_name"] ?></td>
                                </tr>

                            <? }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            <? } ?>

        </div>
    <? } ?>

</div>
<? require_once 'views/blocks/footer.php' ?>
</body>
</html>
