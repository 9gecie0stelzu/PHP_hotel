<?php
session_start();
	
	if($_SESSION['cx']=="ע���û�")
	{
		echo "<script>javascript:location.href='admin_user.html';</script>";
	}
	else if($_SESSION['cx']=="��ͨ����Ա")
	{
		echo "<script>javascript:location.href='admin_normal.html';</script>";
	}
else  
	{
		echo "<script>javascript:location.href='admin_super.html';</script>";
	}
	
?>