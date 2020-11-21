<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>真的一卡通网站——充值</title>
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
    <img src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=2594875555,3838868168&fm=26&gp=0.jpg" align="left"  width="245" height="65" vspace="13" >
    <font size="+2"><strong>如果您路过<BR>请给学号1751732同学<BR>充值一千块钱</strong></font>
    <BR>
    <hr>
<p><a href="http://localhost/ecard.php/">真的录入按钮</a>
   <a href="http://localhost/select.php">真的查询系统</a>
   <a href="http://localhost/update.php">真的修改系统</a></p>
    <hr>
    <BR>
    <BR>

<?php
// 定义变量并默认设置为空值
$SnoErr = $nameErr  =$SbalanceErr= "";
$Sno = $name = $Sbalance = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   
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
    if (empty($_POST["Sbalance"]))
    {
        $Sbalance = 0;
    }
    else
    {
        $Sbalance = test_input($_POST["Sbalance"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[0-9 ]*$/",$Sbalance) or $Sbalance%10!=0 or $Sbalance<0)
            {
               $SbalanceErr = "输入有误,注意充值10倍正数"; 
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

   学号: <input type="text" name="Sno" value="<?php echo $Sno;?>" maxlength="7">
   <span class="error">* <?php echo $SnoErr;?></span>
   <br><br>
   名字: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   充值金额: <input type="text" name="Sbalance" value="<?php echo $Sbalance;?>" maxlength="7">
   <span class="error">*请充值10倍正数，不输入为查询，然后你会发现负数可以偷偷扣款 <?php echo $SbalanceErr;?></span>
   <br><br>
   <p><span class="error">* 必需字段。</span></p>
   <p><hr></p>
   <input type="submit" name="submit" value="充值/查询余额"> <input type="reset"/ value="重置">
   <p><hr></p> 
</form>

<?php
if($Sno!="")
{
    $sql="UPDATE `ecard`SET`Sbalance`=`Sbalance`+'$Sbalance'
    WHERE Sno='$Sno'AND Sname = '$name'";
    if ($conn->query($sql) === TRUE) 
    {
    echo "修改成功！<br>";
    $sql = "SELECT `Sgrade`, `Sno`, `Sname`, `Sbalance` FROM `ecard` 
    WHERE Sno='$Sno'AND Sname = '$name'";
    /*$sql = "SELECT id, firstname, lastname FROM MyGuests";*/
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
    // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
        ?>
    <table border=1>
    <tr>
        <th rowspan=2>真的充值/查询系统</th>
        <th>年级</th>
        <th>学号</th>  
        <th>姓名</th>
        <th>账户余额</th>
    </tr>
    <tr>
        <td><?php echo $row["Sgrade"]?></td>
        <td><?php echo $row["Sno"]?></td>
        <td><?php echo $row["Sname"]?></td>
        <td><?php echo $row["Sbalance"]?></td>
    </tr>
    </table>
        <?php
        }
    } else {
    echo "0 结果";
    }
    } 
    else 
    {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}
?>

</body>
</html>