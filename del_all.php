<?php
include_once 'conn.php';
//��ȡ���������
$table=$_POST['table'];
$ids=$_POST['ids'];
if(!$ids){
	$code=0;
	header('Content-Type:application/json');//��������,ǰ���Ǳ߾Ͳ���Ҫvar result = $.parseJSON(data);
	$json = array("code" => $code);
	echo json_encode($json);//���ظ�ǰ�ˣ�
	return false;
}
$n=0;//�ɹ�ɾ����
foreach($ids as $v)
{
    $sql = "delete from $table where id='{$v}'";
    mysql_query($sql);
	if(mysql_affected_rows() == 1){
		$n=$n+1;
	}
}
$code=1;
header('Content-Type:application/json');//��������,ǰ���Ǳ߾Ͳ���Ҫvar result = $.parseJSON(data);*/
$json = array("code" => $code,"n" => $n);
echo json_encode($json);//���ظ�ǰ�ˣ��ɹ�ɾ����
?>