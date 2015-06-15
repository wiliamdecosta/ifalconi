<?php
//Include Common Files @1-5C4D2930
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "t_invoice.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridT_BILL2 { //T_BILL2 class @201-60DEB1FE

//Variables @201-AC1EDBB9

    // Public variables
    var $ComponentType = "Grid";
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $ErrorBlock;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $ForceIteration = false;
    var $HasRecord = false;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $RowNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";
    var $Attributes;

    // Grid Controls
    var $StaticControls;
    var $RowControls;
//End Variables

//Class_Initialize Event @201-031C12BE
    function clsGridT_BILL2($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "T_BILL2";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid T_BILL2";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsT_BILL2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->T_INVOICE_ID = & new clsControl(ccsLabel, "T_INVOICE_ID", "T_INVOICE_ID", ccsFloat, "", CCGetRequestParam("T_INVOICE_ID", ccsGet, NULL), $this);
        $this->INVOICE_NO = & new clsControl(ccsLabel, "INVOICE_NO", "INVOICE_NO", ccsText, "", CCGetRequestParam("INVOICE_NO", ccsGet, NULL), $this);
        $this->ADDRESS = & new clsControl(ccsLabel, "ADDRESS", "ADDRESS", ccsText, "", CCGetRequestParam("ADDRESS", ccsGet, NULL), $this);
        $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsLabel, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", ccsGet, NULL), $this);
        $this->INVOICE_DATE2 = & new clsControl(ccsLabel, "INVOICE_DATE2", "INVOICE_DATE2", ccsText, "", CCGetRequestParam("INVOICE_DATE2", ccsGet, NULL), $this);
        $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", ccsGet, NULL), $this);
        $this->NPWP = & new clsControl(ccsLabel, "NPWP", "NPWP", ccsText, "", CCGetRequestParam("NPWP", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "t_invoice.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "t_invoice.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @201-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @201-8EB8F569
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlINVOICE_DATE"] = CCGetFromGet("INVOICE_DATE", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["T_INVOICE_ID"] = $this->T_INVOICE_ID->Visible;
            $this->ControlsVisible["INVOICE_NO"] = $this->INVOICE_NO->Visible;
            $this->ControlsVisible["ADDRESS"] = $this->ADDRESS->Visible;
            $this->ControlsVisible["CUSTOMER_ACCOUNT_ID"] = $this->CUSTOMER_ACCOUNT_ID->Visible;
            $this->ControlsVisible["INVOICE_DATE2"] = $this->INVOICE_DATE2->Visible;
            $this->ControlsVisible["LAST_NAME"] = $this->LAST_NAME->Visible;
            $this->ControlsVisible["NPWP"] = $this->NPWP->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                if(!is_array($this->T_INVOICE_ID->Value) && !strlen($this->T_INVOICE_ID->Value) && $this->T_INVOICE_ID->Value !== false)
                    $this->T_INVOICE_ID->SetText(-99);
                $this->T_INVOICE_ID->SetValue($this->DataSource->T_INVOICE_ID->GetValue());
                $this->INVOICE_NO->SetValue($this->DataSource->INVOICE_NO->GetValue());
                $this->ADDRESS->SetValue($this->DataSource->ADDRESS->GetValue());
                $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                $this->INVOICE_DATE2->SetValue($this->DataSource->INVOICE_DATE2->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->NPWP->SetValue($this->DataSource->NPWP->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "T_INVOICE_ID", $this->DataSource->f("T_INVOICE_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "T_INVOICE_ID", $this->DataSource->f("T_INVOICE_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->T_INVOICE_ID->Show();
                $this->INVOICE_NO->Show();
                $this->ADDRESS->Show();
                $this->CUSTOMER_ACCOUNT_ID->Show();
                $this->INVOICE_DATE2->Show();
                $this->LAST_NAME->Show();
                $this->NPWP->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @201-064A6DC4
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->T_INVOICE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADDRESS->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_DATE2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LAST_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NPWP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End T_BILL2 Class @201-FCB6E20C

class clsT_BILL2DataSource extends clsDBConn {  //T_BILL2DataSource Class @201-08373293

//DataSource Variables @201-3DA5B8B3
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $T_INVOICE_ID;
    var $INVOICE_NO;
    var $ADDRESS;
    var $CUSTOMER_ACCOUNT_ID;
    var $INVOICE_DATE2;
    var $LAST_NAME;
    var $NPWP;
    var $DLink;
    var $ADLink;
//End DataSource Variables

//DataSourceClass_Initialize Event @201-EE8CADB4
    function clsT_BILL2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid T_BILL2";
        $this->Initialize();
        $this->T_INVOICE_ID = new clsField("T_INVOICE_ID", ccsFloat, "");
        
        $this->INVOICE_NO = new clsField("INVOICE_NO", ccsText, "");
        
        $this->ADDRESS = new clsField("ADDRESS", ccsText, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsFloat, "");
        
        $this->INVOICE_DATE2 = new clsField("INVOICE_DATE2", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->NPWP = new clsField("NPWP", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @201-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @201-B343CC71
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlINVOICE_DATE", ccsText, "", "", $this->Parameters["urlINVOICE_DATE"], "", false);
    }
//End Prepare Method

//Open Method @201-38751AA9
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT T_INVOICE_ID,\n" .
        "       INVOICE_NO,\n" .
        "       CUSTOMER_ACCOUNT_ID,\n" .
        "       ADDRESS,\n" .
        "       LAST_NAME,\n" .
        "       to_char(INVOICE_DATE,'dd-MON-yyyy') as INVOICE_DATE2,\n" .
        "       NPWP \n" .
        "FROM paytv.T_INVOICE \n" .
        "where  to_char(INVOICE_DATE,'dd-MON-yyyy') = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "') cnt";
        $this->SQL = "SELECT T_INVOICE_ID,\n" .
        "       INVOICE_NO,\n" .
        "       CUSTOMER_ACCOUNT_ID,\n" .
        "       ADDRESS,\n" .
        "       LAST_NAME,\n" .
        "       to_char(INVOICE_DATE,'dd-MON-yyyy') as INVOICE_DATE2,\n" .
        "       NPWP \n" .
        "FROM paytv.T_INVOICE \n" .
        "where  to_char(INVOICE_DATE,'dd-MON-yyyy') = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @201-04CE62A6
    function SetValues()
    {
        $this->T_INVOICE_ID->SetDBValue(trim($this->f("T_INVOICE_ID")));
        $this->INVOICE_NO->SetDBValue($this->f("INVOICE_NO"));
        $this->ADDRESS->SetDBValue($this->f("ADDRESS"));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue(trim($this->f("CUSTOMER_ACCOUNT_ID")));
        $this->INVOICE_DATE2->SetDBValue($this->f("INVOICE_DATE2"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->NPWP->SetDBValue($this->f("NPWP"));
        $this->DLink->SetDBValue($this->f("T_INVOICE_ID"));
        $this->ADLink->SetDBValue($this->f("T_INVOICE_ID"));
    }
//End SetValues Method

} //End T_BILL2DataSource Class @201-FCB6E20C

class clsGridV_T_DETAIL_BIL { //V_T_DETAIL_BIL class @225-91BCB96C

//Variables @225-AC1EDBB9

    // Public variables
    var $ComponentType = "Grid";
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $ErrorBlock;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $ForceIteration = false;
    var $HasRecord = false;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $RowNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";
    var $Attributes;

    // Grid Controls
    var $StaticControls;
    var $RowControls;
//End Variables

//Class_Initialize Event @225-A2EE3BA2
    function clsGridV_T_DETAIL_BIL($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_T_DETAIL_BIL";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_T_DETAIL_BIL";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_T_DETAIL_BILDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->T_LINE_INVOICE_ID = & new clsControl(ccsLabel, "T_LINE_INVOICE_ID", "T_LINE_INVOICE_ID", ccsFloat, "", CCGetRequestParam("T_LINE_INVOICE_ID", ccsGet, NULL), $this);
        $this->SERVICE_NO = & new clsControl(ccsLabel, "SERVICE_NO", "SERVICE_NO", ccsFloat, "", CCGetRequestParam("SERVICE_NO", ccsGet, NULL), $this);
        $this->DUE_DATE = & new clsControl(ccsLabel, "DUE_DATE", "DUE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("DUE_DATE", ccsGet, NULL), $this);
        $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", ccsGet, NULL), $this);
        $this->T_INVOICE_ID = & new clsControl(ccsHidden, "T_INVOICE_ID", "T_INVOICE_ID", ccsFloat, "", CCGetRequestParam("T_INVOICE_ID", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "t_invoice.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "t_invoice.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @225-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @225-D379D8F2
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlT_INVOICE_ID"] = CCGetFromGet("T_INVOICE_ID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["T_LINE_INVOICE_ID"] = $this->T_LINE_INVOICE_ID->Visible;
            $this->ControlsVisible["SERVICE_NO"] = $this->SERVICE_NO->Visible;
            $this->ControlsVisible["DUE_DATE"] = $this->DUE_DATE->Visible;
            $this->ControlsVisible["SERVICE_TYPE_CODE"] = $this->SERVICE_TYPE_CODE->Visible;
            $this->ControlsVisible["T_INVOICE_ID"] = $this->T_INVOICE_ID->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                if(!is_array($this->T_LINE_INVOICE_ID->Value) && !strlen($this->T_LINE_INVOICE_ID->Value) && $this->T_LINE_INVOICE_ID->Value !== false)
                    $this->T_LINE_INVOICE_ID->SetText(-99);
                if(!is_array($this->T_INVOICE_ID->Value) && !strlen($this->T_INVOICE_ID->Value) && $this->T_INVOICE_ID->Value !== false)
                    $this->T_INVOICE_ID->SetText(-99);
                $this->T_LINE_INVOICE_ID->SetValue($this->DataSource->T_LINE_INVOICE_ID->GetValue());
                $this->SERVICE_NO->SetValue($this->DataSource->SERVICE_NO->GetValue());
                $this->DUE_DATE->SetValue($this->DataSource->DUE_DATE->GetValue());
                $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                $this->T_INVOICE_ID->SetValue($this->DataSource->T_INVOICE_ID->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "T_LINE_INVOICE_ID", $this->DataSource->f("T_LINE_INVOICE_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "T_LINE_INVOICE_ID", $this->DataSource->f("T_LINE_INVOICE_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->T_LINE_INVOICE_ID->Show();
                $this->SERVICE_NO->Show();
                $this->DUE_DATE->Show();
                $this->SERVICE_TYPE_CODE->Show();
                $this->T_INVOICE_ID->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @225-75F7103B
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->T_LINE_INVOICE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DUE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->T_INVOICE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_T_DETAIL_BIL Class @225-FCB6E20C

class clsV_T_DETAIL_BILDataSource extends clsDBConn {  //V_T_DETAIL_BILDataSource Class @225-0BC52348

//DataSource Variables @225-CFE7D9E4
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $T_LINE_INVOICE_ID;
    var $SERVICE_NO;
    var $DUE_DATE;
    var $SERVICE_TYPE_CODE;
    var $T_INVOICE_ID;
    var $DLink;
    var $ADLink;
//End DataSource Variables

//DataSourceClass_Initialize Event @225-AE4B8E6C
    function clsV_T_DETAIL_BILDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_T_DETAIL_BIL";
        $this->Initialize();
        $this->T_LINE_INVOICE_ID = new clsField("T_LINE_INVOICE_ID", ccsFloat, "");
        
        $this->SERVICE_NO = new clsField("SERVICE_NO", ccsFloat, "");
        
        $this->DUE_DATE = new clsField("DUE_DATE", ccsDate, $this->DateFormat);
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        
        $this->T_INVOICE_ID = new clsField("T_INVOICE_ID", ccsFloat, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @225-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @225-D097935E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlT_INVOICE_ID", ccsFloat, "", "", $this->Parameters["urlT_INVOICE_ID"], -99, false);
    }
//End Prepare Method

//Open Method @225-1F058B71
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM paytv.t_line_invoice\n" .
        "where T_INVOICE_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM paytv.t_line_invoice\n" .
        "where T_INVOICE_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "\n" .
        "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @225-DF678AAD
    function SetValues()
    {
        $this->T_LINE_INVOICE_ID->SetDBValue(trim($this->f("T_LINE_INVOICE_ID")));
        $this->SERVICE_NO->SetDBValue(trim($this->f("SERVICE_NO")));
        $this->DUE_DATE->SetDBValue(trim($this->f("DUE_DATE")));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
        $this->T_INVOICE_ID->SetDBValue(trim($this->f("T_INVOICE_ID")));
        $this->DLink->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
        $this->ADLink->SetDBValue($this->f("INPUT_DATA_CONTROL_ID"));
    }
//End SetValues Method

} //End V_T_DETAIL_BILDataSource Class @225-FCB6E20C

class clsRecordp_customer_account { //p_customer_account Class @86-C09290F0

//Variables @86-D6FF3E86

    // Public variables
    var $ComponentType = "Record";
    var $ComponentName;
    var $Parent;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormEnctype;
    var $Visible;
    var $IsEmpty;

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode      = false;
    var $ds;
    var $DataSource;
    var $ValidatingControls;
    var $Controls;
    var $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @86-090F46FC
    function clsRecordp_customer_account($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_customer_account/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_customer_account";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->INVOICE_DATE = & new clsControl(ccsLabel, "INVOICE_DATE", "INVOICE_DATE", ccsText, "", CCGetRequestParam("INVOICE_DATE", $Method, NULL), $this);
            $this->FINANCE_PERIOD_CODE = & new clsControl(ccsLabel, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", $Method, NULL), $this);
            $this->invoice = & new clsControl(ccsHidden, "invoice", "invoice", ccsText, "", CCGetRequestParam("invoice", $Method, NULL), $this);
            $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsHidden, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsText, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", $Method, NULL), $this);
            $this->FINANCE_PERIOD_CODE2 = & new clsControl(ccsHidden, "FINANCE_PERIOD_CODE2", "FINANCE_PERIOD_CODE2", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE2", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @86-17762F87
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->invoice->Validate() && $Validation);
        $Validation = ($this->INPUT_DATA_CONTROL_ID->Validate() && $Validation);
        $Validation = ($this->FINANCE_PERIOD_CODE2->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->invoice->Errors->Count() == 0);
        $Validation =  $Validation && ($this->INPUT_DATA_CONTROL_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FINANCE_PERIOD_CODE2->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @86-D17D1DB0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->FINANCE_PERIOD_CODE->Errors->Count());
        $errors = ($errors || $this->invoice->Errors->Count());
        $errors = ($errors || $this->INPUT_DATA_CONTROL_ID->Errors->Count());
        $errors = ($errors || $this->FINANCE_PERIOD_CODE2->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @86-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @86-82225C24
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
    }
//End Operation Method

//Show Method @86-EAF35780
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->INVOICE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FINANCE_PERIOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->invoice->Errors->ToString());
            $Error = ComposeStrings($Error, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FINANCE_PERIOD_CODE2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->INVOICE_DATE->Show();
        $this->FINANCE_PERIOD_CODE->Show();
        $this->invoice->Show();
        $this->INPUT_DATA_CONTROL_ID->Show();
        $this->FINANCE_PERIOD_CODE2->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End p_customer_account Class @86-FCB6E20C



class clsGridVR_T_INVOICE_COMPONENT { //VR_T_INVOICE_COMPONENT class @238-ACF9F55F

//Variables @238-AC1EDBB9

    // Public variables
    var $ComponentType = "Grid";
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $ErrorBlock;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $ForceIteration = false;
    var $HasRecord = false;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $RowNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";
    var $Attributes;

    // Grid Controls
    var $StaticControls;
    var $RowControls;
//End Variables

//Class_Initialize Event @238-8B1C84AF
    function clsGridVR_T_INVOICE_COMPONENT($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "VR_T_INVOICE_COMPONENT";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid VR_T_INVOICE_COMPONENT";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsVR_T_INVOICE_COMPONENTDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->INV_COMP_CODE = & new clsControl(ccsLabel, "INV_COMP_CODE", "INV_COMP_CODE", ccsText, "", CCGetRequestParam("INV_COMP_CODE", ccsGet, NULL), $this);
        $this->CURRENCY_CODE = & new clsControl(ccsLabel, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", ccsGet, NULL), $this);
        $this->VAT_AMOUNT = & new clsControl(ccsLabel, "VAT_AMOUNT", "VAT_AMOUNT", ccsFloat, "", CCGetRequestParam("VAT_AMOUNT", ccsGet, NULL), $this);
        $this->CHARGE_AMOUNT = & new clsControl(ccsLabel, "CHARGE_AMOUNT", "CHARGE_AMOUNT", ccsFloat, "", CCGetRequestParam("CHARGE_AMOUNT", ccsGet, NULL), $this);
        $this->T_LINE_INVOICE_ID = & new clsControl(ccsHidden, "T_LINE_INVOICE_ID", "T_LINE_INVOICE_ID", ccsText, "", CCGetRequestParam("T_LINE_INVOICE_ID", ccsGet, NULL), $this);
        $this->T_INVOICE_COMPONENT_ID = & new clsControl(ccsHidden, "T_INVOICE_COMPONENT_ID", "T_INVOICE_COMPONENT_ID", ccsText, "", CCGetRequestParam("T_INVOICE_COMPONENT_ID", ccsGet, NULL), $this);
        $this->PAYMENT_CHARGE_AMT = & new clsControl(ccsLabel, "PAYMENT_CHARGE_AMT", "PAYMENT_CHARGE_AMT", ccsText, "", CCGetRequestParam("PAYMENT_CHARGE_AMT", ccsGet, NULL), $this);
        $this->CHRG_AMOUNT = & new clsControl(ccsLabel, "CHRG_AMOUNT", "CHRG_AMOUNT", ccsText, "", CCGetRequestParam("CHRG_AMOUNT", ccsGet, NULL), $this);
        $this->VT_AMOUNT = & new clsControl(ccsLabel, "VT_AMOUNT", "VT_AMOUNT", ccsText, "", CCGetRequestParam("VT_AMOUNT", ccsGet, NULL), $this);
        $this->PC_AMOUNT = & new clsControl(ccsLabel, "PC_AMOUNT", "PC_AMOUNT", ccsText, "", CCGetRequestParam("PC_AMOUNT", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @238-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @238-C6C268AB
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlT_LINE_INVOICE_ID"] = CCGetFromGet("T_LINE_INVOICE_ID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["INV_COMP_CODE"] = $this->INV_COMP_CODE->Visible;
            $this->ControlsVisible["CURRENCY_CODE"] = $this->CURRENCY_CODE->Visible;
            $this->ControlsVisible["VAT_AMOUNT"] = $this->VAT_AMOUNT->Visible;
            $this->ControlsVisible["CHARGE_AMOUNT"] = $this->CHARGE_AMOUNT->Visible;
            $this->ControlsVisible["T_LINE_INVOICE_ID"] = $this->T_LINE_INVOICE_ID->Visible;
            $this->ControlsVisible["T_INVOICE_COMPONENT_ID"] = $this->T_INVOICE_COMPONENT_ID->Visible;
            $this->ControlsVisible["PAYMENT_CHARGE_AMT"] = $this->PAYMENT_CHARGE_AMT->Visible;
            $this->ControlsVisible["CHRG_AMOUNT"] = $this->CHRG_AMOUNT->Visible;
            $this->ControlsVisible["VT_AMOUNT"] = $this->VT_AMOUNT->Visible;
            $this->ControlsVisible["PC_AMOUNT"] = $this->PC_AMOUNT->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->INV_COMP_CODE->SetValue($this->DataSource->INV_COMP_CODE->GetValue());
                $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                $this->VAT_AMOUNT->SetValue($this->DataSource->VAT_AMOUNT->GetValue());
                $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                $this->T_LINE_INVOICE_ID->SetValue($this->DataSource->T_LINE_INVOICE_ID->GetValue());
                $this->T_INVOICE_COMPONENT_ID->SetValue($this->DataSource->T_INVOICE_COMPONENT_ID->GetValue());
                $this->PAYMENT_CHARGE_AMT->SetValue($this->DataSource->PAYMENT_CHARGE_AMT->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->INV_COMP_CODE->Show();
                $this->CURRENCY_CODE->Show();
                $this->VAT_AMOUNT->Show();
                $this->CHARGE_AMOUNT->Show();
                $this->T_LINE_INVOICE_ID->Show();
                $this->T_INVOICE_COMPONENT_ID->Show();
                $this->PAYMENT_CHARGE_AMT->Show();
                $this->CHRG_AMOUNT->Show();
                $this->VT_AMOUNT->Show();
                $this->PC_AMOUNT->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @238-E63F2303
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->INV_COMP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VAT_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->T_LINE_INVOICE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->T_INVOICE_COMPONENT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PAYMENT_CHARGE_AMT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHRG_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VT_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PC_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End VR_T_INVOICE_COMPONENT Class @238-FCB6E20C

class clsVR_T_INVOICE_COMPONENTDataSource extends clsDBConn {  //VR_T_INVOICE_COMPONENTDataSource Class @238-81C03C54

//DataSource Variables @238-EBAE5D77
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $INV_COMP_CODE;
    var $CURRENCY_CODE;
    var $VAT_AMOUNT;
    var $CHARGE_AMOUNT;
    var $T_LINE_INVOICE_ID;
    var $T_INVOICE_COMPONENT_ID;
    var $PAYMENT_CHARGE_AMT;
//End DataSource Variables

//DataSourceClass_Initialize Event @238-BE72ABA9
    function clsVR_T_INVOICE_COMPONENTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid VR_T_INVOICE_COMPONENT";
        $this->Initialize();
        $this->INV_COMP_CODE = new clsField("INV_COMP_CODE", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->VAT_AMOUNT = new clsField("VAT_AMOUNT", ccsFloat, "");
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsFloat, "");
        
        $this->T_LINE_INVOICE_ID = new clsField("T_LINE_INVOICE_ID", ccsText, "");
        
        $this->T_INVOICE_COMPONENT_ID = new clsField("T_INVOICE_COMPONENT_ID", ccsText, "");
        
        $this->PAYMENT_CHARGE_AMT = new clsField("PAYMENT_CHARGE_AMT", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @238-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @238-9F76053D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlT_LINE_INVOICE_ID", ccsFloat, "", "", $this->Parameters["urlT_LINE_INVOICE_ID"], -99, false);
    }
//End Prepare Method

//Open Method @238-E3D52392
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM paytv.VR_T_INVOICE_COMPONENT \n" .
        "WHERE T_LINE_INVOICE_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM paytv.VR_T_INVOICE_COMPONENT \n" .
        "WHERE T_LINE_INVOICE_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @238-E68DDBDD
    function SetValues()
    {
        $this->INV_COMP_CODE->SetDBValue($this->f("INV_COMP_CODE"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->VAT_AMOUNT->SetDBValue(trim($this->f("VAT_AMOUNT")));
        $this->CHARGE_AMOUNT->SetDBValue(trim($this->f("CHARGE_AMOUNT")));
        $this->T_LINE_INVOICE_ID->SetDBValue($this->f("T_LINE_INVOICE_ID"));
        $this->T_INVOICE_COMPONENT_ID->SetDBValue($this->f("T_INVOICE_COMPONENT_ID"));
        $this->PAYMENT_CHARGE_AMT->SetDBValue($this->f("PAYMENT_CHARGE_AMT"));
    }
//End SetValues Method

} //End VR_T_INVOICE_COMPONENTDataSource Class @238-FCB6E20C

//Initialize Page @1-3B1AB860
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "t_invoice.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-645D1DFB
include_once("./t_invoice_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-26DA98E2
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$T_BILL2 = & new clsGridT_BILL2("", $MainPage);
$V_T_DETAIL_BIL = & new clsGridV_T_DETAIL_BIL("", $MainPage);
$p_customer_account = & new clsRecordp_customer_account("", $MainPage);
$VR_T_INVOICE_COMPONENT = & new clsGridVR_T_INVOICE_COMPONENT("", $MainPage);
$MainPage->T_BILL2 = & $T_BILL2;
$MainPage->V_T_DETAIL_BIL = & $V_T_DETAIL_BIL;
$MainPage->p_customer_account = & $p_customer_account;
$MainPage->VR_T_INVOICE_COMPONENT = & $VR_T_INVOICE_COMPONENT;
$T_BILL2->Initialize();
$V_T_DETAIL_BIL->Initialize();
$VR_T_INVOICE_COMPONENT->Initialize();

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-52F9C312
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-68CE0668
$p_customer_account->Operation();
//End Execute Components

//Go to destination page @1-FBA8ADFF
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($T_BILL2);
    unset($V_T_DETAIL_BIL);
    unset($p_customer_account);
    unset($VR_T_INVOICE_COMPONENT);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-27A66C26
$T_BILL2->Show();
$V_T_DETAIL_BIL->Show();
$p_customer_account->Show();
$VR_T_INVOICE_COMPONENT->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-F1C41470
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($T_BILL2);
unset($V_T_DETAIL_BIL);
unset($p_customer_account);
unset($VR_T_INVOICE_COMPONENT);
unset($Tpl);
//End Unload Page


?>
