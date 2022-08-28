<fieldset class="p-20">
    <legend>新增問卷</legend>

    <form action="./api/add_que.php" method="post">
    <div class="d-f">
        <div class="clo w-30">
            問卷名稱
        </div>
        <input type="text" name="name" id="name" style="width: 30%;">
    </div>
    <br>
    <div class="clo moreDiv">
        <div>選項<input type="text" name="opts[]" class="opts" style="width: 30%;"><input type="button" value="更多" onclick="more()"></div>
        
    </div>

    <div>
        <input type="submit" value="新增">
        <input type="reset" value="清空">
    </div>
    </form>
</fieldset>

<fieldset class="p-20">
    <legend>問卷列表</legend>
    <table class="ct w-100">
    <tr class="clo">
        <td>問卷名稱</td>
        <td class="w-10">投票數</td>
        <td class="w-10">開放</td>
    </tr>
    <?php
    $rows = $Que->all();
    foreach ($rows as $key => $row) {
        ?>
        <tr>
            <td class="l">
                <?=($key+1).".".$row['name']?>
            </td>
            <td>
                <?=$row['sum']?>
            </td>
            <td>
                <?php
                if($row['sh'] == 1){
                ?>
                <button onclick="sh(<?=$row['id']?>,0,this)">開放</button>
                <?php
                }else{
                ?>
                <button onclick="sh(<?=$row['id']?>,1,this)">隱藏</button>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php
}
    ?>
    </table>
</fieldset>


<script>
    function more() {
        $('.moreDiv').prepend(`<div>選項<input type="text" name="opts[]" class="opts" style="width: 30%;"></div>`);
    }

    function sh(id,sh,e){
        $.post('./api/sh.php',{id,sh},()=>{
            if(sh == 0){
                $(e).parent().html(`<button onclick="sh(${id},1,this)">隱藏</button>`)
            }else{
                $(e).parent().html(`<button onclick="sh(${id},0,this)">開放</button>`)

            }
        })
    }
</script>