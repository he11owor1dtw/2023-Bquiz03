<?php
include_once "db.php";

$movie = $Movie->find($_GET['movie_id']);
$date = $_GET['date'];
$session = $_GET['session']
?>

<style>
  #room {
    background-image: url('./icon/03D04.png');
    background-position: center;
    background-repeat: none;
    width: 540px;
    height: 370px;
    margin: auto;
  }
</style>

<div id="room">
</div>
<div id="info" style="display:flex;flex-direction:column;justify-content:center">
  <div style="text-align: center">您選擇的電影是：<?= $movie['name']; ?></div>
  <div style="text-align: center">您選擇的時刻是：<?= $date; ?>&nbsp;<?= $session; ?></div>
  <div style="text-align: center">您已經勾選<span id='tickets'>0</span>張票，最多可以購買四張票</div>
  <div style="margin-top: 5px; text-align: center">
    <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
    <button>訂購</button>
  </div>
</div>
</div>