<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/login.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

</head>
<body>
<header>
    <h1>ログイン</h1>
</header>
<main>
    <?php if(!empty($mess)){ echo $mess; } ?>
<div class="form">
    <form action="login.php" method="post" id="login">
    <table>
        <!--    input内にvalueで変更前のデータを初期値として表示-->
        <tr><td><label><span>ユーザー名</span></td><td><input type="text" name="user_name" id="user_name"></label></td></tr>
        <tr><td><label><span>パスワード</span></td><td><input type="password" name="password" id="password"></label></td></tr>
    </table>

    <input id="submit"  name="submit" type="submit" value="ログイン">

    <input id="submit"  name="new" type="submit" value="新規登録">
    
    </form>
</div>
</main>
</body>