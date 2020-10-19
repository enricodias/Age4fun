<html>
<head>
<script language="JavaScript">
   function playsound (som){
      if(navigator.userAgent.indexOf("MSIE") != -1){
         document.write('<bgsound src=som/'+som+'.wav loop=1>');
      }else{
         document.write('<embed src=som/'+som+'.wav loop=1 autostart=true>');
      }
   }

   function rolar(){
      scrollTo(0,100000);
   }
</script>
</head>
<body bgcolor="#C0C0C0">
   <table>
      <tr>
         <td id="corpo"></td>
      </tr>
   </table>
   <table>
      <tr>
         <td id="alma"></td>
      </tr>
   </table>
</body>
</html>