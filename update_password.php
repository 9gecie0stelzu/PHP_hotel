<?php
session_start();
include_once 'conn.php';
$addnew=$_POST["addnew"];
date_default_timezone_set('PRC'); 
$ndate =date("Y-m-d");
?>
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if($addnew=="1")
{
//MD5���μ���
$salt="skjddq237:&*^$df234GJSN";

$old_password=$_POST['old_password'];
$old_password=$old_password+$salt;
$old_password=md5($old_password);

$new_password=$_POST['new_password'];
$new_password=$new_password+$salt;
$new_password=md5($new_password);

$re_password=$_POST['re_password'];

$sql="select * from allusers where username='".$_SESSION['username']."'";
	
	$query=mysql_query($sql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
		{
			if(mysql_result($query,0,"pwd") == $old_password)
				{
					$sql="update allusers set pwd='$new_password' where username='".$_SESSION['username']."'";
					$query=mysql_query($sql);
					echo 
					"<script>
						$(function(){
							swal('�ɹ�','�޸����룡','success').then(() => {
							history.back();
						})});
					</script>";
				}
			
			else
				{
					echo 
					"<script>
						$(function(){
							swal('ʧ��','ԭ���벻׼ȷ','error').then(() => {
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
							swal('ʧ��','ԭ���벻׼ȷ','error').then(() => {
								history.back();
						})});
					</script>";
		}
 }
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����Ա�޸�����</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<script>
function check()
{
	if(document.getElementById('old_password').value =="")
	{
		swal({
			  title: "ʧ�ܣ�",
			  text: "������ԭ���룡",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById('old_password').focus();
		return false;
	}
	if(document.getElementById('new_password').value =="")
	{
		swal({
			  title: "ʧ�ܣ�",
			  text: "�����������룡",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById('new_password').focus();
		return false;
	}
	if(document.getElementById('re_password').value =="")
	{
		swal({
			  title: "ʧ�ܣ�",
			  text: "������ȷ�����룡",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById('re_password').focus();
		return false;
	}
	if (document.getElementById('new_password').value != document.getElementById('re_password').value)
	{
		swal({
			  title: "ʧ�ܣ�",
			  text: "�������벻һ�£�",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById('new_password').value="";
		document.getElementById('re_password').value="";
		document.getElementById('new_password').focus();
		return false;
	}
}
</script>
<body>


<!--����Ա�����޸�-->
<div class="add_admin">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">�޸Ĺ���Ա����</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
	<form id="form1" name="form1" method="post" action="" autocomplete="off">
        <ul>
            <li>
                <span class="user">ԭ���룺</span>
                <input type="password" name="old_password" id="old_password" value=''  placeholder="ԭ����" class="admin_name" autocomplete="new-password" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);"/>*
                <input type="hidden" name="addnew" value="1" />
                <input type='text' style='display:none'> <!-- ���firefox -->
            </li>
            <li>
                <span class="password">�����룺</span>
                <input type="password" name="new_password" id="new_password" class="pass admin_password1" value='' placeholder="������" autocomplete="new-password" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);"/>*
                <input type='password' style='display:none'> <!-- ���firefox -->
            </li>
            <li>
                <span class="password">ȷ�����룺</span>
                <input type='password' autocomplete="new-password"  name="re_password" id="re_password" class="pass admin_password2" value='' placeholder="ȷ������" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);" />*
                <input type='password' style='display:none'> <!-- ���firefox -->
            </li>
        </ul>
        <div class="bottom_box">
        	<input type="submit" name="Submit" value="�޸�" onClick="return check();">
            <input type="reset" name="Submit2" value="����"/>
            <input type="hidden" name="addnew" value="1" />
        </div>
    </form> 
</div>
<!--����Ա�����޸�end-->
</body>
<script>

</script>
</html>

