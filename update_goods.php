<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
$sql="select * from jiudianyuding where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
?>
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if ($addnew=="1" )
{
	$name=$_POST["name"];
    $grade=$_POST["grade"];
    $price=$_POST["price"];
    $time=$_POST["time"];
	$state=$_POST["state"];
	$personal=$_POST["personal"];
	$number=$_POST["number"];
	$remarks=$_POST["remarks"];
	$sql="update jiudianyuding set name='$name',grade='$grade',price='$price',state='$state',personal='$personal',time='$time',number='$number',remarks='$remarks' where id= ".$id;
	mysql_query($sql);
	echo 
		"<script>
			$(function(){
				swal('�ɹ�','�޸Ķ�����Ϣ','success').then(() => {
					location.href='check_goods.php';
			})});
		</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���¿ͷ�������Ϣ</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="add_news_body">
<!--�ͷ�������Ϣ�޸�-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">�ͷ�������Ϣ�޸�</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
    <div class="add_news_box">
    <?php
$sql="select * from jiudianyuding where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>		
    	<form id="form1" name="form1" method="post" action="">
            <ul>
                <li>
                    <span class="user">�ͷ����ƣ�</span>
                    <input name='name' type='text' id='name' class="disable" autocomplete="off"  style="cursor:not-allowed" readonly value='<?php echo mysql_result($query,$i,name);?>'/>&nbsp;*	
                    <input type='text' style='display:none'> <!-- ���firefox -->	
                </li>
                <li>
                    <span class="password">�ͷ��Ǽ���</span>
                    <input name='grade' type='text' id='grade' class="disable" autocomplete="off"  style="cursor:not-allowed" readonly value='<?php echo mysql_result($query,$i,grade);?>' />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">�ͷ��۸�</span>
                    <input name='price' type='text' id='price' class="disable" autocomplete="off"  style="cursor:not-allowed" readonly value='<?php echo mysql_result($query,$i,price);?>'/>&nbsp;*
                </li>
                <li>
                    <span class="password">�ͷ�״̬��</span>
                    <select name="state" id="state" value="<?php echo mysql_result($query,$i,state);?>'/>">&nbsp;*
                          <option value="1">1</option>
                          <option value="0">0</option>
                    </select>
                </li>
                <li>
                    <span class="password">�ͻ�������</span>
                    <input name='personal' type='text' id='personal'autocomplete="off" value='<?php echo mysql_result($query,$i,personal);?>'/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">Ԥ��ʱ�䣺</span>
                    <input name='time' type='text' id='time' class="disable" autocomplete="off" readonly style="cursor:not-allowed" readonly value='<?php echo date("Y/m/d",strtotime(mysql_result($query,$i,time)));?>'/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                 <li>
                    <span class="password">Ԥ��������</span>
					<input name='number' type='text' id='number' autocomplete="off"  value='<?php echo mysql_result($query,$i,number);?>'/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
				<li>
                	<span class="password news_ab">��ע��Ϣ��</span>
                    <span class="none"></span>
                    <textarea name="remarks" id="remarks" value=""/><?php echo mysql_result($query,$i,remarks);?></textarea>
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
<!--�ͷ�������Ϣ�޸�end-->
<script>
function check()
{
	if(document.getElementById("personal").value==""){
		swal({
			  title: "ʧ�ܣ�",
			  text: "���������޸�Ϊ�գ�",
			  icon: "error",
			  showConfirmButton: true
         	})
		document.getElementById("personal").focus();
		return false;
	}
	if(document.getElementById("number").value==0){
		swal({
			  title: "ʧ�ܣ�",
			  text: "Ԥ����������С��1��",
			  icon: "error",
			  showConfirmButton: true
         	})
		document.getElementById("number").focus();
		return false;
	}
}
</script>
</body>
</html>