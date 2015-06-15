<?php
//Include Common Files @1-1DA07BD5
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "t_bill.php");
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

//Class_Initialize Event @201-119CF4C3
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

        $this->SUBSCRIBER_ID = & new clsControl(ccsLabel, "SUBSCRIBER_ID", "SUBSCRIBER_ID", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_ID", ccsGet, NULL), $this);
        $this->START_BILL_DATE = & new clsControl(ccsLabel, "START_BILL_DATE", "START_BILL_DATE", ccsText, "", CCGetRequestParam("START_BILL_DATE", ccsGet, NULL), $this);
        $this->END_BILL_DATE = & new clsControl(ccsLabel, "END_BILL_DATE", "END_BILL_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("END_BILL_DATE", ccsGet, NULL), $this);
        $this->SERVICE_LINE_NUMBER = & new clsControl(ccsLabel, "SERVICE_LINE_NUMBER", "SERVICE_LINE_NUMBER", ccsText, "", CCGetRequestParam("SERVICE_LINE_NUMBER", ccsGet, NULL), $this);
        $this->CURRENCY_CODE = & new clsControl(ccsLabel, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", ccsGet, NULL), $this);
        $this->IS_CREATE_INVOICE = & new clsControl(ccsLabel, "IS_CREATE_INVOICE", "IS_CREATE_INVOICE", ccsFloat, "", CCGetRequestParam("IS_CREATE_INVOICE", ccsGet, NULL), $this);
        $this->ACCOUNT_ID = & new clsControl(ccsLabel, "ACCOUNT_ID", "ACCOUNT_ID", ccsFloat, "", CCGetRequestParam("ACCOUNT_ID", ccsGet, NULL), $this);
        $this->SERVICE_TYPE_CODE = & new clsControl(ccsLabel, "SERVICE_TYPE_CODE", "SERVICE_TYPE_CODE", ccsText, "", CCGetRequestParam("SERVICE_TYPE_CODE", ccsGet, NULL), $this);
        $this->ACCOUNT_NAME = & new clsControl(ccsLabel, "ACCOUNT_NAME", "ACCOUNT_NAME", ccsText, "", CCGetRequestParam("ACCOUNT_NAME", ccsGet, NULL), $this);
        $this->NPWP = & new clsControl(ccsLabel, "NPWP", "NPWP", ccsText, "", CCGetRequestParam("NPWP", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "t_bill.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "t_bill.php";
        $this->INVOICE_DATE = & new clsControl(ccsHidden, "INVOICE_DATE", "INVOICE_DATE", ccsText, "", CCGetRequestParam("INVOICE_DATE", ccsGet, NULL), $this);
        $this->INPUT_DATA_CONTROL_ID = & new clsControl(ccsHidden, "INPUT_DATA_CONTROL_ID", "INPUT_DATA_CONTROL_ID", ccsFloat, "", CCGetRequestParam("INPUT_DATA_CONTROL_ID", ccsGet, NULL), $this);
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

//Show Method @201-55FF42DF
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlINVOICE_DATE"] = CCGetFromGet("INVOICE_DATE", NULL);
        $this->DataSource->Parameters["urlINPUT_DATA_CONTROL_ID"] = CCGetFromGet("INPUT_DATA_CONTROL_ID", NULL);

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
            $this->ControlsVisible["SUBSCRIBER_ID"] = $this->SUBSCRIBER_ID->Visible;
            $this->ControlsVisible["START_BILL_DATE"] = $this->START_BILL_DATE->Visible;
            $this->ControlsVisible["END_BILL_DATE"] = $this->END_BILL_DATE->Visible;
            $this->ControlsVisible["SERVICE_LINE_NUMBER"] = $this->SERVICE_LINE_NUMBER->Visible;
            $this->ControlsVisible["CURRENCY_CODE"] = $this->CURRENCY_CODE->Visible;
            $this->ControlsVisible["IS_CREATE_INVOICE"] = $this->IS_CREATE_INVOICE->Visible;
            $this->ControlsVisible["ACCOUNT_ID"] = $this->ACCOUNT_ID->Visible;
            $this->ControlsVisible["SERVICE_TYPE_CODE"] = $this->SERVICE_TYPE_CODE->Visible;
            $this->ControlsVisible["ACCOUNT_NAME"] = $this->ACCOUNT_NAME->Visible;
            $this->ControlsVisible["NPWP"] = $this->NPWP->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["INVOICE_DATE"] = $this->INVOICE_DATE->Visible;
            $this->ControlsVisible["INPUT_DATA_CONTROL_ID"] = $this->INPUT_DATA_CONTROL_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                if(!is_array($this->SUBSCRIBER_ID->Value) && !strlen($this->SUBSCRIBER_ID->Value) && $this->SUBSCRIBER_ID->Value !== false)
                    $this->SUBSCRIBER_ID->SetText(-99);
                $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                $this->START_BILL_DATE->SetValue($this->DataSource->START_BILL_DATE->GetValue());
                $this->END_BILL_DATE->SetValue($this->DataSource->END_BILL_DATE->GetValue());
                $this->SERVICE_LINE_NUMBER->SetValue($this->DataSource->SERVICE_LINE_NUMBER->GetValue());
                $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                $this->IS_CREATE_INVOICE->SetValue($this->DataSource->IS_CREATE_INVOICE->GetValue());
                $this->ACCOUNT_ID->SetValue($this->DataSource->ACCOUNT_ID->GetValue());
                $this->SERVICE_TYPE_CODE->SetValue($this->DataSource->SERVICE_TYPE_CODE->GetValue());
                $this->ACCOUNT_NAME->SetValue($this->DataSource->ACCOUNT_NAME->GetValue());
                $this->NPWP->SetValue($this->DataSource->NPWP->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "SUBSCRIBER_ID", $this->DataSource->f("SUBSCRIBER_ID"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "START_BILL_DATE", $this->DataSource->f("START_BILL_DATE"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "SUBSCRIBER_ID", $this->DataSource->f("SUBSCRIBER_ID"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "START_BILL_DATE", $this->DataSource->f("START_BILL_DATE"));
                $this->INPUT_DATA_CONTROL_ID->SetValue($this->DataSource->INPUT_DATA_CONTROL_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->SUBSCRIBER_ID->Show();
                $this->START_BILL_DATE->Show();
                $this->END_BILL_DATE->Show();
                $this->SERVICE_LINE_NUMBER->Show();
                $this->CURRENCY_CODE->Show();
                $this->IS_CREATE_INVOICE->Show();
                $this->ACCOUNT_ID->Show();
                $this->SERVICE_TYPE_CODE->Show();
                $this->ACCOUNT_NAME->Show();
                $this->NPWP->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->INVOICE_DATE->Show();
                $this->INPUT_DATA_CONTROL_ID->Show();
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

//GetErrors Method @201-78FEBFBE
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->SUBSCRIBER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->START_BILL_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->END_BILL_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_LINE_NUMBER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IS_CREATE_INVOICE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ACCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SERVICE_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ACCOUNT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NPWP->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INVOICE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->INPUT_DATA_CONTROL_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End T_BILL2 Class @201-FCB6E20C

class clsT_BILL2DataSource extends clsDBConn {  //T_BILL2DataSource Class @201-08373293

//DataSource Variables @201-E72DC43E
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $SUBSCRIBER_ID;
    var $START_BILL_DATE;
    var $END_BILL_DATE;
    var $SERVICE_LINE_NUMBER;
    var $CURRENCY_CODE;
    var $IS_CREATE_INVOICE;
    var $ACCOUNT_ID;
    var $SERVICE_TYPE_CODE;
    var $ACCOUNT_NAME;
    var $NPWP;
    var $DLink;
    var $ADLink;
    var $INPUT_DATA_CONTROL_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @201-18CEA9D8
    function clsT_BILL2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid T_BILL2";
        $this->Initialize();
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->START_BILL_DATE = new clsField("START_BILL_DATE", ccsText, "");
        
        $this->END_BILL_DATE = new clsField("END_BILL_DATE", ccsDate, $this->DateFormat);
        
        $this->SERVICE_LINE_NUMBER = new clsField("SERVICE_LINE_NUMBER", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->IS_CREATE_INVOICE = new clsField("IS_CREATE_INVOICE", ccsFloat, "");
        
        $this->ACCOUNT_ID = new clsField("ACCOUNT_ID", ccsFloat, "");
        
        $this->SERVICE_TYPE_CODE = new clsField("SERVICE_TYPE_CODE", ccsText, "");
        
        $this->ACCOUNT_NAME = new clsField("ACCOUNT_NAME", ccsText, "");
        
        $this->NPWP = new clsField("NPWP", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->INPUT_DATA_CONTROL_ID = new clsField("INPUT_DATA_CONTROL_ID", ccsFloat, "");
        

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

//Prepare Method @201-019B59F0
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlINVOICE_DATE", ccsText, "", "", $this->Parameters["urlINVOICE_DATE"], "", false);
        $this->wp->AddParameter("2", "urlINPUT_DATA_CONTROL_ID", ccsFloat, "", "", $this->Parameters["urlINPUT_DATA_CONTROL_ID"], 0, false);
    }
//End Prepare Method

//Open Method @201-51001FF0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_T_BILL \n" .
        "WHERE INPUT_DATA_CONTROL_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " and INVOICE_DATE = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "') cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_T_BILL \n" .
        "WHERE INPUT_DATA_CONTROL_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . " and INVOICE_DATE = '" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "'";
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

//SetValues Method @201-CBBE4FB8
    function SetValues()
    {
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->START_BILL_DATE->SetDBValue($this->f("START_BILL_DATE"));
        $this->END_BILL_DATE->SetDBValue(trim($this->f("END_BILL_DATE")));
        $this->SERVICE_LINE_NUMBER->SetDBValue($this->f("SERVICE_LINE_NUMBER"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->IS_CREATE_INVOICE->SetDBValue(trim($this->f("IS_CREATE_INVOICE")));
        $this->ACCOUNT_ID->SetDBValue(trim($this->f("ACCOUNT_ID")));
        $this->SERVICE_TYPE_CODE->SetDBValue($this->f("SERVICE_TYPE_CODE"));
        $this->ACCOUNT_NAME->SetDBValue($this->f("ACCOUNT_NAME"));
        $this->NPWP->SetDBValue($this->f("NPWP"));
        $this->DLink->SetDBValue($this->f("SUBSCRIBER_ID"));
        $this->ADLink->SetDBValue($this->f("SUBSCRIBER_ID"));
        $this->INPUT_DATA_CONTROL_ID->SetDBValue(trim($this->f("INPUT_DATA_CONTROL_ID")));
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

//Class_Initialize Event @225-43B8622A
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

        $this->BILL_COMPONENT_ID = & new clsControl(ccsLabel, "BILL_COMPONENT_ID", "BILL_COMPONENT_ID", ccsFloat, "", CCGetRequestParam("BILL_COMPONENT_ID", ccsGet, NULL), $this);
        $this->AMOUNT = & new clsControl(ccsLabel, "AMOUNT", "AMOUNT", ccsFloat, "", CCGetRequestParam("AMOUNT", ccsGet, NULL), $this);
        $this->TAX_AMOUNT = & new clsControl(ccsLabel, "TAX_AMOUNT", "TAX_AMOUNT", ccsFloat, "", CCGetRequestParam("TAX_AMOUNT", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->SUBSCRIBER_ID = & new clsControl(ccsHidden, "SUBSCRIBER_ID", "SUBSCRIBER_ID", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_ID", ccsGet, NULL), $this);
        $this->START_BILL_DATE = & new clsControl(ccsHidden, "START_BILL_DATE", "START_BILL_DATE", ccsText, "", CCGetRequestParam("START_BILL_DATE", ccsGet, NULL), $this);
        $this->TOT_BILL = & new clsControl(ccsLabel, "TOT_BILL", "TOT_BILL", ccsText, "", CCGetRequestParam("TOT_BILL", ccsGet, NULL), $this);
        $this->TOT_TAX_BILL = & new clsControl(ccsLabel, "TOT_TAX_BILL", "TOT_TAX_BILL", ccsText, "", CCGetRequestParam("TOT_TAX_BILL", ccsGet, NULL), $this);
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

//Show Method @225-A4689D85
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlSUBSCRIBER_ID"] = CCGetFromGet("SUBSCRIBER_ID", NULL);
        $this->DataSource->Parameters["urlSTART_BILL_DATE"] = CCGetFromGet("START_BILL_DATE", NULL);

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
            $this->ControlsVisible["BILL_COMPONENT_ID"] = $this->BILL_COMPONENT_ID->Visible;
            $this->ControlsVisible["AMOUNT"] = $this->AMOUNT->Visible;
            $this->ControlsVisible["TAX_AMOUNT"] = $this->TAX_AMOUNT->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["SUBSCRIBER_ID"] = $this->SUBSCRIBER_ID->Visible;
            $this->ControlsVisible["START_BILL_DATE"] = $this->START_BILL_DATE->Visible;
            $this->ControlsVisible["TOT_BILL"] = $this->TOT_BILL->Visible;
            $this->ControlsVisible["TOT_TAX_BILL"] = $this->TOT_TAX_BILL->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                if(!is_array($this->BILL_COMPONENT_ID->Value) && !strlen($this->BILL_COMPONENT_ID->Value) && $this->BILL_COMPONENT_ID->Value !== false)
                    $this->BILL_COMPONENT_ID->SetText(-99);
                if(!is_array($this->SUBSCRIBER_ID->Value) && !strlen($this->SUBSCRIBER_ID->Value) && $this->SUBSCRIBER_ID->Value !== false)
                    $this->SUBSCRIBER_ID->SetText(-99);
                $this->BILL_COMPONENT_ID->SetValue($this->DataSource->BILL_COMPONENT_ID->GetValue());
                $this->AMOUNT->SetValue($this->DataSource->AMOUNT->GetValue());
                $this->TAX_AMOUNT->SetValue($this->DataSource->TAX_AMOUNT->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->BILL_COMPONENT_ID->Show();
                $this->AMOUNT->Show();
                $this->TAX_AMOUNT->Show();
                $this->DESCRIPTION->Show();
                $this->SUBSCRIBER_ID->Show();
                $this->START_BILL_DATE->Show();
                $this->TOT_BILL->Show();
                $this->TOT_TAX_BILL->Show();
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

//GetErrors Method @225-BAEB3427
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->BILL_COMPONENT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TAX_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SUBSCRIBER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->START_BILL_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TOT_BILL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TOT_TAX_BILL->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_T_DETAIL_BIL Class @225-FCB6E20C

class clsV_T_DETAIL_BILDataSource extends clsDBConn {  //V_T_DETAIL_BILDataSource Class @225-0BC52348

//DataSource Variables @225-B6DF6F59
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $BILL_COMPONENT_ID;
    var $AMOUNT;
    var $TAX_AMOUNT;
    var $DESCRIPTION;
    var $SUBSCRIBER_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @225-1C3F73BC
    function clsV_T_DETAIL_BILDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_T_DETAIL_BIL";
        $this->Initialize();
        $this->BILL_COMPONENT_ID = new clsField("BILL_COMPONENT_ID", ccsFloat, "");
        
        $this->AMOUNT = new clsField("AMOUNT", ccsFloat, "");
        
        $this->TAX_AMOUNT = new clsField("TAX_AMOUNT", ccsFloat, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        

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

//Prepare Method @225-91CAE31F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlSUBSCRIBER_ID", ccsFloat, "", "", $this->Parameters["urlSUBSCRIBER_ID"], -99, false);
        $this->wp->AddParameter("2", "urlSTART_BILL_DATE", ccsText, "", "", $this->Parameters["urlSTART_BILL_DATE"], "", false);
    }
//End Prepare Method

//Open Method @225-1F67E8DD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_T_DETAIL_BIL \n" .
        "WHERE SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " and START_BILL_DATE = '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "'\n" .
        ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_T_DETAIL_BIL \n" .
        "WHERE SUBSCRIBER_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " and START_BILL_DATE = '" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "'\n" .
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

//SetValues Method @225-A64E1AE9
    function SetValues()
    {
        $this->BILL_COMPONENT_ID->SetDBValue(trim($this->f("BILL_COMPONENT_ID")));
        $this->AMOUNT->SetDBValue(trim($this->f("AMOUNT")));
        $this->TAX_AMOUNT->SetDBValue(trim($this->f("TAX_AMOUNT")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
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

//Class_Initialize Event @86-B7379440
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
        $this->DataSource = new clsp_customer_accountDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_customer_account";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->INVOICE_DATE = & new clsControl(ccsLabel, "INVOICE_DATE", "INVOICE_DATE", ccsText, "", CCGetRequestParam("INVOICE_DATE", $Method, NULL), $this);
            $this->FINANCE_PERIOD_CODE = & new clsControl(ccsLabel, "FINANCE_PERIOD_CODE", "FINANCE_PERIOD_CODE", ccsText, "", CCGetRequestParam("FINANCE_PERIOD_CODE", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @86-5D060BAC
    function Initialize()
    {

        if(!$this->Visible)
            return;

    }
//End Initialize Method

//Validate Method @86-367945B8
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @86-8E9A17D1
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->INVOICE_DATE->Errors->Count());
        $errors = ($errors || $this->FINANCE_PERIOD_CODE->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
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

//Operation Method @86-E33CFFF8
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = true;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @86-D0D6655E
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->P_INPUT_FILE_TYPE_ID->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->PROCEDURE_NAME->SetValue($this->PROCEDURE_NAME->GetValue(true));
        $this->DataSource->START_POSITION_NAME->SetValue($this->START_POSITION_NAME->GetValue(true));
        $this->DataSource->END_POSITION_NAME->SetValue($this->END_POSITION_NAME->GetValue(true));
        $this->DataSource->PARTIAL_FILE_NAME->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        $this->DataSource->START_DATA_POSITION->SetValue($this->START_DATA_POSITION->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->CREATED_BY->SetValue($this->CREATED_BY->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @86-81B85660
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->P_INPUT_FILE_TYPE_ID->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->PROCEDURE_NAME->SetValue($this->PROCEDURE_NAME->GetValue(true));
        $this->DataSource->START_POSITION_NAME->SetValue($this->START_POSITION_NAME->GetValue(true));
        $this->DataSource->END_POSITION_NAME->SetValue($this->END_POSITION_NAME->GetValue(true));
        $this->DataSource->PARTIAL_FILE_NAME->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        $this->DataSource->START_DATA_POSITION->SetValue($this->START_DATA_POSITION->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATED_BY->SetValue($this->UPDATED_BY->GetValue(true));
        $this->DataSource->P_INPUT_FILE_DESC_ID->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @86-1067875D
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_INPUT_FILE_DESC_ID->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @86-4C297534
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
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->INVOICE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FINANCE_PERIOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_customer_account Class @86-FCB6E20C

class clsp_customer_accountDataSource extends clsDBConn {  //p_customer_accountDataSource Class @86-37F9D23B

//DataSource Variables @86-01CCDACC
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $InsertParameters;
    var $UpdateParameters;
    var $DeleteParameters;
    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $INVOICE_DATE;
    var $FINANCE_PERIOD_CODE;
//End DataSource Variables

//DataSourceClass_Initialize Event @86-8063C09D
    function clsp_customer_accountDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_customer_account/Error";
        $this->Initialize();
        $this->INVOICE_DATE = new clsField("INVOICE_DATE", ccsText, "");
        
        $this->FINANCE_PERIOD_CODE = new clsField("FINANCE_PERIOD_CODE", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @86-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @86-8FF64DA7
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT c.* ,to_char(INVOICE_DATE,'dd-MON-yyyy') as INVOICE_DATE2 FROM\n" .
        "V_INPUT_DATA_CONTROL c";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @86-BAF0975B
    function SetValues()
    {
    }
//End SetValues Method

//Insert Method @86-93979914
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_INPUT_FILE_TYPE_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_TYPE_ID", ccsFloat, "", "", $this->P_INPUT_FILE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PROCEDURE_NAME"] = new clsSQLParameter("ctrlPROCEDURE_NAME", ccsText, "", "", $this->PROCEDURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_POSITION_NAME"] = new clsSQLParameter("ctrlSTART_POSITION_NAME", ccsFloat, "", "", $this->START_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["END_POSITION_NAME"] = new clsSQLParameter("ctrlEND_POSITION_NAME", ccsFloat, "", "", $this->END_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PARTIAL_FILE_NAME"] = new clsSQLParameter("ctrlPARTIAL_FILE_NAME", ccsText, "", "", $this->PARTIAL_FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_DATA_POSITION"] = new clsSQLParameter("ctrlSTART_DATA_POSITION", ccsFloat, "", "", $this->START_DATA_POSITION->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CREATED_BY"] = new clsSQLParameter("ctrlCREATED_BY", ccsText, "", "", $this->CREATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["PROCEDURE_NAME"]->GetValue()) and !strlen($this->cp["PROCEDURE_NAME"]->GetText()) and !is_bool($this->cp["PROCEDURE_NAME"]->GetValue())) 
            $this->cp["PROCEDURE_NAME"]->SetValue($this->PROCEDURE_NAME->GetValue(true));
        if (!is_null($this->cp["START_POSITION_NAME"]->GetValue()) and !strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue())) 
            $this->cp["START_POSITION_NAME"]->SetValue($this->START_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue(true))) 
            $this->cp["START_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["END_POSITION_NAME"]->GetValue()) and !strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue())) 
            $this->cp["END_POSITION_NAME"]->SetValue($this->END_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue(true))) 
            $this->cp["END_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["PARTIAL_FILE_NAME"]->GetValue()) and !strlen($this->cp["PARTIAL_FILE_NAME"]->GetText()) and !is_bool($this->cp["PARTIAL_FILE_NAME"]->GetValue())) 
            $this->cp["PARTIAL_FILE_NAME"]->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        if (!is_null($this->cp["START_DATA_POSITION"]->GetValue()) and !strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue())) 
            $this->cp["START_DATA_POSITION"]->SetValue($this->START_DATA_POSITION->GetValue(true));
        if (!strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue(true))) 
            $this->cp["START_DATA_POSITION"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["CREATED_BY"]->GetValue()) and !strlen($this->cp["CREATED_BY"]->GetText()) and !is_bool($this->cp["CREATED_BY"]->GetValue())) 
            $this->cp["CREATED_BY"]->SetValue($this->CREATED_BY->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_INPUT_FILE_DESC(P_INPUT_FILE_DESC_ID, P_INPUT_FILE_TYPE_ID, P_SERVICE_TYPE_ID, PROCEDURE_NAME, START_POSITION_NAME, END_POSITION_NAME, PARTIAL_FILE_NAME, START_DATA_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_INPUT_FILE_DESC','P_INPUT_FILE_DESC_ID')," . $this->SQLValue($this->cp["P_INPUT_FILE_TYPE_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["PROCEDURE_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["START_POSITION_NAME"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["END_POSITION_NAME"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["PARTIAL_FILE_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["START_DATA_POSITION"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["CREATED_BY"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @86-70BAF76A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_INPUT_FILE_TYPE_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_TYPE_ID", ccsFloat, "", "", $this->P_INPUT_FILE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PROCEDURE_NAME"] = new clsSQLParameter("ctrlPROCEDURE_NAME", ccsText, "", "", $this->PROCEDURE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_POSITION_NAME"] = new clsSQLParameter("ctrlSTART_POSITION_NAME", ccsFloat, "", "", $this->START_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["END_POSITION_NAME"] = new clsSQLParameter("ctrlEND_POSITION_NAME", ccsFloat, "", "", $this->END_POSITION_NAME->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["PARTIAL_FILE_NAME"] = new clsSQLParameter("ctrlPARTIAL_FILE_NAME", ccsText, "", "", $this->PARTIAL_FILE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_DATA_POSITION"] = new clsSQLParameter("ctrlSTART_DATA_POSITION", ccsFloat, "", "", $this->START_DATA_POSITION->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATED_BY"] = new clsSQLParameter("ctrlUPDATED_BY", ccsText, "", "", $this->UPDATED_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_INPUT_FILE_DESC_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_DESC_ID", ccsFloat, "", "", $this->P_INPUT_FILE_DESC_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetValue($this->P_INPUT_FILE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["PROCEDURE_NAME"]->GetValue()) and !strlen($this->cp["PROCEDURE_NAME"]->GetText()) and !is_bool($this->cp["PROCEDURE_NAME"]->GetValue())) 
            $this->cp["PROCEDURE_NAME"]->SetValue($this->PROCEDURE_NAME->GetValue(true));
        if (!is_null($this->cp["START_POSITION_NAME"]->GetValue()) and !strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue())) 
            $this->cp["START_POSITION_NAME"]->SetValue($this->START_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["START_POSITION_NAME"]->GetText()) and !is_bool($this->cp["START_POSITION_NAME"]->GetValue(true))) 
            $this->cp["START_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["END_POSITION_NAME"]->GetValue()) and !strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue())) 
            $this->cp["END_POSITION_NAME"]->SetValue($this->END_POSITION_NAME->GetValue(true));
        if (!strlen($this->cp["END_POSITION_NAME"]->GetText()) and !is_bool($this->cp["END_POSITION_NAME"]->GetValue(true))) 
            $this->cp["END_POSITION_NAME"]->SetText(0);
        if (!is_null($this->cp["PARTIAL_FILE_NAME"]->GetValue()) and !strlen($this->cp["PARTIAL_FILE_NAME"]->GetText()) and !is_bool($this->cp["PARTIAL_FILE_NAME"]->GetValue())) 
            $this->cp["PARTIAL_FILE_NAME"]->SetValue($this->PARTIAL_FILE_NAME->GetValue(true));
        if (!is_null($this->cp["START_DATA_POSITION"]->GetValue()) and !strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue())) 
            $this->cp["START_DATA_POSITION"]->SetValue($this->START_DATA_POSITION->GetValue(true));
        if (!strlen($this->cp["START_DATA_POSITION"]->GetText()) and !is_bool($this->cp["START_DATA_POSITION"]->GetValue(true))) 
            $this->cp["START_DATA_POSITION"]->SetText(0);
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATED_BY"]->GetValue()) and !strlen($this->cp["UPDATED_BY"]->GetText()) and !is_bool($this->cp["UPDATED_BY"]->GetValue())) 
            $this->cp["UPDATED_BY"]->SetValue($this->UPDATED_BY->GetValue(true));
        if (!is_null($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetText(0);
        $this->SQL = "UPDATE P_INPUT_FILE_DESC SET \n" .
        "P_INPUT_FILE_TYPE_ID=" . $this->SQLValue($this->cp["P_INPUT_FILE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "P_SERVICE_TYPE_ID=" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "PROCEDURE_NAME='" . $this->SQLValue($this->cp["PROCEDURE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "START_POSITION_NAME=" . $this->SQLValue($this->cp["START_POSITION_NAME"]->GetDBValue(), ccsFloat) . ",\n" .
        "END_POSITION_NAME=" . $this->SQLValue($this->cp["END_POSITION_NAME"]->GetDBValue(), ccsFloat) . ",\n" .
        "PARTIAL_FILE_NAME='" . $this->SQLValue($this->cp["PARTIAL_FILE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "START_DATA_POSITION=" . $this->SQLValue($this->cp["START_DATA_POSITION"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATED_DATE=sysdate,\n" .
        "UPDATED_BY='" . $this->SQLValue($this->cp["UPDATED_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  P_INPUT_FILE_DESC_ID = " . $this->SQLValue($this->cp["P_INPUT_FILE_DESC_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @86-0698C0B8
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_INPUT_FILE_DESC_ID"] = new clsSQLParameter("ctrlP_INPUT_FILE_DESC_ID", ccsFloat, "", "", $this->P_INPUT_FILE_DESC_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue()) and !strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue())) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetValue($this->P_INPUT_FILE_DESC_ID->GetValue(true));
        if (!strlen($this->cp["P_INPUT_FILE_DESC_ID"]->GetText()) and !is_bool($this->cp["P_INPUT_FILE_DESC_ID"]->GetValue(true))) 
            $this->cp["P_INPUT_FILE_DESC_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_INPUT_FILE_DESC WHERE P_INPUT_FILE_DESC_ID = " . $this->SQLValue($this->cp["P_INPUT_FILE_DESC_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_customer_accountDataSource Class @86-FCB6E20C

class clsGridV_DETAIL_BILL_BY_ACCOUNT { //V_DETAIL_BILL_BY_ACCOUNT class @248-55C193FB

//Variables @248-AC1EDBB9

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

//Class_Initialize Event @248-19FF587D
    function clsGridV_DETAIL_BILL_BY_ACCOUNT($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_DETAIL_BILL_BY_ACCOUNT";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_DETAIL_BILL_BY_ACCOUNT";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_DETAIL_BILL_BY_ACCOUNTDataSource($this);
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

        $this->SUBSCRIBER_ID = & new clsControl(ccsLabel, "SUBSCRIBER_ID", "SUBSCRIBER_ID", ccsFloat, "", CCGetRequestParam("SUBSCRIBER_ID", ccsGet, NULL), $this);
        $this->BILL_COMP_CODE = & new clsControl(ccsLabel, "BILL_COMP_CODE", "BILL_COMP_CODE", ccsText, "", CCGetRequestParam("BILL_COMP_CODE", ccsGet, NULL), $this);
        $this->START_BILL_DATE = & new clsControl(ccsHidden, "START_BILL_DATE", "START_BILL_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("START_BILL_DATE", ccsGet, NULL), $this);
        $this->AMOUNT = & new clsControl(ccsLabel, "AMOUNT", "AMOUNT", ccsFloat, "", CCGetRequestParam("AMOUNT", ccsGet, NULL), $this);
        $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsTextBox, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", ccsGet, NULL), $this);
        $this->TOT_AMOUNT = & new clsControl(ccsLabel, "TOT_AMOUNT", "TOT_AMOUNT", ccsText, "", CCGetRequestParam("TOT_AMOUNT", ccsGet, NULL), $this);
        $this->TOT_AMOUNT1 = & new clsControl(ccsLabel, "TOT_AMOUNT1", "TOT_AMOUNT1", ccsText, "", CCGetRequestParam("TOT_AMOUNT1", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @248-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @248-4D6F7757
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlACCOUNT_ID"] = CCGetFromGet("ACCOUNT_ID", NULL);
        $this->DataSource->Parameters["urlSTART_BILL_DATE"] = CCGetFromGet("START_BILL_DATE", NULL);

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
            $this->ControlsVisible["SUBSCRIBER_ID"] = $this->SUBSCRIBER_ID->Visible;
            $this->ControlsVisible["BILL_COMP_CODE"] = $this->BILL_COMP_CODE->Visible;
            $this->ControlsVisible["START_BILL_DATE"] = $this->START_BILL_DATE->Visible;
            $this->ControlsVisible["AMOUNT"] = $this->AMOUNT->Visible;
            $this->ControlsVisible["CUSTOMER_ACCOUNT_ID"] = $this->CUSTOMER_ACCOUNT_ID->Visible;
            $this->ControlsVisible["TOT_AMOUNT"] = $this->TOT_AMOUNT->Visible;
            $this->ControlsVisible["TOT_AMOUNT1"] = $this->TOT_AMOUNT1->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->SUBSCRIBER_ID->SetValue($this->DataSource->SUBSCRIBER_ID->GetValue());
                $this->BILL_COMP_CODE->SetValue($this->DataSource->BILL_COMP_CODE->GetValue());
                $this->START_BILL_DATE->SetValue($this->DataSource->START_BILL_DATE->GetValue());
                $this->AMOUNT->SetValue($this->DataSource->AMOUNT->GetValue());
                $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->SUBSCRIBER_ID->Show();
                $this->BILL_COMP_CODE->Show();
                $this->START_BILL_DATE->Show();
                $this->AMOUNT->Show();
                $this->CUSTOMER_ACCOUNT_ID->Show();
                $this->TOT_AMOUNT->Show();
                $this->TOT_AMOUNT1->Show();
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

//GetErrors Method @248-6EBD018E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->SUBSCRIBER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_COMP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->START_BILL_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TOT_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TOT_AMOUNT1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_DETAIL_BILL_BY_ACCOUNT Class @248-FCB6E20C

class clsV_DETAIL_BILL_BY_ACCOUNTDataSource extends clsDBConn {  //V_DETAIL_BILL_BY_ACCOUNTDataSource Class @248-7F59F219

//DataSource Variables @248-39C305EC
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $SUBSCRIBER_ID;
    var $BILL_COMP_CODE;
    var $START_BILL_DATE;
    var $AMOUNT;
    var $CUSTOMER_ACCOUNT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @248-C8E3BBDB
    function clsV_DETAIL_BILL_BY_ACCOUNTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_DETAIL_BILL_BY_ACCOUNT";
        $this->Initialize();
        $this->SUBSCRIBER_ID = new clsField("SUBSCRIBER_ID", ccsFloat, "");
        
        $this->BILL_COMP_CODE = new clsField("BILL_COMP_CODE", ccsText, "");
        
        $this->START_BILL_DATE = new clsField("START_BILL_DATE", ccsDate, $this->DateFormat);
        
        $this->AMOUNT = new clsField("AMOUNT", ccsFloat, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @248-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @248-6362C7F6
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlACCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlACCOUNT_ID"], 0, false);
        $this->wp->AddParameter("2", "urlSTART_BILL_DATE", ccsText, "", "", $this->Parameters["urlSTART_BILL_DATE"], "", false);
    }
//End Prepare Method

//Open Method @248-5F79BE4F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_DETAIL_BILL_BY_ACCOUNT \n" .
        "where \n" .
        "CUSTOMER_ACCOUNT_ID= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " \n" .
        "AND  START_BILL_DATE='" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "') cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_DETAIL_BILL_BY_ACCOUNT \n" .
        "where \n" .
        "CUSTOMER_ACCOUNT_ID= " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " \n" .
        "AND  START_BILL_DATE='" . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . "'";
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

//SetValues Method @248-233E5BA9
    function SetValues()
    {
        $this->SUBSCRIBER_ID->SetDBValue(trim($this->f("SUBSCRIBER_ID")));
        $this->BILL_COMP_CODE->SetDBValue($this->f("BILL_COMP_CODE"));
        $this->START_BILL_DATE->SetDBValue(trim($this->f("START_BILL_DATE")));
        $this->AMOUNT->SetDBValue(trim($this->f("AMOUNT")));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue($this->f("CUSTOMER_ACCOUNT_ID"));
    }
//End SetValues Method

} //End V_DETAIL_BILL_BY_ACCOUNTDataSource Class @248-FCB6E20C

//Initialize Page @1-E2E6DE6B
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
$TemplateFileName = "t_bill.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-3FD864F4
include_once("./t_bill_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-F17558C6
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$T_BILL2 = & new clsGridT_BILL2("", $MainPage);
$V_T_DETAIL_BIL = & new clsGridV_T_DETAIL_BIL("", $MainPage);
$p_customer_account = & new clsRecordp_customer_account("", $MainPage);
$V_DETAIL_BILL_BY_ACCOUNT = & new clsGridV_DETAIL_BILL_BY_ACCOUNT("", $MainPage);
$MainPage->T_BILL2 = & $T_BILL2;
$MainPage->V_T_DETAIL_BIL = & $V_T_DETAIL_BIL;
$MainPage->p_customer_account = & $p_customer_account;
$MainPage->V_DETAIL_BILL_BY_ACCOUNT = & $V_DETAIL_BILL_BY_ACCOUNT;
$T_BILL2->Initialize();
$V_T_DETAIL_BIL->Initialize();
$p_customer_account->Initialize();
$V_DETAIL_BILL_BY_ACCOUNT->Initialize();

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

//Go to destination page @1-A645CCDA
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($T_BILL2);
    unset($V_T_DETAIL_BIL);
    unset($p_customer_account);
    unset($V_DETAIL_BILL_BY_ACCOUNT);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-32F3C9A2
$T_BILL2->Show();
$V_T_DETAIL_BIL->Show();
$p_customer_account->Show();
$V_DETAIL_BILL_BY_ACCOUNT->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-106E2300
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($T_BILL2);
unset($V_T_DETAIL_BIL);
unset($p_customer_account);
unset($V_DETAIL_BILL_BY_ACCOUNT);
unset($Tpl);
//End Unload Page


?>
