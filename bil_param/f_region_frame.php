<html>
<head>
    <title>MENU</title>
</head>
<?
	//echo 'p_region_level_tree.php?PARENT_ID='. $_GET["P_REGIONID"] .'&PARENT_CODE=&P_REGION_LEVEL_ID='. ($_GET["P_REGION_LEVEL_ID"]+1) .'&_REGION_NAME='. $_GET["_REGION_NAME"] .'&s_keyword='. $_GET["s_keyword"] .'&P_REGIONGridPage='. $_GET["P_REGIONGridPage"];
	//exit;
?>
<frameset framespacing="1" frameborder="0" cols=*,200>
    <frame name="mnmain" id="mnmain" src="p_region_level_tree.php?PARENT_ID=0&P_REGION_LEVEL_ID=1">
    <frame name="mntree" src="f_region.php">
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them.
            </p>
        </body>
    </noframes>
</frameset>
</html>
