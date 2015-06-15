<script language="javascript">
if (window == top) top.location.href = "index.php";
</script>
<html>
<head>
    <title>CCBS</title>
</head>
<frameset id="UTAMAD" border="0" framespacing="0" rows="50,25,*,20" frameborder="0">
    <frame name="head" src="main/header.html?<?php echo time(); ?>" noresize="noresize" scrolling="no" />
    <frame name="info" src="main/infouser.php?<?php echo time(); ?>" noresize="noresize" scrolling="no" />
    <frame id="modul" name="modul" src="main/module.php?<?php echo time(); ?>" noresize="noresize" scrolling="yws" />
    <frame name="foot" src="main/footer.html?<?php echo time(); ?>" noresize="noresize" scrolling="no" />
    <noframes>
        <body>
            <p>
                This page uses frames, but your browser doesn't support them. 
            </p>
        </body>
    </noframes>
</frameset>
</html>
