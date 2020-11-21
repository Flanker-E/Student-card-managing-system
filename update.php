<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>真的一卡通网站——修改</title>
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
    <font size="+2"><strong>你要不要猜猜<BR>我是不是真的修改系统</strong></font>
    <BR>
    <hr>
<p><a href="http://localhost/ecard.php/">真的录入按钮</a>
   <a href="http://localhost/select.php">真的查询系统</a>
   <a href="http://localhost/updatebalance.php">真的充值系统</a></p>
    <hr>
    <BR>
    <BR>

<?php
$SgradeErr1 = $SnoErr = $nameErr1 = $BIRTHErr1 = $SexErr1 = $SdeptErr1 = $SbankcardErr1 = "";
$Sgrade1 = $Sno = $name = $BIRTH1 = $year1 = $month1 = $day1 = $Sex1 = $Sdept1 = $Sbankcard1 = $Sbalance1 = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if ($_POST["Sgrade1"]=="不修改")
        {
            $Sgrade1 = "" ;
        }
        else
        {
            $Sgrade1 = test_input($_POST["Sgrade1"]);
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
           $nameErr1 = "名字是必需的";
       }
       else
       {
           $name = test_input($_POST["name"]);
       }

        if ($_POST["year1"]=="不修改" && $_POST["month1"]=="不修改" && $_POST["day1"]=="不修改")
        {
            $year1 = "";
            $month1 = "";
            $day1 = "";
        }
        else
        {
            $year1 = test_input($_POST["year1"]);
            $month1 = test_input($_POST["month1"]);
            $day1 = test_input($_POST["day1"]);
        }
    
        if (empty($_POST["Sex1"]))
        {
            $Sex1 = "";
        }
        else
        {
            $Sex1 = test_input($_POST["Sex1"]);
        }
        
        if (empty($_POST["Sdept1"]))
        {
            $Sdept1 = "";
        }
        else
        {
            $Sdept1 = test_input($_POST["Sdept1"]);
        }
        
    
        if (empty($_POST["Sbankcard1"]))
        {
            $Sbankcard1 = "";
        }
        else
        {
            $Sbankcard1 = test_input($_POST["Sbankcard1"]);
            // 检测cardcode是否合法
            if (!preg_match("/^[0-9 ]*$/",$Sbankcard1))
            {
                $SbankcardErr1 = "只允许数字"; 
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
       <select name="Sgrade1">
       <option value="不修改" selected="selected"></option>
       <option value="2018">2018</option>
       <option value="2017">2017</option>
       <option value="2016">2016</option>
       </select>
       <br><br>
       学号: <input type="text" name="Sno" value="<?php echo $Sno;?>">
       <span class="error">* <?php echo $SnoErr;?></span>
       <br><br>
       名字: <input type="text" name="name" value="<?php echo $name;?>">
       <span class="error">* <?php echo $nameErr1;?></span>
       <br><br>
       生日:  
       <select name="year1">
       <option value="不修改" selected="selected"></option>
       <option value="1998">1998</option>
       <option value="1999">1999</option>
       <option value="2000">2000</option>
       </select>
       <select name="month1">
       <option value="不修改" selected="selected"></option>
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
       <select name="day1">
       <option value="不修改" selected="selected"></option>
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
       <span class="error"> <?php echo $BIRTHErr1;?></span>
       <br><br>
       性别:
       <input type="radio" name="Sex1" <?php if (isset($Sex1) && $Sex1=="女") echo "checked";?>  value="女">女
       <input type="radio" name="Sex1" <?php if (isset($Sex1) && $Sex1=="男") echo "checked";?>  value="男">男
       <span class="error">这都能改？ <?php echo $SexErr1;?></span>
       <br><br>
       专业: <input type="text" name="Sdept1" value="<?php echo $Sdept1;?>" maxlength="10">
       <span class="error"><?php echo $SdeptErr1;?></span>
       <br><br>
       卡号: <input type="text" name="Sbankcard1" value="<?php echo $Sbankcard1;?>"maxlength="15">
       <span class="error"> <?php echo $SbankcardErr1;?></span>
       <br><br>
       <p><span class="error">* 修改？？你想把自己改成假的吗？</span></p>
       <p><span class="error">* 通过此信息验证以修改。</span></p>
       <p><hr></p>
       <input type="submit" name="submit" value="提交"> <input type="reset"/ value="重置">
    </form>
    <p><hr></p>

<?php
if($Sgrade1 !="" or $Sex1 !="" or $year1 !="" or $month1 !="" or $day1 !="" or $Sdept1 !="" or $Sbankcard1 !="")
{
    if($Sgrade1 !="")
    {
        $sql = "UPDATE `ecard`SET `Sgrade` = '$Sgrade1'
        WHERE Sno = '$Sno'AND Sname = '$name'";
      
        if ($conn->query($sql) === TRUE) {
            echo "年级修改成功！<br>";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if($Sex1 !="")
    {
        $sql = "UPDATE `ecard`SET `Sex` = '$Sex1'
        WHERE Sno = '$Sno'AND Sname = '$name'";
      
        if ($conn->query($sql) === TRUE) {
            echo "性别修改成功 你到底经历了什么？？！<br>";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if($year1 !="")
    {
        $sql = "UPDATE `ecard`SET `Syear`= '$year1'
        WHERE Sno = '$Sno'AND Sname = '$name'";
      
        if ($conn->query($sql) === TRUE) {
            echo "出生年份修改成功！<br>";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if($month1 !="")
    {
        $sql = "UPDATE `ecard`SET  `Smonth`= '$month1'
        WHERE Sno = '$Sno'AND Sname = '$name'";
      
        if ($conn->query($sql) === TRUE) {
            echo "出生月份修改成功";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    }
    if($day1 !="")
    {
        $sql = "UPDATE `ecard`SET `Sday`= '$day1'
        WHERE Sno = '$Sno'AND Sname = '$name'";
      
        if ($conn->query($sql) === TRUE) {
            echo "出生日期修改成功！<br>";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if($Sdept1 !="")
    {
        $sql = "UPDATE `ecard`SET `Sdept`= '$Sdept1'
        WHERE Sno = '$Sno'AND Sname = '$name'";
      
        if ($conn->query($sql) === TRUE) {
            echo "转专业成功！<br>";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if($Sbankcard1 !="")
    {
        $sql = "UPDATE `ecard`SET `Sbankcard` = '$Sbankcard1'
        WHERE Sno = '$Sno'AND Sname = '$name'";
      
        if ($conn->query($sql) === TRUE) 
        {
            echo "银行卡号修改成功！<br>";
        } 
        else 
        {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    echo "以下是修改后信息表格";
    $sql = "SELECT `Sgrade`, `Sno`, `Sname`, `Syear`, `Smonth`, `Sday`, `Sex`, `Sdept`, `Sbalance`, `Sbankcard` FROM `ecard` WHERE Sno='$Sno'";
    $result = mysqli_query($conn, $sql);
     
    if (mysqli_num_rows($result) > 0) 
    {
    // 输出数据
            while($row = mysqli_fetch_assoc($result)) 
            {
            ?>
            <table border=1>
            <tr>
            <th rowspan=2>真的修改系统</th>
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
    } 
        else 
    {
        echo "0 结果";
    }
}
?>
    
</body>
</html>