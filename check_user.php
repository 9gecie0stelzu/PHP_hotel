<?php 
include_once 'conn.php';
$user=$_GET['user'];
$name=$_GET['name'];
$agree=$_GET['agree'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�ע����Ϣ�б�</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="check_news_body">
<!--ע���û���Ϣ�б�-->
<div class="staff_list">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">����ע����Ϣ�б�</h2>
        <?php 
			$sql="select * from yonghuzhuce where 1=1";
			$query=mysql_query($sql);
			$rowscount=mysql_num_rows($query);
		?>
        <p class="fr">��<span><?php echo $rowscount;?></span>����¼</p>
    </div>
    <div class="clearfix m_b_10">
    	<p class="all_del" id="all_del" onclick="undoSelected()">����ͣ��</p>
        <form id="form1" name="form1" method="get" action="" class="fr">
            �˺ţ�<input name="user" type="text" id="user" class="m_r_10 p_l_6" autocomplete="off"  placeholder="�˺�" value="<?php echo $user;?>"/>
            <input type='text' style='display:none' /> <!-- ���firefox -->
            ������<input name="name" type="text" id="name" class="m_r_10 p_l_6" autocomplete="off" placeholder="����" value="<?php echo $name;?>"/>
            �Ƿ���ˣ�
            <select name='agree' id='agree' style="text-align:center;width:80px;height:30px;" class="m_r_10" placeholder="�Ƿ����" value="<?php echo $agree;?>">
                <option value="">����</option>
                <option value="��">��</option>
                <option value="��">��</option>
            </select>
            <input type="submit" name="Submit" value="����" class="check_btn"/>
        </form>
    </div>
  <?php 
    $sql="select * from yonghuzhuce where 1=1";
	if ($user!=""){
		$sql=$sql." and zhanghao like '%$user%'";
	}
	if ($name!=""){
		$sql=$sql." and xingming like '%$name%'";
	}
	if ($agree!=""){
		$sql=$sql." and issh like '$agree'";
	}
	$sql=$sql." order by id desc";
	$query=mysql_query($sql);
  	$rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {
	  ?>
        <div class="date_null">��Ǹ�����Ĳ�ѯ���Ϊ��</div>
      <?php 
	}
  else
  {
  $pagelarge=10;//ÿҳ������
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$sum=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$sum=$pagecurrent*$pagelarge;
		}
		else
		{
		$sum=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}
	?>
    <table class="table table-bordered table-hover">  
      <tr>
        <th><input type="checkbox" name="" id="checkall" value="" onclick="checkall();"/></th>
        <th>���</th>
        <th>����</th>
        <th>�˺�</th>
        <th class="user_img">ͷ��</th>
        <th>�Ա�</th>
        <th>��ͥ��ַ</th>
        <th>email</th>
        <th>�Ƿ����</th>
        <th>�Ƿ�ͣ��</th>
        <th>���ʱ��</th>
        <th>����</th>
      </tr>
	<?php
	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$sum;$i++)
	{
	  ?>
	  <tr>
		<td><input type="checkbox" name="" id="" data-id="<?php echo mysql_result($query,$i,id);?>" value="" class="sel_btn"/></td>
		<td><?php echo $i+1;?></td>
		<td><?php echo mysql_result($query,$i,xingming);?></td>
		<td><?php echo mysql_result($query,$i,zhanghao);?></td>
		<td><img class="user_tar" src="<?php echo mysql_result($query,$i,zhaopian);?>"></td>
		<td><?php echo mysql_result($query,$i,xingbie);?></td>
		<td><?php echo mysql_result($query,$i,diqu);?></td>
		<td><?php echo mysql_result($query,$i,Email);?></td>
		<td><?php echo mysql_result($query,$i,issh);?></td>
        <td><?php echo mysql_result($query,$i,undo);?></td>
		<td><?php echo date('Y/m/d',strtotime(mysql_result($query,$i,addtime)));?></td>
		<td>
        	<a href="sh.php?id=<?php echo mysql_result($query,$i,'id');?>&amp;yuan=<?php echo mysql_result($query,$i,issh);?>&tablename=yonghuzhuce" <?php if(mysql_result($query,$i,issh) == '��'){ ?>onclick="return confirm('ȷ����ˣ�')"<?php }?>>
				<i class="fa fa-check b_r b_gree material-icons m_b_5"></i>
				<span class="text_gree">���<span>
			</a>
			<a href="<?php if(mysql_result($query,$i,undo) == '��'){?>undo.php?id=<?php echo mysql_result($query,$i,'id');?>&tablename=yonghuzhuce<?php }else{?>indo.php?id=<?php echo mysql_result($query,$i,'id');?>&tablename=yonghuzhuce<?php }?>" <?php if(mysql_result($query,$i,undo) == '��'){ ?>onclick="return confirm('���Ҫͣ�ã�')"<?php }?>>
				<i class="fa b_r material-icons m_b_5 <?php if(mysql_result($query,$i,undo) == '��'){?>fa-ban b_red<?php }else{?>fa-star b_open<?php }?>"></i>
				<span class="<?php if(mysql_result($query,$i,undo) == '��'){?>text_red<?php }else{?>text_open<?php }?>"><?php if(mysql_result($query,$i,undo) == '��'){?>ͣ��<?php }else{?>����<?php }?><span>
			</a>
			<a href="update_user.php?id=<?php echo mysql_result($query,$i,id);?>">
				<i class="fa fa-pencil b_r b_blue material-icons"></i>
				<span class="text_blue">�޸�<span>
			</a>
		</td>
	  </tr>
		<?php
		}
	}
	?>
</table>
<?php 
  if($rowscount > 10)
  {
	  ?>
        <div class="clearfix news_list_page">
            <p class="fl">
              <input type="button" class="btn btn-info"" name="Submit2" onclick="javascript:window.print();" value="��ӡ��ҳ" />
            </p>
            <p class="fr news_list_page_p">
                <a href="check_user.php?pagecurrent=1&user=<?php echo $user;?>&name=<?php echo $name;?>&agree=<?php echo $agree;?>">��ҳ</a>
                <a href="check_user.php?pagecurrent=<?php echo $pagecurrent-1;?>&user=<?php echo $user;?>&name=<?php echo $name;?>&agree=<?php echo $agree;?>">��һҳ</a> 
                <a href="check_user.php?pagecurrent=<?php echo $pagecurrent+1;?>&user=<?php echo $user;?>&name=<?php echo $name;?>&agree=<?php echo $agree;?>">��һҳ</a>
                <a href="check_user.php?pagecurrent=<?php echo $pagecount;?>&user=<?php echo $user;?>&name=<?php echo $name;?>&agree=<?php echo $agree;?>">βҳ</a>
                <span>��<?php echo $pagecurrent;?>ҳ</span>
                <span>��<?php echo $pagecount;?>ҳ</span>
                <span>��<?php echo $rowscount;?>��</span>
            </p>
        </div>
        <?php }?>
</div>
<!--ע���û���Ϣ�б�end-->
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<script>
//ȫѡ����
function checkall() {
    var checkall = document.getElementById("checkall");
    var checkedall = checkall.checked;
    var sel_btn = document.getElementsByClassName("sel_btn");
    if(checkedall) {
        //ȫѡ
        for(var i = 0; i < sel_btn.length; i++) {
            //���ø�ѡ���ѡ��״̬
            sel_btn[i].checked = true;
        }
    } else {
        //ȡ��ȫѡ
        for(var i = 0; i < sel_btn.length; i++) {
            sel_btn[i].checked = false;
        }
    }
}
function undoSelected(){
    //��ȡѡ�����ݵ�id
    var select_boxes = $(".sel_btn");
    var ids = new Array();
    for(var i = 0; i < select_boxes.length; i++){
        if(select_boxes[i].checked){
            ids.push($(select_boxes[i]).attr('data-id'));
        } 
}
    //��ѡ�е�id���͵�php�����ļ���ʵ��ɾ��
    $.ajax({
        url: "undo_all.php",
        type: "post",
        data: {
            table: "yonghuzhuce",
            ids: ids
        },
        success: function(res){
            if(res.code == 0){//û��ѡ���κ�����
            	swal({
                  title: "���棡",
                  text: "��ѡ��ͣ�õ��û���",
                  icon: "warning",
                });
                return false;
           	}
            if(res.code == 1){//��̨����code״̬1��ʾִ�гɹ�
            	if(res.n ==0){
                  swal({
                      title: "ʧ�ܣ�",
                      text: "�û�������ͣ��",
                      icon: "error",
                      showConfirmButton: true
                    }).then ((isConfirm) => {//ִ�гɹ���Ļص�
                        history.go(0);
                    })
                }else{
                	swal({
                      title: "�ɹ���",
                      text: "�ɹ�ͣ��"+res.n+"���û�,"+"ʧ��ͣ��"+res.m+"���û�",
                      icon: "success",
                      showConfirmButton: true
                    }).then ((isConfirm) => {//ִ�гɹ���Ļص�
                        history.go(0);
                    })
                }
           }    
        }
    })
}
</script>
</body>
</html>

