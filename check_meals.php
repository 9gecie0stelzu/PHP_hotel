<?php 
include_once 'conn.php';
$user=$_GET['user'];
$name=$_GET['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������Ϣ�б�</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="check_news_body">
<!--������Ϣ�б�-->
<div class="staff_list">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">���ж�����Ϣ�б�</h2>
        <?php 
			$sql="select * from liuyanban where 1=1";
			$query=mysql_query($sql);
			$rowscount=mysql_num_rows($query);
		?>
        <p class="fr">��<span><?php echo $rowscount;?></span>����¼</p>
    </div>
    <div class="clearfix m_b_10">
    	<p class=" all_del" id="all_del" onclick="deleteSelected()">����ɾ��</p>
        <form id="form1" name="form1" method="get" action="" class="fr">
            �˺ţ�<input name="user" type="text" id="user" class="m_r_10 p_l_6" autocomplete="off"  placeholder="�˺�" value="<?php echo $user;?>" />
            <input type='text' style='display:none'> <!-- ���firefox -->
            ������<input name="name" type="text" id="name" class="m_r_10 p_l_6" autocomplete="off"  placeholder="����" value="<?php echo $name;?>"/>
            <input type="submit" name="Submit" value="����" class="check_btn"/>
        </form>
    </div>
    
  <?php 
    $sql="select * from liuyanban where 1=1";
	if ($user!=""){
		$sql=$sql." and username like '%$user%'";
	}
	if ($name!=""){
		$sql=$sql." and name like '%$name%'";
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
  $pagelarge=5;//ÿҳ������
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
        <th>ͷ��</th>
        <th>�˺�</th>
        <th>����</th>
        <th>������Ϣ</th>
        <th>���ͷ���</th>
        <th>����Ա�ظ�</th>
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
        <td><img src="<?php echo mysql_result($query,$i,picture);?>" width='110' height='70' border='0'/></td>
        <td><?php echo mysql_result($query,$i,username);?></td>
        <td><?php echo mysql_result($query,$i,name);?></td>
        <td><?php echo mysql_result($query,$i,remarks);?></td>
        <td><?php echo mysql_result($query,$i,address);?></td>
        <td><?php echo mysql_result($query,$i,reply);?></td>
        <td><?php echo date('Y/m/d',strtotime(mysql_result($query,$i,addtime)));?></td>
        <td>
            <a href="reply_meals.php?id=<?php echo mysql_result($query,$i,id);?>">
                <i class="fa fa-reply b_r b_orange material-icons m_b_5"></i>
                <span class="text_orange">�ظ�<span>
            </a>
            <a href="del.php?id=<?php echo mysql_result($query,$i,"id");?>&tablename=liuyanban" onclick="return confirm('���Ҫɾ����')">
                <i class="fa fa-trash b_r b_red material-icons m_b_5"></i>
                <span class="text_red">ɾ��<span>
            </a>
            <a href="update_meals.php?id=<?php echo mysql_result($query,$i,id);?>">
                <i class="fa fa-pencil b_r b_gree material-icons"></i>
                <span class="text_gree">�޸�<span>
            </a>
        </td>
      </tr>
		<?php
        }
		}
		?>
</table>
<?php 
  if($rowscount > 5)
  {
	  ?>
        <div class="clearfix news_list_page">
            <p class="fl">
              <input type="button" class="btn btn-info"" name="Submit2" onclick="javascript:window.print();" value="��ӡ��ҳ" />
            </p>
            <p class="fr news_list_page_p">
                <a href="check_meals.php?pagecurrent=1&user=<?php echo $user;?>&name=<?php echo $name;?>">��ҳ</a>
                <a href="check_meals.php?pagecurrent=<?php echo $pagecurrent-1;?>&user=<?php echo $user;?>&name=<?php echo $name;?>">��һҳ</a> 
                <a href="check_meals.php?pagecurrent=<?php echo $pagecurrent+1;?>&user=<?php echo $user;?>&name=<?php echo $name;?>">��һҳ</a>
                <a href="check_meals.php?pagecurrent=<?php echo $pagecount;?>&user=<?php echo $user;?>&name=<?php echo $name;?>">βҳ</a>
                <span>��<?php echo $pagecurrent;?>ҳ</span>
                <span>��<?php echo $pagecount;?>ҳ</span>
                <span>��<?php echo $rowscount;?>��</span>
            </p>
        </div>
        <?php 
		}
		?>
</div>
<!--������Ϣ�б�end-->
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript" >
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
function deleteSelected(){
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
        url: "del_all.php",
        type: "post",
        data: {
            table: "liuyanban",
            ids: ids
        },
        success: function(res){
            if(res.code == 0){//û��ѡ���κ�����
            	swal({
                  title: "���棡",
                  text: "��ѡ��ɾ�������ݣ�",
                  icon: "warning",
                });
                return false;
           	}
            if(res.code == 1){//��̨����code״̬1��ʾִ�гɹ�
            	swal({
                  title: "�ɹ���",
                  text: "�ɹ�ɾ��"+res.n+"������",
                  icon: "success",
                  showConfirmButton: true
                }).then ((isConfirm) => {//ִ�гɹ���Ļص�
                    history.go(0);
                })
           }    
        }
    })
}
</script> 
</body>
</html>

