<fieldset class="p-20">
    <legend>帳號管理</legend>

    <table class="w-70 aut ct">
        <tr class="clo">
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>

        <?php
        $rows = $Admin->all();
        foreach ($rows as $key => $row) {
            if($row['acc'] != 'admin'){
        ?>
            <tr>
                <td>
                    <?=$row['acc']?>
                </td>
                <td>
                    <?=str_repeat('*',strlen($row['pw']))?>
                </td>
                <td>
                    <input type="checkbox" name="del[]" class="del" value="<?=$row['id']?>">
                </td>
            </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td colspan="3" >
                <button onclick="del()">確定刪除</button>
                <button onclick="resetCh()">清空選項</button>
            </td>
        </tr>
    </table>

<br>
<br>
    <table>
        <tr>
            <td colspan="2" style="color: red;">
                *請設定您要註冊的帳號及密碼(最長12個字元)
            </td>
        </tr>
        <tr>
            <td class="clo w-50">帳號:</td>
            <td><input type="text" name="acc" id="acc" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">密碼:</td>
            <td><input type="password" name="pw" id="pw" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">確認密碼:</td>
            <td><input type="password" name="pwch" id="pwch" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">信箱:</td>
            <td><input type="text" name="email" id="email" style="width: 90%;"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button onclick="reg()">註冊</button>
                <button onclick="reset()">清除</button>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pwch = $('#pwch').val();
        let email = $('#email').val();        

        if(acc == '' || pw == '' || pwch == '' || email == '' ) {
            alert('不可空白');
        }else{
            if(pw == pwch){

                $.post('./api/reg.php',{acc,pw,email},(res)=>{

                    if(parseInt(res) == 1){
                        
                        location.reload();

                    }else{

                        alert('帳號重複');

                    }

                })

            }else{
                alert('密碼錯誤');
            }
        }

    }

    function resetCh(){
        $('input[type=checkbox]:checked').prop('checked',false);
    }

    function del(){
        let del = new Array();

        $('.del:checked').each((key,val)=>{
            del.push($(val).val());
        })

        $.post('./api/del_admin.php',{del},()=>{
            location.reload();
        })
    }
</script>