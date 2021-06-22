<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>変更確認</h1>
</header>
<main>
<form action="" method="post">
    <div class="form">
        <table>
            <tr>
                <td colspan="2"><span>姓</span></td><td colspan="1"><span><?php echo $_POST['fam_name'];?></span></td>
                <td colspan="2"><span>名</span></td><td colspan="1"><span><?php echo $_POST['name'];?></span><br></td>  
            </tr>
            <tr>
                <td colspan="2"><span>セイ</span></td ><td colspan="1"><span><?php echo $_POST['fam_name_ruby'];?></span></td>
                <td colspan="2"><span>メイ</span></td><td colspan="1"><span><?php echo $_POST['name_ruby'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>郵便番号</span></td><td colspan="4"><span><?php echo $_POST['zipcode'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>住所</span></td><td colspan="4"><span><?php echo $_POST['address'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>性別</span></td><td colspan="4"><span><?php echo $gender;?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>生年月日</span></td><td colspan="4"><span><?php echo $_POST['birthday'];?></span></td>
            </tr> 
            <tr>
                <td colspan="3"><span>電話番号</span></td><td colspan="4"><span><?php echo $_POST['number'];?></span></td>  
            </tr>
            <tr>
                <td colspan="3"><span>メールアドレス</span></td><td colspan="4"><span><?php echo $_POST['mail'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>パスワード</span></td><td colspan="4"><span><?php if(!empty($_POST['password'])){echo $_POST['password'];}?></span></td>
            </tr>
        </table>
    
        <input type="submit" id="submit" name="return" value="戻る">
        <input type="submit" id="submit" name="submit_comp" value="確認">

    </div>
</form>
</main>
</body>