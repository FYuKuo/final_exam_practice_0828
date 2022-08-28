<fieldset class="w-70 aut p-20">
    <legend>會員註冊</legend>

    <table class="w-100">
        <tr>
            <td>
                請輸入信箱以查詢密碼
            </td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="message">

            </td>
        </tr>
        <tr>
            <td>
                <button onclick="findPw()">尋找</button>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function findPw(){
        let email = $('#email').val();

        $.get('./api/find_pw.php',{email},(res)=>{
            $('.message').text(res);
        })
    }
</script>