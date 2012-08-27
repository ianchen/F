<?php
require('config.php');
$query = "SELECT * FROM `signup_config` WHERE scid = '1'";
$record = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($record);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<title>錄取參數設定</title>
</head>
<body>
<form action="signup_config_action.php" method="post">
  <table rules="all">
    <tr><td>新人定義:</td><td>出團<input type="text" name="n_num" value="<?php echo $row["n_num"];?>">次以下</td></tr>
    <tr><td>中人定義:</td><td>出團<input type="text" name="m_num" value="<?php echo $row["m_num"];?>">次以上</td></tr>
    <tr><td>老人定義:</td><td>出團<input type="text" name="o_num" value="<?php echo $row["o_num"];?>">次以上</td></tr>
    <tr>
      <td>忙人定義:</td>
      <td><input type="text" name="b_num_1" value="<?php echo $row["b_num_1"];?>">天內出團<input type="text" name="b_num_2" value="<?php echo $row["b_num_2"];?>">次以上
      或<input type="text" name="b_num_3" value="<?php echo $row["b_num_3"];?>">天內報名<input type="text" name="b_num_4" value="<?php echo $row["b_num_4"];?>">次以上</td>
    </tr>
  </table>
  <table rules="all">
    <tr><td>人數</td><td>新男</td><td>中男</td><td>老男</td><td>新女</td><td>中女</td><td>老女</td></tr>
    <tr>
      <td>4</td>
      <td><input type="text" name="dist_0_0" value="<?php echo $row["dist_0_0"];?>"></td>
      <td><input type="text" name="dist_0_1" value="<?php echo $row["dist_0_1"];?>"></td>
      <td><input type="text" name="dist_0_2" value="<?php echo $row["dist_0_2"];?>"></td>
      <td><input type="text" name="dist_0_3" value="<?php echo $row["dist_0_3"];?>"></td>
      <td><input type="text" name="dist_0_4" value="<?php echo $row["dist_0_4"];?>"></td>
      <td><input type="text" name="dist_0_5" value="<?php echo $row["dist_0_5"];?>"></td>
    </tr>
    <tr>
      <td>6</td>
      <td><input type="text" name="dist_1_0" value="<?php echo $row["dist_1_0"];?>"></td>
      <td><input type="text" name="dist_1_1" value="<?php echo $row["dist_1_1"];?>"></td>
      <td><input type="text" name="dist_1_2" value="<?php echo $row["dist_1_2"];?>"></td>
      <td><input type="text" name="dist_1_3" value="<?php echo $row["dist_1_3"];?>"></td>
      <td><input type="text" name="dist_1_4" value="<?php echo $row["dist_1_4"];?>"></td>
      <td><input type="text" name="dist_1_5" value="<?php echo $row["dist_1_5"];?>"></td>
    </tr>
    <tr>
      <td>8</td>
      <td><input type="text" name="dist_2_0" value="<?php echo $row["dist_2_0"];?>"></td>
      <td><input type="text" name="dist_2_1" value="<?php echo $row["dist_2_1"];?>"></td>
      <td><input type="text" name="dist_2_2" value="<?php echo $row["dist_2_2"];?>"></td>
      <td><input type="text" name="dist_2_3" value="<?php echo $row["dist_2_3"];?>"></td>
      <td><input type="text" name="dist_2_4" value="<?php echo $row["dist_2_4"];?>"></td>
      <td><input type="text" name="dist_2_5" value="<?php echo $row["dist_2_5"];?>"></td>
    </tr>
    <tr>
      <td>10</td>
      <td><input type="text" name="dist_3_0" value="<?php echo $row["dist_3_0"];?>"></td>
      <td><input type="text" name="dist_3_1" value="<?php echo $row["dist_3_1"];?>"></td>
      <td><input type="text" name="dist_3_2" value="<?php echo $row["dist_3_2"];?>"></td>
      <td><input type="text" name="dist_3_3" value="<?php echo $row["dist_3_3"];?>"></td>
      <td><input type="text" name="dist_3_4" value="<?php echo $row["dist_3_4"];?>"></td>
      <td><input type="text" name="dist_3_5" value="<?php echo $row["dist_3_5"];?>"></td>
    </tr>
    <tr>
      <td>12</td>
      <td><input type="text" name="dist_4_0" value="<?php echo $row["dist_4_0"];?>"></td>
      <td><input type="text" name="dist_4_1" value="<?php echo $row["dist_4_1"];?>"></td>
      <td><input type="text" name="dist_4_2" value="<?php echo $row["dist_4_2"];?>"></td>
      <td><input type="text" name="dist_4_3" value="<?php echo $row["dist_4_3"];?>"></td>
      <td><input type="text" name="dist_4_4" value="<?php echo $row["dist_4_4"];?>"></td>
      <td><input type="text" name="dist_4_5" value="<?php echo $row["dist_4_5"];?>"></td>
    </tr>
    <tr>
      <td>14</td>
      <td><input type="text" name="dist_5_0" value="<?php echo $row["dist_5_0"];?>"></td>
      <td><input type="text" name="dist_5_1" value="<?php echo $row["dist_5_1"];?>"></td>
      <td><input type="text" name="dist_5_2" value="<?php echo $row["dist_5_2"];?>"></td>
      <td><input type="text" name="dist_5_3" value="<?php echo $row["dist_5_3"];?>"></td>
      <td><input type="text" name="dist_5_4" value="<?php echo $row["dist_5_4"];?>"></td>
      <td><input type="text" name="dist_5_5" value="<?php echo $row["dist_5_5"];?>"></td>
    </tr>
  </table>
  <input type="submit" value="送出">
</form>

</body>
</html>
