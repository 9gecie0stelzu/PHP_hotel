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
	$number=$_POST["number"];
	$name=$_POST["name"];
	$address=$_POST["address"];
	$card=$_POST["card"];
	$time=$_POST["time"];
	$price=$_POST["price"];
	$age=$_POST["age"];
	$job=$_POST["job"];
	$remarks=$_POST["remarks"];
	$sql="insert into yuangongxinxi(number,name,address,card,time,price,age,job,remarks) values('$number','$name','$address','$card','$time','$price','$age','$job','$remarks') ";
	mysql_query($sql);
	echo 
		"<script>
			$(function(){
				swal('�ɹ�','���Ա����Ϣ','success').then(() => {
					location.href='check_staff.php';
			})});
		</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ϵͳ��̨Ա����Ϣ���</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/zane-calendar.css" />
</head>
<body class="add_news_body">
<script language="javascript">
	function check(){
		if(document.getElementById("number").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������Ա�����ţ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("number").focus();
			return false;
		}
		if(document.getElementById("name").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������Ա��������",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("name").focus();
			return false;
		}
		if(document.getElementById("address").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�������ͥסַ��",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("address").focus();
			return false;
		}
		if(document.getElementById("card").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "���������֤���룡",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("card").focus();
			return false;
		}
		if(document.getElementById("zane-calendar").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "��ѡ����ְʱ�䣡",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("zane-calendar").focus();
			return false;
		}
		if(document.getElementById("price").value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������Ա��н�ʣ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById("price").focus();
			return false;
		}
	}
</script>

<!--Ա����Ϣ���-->
<div class="add_news">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">Ա����Ϣ���</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
    <div class="add_news_box">
    	<form id="form1" name="form1" method="post" action="">
            <ul>
                <li>
                    <span class="user">Ա�����ţ�</span>
                    <input name='number' type='text' id='number' autocomplete="off" value='' placeholder="������Ա������"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              </li>
                <li>
                    <span class="password">Ա��������</span>
                    <input name='name' type='text' id='name' value='' autocomplete="off" placeholder="������Ա������"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              </li>
                <li>
                    <span class="password">Ա����ַ��</span>
                    <input name='address' type='text' id='address' autocomplete="off" value='' placeholder="������Ա����ַ"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              </li>
                <li>
                    <span class="password">���֤�ţ�</span>
                    <input name='card' type='text' id='card' autocomplete="off" value='' placeholder="���������֤��"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              </li>
                <li style="position:relative;">
                    <span class="password">��ְʱ�䣺</span>
                    <input name='time' type='text' id="zane-calendar" readonly style="cursor:pointer;" autocomplete="off" value='' placeholder="��ѡ����ְʱ��"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
              </li>
                <li>
                    <span class="password">Ա��н�ʣ�</span>
                    <input name='price' type='text' id='price' autocomplete="off" value='' placeholder="������Ա��н��"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
                </li>
                <li>
                    <span class="password">Ա�����䣺</span>
                    <select name='age' id='age'>
                          <option value="��">��</option>
                          <option value="����">����</option>
                          <option value="һ��">һ��</option>
                          <option value="����">����</option>
                          <option value="����">����</option>
                    </select>
                </li>
                <li>
                    <span class="password">Ա����λ��</span>
                    <select name='job' id='job'>
                          <option value="����">����</option>
                          <option value="��ʦ">��ʦ</option>
                          <option value="���ӹ�">���ӹ�</option>
                          <option value="����Ա">����Ա</option>
                    </select>
                </li>
                <li style="height:45px;">
                    <span class="password news_ab">������ע��</span>
                    <span class="none"></span>
                    <textarea name="remarks" Iid="remarks" placeholder="�����뱸ע"></textarea>
                </li>
            </ul><input type='text' style='display:none'> <!-- ���firefox -->
            <div class="bottom_box">
               	<input type="submit" name="Submit" value="���" onClick="return check();" />
                <input type="reset" name="Submit2" value="����"/>
                <input type="hidden" name="addnew" value="1" />
            </div>
        </form> 
    </div>
</div>
<!--Ա����Ϣ���end-->
<script src="js/zane-calendar.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript">
	zaneDate({
		elem:'#zane-calendar',
		behindTop:5,
		width:258, 
		format: 'yyyy-MM-dd'
	})
</script>
</body>
</html>
