<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<style type="text/css">
#divUp{position:absolute; left:30; top:40}
#divDown{position:absolute; left:30; top:30}
#divCont{position:absolute; width:100; height:330; overflow:hidden; top:35; left:30; clip:rect(0,100,330,0); visibility:hidden}
#divText{position:absolute; top:0; left:0}
</style>
<script language="javascript">
<!--
function checkBrowser(){
this.ver=navigator.appVersion
this.dom=document.getElementById?1:0
this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom)?1:0;
this.ie4=(document.all && !this.dom)?1:0;
this.ns5=(this.dom && parseInt(this.ver) >= 5) ?1:0;
this.ns4=(document.layers && !this.dom)?1:0;
this.bw=(this.ie5 || this.ie4 || this.ns4 || this.ns5)
return this
}
bw=new checkBrowser()

var speed=50

var loop, timer

function makeObj(obj,nest){
   nest=(!nest) ? '':'document.'+nest+'.'
this.el=bw.dom?document.getElementById(obj):bw.ie4?document.all[obj]:bw.ns4?eval(nest+'document.'+obj):0;
  this.css=bw.dom?document.getElementById(obj).style:bw.ie4?document.all[obj].style:bw.ns4?eval(nest+'document.'+obj):0;
this.scrollHeight=bw.ns4?this.css.document.height:this.el.offsetHeight
this.clipHeight=bw.ns4?this.css.clip.height:this.el.offsetHeight
this.up=goUp;this.down=goDown;
this.moveIt=moveIt; this.x; this.y;
   this.obj = obj + "Object"
   eval(this.obj + "=this")
   return this
}
function moveIt(x,y){
this.x=x;this.y=y
this.css.left=this.x
this.css.top=this.y
}

function goDown(move){
if(this.y>-this.scrollHeight+oCont.clipHeight){
 this.moveIt(0,this.y-move)
  if(loop) setTimeout(this.obj+".down("+move+")",speed)
}
}
function goUp(move){
if(this.y<0){
 this.moveIt(0,this.y-move)
 if(loop) setTimeout(this.obj+".up("+move+")",speed)
}
}

function scroll(speed){
if(loaded){
 loop=true;
 if(speed>0) oScroll.down(speed)
 else oScroll.up(speed)
}
}

function noScroll(){
loop=false
if(timer) clearTimeout(timer)
}

var loaded;
function scrollInit(){
oCont=new makeObj('divCont')
oScroll=new makeObj('divText','divCont')
oScroll.moveIt(0,0)
oCont.css.visibility='visible'
loaded=true;
}

onload=scrollInit;
//-->
</script>
<title>Menu Fotos</title>
</head>
<body background="http://www.age4fun.com/home/arquivos/00009.jpg">
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "config.php";
$sql2 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo2 = mysql_fetch_array($sql2)) {
?>
<body bgcolor="#<? echo $campo2[7]; ?>" topmargin="0" leftmargin="0">
<body>
<div id="divUp">
&nbsp;</div>
<div id="divDown">
     &nbsp;</div>
<div id="divCont">
     <div id="divText">
       <font face="Tahoma, Arial" size="2">

<p align="left"><font face="Verdana" size="2" color="#FFFFFF">&nbsp; </font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face="Verdana" color="#FFFFFF"><b>
<?
$sql = mysql_query("SELECT * FROM `$tabela3` ORDER BY ID DESC", $db3);
$n3 = mysql_num_rows($sql);
if($n3 == '0') {
echo "<center><font face=verdana size=1><br><br><b> Sem nenhuma Foto</b></font></center><br><BR>";
} else {
while($campo = mysql_fetch_array($sql)) {
echo "<center><a href='foto.php?foto=$campo[0]' target='principal'><img src='fotos/$campo[3]' width='100' height='75' border='0' style='border: 1 solid #000000'></a><br><font face='Verdana' size='2' color='$campo2[9]'>$campo[2]</font><br><br></center>";
}
}
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?></font></b>


       </b>


       </font>
       <b>
       <font face="Verdana" size="1" color="#FFFFFF">


<p align="left" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">
 
      
 
       </font>
  </p>



       </div>
</div>
</body>

<p align="left">
<font face="Verdana" color="#FFFFFF" size="2">&nbsp;&nbsp; </font><a href="#" onmouseover="scroll(-7)" onmouseout="noScroll()"><img src="cima.gif" alt="" border="0" width="32" height="28"></a><font face="Verdana" color="#FFFFFF" size="2"> </font>
<font face="Verdana" color="#FFFFFF" size="2">&nbsp; </font>
<font face="Verdana" color="#FFFFFF">Fotos</font><font face="Verdana" color="#FFFFFF" size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;</font><font face="Verdana" size="2" color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></p>

<p align="left">&nbsp;</p>

<p align="left">&nbsp;</p>

<p align="left">&nbsp;</p>

<p align="left">&nbsp;</p>

<p align="left">&nbsp;</p>

<p align="left">&nbsp;</p>

<p align="left">
  &nbsp;</p>



<p align="left">
  &nbsp;</p>



<p align="left">
&nbsp;&nbsp;
     <a href="#" onmouseover="scroll(7)" onmouseout="noScroll()">
     <img src="baixo.gif" alt="" border="0" width="32" height="28"></a></b></p>



       </body>

</html>