<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "f_region.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");

$dbConn = new clsDBConn();
?>
<html>
<head>
    <title>REGION TREE</title>
    <link href="../Styles/trb/layout.css" type="text/css" rel="stylesheet"/>
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
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table border="0" cellspacing="0" cellpadding="0" width="100%" style="BACKGROUND-COLOR: #89a5f7">
  <tr>
    <td><img border="0" src="../images/tab_back.gif"></td>
    <td width="100%" background="../images/tab_back.gif">&nbsp;</td>
  </tr>
</table>
<?php
	
	//$queryApp = "SELECT REGION_NAME FROM P_REGION a, P_REGION_LEVEL b WHERE a.P_REGION_LEVEL_ID = b.P_REGION_LEVEL_ID and a.P_REGION_LEVEL_ID = (" .$_GET["P_REGION_LEVEL_ID"]. ") AND a.P_REGION_ID=".$_GET["P_REGIONID"];
	
	/*$dbConn->query($queryApp);
	$dbConn->next_record();
	$appCode = $dbConn->f("REGION_NAME");
	
	$query = "SELECT P_REGION_ID, NVL (PARENT_ID, 0) PARENT_ID, MENU "
			 . "FROM (SELECT P_REGION_ID,"
                    . "PARENT_ID,REGION_NAME MENU, "
                    . "DESCRIPTION FROM P_REGION "
					. "START WITH PARENT_ID IS NULL"
					. " CONNECT BY PRIOR P_REGION_ID = PARENT_ID "
					. "ORDER SIBLINGS BY NVL (PARENT_ID, 9999))";
	
	
	"SELECT p_menu_id p_menu_id, NVL (parent_id, 0) parent_id, menu, path_file_name, description "
		. "FROM (SELECT   p_menu_id, parent_id, code menu, NVL (file_name, '0') path_file_name, description, "
		. "listing_no FROM p_menu WHERE p_application_id = ".$_GET["P_APPLICATION_ID"]." "
		. "ORDER BY NVL (parent_id, 0), listing_no) x START WITH x.parent_id IS NULL "
		. "CONNECT BY PRIOR x.p_menu_id = x.parent_id ORDER SIBLINGS BY NVL (listing_no, 9999)";	
	$dbConn->query($query);*/
	function checkChild($id){
		$dbConnChild = new clsDBConn();
		$query = "select count(*) as jumlah from p_region where parent_id = ".$id;
		$dbConnChild->query($query);
		$dbConnChild->next_record();
		$jumlah = $dbConnChild->f('jumlah');
		if($jumlah > 0){
			return true;
		}else{
			return false;
		}
	}
	function getChild($id){
		$dbConnChild = new clsDBConn();
		$query = "select p_region_id, NVL (parent_id, 0) parent_id, "
			. "upper(REPLACE(region_name, '''', '`')) region_name, p_region_level_id"
			. " FROM p_region where parent_id =".$id;
		$dbConnChild->query($query);
		$items=array();
		while($dbConnChild->next_record()){
			$item['parent_id'] = $dbConnChild->f('parent_id');
			$item['p_region_id'] = $dbConnChild->f('p_region_id');
			$item['level_number'] = $dbConnChild->f('level_number');
			$item['region_name'] = $dbConnChild->f('region_name');
			$item['p_region_level_id'] = $dbConnChild->f('p_region_level_id');
			
			if(checkChild($item['p_region_id'])){
				$item['child'] = implode(",",getChild($item['p_region_id']));
				$prepared_item = "['".$item['region_name']."','p_region_level_tree.php?P_REGION_LEVEL_ID=".(((float)$item['p_region_level_id'])+1)."&s_keyword=". $_GET["s_keyword"] ."&PARENT_ID=".$item['p_region_id']."',".$item['child']."]";
			}else{
				$prepared_item = json_encode(array($item['region_name'],"p_region_level_tree.php?P_REGION_LEVEL_ID=".(((float)$item['p_region_level_id'])+1)."&PARENT_ID=".$item['p_region_id']."&s_keyword=". $_GET["s_keyword"]));
			}
			$items[] = $prepared_item;
		}
		return $items;
	}
	$query = "select max(reg_level.level_number)"
			. " FROM p_region left join p_region_level reg_level on reg_level.p_region_level_id = p_region.p_region_level_id";

	$dbConn->query($query);

	$query = "select p_region_id, NVL (parent_id, 0) parent_id, "
			. "upper(REPLACE(region_name, '''', '`')) region_name, p_region_level_id"
			. " FROM p_region where parent_id is null";

	$dbConn->query($query);
	
	$close=0;
	$items=array();
	while($dbConn->next_record()){
		$item['parent_id'] = $dbConn->f('parent_id');
		$item['p_region_id'] = $dbConn->f('p_region_id');
		$item['level_number'] = $dbConn->f('level_number');
		$item['region_name'] = $dbConn->f('region_name');
		$item['p_region_level_id'] = $dbConn->f('p_region_level_id');

		$itemString = "['".$dbConn->f('region_name')."','p_region_level_tree.php?P_REGION_LEVEL_ID=".(((float)$item['p_region_level_id'])+1)."&PARENT_ID=".$dbConn->f('p_region_id')."&s_keyword=". $_GET["s_keyword"] ."'";  //url_param parent negara
		if(checkChild($item['p_region_id'])){
			$item['child'] = getChild($item['p_region_id']);
			$itemString.= ",".implode(",",$item['child']);
		}
		$itemString.="]";
		$items[]=$itemString;
	}
?>
    <table height="100%" cellspacing="0" width="100%" border="0">
        <tbody>
            <tr>
                <td style="COLOR: #FFFFFF; BACKGROUND-COLOR: #313E4D" valign="top" height="100%">
                    <script language="JavaScript" src="../js/white_tree.js"></script>
                    <script language="JavaScript">

var tree_tpl = {
	'target'  : 'mnmain',	// name of the frame links will be opened in
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
  ['HOME (ROOT)', 'p_region_level_tree.php?PARENT_ID=0&P_REGION_LEVEL_ID=1',
  
<?php
	echo implode(",", $items);
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
