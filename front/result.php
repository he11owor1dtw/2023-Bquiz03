<?php
$order = $Order->find(['no' => $_GET['no']]);
?>

<div style="display:flex;justify-content:center;margin-top:30px">
  <table>
    <tr>
      <td colspan="2">感謝您的訂購，您的訂單編號是：<?= $_GET['no']; ?></td>
    </tr>
    <tr style="text-align:center">
      <td>電影名稱</td>
      <td><?= $order['movie']; ?></td>
    </tr>
    <tr style="text-align:center">
      <td>日期：</td>
      <td><?= $order['date']; ?></td>
    </tr>
    <tr style="text-align:center">
      <td>場次時間</td>
      <td><?= $order['session']; ?></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center;">
        座位：
        <?php
        $seats = unserialize($order['seats']);
        foreach ($seats as $seat) {
          echo (floor($seat / 5) + 1) . "排";
          echo (($seat % 5) + 1) . "號";
          echo "<br>";
        }

        echo "共{$order['qt']}張電影票"
        ?>
      </td>
      <td></td>
    </tr>
  </table>
</div>

<div class="ct"><button onclick="location.href='index.php'">確認</button></div>