<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/login.css"> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <title>管理者</title>
</head>
<body>

<h1>管理者ログイン画面</h1>
<div class="container">
	<div class="login-container">
        <div class="form-box">
            <form action="" method="post" id="login">
            <p class="text-danger"><?php if(!empty($nothing)){ echo $nothing; } ?></p>
                <input type="text" name="login_id">
                <input type="password" name="login_password">
                <input class="btn btn-outline-primary" id="submit"  name="submit" type="submit" value="ログイン">
                <input id="submit"  name="new" type="submit" class="btn btn-outline-secondary" value="新規登録">
            </form>
        </div>
    </div>
        
</div>


<script>
<?php if(!empty($_POST['submit'])){ ?>
    $(function(){
            $('#login').validate({
                rules:{
                    login_id:{
                        required:true
                    },
                    login_password:{
                        required:true
                    }
                },
                messages:{
                    login_id:{
                        required:"入力してください"
                    },
                    login_password:{
                        required:"入力してください",
                    }
                }
            });
        });

    <?php } ?>


</script>


</body>
</html>