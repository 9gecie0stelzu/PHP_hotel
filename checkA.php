<?php
//����Ҫ��֤����Ա��ݵĵط�����
session_start();
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if ($_SESSION['username']==""){
	echo 
		"<script>
			$(function(){
				swal('����','�Ƿ�����','warning').then(() => {
					location.href='login.php';
			})});
		</script>";
}
?>