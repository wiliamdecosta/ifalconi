<?php
//Include Common Files @1-31A9878D
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "cust_acc_payment_method.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_CUST_ACC_PAYMENT_METHOD { //V_CUST_ACC_PAYMENT_METHOD class @2-9BC2794E

//Variables @2-AC1EDBB9

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

//Class_Initialize Event @2-3420E1CA
    function clsGridV_CUST_ACC_PAYMENT_METHOD($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_CUST_ACC_PAYMENT_METHOD";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_CUST_ACC_PAYMENT_METHOD";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_CUST_ACC_PAYMENT_METHODDataSource($this);
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

        $this->PAYMENT_METHOD_CODE = & new clsControl(ccsLabel, "PAYMENT_METHOD_CODE", "PAYMENT_METHOD_CODE", ccsText, "", CCGetRequestParam("PAYMENT_METHOD_CODE", ccsGet, NULL), $this);
        $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", ccsGet, NULL), $this);
        $this->REFERENCE_NAME = & new clsControl(ccsLabel, "REFERENCE_NAME", "REFERENCE_NAME", ccsText, "", CCGetRequestParam("REFERENCE_NAME", ccsGet, NULL), $this);
        $this->REF_VALID_FROM = & new clsControl(ccsLabel, "REF_VALID_FROM", "REF_VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("REF_VALID_FROM", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->UPDATE_DATE = & new clsControl(ccsLabel, "UPDATE_DATE", "UPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", ccsGet, NULL), $this);
        $this->REFERENCE_NO = & new clsControl(ccsLabel, "REFERENCE_NO", "REFERENCE_NO", ccsText, "", CCGetRequestParam("REFERENCE_NO", ccsGet, NULL), $this);
        $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsHidden, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", ccsGet, NULL), $this);
        $this->CUSTOMER_ID = & new clsControl(ccsHidden, "CUSTOMER_ID", "CUSTOMER_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ID", ccsGet, NULL), $this);
        $this->P_CUSTOMER_SEGMENT_ID = & new clsControl(ccsHidden, "P_CUSTOMER_SEGMENT_ID", "P_CUSTOMER_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_ID", ccsGet, NULL), $this);
        $this->P_CUSTOMER_TITLE_ID = & new clsControl(ccsHidden, "P_CUSTOMER_TITLE_ID", "P_CUSTOMER_TITLE_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_TITLE_ID", ccsGet, NULL), $this);
        $this->BANK_NAME = & new clsControl(ccsLabel, "BANK_NAME", "BANK_NAME", ccsText, "", CCGetRequestParam("BANK_NAME", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->P_BILL_CYCLE_ID = & new clsControl(ccsHidden, "P_BILL_CYCLE_ID", "P_BILL_CYCLE_ID", ccsFloat, "", CCGetRequestParam("P_BILL_CYCLE_ID", ccsGet, NULL), $this);
        $this->P_CURRENCY_ID = & new clsControl(ccsHidden, "P_CURRENCY_ID", "P_CURRENCY_ID", ccsFloat, "", CCGetRequestParam("P_CURRENCY_ID", ccsGet, NULL), $this);
        $this->REF_VALID_TO = & new clsControl(ccsLabel, "REF_VALID_TO", "REF_VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("REF_VALID_TO", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "cust_acc_payment_method.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "cust_acc_payment_method.php";
        $this->CUST_ACC_PAYMENT_METHOD_ID = & new clsControl(ccsLabel, "CUST_ACC_PAYMENT_METHOD_ID", "CUST_ACC_PAYMENT_METHOD_ID", ccsText, "", CCGetRequestParam("CUST_ACC_PAYMENT_METHOD_ID", ccsGet, NULL), $this);
        $this->PAYMENT_METHOD_TYPE_CODE = & new clsControl(ccsLabel, "PAYMENT_METHOD_TYPE_CODE", "PAYMENT_METHOD_TYPE_CODE", ccsText, "", CCGetRequestParam("PAYMENT_METHOD_TYPE_CODE", ccsGet, NULL), $this);
        $this->UPDATE_BY = & new clsControl(ccsLabel, "UPDATE_BY", "UPDATE_BY", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_BY", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 3, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->V_P_CUST_ACC_PAY_METHOD_Insert = & new clsControl(ccsLink, "V_P_CUST_ACC_PAY_METHOD_Insert", "V_P_CUST_ACC_PAY_METHOD_Insert", ccsText, "", CCGetRequestParam("V_P_CUST_ACC_PAY_METHOD_Insert", ccsGet, NULL), $this);
        $this->V_P_CUST_ACC_PAY_METHOD_Insert->Page = "cust_acc_payment_method.php";
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-8116E4C8
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlCUSTOMER_ACCOUNT_ID"] = CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL);

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
            $this->ControlsVisible["PAYMENT_METHOD_CODE"] = $this->PAYMENT_METHOD_CODE->Visible;
            $this->ControlsVisible["LAST_NAME"] = $this->LAST_NAME->Visible;
            $this->ControlsVisible["REFERENCE_NAME"] = $this->REFERENCE_NAME->Visible;
            $this->ControlsVisible["REF_VALID_FROM"] = $this->REF_VALID_FROM->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["UPDATE_DATE"] = $this->UPDATE_DATE->Visible;
            $this->ControlsVisible["REFERENCE_NO"] = $this->REFERENCE_NO->Visible;
            $this->ControlsVisible["CUSTOMER_ACCOUNT_ID"] = $this->CUSTOMER_ACCOUNT_ID->Visible;
            $this->ControlsVisible["CUSTOMER_ID"] = $this->CUSTOMER_ID->Visible;
            $this->ControlsVisible["P_CUSTOMER_SEGMENT_ID"] = $this->P_CUSTOMER_SEGMENT_ID->Visible;
            $this->ControlsVisible["P_CUSTOMER_TITLE_ID"] = $this->P_CUSTOMER_TITLE_ID->Visible;
            $this->ControlsVisible["BANK_NAME"] = $this->BANK_NAME->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["P_BILL_CYCLE_ID"] = $this->P_BILL_CYCLE_ID->Visible;
            $this->ControlsVisible["P_CURRENCY_ID"] = $this->P_CURRENCY_ID->Visible;
            $this->ControlsVisible["REF_VALID_TO"] = $this->REF_VALID_TO->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["CUST_ACC_PAYMENT_METHOD_ID"] = $this->CUST_ACC_PAYMENT_METHOD_ID->Visible;
            $this->ControlsVisible["PAYMENT_METHOD_TYPE_CODE"] = $this->PAYMENT_METHOD_TYPE_CODE->Visible;
            $this->ControlsVisible["UPDATE_BY"] = $this->UPDATE_BY->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->PAYMENT_METHOD_CODE->SetValue($this->DataSource->PAYMENT_METHOD_CODE->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->REFERENCE_NAME->SetValue($this->DataSource->REFERENCE_NAME->GetValue());
                $this->REF_VALID_FROM->SetValue($this->DataSource->REF_VALID_FROM->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                $this->REFERENCE_NO->SetValue($this->DataSource->REFERENCE_NO->GetValue());
                $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                $this->P_CUSTOMER_SEGMENT_ID->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_ID->GetValue());
                $this->P_CUSTOMER_TITLE_ID->SetValue($this->DataSource->P_CUSTOMER_TITLE_ID->GetValue());
                $this->BANK_NAME->SetValue($this->DataSource->BANK_NAME->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->P_BILL_CYCLE_ID->SetValue($this->DataSource->P_BILL_CYCLE_ID->GetValue());
                $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                $this->REF_VALID_TO->SetValue($this->DataSource->REF_VALID_TO->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "CUST_ACC_PAYMENT_METHOD_ID", $this->DataSource->f("CUST_ACC_PAYMENT_METHOD_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "CUST_ACC_PAYMENT_METHOD_ID", $this->DataSource->f("CUST_ACC_PAYMENT_METHOD_ID"));
                $this->CUST_ACC_PAYMENT_METHOD_ID->SetValue($this->DataSource->CUST_ACC_PAYMENT_METHOD_ID->GetValue());
                $this->PAYMENT_METHOD_TYPE_CODE->SetValue($this->DataSource->PAYMENT_METHOD_TYPE_CODE->GetValue());
                $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->PAYMENT_METHOD_CODE->Show();
                $this->LAST_NAME->Show();
                $this->REFERENCE_NAME->Show();
                $this->REF_VALID_FROM->Show();
                $this->DESCRIPTION->Show();
                $this->UPDATE_DATE->Show();
                $this->REFERENCE_NO->Show();
                $this->CUSTOMER_ACCOUNT_ID->Show();
                $this->CUSTOMER_ID->Show();
                $this->P_CUSTOMER_SEGMENT_ID->Show();
                $this->P_CUSTOMER_TITLE_ID->Show();
                $this->BANK_NAME->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->P_BILL_CYCLE_ID->Show();
                $this->P_CURRENCY_ID->Show();
                $this->REF_VALID_TO->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->CUST_ACC_PAYMENT_METHOD_ID->Show();
                $this->PAYMENT_METHOD_TYPE_CODE->Show();
                $this->UPDATE_BY->Show();
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
        $this->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters = CCGetQueryString("QueryString", array("CUST_ACC_PAYMENT_METHOD_ID", "ccsForm"));
        $this->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters = CCAddParam($this->V_P_CUST_ACC_PAY_METHOD_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->V_P_CUST_ACC_PAY_METHOD_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-4BE409BE
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PAYMENT_METHOD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LAST_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REFERENCE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REF_VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_DATE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REFERENCE_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CUSTOMER_SEGMENT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CUSTOMER_TITLE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BANK_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BILL_CYCLE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CURRENCY_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REF_VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUST_ACC_PAYMENT_METHOD_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PAYMENT_METHOD_TYPE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->UPDATE_BY->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_CUST_ACC_PAYMENT_METHOD Class @2-FCB6E20C

class clsV_CUST_ACC_PAYMENT_METHODDataSource extends clsDBConn {  //V_CUST_ACC_PAYMENT_METHODDataSource Class @2-D87D0637

//DataSource Variables @2-48F45D6F
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $PAYMENT_METHOD_CODE;
    var $LAST_NAME;
    var $REFERENCE_NAME;
    var $REF_VALID_FROM;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $REFERENCE_NO;
    var $CUSTOMER_ACCOUNT_ID;
    var $CUSTOMER_ID;
    var $P_CUSTOMER_SEGMENT_ID;
    var $P_CUSTOMER_TITLE_ID;
    var $BANK_NAME;
    var $VALID_FROM;
    var $VALID_TO;
    var $P_BILL_CYCLE_ID;
    var $P_CURRENCY_ID;
    var $REF_VALID_TO;
    var $DLink;
    var $ADLink;
    var $CUST_ACC_PAYMENT_METHOD_ID;
    var $PAYMENT_METHOD_TYPE_CODE;
    var $UPDATE_BY;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-19076652
    function clsV_CUST_ACC_PAYMENT_METHODDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_CUST_ACC_PAYMENT_METHOD";
        $this->Initialize();
        $this->PAYMENT_METHOD_CODE = new clsField("PAYMENT_METHOD_CODE", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->REFERENCE_NAME = new clsField("REFERENCE_NAME", ccsText, "");
        
        $this->REF_VALID_FROM = new clsField("REF_VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->REFERENCE_NO = new clsField("REFERENCE_NO", ccsText, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsFloat, "");
        
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsFloat, "");
        
        $this->P_CUSTOMER_SEGMENT_ID = new clsField("P_CUSTOMER_SEGMENT_ID", ccsFloat, "");
        
        $this->P_CUSTOMER_TITLE_ID = new clsField("P_CUSTOMER_TITLE_ID", ccsFloat, "");
        
        $this->BANK_NAME = new clsField("BANK_NAME", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->P_BILL_CYCLE_ID = new clsField("P_BILL_CYCLE_ID", ccsFloat, "");
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsFloat, "");
        
        $this->REF_VALID_TO = new clsField("REF_VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->CUST_ACC_PAYMENT_METHOD_ID = new clsField("CUST_ACC_PAYMENT_METHOD_ID", ccsText, "");
        
        $this->PAYMENT_METHOD_TYPE_CODE = new clsField("PAYMENT_METHOD_TYPE_CODE", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-527C47DB
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ACCOUNT_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-72B1884A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT *\n" .
        "FROM V_CUST_ACC_PAYMENT_METHOD\n" .
        "WHERE CUSTOMER_ACCOUNT_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT *\n" .
        "FROM V_CUST_ACC_PAYMENT_METHOD\n" .
        "WHERE CUSTOMER_ACCOUNT_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "";
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

//SetValues Method @2-ECDAD8DF
    function SetValues()
    {
        $this->PAYMENT_METHOD_CODE->SetDBValue($this->f("PAYMENT_METHOD_CODE"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->REFERENCE_NAME->SetDBValue($this->f("REFERENCE_NAME"));
        $this->REF_VALID_FROM->SetDBValue(trim($this->f("REF_VALID_FROM")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->REFERENCE_NO->SetDBValue($this->f("REFERENCE_NO"));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue(trim($this->f("CUSTOMER_ACCOUNT_ID")));
        $this->CUSTOMER_ID->SetDBValue(trim($this->f("CUSTOMER_ID")));
        $this->P_CUSTOMER_SEGMENT_ID->SetDBValue(trim($this->f("P_CUSTOMER_SEGMENT_ID")));
        $this->P_CUSTOMER_TITLE_ID->SetDBValue(trim($this->f("P_CUSTOMER_TITLE_ID")));
        $this->BANK_NAME->SetDBValue($this->f("BANK_NAME"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->P_BILL_CYCLE_ID->SetDBValue(trim($this->f("P_BILL_CYCLE_ID")));
        $this->P_CURRENCY_ID->SetDBValue(trim($this->f("P_CURRENCY_ID")));
        $this->REF_VALID_TO->SetDBValue(trim($this->f("REF_VALID_TO")));
        $this->DLink->SetDBValue($this->f("CUST_ACC_PAYMENT_METHOD_ID"));
        $this->ADLink->SetDBValue($this->f("CUST_ACC_PAYMENT_METHOD_ID"));
        $this->CUST_ACC_PAYMENT_METHOD_ID->SetDBValue($this->f("CUST_ACC_PAYMENT_METHOD_ID"));
        $this->PAYMENT_METHOD_TYPE_CODE->SetDBValue($this->f("PAYMENT_METHOD_TYPE_CODE"));
        $this->UPDATE_BY->SetDBValue(trim($this->f("UPDATE_BY")));
    }
//End SetValues Method

} //End V_CUST_ACC_PAYMENT_METHODDataSource Class @2-FCB6E20C

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

//Class_Initialize Event @86-CC0A6267
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
            $this->ACCOUNT_NO = & new clsControl(ccsLabel, "ACCOUNT_NO", "CODE", ccsText, "", CCGetRequestParam("ACCOUNT_NO", $Method, NULL), $this);
            $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", $Method, NULL), $this);
            $this->CUSTOMER_NUMBER = & new clsControl(ccsLabel, "CUSTOMER_NUMBER", "CUSTOMER_NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", $Method, NULL), $this);
            $this->CUSTOMER_NAME = & new clsControl(ccsLabel, "CUSTOMER_NAME", "CUSTOMER_NAME", ccsText, "", CCGetRequestParam("CUSTOMER_NAME", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @86-583DA543
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUSTOMER_ACCOUNT_ID"] = CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL);
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

//CheckErrors Method @86-30202161
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ACCOUNT_NO->Errors->Count());
        $errors = ($errors || $this->LAST_NAME->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_NUMBER->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_NAME->Errors->Count());
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

//Operation Method @86-17DC9883
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @86-3784F9D0
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
                $this->ACCOUNT_NO->SetValue($this->DataSource->ACCOUNT_NO->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
                $this->CUSTOMER_NAME->SetValue($this->DataSource->CUSTOMER_NAME->GetValue());
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ACCOUNT_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_NUMBER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_NAME->Errors->ToString());
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

        $this->ACCOUNT_NO->Show();
        $this->LAST_NAME->Show();
        $this->CUSTOMER_NUMBER->Show();
        $this->CUSTOMER_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_customer_account Class @86-FCB6E20C

class clsp_customer_accountDataSource extends clsDBConn {  //p_customer_accountDataSource Class @86-37F9D23B

//DataSource Variables @86-6C8F2260
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $ACCOUNT_NO;
    var $LAST_NAME;
    var $CUSTOMER_NUMBER;
    var $CUSTOMER_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @86-7A243A5A
    function clsp_customer_accountDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_customer_account/Error";
        $this->Initialize();
        $this->ACCOUNT_NO = new clsField("ACCOUNT_NO", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        
        $this->CUSTOMER_NAME = new clsField("CUSTOMER_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @86-899860CA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ACCOUNT_ID"], -99, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @86-583E4794
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT *\n" .
        "FROM V_CUSTOMER_ACCOUNT\n" .
        "WHERE CUSTOMER_ACCOUNT_ID = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @86-04DF1451
    function SetValues()
    {
        $this->ACCOUNT_NO->SetDBValue($this->f("ACCOUNT_NO"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
        $this->CUSTOMER_NAME->SetDBValue($this->f("CUSTOMER_NAME"));
    }
//End SetValues Method

} //End p_customer_accountDataSource Class @86-FCB6E20C

class clsRecordV_CUST_ACC_PAYMENT_METHOD1 { //V_CUST_ACC_PAYMENT_METHOD1 Class @395-035DF6BC

//Variables @395-D6FF3E86

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

//Class_Initialize Event @395-7621B536
    function clsRecordV_CUST_ACC_PAYMENT_METHOD1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_CUST_ACC_PAYMENT_METHOD1/Error";
        $this->DataSource = new clsV_CUST_ACC_PAYMENT_METHOD1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_CUST_ACC_PAYMENT_METHOD1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsHidden, "CUSTOMER_ACCOUNT_ID", "CUSTOMER ACCOUNT ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", $Method, NULL), $this);
            $this->CUSTOMER_ACCOUNT_ID->Required = true;
            $this->P_PAYMENT_METHOD_ID = & new clsControl(ccsHidden, "P_PAYMENT_METHOD_ID", "P PAYMENT METHOD ID", ccsFloat, "", CCGetRequestParam("P_PAYMENT_METHOD_ID", $Method, NULL), $this);
            $this->P_PAYMENT_METHOD_ID->Required = true;
            $this->P_PAYMENT_METHOD_TYPE_ID = & new clsControl(ccsHidden, "P_PAYMENT_METHOD_TYPE_ID", "P PAYMENT METHOD TYPE ID", ccsFloat, "", CCGetRequestParam("P_PAYMENT_METHOD_TYPE_ID", $Method, NULL), $this);
            $this->CUST_ACC_PAYMENT_METHOD_ID = & new clsControl(ccsTextBox, "CUST_ACC_PAYMENT_METHOD_ID", "CUST_ACC_PAYMENT_METHOD_ID", ccsFloat, "", CCGetRequestParam("CUST_ACC_PAYMENT_METHOD_ID", $Method, NULL), $this);
            $this->PAYMENT_METHOD_CODE = & new clsControl(ccsTextBox, "PAYMENT_METHOD_CODE", "PAYMENT METHOD CODE", ccsText, "", CCGetRequestParam("PAYMENT_METHOD_CODE", $Method, NULL), $this);
            $this->PAYMENT_METHOD_CODE->Required = true;
            $this->PAYMENT_METHOD_TYPE_CODE = & new clsControl(ccsTextBox, "PAYMENT_METHOD_TYPE_CODE", "PAYMENT METHOD TYPE CODE", ccsText, "", CCGetRequestParam("PAYMENT_METHOD_TYPE_CODE", $Method, NULL), $this);
            $this->REFERENCE_NO = & new clsControl(ccsTextBox, "REFERENCE_NO", "REFERENCE NO", ccsText, "", CCGetRequestParam("REFERENCE_NO", $Method, NULL), $this);
            $this->REFERENCE_NO->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->REFERENCE_NAME = & new clsControl(ccsTextBox, "REFERENCE_NAME", "REFERENCE NAME", ccsText, "", CCGetRequestParam("REFERENCE_NAME", $Method, NULL), $this);
            $this->BANK_NAME = & new clsControl(ccsTextBox, "BANK_NAME", "BANK NAME", ccsText, "", CCGetRequestParam("BANK_NAME", $Method, NULL), $this);
            $this->REF_VALID_FROM = & new clsControl(ccsTextBox, "REF_VALID_FROM", "REF VALID FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("REF_VALID_FROM", $Method, NULL), $this);
            $this->REF_VALID_TO = & new clsControl(ccsTextBox, "REF_VALID_TO", "REF VALID TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("REF_VALID_TO", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @395-FAEAF6E1
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUST_ACC_PAYMENT_METHOD_ID"] = CCGetFromGet("CUST_ACC_PAYMENT_METHOD_ID", NULL);
    }
//End Initialize Method

//Validate Method @395-1EF114ED
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CUSTOMER_ACCOUNT_ID->Validate() && $Validation);
        $Validation = ($this->P_PAYMENT_METHOD_ID->Validate() && $Validation);
        $Validation = ($this->P_PAYMENT_METHOD_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->CUST_ACC_PAYMENT_METHOD_ID->Validate() && $Validation);
        $Validation = ($this->PAYMENT_METHOD_CODE->Validate() && $Validation);
        $Validation = ($this->PAYMENT_METHOD_TYPE_CODE->Validate() && $Validation);
        $Validation = ($this->REFERENCE_NO->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->REFERENCE_NAME->Validate() && $Validation);
        $Validation = ($this->BANK_NAME->Validate() && $Validation);
        $Validation = ($this->REF_VALID_FROM->Validate() && $Validation);
        $Validation = ($this->REF_VALID_TO->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CUSTOMER_ACCOUNT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_PAYMENT_METHOD_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_PAYMENT_METHOD_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUST_ACC_PAYMENT_METHOD_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PAYMENT_METHOD_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PAYMENT_METHOD_TYPE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REFERENCE_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REFERENCE_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BANK_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REF_VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REF_VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @395-CD91719D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CUSTOMER_ACCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->P_PAYMENT_METHOD_ID->Errors->Count());
        $errors = ($errors || $this->P_PAYMENT_METHOD_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->CUST_ACC_PAYMENT_METHOD_ID->Errors->Count());
        $errors = ($errors || $this->PAYMENT_METHOD_CODE->Errors->Count());
        $errors = ($errors || $this->PAYMENT_METHOD_TYPE_CODE->Errors->Count());
        $errors = ($errors || $this->REFERENCE_NO->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->REFERENCE_NAME->Errors->Count());
        $errors = ($errors || $this->BANK_NAME->Errors->Count());
        $errors = ($errors || $this->REF_VALID_FROM->Errors->Count());
        $errors = ($errors || $this->REF_VALID_TO->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @395-ED598703
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

//Operation Method @395-D6A16116
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            } else if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Delete") {
            $Redirect = "cust_acc_payment_method.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "CUST_ACC_PAYMENT_METHOD_ID"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "s_keyword"));
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @395-6A61FE39
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CUSTOMER_ACCOUNT_ID->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        $this->DataSource->P_PAYMENT_METHOD_ID->SetValue($this->P_PAYMENT_METHOD_ID->GetValue(true));
        $this->DataSource->P_PAYMENT_METHOD_TYPE_ID->SetValue($this->P_PAYMENT_METHOD_TYPE_ID->GetValue(true));
        $this->DataSource->CUST_ACC_PAYMENT_METHOD_ID->SetValue($this->CUST_ACC_PAYMENT_METHOD_ID->GetValue(true));
        $this->DataSource->REFERENCE_NO->SetValue($this->REFERENCE_NO->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->REFERENCE_NAME->SetValue($this->REFERENCE_NAME->GetValue(true));
        $this->DataSource->BANK_NAME->SetValue($this->BANK_NAME->GetValue(true));
        $this->DataSource->REF_VALID_FROM->SetValue($this->REF_VALID_FROM->GetValue(true));
        $this->DataSource->REF_VALID_TO->SetValue($this->REF_VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @395-28FA5D00
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CUSTOMER_ACCOUNT_ID->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        $this->DataSource->P_PAYMENT_METHOD_ID->SetValue($this->P_PAYMENT_METHOD_ID->GetValue(true));
        $this->DataSource->P_PAYMENT_METHOD_TYPE_ID->SetValue($this->P_PAYMENT_METHOD_TYPE_ID->GetValue(true));
        $this->DataSource->REFERENCE_NO->SetValue($this->REFERENCE_NO->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->REFERENCE_NAME->SetValue($this->REFERENCE_NAME->GetValue(true));
        $this->DataSource->BANK_NAME->SetValue($this->BANK_NAME->GetValue(true));
        $this->DataSource->REF_VALID_FROM->SetValue($this->REF_VALID_FROM->GetValue(true));
        $this->DataSource->REF_VALID_TO->SetValue($this->REF_VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @395-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @395-1A88B6D7
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
                if(!$this->FormSubmitted){
                    $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                    $this->P_PAYMENT_METHOD_ID->SetValue($this->DataSource->P_PAYMENT_METHOD_ID->GetValue());
                    $this->P_PAYMENT_METHOD_TYPE_ID->SetValue($this->DataSource->P_PAYMENT_METHOD_TYPE_ID->GetValue());
                    $this->CUST_ACC_PAYMENT_METHOD_ID->SetValue($this->DataSource->CUST_ACC_PAYMENT_METHOD_ID->GetValue());
                    $this->PAYMENT_METHOD_CODE->SetValue($this->DataSource->PAYMENT_METHOD_CODE->GetValue());
                    $this->PAYMENT_METHOD_TYPE_CODE->SetValue($this->DataSource->PAYMENT_METHOD_TYPE_CODE->GetValue());
                    $this->REFERENCE_NO->SetValue($this->DataSource->REFERENCE_NO->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->REFERENCE_NAME->SetValue($this->DataSource->REFERENCE_NAME->GetValue());
                    $this->BANK_NAME->SetValue($this->DataSource->BANK_NAME->GetValue());
                    $this->REF_VALID_FROM->SetValue($this->DataSource->REF_VALID_FROM->GetValue());
                    $this->REF_VALID_TO->SetValue($this->DataSource->REF_VALID_TO->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_PAYMENT_METHOD_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_PAYMENT_METHOD_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUST_ACC_PAYMENT_METHOD_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PAYMENT_METHOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PAYMENT_METHOD_TYPE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REFERENCE_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REFERENCE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BANK_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REF_VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REF_VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
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
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->CUSTOMER_ACCOUNT_ID->Show();
        $this->P_PAYMENT_METHOD_ID->Show();
        $this->P_PAYMENT_METHOD_TYPE_ID->Show();
        $this->CUST_ACC_PAYMENT_METHOD_ID->Show();
        $this->PAYMENT_METHOD_CODE->Show();
        $this->PAYMENT_METHOD_TYPE_CODE->Show();
        $this->REFERENCE_NO->Show();
        $this->VALID_FROM->Show();
        $this->VALID_TO->Show();
        $this->UPDATE_DATE->Show();
        $this->REFERENCE_NAME->Show();
        $this->BANK_NAME->Show();
        $this->REF_VALID_FROM->Show();
        $this->REF_VALID_TO->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->Button_Cancel->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_CUST_ACC_PAYMENT_METHOD1 Class @395-FCB6E20C

class clsV_CUST_ACC_PAYMENT_METHOD1DataSource extends clsDBConn {  //V_CUST_ACC_PAYMENT_METHOD1DataSource Class @395-FE92977C

//DataSource Variables @395-A451A517
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
    var $CUSTOMER_ACCOUNT_ID;
    var $P_PAYMENT_METHOD_ID;
    var $P_PAYMENT_METHOD_TYPE_ID;
    var $CUST_ACC_PAYMENT_METHOD_ID;
    var $PAYMENT_METHOD_CODE;
    var $PAYMENT_METHOD_TYPE_CODE;
    var $REFERENCE_NO;
    var $VALID_FROM;
    var $VALID_TO;
    var $UPDATE_DATE;
    var $REFERENCE_NAME;
    var $BANK_NAME;
    var $REF_VALID_FROM;
    var $REF_VALID_TO;
    var $DESCRIPTION;
    var $UPDATE_BY;
//End DataSource Variables

//DataSourceClass_Initialize Event @395-A47D4288
    function clsV_CUST_ACC_PAYMENT_METHOD1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_CUST_ACC_PAYMENT_METHOD1/Error";
        $this->Initialize();
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsFloat, "");
        
        $this->P_PAYMENT_METHOD_ID = new clsField("P_PAYMENT_METHOD_ID", ccsFloat, "");
        
        $this->P_PAYMENT_METHOD_TYPE_ID = new clsField("P_PAYMENT_METHOD_TYPE_ID", ccsFloat, "");
        
        $this->CUST_ACC_PAYMENT_METHOD_ID = new clsField("CUST_ACC_PAYMENT_METHOD_ID", ccsFloat, "");
        
        $this->PAYMENT_METHOD_CODE = new clsField("PAYMENT_METHOD_CODE", ccsText, "");
        
        $this->PAYMENT_METHOD_TYPE_CODE = new clsField("PAYMENT_METHOD_TYPE_CODE", ccsText, "");
        
        $this->REFERENCE_NO = new clsField("REFERENCE_NO", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->REFERENCE_NAME = new clsField("REFERENCE_NAME", ccsText, "");
        
        $this->BANK_NAME = new clsField("BANK_NAME", ccsText, "");
        
        $this->REF_VALID_FROM = new clsField("REF_VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->REF_VALID_TO = new clsField("REF_VALID_TO", ccsDate, $this->DateFormat);
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @395-7E17AD10
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUST_ACC_PAYMENT_METHOD_ID", ccsFloat, "", "", $this->Parameters["urlCUST_ACC_PAYMENT_METHOD_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "CUST_ACC_PAYMENT_METHOD_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @395-36911030
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_CUST_ACC_PAYMENT_METHOD {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @395-AABCEB71
    function SetValues()
    {
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue(trim($this->f("CUSTOMER_ACCOUNT_ID")));
        $this->P_PAYMENT_METHOD_ID->SetDBValue(trim($this->f("P_PAYMENT_METHOD_ID")));
        $this->P_PAYMENT_METHOD_TYPE_ID->SetDBValue(trim($this->f("P_PAYMENT_METHOD_TYPE_ID")));
        $this->CUST_ACC_PAYMENT_METHOD_ID->SetDBValue(trim($this->f("CUST_ACC_PAYMENT_METHOD_ID")));
        $this->PAYMENT_METHOD_CODE->SetDBValue($this->f("PAYMENT_METHOD_CODE"));
        $this->PAYMENT_METHOD_TYPE_CODE->SetDBValue($this->f("PAYMENT_METHOD_TYPE_CODE"));
        $this->REFERENCE_NO->SetDBValue($this->f("REFERENCE_NO"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->REFERENCE_NAME->SetDBValue($this->f("REFERENCE_NAME"));
        $this->BANK_NAME->SetDBValue($this->f("BANK_NAME"));
        $this->REF_VALID_FROM->SetDBValue(trim($this->f("REF_VALID_FROM")));
        $this->REF_VALID_TO->SetDBValue(trim($this->f("REF_VALID_TO")));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
    }
//End SetValues Method

//Insert Method @395-0138BE32
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("ctrlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->CUSTOMER_ACCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_PAYMENT_METHOD_ID"] = new clsSQLParameter("ctrlP_PAYMENT_METHOD_ID", ccsFloat, "", "", $this->P_PAYMENT_METHOD_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_PAYMENT_METHOD_TYPE_ID"] = new clsSQLParameter("ctrlP_PAYMENT_METHOD_TYPE_ID", ccsFloat, "", "", $this->P_PAYMENT_METHOD_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUST_ACC_PAYMENT_METHOD_ID"] = new clsSQLParameter("ctrlCUST_ACC_PAYMENT_METHOD_ID", ccsFloat, "", "", $this->CUST_ACC_PAYMENT_METHOD_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REFERENCE_NO"] = new clsSQLParameter("ctrlREFERENCE_NO", ccsText, "", "", $this->REFERENCE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REFERENCE_NAME"] = new clsSQLParameter("ctrlREFERENCE_NAME", ccsText, "", "", $this->REFERENCE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BANK_NAME"] = new clsSQLParameter("ctrlBANK_NAME", ccsText, "", "", $this->BANK_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REF_VALID_FROM"] = new clsSQLParameter("ctrlREF_VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->REF_VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REF_VALID_TO"] = new clsSQLParameter("ctrlREF_VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->REF_VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["P_PAYMENT_METHOD_ID"]->GetValue()) and !strlen($this->cp["P_PAYMENT_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_PAYMENT_METHOD_ID"]->GetValue())) 
            $this->cp["P_PAYMENT_METHOD_ID"]->SetValue($this->P_PAYMENT_METHOD_ID->GetValue(true));
        if (!is_null($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetValue())) 
            $this->cp["P_PAYMENT_METHOD_TYPE_ID"]->SetValue($this->P_PAYMENT_METHOD_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue()) and !strlen($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetText()) and !is_bool($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue())) 
            $this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->SetValue($this->CUST_ACC_PAYMENT_METHOD_ID->GetValue(true));
        if (!is_null($this->cp["REFERENCE_NO"]->GetValue()) and !strlen($this->cp["REFERENCE_NO"]->GetText()) and !is_bool($this->cp["REFERENCE_NO"]->GetValue())) 
            $this->cp["REFERENCE_NO"]->SetValue($this->REFERENCE_NO->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["REFERENCE_NAME"]->GetValue()) and !strlen($this->cp["REFERENCE_NAME"]->GetText()) and !is_bool($this->cp["REFERENCE_NAME"]->GetValue())) 
            $this->cp["REFERENCE_NAME"]->SetValue($this->REFERENCE_NAME->GetValue(true));
        if (!is_null($this->cp["BANK_NAME"]->GetValue()) and !strlen($this->cp["BANK_NAME"]->GetText()) and !is_bool($this->cp["BANK_NAME"]->GetValue())) 
            $this->cp["BANK_NAME"]->SetValue($this->BANK_NAME->GetValue(true));
        if (!is_null($this->cp["REF_VALID_FROM"]->GetValue()) and !strlen($this->cp["REF_VALID_FROM"]->GetText()) and !is_bool($this->cp["REF_VALID_FROM"]->GetValue())) 
            $this->cp["REF_VALID_FROM"]->SetValue($this->REF_VALID_FROM->GetValue(true));
        if (!is_null($this->cp["REF_VALID_TO"]->GetValue()) and !strlen($this->cp["REF_VALID_TO"]->GetText()) and !is_bool($this->cp["REF_VALID_TO"]->GetValue())) 
            $this->cp["REF_VALID_TO"]->SetValue($this->REF_VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "INSERT INTO CUST_ACC_PAYMENT_METHOD(\n" .
        "    CUST_ACC_PAYMENT_METHOD_ID,\n" .
        "    CUSTOMER_ACCOUNT_ID,\n" .
        "    P_PAYMENT_METHOD_ID,\n" .
        "    P_PAYMENT_METHOD_TYPE_ID, \n" .
        "    REFERENCE_NO,\n" .
        "    VALID_FROM,\n" .
        "    VALID_TO,\n" .
        "    REFERENCE_NAME,    \n" .
        "    BANK_NAME,\n" .
        "    REF_VALID_FROM,\n" .
        "    REF_VALID_TO,\n" .
        "    DESCRIPTION,\n" .
        "    UPDATE_DATE,\n" .
        "    UPDATE_BY) \n" .
        "VALUES(\n" .
        "    generate_id('BILLDB','CUST_ACC_PAYMENT_METHOD','CUST_ACC_PAYMENT_METHOD_ID'),\n" .
        "    " . $this->SQLValue($this->cp["CUSTOMER_ACCOUNT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "    " . $this->SQLValue($this->cp["P_PAYMENT_METHOD_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "    " . $this->SQLValue($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "    '" . $this->SQLValue($this->cp["REFERENCE_NO"]->GetDBValue(), ccsText) . "',\n" .
        "    to_date(substr('" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "    to_date(substr('" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "    '" . $this->SQLValue($this->cp["REFERENCE_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "    '" . $this->SQLValue($this->cp["BANK_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "    to_date(substr('" . $this->SQLValue($this->cp["REF_VALID_FROM"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "    to_date(substr('" . $this->SQLValue($this->cp["REF_VALID_TO"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "    '" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "    SYSDATE,\n" .
        "    '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "    )";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @395-3B099E97
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("ctrlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->CUSTOMER_ACCOUNT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_PAYMENT_METHOD_ID"] = new clsSQLParameter("ctrlP_PAYMENT_METHOD_ID", ccsFloat, "", "", $this->P_PAYMENT_METHOD_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_PAYMENT_METHOD_TYPE_ID"] = new clsSQLParameter("ctrlP_PAYMENT_METHOD_TYPE_ID", ccsFloat, "", "", $this->P_PAYMENT_METHOD_TYPE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUST_ACC_PAYMENT_METHOD_ID"] = new clsSQLParameter("urlCUST_ACC_PAYMENT_METHOD_ID", ccsFloat, "", "", CCGetFromGet("CUST_ACC_PAYMENT_METHOD_ID", NULL), 0, false, $this->ErrorBlock);
        $this->cp["REFERENCE_NO"] = new clsSQLParameter("ctrlREFERENCE_NO", ccsText, "", "", $this->REFERENCE_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REFERENCE_NAME"] = new clsSQLParameter("ctrlREFERENCE_NAME", ccsText, "", "", $this->REFERENCE_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BANK_NAME"] = new clsSQLParameter("ctrlBANK_NAME", ccsText, "", "", $this->BANK_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REF_VALID_FROM"] = new clsSQLParameter("ctrlREF_VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->REF_VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REF_VALID_TO"] = new clsSQLParameter("ctrlREF_VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->REF_VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        if (!is_null($this->cp["P_PAYMENT_METHOD_ID"]->GetValue()) and !strlen($this->cp["P_PAYMENT_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_PAYMENT_METHOD_ID"]->GetValue())) 
            $this->cp["P_PAYMENT_METHOD_ID"]->SetValue($this->P_PAYMENT_METHOD_ID->GetValue(true));
        if (!is_null($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetValue())) 
            $this->cp["P_PAYMENT_METHOD_TYPE_ID"]->SetValue($this->P_PAYMENT_METHOD_TYPE_ID->GetValue(true));
        if (!is_null($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue()) and !strlen($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetText()) and !is_bool($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue())) 
            $this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->SetText(CCGetFromGet("CUST_ACC_PAYMENT_METHOD_ID", NULL));
        if (!strlen($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetText()) and !is_bool($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue(true))) 
            $this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->SetText(0);
        if (!is_null($this->cp["REFERENCE_NO"]->GetValue()) and !strlen($this->cp["REFERENCE_NO"]->GetText()) and !is_bool($this->cp["REFERENCE_NO"]->GetValue())) 
            $this->cp["REFERENCE_NO"]->SetValue($this->REFERENCE_NO->GetValue(true));
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["REFERENCE_NAME"]->GetValue()) and !strlen($this->cp["REFERENCE_NAME"]->GetText()) and !is_bool($this->cp["REFERENCE_NAME"]->GetValue())) 
            $this->cp["REFERENCE_NAME"]->SetValue($this->REFERENCE_NAME->GetValue(true));
        if (!is_null($this->cp["BANK_NAME"]->GetValue()) and !strlen($this->cp["BANK_NAME"]->GetText()) and !is_bool($this->cp["BANK_NAME"]->GetValue())) 
            $this->cp["BANK_NAME"]->SetValue($this->BANK_NAME->GetValue(true));
        if (!is_null($this->cp["REF_VALID_FROM"]->GetValue()) and !strlen($this->cp["REF_VALID_FROM"]->GetText()) and !is_bool($this->cp["REF_VALID_FROM"]->GetValue())) 
            $this->cp["REF_VALID_FROM"]->SetValue($this->REF_VALID_FROM->GetValue(true));
        if (!is_null($this->cp["REF_VALID_TO"]->GetValue()) and !strlen($this->cp["REF_VALID_TO"]->GetText()) and !is_bool($this->cp["REF_VALID_TO"]->GetValue())) 
            $this->cp["REF_VALID_TO"]->SetValue($this->REF_VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "UPDATE CUST_ACC_PAYMENT_METHOD \n" .
        "SET  P_PAYMENT_METHOD_ID=" . $this->SQLValue($this->cp["P_PAYMENT_METHOD_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "        P_PAYMENT_METHOD_TYPE_ID=" . $this->SQLValue($this->cp["P_PAYMENT_METHOD_TYPE_ID"]->GetDBValue(), ccsFloat) . ", \n" .
        "        REFERENCE_NO='" . $this->SQLValue($this->cp["REFERENCE_NO"]->GetDBValue(), ccsText) . "', \n" .
        "        VALID_FROM=to_date(substr('" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'), \n" .
        "        VALID_TO=to_date(substr('" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "        UPDATE_DATE=SYSDATE, \n" .
        "        REFERENCE_NAME='" . $this->SQLValue($this->cp["REFERENCE_NAME"]->GetDBValue(), ccsText) . "', \n" .
        "        BANK_NAME='" . $this->SQLValue($this->cp["BANK_NAME"]->GetDBValue(), ccsText) . "', \n" .
        "        REF_VALID_FROM=to_date(substr('" . $this->SQLValue($this->cp["REF_VALID_FROM"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "        REF_VALID_TO=to_date(substr('" . $this->SQLValue($this->cp["REF_VALID_TO"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),  \n" .
        "        DESCRIPTION='" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "', \n" .
        "        UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "' \n" .
        "WHERE  \n" .
        "        CUST_ACC_PAYMENT_METHOD_ID = " . $this->SQLValue($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @395-4159B636
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUST_ACC_PAYMENT_METHOD_ID"] = new clsSQLParameter("urlCUST_ACC_PAYMENT_METHOD_ID", ccsFloat, "", "", CCGetFromGet("CUST_ACC_PAYMENT_METHOD_ID", NULL), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue()) and !strlen($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetText()) and !is_bool($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue())) 
            $this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->SetText(CCGetFromGet("CUST_ACC_PAYMENT_METHOD_ID", NULL));
        if (!strlen($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetText()) and !is_bool($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetValue(true))) 
            $this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->SetText(0);
        $this->SQL = "DELETE FROM CUST_ACC_PAYMENT_METHOD \n" .
        "WHERE  CUST_ACC_PAYMENT_METHOD_ID = " . $this->SQLValue($this->cp["CUST_ACC_PAYMENT_METHOD_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_CUST_ACC_PAYMENT_METHOD1DataSource Class @395-FCB6E20C

//Initialize Page @1-0DD996C4
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
$TemplateFileName = "cust_acc_payment_method.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-A9CA8044
include_once("./cust_acc_payment_method_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-CA973804
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_CUST_ACC_PAYMENT_METHOD = & new clsGridV_CUST_ACC_PAYMENT_METHOD("", $MainPage);
$p_customer_account = & new clsRecordp_customer_account("", $MainPage);
$V_CUST_ACC_PAYMENT_METHOD1 = & new clsRecordV_CUST_ACC_PAYMENT_METHOD1("", $MainPage);
$MainPage->V_CUST_ACC_PAYMENT_METHOD = & $V_CUST_ACC_PAYMENT_METHOD;
$MainPage->p_customer_account = & $p_customer_account;
$MainPage->V_CUST_ACC_PAYMENT_METHOD1 = & $V_CUST_ACC_PAYMENT_METHOD1;
$V_CUST_ACC_PAYMENT_METHOD->Initialize();
$p_customer_account->Initialize();
$V_CUST_ACC_PAYMENT_METHOD1->Initialize();

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

//Execute Components @1-623E2213
$p_customer_account->Operation();
$V_CUST_ACC_PAYMENT_METHOD1->Operation();
//End Execute Components

//Go to destination page @1-0337475D
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_CUST_ACC_PAYMENT_METHOD);
    unset($p_customer_account);
    unset($V_CUST_ACC_PAYMENT_METHOD1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-DC7363EF
$V_CUST_ACC_PAYMENT_METHOD->Show();
$p_customer_account->Show();
$V_CUST_ACC_PAYMENT_METHOD1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-445C0AA1
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_CUST_ACC_PAYMENT_METHOD);
unset($p_customer_account);
unset($V_CUST_ACC_PAYMENT_METHOD1);
unset($Tpl);
//End Unload Page


?>
