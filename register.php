<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            body {background-image:url(/Php1/51e69373b8b8a33a8701b0fa.jpg);}
            table.one
            {
                border-collapse: separate;
                border-spacing: 45px 10px
            }
            table.two
            {
                border-collapse: separate;
                border-spacing: 32px 10px
            }
            table.three
            {
                border-collapse: separate;
                border-spacing:18px 10px
            }
            table.four
            {
                border-collapse: separate;
                border-spacing: 10px 15px
            }
            p.thicker {font-weight: 900}
        </style>
    </head>
　　<body>
　　<a href="index.php"target="_blank">返回登录首页</a>
    <h1 style="color: green" align="center">注册页面</h1>
   <form action="register.php" method="POST">
            <table class="one" align="center" border="4">
    <tr>
         <td><p class="thicker">username</p></td>
         <td>
<input type="text" value="" id="username"  name="username"style="width: 200;height: 55;color:darkblue" />
        </td>
   </tr>
</table >
<br>
<table class="two" align="center" border="4">
   <tr>
        <td><p class="thicker">password</p></td>
        <td>
<input type="password" value="" id="password" name="password"style="width: 200;height: 55;color: darkblue"/>
        <td>
  </tr>
</table>
  <br>
<table class="three" align="center" border="4">
  <tr>
   <td><p class="thicker">confirmpassword</p></td><td><input type="password" value="" id="confirmpassword" name="confirmpassword"style="width: 200;height: 55;color: yellowgreen"/><td>
 </tr>
</table>
 <br>
   <table class="four" align="center" border="4" >
   <tr>
    <td><input type="submit" value="register"style="width: 140;height: 30;color: blue" /></td>
       </tr>
</table>
        </form>
</body>
</html>
Register.php
<?php
$connstr = "host=127.0.0.1 
        dbname=student user=postgres password=123456";
$conn = pg_connect($connstr);
if (!$conn) {
    echo "can't connect to database";
}

$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
if($password != $confirmpassword){
    echo "password not equal to confirm password";
    exit(1);
}

$sql = "insert into st_user(username,password) values($1,$2)";
$params = array();
$params[0] = $username;
$params[1] = $password;
$result = pg_query_params($conn, $sql, $params);
if ($result) {
    echo "注册成功请到登录页面进行登录，返回登录页面";
}

pg_free_result($result);
pg_close($conn);
?>
