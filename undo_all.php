<?php
include_once 'conn.php';
//��ȡ���������
$table=$_POST['table'];
$ids=$_POST['ids'];
if(!$ids){
	$code=0;
	header('Content-Type:application/json');//��������,ǰ���Ǳ߾Ͳ���Ҫvar result = $.parseJSON(data);
	$json = array("code" => $code);
	echo json_encode($json);//����ǰ��״̬���ɹ�ɾ����
	return false;
}
$n=0;//�ɹ�ɾ����
$m=0;//ʧ��ɾ����
foreach($ids as $v)
{
    $sql = "update $table set `undo`='��' where id='{$v}' and `issh`='��'";
	mysql_query($sql);
	if(mysql_affected_rows() == 1){//ִ�гɹ���n��1
		$n=$n+1;
	}else{
		$m=$m+1;
	}
}
$code=1;
header('Content-Type:application/json');//��������,ǰ���Ǳ߾Ͳ���Ҫvar result = $.parseJSON(data);*/
$json = array("code" => $code,"n" => $n,"m" => $m);
echo json_encode($json);//����ǰ��״̬���ɹ�ɾ����
?>
