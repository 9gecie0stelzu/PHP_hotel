<?php
//��֤��½��Ϣ
include_once 'conn.php';
	$id=$_GET["id"];
	$room_id=$_GET['room_id'];
	$yuan=$_GET["yuan"];
	$issh=$_GET["issh"];
	$tablename=$_GET["tablename"];
	?>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
    <?php
	if($yuan=="��")//ԭ״̬�Ѿ��˷��Ļ��Ͳ����˷���
	{
		$comewhere=$_SERVER['HTTP_REFERER'];
		echo 
			"<script>
				$(function(){
					swal('���棡','�ͷ���ǰ���˷�','warning').then(() => {
						location.href='$comewhere';
				})});
			</script>";
	}
	else
	{
		if($issh=="��"){//ԭ״̬δ�˷��������Ѿ���˺�ſ����˷�
			$sql="update $tablename set `leave`='��' where id=$id";
			mysql_query($sql);
			$sql="select * from jiudianxinxi where id=$room_id";
			$query=mysql_query($sql);
			$number=mysql_result($query,0,number)+1;
			if($number!=0){
				$state=1;	
			}else{
				$state=0;
			}	
			$sql="update jiudianxinxi set number='$number',state='$state' where id=$room_id";
			mysql_query($sql);
			$sql="update $tablename set dizhi=$state where id=$id";
			mysql_query($sql);
			$comewhere=$_SERVER['HTTP_REFERER'];
			echo 
				"<script>
					$(function(){
						swal('�ɹ���','�ɹ��˷�','success').then(() => {
							location.href='$comewhere';
					})});
				</script>";
		}else{//δ��˲������˷�
			$comewhere=$_SERVER['HTTP_REFERER'];
			echo 
				"<script>
					$(function(){
						swal('ʧ�ܣ�','�ͷ�δ��ˣ������˷���','error').then(() => {
							location.href='$comewhere';
					})});
				</script>";
		}
		
	}
?>
