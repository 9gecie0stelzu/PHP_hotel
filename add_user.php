<?php
include_once 'conn.php';
date_default_timezone_set('PRC'); 
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
?>
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if ($addnew=="1" )
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	//MD5���μ���
	$salt="skjddq237:&*^$df234GJSN";
	$password=$password+$salt;
	$password=md5($password);
	$name=$_POST["name"];
	$sex=$_POST["sex"];
	$address=$_POST["address"];
	$email=$_POST["email"];
	$picture=$_POST["picture"];
	$issh='��';
	$search = "select zhanghao from yonghuzhuce where zhanghao='$username'";
  	$res=mysql_query($search);
  	if(mysql_num_rows($res)>0){
  		echo 
			"<script>
				$(function(){
					swal('ʧ��','�û��˺��Ѵ��ڣ�','error')});
			</script>";
  	}else {
    	$sql="insert into yonghuzhuce(zhanghao,mima,xingming,xingbie,diqu,Email,zhaopian,issh) values('$username','$password','$name','$sex','$address','$email','$picture','$issh')";
		mysql_query($sql);
		echo 
			"<script>
				$(function(){
					swal('�ɹ�','����û���Ϣ','success').then(() => {
						location.href='check_user.php';
				})});
			</script>";
  	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ע���û�</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="add_news_body">
<script language="javascript">
	function check(){
		if(document.getElementById("username").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�������û�����",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("username").focus();
			return false;
		}
		if(document.getElementById("password").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "���������룡",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("password").focus();
			return false;
		}
		if(document.getElementById("name").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������������",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("name").focus();
			return false;
		}
		if(document.getElementById("sex").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "��ѡ���Ա�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("sex").focus();
			return false;
		}
		if(document.getElementById("address").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�������ַ��",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("address").focus();
			return false;
		}
		if(document.getElementById("email").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "���������䣡",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("email").focus();
			return false;
		}
		if(document.getElementById("picture").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "��ѡ��ͷ��",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("picture").focus();
			return false;
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

<!--ע���û����-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">ע���û����</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
    <div class="add_news_box">
    	<form id="form1" name="form1" method="post" action="">
            <ul>
                <li>
                    <span class="user">�û��˺ţ�</span>
                    <input name='username' type='text' id='username' autocomplete="off" value='' placeholder="�������û��˺�"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              	</li>
                <li>
                    <span class="password">�û����룺</span>
                    <input name='password' type='password' id='password' value='' autocomplete="new-password" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);" placeholder="�������û�����"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              	</li>
                <li>
                    <span class="password">�û�������</span>
                    <input name='name' type='text' id='name' autocomplete="off" value='' placeholder="�������û�����"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              	</li>
                <li>
                    <span class="password">�û����䣺</span>
                    <input name='email' type='text' id='email' autocomplete="off" value='' placeholder="�������û�����"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              	</li>
                <li>
                    <span class="password">�û��Ա�</span>
                    <select name='sex' id='sex'>
                          <option value="��">��</option>
                          <option value="Ů">Ů</option>
                    </select>
                    <input type='text' style='display:none'> <!-- ���firefox -->
              	</li>
            	<li>
                    <span class="password">��ͥ��ַ��</span>
                    <input name='address' type='text' id='address' autocomplete="off" value='' placeholder="�������ͥ��ַ" />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
            	</li>
               	<li style="position:relative;height:35px;">
                    <span class="password">�û�ͷ��</span>
                    <input name='picture' type='text' id='picture' value='' readonly autocomplete="off" placeholder="����ϴ�ͼƬ" style="cursor:pointer;"/>
                    <input id="uploadImg" name="upfile" type="file" class="imgBtn" style="cursor:pointer;"/>
                </li>
            </ul>
            <div class="bottom_box">
               	<input type="submit" name="Submit" value="���" onClick="return check();" />
                <input type="reset" name="Submit2" value="����"/>
                <input type="hidden" name="addnew" value="1" />
            </div>
        </form> 
    </div>
</div>
<!--ע���û����end-->
</body>
</html>


