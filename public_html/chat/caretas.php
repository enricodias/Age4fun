<table width="250" border="0" cellspacing="0" cellpadding="0">
  <?
for($i=1;$i < 70 ;$i++){
   if(($i%10) == 1){
      echo "<tr>";
   }
?>
  <td height="30" width="30"><div align="center"><a href="#" onclick = "ImgOver('<?=$i;?>')"><img src="caretas/<?=$i;?>.gif" border="0"></a></div></td> 
    <?
   if(($i%10) == 0){
      echo "</tr>";
   }
}
?> 
</table>
