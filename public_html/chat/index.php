<?



ob_start();



?>



<html>



<head>



<title>Age4Chat - O Bate Papo do Age4fun</title>



<link rel="stylesheet" href="main.css" type="text/css">



<script language=JavaScript>



function ImgOver(valor)



{



	document.princ.img.src = 'caretas/'+valor+'.gif';



	document.princ.careta.value = valor;



}



</script>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../text.css" rel="stylesheet" type="text/css">

</head>



<body background="http://www.age4fun.com/home/arquivos/00001.jpg">
<center>



  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">

    <tr> 
      <td height="20" align="center" valign="middle">
<table width="75%" height="85" border="0">
          <tr>
            <td background="http://www.age4fun.com/home/arquivos/00003.jpg"><img src="http://www.age4fun.com/home/arquivos/00024.jpg"></td>
          </tr>
        </table>
        
      </td>



    </tr>



  </table>



  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">

    <tr> 



      <td><p align="center"> 



        <?



		if(isset($_GET["msg"])){



		   echo $_GET["msg"];



		}



	?></p>



        <div align="center">



          <table width="220" border="1" cellspacing="0" cellpadding="0" bordercolor="#990000">
            <form  method="POST" action="entra.php?time=<?=time();?>" name="princ" target="_blank">



            <tr> 



              <td> <table width="230" cellpadding=0 cellspacing=3 class="text">

                    <tr> 



                      <td width="80" height="25" class="style_menu">Nome: </td>



                      <td height="25" colspan="2" align=right> 

                        <p align=left> 



                          <input name=apelido class="style_forms" value="" size=20 maxlength="20">



                        </p></td>



                  </tr>



                  <tr> 



                      <td width="80" height="25" class="style_menu">Cor do nick: 

                      </td>



                      <td width="84" height="25" align=right> 

                        <div align="left"> 



						<select name=cor size=1 class="style_forms2">



						<option value='#000000' style='color: #000000;' selected>Preto</option>



						<option value='#FF0000' style='color: #FF0000;' >Vermelho</option>



						<option value='#00B038' style='color: #00B038;' >Verde</option>



						<option value='#324395' style='color: #324395;' >Azul</option>



						<option value='#E7651A' style='color: #E7651A;' >Laranja</option>



						<option value='#737373' style='color: #737373;' >Cinza</option>



						<option value='#993399' style='color: #993399;' >Roxo</option>



						</select>



                        </div></td>



                      <td width="52" height="25" align=center valign="middle"> 

                        <div align="justify">



                          <input type="image" border="0" name="imageField" src="entrar.gif">

                        </div></td>



                  </tr>



                    <tr> 

                      <td colspan="3" class="style_menu"> 

                        <div align="center">Careta:<br>

                          <img src="caretas/69.gif" name="img"></div>



                      <input type="hidden" name="careta" value="69"> </td>



                  </tr>



                </table></td>



            </tr>



          </form>



        </table>



		</div>



      </td>



    </tr>



    <tr> 



      <td align="center" valign="top"><br>



        Caso queira, escolha uma careta.<br> <br> 



        <? include "caretas.php"; ?>



        <br> </td>



    </tr>



    <tr align="center" valign="middle"> 



      <td height="20">&nbsp;</td>



    </tr>



  </table>



</center>



</body>



</html>



<?



ob_end_flush();



?>



