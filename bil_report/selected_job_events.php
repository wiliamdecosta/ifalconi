<?php
//BindEvents Method @1-0A2600AD
function BindEvents()
{
    global $V_T_JOB_CONTROL;
    global $CCSEvents;
    $V_T_JOB_CONTROL->IS_VERIFIED->CCSEvents["BeforeShow"] = "V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow";
    $V_T_JOB_CONTROL->IS_VALID->CCSEvents["BeforeShow"] = "V_T_JOB_CONTROL_IS_VALID_BeforeShow";
    $V_T_JOB_CONTROL->IS_CANCELLED->CCSEvents["BeforeShow"] = "V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow";
    $V_T_JOB_CONTROL->CCSEvents["BeforeShow"] = "V_T_JOB_CONTROL_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
}
//End BindEvents Method

//V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow @33-3C5B3E15
function V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow(& $sender)
{
    $V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_T_JOB_CONTROL; //Compatibility
//End V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow

//Custom Code @40-2A29BDB7
// -------------------------
    // Write your own code here.
	if ($V_T_JOB_CONTROL->IS_VERIFIED->GetValue() == "Y")
		$V_T_JOB_CONTROL->IS_VERIFIED->SetValue("YES");
	else 
		$V_T_JOB_CONTROL->IS_VERIFIED->SetValue("NO");
// -------------------------
//End Custom Code

//Close V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow @33-7A204A03
    return $V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow;
}
//End Close V_T_JOB_CONTROL_IS_VERIFIED_BeforeShow

//V_T_JOB_CONTROL_IS_VALID_BeforeShow @34-48B12181
function V_T_JOB_CONTROL_IS_VALID_BeforeShow(& $sender)
{
    $V_T_JOB_CONTROL_IS_VALID_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_T_JOB_CONTROL; //Compatibility
//End V_T_JOB_CONTROL_IS_VALID_BeforeShow

//Custom Code @42-2A29BDB7
// -------------------------
    // Write your own code here.
	if ($V_T_JOB_CONTROL->IS_VALID->GetValue() == "Y")
		$V_T_JOB_CONTROL->IS_VALID->SetValue("YES");
	else 
		$V_T_JOB_CONTROL->IS_VALID->SetValue("NO");
// -------------------------
//End Custom Code

//Close V_T_JOB_CONTROL_IS_VALID_BeforeShow @34-50A8232C
    return $V_T_JOB_CONTROL_IS_VALID_BeforeShow;
}
//End Close V_T_JOB_CONTROL_IS_VALID_BeforeShow

//V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow @35-093C542C
function V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow(& $sender)
{
    $V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_T_JOB_CONTROL; //Compatibility
//End V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow

//Custom Code @41-2A29BDB7
// -------------------------
    // Write your own code here.
	if ($V_T_JOB_CONTROL->IS_CANCELLED->GetValue() == "Y")
		$V_T_JOB_CONTROL->IS_CANCELLED>SetValue("YES");
	else 
		$V_T_JOB_CONTROL->IS_CANCELLED->SetValue("NO");
// -------------------------
//End Custom Code

//Close V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow @35-04213868
    return $V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow;
}
//End Close V_T_JOB_CONTROL_IS_CANCELLED_BeforeShow

//V_T_JOB_CONTROL_BeforeShow @2-1712AB8E
function V_T_JOB_CONTROL_BeforeShow(& $sender)
{
    $V_T_JOB_CONTROL_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $V_T_JOB_CONTROL; //Compatibility
//End V_T_JOB_CONTROL_BeforeShow

//Custom Code @27-2A29BDB7
// -------------------------
    // Write your own code here.
	$id = CCGetFromGet("JOB_CONTROL_ID","");
	$id2 = CCGetFromGet("INPUT_DATA_CONTROL_ID","");

    $V_T_JOB_CONTROL->btnSubmit->SetValue("<input class='Button' type='button' name='btnSubmit' value='SUBMIT JOB' onclick='javascript:runjob();'>");
	$V_T_JOB_CONTROL->btnCancel->SetValue("<input class='Button' type='button' name='btnSubmit' value='CANCEL PROCESS' onclick='javascript:runcancel();'>");
	$V_T_JOB_CONTROL->btnForce->SetValue("<input class='Button' type='button' name='btnSubmit' value='FORCE SCHEDULER' onclick='javascript:runfs();'>");
	$V_T_JOB_CONTROL->lblLOG->SetValue("<input class='Button' type='button' name='btnSubmit' value='PROCESS LOG' onclick='javascript:runLOG(". $id . "," . $id2 .");'>");
	
// -------------------------
//End Custom Code

//Close V_T_JOB_CONTROL_BeforeShow @2-D6C0F022
    return $V_T_JOB_CONTROL_BeforeShow;
}
//End Close V_T_JOB_CONTROL_BeforeShow

//Page_BeforeShow @1-4E725D78
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $selected_job; //Compatibility
//End Page_BeforeShow

//Custom Code @28-2A29BDB7
// -------------------------
    // Write your own code here.
	
    global $V_T_JOB_CONTROL;
	$batch_id = CCGetFromGet("INPUT_DATA_CONTROL_ID","") ;

    if (CCGetFromGet("runjob","")== "Y")
	{
       if ($batch_id== "")
	   {
         ?>
			<script language="javascript">
				alert("Batch data belum diisi atau belum dipilih. Klik tab batch data, kemudian tekan tombol tambah ");
			    document.location='javascript:history.back(0);';
			</script>
		 <?
	   }
	 
       $DBConn = new clsDBConn();

	   ///select from input_data_control a, p_reference_list b where a.INPUT_DATA_CLASS_ID = b.P_REFERENCE_LIST_ID AND A.INPUT_DATA_CONTROL_ID = $batch_id;
	   
       $SQL = "SELECT F_SUBMIT_JOB ('LOAD_ACCRUE', :BATCH_ID, 'ADMIN') as HASIL FROM DUAL";
	   $DBConn->bind("BATCH_ID",$batch_id,50);
       $DBConn->query($SQL);
	   //echo ($SQL);
       while ($DBConn->next_record()) 
	    { if ($DBConn->f("HASIL") == 0)
		  {
		      //$DBConn->close();
			  ?>
              <script language="javascript">
				alert("Proses submit berhasil ");
			    document.location='javascript:history.back(0);';
			  </script>
			  <?
		  }
	    }
       $DBConn->close();
	}
	
	$batch_form_id = $V_T_JOB_CONTROL->INPUT_DATA_CONTROL_ID->GetValue();
	//echo ($batch_form_id);	
	if (CCGetFromGet("runcancel","")== "Y")
	{
	   $job_ctl_id = CCGetFromGet("JOB_CONTROL_ID","");
       if ($job_ctl_id== "")
	   {
         ?>
			<script language="javascript">
				alert("Job control yang akan di batalkan belum dipilih . Klik panel daftar job, pilih, lalu tekan tombol cancel ");
			    //location.href = "accrue_job_ctl_main.php?BATCH_CONTROL_ID=<?=$batch_id?>&JOB_CONTROL_ID=<?=$job_ctl_id?>";
				document.location='javascript:history.back(0);';
			</script>
		 <?
	   }

       $DBConn = new clsDBConn();
	   
       /*
	   $SQL = "BEGIN PKG_ACCRUE_DATA.P_CANCEL_GEN_DATA ("
				. " :XIN_JOB_ID, "
		      	. " :USER_NAME, "
		      	. " :XIN_RESULT_NO, "
		      	. " :XIN_RESULT_MSG);"
				. " END;";

	   $DBConn->bind("XIN_DATA_ID", CCGetParam("T_WS_DATA_ID",""), 4000);
       $DBConn->bind("USER_NAME", CCGetParam("T_WS_FLOW_ID",""), 4000);
       $DBConn->bind("XIN_RESULT_NO", "", 4000);
       $DBConn->bind("XIN_RESULT_MSG", "", 4000); 
       $DBConn->query($SQL);

	   $hasil = $DBConn->f("XIN_RESULT_MSG");
	   $hasil_code = $DBConn->f("XIN_RESULT_NO");
       $DBConn->close();
	   */

	   $SQL = "SELECT F_SUBMIT_JOB ('CANCEL_ACCRUE', :BATCH_ID, 'ADMIN', NULL, NULL) as HASIL FROM DUAL";
	   $DBConn->bind("INPUT_DATA_CONTROL_ID",$batch_form_id,50);
       $DBConn->query($SQL);
	   while ($DBConn->next_record()){	
	   $hasil = $DBConn->f("HASIL");
	   }	
       if ($hasil == 0)
	   {
	   		?>
              <script language="javascript">
				alert("Proses cancel berhasil ");
				document.location='javascript:history.back(0);';
			    //location.href = "accrue_job_ctl_main.php?BATCH_CONTROL_ID=<?=$batch_id?>";
			  </script>
	   		<?
	   }
	   else
	   {
            ?>
			 <script language="javascript">
				alert("Proses gagal dengan kode error : <?=$hasil_code?>" );
				document.location='javascript:history.back(0);';
			    //location.href = "accrue_job_ctl_main.php?BATCH_CONTROL_ID=<?=$batch_id?>";
			  </script>
			<?
	   }
	    
       
	}

	if (CCGetFromGet("runfs","")== "Y")
	{
	   $DBConn = new clsDBConn();
	   $SQL = "SELECT FORCE_SCHEDULER FROM DUAL";
       $DBConn->query($SQL);
	}
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
