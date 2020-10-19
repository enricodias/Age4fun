<? include("path.php");?><body background="http://www.age4fun.com/home/arquivos/00001.jpg">
<input type="hidden" value="<? echo $evento?>" name="teste">
<table border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td align="left" colspan="2"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong><span style="text-transform: uppercase"><font size="<? echo $ttitulo?>"><? echo "$evento";?></font></span></strong><br>
     <? echo "$data";?>  -  <? echo "$local";?></font><br> 
     <HR width="100%" size="1" noshade color="<? echo $cortexto?>"></td>
 </tr>
 <tr> 
    <td width="240" valign="top">
<iframe width="280" height="400" frameborder="0" marginheight="0" marginwidth="0" name="fotos" scrolling="no" src="fotos.php?dir=<? echo $dir?>"></iframe></td>
    <td width="356" valign="top"> 
      <iframe width="410" height="400" frameborder="0" marginheight="0" marginwidth="0" name="exibe_foto" scrolling="no" src="zoom.php?dir=<? echo $dir?>&foto=<? echo $foto?>&evento=<? echo "$evento";?>&data=<? echo $data?>&local=<? echo $local?>"></iframe></td>
 </tr>
</table>