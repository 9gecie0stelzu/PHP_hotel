<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP����С�;Ƶ���Ϣ����ϵͳ��̨�������</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/swiper-3.4.2.min.css" />
<link rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>

<!--��̨������涥��-->
<div class="admin_header" id="header_theme">
	<div class="content_1300 clearfix">
    	<div class="title fl"><a href="index.php" target="_parent">����PHP����С�;Ƶ���Ϣ����ϵͳ</a></div>
        <div class="fr clearfix admin_fr">
        	<div class="admin_box fr">
                <span><img src="img/admin_exit.png" tilte="�˳�ͼ��"/></span>
                <span><a href="logout.php" target="_parent">��ȫ�˳�</a></span>
            </div>
        	<div class="admin_box fr">
                <span><img src="img/admin_theme.png" tilte="����ͼ��"/></span>
                <span id="change_theme">��������</span>
            </div>
            <div class="admin_box fr" style="width:25%;">
                <span><img src="img/admin_user.png" tilte="�û�ͼ��"/></span>
                <span>��ӭ<span class="m_l"><?php echo $_SESSION['username']?></span></span>
            </div>
        </div>
    </div>
</div>
<!--��̨������涥��end-->
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/swiper-3.4.2.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
