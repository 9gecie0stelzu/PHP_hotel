<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
?>
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
	$zhanghao=$_POST["user"];
	$mima=$_POST["password"];
	$pass=$_POST["replce"];
	if($mima !=  $pass){
		//MD5���μ���
		$salt="skjddq237:&*^$df234GJSN";
		$mima=$mima+$salt;
		$mima=md5($mima);
	}
	$xingming=$_POST["name"];
	$xingbie=$_POST["sel"];
	$diqu=$_POST["address"];
	$Email=$_POST["email"];
	$zhaopian=$_POST["picture"];
	$sql="update yonghuzhuce set zhanghao='$zhanghao',mima='$mima',xingming='$xingming',xingbie='$xingbie',diqu='$diqu',Email='$Email',zhaopian='$zhaopian' where id= ".$id;
	mysql_query($sql);
	echo 
		"<script>
			$(function(){
				swal('�ɹ�','�޸��û���Ϣ','success').then(() => {
					location.href='check_user.php';
			})});
		</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸��û�ע����Ϣ</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
<script language="javascript" src="js/Calendar.js"></script>
</head>
<script language="javascript">
	function check(){
		if(document.getElementById("user").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�˺Ų����޸�Ϊ�գ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("user").focus();
			return false;
		}
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
		if(document.getElementById("name").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "���������޸�Ϊ�գ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("name").focus();
			return false;
		}
		if(document.getElementById("sel").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "��ѡ���Ա�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("sel").focus();
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
<body class="add_news_body">
<!--�û�ע����Ϣ�޸�-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">�û�ע����Ϣ�޸�</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
    <div class="add_news_box">
    <?php
$sql="select * from yonghuzhuce where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>		
    	<form id="form1" name="form1" method="post" action="">
            <ul>
                <li>
                    <span class="user">�˺ţ�</span>
                    <input name='user' type='text' id='user' autocomplete="off" style="cursor:not-allowed" readonly  value='<?php echo mysql_result($query,$i,zhanghao);?>'/>&nbsp;*		
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">���룺</span>
                    <input name='password' type='password' id='password' autocomplete="off" value='<?php echo mysql_result($query,$i,mima);?>' />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                    <input type="text" style="display:none" id="replce" name="replce" value="">
                </li>
                <li>
                    <span class="password">������</span>
                    <input name='name' type='text' id='name' autocomplete="off" value='<?php echo mysql_result($query,$i,xingming);?>'/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">�Ա�</span>
                    <select name="sel" id="sel">&nbsp;*
                          <option value="��">��</option>
                          <option value="Ů">Ů</option>
                    </select>
                </li>
                <li>
                    <span class="password">������</span>
                    <input name='address' type='text' id='address' autocomplete="off" value='<?php echo mysql_result($query,$i,diqu);?>'/>
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">Email��</span>
                    <input name='email' type='text' id='email' autocomplete="off" value='<?php echo mysql_result($query,$i,Email);?>'/>
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                 <li style="position:relative;height:35px;">
                    <span class="password">�û�ͷ��</span>
                    <input name='picture' type='text' id='picture' value="<?php echo mysql_result($query,$i,zhaopian);?>" readonly autocomplete="off" style="cursor:pointer;"/>
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
<!--�û�ע����Ϣ�޸�end-->
<script language="javascript">
	document.getElementById("sel").value='<?php echo mysql_result($query,$i,xingbie);?>';
</script>
</body>
</html>


