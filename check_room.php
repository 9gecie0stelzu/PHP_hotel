<?php 
include_once 'conn.php';
$name=$_GET['name'];
$start=$_GET['price_start'];
$end=$_GET['price_end'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ͷ���Ϣ�б�</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/demo_add.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
</head>

<body class="news_list_body">
<!--�ͷ���Ϣ�б�-->
<div class="staff_list">
	<div class="clearfix admin_con_top">
    	<h2 class="fl">���пͷ���Ϣ�б�</h2>
        <?php 
			$sql="select * from jiudianxinxi where 1=1";
			$query=mysql_query($sql);
			$rowscount=mysql_num_rows($query);
		?>
        <p class="fr">��<span><?php echo $rowscount;?></span>����¼</p>
    </div>
    <p class=" all_del" id="all_del" onclick="deleteSelected()">����ɾ��</p>
    <form id="form1" name="form1" method="get" action="">
        �ͷ����ƣ�<input name="name" type="text" id="name" class="m_r_10" autocomplete="off" placeholder="�ͷ�����" value="<?php echo $name;?>"/> 
        <input type='text' style='display:none'> <!-- ���firefox -->
        �ͷ��۸�<input name="price_start" type="text" id="price_start" style="width:150px;" autocomplete="off" placeholder="��۸�" value="<?php echo $start;?>"/>&nbsp;��&nbsp;
        		  <input name="price_end" type="text" id="price_end" style="width:150px;" class="m_r_10" autocomplete="off" placeholder="ʼ�۸�" value="<?php echo $end;?>"/>
        �ͷ��Ǽ���
          <select name='grade' id='grade' style="width:120px;text-align:center;" class="m_r_10" placeholder="�ͷ��Ǽ�">
            <option value="">����</option>
            <option value="���Ǽ�">���Ǽ�</option>
            <option value="���Ǽ�">���Ǽ�</option>
            <option value="���Ǽ�">���Ǽ�</option>
            <option value="���Ǽ�">���Ǽ�</option>
          </select> 
        <input type="submit" name="Submit" value="����" class="check_btn"/>
    </form>
    <div class="admin_news_list">
    	
            <?php
                  $sql="select * from jiudianxinxi where 1=1";
				  if ($name!=""){
						  $sql=$sql." and name like '%$name%'";
					 }
				  if ($grade!=""){
						  $sql=$sql." and grade like '$grade'";
					  }
				  if ($start!=""){
						  $start=(int)$start;
						  $sql=$sql." and price >= $start";
					  }
				  if ($end!=""){
						  $end=(int)$end;
						  $sql=$sql." and price <= $end";
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
                        <th>�ͷ�����</th>
                        <th>�ͷ��Ǽ�</th>
                        <th>�۸�</th>
                        <th>ʣ������</th>
                        <th>�ͷ���Ƭ</th>
                        <th style="width:200px;">�ͷ���ע</th>
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
                <td><?php echo mysql_result($query,$i,name);?></td>
                <td><?php echo mysql_result($query,$i,grade);?></td>
                <td><?php echo mysql_result($query,$i,price);?></td>
                <td><?php echo mysql_result($query,$i,number);?></td>
                <td>
                	<a href="<?php echo mysql_result($query,$i,picture) ?>" target='_blank'>
                		<img src='<?php echo mysql_result($query,$i,picture) ?>' width='130' height='70' border='0'>
                    </a>
                </td>
                <td><?php echo mysql_result($query,$i,remarks);?></td>
                <td><?php echo date('Y/m/d',strtotime(mysql_result($query,$i,"addtime")));?></td>
                <td>
                   <a href="del.php?id=<?php echo mysql_result($query,$i,"id");?>&tablename=jiudianxinxi" 
                   	onclick="return confirm('���Ҫɾ����')">
                    	<i class="fa fa-trash b_r b_red material-icons m_b_10"></i>
                        <span class="text_red">ɾ��<span>
                   </a> 
                   <a href="update_room.php?id=<?php echo mysql_result($query,$i,"id");?>">
                   		<i class="fa fa-pencil  b_r b_gree material-icons"></i>
                        <span class="text_gree">�޸�<span>
                   </a>
                </td>
            </tr>
        <?php
			}
 		 }
		 ?>
		</table>
    </div>
	<?php
	  if($rowscount > 10)
	  {
		  ?>
            <div class="clearfix news_list_page">
                <p class="fl">
                  <input type="button" class="btn btn-info"" name="Submit2" onclick="javascript:window.print();" value="��ӡ��ҳ" />
                </p>
                <p class="fr news_list_page_p">
                    <a href="check_room.php?pagecurrent=1&name=<?php echo $name;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&grade=<?php echo $grade;?>">��ҳ</a>
                    <a href="check_room.php?pagecurrent=<?php echo $pagecurrent-1;?>&name=<?php echo $name;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&grade=<?php echo $grade;?>">��һҳ</a> 
                    <a href="check_room.php?pagecurrent=<?php echo $pagecurrent+1;?>&name=<?php echo $name;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&grade=<?php echo $grade;?>">��һҳ</a>
                    <a href="check_room.php?pagecurrent=<?php echo $pagecount;?>&name=<?php echo $name;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&grade=<?php echo $grade;?>">βҳ</a>
                    <span>��<?php echo $pagecurrent;?>ҳ</span>
                    <span>��<?php echo $pagecount;?>ҳ</span>
                    <span>��<?php echo $rowscount;?>��</span>
                </p>
            </div>
            <?php }?>
</div>
<!--�ͷ���Ϣ�б�end-->
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
            table: "ruzhuxinxi",
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

