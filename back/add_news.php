<fieldset class="p-20">
    <table class="w-100">
        <tr>
            <td>文章標題</td>
            <td><input type="text" name="newstitle" id="newstitle" style="width: 95%;"></td>
        </tr>
        <tr>
            <td>文章分類</td>
            <td>
                <select name="type" id="type">
                    <option value="1">健康新知</option>
                    <option value="2">菸害防制</option>
                    <option value="3">癌症防治</option>
                    <option value="4">慢性病防治</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>文章內容</td>
            <td>
                <textarea name="text" id="text" cols="30" rows="10" style="width: 95%;"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="ct">
                <button onclick="add_news()">新增</button>
                <button onclick="reset_add()">重置</button>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function add_news() {
        let title = $('#newstitle').val();
        let type = $('#type').val();
        let text = $('#text').val();

        $.post('./api/add_news.php',{title,text,type},()=>{
            location.href='?do=news';
        })
    }

    function reset_add(){
        reset();
        $('textarea').val('');
        $('#type').children().first().prop('selected',true);
    }
</script>