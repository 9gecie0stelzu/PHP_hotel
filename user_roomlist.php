<?php
session_start();
include_once 'conn.php';
$name=$_GET['name'];
$grade=$_GET['grade'];
$start=$_GET['price_start'];
$end=$_GET['price_end'];
$state=$_GET['state'];
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
    <!--����ͼƬ-->
    <div class="roomlist_bg"></div>
    <!--����ͼƬend-->
    <!--������Ϣ-->
    <div class="hotel_msg content">
    	<form id="form1" name="form1" method="get" action="">
              <span>�ͷ����ƣ�</span>
              <input name="name" type="text" id="name" autocomplete="off" placeholder="������ͷ�����" style="width:150px" class="m_r_10" value="<?php echo $name;?>"/>
              <input type='text' style='display:none'> <!-- ���firefox -->
              <span>�ͷ��Ǽ���</span>
              <select name='grade' id='grade' class="m_r_10" value="<?php echo $grade;?>">
                <option value="">����</option>
                <option value="���Ǽ�">���Ǽ�</option>
                <option value="���Ǽ�">���Ǽ�</option>
                <option value="���Ǽ�">���Ǽ�</option>
                <option value="���Ǽ�">���Ǽ�</option>
              </select>
              <span>�ͷ��۸�</span> 
              <input name="price_start" type="text" id="price_start" autocomplete="off" placeholder="�������ѯ����ͼ۸�" value="<?php echo $start;?>"/>&nbsp;-&nbsp;
              <input name="price_end" type="text" id="price_end" autocomplete="off" class="m_r_10" placeholder="�������ѯ����߼۸�" value="<?php echo $end;?>"/>
              <input type='text' style='display:none'> <!-- ���firefox -->
              <span>�ͷ�״̬��</span> 
               <select name='state' id='state' class="m_r_10" value="<?php echo $state;?>">
                <option value="">����</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
              <input type="submit" name="Submit" value="����" class="check_btn"/>
        </form>
            <?php 
				$sql="select * from jiudianxinxi where 1=1";
				if ($name!=""){
					$sql=$sql." and name like '%$name%'";
				}
				if ($grade!=""){
					$sql=$sql." and grade like '%$grade%'";
				}
				if ($start!=""){
					$selstart=(int)$start;
					$sql=$sql." and price >= $selstart";
				}
				if ($end!=""){
					$selend=(int)$end;
					$sql=$sql." and price <= $selend";
				}
				if ($state!=""){
					$sql=$sql." and state like '$state'";
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
                    <table id="hotel_list" class="hotel_list table table-bordered table-hover">
                    <tr>
                        <th>���</th>
                        <th>��������</th>
                        <th>�Ǽ�</th>
                        <th>�۸�</th>
                        <th>ʣ������</th>
                        <th>ͼƬ</th>
                        <th>��ע</th>
                        <th>���ʱ��</th>
                        <th>����</th>
                    </tr>
                    <?php
					for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$sum;$i++)
				{
					
				  ?>
                    <tr>
                      <td width="25"><?php echo $i+1;?></td>
                      <td><?php echo mysql_result($query,$i,name);?></td>
                      <td><?php echo mysql_result($query,$i,grade);?></td>
                      <td><?php echo mysql_result($query,$i,price);?></td>
                      <td class="<?php if(mysql_result($query,$i,number) == 1){ ?>only_text<?php }?>">
					  		<?php echo mysql_result($query,$i,number);?>
                      </td>
                      <td>
                          <a href="<?php echo mysql_result($query,$i,picture) ?>" target='_blank'>
                            <img src='<?php echo mysql_result($query,$i,picture) ?>' width='80' height='88' border='0'>
                          </a>
                      </td>
                      <td><?php echo mysql_result($query,$i,remarks);?></td>
                      <td><?php echo date('Y/m/d',strtotime(mysql_result($query,$i,"addtime")));?></td>
                      <td>
                         <a href="<?php if(mysql_result($query,$i,number) != 0){?>
                         	user_order.php?id=<?php echo mysql_result($query,$i,"id");?>"
                             <?php }else{?>"javascript:"<?php }?> class="<?php if(mysql_result($query,$i,number) == 0){?>full_room<?php }?>">
                            <?php if(mysql_result($query,$i,number) == 0){ ?> 
								����
							<?php }else{?> 
								Ԥ��
                                <?php
								}
								?>
                          </a>
                     </td>
                    </tr>
                    <?php
					}
				}
				?>
    	</table>
         <!--��ҳ����-->
         <?php 
				$sql="select * from jiudianxinxi where 1=1";
				if ($name!=""){
					$sql=$sql." and name like '%$name%'";
				}
				if ($grade!=""){
					$sql=$sql." and grade like '%$grade%'";
				}
				if ($start!=""){
					$start=(int)$start;
					$sql=$sql." and price >= $start";
				}
				if ($end!=""){
					$end=(int)$end;
					$sql=$sql." and price <= $end";
				}
				if ($state!=""){
					$sql=$sql." and state like '$state'";
				}
				$sql=$sql." order by id desc";
				$query=mysql_query($sql);
				  $rowscount=mysql_num_rows($query);
				  if($rowscount > 10)
				  {
					?>
                    <div class="fenye">
                        <ul class="fpage clearfix" id="list_fpage">
                            <li><a href="user_roomlist.php?pagecurrent=1&name=<?php echo $name;?>&grade=<?php echo $grade;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&state=<?php echo $state;?>">��ҳ</a></li>
                            <li><a href="user_roomlist.php?pagecurrent=<?php echo $pagecurrent-1;?>&name=<?php echo $name;?>&grade=<?php echo $grade;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&state=<?php echo $state;?>">��һҳ</a></li>
                            <li><a href="user_roomlist.php?pagecurrent=<?php echo $pagecurrent+1;?>&name=<?php echo $name;?>&grade=<?php echo $grade;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&state=<?php echo $state;?>">��һҳ</a></li>
                            <li><a href="user_roomlist.php?pagecurrent=<?php echo $pagecount;?>&name=<?php echo $name;?>&grade=<?php echo $grade;?>&price_start=<?php echo $start;?>&price_end=<?php echo $end;?>&state=<?php echo $state;?>">βҳ</a></li>
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
    <!--������Ϣend-->
    <!--ע���¼-->
    <div>
    	<?php include_once 'userreg.php';?>
    </div>
    <!--ע���¼-->
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/swiper-3.4.2.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
