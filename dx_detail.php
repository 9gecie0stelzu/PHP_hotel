<?php
session_start();
include_once 'conn.php';
$lb=$_GET["lb"];
?>
<html>
<head>
<title>�Ƶ������Ϣϵͳ</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/swiper-3.4.2.min.css" />
<link rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
	<!--ͷ��-->
    <div class="content"><?php include_once 'head_nav.php';?></div>
    <!--ͷ��end-->
    <!--ͼƬ-->
    <div class="about_bg">
        <img src="img/about_bg.jpg" alt="�Ƶ����ͼƬ" title="�Ƶ����ͼƬ"/>
    </div>
	<!--ͼƬend-->
    <!--�Ƶ����-->
    <div class="hotel_tro content">
		<h4>�Ƶ����</h4>
		<div class="text_con">
			<?php 
				$sql="select * from dx where leibie='�Ƶ����'";
				$query=mysql_query($sql);
				 $rowscount=mysql_num_rows($query);
				  if($rowscount==0)
				  {}
				  else
				  {
				?>
					 <p><?php echo mysql_result($query,0,"content");?>
					 <?php
				}
			?>
            </p>
		</div>
	</div>
    <!--�Ƶ����end-->
    <!--ע��-->
    <div>
    	<?php include_once 'userreg.php';?>
    </div>
    <!--ע��-->
    <script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/swiper-3.4.2.jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/index.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
