<?php
//��֤��½��Ϣ
include_once 'conn.php';
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
	$id=$_GET["id"];
	$yuan=$_GET["yuan"];
	$tablename=$_GET["tablename"];
	if($yuan=="��")
	{
		$comewhere=$_SERVER['HTTP_REFERER'];
		echo 
			"<script>
				   $(function(){
					swal('ʧ��','�ͷ�֮ǰ�Ѿ��˷���','error').then(() => {
					 location.href='$comewhere';
				   })});
			  </script>";
	}
	else
	{
		$sql="update $tablename set `leave`='��' where id=$id";
		mysql_query($sql);
		$comewhere=$_SERVER['HTTP_REFERER'];
		echo 
			"<script>
				   $(function(){
					swal('�ɹ�','�˷��ɹ���','success').then(() => {
					 location.href='$comewhere';
				   })});
			  </script>";
	}
?>
