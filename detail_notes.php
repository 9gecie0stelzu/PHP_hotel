<?php 
session_start();
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ͷ�������ϸ��Ϣ</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="add_news_body">
<!--�ͷ�������ϸ��Ϣ-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">�ͷ���������</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
  <div class="add_news_box">
    <?php
	$sql="select * from jiudianyuding where id=".$id;
	$query=mysql_query($sql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
	{
	?>		
    <ul class="staff_detail_ul">
            <li class="clearfix">
              	<p class="fl">
                    <span class="tip">�ͷ����ƣ�</span>
                    <span class="msg"><?php echo mysql_result($query,0,name);?></span>
                </p>
                <p class="fl">
                	<span class="password">�ͷ��ȼ���</span>
                	<span class="msg"><?php echo mysql_result($query,$i,grade);?></span>
                </p>
            </li>
            <li class="clearfix">
            	<p class="fl">
                	<span class="password">�ͷ��۸�</span>
                	<span class="msg"><?php echo mysql_result($query,0,price);?></span>
                </p>
                <p class="fl">
                	<span class="password">Ԥ���ˣ�</span>
                	<span class="msg"><?php echo mysql_result($query,0,personal);?></span>
                </p>
            </li>
			<li class="clearfix">
            	<p class="fl">
                	<span class="password">�Ƿ��˷���</span>
                	<span class="msg"><?php echo mysql_result($query,0,leave);?></span>
                </p>
                <p class="fl">
                	<span class="password">Ԥ��ʱ�䣺</span>
                	<span class="msg"><?php echo date('Y/m/d',strtotime(mysql_result($query,0,addtime)));?></span>
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
<!--�ͷ�������ϸ��Ϣend-->
</body>
</html>

