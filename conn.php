<?php
//���ݿ������ļ�
$host='localhost';//���ݿ������
$user='root';//���ݿ��û���
$password='123456';//���ݿ�����
$database='phpjiudian';//���ݿ���'
$conn=@mysql_connect($host,$user,$password) or die('���ݿ�����ʧ�ܣ�');//�������ݿ�
@mysql_select_db($database) or die('û���ҵ����ݿ⣡');//ѡ�����ݿ�
mysql_query("set names 'gb2312'");//���ñ����ʽ
function getoption($ntable,$nzd)
{
		$sql="select ".$nzd." from ".$ntable." order by id desc";
		$query=mysql_query($sql);//ִ��sql
		$rowscount=mysql_num_rows($query);//��ý�������е���Ŀ
		if($rowscount>0)//�жϽ�����ĸ���
		{
			for ($fi=0;$fi<$rowscount;$fi++)//ѭ�������
			{
				?>
				<option value="<?php echo mysql_result($query,$fi,0);?>"><?php echo mysql_result($query,$fi,0);?></option>
				<?php
			}
		}
}
function getoption2($ntable,$nzd)
{
	?>
	<option value="">��ѡ��</option>
	<?php
		$sql="select ".$nzd." from ".$ntable." order by id desc";
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			for ($fi=0;$fi<$rowscount;$fi++)
			{
				?>
				<option value="<?php echo mysql_result($query,$fi,0);?>" <?php 
				
				if($_GET[$nzd]==mysql_result($query,$fi,0))//���get�Ĳ������������Ľ�����selected
				{
					echo "selected";
				}
				?>><?php echo mysql_result($query,$fi,0);?></option>
				<?php
			}
		}
}
function getitem($ntable,$nzd,$tjzd,$ntj)
{
	if($_GET[$tjzd]!="")
	{
		$sql="select ".$nzd." from ".$ntable." where ".$tjzd."='".$ntj."'";
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			
				echo "value='".mysql_result($query,0,0)."'";
			
		}
	}
}
?>