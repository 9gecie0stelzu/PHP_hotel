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
				swal('ʧ��','�����ȵ�¼��','error').then(() => {
					location.href='index.php';
			})});
		</script>";
	exit;
}
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
$id=$_GET["id"];
if ($addnew=="1" )
{
	$sql="select * from jiudianxinxi where id=".$id;
	$query=mysql_query($sql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
	{
		$i=0;
		if(mysql_result($query,$i,number) == 0){
			echo 
				"<script>
					$(function(){
						swal('ʧ��','�ͷ�����!������Ԥ��δ���ͷ�','error').then(() => {
							location.href='user_roomlist.php';
					})});
				</script>";
		}
		else{
			$name=$_POST["name"];
			$grade=$_POST["grade"];
			$price=$_POST["price"];
			$personal=$_POST["personal"];
			$time=$_POST["time"];
			$num=$_POST["num"];
			$remarks=$_POST["remarks"];
			$room_id=$_GET["id"];
			$sql="insert into jiudianyuding(name,grade,price,personal,time,number,remarks,room_id) values('$name','$grade','$price','$personal','$time','$num','$remarks','$room_id') ";
			mysql_query($sql);
			$number=mysql_result($query,$i,'number') > 0 ? (mysql_result($query,$i,'number')-1):0;
			if($number==0){
				$state=0;
				
			}
			$sql="update jiudianxinxi set number=$number where id=$id";
			mysql_query($sql);
			$sql="update jiudianxinxi set state=$state where id=$id";
			mysql_query($sql);

			echo 
				"<script>
					$(function(){
						swal('�ɹ�','Ԥ���ͷ�','success').then(() => {
							location.href='user_roomlist.php?id=$id';
					})});
				</script>";
		}
	}	
}
?>
<html>
<head>
<title>�ͷ�Ԥ��</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/swiper-3.4.2.min.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/zane-calendar.css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<script language="javascript">
	

	function check()
	{	
		if(document.getElementById('name').value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������ͷ����ƣ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById('name').focus();
			return false;
		}
		if(document.getElementById('grade').value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "�������Ǽ���",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById('grade').focus();
			return false;
		}
		if(document.getElementById('personal').value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������Ԥ���ˣ�",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById('personal').focus();
			return false;
		}
		if(document.getElementById('zane-calendar').value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "��ѡ��Ԥ��ʱ�䣡",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById('zane-calendar').focus();
			return false;
		}
		if(document.getElementById('num').value==""){
			swal({
			  title: "ʧ�ܣ�",
			  text: "������Ԥ��������",
			  icon: "error",
			  showConfirmButton: true
         	})
			document.getElementById('num').focus();
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
			document.getElementById("num").value=="";
			document.getElementById("num").focus();
			
		}
	}
</script>
<body>
<!--ͷ��-->
<div class="content"><?php include_once 'head_nav.php';?></div>
<!--ͷ��end-->
<!--Ԥ������-->
<div class="good_bg">
	<div class="good_con clearfix">
	<div class="content">
    <?php
		$sql="select * from jiudianxinxi where id=".$id;
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
		$i=0;
	?>
	<div class="img fl">
		<img src="<?php echo mysql_result($query,$i,picture);?>" alt="<?php echo mysql_result($query,$i,name);?>" title="<?php echo mysql_result($query,$i,name);?>"/>
	</div>
	<div class="con_box fl" style="width:358px;">
		<form name="form1" method="post" action="">
			<ul>
				<li>
					<span>�ͷ����ƣ�</span>
					<input type="text" name="name" id="name" autocomplete="off" style="cursor:not-allowed" readonly  value="<?php echo mysql_result($query,$i,name);?>" class="pname"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
				</li>
				<li>
					<span>�ͷ��Ǽ���</span>
					<input type="text" name="grade" id="grade" autocomplete="off" style="cursor:not-allowed" readonly  value="<?php echo mysql_result($query,$i,grade);?>" />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
				</li>
				<li>
					<span>�ͷ��۸�</span>
					<input type="text" name="price" id="price" autocomplete="off" style="cursor:not-allowed" readonly  value="<?php echo mysql_result($query,$i,price);?>" />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
				</li>

				<li>
					<span>Ԥ����Ա��</span>
					<input type="text" name="personal" id="personal" autocomplete="off" style="cursor:not-allowed" readonly  value="<?php echo $_SESSION['username'];?>" />&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
				</li>
				<li>
					<span>Ԥ��ʱ�䣺</span>
					<input type="text" name="time" id="zane-calendar"  redonly style="cursor:pointer;" autocomplete="off" value="" placeholder="��ѡ��Ԥ��ʱ��" class="check_time"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
				</li>
				<li>
					<span>Ԥ��������</span>
					<input type="text" name="num" id="num" autocomplete="off" value=""  placeholder="������Ԥ������"/>&nbsp;*
                    <input type='text' style='display:none'> <!-- ���firefox -->
				</li>
				<li class="clearifx">
                    <span class="password news_ab fl">��ע��Ϣ��</span>
                    <span class="none"></span>
					<textarea name="remarks" id="remarks" class="fl" placeholder="�����뱸ע��Ϣ"></textarea>
				</li>
			</ul>
            <div class="sub_submit">
            <div class="warning_tips1 m_b_5" id="warning_tips1"></div>
                <input type="submit" name="Submit" value="<?php if(mysql_result($query,$i,number) == 0){?>������<?php }else{ ?>Ԥ��<?php }?>" onClick="return check();" class="<?php if(mysql_result($query,$i,number) == 0){?>full_text<?php }?>"/>
                <input type="hidden" name="addnew" value="1" />
            </div>
		</form>	
	</div>
	<?php
    }
    ?>
    </div>
</div>
</div>
<!--Ԥ������end-->
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/laydate.dev.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/swiper-3.4.2.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
<script src="js/zane-calendar.js" type="text/javascript" charset="utf-8"></script>
<script>
function timestampToTime(timestamp) {
        var date = new Date(timestamp);//ʱ���Ϊ10λ��*1000��ʱ���Ϊ13λ�Ļ������1000
        Y = date.getFullYear() + '-';
        M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        D = date.getDate();
        return Y+M+D;
    }
function CurentTime()
    { 
        var now = new Date();
        var year = now.getFullYear();       //��
        var month = now.getMonth() + 1;     //��
        var day = now.getDate();            //�� 
        var clock = year + "-";
       
        if(month < 10)
            clock += "0";
        clock += month + "-";
       
        if(day < 10)
            clock += "0";
		 clock += day;
		 //-24*60*60*1000
        return(timestampToTime(Date.parse(clock))); 
    }
zaneDate({
		elem:'#zane-calendar',
		behindTop:5,
		width:258, 
		format: 'yyyy-MM-dd',
		min:CurentTime()
	})
	//Ԥ������У��
	var numExp = /^[0-9]*[1-9][0-9]*$/;
����$("#num").keyup(function(){
		var $value=$(this).val();
		if(!numExp.test($value)){
			$('#warning_tips1').html("���������0������");
			return false;
		}else{
			$('#warning_tips1').html("");
		}
����}); 
</script>
</body>
</html>
