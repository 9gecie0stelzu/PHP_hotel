<?php
//��֤��½��Ϣ
session_start();
include_once 'conn.php';
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
	$login=$_POST["login"];
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	//MD5���μ���
	$salt="skjddq237:&*^$df234GJSN";
	$pwd=$pwd+$salt;
	$pwd=md5($pwd);
	if($login=="1")
	{
		if ($username!="" && $pwd!="")
		{
		$sql="select * from allusers where username='$username' and pwd='$pwd'";
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
			if($rowscount>0)
			{
					$_SESSION['username']=$username;
					$_SESSION['cx']=mysql_result($query,0,"cx");
					echo 
						"<script>
							$(function(){
								swal('��̨��¼','��¼�ɹ�','success').then(() => {
									location.href='main.php';
							})});
						</script>";
			}
			else
			{
					echo 
						"<script>
							$(function(){
								swal('ʧ��','�û������������','error').then(() => {
									history.back();
							})});
						</script>";
			}
		}
		else
		{
				echo 
				"<script>
					$(function(){
						swal('ʧ��','������������Ϣ','error').then(() => {
							history.back();
					})});
				</script>";
		}
	}
?>