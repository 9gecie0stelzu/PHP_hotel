<?php
//��֤��½��Ϣ
include_once 'conn.php';
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
$id=$_GET["id"];
$tablename=$_GET['tablename'];
$sql="select undo='��' from $tablename where id=".$id;
mysql_query($sql);
if(mysql_affected_rows() == 1){
	echo 
		"<script language='javascript'>
			$(function(){
					swal('����','�û�����������','warning').then(() => {
						location.href='".$_SERVER["HTTP_REFERER"]."';
				})});
		</script>";
}else{
	$sql="update $tablename set `undo`='��' where id= ".$id;
	mysql_query($sql);
	$comewhere=$_SERVER['HTTP_REFERER'];
	echo "<script language='javascript'>
		$(function(){
				swal('�ɹ�','�����û�','success').then(() => {
					location.href='".$_SERVER["HTTP_REFERER"]."';
			})});
		</script>";
}
?>