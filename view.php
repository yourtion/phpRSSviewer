<?php
include_once('header.php');
include_once('lastRSS.php');
$sourse = file_get_contents("rss.json");
$rssList =json_decode($sourse,true);
//echo $rssList[$_GET['author']]['sourse'];
$rssURL = $rssList[$_GET['author']]['sourse'];
$rss=new lastRSS;            //ʵ����
$rss->cache_dir='cache';    //���û���Ŀ¼��Ҫ�ֶ�����
$rss->cache_time=3600;    //���û���ʱ�䡣Ĭ��Ϊ0��������ʸ��»��棻��������Ϊ3600��һ��Сʱ
$rss->default_cp='UTF-8';    //�����ַ����룬Ĭ��ΪUTF-8
$rss->items_limit=10;        //�������������Ĭ��Ϊ10
$rss->date_format='U';        //����ʱ���ʽ��Ĭ��Ϊ�ַ�����UΪʱ�����������date���ø�ʽ
$rss->stripHTML=false;        //���ù���html�ű���Ĭ��Ϊfalse����������
$rss->CDATA='content';        //���ô���CDATA��Ϣ��Ĭ��Ϊnochange������strip��content����ѡ��
$rs=$rss->Get($rssURL);        //����RSS����ȡ����
//var_dump($rs);                //���
//echo urldecode($_GET['guid']);
?>
<div id="vContent">
<?php
foreach ($rs['items'] as $value){
	if($value['guid'] ==urldecode($_GET['guid']) ){
		echo '<h1>'.$value['title'].'</h1>';
		$pattern = "/height=\"[0-9]*\"/";
		$content = preg_replace($pattern, "", $value['content:encoded']);
		$pattern = "/width=\"[0-9]*\"/";
		$content = preg_replace($pattern, '', $content);
		echo '<h1>'.$content.'</h1>';
	}
}
?>
</div>
<style>
	body{
		background: #fff !important;
	}
</style>
<?php
include('footer.php');