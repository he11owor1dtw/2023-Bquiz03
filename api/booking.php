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
    box-sizing: border-box;
    padding: 19px 112px 0 112px;
  }

  .seat {
    width: 63px;
    height: 85px;
    position: relative;
  }

  .seats {
    display: flex;
    flex-wrap: wrap;
  }

  .chk {
    position: absolute;
    right: 1px;
    bottom: 1px;
  }
</style>

<div id="room">
  <div class="seats">
    <?php
    for ($i = 0; $i < 20; $i++) {

      echo "<div class='seat'>";
      echo "<div class='ct'>";
      echo (floor($i / 5) + 1) . "排";
      echo (($i % 5) + 1) . "號";
      echo "</div>";
      echo "<div class='ct'>";
      echo "<img src='./icon/03D02.png'>";
      echo "</div>";
      echo "<input type='checkbox' name='chk' value='$i' class='chk'></input>";
      echo "</div>";
    }
    ?>
  </div>
</div>
<div id="info" style="display:flex;flex-direction:column;justify-content:center">
  <div style="text-align: center">您選擇的電影是：<?= $movie['name']; ?></div>
  <div style="text-align: center">您選擇的時刻是：<?= $date; ?>&nbsp;<?= $session; ?></div>
  <div style="text-align: center">您已經勾選<span id='tickets'>0</span>張票，最多可以購買四張票</div>
  <div style="margin-top: 5px; text-align: center">
    <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
    <button onclick="checkout()">訂購</button>
  </div>
</div>

<script>
  let seats = new Array();

  $(".chk").on("change", function() {
    if ($(this).prop('checked')) {
      if (seats.length + 1 <= 4) {
        seats.push($(this).val())
      } else {
        $(this).prop('checked', false)
        alert("每個人只能購買四張票")
      }
    } else {
      seats.splice(seats.indexOf($(this).val()), 1)
    }
    console.log(seats.length)
    $("#tickets").text(seats.length)
  })

  function checkout() {
    $.post("./api/checkout.php", {
        movie: '<?= $movie['name']; ?>',
        date: '<?= $date; ?>',
        session: '<?= $session; ?>',
        seats
      },
      (no) => {
        location.href = `?do=result&no=${no}`;
      })
  }
</script>