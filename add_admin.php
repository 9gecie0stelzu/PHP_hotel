<?php
	date_default_timezone_set('PRC'); 
	$ndate=date("Y-m-d");
	include_once 'conn.php';
	$addnew=$_POST["addnew"];
	?>
    <script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
    <?php

		$username=$_POST['username'];
		//MD5���μ���
		$salt="skjddq237:&*^$df234GJSN";
		
		$pwd1=$_POST['pwd1'];
		$pwd1=$pwd1+$salt;
		$pwd1=md5($pwd1);
		
		$pwd2=$_POST['pwd2'];
		$pwd2=$pwd2+$salt;
		$pwd2=md5($pwd2);
		$cx=$_POST['cx'];
	if($username!="" && $pwd1!="" && $pwd2!="")
	{
		$sql="select * from allusers where username='$username' and pwd='$pwd1'";
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
		if($rowscount > 0)
			{					
				echo 
					"<script>
						$(function(){
							swal('ʧ��','�Ѵ��ڹ���Ա�˺�','error')
						});
					</script>";
			}
			else
			{
					$ndate =date("Y-m-d");
					$sql="insert into allusers(username,pwd,cx) values('$username','$pwd1','$cx')";
					mysql_query($sql); 
					echo 
						"<script>
							$(function(){
								swal('�ɹ�','��ӹ���Ա','success')
							});
						</script>";
			}
			$_SESSION['cx']=="��������Ա";
		}
		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����¹���Ա</title>
</head>
<script>
function check(){
	if(document.getElementById("username").value==""){
		swal({
			  title: "ʧ�ܣ�",
			  text: "�������˺ţ�",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById("username").focus();
		return false;
	}
	if(document.getElementById("pwd1").value==""){
		swal({
			  title: "ʧ�ܣ�",
			  text: "���������룡",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById("pwd1").focus();
		return false;
	}
	if(document.getElementById("pwd2").value==""){
		swal({
			  title: "ʧ�ܣ�",
			  text: "������ȷ�����룡",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById("pwd2").focus();
		return false;
	}
	if(document.getElementById("pwd2").value != document.getElementById("pwd1").value){
		swal({
			  title: "ʧ�ܣ�",
			  text: "�������벻һ�£�",
			  icon: "error",
			  showConfirmButton: true
         })
		document.getElementById("pwd1").value="";
		document.getElementById("pwd2").value="";
		document.getElementById("pwd1").focus();
		return false;
	}
}
</script>
<body>
<!--��ӹ���Ա-->
<div class="add_admin">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">����¹���Ա</h2>
        <p class="fr">��ǰ���ڣ� <?php echo $ndate; ?></p>
    </div>
	<form id="form1" name="form1" method="post" action="">
        <ul>
            <li>
                <span class="user">�˺ţ�</span>
                <input type="text" name="username" id="username" value=''  placeholder="�û���" class="admin_name" autocomplete="off"/>*
                <input type='text' style='display:none'> <!-- ���firefox -->
                <input type="hidden" name="addnew" value="1" />
            </li>
            <li>
                <span class="password">���룺</span>
                <input type="password" name="pwd1" class="pass admin_password1" id=" pwd1" value='' placeholder="����" autocomplete="new-password" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);"/>*
                <input type='text' style='display:none'> <!-- ���firefox -->
            </li>
            <li>
                <span class="password">ȷ�����룺</span>
                <input type="password" name="pwd2" class="pass admin_password2" id="pwd2" value='' placeholder="ȷ������" autocomplete="new-password" readonly onFocus="this.removeAttribute('readonly');" onBlur="this.setAttribute('readonly',true);"/>*
                <input type='text' style='display:none'> <!-- ���firefox -->
            </li>
            <li>
                <span class="password">ϵͳȨ��</span>
                <select name='cx' id='cx'>*
                      <option value="��ͨ����Ա">��ͨ����Ա</option>
                      <option value="��������Ա">��������Ա</option>
                </select>
            </li>
        </ul>
        <div class="bottom_box">
        	<input type="submit" name="Submit" value="���" onClick="return check();" >
            <input type="reset" name="Submit2" value="����"/>
        </div>
    </form> 
    <div class="clearfix admin_con_top">
        <div class="clearfix admin_con_top">
    	<h2 class="fl">���й���Ա�б�</h2>
        <?php 
			$sql="select * from allusers where 1=1";
			$query=mysql_query($sql);
			$rowscount=mysql_num_rows($query);
		?>
        <p class="fr">��<span><?php echo $rowscount;?></span>����¼</p>
    </div>
	</div>
    <div class="admin_list">
    	<table class="table table-striped">
            <tr>
                <th>���</th>
                <th>�˺�</th>
                <th>����</th>
                <th>ϵͳȨ��</th>
                <th>���ʱ��</th>
                <th>����</th>
            </tr>
            <?php
                  $sql="select * from allusers order by id desc";
                  $query=mysql_query($sql);
                  $rowscount=mysql_num_rows($query);
                 for($i=0;$i<$rowscount;$i++)
                 {
            ?>
            <tr>
                <td><?php echo $i+1;?></td>
                <td><?php echo mysql_result($query,$i,"username");?></td>
                <td><?php echo mysql_result($query,$i,"pwd");?></td>
                <td><?php echo mysql_result($query,$i,"cx");?></td>
                <td><?php echo date('Y-m-d',strtotime(mysql_result($query,$i,"addtime")));?></td>
                <td>
                    <a  href="del.php?id=<?php echo mysql_result($query,$i,"id");?>&tablename=allusers" 
                    onClick="return confirm('���Ҫɾ����')">
                        <i class="fa fa-trash b_r b_red material-icons"></i>
                        <span class="text_red">ɾ��<span>
                    </a>
                </td>
            </tr>
        <?php
		}
		 ?>
		</table>
    </div>
</div>
<!--��ӹ���Աend-->
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/CustomScrollbar.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/custom.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
