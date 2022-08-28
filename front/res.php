<?php
$que = $Que->find(['id' => $_GET['id']]);
$opts = $Opt->all(['parent' => $_GET['id']]);
if ($que['sum'] == 0) {
    $que['sum'] = 1;
}
?>
<fieldset class="p-20">
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['name'] ?></legend>
    <div>
        <b>
            <?= $que['name'] ?>
        </b>
    </div>

    <?php
    foreach ($opts as $key => $opt) {
        $width = round(($opt['sum'] / $que['sum']) * 100, 0);
    ?>
        <div class="d-f my-20">
            <div class="w-40">
                <?= ($key + 1) . "." . $opt['name'] ?>
            </div>
            &nbsp;
            <div class="d-f w-50">
                <div style="background-color: #ddd;height:20px;width:<?= $width ?>%">
                </div>
            &nbsp;

                <span><?= $opt['sum'] ?>票(<?= $width ?>)%</span>
            </div>
        </div>
    <?php
    }
    ?>

<div class="ct">
    <button onclick="location.href='?do=que'">返回</button>
</div>
</fieldset>