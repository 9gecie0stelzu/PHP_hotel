<?php 
include_once 'conn.php';
$ndate =date("Y-m-d");
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if ($addnew=="1" ){
 if(isset($_POST['zhanghao'])){
  	$search = "select zhanghao from yonghuzhuce where zhanghao='$zhanghao'";
	$zhanghao=$_POST["zhanghao"];
	$mima=$_POST["mima"];
	//MD5���μ���
	$salt="skjddq237:&*^$df234GJSN";
	$mima=$mima+$salt;
	$mima=md5($mima);
  	$res=mysql_query($search);
  	if(mysql_num_rows($res)>0){
  		echo 
			"<script>
				$(function(){
					swal('ʧ��','�û����Ѵ���','error')});
			</script>";
  	}else {
    	$query="insert into yonghuzhuce(zhanghao,mima) values ('$zhanghao','$mima')";
  	if(mysql_query($query)){
  		echo 
			"<script>
				$(function(){
					swal('�ɹ�','ע��ɹ�','success').then(() => {
						location.href='index.php';
				})});
			</script>";
  	}else{
  		echo 'ʧ�ܣ������³���!',mysql_error();
  	}
  	die;
  	}
  }
}
?>
<html>
<head>
<title>�Ƶ������Ϣϵͳ</title>

</head>
    <!--ע��-->
    <div class="reg txt_none" id="reg_show">
        <div class="reg_box">
        	<span class="close"><img src="img/close.png"/></span>
        	<h2>�û�ע��</h2>
            <form name="form1" method="post" action="">
                <ul>
                    <li>
                        <span class="user"><img src="img/user.png"/></span>
                        <input type="text" name="zhanghao" id="zhanghao" value='' placeholder="�û���" autocomplete="off"/>
                        <input type='text' style='display:none'> <!-- ���firefox -->
                    </li>
                    <li>
                        <span class="password"><img src="img/password.png"/></span>
                        <input type="password" name="mima" class="pass" id="password" value='' placeholder="����" autocomplete="new-password" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);" />
                        <input type='text' style='display:none'> <!-- ���firefox -->
                    </li>
                    <li style="margin-bottom:10px;">
                        <span class="password"><img src="img/password.png"/></span>
                        <input type="password" name="remima" class="pass" id="repassword" value='' placeholder="ȷ������" autocomplete="new-password" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);" />
                        <input type='text' style='display:none'> <!-- ���firefox -->
                    </li>
                    <!--��ʾ��-->
					<p class="warning_tips1" id="warning_tips1"></p>
                    <p class="warning_tips2" id="warning_tips2"></p>
                </ul>
                <div class="bottom_box">
                    <input type="submit" name="Submit" value="ע��" onclick="return check();"/>
                    <input type="hidden" name="addnew" value="1" />
                </div>
                <div class="login_link" id="login_link">
                	<p>�����˺�?ȥ<span>��¼</span></p>
                </div>
            </form> 
        </div>
    </div>
    <!--ע��end-->
    <!--��¼-->
    <div class="reg txt_none" id="login_show">
        <div class="reg_box">
        	<span class="close"><img src="img/close.png"/></span>
        	<h2>�û���¼</h2>
            <form name="userlog" method="post" action="userlog_post.php" id="userlog">
                <ul class="login_box_ul">
                    <li>
                    	�˺ţ�<input name="username" type="text" id="username" placeholder="�������û���" autocomplete="off"/>
                        <input type='text' style='display:none'> <!-- ���firefox -->
                    </li>
                    <li>
                    	���룺<input name="pwd1" type="password" id="pwd1" placeholder="����������" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);"/>
                        <input type='text' style='display:none'> <!-- ���firefox -->
                    </li>
                </ul>
                <div class="bottom_box">
                    <input type="submit" name="Submit" value="��½" />
                    <input type="reset" name="Submit2" value="����" />
                </div>
                <div class="login_link" id="userreg_link">
                	<p>û���˺�?ȥ<span>ע��</span></p>
                </div>
            </form> 
        </div>
    </div>
    <!--��¼end-->
<script>
	//�û���У��
	var regExp = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{3,12}$/;//Ӣ��+����,����3-12λ
����$("#zhanghao").keyup(function(){
		var $value=$(this).val();
		if(!regExp.test($value)){
			$('#warning_tips1').html("������3-12λ������+Ӣ����ϵ��˺�");
			return false;
		}else{
			$('#warning_tips1').html("");
		}
����}); 
	//����У��
	var passreg=new RegExp("^[0-9]{6,12}$");//���볤��Ϊ6-12λ������
	$("#password").keyup(function(){
		var $value=$(this).val();
		if(!passreg.test($value)){
			$('#warning_tips2').html("������6-12λ�Ĵ���������");
			return false;
		}else{
			$('#warning_tips2').html("");
		}
����}); 
	//����У��
	function check(){
		if(document.getElementById("zhanghao").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�������˺ţ�",
			  icon: "error",
			  showConfirmButton: true
			})
			document.getElementById("zhanghao").focus();
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
		if(document.getElementById("repassword").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������ȷ�����룡",
			  icon: "error",
			  showConfirmButton: true
			})
			document.getElementById("repassword").focus();
			return false;
		}
		if(document.getElementById("repassword").value != document.getElementById("password").value){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�������벻һ�£�",
			  icon: "error",
			  showConfirmButton: true
			})
			return false;
			document.getElementById("password").value=="";
			document.getElementById("repassword").value=="";
			document.getElementById("password").focus();
		}
		if($('#warning_tips1').html() != "" || $('#warning_tips2').html() != ""){
			
			swal({
			  title: "ʧ�ܣ�",
			  text: "��������ȷ�ĸ�ʽ��",
			  icon: "error",
			  showConfirmButton: true
			})
			return false;
			document.getElementById("zhaohao").value=="";
			document.getElementById("password").value=="";
			document.getElementById("repassword").value=="";
			document.getElementById("zhaohao").focus();
			
		}
			
	}
</script>
</body>
</html>
