<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
$sql="select * from liuyanban where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
?>
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if ($addnew=="1" )
{
	$username=$_POST["username"];
    $name=$_POST["name"];
    $picture=$_POST["picture"];
	$remarks=$_POST["remarks"];
	$sql="update liuyanban set username='$username',picture='$picture',name='$name',remarks='$remarks' where id= ".$id;
	mysql_query($sql);
	echo 
		"<script>
			$(function(){
				swal('�ɹ�','�޸Ķ�����Ϣ','success').then(() => {
					location.href='check_meals.php';
			})});
		</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸Ķ�����Ϣ</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<script>
function check(){
	if(document.getElementById('remarks').value==""){
		swal({
			  title: "ʧ�ܣ�",
			  text: "Ԥ����Ϣ����Ϊ�գ�",
			  icon: "error",
			  showConfirmButton: true
         	})
		document.getElementById("remarks").focus();
		return false;
	}
}
</script>

<body class="add_news_body">
<!--�ͻ������޸�-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">�޸Ŀͻ�������Ϣ</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
    <div class="add_news_box">
    <?php
	$sql="select * from liuyanban where id=".$id;
	$query=mysql_query($sql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
	{
	?>		
    	<form id="form1" name="form1" method="post" action="">
            <ul>
                <li>
                    <span class="user">�˺ţ�</span>
                    <input name='username' type='text' id='username' style="cursor:not-allowed" readonly value='<?php echo mysql_result($query,$i,username);?>'/>&nbsp;*		
                </li>
                <li>
                    <span class="password">������</span>
                    <input name='name' type='text' id='name' style="cursor:not-allowed" readonly value='<?php echo mysql_result($query,$i,name);?>'/>&nbsp;*
                </li>
                <li>
                    <span class="password">��Ƭ��</span>
                    <input name='picture' type='text' id='picture' style="cursor:not-allowed" readonly value='<?php echo mysql_result($query,$i,picture);?>' />&nbsp;*
                </li>
                <li>
                    <span class="password news_ab">������Ϣ��</span>
                    <span class="none"></span>
                    <textarea name="remarks" id="remarks" style="text-align:left;"><?php echo mysql_result($query,$i,remarks);?></textarea>&nbsp;*
                </li>			
            </ul>
            <div class="bottom_box">
                <input type="submit" name="Submit" value="�޸�"  onclick="return check();" >
                <input type="reset" name="Submit2" value="����"/>
                <input type="hidden" name="addnew" value="1" />
            </div>
        </form> 
        <?php
			}
		?>
    </div>
</div>
<!--�ͻ�������Ϣ�޸�end-->

</body>
</html>

