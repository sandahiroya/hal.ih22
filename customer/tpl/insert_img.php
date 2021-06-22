<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert_clea.css">
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <title>Document</title>
</head>

<body>
<header>
    <h1>出品</h1>
</header>

<form method="post" action="insert_clea.php" enctype="multipart/form-data" >
    <input type="file" id="imgs[]" name="imgs[]" accept="image/*" multiple><br>
    <div class="container">
        <img id="img"><br>
        <img id="img2"><br>
        <img id="img3"><br>
    </div>
    <input type="submit" name="submit" id="submit" value="確定">
</form>


<script>
        let inputFiles = document.getElementById('imgs[]');
    let image1 = document.getElementById('img');
    let image2 = document.getElementById('img2');
    let image3 = document.getElementById('img3');

    inputFiles.addEventListener("change",function(e){
        console.log(e.target.files)
    },false);

    inputFiles.addEventListener("change",function(e){
        let file = e.target.files
        let reader = new FileReader()
        
        reader.readAsDataURL(file[0])
        
        reader.onload = function(){
                image1.src = reader.result;
        }
        
       
    },false);


    inputFiles.addEventListener("change",function(e){
        let file = e.target.files
        let reader = new FileReader()
        
        reader.readAsDataURL(file[1])
        
        reader.onload = function(){
                image2.src = reader.result;
        }
        
       
    },false);

    inputFiles.addEventListener("change",function(e){
        let file = e.target.files
        let reader = new FileReader()
        
        reader.readAsDataURL(file[2])
        
        reader.onload = function(){
                image3.src = reader.result;
        }
        
       
    },false);
    
</script>

</body>

</html>