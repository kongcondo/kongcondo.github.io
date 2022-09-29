
<html>
<head>

<title>Booking Hotel Online Kanchanaburi</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<style type="text/css">
body {font-family:Arial; font-size:12px;}

.template1 {width:970px; margin:0;}
.template1 p {background-color:#26527C; padding:30px; margin:0; text-align:center; color:white; font-size:16px;}

.template1 ul.menutop {background-color:#26527C; color:white; padding:0; margin:0; font-weight:bold; height:25px;}
.template1 ul.menutop li {background-color:#0099FF; list-style:none; float:left; padding:5px; margin-left:1px; width:150px; text-align:center;}
.template1 ul.menutop a {color:white; text-decoration:none;}
.template1 ul.menutop a:hover {color:red;}
.template1 ul.menutop li:hover {background-color:#8CECFD;}

.template1 .r24searchbox {width:200px; height:320px; line-height:16px; margin:auto; padding:8px; font-family:Arial; font-size:11px; background: url('http://www.R24DB.com/html/images/bg-spsearchbox.jpg') no-repeat;}
.template1 .r24searchbox select {border:1px solid #CCC; font-size:11px;}
.template1 .r24searchbox .fieldname {color:#0066CC; padding-top:5px; font-weight:bold;}
.template1 .r24searchbox .head {color:white; font-size:16px; font-weight:bold; text-align:center;}
.template1 .r24searchbox .searchbutton {margin-top:5px; text-align:center;}

.template1 .r24hotellist1 {width:760px; margin:0 auto; font-family:Arial, Helvetica, sans-serif;}
.template1 .r24hotellist1 .hotellisting {height:350px; border:1px #C0C0C0 solid; overflow:scroll;} /* change to hidden to remove scrollbars */
.template1 .r24hotellist1 .hotelimg {border:1px #C0C0C0 solid; padding:3px; margin-right:10px; float:left;}
.template1 .r24hotellist1 ul {margin:0; padding:0; }
.template1 .r24hotellist1 li {list-style:none; margin:0 5px; padding:10px 0; width:360px; float:left; border-bottom:1px #C0C0C0 dotted;}
.template1 .r24hotellist1 .hotelname, .template1 .r24hotellist1 .hotelname:visited {color:blue; font-weight:bold; text-decoration:none; font-size:11px;}
.template1 .r24hotellist1 .hotelname:hover {color:red; text-decoration:underline;}
.template1 .r24hotellist1 a.linkdetail, .template1 .r24hotellist1 a.recommend {color:white; font-weight:bold; padding:3px 5px; text-decoration:none; font-size:11px;}
.template1 .r24hotellist1 a.linkdetail {background-color:#0099FF;}
.template1 .r24hotellist1 a.linkdetail:hover {background-color:gray;}
.template1 .r24hotellist1 .recommend {color:red; font-style:italic; font-size:14px;}
</style>
</head>

<!----- Start Search box area ----->
<?php
$partner = $_REQUEST['p']? $_REQUEST['p'] : "Kamolthip.com" ;
$url = "http://www.R24DB.com/xml/extrafunction/R24hotellistfromsearchbox.php?partner=$partner";
$today = getdate();
$today1 = getdate(strtotime("+1 days"));
$today2 = getdate(strtotime("+2 days"));
$monnam = array ("Jan.","Feb.","Mar.","Apr.","May","Jun.","Jul.","Aug.","Sep.","Oct.","Nov.","Dec.");

if ($stay) {
list($d1, $d2) = explode("/", $stay);
if (strlen($d1)>=8) $today1 = getdate(strtotime($d1));
if (strlen($d2)>=8) $today2 = getdate(strtotime($d2));
if (strlen($d2) <4) $today2 = getdate(strtotime("+".$d2."days",$d1));
}

function list_provinces () {
global $partner;
$opt = $o = 0;
$col = array('#FFDDFF','#FFFFDD','#DDFFDD','#FFDDDD','#DDFFFF','#FFFFFF');
$url = "http://th.r24.org/xmlR24db.php?p=$partner&db=province&s=group";
$xml = @simplexml_load_file($url) or die("Sorry, can't open this: ".$url);
foreach ($xml->province as $province) { $sel = "";
if (trim($province->reggroup) <> $opt && $opt) echo "</optgroup>\n";
if (trim($province->reggroup) <> $opt) { echo "<optgroup label=\"$province->reglabel\" style=\"background-color: $col[$o]\">\n"; $opt = $province->reggroup; $o++; }
$selstyle = ($province->hotelcount == 0) ? " style=\"color:#c0c0c0;\" " : "";
echo "<option value=\"$province->province_id\" $sel $selstyle> $province->province_en </option>\n";
} /* foreach */
if ($opt) echo "</optgroup>\n";

}
?>

<?php
$partner = $_REQUEST['p']?$_REQUEST['p'] : "Kamolthip.com" ; # replace it by your R24-registered domain name. Required.
$region = $_REQUEST['r'] ? $_REQUEST['r'] :"kanchanaburi"; # replace "huahin" by whatever region you want to call initially.
$cur = $_REQUEST['cur'] ? $_REQUEST['cur'] :"THB"; # optional. To set a DEFAULT currency.
$sorting = "name"; # optional. To set a DEFAULT sorting &s=[-]region,name,location,rate,hno. Example: $sorting = "location,-rate" (default)
# &s=[-]region,name,location,rate,hno
# sort result by one or more of the options above
# [-] is descending, otherwise ascending.


$url3 = "http://th.R24.org/xmlR24.php?p=".$partner."&r=".$region."&c=".$cur."&v=".$province."&kl=".$location."&s=".$sorting;
$xml3 = @simplexml_load_file($url3) or die("Sorry, can't open this: ".$url3);

?>


<body>
<div class="template1">

<!----- Start header page area ----->
<p style="padding:30px">Kamolthip Hotel Booking</p>
<ul class="menutop">
<li><a href="#">Home</a></li>
<li><a href="bangkok.php">Bangkok Hotels</a></li>
<li><a href="phuket.php">Phuket Hotels</a></li>
<li><a href="samui.php">Samui Hotels</a></li>
<li><a href="pattaya.php">Pattaya Hotels</a></li>
<li><a href="chiangmai.php">Chiang mai Hotels</a></li>
</ul>
<!----- End header page area ----->

<div style="margin-top:20px"></div>
<div style="float:left; width:200px">
<div class="r24searchbox">
<div class="head">Find Hotel</div><br>

<div style="padding:5px; width:180px">
<form name="findhotelform" id="findhotelform" method="post" style="margin:0;" action="<?php echo $url?>" onSubmit="return checkdates(this)">
<span class="fieldname">** Destinations :</span><br>
<select id="destination" name="pv" style="width:175px">
<option value="">- select city or region -</option>
<optgroup label="Popular regions" style="background-color:#DDFFFF">
<option value="73" style="background-color:#DDFFFF">Phuket</option>
<option value="64" style="background-color:#DDFFFF">Krabi</option>
<option value="63a" style="background-color:#DDFFFF">Koh Samui</option>
<option value="14a" style="background-color:#DDFFFF">Pattaya</option>
<option value="59a" style="background-color:#DDFFFF">Hua Hin</option>
</optgroup>
<?php list_provinces("") ?>
</select>


<div class="fieldname">Search by hotel / location :</div>
<input id="searchname" name="loc" type="text" style="width:175px">


<div class="fieldname">Check-in Date</div>
<select name="date11" id="date11" size="1" style="width:40px">
<?php for ($i = 1; $i <= 31; $i++) { $sel = $today1["mday"]==$i ? "selected":"";
echo "<option value=\"$i\" $sel>$i</option>\n"; } ?>
</select> <select name="date12" id="date12" size="1" style="width:102px">
<?php $yy = $today["year"]; if ($yy < 100) $yy + 2000;
for ($y = $yy; $y <= $yy+2; $y++)
for ($i = 1; $i <= 12; $i++) { if ($yy==$y && $i < $today["mon"]) continue;
$sel = ($today1["mon"]==$i && $yy==$y) ? "selected":"";
echo "<option value=\"$y,$i\" $sel>".$monnam[$i-1]." $y</option>\n"; } ?>
</select>


<div class="fieldname">Check-out Date</div>
<select name="date21" id="date21" size="1" style="width:40px">
<?php for ($i = 1; $i <= 31; $i++) { $sel = $today2["mday"]==$i ? "selected":"";
echo "<option value=\"$i\" $sel>$i</option>\n"; } ?>
</select> <select name="date22" id="date22" size="1" style="width:101px">
<?php $yy = $today["year"]; if ($yy < 100) $yy + 2000;
for ($y = $yy; $y <= $yy+2; $y++)
for ($i = 1; $i <= 12; $i++) { if ($yy==$y && $i < $today["mon"]) continue;
$sel = ($today2["mon"]==$i && $yy==$y) ? "selected":"";
echo "<option value=\"$y,$i\" $sel>".$monnam[$i-1]." $y</option>\n"; } ?>
</select><br>


<div style="float:left;">
<div class="fieldname">Stay : <span id="dayid"></span></div>
<input name="days" id="days" type="text" style="width:30px" value="1"> nights
</div>


<div style="float:right">
<div class="fieldname">adult / child :</div>
<input name="person" id="person" type="text" style="width:30px" value="2">
<input name="person2" id="person2" type="text" style="width:30px" value="0">
</div>


<div style="clear:both"></div>
<div class="searchbutton">
<input id="searchhotel" name="checkav" type="image" src="http://www.R24DB.com/html/images/button-search1.gif" title="Search Hotel" style="height:30px; width:85px">
<input id="period" name="stay" type="hidden" value="">
</div>

</form>
</div>

</div>


<script type="text/javascript">
// period set to &stay=2011-02-22/2011-02-26
function checkdates(f) {
var jsCal = new Object();
jsCal.startDate = [0,0,0,null];
jsCal.endDate = [0,0,0,null];
var d = new Date();
var pp;
var d = f.date11.selectedIndex; jsCal.startDate[0] = +f.date11.options[d].value;
d = f.date12.selectedIndex; pp = f.date12.options[d].value.split(',');
jsCal.startDate[1] = +pp[1];
jsCal.startDate[2] = +pp[0];
d = f.date21.selectedIndex; jsCal.endDate[0] = +f.date21.options[d].value;
d = f.date22.selectedIndex; pp = f.date22.options[d].value.split(',');
jsCal.endDate[1] = +pp[1];
jsCal.endDate[2] = +pp[0];
var d1= new Date(jsCal.startDate[2], jsCal.startDate[1]-1, jsCal.startDate[0], 23, 00, 00);
var d2= new Date(jsCal.endDate[2], jsCal.endDate[1]-1, jsCal.endDate[0], 23, 00, 00);
var d0= new Date();

if ((d1.getMonth()+1 != jsCal.startDate[1])||(d1.getDate()!= jsCal.startDate[0])||(d1.getFullYear() != jsCal.startDate[2])) d = -1;
else if ((d2.getMonth()+1 != jsCal.endDate[1])||(d2.getDate()!= jsCal.endDate[0])||(d2.getFullYear() != jsCal.endDate[2])) d = -1;
else d = (d2 - d1) / 86400000;

var sd = 0;
if (d1 > d2) sd = 1;
if (d1 < d0) d = -1;
var p = document.getElementById('dayid');
if (d> 1) p.innerHTML = "<span style=\"color:#F60\">[" + d + " nights]</span>";
if (d==1) p.innerHTML = "<span style=\"color:#F60\">[" + d + " night.]</span>";
if (d< 0 && sd==0) p.innerHTML = "<span style=\"color:#F60\">[error date]</span>";
if (d1 < d0) p.innerHTML = "<span style=\"color:#F60\">[error date]</span>";
if (d<1 && sd==1) p.innerHTML = "<span style=\"color:#F60\">[error date]</span>"; // CHECK
var p = document.getElementById('days');
if (d>0 || d==0) { p.value = d; checkDate = true; }
else { checkDate = false; }
return checkDate;
}

</script>
<!----- End Search box area ----->


<!----- Start Promotion area ----->
<img alt="" src="http://www.r24db.com/html/imgpromote/<?= $region; ?>promotion.jpg">
<!----- End Promotion area ----->
</div>



<div style="margin-left:210px">

<!----- Start Hotel Listing area ----->
<div class="r24hotellist1">
<div id="modhotellist1navi" class="hotellisting">
<ul>
<?php foreach ($xml3->hotel as $hotel) { # loop for display hotel list
if ($promote == "1") { if ($hotel->promote == '') continue; } # check for hotel which have promotion
$attr = $hotel['hno'];
?>
<li><img alt="" class="hotelimg " height="90" src="http://th.r24.org/R24pic.php?i=icon&x=150&y=100&h=<?php echo $attr;?>" width="120">
<div style="height:78px">
<a href="<?php echo $hotel->hotellink2; ?>" class="hotelname"><?= $hotel->hotelname; ?>
</a><br><span style="font-size:10px"><strong>Location : </strong><?= $hotel->location; ?><br>
<strong>Destination : </strong><?= ucfirst($hotel->region); ?>
<br><strong>Rates From : </strong><span style="color:red"><?= $hotel->minrate." ".$hotel->minrate['cur']; ?></span> Tax incl.<br>
<strong>Breakfast : </strong><?= $hotel->breakfast; ?>
</span></div>
<a href="<?= $hotel->hotellink2; ?>" class="linkdetail">Book</a>
<a href="http://www.R24DB.com/xml/extrafunction/R24reviews.php?h=<?php echo $attr;?>&p=<?= $partner;?>" class="linkdetail">Reviews</a>
<?php if ($hotel->promote != '') { ?>
<span class="recommend"><?php echo $hotel->promote; ?></span>
<?php } ?>
</li>

<?php } /* foreach */ ?>
</ul>
</div>

<div>
<input name="pgfirst" id="pgfirst" type="button" value="first page">
<input name="pgprev" id="pgprev" type="button" value="prev. page">
<input name="pgnext" id="pgnext" type="button" value="next page" style=" font-weight:bold">
<input name="pglast" id="pglast" type="button" value="last page"></div>

</div>
<br>


<script type="text/javascript">
var mod_objid;
function onload_R24hotellist1navi(objid)
{ var p;
mod_objid = document.getElementById(objid);
if (p = document.getElementById('pgfirst')) p.onclick=function(){ mod_objid.scrollTop = 0; return false }
if (p = document.getElementById('pgprev')) p.onclick=function(){ mod_objid.scrollTop -= 500; return false }
if (p = document.getElementById('pgnext')) p.onclick=function(){ mod_objid.scrollTop += 500; return false }
if (p = document.getElementById('pglast')) p.onclick=function(){ mod_objid.scrollTop = mod_objid.scrollHeight; return false }
}
onload_R24hotellist1navi('modhotellist1navi');
</script>

<!----- End Hotel list area ----->


<!----- Start Hotel Advertising Area ----->
<iframe id="R24frame" name="R24frame" src="http://www.r24db.com/xml/R24dbroller.php?r=<?php echo $region; ?>&p=<?php echo $partner; ?>" frameborder="0" style="border:0; margin:0; height:145px; width:760px"></iframe>
<!----- End Hotel Advertising Area ----->
</div>
<div style="clear:both"></div>



<!----- Start footer page area ----->
<ul class="menutop" style="margin-top:20px">
<li><a href="#">Home</a></li>
<li><a href="krabi.php">Krabi Hotels</a></li>
<li><a href="kohphangan.php">Kohphangan Hotels</a></li>
<li><a href="kohtao.php">Kohtao Hotels</a></li>
<li><a href="kohchang.php">Kohchang Hotels</a></li>
<li><a href="kanchanaburi.php">Kanchanaburi Hotels</a></li>
</ul>
<p style="padding:20px">===  Booking Hotel ===</p>
<!----- End footer page area ----->

</div>

</body>
</html>

				