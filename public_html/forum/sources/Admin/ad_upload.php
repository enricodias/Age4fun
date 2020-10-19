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

$idx = new ad_upload();

class ad_upload
{
	var $base_url;

	function ad_upload()
	{
		global $IN, $root_path, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP, $ibforums;
		$this->base_url = $INFO['board_url']."/admin.".$INFO['php_ext']."?adsess=".$IN['AD_SESS'];

		switch($IN['code']) {
			case '01':
				$this->config();
				break;
			case '02':
				$this->save_config();
				break;
			//-------------------------
			case '03':
				$this->filemanager();
				break;
			case '04':
				$this->multidelete();
				break;
			case '05':
				$this->deletefile();
				break;
			case '06':
				$this->chmodfile();
				break;	
			//-------------------------
			default:
				$this->filemanager();
				break;
		}
	}
	
	//+---------------------------------------------------------------------------------
	// Configuration
	//+---------------------------------------------------------------------------------

	function config() {
		global $IN, $root_path, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP;
									     
		//+-------------------------------
		$SKIN->td_header[] = array( "Description" , "60%" );
		$SKIN->td_header[] = array( "Option"      , "40%" );
		//+-------------------------------
		
		$exts = "";
        foreach( $INFO['upload_extallowed'] as $value)
        {
            $exts .= $value."|";
        }
        $exts = substr($exts ,0 ,-1);
        
        $ADMIN->page_detail = "Edit your configuration for the file uploads";
		$ADMIN->page_title  = "Configuration";
		
		$ADMIN->html .= $SKIN->start_form( array( 1 => array( 'code' , '02'     ),
												  2 => array( 'act'  , 'upload' ),
									     )      );
		
	
		$ADMIN->html .= $SKIN->start_table( "Configuration" );
											    
		$ADMIN->html .= $SKIN->add_td_row( array( "<b>Max file size for uploading</b>" ,
												  $SKIN->form_input("upload_mfs", $INFO['upload_mfs'],"text")
											    )		);

		$ADMIN->html .= $SKIN->add_td_row( array( "<b>Guests able to upload files</b>" ,
												  $SKIN->form_yes_no("upload_guests", $INFO['upload_guests']),
											    )		);

		$ADMIN->html .= $SKIN->add_td_row( array( "<b>Directory Path to upload admin files to</b>" ,
												  $SKIN->form_input("upload_admindir", $INFO['upload_admindir'],"text")
											    )		);

		$ADMIN->html .= $SKIN->add_td_row( array( "<b>Directory Path to upload member files to</b>" ,
												  $SKIN->form_input("upload_memdir", $INFO['upload_memdir'],"text")
											    )		);

		$ADMIN->html .= $SKIN->add_td_row( array( "<b>URL to admin uploaded files</b>" ,
												  $SKIN->form_input("upload_adminurl", $INFO['upload_adminurl'],"text"),
											    )		);

		$ADMIN->html .= $SKIN->add_td_row( array( "<b>URL to members uploaded files</b>" ,
												  $SKIN->form_input("upload_memurl", $INFO['upload_memurl'],"text"),
											    )		);
											    
		$ADMIN->html .= $SKIN->add_td_row( array( "<b>Allowed file extensions for uploaded files?</b><br><small>Must be seperated by '|' (Ex: .gif|.zip)</small>" ,
												  $SKIN->form_input("upload_extallowed", $exts, "text"),
											    )		);

		$ADMIN->html .= $SKIN->end_table();
		
		$ADMIN->html .= $SKIN->end_form("Save");
		
		$ADMIN->output();

	}
	
	function save_config()
	{
		global $IN, $root_path, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP, $HTTP_POST_VARS;
		
		$a = preg_replace( "/&#124;/", "|", stripslashes($HTTP_POST_VARS['upload_extallowed']) );
		$a = explode("|", $a);
		$ab = "";
		foreach($a as $v)
		{
			$ab .= "'".strtolower($v)."', ";
		}
		$ab = substr($ab ,0 ,-2);
		
		$cs = array();
		$cs['upload_extallowed']	= "array($ab);";
		$cs['upload_mfs']			= $IN['upload_mfs'];
		$cs['upload_guests']		= $IN['upload_guests'];
		$cs['upload_admindir']		= $IN['upload_admindir'];
		$cs['upload_adminurl']		= $IN['upload_adminurl'];
		$cs['upload_memdir']		= $IN['upload_memdir'];
		$cs['upload_memurl']		= $IN['upload_memurl'];

		require $root_path.'conf_global.php';

		foreach( $cs as $k => $v )
		{		
			$v = preg_replace( "/'/", "\\'" , $v );
			$v = preg_replace( "/\r/", ""   , $v );
			
			$INFO[ $k ] = $v;
		}	

		@rename( ROOT_PATH.'conf_global.php', ROOT_PATH.'conf_global-bak.php' );
		@chmod( ROOT_PATH.'conf_global-bak.php', 0777);
		
		ksort($INFO);
		
		$file_string = "<?php\n";
		
		foreach( $INFO as $k => $v )
		{
			if ($k == 'skin' or $k == 'languages')
			{
				// Protect serailized arrays..
				$v = stripslashes($v);
				$v = addslashes($v);
			}
			
			if ($k == 'upload_extallowed')
			{
				$v = stripslashes($v);
				$file_string .= '$INFO['."'".$k."'".']'."\t\t\t=\t".$v."\n";
			}
			else
			{
				$file_string .= '$INFO['."'".$k."'".']'."\t\t\t=\t'".$v."';\n";
			}
		}
		
		$file_string .= "\n".'?'.'>';
		
		if ( $fh = fopen( $root_path.'conf_global.php', 'w' ) )
		{
			fwrite($fh, $file_string, strlen($file_string) );
			fclose($fh);
		}
		else
		{
			$ADMIN->error("Fatal Error: Could not open conf_global for writing - no changes applied. Try changing the CHMOD to 0777");
		}

		$std->boink_it("{$SKIN->base_url}&act=upload&code=01");
	}

  	//+---------------------------------------------------------------------------------
	// Main Shoutbox Adminstration Screen
	//+---------------------------------------------------------------------------------

	function filemanager() {
		global $IN, $root_path, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP;

		if (!$IN['fview'])
		{
			$IN['fview'] = 'm';
		}
		
		$ADMIN->page_title = "File Manager";
		$ADMIN->page_detail = "This is your file manager to manage the uploaded files to your server.";
				
		//+-------------------------------
		$SKIN->td_header[] = array( "File Name"   , "25%" );
		$SKIN->td_header[] = array( "File Size"   , "20%" );
		$SKIN->td_header[] = array( "CHMOD"       , "10%" );
		$SKIN->td_header[] = array( "Options &nbsp; <input type='checkbox' name='sall' value='sall' onclick='SA()'>"   , "30%" );
		$SKIN->td_header[] = array( "Change CHMOD" , "15%" );
		//+-------------------------------
		
		$ADMIN->html .= $SKIN->start_form( array( 1 => array( 'code'  , '04'         ),
												  2 => array( 'act'   , 'upload'     ),
												  3 => array( 'fview' , $IN['fview'] ),
									     )      );

		$ADMIN->html .= "<script language='Javascript'>
						 function SA(v)
						 {
						 	for (var i=0;i<document.theAdminForm.elements.length;i++)
						 	{
						 		var e = document.theAdminForm.elements[i];
						 		if(e.type=='checkbox')
						 		{
						 			e.checked = document.all.sall.checked;
						 		}
						 	}
						 }
						 function dochmod(file, cmv)
						 {
						 	window.location = '{$SKIN->base_url}&act=upload&code=06&fview={$IN['fview']}&cmfile='+file+'&cmv='+cmv;
						 }
						 </script>";
		
		if ($IN['fview'] == 'a')
		{
			$ADMIN->html .= $SKIN->start_table( "File Manager -> Admin Files" );
		
			$handle = opendir($INFO['upload_admindir']);
			while ($file = readdir($handle))
			{
				if ($file != "." || $file == "..")
				{
					if ($file == "." || $file != "..")
					{
						$fs = $this->file_size(filesize($INFO['upload_admindir'].$file));
						$fc = $this->chmod_value($INFO['upload_admindir'].$file);
						$num++;
						$ADMIN->html .= $SKIN->add_td_row( array( "<center>{$file}</center>",
																  "<center>{$fs}</center>",
																  "<center>{$fc}</center>",
																  "<center><input type='button' value='Delete' id='button' onclick=\"window.location='{$SKIN->base_url}&act=upload&fview=a&code=05&file={$file}'\"> <input type='checkbox' name='afile_{$file}' value='afile_{$file}' class='forminput'>",
																  "<center><input type='text' name='cmv_{$num}' size='3' maxlength='3' class='textinput'> <input type='button' value='Change' id='button' onclick=\"dochmod('{$file}', document.all.cmv_{$num}.value)\">"														 )		);
					}
				}
			}
			
			$ADMIN->html .= $SKIN->end_table();
		
			$ADMIN->html .= $SKIN->end_form("Delete Selected") . "<input type='button' value='View Member Files' id='button' onclick=\"window.location='{$SKIN->base_url}&act=upload&code=03&fview=m'\"></div>";
		}
		else if ($IN['fview'] == 'm')
		{
			$ADMIN->html .= $SKIN->start_table( "File Manager -> Member Files" );
		
			$handle = opendir($INFO['upload_memdir']);
			while($file = readdir($handle))
			{
				if (($file != ".") || ($file == ".."))
				{				
					if (($file == ".") || ($file != ".."))
					{
						$fs = $this->file_size(filesize($INFO['upload_memdir'].$file));
						$fc = $this->chmod_value($INFO['upload_memdir'].$file);
						$num++;
						$ADMIN->html .= $SKIN->add_td_row( array( "<center>{$file}</center>",
																  "<center>{$fs}</center>",
																  "<center>{$fc}</center>",
																  "<center><input type='button' value='Delete' id='button' onclick=\"window.location='{$SKIN->base_url}&act=upload&fview=m&code=05&file={$file}'\"> <input type='checkbox' name='file_{$file}' value='file_{$file}' class='forminput'>",
																  "<center><input type='text' name='cmv_{$num}' size='3' maxlength='3' class='textinput'> <input type='button' value='Change' id='button' onclick=\"dochmod('{$file}', document.all.cmv_{$num}.value)\">"
														 )		);
					}
				}
			}
			
			$ADMIN->html .= $SKIN->end_table();
		
			$ADMIN->html .= $SKIN->end_form("Delete Selected") . "<input type='button' value='View Admin Files' id='button' onclick=\"window.location='{$SKIN->base_url}&act=upload&code=03&fview=a'\"></div>";
		}

		$ADMIN->output();
		
	}
	
	//+---------------------------------------------------------------------------------
	// Delete Multiple Files
	//+---------------------------------------------------------------------------------
	
	function multidelete()
	{
		global $IN, $root_path, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP, $HTTP_POST_VARS;

		if ($IN['fview'] == 'a')
		{
			foreach ($IN as $key => $value)
 			{
 				if( preg_match( "#^afile_(\S+)$#", $key, $match ) )
 				{
 					$file = preg_replace( "#(.+?)_(.+?)#", "\\1.\\2", $match[1] );
 					if (file_exists($INFO['upload_admindir'].$file))
 					{
 						@unlink($INFO['upload_admindir'].$file);
 					}
 				}
 			}

			$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=a");
			exit();
		}
 		else if ($IN['fview'] == 'm')
 		{
			foreach ($IN as $key => $value)
 			{
 				if( preg_match( "#^file_(\S+)$#", $key, $match ) )
 				{
 					$file = preg_replace( "#(.+?)_(.+?)#", "\\1.\\2", $match[1] );
 					if (file_exists($INFO['upload_memdir'].$file))
 					{
 						@unlink($INFO['upload_memdir'].$file);
 					}
 				}
 			}

			$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=m");
			exit();
		}
		else
		{
			$std->boink_it("{$SKIN->base_url}&act=upload");
			exit();
		}
 	}
	
	//+---------------------------------------------------------------------------------
	// Delete A File
	//+---------------------------------------------------------------------------------
	
	function deletefile()
	{
		global $IN, $root_path, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP, $HTTP_POST_VARS;

		if ($IN['fview'] == 'a')
		{
			$file = $IN['file'];
			if (file_exists($INFO['upload_admindir'].$file))
			{
				@unlink($INFO['upload_admindir'].$file);
				$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=a");
			}
			else
			{
				$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=a");
			}
		}
		else if ($IN['fview'] == 'm')
		{
			$file = $IN['file'];
			if (file_exists($INFO['upload_memdir'].$file))
			{
				@unlink($INFO['upload_memdir'].$file);
				$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=m");
			}
			else
			{
				$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=m");
			}
		}
		else
		{
			$std->boink_it("{$SKIN->base_url}&act=upload");
			exit();
		}
 	}
 	
	//+---------------------------------------------------------------------------------
	// CHMOD A File
	//+---------------------------------------------------------------------------------
	
	function chmodfile()
	{
		global $IN, $root_path, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP, $HTTP_POST_VARS;
		
		if ($IN['fview'] == 'a')
		{
			$file = $IN['cmfile'];
			$chmod = $IN['cmv'];
			if (file_exists($INFO['upload_admindir'].$file))
			{
				@chmod($INFO['upload_admindir'].$file, octdec($chmod));
			}
			
			$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=a");
		}
		else if ($IN['fview'] == 'm')
		{
			$file = $IN['cmfile'];
			$chmod = $IN['cmv'];
			if (file_exists($INFO['upload_memdir'].$file))
			{
				@chmod($INFO['upload_memdir'].$file, octdec($chmod));
			}

			$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=m");
		}
		else
		{
			$std->boink_it("{$SKIN->base_url}&act=upload&code=03&fview=m");
			exit();
		}
	}
 	
 	//+---------------------------------------------------------------------------------
	// Saves Config To File
	//+---------------------------------------------------------------------------------
	
	function save_configer( $new )
	{
		global $IN, $INFO, $DB, $SKIN, $ADMIN, $std, $MEMBER, $GROUP, $HTTP_POST_VARS;
		
		$master = array();
		
		if ( is_array($new) )
		{
			if ( count($new) > 0 )
			{
				foreach( $new as $field )
				{
					if ($field == 'img_ext' or $field == 'avatar_ext' or $field == 'photo_ext')
					{
						$HTTP_POST_VARS[ $field ] = preg_replace( "/[\.\s]/", "" , $HTTP_POST_VARS[ $field ] );
						$HTTP_POST_VARS[ $field ] = str_replace('|', "&#124;", $HTTP_POST_VARS[ $field ]);
						$HTTP_POST_VARS[ $field ] = preg_replace( "/,/"     , '|', $HTTP_POST_VARS[ $field ] );
					}
					else if ($field == 'coppa_address')
					{
						$HTTP_POST_VARS[ $field ] = nl2br( $HTTP_POST_VARS[ $field ] );
					}
					
					if ( $field == 'gd_font' OR $field == 'html_dir' OR $field == 'upload_dir')
					{
						$HTTP_POST_VARS[ $field ] = preg_replace( "/'/", "&#39;", $HTTP_POST_VARS[ $field ] );
					}
					else
					{
						$HTTP_POST_VARS[ $field ] = preg_replace( "/'/", "&#39;", stripslashes($HTTP_POST_VARS[ $field ]) );
					}
					
					$master[ $field ] = stripslashes($HTTP_POST_VARS[ $field ]);
				}
				$ADMIN->rebuild_config($master);
			}
		}
		
		$std->boink_it("{$SKIN->base_url}&act=upload&code=01");
	}
	
	function chmod_value($file)
	{
		$mode = fileperms($file);
		$mode &= 0x1ff;

		$chmod = sprintf("%o", $mode);

		return $chmod;
	}

	function file_size($filesize)
	{
		if ($filesize >= 1073741824)
		{
			$filesize = round($filesize / 1073741824 * 100) / 100 . " Gb";
		}
		else if ($filesize >= 1048576)
		{
			$filesize = round($filesize / 1048576 * 100) / 100 . " Mb";
		}
		else if ($filesize >= 1024)
		{
			$filesize = round($filesize / 1024 * 100) / 100 . " Kb";
		}
		else
		{
			$filesize = $filesize . " Bytes";
		}

		return $filesize;
	}

}
?>