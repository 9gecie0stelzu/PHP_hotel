<?php
//��֤��½��Ϣ
session_start();
include_once 'conn.php';
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
	$username=$_POST['username'];
	$pwd=$_POST['pwd1'];
	//MD5���ν���
	$salt="skjddq237:&*^$df234GJSN";
	$pwd=$pwd+$salt;
	$pwd=md5($pwd);
	if ($username!="" && $pwd!="")
	{
	$sql="select * from yonghuzhuce where zhanghao='$username' and mima='$pwd'";//and issh='��' and `undo`='��'
	$sql1="select * from yonghuzhuce where zhanghao='$username' and mima='$pwd' and issh='��'";//and `undo`='��'
	$sql2="select * from yonghuzhuce where zhanghao='$username' and mima='$pwd' and issh='��' and `undo`='��'";
	$query=mysql_query($sql);
	$query1=mysql_query($sql1);
	$query2=mysql_query($sql2);
	if(mysql_num_rows($query) > 0){
		if(mysql_num_rows($query1) > 0){
			if(mysql_num_rows($query2) > 0){
				$_SESSION['username']=$username;//�����û���
				$_SESSION['cx']="ע���û�";
				$_SESSION['xm']=mysql_result($query,$i,xingming);
				$_SESSION['zp']=mysql_result($query,$i,zhaopian);
				echo 
					"<script>
						$(function(){
							swal('�ɹ�','��¼ϵͳ','success').then(() => {
								location.href='index.php';
						})});
					</script>";
			}else{
				echo 
					"<script>
						$(function(){
							swal('ʧ��','�����˻���ͣ�ã�����ϵ����Ա��','error').then(() => {
								history.back();
						})});
					</script>";
			}
		}else{
			echo 
				"<script>
					$(function(){
						swal('ʧ��','�����˻�δ����ˣ�','error').then(() => {
							history.back();
					})});
				</script>";
		}
	}else{
		echo 
			"<script>
				$(function(){
					swal('ʧ��','�û���������������','error').then(() => {
						history.back();
				})});
			</script>";
	}
}
?>