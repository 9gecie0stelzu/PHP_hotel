<?php
session_start();
?>
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if($_SESSION["username"]=="")
{
	echo 
		"<script>
			$(function(){
				swal('ʧ��','�����ȵ�¼','error').then(() => {
					location.href='index.php';
			})});
		</script>";
	exit;
}
include_once 'conn.php';
$id=$_GET["id"];
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$zhanghao=$_POST["username1"];
	$zhaopian=$_POST["picture"];
	$xingming=$_POST["name"];
	$liuyan=$_POST["remarks"];
	$tel=$_POST["tel"];
	$address=$_POST["address"];
	$sql="insert into liuyanban(username,picture,name,remarks,address,tel) values('$username','$picture','$name','$remarks','$address','$tel') ";
	mysql_query($sql);
	echo 
		"<script>
			$(function(){
				swal('�ɹ�','Ԥ������','success').then(() => {
					location.href='user_foodlist.php';
			})});
		</script>";
}
?>
<script language="javascript">
	
	function check_food()
	{
		if(document.getElementById("tel").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�������ֻ��ţ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("tel").focus();
			return false;
		}
		if(document.getElementById("address").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "���������͵�ַ��",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("address").focus();
			return false;
		}
		if(document.getElementById("remarks").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�����붩����Ϣ��",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("remarks").focus();
			return false;
		}
		if($('#warning_tips1').html() != ""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "��������ȷ�ĸ�ʽ��",
			  icon: "error",
			  showConfirmButton: true
			})
			return false;
			document.getElementById("tel").value=="";
			document.getElementById("tel").focus();
		}
	}
</script>

<html>
<head>
<title>�Ƶ������Ϣϵͳ</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/swiper-3.4.2.min.css" />
<link rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
     <!--ͷ��-->
        <div class="content"><?php include_once 'head_nav.php';?></div>
    <!--ͷ��end-->
    <!--ͼƬ-->
    <div class="show_bg">
    	<img src="img/reservation_bg.jpg" title="����Ԥ��" alt="����Ԥ��"/>
    </div>
    <!--ͼƬend-->
    <!--�������-->
    <div class="sub_box">
        <div class="content">
            <h4>����Ԥ��</h4>
            <form name="form1" method="post" action="">
            	<a href="user_foodlist.php" class="check_list">�鿴�����б�</a>
                <div class="img clearfix">
                    <input name='picture' type='hidden' id='picture' value='<?php echo $_SESSION["zp"];?>' />
                    <span class="fl">ͷ��</span>
                    <p class="fl"><img src="<?php echo $_SESSION["zp"];?>"/></p>
                </div>
                <div class="user bg">
                    <span>�˺ţ�</span>
                    <input name='username1' readOnly="true" type='text' id='username1' value='<?php echo $_SESSION["username"];?>' />
                </div>
                <div class="user bg">
                    <span>������</span>
                    <input name='name' readOnly="true" type='text' id='name' value='<?php echo $_SESSION["xm"];?>' />
                </div>
                <div class="user_border">
                    <span>�ֻ���</span>
                    <input name='tel' type='text' id='tel' placeholder="�������ֻ���" autocomplete="off"/>*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </div>
                <div class="user">
                    <span class="address_state">���ţ�</span>
                    <span class="none"></span>
                    <textarea name='address' id='address' placeholder="�����뷿���"></textarea>*
                </div>
                <div class="user">
                    <span class="address_state">���ͣ�</span>
                    <span class="none"></span>
                    <textarea name='remarks' id='remarks' placeholder="�����붩����Ϣ"></textarea>*
                </div>
                <p id="warning_tips1" class="warning_tips1"></p>
                <div class="sub_submit">
                    <input type="hidden" name="addnew" value="1" />
                    <input type="submit" name="Submit" value="���" onClick="return check_food();"/>
                    <input type="reset" name="Submit2" value="����"/></td>
                </div>
            </form>
        </div>
    </div>
    <!--�������end-->
    <!--ע���¼-->
    <div>
    	<?php include_once 'userreg.php';?>
    </div>
    <!--ע���¼-->
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/swiper-3.4.2.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
<script>
	//�ֻ���У��
	var telExp = /^(1[358][0-9]{9})$/;
����$("#tel").keyup(function(){
		var $value=$(this).val();
		if(!telExp.test($value)){
			$('#warning_tips1').html("�ֻ���������");
			return false;
		}else{
			$('#warning_tips1').html("");
		}
����}); 
</script>
</body>
</html>
