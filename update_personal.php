<?php 
session_start();
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<script>
$(function(){
	$("#replce").val($("#password").val());
})
</script>
<?php
if ($addnew=="1" )
{
	$pass=$_POST["replce"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	if($password !=  $pass){
		//MD5���μ���
		$salt="skjddq237:&*^$df234GJSN";
		$password=$password+$salt;
		$password=md5($password);
	}
	$repassword=$_POST['repassword'];
	if($repassword != $pass){
		//MD5���μ���
		$salt="skjddq237:&*^$df234GJSN";
		$repassword=$repassword+$salt;
		$repassword=md5($repassword);
	}
	
	$name=$_POST["name"];
	$sex=$_POST["sex"];
	$diqu=$_POST["address"];
	$email=$_POST["email"];
	$picture=$_POST["picture"];
	$sql="update yonghuzhuce set zhanghao='$username',mima='$password',xingming='$name',xingbie='$sex',diqu='$address',Email='$email',zhaopian='$picture' where zhanghao='".$_SESSION['username']."'";
	mysql_query($sql);
	echo 
		"<script>
			$(function(){
				swal('�ɹ�','�޸ĸ�����Ϣ','success').then(() => {
					location.href='update_personal.php';
			})});
		</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸��û�������Ϣ</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<script language="javascript">
function check()
	{
		if(document.getElementById("password").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "���벻���޸�Ϊ�գ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("password").focus();
			return false;
		}
		if(document.getElementById('password').value != document.getElementById('repassword').value){
		swal({
			 title: "ʧ�ܣ�",
			 text: "�������벻һ�£�",
			 icon: "error",
			 showConfirmButton: true
				  })
			return false;
			document.getElementById("password").value="";
			document.getElementById("repassword").value="";
			document.getElementById("password").focus();
			}
	}
 function uploadImg(){
		var url = "upfile.php";
		var data = new FormData($("#form1")[0])
		$.ajax({
			url: url,
			type: "POST",
			data:data,
			contentType:false,
			processData:false,
			success: function(res){
				document.getElementById("picture").value=res;
			}
				
		})
	}
	$(function(){
		$("#uploadImg").change(function(){
			uploadImg();
		})
	})
</script>
<body class="add_news_body">
<!--�޸ĸ�����Ϣ-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">�޸��û�������Ϣ</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
    <div class="add_news_box p_top">
    <?php
	$sql="select * from yonghuzhuce where zhanghao='".$_SESSION['username']."'";
	$query=mysql_query($sql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
	{
	?>		
    	<form id="form1" name="form1" method="post" action="">
            <ul>
                <li>
                    <span class="user">�û��˺ţ�</span>
                    <input name='username' type='text' id='username' autocomplete="off" style="cursor:not-allowed" readonly value='<?php echo mysql_result($query,$i,zhanghao);?>'/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->		
                </li>
                <li>
                    <span class="password">�û����룺</span>
                    <input name='password' type='password' id='password' autocomplete="off" style="padding-right:10px;" value='<?php echo mysql_result($query,$i,mima);?>' />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                    <input type="text" style="display:none" id="replce" name="replce" value="">
                </li>
                 <li>
                    <span class="password">ȷ�����룺</span>
                    <input name='repassword' type='password' id='repassword' autocomplete="off" style="padding-right:10px;" value='<?php echo mysql_result($query,$i,mima);?>' />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                    <input type="text" style="display:none" id="replce" name="replce" value="">
                </li>
                <li>
                    <span class="password">�û�������</span>
                    <input name='name' type='text' id='name' autocomplete="off" value='<?php echo mysql_result($query,$i,xingming);?>'/>
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">�û��Ա�</span>
                    <select name="sex" type='text' id="sex" value=""/>
                          <option value="��">��</option>
                          <option value="Ů">Ů</option>
                	</select>
                </li>
                <li>
                    <span class="password">��ͥ��ַ��</span>
                    <input name='address' type='text' id='address' autocomplete="off" value='<?php echo mysql_result($query,$i,diqu);?>'/>
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">�û�Email��</span>
                    <input name='email' type='text' id='email' autocomplete="off" value='<?php echo mysql_result($query,$i,Email);?>'/>
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li style="position:relative;height:30px;">
                    <span class="password">����ͷ��</span>
                    <input name='picture' type='text' id='picture' readonly autocomplete="off"  style="cursor:pointer;" value="<?php echo mysql_result($query,$i,zhaopian);?>"/>
                    <input id="uploadImg" name="upfile" type="file" class="imgBtn" style="cursor:pointer;"/>
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
<!--�޸ĸ�����Ϣend-->
</body>
</html>

