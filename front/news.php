<fieldset class="p-20">
    <legend>目前位置：首頁 > 最新文章區</legend>

    <table class="w-100">
        <tr class="ct">
            <td class="w-40">標題</td>
            <td class="w-40">內容</td>
            <td></td>
        </tr>
        <?php
        $num = $News->math('COUNT', 'id', ['sh' => 1]);
        $limit = 5;
        $pages = ceil($num / $limit);
        $page = ($_GET['page']) ?? 1;
        if ($page <= 0 || $page > $pages) {
            $page = 1;
        }
        $start = ($page - 1) * $limit;
        $limitSql = "Limit $start,$limit";
        $rows = $News->all(['sh' => 1], $limitSql);
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td class="clo myClick">
                    <?= $row['title'] ?>
                </td>
                <td>
                    <span>
                        <?= mb_substr($row['text'], 0, 20) ?>...
                    </span>
                    <span style="display: none;">
                        <?= $row['text'] ?>
                    </span>
                </td>
                <td class="ct">
                    <?php
                    if ($_SESSION['user']) {
                        if (empty($Log->find(['news' => $row['id'], 'user' => $_SESSION['user']]))) {
                    ?>
                    <span class="goodBtn" onclick="add_good(<?=$row['id'];?>,<?=($row['good']+1);?>,1)">讚</span>
                        <?php
                        } else {
                        ?>
                    <span class="goodBtn" onclick="add_good(<?=$row['id'];?>,<?=($row['good']-1);?>,0)">收回讚</span>

                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="page">
        <?php
        if ($page > 1) {
        ?>
            <a href="?do=news&page=<?= $page - 1 ?>">&lt;</a>
        <?php
        }
        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <a href="?do=news&page=<?= $i ?>" class="<?= ($page == $i) ? 'nowPage' : '' ?>"><?= $i ?></a>
        <?php
        }
        if ($page < $pages) {
        ?>
            <a href="?do=news&page=<?= $page + 1 ?>">&gt;</a>
        <?php
        }
        ?>
    </div>
</fieldset>

<script>
    $('.myClick').on('click',function(){
        $(this).next().children().toggle();
    })

    function add_good(id,good,type){
        $.post('./api/add_good.php',{id,good,type},()=>{
            location.reload();
        })
    }
</script>