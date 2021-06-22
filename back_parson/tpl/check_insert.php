<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 

</head>
<body>
<h1>管理者側登録画面</h1>
    
 
    <div class="border col-7" id="main">
        
        <h2>管理者確認</h2>
        <form action="" method="post" >
        
        <div class="row">
            <div class="col-md">
                    <div class="form-group">
                        <label>氏名：</label>
                        <label><?php echo $info; ?></label>
                    </div>
                  
                    <div class="form-group">
                        <label>パスワード：</label>
                        <label><?php echo $password; ?></label>
                    </div>
            </div>
        </div>
        <div class="row center-block text-center">
            <div class="col-1">
            </div>
            <div class="col-5">
            <input id="submit" class="btn btn-outline-secondary" name="return" type="submit" value="戻る">
            </div>
            <div class="col-5">
            <input id="submit" class="btn btn-outline-info"  name="comp" type="submit" value="確定">

            </div>
        </div>
        <div class="col-1">
        </div>
        <br>
    </div>

</body>