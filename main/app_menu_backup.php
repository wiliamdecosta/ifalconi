<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
define("FileName", "menu.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");

   if ($_SESSION["UserName"]=="") 
   {
     exit;
   } 

$dbConn = new clsDBConn();
$dbConnTwo = new clsDBConn();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
<title>CCBS</title>
<link href="../images/ccbs.ico" rel="shortcut icon" />
<link href="../styles/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../styles/dd.ultimate.css" media="screen" rel="stylesheet" type="text/css" />

<script language="JavaScript">
function autoResizeFrame(){
    var myHeight=650;
    var myWidth=950;

    if( typeof( window.innerWidth ) == 'number' ) {
      //Non-IE
      myWidth = window.innerWidth;
      myHeight = window.innerHeight;
    } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
      //IE 6+ in 'standards compliant mode'
      myWidth = document.documentElement.clientWidth;
      myHeight = document.documentElement.clientHeight;
    } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
      //IE 4 compatible
      myWidth = document.body.clientWidth;
      myHeight = document.body.clientHeight;
    }

    myWidth  = myWidth-7;
    myHeight = myHeight-118;
    document.getElementById('phpform').height= (myHeight) ;
    document.getElementById('phpform').width= (myWidth) ;
}


function logout()
{
  if (confirm("Are you sure to logout?")==1)
  {
     top.ttop.location.href="../main/logout.php";
  }
}


</script>
<script language="JavaScript" type="text/javascript">
window.onload = autoResizeFrame; 
window.onresize = autoResizeFrame; 
</script>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="background: url(../imgmenu/back.gif)">
  <tr>
    <td><img border="0" src="../imgmenu/1x26.gif"></td>
    
    <td width="100%" valign="top">

<ul id="nav" class="dropdown dropdown-horizontal"  >
  <li class="top"><a href="../main/module.php" target="modul">HOME</a></li>


<?php

	$p_application_id = $_GET["p_application_id"];

        $isdamin=0;
        
        if (CCGetUserID()==1) $isadmin=1;
        $dbConn__ = new clsDBConn();
        $dbConn__->query("select count(*) jml from p_user_role where p_role_id=1 and p_user_id=" . CCGetUserID());
        if ($dbConn__->next_record() )
        {
           if ($dbConn__->f("jml")>0) $isadmin=1;
        }
        $dbConn__->close();


if ($isadmin==1) {
	$queryMenu = "select p_menu_id as p_menu_id, nvl (parent_id, 0) parent_id, menu menu, file_name, description, listing_no "
			."from (select p_menu_id, parent_id, code as menu, nvl (nullif(file_name,'-'), '#') as file_name,"
			."	description, listing_no "
			."	from p_menu "
			."	where is_active = 'Y' "
			."	and p_application_id = ".$p_application_id." "
			." start with parent_id is null connect by prior p_menu_id = parent_id order siblings by nvl(listing_no, 9999))";
} else {    
	$queryMenu = "select p_menu_id as p_menu_id, nvl (parent_id, 0) parent_id, menu menu, file_name, description, listing_no "
			."from (select p_menu_id, parent_id, code as menu, nvl (nullif(file_name,'-'), '#') as file_name,"
			."	description, listing_no "
			."	from p_menu "
			."	where is_active = 'Y' "
			."	and p_application_id = ".$p_application_id." "
			."	and p_menu_id in ( "
			."	select rm.p_menu_id "
			."	from p_role_menu rm, p_user_role ur, p_user u "
			."	where rm.p_role_id = ur.p_role_id "
			."	and ur.p_user_id = u.p_user_id "
			."	and ur.p_user_id = " . CCGetUserID() . ") "
			." start with parent_id is null connect by prior p_menu_id = parent_id order siblings by nvl(listing_no, 9999))";
}			
			
// die($queryMenu);
// echo($queryMenu);
          
		
	$dbConnTwo->query($queryMenu);


	
						$PLevel= array (-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,);
						$level = 0;
						$bdmnid = 0;
						$nplevel = -1;
						$parid = 0;
						$menuname="";
						$filename="~";
						  
						while ($dbConnTwo->next_record()) {
							
							if ($dbConnTwo->f("p_menu_id")!=$bdmnid) {
								$parid= $dbConnTwo->f("parent_id");

                                if ($filename!="~") {
						          if ($filename=="#") {
						          	 if ($parid==$bdmnid) {
						        	   echo "<a href='#' class='dir'>" ;
						          	 } else {
						        	   echo "<a href='#'>" ;
						        	 }
						        	
						          }else{
						        	echo "<a target='phpform' href='../" . $filename . "'>" ;
						          }
						        
						          echo $menuname . "</a>" ;
						        

								if ($parid==$PLevel[$level]) {
									echo "</li>" ;
								} else {
									if ($parid==$nplevel && $nplevel>=0) {
									    echo "<ul>";
										$level=$level+1;
										$PLevel[$level]=$parid;
									} else {
										while ($PLevel[$level]!=$parid && $level>0) {
									        echo "</li></ul>";
											$level=$level-1;
										}
										echo "</li>";
									}
								}

                                }

								$nplevel = $dbConnTwo->f("p_menu_id");
						        
						        if ($parid==0) {
						        	echo "<li class='top'>" ;
						        }else{
						        	echo "<li>" ;
						        }

								$bdmnid=$dbConnTwo->f("p_menu_id");
						        $menuname=$dbConnTwo->f("menu");
						        $filename=$dbConnTwo->f("file_name");
						        
							}
							
						}
						
						
                                if ($filename!="~") {
						          if ($filename=="#") {
						          	 if ($parid==$bdmnid) {
						        	   echo "<a href='#' class='dir'>" ;
						          	 } else {
						        	   echo "<a href='#'>" ;
						        	 }
						        	
						          }else{
						        	echo "<a target='phpform' href='../" . $filename . "'>" ;
						          }
						        
						          echo $menuname . "</a>" ;
						        

								if ($parid==$PLevel[$level]) {
									echo "</li>";
								} else {
									if ($parid==$nplevel && $nplevel>=0) {
									    echo "<ul>";
										$level=$level+1;
										$PLevel[$level]=$parid;
									} else {
										while ($PLevel[$level]!=$parid && $level>0) {
									        echo "</li></ul>";
											$level=$level-1;
										}
										echo "</li>";
									}
								}


                                }

						

	$dbConn->close();
	$dbConnTwo->close();
	//echo($queryMenu);		

    $_SESSION["MODULID"]=$p_application_id;
		
?>
	
</ul>    

    </td> 
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><iframe style="border:0px" id="phpform" src="blank.html" frameborder="0" name="phpform" align="center"></iframe></td>
  </tr>
</table>
</body>
</html>

