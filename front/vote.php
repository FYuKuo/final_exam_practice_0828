<?php
$data = $Que->find(['id'=>$_GET['id']]);
$opts = $Opt->all(['parent'=>$_GET['id']]);
?>
<fieldset class="p-20">
    <legend>目前位置：首頁 > 問卷調查 > <?=$data['name']?></legend>
<div>
    <b>
    <?=$data['name']?>
    </b>
</div>
<?php
foreach ($opts as $key => $opt) {
?>
<p>
<input type="radio" name="opt" class="opt" value="<?=$opt['id']?>"><?=$opt['name']?>
</p>
<?php
}
?>
<div class="ct">
    <button onclick="vote(<?=$_GET['id']?>)">我要投票</button>

</div>
</fieldset>

<script>
    function vote(id){
        let opt = $('.opt:checked').val();
        $.post('./api/vote.php',{id,opt},()=>{
            location.href=`?do=res&id=${id}`;
        })
    }
</script>