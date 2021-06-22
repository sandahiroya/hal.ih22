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
<br>
    <h1>管理者側登録画面</h1>
    
 
    <div class="border col-7" id="main">
        
        <h2>管理者登録</h2>
        <form action="" method="post" id="check">
        
            <div class="row">
                <div class="col-md">
                        <div class="form-group">
                            <label>氏名：</label>
                            <input type="text" name="login_name" class="form-control" placeholder="太郎">
                        </div>
                    
                        <div class="form-group">
                            <label>パスワード：</label>
                            <input type="password" name="login_password" class="form-control" >
                        </div>
                </div>
            </div>
            <div class="row center-block text-center">
                <div class="col-1">
                </div>
                <div class="col-5">
                <input type="submit" class="btn btn-outline-secondary" value="戻る" name="return">
                </div>
                <div class="col-5">
                <input type="submit" class="btn btn-outline-info" value="確認" name="check">

                </div>
            </div>
            <div class="col-1">
            </div>
            <br>
        </div>

        
    </form>
</main>

<script>
<?php if(!empty($_POST['check'])){ ?>
    $(function(){
            $('#check').validate({
                rules:{
                    login_name:{
                        required:true
                    },
                    login_password:{
                        required:true
                    }
                },
                messages:{
                    login_name:{
                        required:"入力してください"
                    },
                    login_password:{
                        required:"入力してください",
                    }
                });
        });

    <?php } ?>


</script>
</body>