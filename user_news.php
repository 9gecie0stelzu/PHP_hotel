<?php
session_start();
include_once 'conn.php';
$lb=$_GET["lb"];
$name=$_GET["name"];
?>
<html>
<head>
<title>�Ƶ������Ϣϵͳ</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/swiper-3.4.2.min.css" />
<link rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
    <!--ͷ��-->
    <div class="content"><?php include_once 'head_nav.php';?></div>
    <!--ͷ��end-->
	<!--ͼƬ-->
    <div class="about_bg">
        <img src="img/hotel_bg.jpg" alt="�Ƶ��Ż�ͼƬ" title="�Ƶ��Ż�ͼƬ"/>
    </div>
	<!--ͼƬend-->
    <!--�Ƶ��Ż��б�-->
    <div class="news_list content">
        <div class="com_top clearfix">
            <div class="fl">
                <h4>�Ƶ��Ż�</h4>
                <p>HOTEL DISCOUNT</p>
            </div>
            <div class="fr sesarch">
            	<div class="search_box">
                	<form action="user_news.php" method="get" name="formsearch" id="formsearch">
                    	<input type="text" name="name" class="input fl" id="name" value="<?php echo $name;?>" placeholder="������Ƶ��Ż�����" autocomplete="off">
                        <input type='text' style='display:none'> <!-- ���firefox -->
                        <input type="submit" class="btnimg fl" id="btn" src="img/glass.png">
                    </form>				
				</div>
            </div>
        </div>
        <ul class="news_list_ul">
        <?php 
        $sql="select * from xinwentongzhi where 1=1";
        if ($name!=""){
			$sql=$sql." and name like '%$name%'";
		}
        if($lb!=""){
			$sql=$sql." and cls='$lb'";
		}
          $sql=$sql." order by id desc";
          $query=mysql_query($sql);
          $rowscount=mysql_num_rows($query);
          if($rowscount==0)
          {
			 ?>
             <div class="date_null">��Ǹ�������������Ϊ�ա�</div>
             <?php
			}
          else
          {
          $pagelarge=8;//ÿҳ����;
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
                 <a href="user_newdetail.php?id=<?php echo mysql_result($query,$i,"id");?>" class="clearfix">
                    <div class="img fl">
                        <img src="<?php echo mysql_result($query,$i,"picture");?>" alt="<?php echo mysql_result($query,$i,"name");?>" title="<?php echo mysql_result($query,$i,"name");?>">
                    </div>
                    <div class="news_con fl">
                        <div>
                            <span class="rank"><?php echo ($i + 1)?></span>
                            <span class="name txt_overflow"><?php echo mysql_result($query,$i,"name");?></span>
                            <span class="clsname"><?php echo mysql_result($query,$i,"cls");?></span>
                        </div>
                        <p class="pname txt_news_pname"><?php echo mysql_result($query,$i,"context");?></p>
                        <div class="clearfix">
                            <p class="fl">����ʱ�䣺<?php echo date('Y-m-d',strtotime(mysql_result($query,$i,"addtime")));?></p>
                            <p class="fl">���������<?php echo mysql_result($query,$i,"open");?></p>   
                        </div>
                    </div>
                 </a>
               </li>
                <?php
                }
              }
              ?>
        </ul>
        <!--��ҳ����-->
        <?php 
		$sql="select * from xinwentongzhi where 1=1";
        if ($name!=""){
			$sql=$sql." and name like '%$name%'";
		}
		$sql=$sql." order by id desc";
        $query=mysql_query($sql);
          $rowscount=mysql_num_rows($query);
          if($rowscount > 8)
          {
		?>
        <div class="fenye">
            <ul class="fpage clearfix" id="list_fpage">
            	<li><a href="user_news.php?pagecurrent=1&lb=<?php echo $lb;?>&name=<?php echo $name;?>">��ҳ</a></li>
                <li><a href="user_news.php?pagecurrent=<?php echo $pagecurrent-1;?>&lb=<?php echo $lb;?>&name=<?php echo $name;?>">��һҳ</a></li>
                <li><a href="user_news.php?pagecurrent=<?php echo $pagecurrent+1;?>&lb=<?php echo $lb;?>&name=<?php echo $name;?>">��һҳ</a></li>
                <li><a href="user_news.php?pagecurrent=<?php echo $pagecount;?>&lb=<?php echo $lb;?>&name=<?php echo $name;?>">βҳ</a></li>
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
    <!--�Ƶ��Ż��б�end-->
    <!--ע��-->
    <div>
    	<?php include_once 'userreg.php';?>
    </div>
    <!--ע��-->
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/swiper-3.4.2.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
