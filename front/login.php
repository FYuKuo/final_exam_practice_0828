<fieldset class="w-50 aut p-20">
    <legend>會員登入</legend>

    <table class="w-100">
        <tr>
            <td class="clo w-50">帳號:</td>
            <td><input type="text" name="acc" id="acc" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">密碼:</td>
            <td><input type="password" name="pw" id="pw" style="width: 90%;"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button>
                <button onclick="reset()">清除</button>
            </td>
            <td class="r">
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function login(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();

        $.get('./api/ch_acc.php',{acc},(res)=>{

            console.log(res);

            if(parseInt(res) == 1){

                $.get('./api/ch_pw.php',{acc,pw},(res)=>{

                    if(parseInt(res) == 1){

                        if(acc == 'admin'){

                            location.href = './back.php';
                        }else{
                            location.href = './index.php';
                        }

                    }else{
                        alert('密碼錯誤');
                        reset();
                    }
                })
                
            }else{
                alert('查無帳號');
                reset();
            }
        })
    }

</script>