<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 
    <!-- <script src="./js/jquery-3.5.1.min.js"></script> -->
    <script src="./js/chart.min.js"></script>
    <script src="./js/chart.bundle.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script> -->
    <title>管理者</title>
</head>
<body>
<h1>管理者画面</h1>
<form action="" method="post">
    <input type="submit" class="btn btn-danger" name="logout" id="submit" value="ログアウト">
</form>

<form action="" method="post">
<input type="text" name="search_word" id="search">
<input type="submit" class="btn btn-outline-secondary" name="search" value="検索">
</form>

<form action="" method="post">
<input id="submit" class="btn btn-outline-secondary" name="all_up" type="submit" value="売り上げ">
<input id="submit" class="btn btn-outline-secondary" name="product" type="submit" value="商品">
<input id="submit" class="btn btn-outline-secondary" name="user_info" type="submit" value="ユーザー状況">
</form>

<p><?php if(!empty($mess)){ echo $mess; } ?></p>


<?php if(!empty($price_sum)){ ?>
<p><?php echo $price_sum;  ?>円</p>
    <canvas id="myLineChart" width="2" height="1">
    </canvas>

<?php } ?>


<?php if(!empty($product_info)){ ?>
        <form action="" method="post">
        <table　class="table table-striped">
            <tr class="table-primary">
                <td colspan="">価格        <input type="submit" class="btn btn-outline-danger" name="price_up" id="submit" value="昇順"><input type="submit" class="btn btn-outline-primary" name="price_down" id="submit" value="降順"></td>
                <td colspan="2">出品日      <input type="submit" class="btn btn-outline-danger" name="day_up" id="submit" value="昇順"><input type="submit" class="btn btn-outline-primary" name="day_down" id="submit" value="降順"> </td>
                <td colspan="2"><input type="submit" class="btn btn-outline-danger" name="sold" id="submit" value="購入された商品"></td>
            </tr>
        </form>
            <form action="" method="post">
            <tr>
                <td colspan="6">カテゴリー<br>
                <input type="checkbox" class="form-check-input"  name="category[]" id="check" value="1">レディース<input type="checkbox" class="form-check-input" name="category[]" id="check" value="2">メンズ
                <input type="checkbox" class="form-check-input" name="category[]" id="check" value="3">ベビー・キッズ<input type="checkbox" class="form-check-input" name="category[]" id="check" value="4">本
                <input type="checkbox" class="form-check-input" name="category[]" id="check" value="5">音楽<input type="checkbox" class="form-check-input" name="category[]" id="check" value="6">ゲーム<br>
                <input type="checkbox" class="form-check-input" name="category[]" id="check" value="7">コスメ<input type="checkbox" class="form-check-input" name="category[]" id="check" value="8">おもちゃ
                <input type="checkbox" class="form-check-input" name="category[]" id="check" value="9">家電<input type="checkbox" class="form-check-input" name="category[]" id="check" value="10">スポーツ・レジャー
                <input type="checkbox" class="form-check-input" name="category[]" id="check" value="11">ハンドメイド<input type="checkbox" class="form-check-input" name="category[]" id="check" value="12">自転車・オートバイ<br>
                <input type="submit" class="btn btn-outline-secondary" name="category[]" id="submit" value="検索"></td>
            </tr>
            </form>
        </table>
        <table class="table table-striped">
            <tr><td>商品ID</td><td>タイトル</td><td>価格</td><td>ジャンル</td><td>ブランド</td><td>出品日</td><td>購入日</td></tr>

        <?php for($i=0;$i < count($product_info);$i++){ ?>
        <tr>
            <td><?php echo $product_info[$i][0]; ?></td>
            <td><?php echo $product_info[$i][3]; ?></td>
            <td><?php echo $product_info[$i][5]; ?></td>
            <td><?php echo $product_info[$i][1]; ?></td>
            <td><?php if($product_info[$i][2] !== NULL){ echo $product_info[$i][2];}else{ echo "なし";} ?></td>
            <td><?Php echo $product_info[$i][9]; ?></td>
            <td><?php echo $product_info[$i][6] ?></td>
        </tr>
        <?php }?>
    </table>
<?php }else if(!empty($null_mess)){ ?>
<p><?= $null_mess ?></p>
<?php } ?>


    <?php if(!empty($man_percent)){ ?>
      <p>男女比</p>
    <p>男性：<?= $man_percent ?>%   女性：<?= $woman_percent ?>%</p>
    <div class="graph">
      <canvas id="myPieChart" width="5" height="1">
      </canvas>
    </div>

    <canvas id="myDoughnutChart">
    </canvas>
    <?php } ?>


    <?php if(!empty($percent)){ ?>
      <p>アクティブユーザー</p>
        <p>アクティブユーザーの割合<?= $percent ?>%</p>
    <form action="" method="post">
        <input type="submit" class="btn btn-outline-secondary" name="day_user" id="submit" value="日間">
        <input type="submit" class="btn btn-outline-secondary" name="week_user" id="submit" value="週間">
        <input type="submit" class="btn btn-outline-secondary" name="month_user" id="submit" value="月間">
        <input type="submit" class="btn btn-outline-secondary" name="year_user" id="submit" value="年間">
    </form>
    <?php } ?>

<?php if(!empty($user_info)){ ?>

      <form action="" method="post">
        <table class="table table-striped">
            <tr>
                <td colspan="">登録日        <input type="submit" class="btn btn-outline-danger" name="registration_up" id="submit" value="昇順"><input type="submit" class="btn btn-outline-primary" name="registration_down" id="submit" value="降順"></td>
                <td colspan="2">ログイン日      <input type="submit" class="btn btn-outline-danger" name="login_up" id="submit" value="昇順"><input type="submit" class="btn btn-outline-primary" name="login_down" id="submit" value="降順"> </td>
                <td colspan="2">男女      <input type="submit" class="btn btn-outline-danger" name="woman" id="submit" value="女性"> <input type="submit" class="btn btn-outline-primary" name="man" id="submit" value="男性"></td>
            </tr>
        </form>

<?php if(!empty($user_info)){ ?>

    <table class="table table-striped">
        <tr>
            <td>ID</td><td>名前</td><td>性別</td><td>メール</td><td>電話番号</td><td>生年月日</td><td>ログイン日</td><td>会員登録日</td>
        </tr>
        <?php for($c=0;$c<count($user_info);$c++){ ?>
        <tr>
            <td><?= $user_info[$c][0] ?></td>
            <td><?= $user_info[$c][1] ?><?= $user_info[$c][2] ?></td>
            <td><?= $user_info[$c][8] ?></td>
            <td><?= $user_info[$c][5] ?></td>
            <td><?= $user_info[$c][6] ?></td>
            <td><?= $user_info[$c][7] ?></td>
            <td><?= $user_info[$c][10] ?></td>
            <td><?= $user_info[$c][11] ?></td>
        </tr>
        <?php } ?>
    </table>

<?php }?>

<?php }elseif(!empty($percent) && $user_info){ ?>
  <p>ログインしたユーザーはいません</p>
<?php } ?>



<script>
<?php  if(!empty($man_percent)){ ?>
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["男性", "女性"], //データ項目のラベル
      datasets: [{
          backgroundColor: [
              "aqua",
              "hotpink"
          ],
          data: [<?php echo $man_percent ?>, <?php echo $woman_percent?>] //グラフのデータ
      }]
    },
    options: {
      title: {
        display: true,
        //グラフタイトル
        text: '男女比'
      }
    }
  });

  var w = $('.gragh').width();
  var h = $('.gragh').height();
  $('#myPieChart').attr('width',w);
  $('#myPieChart').attr('height',h);
  <?php } ?>

<?php if(!empty($price_sum)){ ?>
  var ctx = document.getElementById("myLineChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [<?php echo $five_year; ?>,<?php echo $foru_year; ?>,<?php echo $three_year; ?>,<?php echo $two_year; ?>,<?php echo $this_year; ?>],
      datasets: [
        {
          label: '売り上げ（円）',
          data: [<?= $five_sum ?>, <?= $foru_sum ?>, <?= $three_sum ?>, <?= $two_sum ?>, <?= $price_sum ?>],
          borderColor: "rgba(255,0,0,1)",
          backgroundColor: "rgba(0,0,0,0)"
        },
        {
          label: '目標（円）',
          data: [1000, 2000, 3000, 4000, 5000],
          borderColor: "rgba(0,0,255,1)",
          backgroundColor: "rgba(0,0,0,0)"
        }
      ],
    },
    options: {
      title: {
        display: true,
        text: '売り上げ金額（過去から現在まで５年分）'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 1000,
            suggestedMin: 0,
            stepSize: 500,
            callback: function(value, index, values){
              return  value +  '円'
            }
          }
        }]
      },
    }
  });
  <?php } ?>
</script>

</body>
</html>