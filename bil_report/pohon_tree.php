<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/trans/");
#define("FileName", "loadbillpon_job_control.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");

$dbConn = new clsDBConn();
?>
<html>
<head>
    <title>AKUN</title>
    <link href="../Styles/StyleMENU.css" type="text/css" rel="stylesheet" />
    <style>
	/* Style for tree item text */
	.t0i {
		font-family: Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif;
		font-size: 10px;
		color: #FFFFFF;
		background-color: #313E4D;
		text-decoration: none;
	}
	/* Style for tree item image */
	.t0im {
		border: 0px;
		width: 18px;
		height: 16px;
	}
	/* Style for overmouse item text */
	.t0iMO {
		font-family: Tahoma, Verdana, Geneva, Arial, Helvetica, sans-serif;
		font-size: 10px;
		color: silver;
		background-color: #313E4D;
		text-decoration: none;
	}
</style>
</head>
<body style="COLOR: #FFFFFF; BACKGROUND-COLOR: #313E4D" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<?php
	//$queryApp = "select code from p_application where p_application_id=".$_GET["P_APPLICATION_ID"];
	//$dbConn->query($queryApp);
	//$dbConn->next_record();
	//$appCode = $dbConn->f("code");
	$id = CCGetFromGet("INPUT_DATA_CONTROL_ID","");
	$query = "SELECT -1, LEVEL, JOB_CODE, NULL, JOB_CONTROL_ID, nvl(PARENT_ID,0) PARENT_ID "
             ."FROM JOB_CONTROL "
             ."WHERE INPUT_DATA_CONTROL_ID = ".$id." "
             ."CONNECT BY PRIOR JOB_CONTROL_ID = PARENT_ID "
             ."START WITH PARENT_ID IS NULL";
	//echo ($query);
	$dbConn->query($query);
	
?>
    <table height="100%" cellspacing="0" width="100%" border="0">
        <tbody>
            <tr>
                <td class="CobaltHeaderTD" style="COLOR: #FFFFFF; BACKGROUND-COLOR: #313E4D">
                    &nbsp;<strong>KONTROL</strong></td>
            </tr>
            <tr>
                <td style="COLOR: #FFFFFF; BACKGROUND-COLOR: #313E4D" valign="top" height="100%">
                    <script language="JavaScript" src="../js/white_tree.js"></script>
                    <script language="JavaScript">

var tree_tpl = {
	'target'  : 'framesTarget',	// name of the frame links will be opened in
				// other possible values are: _blank, _parent, _search, _self and _top
	'icon_e'  : '../images/empty.gif', // empty IMAGES
	'icon_l'  : '../images/line.gif',  // vertical line

	'icon_48' : '../images/base.gif',   // root icon normal
	'icon_52' : '../images/base.gif',   // root icon selected
	'icon_56' : '../images/base.gif',   // root icon opened
	'icon_60' : '../images/base.gif',   // root icon selected

	'icon_16' : '../images/folder.gif', // node icon normal
	'icon_20' : '../images/folderopen.gif', // node icon selected
	'icon_24' : '../images/folder.gif', // node icon opened
	'icon_28' : '../images/folderopen.gif', // node icon selected opened

	'icon_0'  : '../images/page.gif', // leaf icon normal
	'icon_4'  : '../images/page.gif', // leaf icon selected
	'icon_8'  : '../images/page.gif', // leaf icon opened
	'icon_12' : '../images/page.gif', // leaf icon selected

	'icon_2'  : '../images/joinbottom.gif', // junction for leaf
	'icon_3'  : '../images/join.gif',       // junction for last leaf
	'icon_18' : '../images/plusbottom.gif', // junction for closed node
	'icon_19' : '../images/plus.gif',       // junctioin for last closed node
	'icon_26' : '../images/minusbottom.gif',// junction for opened node
	'icon_27' : '../images/minus.gif'       // junctioin for last opended node

};


var TREE_ITEMS =
 [
  ['HOME', 'javascript:return false;'
  <?php
	$PLevel= array (-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,);
	$level = 0;
	$bdmnid = 0;
	$nplevel = 0;
	$parid = 0;
	$status = " ";
	while ($dbConn->next_record()) {
		if ($dbConn->f("JOB_CONTROL_ID")!=$bdmnid) {
			$bdmnid=$dbConn->f("JOB_CONTROL_ID");
			$parid= $dbConn->f("PARENT_ID");
			//echo($parid);
			//echo(":");
			//echo($level);
			//echo(":");
			//echo($PLevel[$level]);
			//echo(":");
			
			if ($parid==$PLevel[$level]) {
				echo "]," . chr(13);
				$status = "0";
			} else {
				if ($parid==$nplevel) {
					echo "," . chr(13);
					$level=$level+1;
					$PLevel[$level]=$parid;
					$status = "1";
				} else {
					echo "]," . chr(13);
					$status = "3";
					while ($PLevel[$level]!=$parid && $level>0) {
						echo "]," . chr(13);
						$level=$level-1;
						$status = "4";
					}
				}
			}    
			
			
			if ($parid == $nplevel)
			{
			   $nplevel = $bdmnid ;
			}
			else
			{
			   $nplevel = $dbConn->f("PARENT_ID");
			}
			
			//$nplevel = $dbConn->f("LEVEL");
			$fileName = "../trans/control_job_idc.php";
			echo "['" . $dbConn->f("JOB_CODE") ;
			if ($fileName=="") {
				echo "',''";
			} else {
				
				//echo "','sip_open.php?NAMAPHP=" . $fileName . "&P_APP_MENU_ID=" . $dbConnTwo->f("p_menu_id")."'";
				//echo "','control_job_idc.php?PARENT_ID=".$dbConn->f("PARENT_ID")."&INPUT_DATA_CONTROL_ID=".$id."&JOB_CONTROL_ID=".$dbConn->f("JOB_CONTROL_ID")."'";
				echo "','selected_job.php?PARENT_ID=".$dbConn->f("PARENT_ID")."&INPUT_DATA_CONTROL_ID=".$id."&JOB_CONTROL_ID=".$dbConn->f("JOB_CONTROL_ID")."'";
			}
			
		}
	}
	while ($level>0) {
		echo "]," . chr(13);
		$level=$level-1;
	}
?>
  ],
 ];

 new tree (TREE_ITEMS, tree_tpl);

</script>
</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
