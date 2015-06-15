<?php
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
define("FileName", "menu.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");

$dbConn = new clsDBConn();
$dbConnTwo = new clsDBConn();

?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="../Styles/hms/Style_doctype.css1">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="../images/tab_back_top.gif">
<?php
        $query = "select * from p_user where p_user_id=" . CCGetUserID();
	$dbConn->query($query);
	$dbConn->next_record();
?>

<form>
<table style="text-align: left; height:100%; width: 100%; color:#000040; font-size:10pt; font-family:Tahoma; font-weight:bold" 
      border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td nowrap>&nbsp;</td>
    <td id="tdtoup" style="display:"><img onclick="javascript:SetHeadOFF()" border="0" src="../images/to_up_black.gif"></td>
    <td id="tdtodown" style="display:none"><img onclick="javascript:SetHeadON()" border="0" src="../images/to_down_black.gif"></td>
      <td nowrap>&nbsp;&nbsp;</td>
      <td width="100%" style="text-align:left" nowrap>You are login as :&nbsp;<?php echo $dbConn->f("user_id"); ?>&nbsp;(<? echo $dbConn->f("user_name"); ?>)&nbsp;&nbsp;<label style="color:#ff0000; display:none" onclick = "javascript:logout();" alt="Logout"><b>Logout</b>&nbsp;</td>
      <td style="text-align:right"><img border="0" src="../images/logout.gif" onclick = "javascript:logout();" alt="Logout"></td>
      <td nowrap>&nbsp;</td>
    </tr>
</table>
</form>

<?php
	$dbConn->close();
?>

</body>

<SCRIPT LANGUAGE="JavaScript">

function logout()
{
  if (confirm("are you sure to logout?")==1)
  {
     top.ttop.location.href="../main/logout.php";
  }
}

function SetHeadON()
{
  if (parent.document.getElementById('UTAMAD')!=null) {
     document.getElementById("tdtoup").style.display="";
     document.getElementById("tdtodown").style.display="none";
     parent.document.getElementById('UTAMAD').setAttribute('rows', '50,25,*,20');
  }

}

function SetHeadOFF()
{
  if (parent.document.getElementById('UTAMAD')!=null) {
     document.getElementById("tdtoup").style.display="none";
     document.getElementById("tdtodown").style.display="";
//     parent.document.getElementById('UTAMAD').setAttribute('rows', '1,25,*,20');
     parent.document.getElementById('UTAMAD').setAttribute('rows', '1,25,*,20');
  }
}

</script>
</html>
