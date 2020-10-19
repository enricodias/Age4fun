<?php
/*
+--------------------------------------------------------------------------
|   D-Upload Mod 1.1
|   =======================================================
|   By Dean
|   © 2003-2004 Dean
|   Web: http://www.dscripting.com
|   Email: dean@dscripting.com
|   =======================================================
|   Help From: Ed
|   Email: ed@nbsdesignz.com
+--------------------------------------------------------------------------
*/

$upload = new upload;

class upload
{
	var $html;
	var $output   = "";
	var $base_url = "";
	var $nav;
  
	function upload()
	{
		global $ibforums, $DB, $std, $print, $HTTP_POST_FILES;
		
		$this->base_url = "{$ibforums->vars['board_url']}";

		$this->nav = array( "<a href='".$this->base_url."/index.php?act=upload'>Upload</a>" );
	
		$this->output .= "<div align='center' class='tableborder'>
		<table class='tablepad' width='100%'><tr><td class='row1'><br>";
		
		if (!isset($ibforums->input['Upload']))
		{
			if ($ibforums->member['mgroup'] == $ibforums->vars['admin_group'])
			{
				$f2u = $ibforums->vars['upload_adminurl'];
			}
			else
			{
				$f2u = $ibforums->vars['upload_memurl'];
			}
			
	    	$exts = $ibforums->vars['upload_extallowed'];
				
			$this->output .= "<form enctype='multipart/form-data' action='{$ibforums->base_url}&act=upload' method='post'>
			<input type='hidden' name='MAX_FILE_SIZE' value='{$ibforums->vars['upload_mfs']}'>
			Enviando arquivos para:&nbsp; <small>{$f2u}</small><p>
			Arquivo 1:&nbsp;&nbsp;<input type='file' name='f2upload1' class='forminput'><br>
			Arquivo 2:&nbsp;&nbsp;<input type='file' name='f2upload2' class='forminput'><br>
			Arquivo 3:&nbsp;&nbsp;<input type='file' name='f2upload3' class='forminput'><br>
			<input type='submit' name='Upload' value='Upload' class='forminput'></form><p>
			Extenções permitidas: {$exts}";
		}
		else
		{
			############################################################
			# copy the temp file to the desired location on the server #
			############################################################

			if ($ibforums->member['mgroup'] == $ibforums->vars['admin_group'])
			{						
				$aup_dir = $ibforums->vars['upload_admindir'];
				$mfs = $ibforums->vars['upload_mfs'];
						
				if (!empty($HTTP_POST_FILES['f2upload1']['name']))
				{
					$arealname1 = $HTTP_POST_FILES['f2upload1']['name'];
					
					if (file_exists($aup_dir.$arealname1))
					{
						$this->output .= "O arquivo: <b>{$arealname1}</b> já existe!<br>";
					}
					else
					{
						$sn1 = preg_replace( "/[^\w\.]/", "_", $arealname1 );
						$ext1 = strrchr($sn1,'.');
						$ext1 = strtolower($ext1);
						
						if ($ibforums->vars['upload_extallowed'])
						{
							if (@copy($HTTP_POST_FILES['f2upload1']['tmp_name'], $aup_dir.$arealname1))
							{
								@chmod($aup_dir.$arealname1, 0755);
								if (filesize($aup_dir.$arealname1) > $mfs)
								{
									$this->output .= "O arquivo: <b>{$arealname1}</b> é grande de mais!<br>";
									@unlink($aup_dir.$arealname1);
								}
								else
								{
									$this->output .= "O arquivo: <b>{$arealname1}</b> foi enviado!<br>";
									unset($ibforums->input['Upload']);
								}
							}
							else
							{
								$this->output .= "O arquivo: <b>{$arealname1}</b> foi eviado!<br>";       // não foi
								unset($ibforums->input['Upload']);
							}
						}
						else
						{
							$this->output .= "Extenção inválida.<br>";
	    				}
					}
				}
						
				if (!empty($HTTP_POST_FILES['f2upload2']['name']))
				{
					$arealname2 = $HTTP_POST_FILES['f2upload2']['name'];
						
					if (file_exists($aup_dir.$arealname2))
					{
						$this->output .= "O arquivo: <b>{$arealname2}</b> já existe!<br>";
					}
					else
					{
						$sn2 = preg_replace( "/[^\w\.]/", "_", $arealname2 );
						$ext2 = strrchr($sn2,'.');
						$ext2 = strtolower($ext2);
						
						if (in_array($ext2, $ibforums->vars['upload_extallowed']))
						{
							if (@copy($HTTP_POST_FILES['f2upload2']['tmp_name'], $aup_dir.$arealname2))
							{
								@chmod($aup_dir.$arealname2, 0755);
								if (filesize($aup_dir.$arealname2) > $mfs)
								{
         $this->output .= "O arquivo: <b>{$arealname2}</b> é grande de mais!<br>";
									@unlink($aup_dir.$arealname2);
								}
								else
								{
									$this->output .= "O arquivo: <b>{$arealname2}</b> foi enviado!<br>";
									unset($ibforums->input['Upload']);
								}
							}
							else
							{
								$this->output .= "O arquivo: <b>{$arealname2}</b> foi anviado!<br>";    // nao foi
								unset($ibforums->input['Upload']);
							}
						}
						else
						{
							$this->output .= "Extenção inválida!<br>";
	    				}
					}
				}
						
				if (!empty($HTTP_POST_FILES['f2upload3']['name']))
				{
					$arealname3 = $HTTP_POST_FILES['f2upload3']['name'];
						
					if (file_exists($aup_dir.$arealname3))
					{
						$this->output .= "O arquivo: <b>{$arealname3}</b> já existe!<br>";
					}
					else
					{
						$sn3 = preg_replace( "/[^\w\.]/", "_", $arealname3 );
						$ext3 = strrchr($sn3,'.');
						$ext3 = strtolower($ext3);
						
						if (in_array($ext3, $ibforums->vars['upload_extallowed']))
						{
							if (@copy($HTTP_POST_FILES['f2upload3']['tmp_name'], $aup_dir.$arealname3))
							{
								@chmod($aup_dir.$arealname3, 0755);
								if (filesize($aup_dir.$arealname3) > $mfs)
								{
									$this->output .= "O arquivo: <b>{$arealname3}</b> é grande de mais!<br>";
									@unlink($aup_dir.$arealname3);
								}
								else
								{
									$this->output .= "O arquivo: <b>{$arealname3}</b> foi enviado!<br>";
									unset($ibforums->input['Upload']);
								}
							}
							else
							{
								$this->output .= "O arquivo: <b>{$arealname3}</b> foi enviado!<br>";   //não foi
								unset($ibforums->input['Upload']);
							}
						}
						else
						{
							$this->output .= "Extenção inválida!<br>";
	    				}
					}
				}

				$this->output .= "<a href='{$ibforums->base_url}&act=upload'>Voltar</a><br>";
			}
			else
			{						
				$mup_dir = $ibforums->vars['upload_memdir'];
				$mfs = $ibforums->vars['upload_mfs'];
	    		
	    		if (!empty($HTTP_POST_FILES['f2upload1']['name']))
				{
					$mrealname1 = $HTTP_POST_FILES['f2upload1']['name'];

					if (file_exists($mup_dir.$mrealname1))
					{
						$this->output .= "O arquivo: <b>{$mrealname1}</b> já existe!<br>";
					}
					else
					{
						$sn1 = preg_replace( "/[^\w\.]/", "_", $mrealname1 );
						$ext1 = strrchr($sn1,'.');
						$ext1 = strtolower($ext1);
						
   //   if (in_array($ext1, $ibforums->vars['upload_extallowed']))
						{
							if (@copy($HTTP_POST_FILES['f2upload1']['tmp_name'], $mup_dir.$mrealname1))
							{
								@chmod($mup_dir.$mrealname1, 0755);
								if (filesize($mup_dir.$mrealname1) > $mfs)
								{
									$this->output .= "O arquivo: <b>{$mrealname1}</b> é grande de mais!<br>";
									@unlink($mup_dir.$mrealname1);
								}
								else
								{
									$this->output .= "O arquivo: <b>{$mrealname1}</b> foi enviado!<br>";
									unset($ibforums->input['Upload']);
								}
							}
							else
							{
								$this->output .= "O arquivo: <b>{$mrealname1}</b> foi enviado!<br>";     // Não foi
								unset($ibforums->input['Upload']);
							}
						}
  //    else
//						{
	//						$this->output .= "Extenção inválida!<br>";
	//   				}
					}
				}
				
				if (!empty($HTTP_POST_FILES['f2upload2']['name']))
				{
					$mrealname2 = $HTTP_POST_FILES['f2upload2']['name'];

					if (file_exists($mup_dir.$mrealname2))
					{
						$this->output .= "O arquivo: <b>{$mrealname2}</b> já existe!<br>";
					}
					else
					{
						$sn2 = preg_replace( "/[^\w\.]/", "_", $mrealname2 );
						$ext2 = strrchr($sn2,'.');
						$ext2 = strtolower($ext2);
						
						if (in_array($ext2, $ibforums->vars['upload_extallowed']))
						{
							if (@copy($HTTP_POST_FILES['f2upload2']['tmp_name'], $mup_dir.$mrealname2))
							{
								@chmod($mup_dir.$mrealname2, 0755);
								if (filesize($mup_dir.$mrealname2) > $mfs)
								{
									$this->output .= "O arquivo: <b>{$mrealname2}</b> é grande de mais!<br>";
									@unlink($mup_dir.$mrealname2);
								}
								else
								{
									$this->output .= "O arquivo: <b>{$mrealname2}</b> fou enviado!<br>";
									unset($ibforums->input['Upload']);
								}
							}
							else
							{
								$this->output .= "O arquivo: <b>{$mrealname2}</b> foi enviado!<br>";   // Não foi
								unset($ibforums->input['Upload']);
							}
						}
						else
						{
							$this->output .= "Extenção inválida!<br>";
	    				}
					}
				}
						
				if (!empty($HTTP_POST_FILES['f2upload3']['name']))
				{
					$mrealname3 = $HTTP_POST_FILES['f2upload3']['name'];

					if (file_exists($mup_dir.$mrealname3))
					{
						$this->output .= "O arquivo: <b>{$mrealname3}</b> já existe!<br>";
					}
					else
					{
						$sn3 = preg_replace( "/[^\w\.]/", "_", $mrealname3 );
						$ext3 = strrchr($sn3,'.');
						$ext3 = strtolower($ext3);
						
						if (in_array($ext3, $ibforums->vars['upload_extallowed']))
						{
							if (@copy($HTTP_POST_FILES['f2upload3']['tmp_name'], $mup_dir.$mrealname3))
							{
								@chmod($mup_dir.$mrealname3, 0755);
								if (filesize($mup_dir.$mrealname3) > $mfs)
								{
									$this->output .= "O arquivo: <b>{$mrealname3}</b> é grande de mais!<br>";
									@unlink($mup_dir.$mrealname3);
								}
								else
								{
									$this->output .= "O arquivo: <b>{$mrealname3}</b> foi enviado!<br>";
									unset($ibforums->input['Upload']);
								}
							}
							else
							{
								$this->output .= "O arquivo: <b>{$mrealname3}</b> foi enviado!<br>";      // Não foi
								unset($ibforums->input['Upload']);
							}
						}
						else
						{
							$this->output .= "Extenção inválida!<br>";
	    				}
					}
				}
						
				$this->output .= "<a href='{$ibforums->base_url}&act=upload'>Voltar</a><br>";
			}
		}
    		
		if ($ibforums->member['mgroup'] == $ibforums->vars['admin_group'])
		{
			$f2u = $ibforums->vars['upload_adminurl'];
		}
		else
		{
			$f2u = $ibforums->vars['upload_memurl'];
		}
		
		$this->output .= "<br><br></td></tr></table></div><center>Todos os arquivos teram o seginte endereço: {$f2u}SeuArquivo</center><br>
         <p><br><div align='center'>D-Upload Mod 1.1<br>
    	Created By: <a href='http://www.age4fun.com'>Age4fun.com</a>";

        $print->add_output("$this->output");
    	
    	$print->do_output( array( 'TITLE' => $ibforums->vars['board_name']." -> Upload" , 'JS' => 0, 'NAV' => $this->nav ) );
    }
}
?>
