<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>真的一卡通网站——录入</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "Flanker_E";
    $password = "XamppFlanker1998";
    $dbname = "flanker_e";
    
 
    // 创建连接
    $conn = new mysqli($servername, $username, $password,$dbname);
 
    // 检测连接
    if ($conn->connect_error) 
    {
    die("连接失败: " . $conn->connect_error);
    } 
    echo "连接成功";
    ?>  
    <hr>
    <img src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=2594875555,3838868168&fm=26&gp=0.jpg" align="left"  width="245" height="65" vspace="0" >
    <font size="+2"><strong>这个是真的一卡通系统<BR>不骗你</strong></font>
    <BR>
    <hr>
<p><a href="http://localhost/select.php">真的查询系统</a>
   <a href="http://localhost/update.php">真的修改系统</a>
   <a href="http://localhost/updatebalance.php">真的充值系统</a></p>
    <hr>
    <BR>
    <BR>

<?php
header("Content-type:text/html;charset=utf-8");
// 定义变量并默认设置为空值
$SgradeErr = $SnoErr = $nameErr = $BIRTHErr = $SexErr = $SdeptErr = $SbankcardErr = "";
$Sgrade = $Sno = $name = $BIRTH = $year = $month = $day = $Sex = $Sdept = $Sbankcard = $Sbalance = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    if (empty($_POST["Sgrade"]))
    {
        $SnoErr = "年级是必需的";
    }
    else
    {
    $Sgrade = test_input($_POST["Sgrade"]);
    }
    
    if (empty($_POST["Sno"]))
    {
        $SnoErr = "学号是必需的";
    }
    else
    {
        $Sno = test_input($_POST["Sno"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[0-9 ]*$/",$Sno) or strlen($Sno)!=7)
        {
            $SnoErr = "输入有误";  
        }
    }
    
    if (empty($_POST["name"]))
    {
        $nameErr = "名字是必需的";
    }
    else
    {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["year"]) or empty($_POST["month"]) or empty($_POST["day"]))
    {
        $BIRTHErr = "生日是必需的";
    }
    else
    {
    $year = test_input($_POST["year"]);
    $month = test_input($_POST["month"]);
    $day = test_input($_POST["day"]);
    }   

    if (empty($_POST["Sex"]))
    {
        $SexErr = "性别是必需的";
    }
    else
    {
        $Sex = test_input($_POST["Sex"]);
    }
    
    if (empty($_POST["Sdept"]))
    {
        $Sdept = "";
    }
    else
    {
        $Sdept = test_input($_POST["Sdept"]);
    }
    

    if (empty($_POST["Sbankcard"]))
    {
        $Sbankcard = "";
    }
    else
    {
        $Sbankcard = test_input($_POST["Sbankcard"]);
        // 检测cardcode是否合法
        if (!preg_match("/^[0-9 ]*$/",$Sbankcard))
        {
            $SbankcardErr = "只允许数字"; 
        }
    }
    
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    年份:
   <select name="Sgrade">
   <option value="" selected="selected"></option>
   <option value="2018">2018</option>
   <option value="2017">2017</option>
   <option value="2016">2016</option>
   </select>
   <br><br>
   学号: <input type="text" name="Sno" value="<?php echo $Sno;?>" maxlength="7">
   <span class="error">* <?php echo $SnoErr;?></span>
   <br><br>
   名字: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   生日:  
   <select name="year">
   <option value="" selected="selected"></option>
   <option value="1998">1998</option>
   <option value="1999">1999</option>
   <option value="2000">2000</option>
   </select>
   <select name="month">
   <option value="" selected="selected"></option>
   <option value="01">01</option>
   <option value="02">02</option>
   <option value="03">03</option>
   <option value="04">04</option>
   <option value="05">05</option>
   <option value="06">06</option>
   <option value="07">07</option>
   <option value="08">08</option>
   <option value="09">09</option>
   <option value="10">10</option>
   <option value="11">11</option>
   <option value="12">12</option>
   </select>
   <select name="day">
   <option value="" selected="selected"></option>
   <option value="01">01</option>
   <option value="02">02</option>
   <option value="03">03</option>
   <option value="04">04</option>
   <option value="05">05</option>
   <option value="06">06</option>
   <option value="07">07</option>
   <option value="08">08</option>
   <option value="09">09</option>
   <option value="10">10</option>
   <option value="11">11</option>
   <option value="12">12</option>
   <option value="13">13</option>
   <option value="14">14</option>
   <option value="15">15</option>
   <option value="16">16</option>
   <option value="17">17</option>
   <option value="18">18</option>
   <option value="19">19</option>
   <option value="21">21</option>
   <option value="22">22</option>
   <option value="23">23</option>
   <option value="24">24</option>
   <option value="25">25</option>
   <option value="26">26</option>
   <option value="27">27</option>
   <option value="28">28</option>
   <option value="29">29</option>
   <option value="30">30</option>
   <option value="31">31</option>
   </select>
   不会设置正确年月日阈值，文明选择靠自觉！
   <span class="error">* <?php echo $BIRTHErr;?></span>
   <br><br>
   性别:
   <input type="radio" name="Sex" <?php if (isset($Sex) && $Sex=="女") echo "checked";?>  value="女">女
   <input type="radio" name="Sex" <?php if (isset($Sex) && $Sex=="男") echo "checked";?>  value="男">男
   <span class="error">* <?php echo $SexErr;?></span>
   <br><br>
   专业: <input type="text" name="Sdept" value="<?php echo $Sdept;?>" maxlength="10">
   <span class="error"><?php echo $SdeptErr;?></span>
   <br><br>
   卡号: <input type="text" name="Sbankcard" value="<?php echo $Sbankcard;?>"maxlength="15">
   <span class="error"> <?php echo $SbankcardErr;?></span>
   <br><br>
   <p><span class="error">* 录入系统。</span></p>
   <p><span class="error">* 必需字段。</span></p>
   <p><hr></p>
   <input type="submit" name="submit" value="提交"> <input type="reset"/ value="重置">
</form>
<p><hr></p>
<?php

if($Sno!="")
{
    $sql = "INSERT INTO `ecard` (`Sgrade`, `Sno`, `Sname`, `Syear`, `Smonth`, `Sday`, `Sex`, `Sdept`, `Sbalance`, `Sbankcard`) 
    VALUES('$Sgrade','$Sno','$name','$year','$month','$day','$Sex','$Sdept','0','$Sbankcard')";
 
    if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功";
    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "SELECT `Sgrade`, `Sno`, `Sname`, `Syear`, `Smonth`, `Sday`, `Sex`, `Sdept`, `Sbalance`, `Sbankcard` FROM `ecard` WHERE Sno='$Sno'";
    /*$sql = "SELECT id, firstname, lastname FROM MyGuests";*/
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
    // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
        ?>
    <table border=1>
    <tr>
        <th rowspan=2>真的一卡通系统</th>
        <th>年级</th>
        <th>学号</th>  
        <th>姓名</th>
        <th>生日</th>
        <th>性别</th>
        <th>专业</th>
        <th>账户余额</th>
        <th>银行卡号</th>
    </tr>
    <tr>
        <td><?php echo $row["Sgrade"]?></td>
        <td><?php echo $row["Sno"]?></td>
        <td><?php echo $row["Sname"]?></td>
        <td><?php echo $row["Syear"]. "-" .$row["Smonth"]. "-" .$row["Sday"]?></td>
        <td><?php echo $row["Sex"]?></td>
        <td><?php echo $row["Sdept"]?></td>
        <td><?php echo $row["Sbalance"]?></td>
        <td><?php echo $row["Sbankcard"]?></td>
    </tr>
    </table>
        <?php
        }
    } else {
    echo "0 结果";
    }
}
?>

 
</body>
</html>