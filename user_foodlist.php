<?php
session_start();
include_once 'conn.php';
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
?>
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
    <div class="about_bg hotel_list">
        <img src="img/hotel_list.jpg" alt="����Ԥ��ͼƬ" title="����Ԥ��ͼƬ"/>
    </div>
	<!--ͼƬend-->
    <!--�����б�-->
    <div class="orde_list content">
    	<h4>�ҵ�Ԥ���б�</h4>
        <a href="user_food.php">ȥ����>></a>
        <ul class="orde_list_ul">
		<?php
            $sql="select * from liuyanban where username='".$_SESSION['username']."'";
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
				for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$sum;$i++)
					{
					 ?>
                     	<li>
                            <ul class="list_msg">
                                <li>
                                	<span>�˺ţ�<?php echo mysql_result($query,$i,"username");?></span>
                                    <span>������<?php echo mysql_result($query,$i,"name");?></span>
                                </li>
                                <li>������Ϣ��<?php echo mysql_result($query,$i,"remarks");?></li>
                                <li>�µ�ʱ�䣺<?php echo mysql_result($query,$i,"addtime");?></li>
                                <li>��ϵ��ʽ��<?php echo mysql_result($query,$i,"tel");?></li>
                                <li>���͵�ַ��<?php echo mysql_result($query,$i,"address");?></li>
                            </ul>
                            <div class="orde_list_bottom">��һظ���<?php echo mysql_result($query,$i,"reply");?></div>
                        </li>
                     <?php
					}
  				}
 				?>
        </ul>
        <!--��ҳ����-->
        <?php
            $sql="select * from liuyanban where username='".$_SESSION['username']."'";
            $sql=$sql." order by id desc";
            $query=mysql_query($sql);
             $rowscount=mysql_num_rows($query);
             if($rowscount > 5)
			  {
			  ?>
                <div class="fenye">
                    <ul class="fpage clearfix" id="list_fpage">
                        <li><a href="user_foodlist.php?pagecurrent=1">��ҳ</a></li>
                        <li><a href="user_foodlist.php?pagecurrent=<?php echo $pagecurrent-1;?>">��һҳ</a></li>
                        <li><a href="user_foodlist.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a></li>
                        <li><a href="user_foodlist.php?pagecurrent=<?php echo $pagecount;?>">βҳ</a></li>
                        <li>��<?php echo $pagecurrent;?>ҳ</li>
                        <li>��<?php echo $pagecount;?>ҳ</li>
                        <li>��<?php echo $rowscount;?>��</li>
                    </ul>	
                </div>
        	<?php
			  }
			?>
        <!--��ҳ����end-->
    </div>
    <!--�����б�end-->
    <!--ע���¼-->
    <div>
    	<?php include_once 'userreg.php';?>
    </div>
    <!--ע���¼-->
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/swiper-3.4.2.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
