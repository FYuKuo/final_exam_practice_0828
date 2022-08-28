<fieldset class="w-50 aut p-20">
    <legend>會員註冊</legend>

    <table class="w-100">
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
                        alert('註冊完成，歡迎加入');
                        location.href = '?do=login';

                    }else{

                        alert('帳號重複');

                    }

                })

            }else{
                alert('密碼錯誤');
            }
        }

    }
</script>