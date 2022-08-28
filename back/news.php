<fieldset class="p-20">
    <legend>最新文章管理</legend>


    <button onclick="location.href='?do=add_news'">新增文章</button>

    <table class="w-100 aut ct">
        <tr>
            <td class="w-10">編號</td>
            <td >標題</td>
            <td class="w-10">顯示</td>
            <td class="w-10">刪除</td>
        </tr>

        <?php
        $num = $News->math('COUNT','id');
        $limit = 3;
        $pages = ceil($num/$limit);
        $page = ($_GET['page'])??1;
        if($page <= 0 || $page >$pages){
            $page = 1;
        }
        $start = ($page-1)*$limit;
        $limitSql = "Limit $start,$limit";
        $rows = $News->all($limitSql);
        $i = 0;
        foreach ($rows as $key => $row) {
            $i ++;
        ?>
        <tr>
            <td class="clo">
                <?=($start+$i)?>
            </td>
            <td>
                <?=$row['title']?>
            </td>
            <td>
                <input type="checkbox" name="sh[]" class="sh" value="<?=$row['id']?>" <?=($row['sh'] == 1)?'checked':''?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" class="del" value="<?=$row['id']?>">
            </td>
            <input type="hidden" name="id" value="<?=$row['id']?>">
        </tr>
        <?php
        }
        ?>
    </table>
    <div class="page ct">
        <?php
        if($page > 1) {
        ?>
        <a href="?do=news&page=<?=$page-1?>">&lt;</a>
        <?php
        }
        for ($i=1; $i <= $pages ; $i++) { 
            ?>
            <a href="?do=news&page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
        <?php
    }
    if($page < $pages) {
        ?>
        <a href="?do=news&page=<?=$page+1?>">&gt;</a>
        <?php
    }
        ?>
    </div>
    <div class="ct">
        <button onclick="edit_news()">確定修改</button>
    </div>
</fieldset>

<script>
    function edit_news(){
        let id = new Array();
        let del = new Array();
        let sh = new Array();

        $('.del:checked').each((key,val)=>{
            del.push($(val).val());
        })
        $('.sh:checked').each((key,val)=>{
            sh.push($(val).val());
        })
        $('input[type=hidden]').each((key,val)=>{
            id.push($(val).val());
        })

        $.post('./api/edit_news.php',{id,sh,del},()=>{
            location.reload();
        })
    }
</script>