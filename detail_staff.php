<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Ա����ϸ��Ϣ</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="add_news_body">
<!--Ա����ϸ��Ϣ-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">Ա����ϸ��Ϣ</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
  <div class="add_news_box">
    <?php
	$sql="select * from yuangongxinxi where id=".$id;
	$query=mysql_query($sql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
	{
	?>		
    <ul class="staff_detail_ul">
            <li class="clearfix">
              	<p class="fl">
                    <span class="tip">Ա�����ţ�</span>
                    <span class="msg"><?php echo mysql_result($query,0,number);?></span>
                </p>
                <p class="fl">
                	<span class="password">Ա��������</span>
                	<span class="msg"><?php echo mysql_result($query,$i,name);?></span>
                </p>
            </li>
            <li class="clearfix">
            	<p class="fl">
                	<span class="password">��ͥ��ַ��</span>
                	<span class="msg"><?php echo mysql_result($query,0,address);?></span>
                </p>
                <p class="fl">
                	<span class="password">���֤�ţ�</span>
                	<span class="msg"><?php echo mysql_result($query,0,card);?></span>
                </p>
            </li>
			<li class="clearfix">
            	<p class="fl">
                	<span class="password">��ְʱ�䣺</span>
                	<span class="msg"><?php echo mysql_result($query,0,time);?></span>
                </p>
                <p class="fl">
                	<span class="password">Ա��н�ʣ�</span>
                	<span class="msg"><?php echo mysql_result($query,0,price);?></span>
                </p>
            </li>
            <li class="clearfix">
            	<p class="fl">
                	<span class="password">Ա�����䣺</span>
                	<span class="msg"><?php echo mysql_result($query,0,age);?></span>
                </p>
                <p class="fl">
                	<span class="password">��ְ��λ��</span>
                	<span class="msg"><?php echo mysql_result($query,0,job);?></span>
                </p>
            </li>
            <li style="height:30px;">
                <span class="password">��ע��Ϣ��</span>
                <span class="msg"><?php echo mysql_result($query,0,remarks);?></span>
            </li>
      </ul>
      <?php
			}
		?>
    </div>
</div>
<!--Ա����ϸ��Ϣend-->
</body>
</html>

