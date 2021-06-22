<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>

<link rel="stylesheet" href="css/product_detail.css">

</head>

<body>
<!--ヘッダー入れる-->
<header>
    <h1><?php echo $product_row['product_name'] ?></h1>
    <form action="cart.php" method="post">
        <button type="submit" id="cart">カート</button>
    </form>
</header>

<main>
    <?php if(!empty($error)){ ?>
        <p><?php echo $error;  ?></p>
    <?php }?>
    <!--スターターの場合は登録されている分 画像がスライドする-->
    <!--ブランド福袋の場合はそのブランドの画像のようなものが表示される-->
    <div class="slider">
        <ul class="slider-inner">
            <?php if(!empty($img_info)){ 
                    for($i=0;$i<count($img_info);$i++){ ?>
                <li><img src="./img/main/<?php echo $img_info[$i][2] ?>.<?php echo $img_info[$i][3] ?>" class="imgs" id="img<?php echo ($i+1)?>"></li>
            <?php   } 
            } else{?>
                <p><img src="./img/a.jpg" class="bag_img"></p>
            <?php }?>
        </ul>
        <ul class="nav">
        </ul>
        <p id="arrow-prev" class="arrow">←</p>
        <p id="arrow-next" class="arrow">→</p>
    </div>


<div class="details">
    <div class="info">
        <p><span>商品タイトル：</span><?php echo $product_row['product_name']; ?></p>
        <p><span>商品詳細：</span><?php echo $exhibit_row['product_detail']; ?></p>
        <p><span>値段：</span><?php echo $product_row['exhibit_price']; ?></p>
        <p><sapn>カテゴリ：</sapn><?php echo $category_row['category_name']; ?></p>
        <p><span><?php  echo $msg ?></span><?php echo $msg2 ?></p></div>
    </div>
</main>
<div class="button">
    <form action="product_detail.php" method="post">
        <input type="hidden" name="cart" value="<?php echo $product_row['product_id']; ?>">
        <!--カートへ入れるボタン(submitボタン)はJSを使わないとリロードが入る-->
        <button type="submit" name="cart2" id="cart2">カートへ入れる</button>
        <!--<input type="button" value="カートへ入れる" name="cart" onclick="cccc">-->
    </form>

    <form action="product_detail.php" method="post">
        <button type="submit" name="return" id="cart2" value="return" class="return">戻る</button>
    </form>
</div>


<script>
    let imgs = new Array(3);
    let id = document.getElementById('img1');
    imgs[0] =  id.getAttribute('src');
    id = document.getElementById('img2');
    imgs[1] = id.getAttribute('src');
    id = document.getElementById('img3');
    imgs[2] = id.getAttribute('src');

    for(let i = 0; i < imgs.length; i++){
        let nav = document.createElement("li");

        nav.setAttribute("data-nav-index",i);

        document.getElementsByClassName("nav")[0].appendChild(nav);
    }
   

// スライドの数を取得(処理のために-1する)
var length = imgs.length - 1;
// クラス名「imageSlide」に画像の1枚の要素を格納
var imageSlide = document.getElementsByClassName("slider-inner")[0].getElementsByTagName("li");
// クラス名「dotNavigation」にドットナビの1つの要素を格納
var dotNavigation = document.getElementsByClassName("nav")[0].getElementsByTagName("li");
// 「現在○○枚目のスライドを表示している」というインデックス番号を格納する変数
var nowIndex = 0;
// 現在表示されている画像とドットナビにクラス名を付ける
imageSlide[nowIndex].classList.add("show");
dotNavigation[nowIndex].classList.add("current");
// スライドがアニメーション中か判断するフラグ
var isChanging = false;
// スライドのsetTimeoutを管理するタイマー
var slideTimer;
// スライド切り替え時に呼び出す関数
function sliderSlide(val) {
	if (isChanging === true) {
		return false;
	}
	isChanging = true;
	// 現在表示している画像とナビからクラス名を削除
	imageSlide[nowIndex].classList.remove("show");
	dotNavigation[nowIndex].classList.remove("current");
	nowIndex = val;
	// 次に表示するスライドとナビにカレントクラスを設定
	imageSlide[nowIndex].classList.add("show");
	dotNavigation[nowIndex].classList.add("current");
	// アニメーションが終わるタイミングでisChangingのステータスをfalseに
	slideTimer = setTimeout(function(){
		isChanging = false;
	}, 600);
}

// 左矢印のナビをクリックした時のイベント
document.getElementById("arrow-prev").addEventListener("click", function(){
	var index = nowIndex - 1;
	if(index < 0){
	  index = length;
	}
	sliderSlide(index);
}, false);
// 右矢印のナビをクリックした時のイベント
document.getElementById("arrow-next").addEventListener("click", function(){
	var index = nowIndex + 1;
	if(index > length){
	  index = 0;
	}
	sliderSlide(index);
}, false);
// ドットナビをクリックした時のイベントを作成
for(var i = 0; i < dotNavigation.length; i++) {
	// データ属性のインデックス番号を元にスライドを行う
	dotNavigation[i].addEventListener("click", function(){
		var index = Number(this.getAttribute("data-nav-index"));
		sliderSlide(index);
	}, false);
}
</script>

</body>
</html>
