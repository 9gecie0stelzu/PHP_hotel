<?php 
session_start();
?>
<div class="header content" id="_01">
	<div class="head_top clearfix">
		<p class="fl"><a href="index.php">�Ƶ���Ϣ����ϵͳ</a></p>
		<ul class="nav_ul clearfix fl">
			<li><a href="index.php">��վ��ҳ</a></li>
			<li><a href="user_news.php?lb=�Ƶ��Ż�">�Ƶ��Ż�</a></li>
			<li><a href="dx_detail.php?lb=�Ƶ����">�Ƶ����</a></li>
			<li><a href="user_foodlist.php">����Ԥ��</a></li>
			<li><a href="user_roomlist.php">�ͷ���Ϣ</a></li>
            <li class="<?php if($_SESSION['cx']!="" ){?>txt_none_i<?php }?>" id="reg_login">ע��/��¼</li>
			<li><a href="login.html">��̨����</a></li>
		</ul>
        <?php 
			if ($_SESSION['cx']!="" )
				{
		?>
        <div class="user_msg fl">
			<p>��ӭ����<?php echo $_SESSION['username']?></p>
            <p>
                <span onclick="javascript:location.href='logout.php';">�˳�</span>
                <span onclick="javascript:location.href='main.php';">���˺�̨</span>
            </p>
		</div>
        <?php 
			}
			else
			{
		 ?>
         <div class="user_msg fl">
			<p></p>
            <p></p>
		</div>
         <?php } ?>
	</div>
</div>