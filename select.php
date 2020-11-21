<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>真的一卡通网站——查询</title>
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
    if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
    } 
    echo "连接成功";
    ?>  
    <hr>
    <img src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=2594875555,3838868168&fm=26&gp=0.jpg" align="left"  width="245" height="65" vspace="0" >
    <font size="+2"><strong>我是真的查询系统<BR>我怎么会骗你呢</strong></font>
    <BR>
    <hr>
<p><a href="http://localhost/ecard.php/">真的录入按钮</a>
   <a href="http://localhost/update.php">真的修改系统</a>
   <a href="http://localhost/updatebalance.php">真的充值系统</a></p>
    <hr>
    <BR>
    <BR>

<?php
// 定义变量并默认设置为空值
$SgradeErr = $SnoErr = $nameErr = $BIRTHErr = $SexErr = $SdeptErr = $SbankcardErr = "";
$Sgrade = $Sno = $name = $BIRTH = $year = $month = $day = $Sex = $Sdept = $Sbankcard = $Sbalance = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    
    $Sgrade = test_input($_POST["Sgrade"]);
    
    
    if (empty($_POST["Sno"]))
    {
        $SnoErr = "学号是必需的";
    }
    else
    {
        $Sno = test_input($_POST["Sno"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[0-9 ]*$/",$Sno))
        {
            $SnoErr = "只允许数字"; 
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
  
    if (empty($_POST["Sex"]))
    {
        $SexErr = "性别是必需的";
    }
    else
    {
        $Sex = test_input($_POST["Sex"]);
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
   <option value="2018">2018</option>
   <option value="2017">2017</option>
   <option value="2016">2016</option>
   </select>
   <span class="error">* <?php echo $SgradeErr;?></span>
   <br><br>
   学号: <input type="text" name="Sno" value="<?php echo $Sno;?>" maxlength="7">
   <span class="error">* <?php echo $SnoErr;?></span>
   <br><br>
   名字: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   性别:
   <input type="radio" name="Sex" <?php if (isset($Sex) && $Sex=="女") echo "checked";?>  value="女">女
   <input type="radio" name="Sex" <?php if (isset($Sex) && $Sex=="男") echo "checked";?>  value="男">男
   <span class="error">* <?php echo $SexErr;?></span>
   <br><br>
   <p><span class="error">* 虽然这个网站不一定是真的，但是你需要提供足量的信息保证你是真的</span></p>
   <p><span class="error">* 必需字段。</span></p>
   <p><hr></p>
   <input type="submit" name="submit" value="提交"> <input type="reset"/ value="重置">
   <p><hr></p> 
</form>

<?php
if($Sno!="")
{
    $sql = "SELECT `Sgrade`, `Sno`, `Sname`, `Syear`, `Smonth`, `Sday`, `Sex`, `Sdept`, `Sbalance`, `Sbankcard` FROM `ecard` 
    WHERE Sgrade = '$Sgrade'AND Sno='$Sno'AND Sname = '$name'AND Sex = '$Sex' ";
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