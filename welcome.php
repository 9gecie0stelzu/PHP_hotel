<?php 
session_start();
include_once 'conn.php';
date_default_timezone_set('PRC'); 
$ndate =date("Y-m-d");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html class="welcome_bg">
<head>
<title>welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="css/font-awesome.min.css.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/echartsHome.css" />
<link rel="stylesheet" href="css/codemirror.css" />
<link rel="stylesheet" href="css/carousel.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="welcome_bg">
<?php 
if($_SESSION['cx']=="ע���û�")
	{
		?>
		<div class="welcome">��ӭ����������</div>
        <?php
	}else{
		?>
        <div class="admin_top">
        	<div class="clearfix admin_con_top admin_con_top_spe">
                <h2 class="fl" style="letter-spacing:2px;">ϵͳ��Ϣͳ��</h2>
                <p class="fr" style="height:40px;line-height:40px;">��ǰ���ڣ� <?php echo $ndate; ?></p>
            </div>
            <ul class="date_show_ul clearfix">
                <li>
					<?php 
						$sql="select * from yonghuzhuce where issh='��'";//ͳ����˵��û�����
						$query=mysql_query($sql);
						$rowscount=mysql_num_rows($query);
						date_default_timezone_set('PRC');
						$start = date('Y-m-01 00:00:00');//ͳ�Ʊ��µ�����û�����
						$end = date('Y-m-d H:i:s');
						$sql="select * from yonghuzhuce where issh='��' and unix_timestamp(addtime) >= unix_timestamp('".$start."') and unix_timestamp(addtime) <= unix_timestamp('".$end."')";
						$query=mysql_query($sql);
						$mothscount=mysql_num_rows($query);
					?>
                    <h4 class="data_1">�û�����</h4>
                    <div class="clearfix">
                    	<div class="fl">
                        	<h4><?php echo $rowscount;?></h4>
                            <p>����</p>
                        </div>
                        <div class="fl">
                        	<h4><?php echo $mothscount;?></h4>
                            <p>����</p>
                        </div>
                    </div>
                </li>
                <li>
                	<?php 
						$sql="select sum(`number`) as `total` from jiudianxinxi where 1=1";//ͳ��ÿ���ͷ��������ܺ�
						$query=mysql_query($sql);
						$result = mysql_fetch_array($query);
						$rowscount = $result['total'];
						date_default_timezone_set('PRC');
						$start = date('Y-m-01 00:00:00');//ͳ�Ʊ���ÿ���ͷ��������ܺ�
						$end = date('Y-m-d H:i:s');
						$sql="select sum(`number`) as `total` from jiudianxinxi where 1=1 and unix_timestamp(addtime) >= unix_timestamp('".$start."') and unix_timestamp(addtime) <= unix_timestamp('".$end."')";
						$query=mysql_query($sql);
						$result = mysql_fetch_array($query);
						$mothscount = $result['total'];
					?>
                    <h4 class="data_2">�ͷ�����</h4>
                    <div class="clearfix">
                    	<div class="fl">
                        	<h4><?php echo $rowscount;?></h4>
                            <p>����</p>
                        </div>
                        <div class="fl">
                        	<h4><?php echo $mothscount;?></h4>
                            <p>����</p>
                        </div>
                    </div>
                </li>
                <li>
                
                <?php 
						$sql="select * from jiudianyuding where 1=1";//ͳ�ƿͷ��ܶ�����
						$query=mysql_query($sql);
						$rowscount=mysql_num_rows($query);
						date_default_timezone_set('PRC');
						$start = date('Y-m-01 00:00:00');//ͳ�Ʊ��¿ͷ��ܶ�����
						$end = date('Y-m-d H:i:s');
						$sql="select * from jiudianyuding where 1=1 and unix_timestamp(addtime) >= unix_timestamp('".$start."') and unix_timestamp(addtime) <= unix_timestamp('".$end."')";
						$query=mysql_query($sql);
						$mothscount=mysql_num_rows($query);
					?>
                    <h4 class="data_3">����ͳ��</h4>
                    <div class="clearfix">
                    	<div class="fl">
                        	<h4><?php echo $rowscount;?></h4>
                            <p>����</p>
                        </div>
                        <div class="fl">
                        	<h4><?php echo $mothscount;?></h4>
                            <p>����</p>
                        </div>
                    </div>
                </li>
                <li>
                    <?php 
						$sql="select * from yuangongxinxi where 1=1";//ͳ��Ա������
						$query=mysql_query($sql);
						$rowscount=mysql_num_rows($query);
						date_default_timezone_set('PRC');
						$start = date('Y-m-01 00:00:00');//ͳ�Ʊ������Ա����
						$end = date('Y-m-d H:i:s');
						$sql="select * from yuangongxinxi where 1=1 and unix_timestamp(addtime) >= unix_timestamp('".$start."') and unix_timestamp(addtime) <= unix_timestamp('".$end."')";
						$query=mysql_query($sql);
						$mothscount=mysql_num_rows($query);
				   ?>
                   <h4 class="data_4">�Ƶ�Ա��</h4>
                   <div class="clearfix">
                    	<div class="fl">
                        	<h4><?php echo $rowscount;?></h4>
                            <p>����</p>
                        </div>
                        <div class="fl">
                        	<h4><?php echo $mothscount;?></h4>
                            <p>����</p>
                        </div>
                    </div>
                </li>
            </ul>
            <!--���ݿ��ӻ�-->
            <div class="bar_show">
                <div id="graphic">
                    <div id="main" class="main"></div>
                </div>
            </div>
            <!--���ݿ��ӻ�end-->
		</div>
    <?php
	}
?>
		<!--��ȡ��������סӪҵ��-->
		<?php
		   $sql = "select * from ruzhuxinxi where date_sub(curdate(), interval 7 day) <= date(addtime)";
		   $result = mysql_query($sql);
		   $day_time = 24*60*60;
		   $day = array();
		   date_default_timezone_set('PRC');
		   for($i = 0; $i < 7; $i++){
		 		$day[$i]['timestamp'] = strtotime(date('Y-m-d')) - $i * $day_time;
				$day[$i]['format'] = date('m/d',$day[$i]['timestamp']);
				$day[$i]['total_price'] = 0;
		   }
		   while($row = mysql_fetch_assoc($result)) {
			   foreach($day as $k => $v){
				   		if(strtotime(date('Y-m-d',strtotime($row['addtime']))) == $v['timestamp']){
								$day[$k]['total_price'] += $row['price'];
							}
				   }
				}
		?>
        <!--��ȡ������Ԥ��Ӫҵ��-->
		<?php
		   $sql = "select * from jiudianyuding where date_sub(curdate(), interval 7 day) <= date(time)";
		   $result = mysql_query($sql);
		   $day_time = 24*60*60;
		   $book = array();
		   date_default_timezone_set('PRC');
		   for($i = 0; $i < 7; $i++){
		 		$book[$i]['timestamp'] = strtotime(date('Y-m-d')) - $i * $day_time;//��ȡ������ÿһ���ʱ���
				$book[$i]['format'] = date('m/d',$book[$i]['timestamp']);
				$book[$i]['total_price'] = 0;
		   }
		   while($row = mysql_fetch_assoc($result)) {
			   foreach($book as $k => $v){
				   		if(strtotime(date('Y-m-d',strtotime($row['time']))) == $v['timestamp']){
								$book[$k]['total_price'] += $row['price'];
							}
				   }
				}
		?>
        <!--��ȡ������ɽ�Ӫҵ��-->
		<?php
		   $sql = "select * from jiudianyuding where issh='��' and `leave`='��' and date_sub(curdate(), interval 7 day) <= date(time)";
		   $result = mysql_query($sql);
		   $day_time = 24*60*60;
		   $deal = array();
		   date_default_timezone_set('PRC');
		   for($i = 0; $i < 7; $i++){
		 		$deal[$i]['timestamp'] = strtotime(date('Y-m-d')) - $i * $day_time;
				$deal[$i]['format'] = date('m/d',$deal[$i]['timestamp']);
				$deal[$i]['total_price'] = 0;
		   }
		   while($row = mysql_fetch_assoc($result)) {
			   foreach($deal as $k => $v){
				   		if(strtotime(date('Y-m-d',strtotime($row['time']))) == $v['timestamp']){
								$deal[$k]['total_price'] += $row['price'];
							}
				   }
				}
		?>
</body>
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/dist/echarts.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">

		
        // ·������
        require.config({
            paths: {
                echarts: 'js/dist/'
            }
        });
        
        // ʹ��
        require(
            [
                'echarts',
				'echarts/chart/bar',
                'echarts/chart/line' // ʹ����״ͼ�ͼ���barģ�飬�������
						
            ],
            function (ec) {
                // ����׼���õ�dom����ʼ��echartsͼ��
                var myChart = ec.init(document.getElementById('main')); 
                
              var option = {
				title : {
					text: '���ڿͷ�ʹ�����',
					subtext: 'Ӫҵ��'
				},
				tooltip : {
					trigger: 'axis'
				},
				legend: {
					data:['��ס','Ԥ��','�ɽ�']
				},
				toolbox: {
					show : true,
					feature : {
						dataView : {show: true, readOnly: false},
						magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
						restore : {show: true},
						saveAsImage : {show: true}
					}
				},
				calculable : true,
				xAxis : [
					{
						type : 'category',
						boundaryGap : false,
						data : [//����
						"<?php echo $day[6]['format']?>",
						'<?php echo $day[5]['format']?>',
						'<?php echo $day[4]['format']?>',
						'<?php echo $day[3]['format']?>',
						'<?php echo $day[2]['format']?>',
						'<?php echo $day[1]['format']?>',
						'<?php echo $day[0]['format']?>'
						]
					}
				],
				yAxis : [
					{
						type : 'value'
					}
				],
				series : [
					{
						name:'��ס',
						type:'line',
						smooth:true,
						itemStyle: {normal: {areaStyle: {type: 'default'}}},
						data:[
						"<?php echo $day[6]['total_price']?>", 
						"<?php echo $day[5]['total_price']?>",
						"<?php echo $day[4]['total_price']?>", 
						"<?php echo $day[3]['total_price']?>",
						"<?php echo $day[2]['total_price']?>",
						"<?php echo $day[1]['total_price']?>",
						"<?php echo $day[0]['total_price']?>",
						]
					},
					{
						name:'Ԥ��',
						type:'line',
						smooth:true,
						itemStyle: {normal: {areaStyle: {type: 'default'}}},
						data:[
						"<?php echo $book[6]['total_price']?>",
						"<?php echo $book[5]['total_price']?>",
						"<?php echo $book[4]['total_price']?>",
						"<?php echo $book[3]['total_price']?>",
						"<?php echo $book[2]['total_price']?>",
						"<?php echo $book[1]['total_price']?>",
						"<?php echo $book[0]['total_price']?>"
						]
					},
					{
						name:'�ɽ�',
						type:'line',
						smooth:true,
						itemStyle: {normal: {areaStyle: {type: 'default'}}},
						data:[
						"<?php echo $deal[6]['total_price']?>",
						"<?php echo $deal[5]['total_price']?>", 
						"<?php echo $deal[4]['total_price']?>",
						"<?php echo $deal[3]['total_price']?>",
						"<?php echo $deal[2]['total_price']?>",
						"<?php echo $deal[1]['total_price']?>",
						"<?php echo $deal[0]['total_price']?>",
						]
					}
				]
			};
                // Ϊecharts����������� 
                myChart.setOption(option); 
            }
        );
    </script>
</html>
