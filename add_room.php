<?php
session_start();
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
	$name=$_POST["name"];
	$grade=$_POST["grade"];
	$price=$_POST["price"];
	$picture=$_POST["picture"];
	$remarks=$_POST["remarks"];
	$number=$_POST["number"];
	$sql="insert into jiudianxinxi(name,grade,price,state,picture,remarks,number) values('$name','$grade','$price','$state','$picture','$remarks','$number')";
	mysql_query($sql);
	echo 	
		"<script>
			$(function(){
				swal('�ɹ�','��ӿͷ���Ϣ','success').then(() => {
					location.href='check_room.php';
			})});
		</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����ͷ���Ϣ</title>
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
		if(document.getElementById("name").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������ͷ����ƣ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("name").focus();
			return false;
		}
		if(document.getElementById("price").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������ͷ��۸�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("price").focus();
			return false;
		}
		if(document.getElementById("number").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������ͷ�������",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("number").focus();
			return false;
		}
		if(document.getElementById("picture").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "��ѡ��ͷ�ͼƬ��",
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
<body class="add_news_body">
<!--��ӿͷ���Ϣ-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">��ӿͷ���Ϣ</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
    <div class="add_news_box">
    	<form id="form1" name="form1" method="post" action="">
            <ul>
            	<li>
                    <span class="user">�ͷ����ƣ�</span>
                    <input name='name' type='text' id='name' autocomplete="off" value='' placeholder="������ͷ�����"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>   
                <li>
                    <span class="user">�ͷ��۸�</span>
                    <input name='price' type='text' id='price' autocomplete="off" value='' placeholder="������ͷ��۸�"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li> 

               <li>
                    <span class="user">�ͷ�������</span>
                    <input name='number' type='text' id='number' autocomplete="off" value='' placeholder="������ͷ�����"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li> 
               <li>
                    <span class="password">�ͷ��Ǽ�����</span>
                    <select name='grade' id='grade'>
                          <option value="���Ǽ�">���Ǽ�</option>
                          <option value="���Ǽ�">���Ǽ�</option>
                          <option value="���Ǽ�">���Ǽ�</option>
                          <option value="���Ǽ�">���Ǽ�</option>
                    </select>
               </li>     
                <li style="position:relative;">
                    <span class="password">�ͷ�ͼƬ��</span>
                    <input name='picture' type='text' id='picture' value='' readonly autocomplete="off" placeholder="����ϴ�ͼƬ" style="cursor:pointer;"/>
                    <input id="uploadImg" name="upfile" type="file" class="imgBtn" style="cursor:pointer;"/>
                </li>
                <li style="height:80px;">
                    <span class="password news_ab">�ͷ���ע��</span>
                    <span class="none"></span>
                    <textarea name='remarks' id='remarks' placeholder="������ͷ���ע"></textarea>
                </li>
            </ul>
            <div class="bottom_box">
                <input type="submit" name="Submit" value="����"  onclick="return check();" >
                <input type="reset" name="Submit2" value="����"/>
                <input type="hidden" name="addnew" value="1" />
            </div>
        </form> 
    </div>
</div>
<!--��ӿͷ���Ϣend-->
</body>
</html>

