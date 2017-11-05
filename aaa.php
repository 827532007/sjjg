<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
$conn=mysql_connect("localhost","root","123456");
mysql_query("set name 'gb2312'");
mysql_select_db("mpr",$conn);
$result=mysql_query("select * from bysj",$conn);//查询表

?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form>
            <?php while ($row=mysql_fetch_assoc($result)){//多条记录循环输出，直到没有记录后退出循环?>
            <?php echo $row["timu"]//输出题目?><br/>
            <input type="radio" /><?php echo $row["a"]//输出选项?>
            <input type="radio" /><?php echo $row["b"]//输出选项?>
            <input type="radio" /><?php echo $row["c"]//输出选项?>
            <input type="radio" /><?php echo $row["d"]//输出选项?><br/>
            <?php }?>
        </form>
    </body>
</html>
