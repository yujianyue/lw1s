<?php include "inc/conn.php";?><?php include "inc/pubs.php";?>
<!doctype html><?php $tts = date("YmdHis",time());?>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title><?php echo $title;?>,96448.cn</title>
<meta name="author" content="yujianyue, admin@ewuyi.net">
<meta name="copyright" content="www.12391.net">
<link href="inc/css/style.css?t=170828" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="inc/js/js.js?t=170828"></script>
</head>
<body onLoad="inst();">
<div class="html">
<div class="divs" id="divs">
<div id="head" class="head" onclick="location.href='?t=<?php echo $tts;?>';">
<?php echo $title;?>
</div>
<div class="main" id="main">
<?php 

$stime=microtime(true); 
$codes = trim($_POST['code']);
$shuru1 = trim($_POST['name']);
if(!$shuru1){
?>
<form name="queryForm" method="post" action="?t=<?php echo $tts;?>" onsubmit="return startRequest(0);">
<div class="so_box" id="11">
<input name="name" type="text" class="txts" id="name" value="" placeholder="请输入<?php echo $tiaojian1;?>" onfocus="st('name',1)" onBlur="startRequest(2)" />
</div>
<?php 
if($ismas=="1"){
?>
<div class="so_box" id="33">
<input name="code" type="text" class="txts" id="code" placeholder="请输入验证码" onfocus="this.value=''" onBlur="startRequest(3)" />
<div class="more" id="clearkey">
<img src="inc/code.php?t=<?php echo $tts;?>" id="Codes" onClick="this.src='inc/code.php?t='+new Date();" />
</div></div>
<?php }?>
<div class="so_but">
<input type="submit" name="button" class="buts" id="sub" value="立即查询" />
<input type="button" class="buts" value="刷新本页" name="print" onclick="location.reload();">
</div>
<div class="so_bus" id="tishi">
说明:【<?php echo $tiaojian1;?><?php 
if($ismas=="1"){
?>+验证码<?php }?>】都输入正确才显示相应结果。<br>
<!---你的其他说明在这里添加：开始-->
内容输入参考(访问以下网址下载)：<br>
http://12391.net/LA1sqlite/sqlite.csv
<!--你的其他说明在这里添加：结束-->
</div>
<div id="tishi1" style="display:none;">请输入<?php echo $tiaojian1;?></div>
<div id="tishi4" style="display:none;">请输入4数字验证码</div>
</form>
<?php 
}else{

if($ismas=="1"){
session_start();
if($codes!=$_SESSION['PHP_M2T']){
 webalert("请正确输入验证码！");
}
}

if(!$shuru1){
 webalert("请输入$tiaojian1!");
}

$files = $UpDir."/".$dbtype;

$files = charaget($files);

if(!file_exists($files)){
$files = characet($files);
}

if(!file_exists($files)){
 webalert('请检查数据库文件');
}

$ii = 0;
$iy = 0;
echo "<!--startprint-->";

 $db = new MyDB($files);
if(!$db){
echo "<h2>";
echo $db->lastErrorMsg();
echo "</h2>";
}else{
echo "<br><br><h2>查询结果</h2>";
}
   //$sql = characet("SELECT * from COMPANY WHERE '{$tiaojian1}'='{$shuru1}'");
   $sql = characet("SELECT * from COMPANY");
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
 $ii++;

/*
  $jj=0;
if($ii."_"=="1_"){
 foreach ($row as $keyt => $valt){
   $jj++;
echo "<!-- $keyt <> $tiaojian1 -->\r\n";
 if($keyt."_" == $tiaojian1."_"){
   $lie = $jj;
 }  
}
}
*/

  $list = "<table cellspacing=\"0\" class=\"table\"> \r\n";
  $kk=0; $liezhi="@@@@@@只有你知道的内容@@@";
 foreach ($row as $key => $val){  
 if(charaget($key)."_" == charaget($tiaojian1)."_"){
  $liezhi=$val;
 }
  $list .= "<tr><td class=\"r\">$key</td><td class=\"l\">".$val."</td></tr>\r\n";  
  $kk++;
 }  
  $list .= "</table>\r\n";

 if(charaget($liezhi)."_" == charaget($shuru1)."_"){
  $iy++;
  echo $list;
 }

 }

 $db->close();

if($iy<1){
  echo "<table cellspacing=\"0\" class=\"table\"> \r\n";
  echo '<tr>';
  echo "<td colspan=2>没有查询到相关信息哦</td>";
  echo '</tr>';
  echo '</table>';
}

echo '<!--endprint-->';

?>
<div class="so_but">
<input type="button" class="buts" value="预 览" name="print" onclick="preview()">
<input type="button" class="buts" value="返 回" id="reset" onclick="location.href='?t=back';"></div>
<?php 
}
$etime=microtime(true);
$total=$etime-$stime;
echo "<!----页面执行时间：{$total} ]秒--->";
?>
</div>
<div class="boto" id="boto">
&copy;<?php echo date('Y');?>&nbsp; <a href="<?php echo $copyu;?>" target="_blank"><?php echo $copyr;?></a>
</div>
</div>
</div>
</body>
</html>