
<table class="lable_table">

    <?php if(isset($_SESSION['user'])) : ?>
        <tr>
            <tr>
                <td class="lb_tt"><span style="color: #fff;"><?= $_SESSION['user']['name'] ?></span><span style="color: #555;">，您好。</span></td>
            </tr>
<!--            <tr>-->
<!--                <td class="member_action_border_up"><a href="#" class="member_action_btn">會員資料修改</a></td>-->
<!--            </tr>-->
            <tr>
                <td class="member_action_border_up"><a href="javascript:do_logout()" class="member_action_btn">登出</a></td>
            </tr>
        </tr>

        <script>
            function do_logout() {
                if( confirm('確定登出？') ) {
                    location.href = 'member_logout.php';
                }
            };
        </script>
    <?php else: ?>
        <tr>
            <td class="lb_tt">會員登入</td>
        </tr>
        <form id="form1" name="form1" method="post" action="member_login_check.php" onsubmit="return loginCheck()">
            <tr>
                <td class="lb_nn">
                    <label for="l_email">電子郵件 <span class="field_warning"> 請輸入電子郵件</span></label>
                </td>
            </tr>
            <tr>
                <td><input type="text" id="l_email" name="l_email" placeholder="請輸入電子郵件"></td>
                </td>
            </tr>
            <tr>
                <td class="lb_nn">
                    <label for="l_password">密碼 <span class="field_warning"> 請輸入密碼</span></label>
                </td>
            </tr>
            <tr>
                <td><input type="password" id="l_password" name="l_password" placeholder="請輸入密碼"></td>
            </tr>
            <tr>
                <td class="border_up"><input type="submit" value="送出"></td>
            </tr>
        </form>
    <?php endif ?>


    <form id="form2" name="form2" method="post" action="member_register_save.php" onsubmit="return dataCheck();">
        <tr class='reg'>
            <td class="lb_tt">註冊</td>
        </tr>
        <tr>
            <td class="lb_nn">
                <label for="name">姓名 <span class="field_warning"> 請輸入姓名</span></label>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="name" id="name" placeholder="請輸入姓名"></td>
        </tr>
        <tr>
            <td class="lb_nn">
				<label for="email">電子郵件 <span class="field_warning"> 請輸入電子郵件</span></label>
			</td>
        </tr>
        <tr>
            <td>
				<input type="text" name="email" id="email" placeholder="請輸入信箱">
			</td>
        </tr>
        <tr>
            <td class="lb_nn">
				<label for="password">密碼 <span class="field_warning"> 請輸入密碼</span></label>
			</td>
        </tr>
        <tr>
            <td><input type="password" name="password" id="password" placeholder="請輸入密碼"></td>
        </tr>
        <tr>
            <td class="lb_nn">
				<label for="password2">密碼確認 <span class="field_warning"> 請再次輸入密碼</span></label>
			</td>
        </tr>
        <tr>
            <td><input type="password" name="password2" id="password2" placeholder="密碼確認"></td>
        </tr>
        <tr>
            <td class="border_up">
                <input type="submit" value="註冊">
			</td>
        </tr>
    </form>
</table>

<div class="xx">
<!--    <span>close</span>-->

    <div class="right45"></div>
    <div class="left45"></div>
</div>


<script>
    // $('#form2').submit(function(event) {
    //     event.preventDefault();
    // }
// $(document).ready(function(){
$(function(){
    event.preventDefault();

    window.loginCheck = function(){
        var $l_email = $('#l_email');
        var $l_password = $('#l_password');
        var l_isPass = true;
        var i;

        var l_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        $('.field_warning').hide();

        if(! l_pattern.test($l_email.val()) ) {
            l_isPass = false;
            $l_email.parent().parent().prev().find('.field_warning').show()
        }

        if(! $l_password.val() ) {
            l_isPass = false;
            $l_password.parent().parent().prev().find('.field_warning').show()
        }

        if(l_isPass) {
            $.post('member_login_check.php', {l_email: $l_email.val(), l_password: $l_password.val()}, function(data){
                alert(data);
                location.reload(true);
            });
        }

        return false;

    };

    // 1
    window.dataCheck = function (){

        var $name = $('#name'),
            $email = $('#email'),
            $password = $('#password'),
            $password2 = $('#password2'),

            isPass = true,
            i;
        var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        $('.field_warning').hide();


        if(! $name.val() ){
            isPass = false;
            //$name.prev().find('.field_warning').show();
            $name.parent().parent().prev().find('.field_warning').show();
        }

        if(! pattern.test($email.val()) ){
            isPass = false;
            $email.parent().parent().prev().find('.field_warning').show();
        }

        if(! $password.val() ){
            isPass = false;
            $password.parent().parent().prev().find('.field_warning').show();
        }

        if($password.val() != $password2.val()){
            isPass = false;
            $password2.parent().parent().prev().find('.field_warning').show();
        }

        if(isPass){
            $.get('has_email.php', {email: $email.val() }, function(data){
                if(data === '0') {
                    document.form2.submit();
                    alert("成功加入會員，請用電子郵件登入");
                } else {
                    alert('這個 email 已被使用');
                }
            });
        }



        return false;
    };
});
</script>
