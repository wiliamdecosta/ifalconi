<?php
//Include Common Files @1-635F45DE
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_data/");
define("FileName", "customer_account.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridV_CUSTOMER_ACCOUNT { //V_CUSTOMER_ACCOUNT class @2-C78BEEEF

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

//Class_Initialize Event @2-BA716750
    function clsGridV_CUSTOMER_ACCOUNT($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "V_CUSTOMER_ACCOUNT";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid V_CUSTOMER_ACCOUNT";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsV_CUSTOMER_ACCOUNTDataSource($this);
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

        $this->ACCOUNT_NO = & new clsControl(ccsLabel, "ACCOUNT_NO", "ACCOUNT_NO", ccsText, "", CCGetRequestParam("ACCOUNT_NO", ccsGet, NULL), $this);
        $this->LAST_NAME = & new clsControl(ccsLabel, "LAST_NAME", "LAST_NAME", ccsText, "", CCGetRequestParam("LAST_NAME", ccsGet, NULL), $this);
        $this->ADDRESS_1 = & new clsControl(ccsLabel, "ADDRESS_1", "ADDRESS_1", ccsText, "", CCGetRequestParam("ADDRESS_1", ccsGet, NULL), $this);
        $this->CUSTOMER_SEGMENT_CODE = & new clsControl(ccsLabel, "CUSTOMER_SEGMENT_CODE", "CUSTOMER_SEGMENT_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_SEGMENT_CODE", ccsGet, NULL), $this);
        $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsLabel, "BILL_PERIOD_UNIT_CODE", "BILL_PERIOD_UNIT_CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", ccsGet, NULL), $this);
        $this->CHARGING_METHOD_CODE = & new clsControl(ccsLabel, "CHARGING_METHOD_CODE", "CHARGING_METHOD_CODE", ccsText, "", CCGetRequestParam("CHARGING_METHOD_CODE", ccsGet, NULL), $this);
        $this->CUSTOMER_NUMBER = & new clsControl(ccsLabel, "CUSTOMER_NUMBER", "CUSTOMER_NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", ccsGet, NULL), $this);
        $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsHidden, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", ccsGet, NULL), $this);
        $this->CUSTOMER_ID = & new clsControl(ccsHidden, "CUSTOMER_ID", "CUSTOMER_ID", ccsFloat, "", CCGetRequestParam("CUSTOMER_ID", ccsGet, NULL), $this);
        $this->P_CUSTOMER_SEGMENT_ID = & new clsControl(ccsHidden, "P_CUSTOMER_SEGMENT_ID", "P_CUSTOMER_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_ID", ccsGet, NULL), $this);
        $this->P_CUSTOMER_TITLE_ID = & new clsControl(ccsHidden, "P_CUSTOMER_TITLE_ID", "P_CUSTOMER_TITLE_ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_TITLE_ID", ccsGet, NULL), $this);
        $this->ADDRESS_2 = & new clsControl(ccsLabel, "ADDRESS_2", "ADDRESS_2", ccsText, "", CCGetRequestParam("ADDRESS_2", ccsGet, NULL), $this);
        $this->ADDRESS_3 = & new clsControl(ccsLabel, "ADDRESS_3", "ADDRESS_3", ccsText, "", CCGetRequestParam("ADDRESS_3", ccsGet, NULL), $this);
        $this->P_REGION_ID = & new clsControl(ccsHidden, "P_REGION_ID", "P_REGION_ID", ccsFloat, "", CCGetRequestParam("P_REGION_ID", ccsGet, NULL), $this);
        $this->REGION_NAME = & new clsControl(ccsLabel, "REGION_NAME", "REGION_NAME", ccsText, "", CCGetRequestParam("REGION_NAME", ccsGet, NULL), $this);
        $this->CUSTOMER_TITLE_CODE = & new clsControl(ccsLabel, "CUSTOMER_TITLE_CODE", "CUSTOMER_TITLE_CODE", ccsText, "", CCGetRequestParam("CUSTOMER_TITLE_CODE", ccsGet, NULL), $this);
        $this->CUSTOMER_NAME = & new clsControl(ccsLabel, "CUSTOMER_NAME", "CUSTOMER_NAME", ccsText, "", CCGetRequestParam("CUSTOMER_NAME", ccsGet, NULL), $this);
        $this->ZIP_CODE = & new clsControl(ccsLabel, "ZIP_CODE", "ZIP_CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", ccsGet, NULL), $this);
        $this->P_BILL_CYCLE_ID = & new clsControl(ccsHidden, "P_BILL_CYCLE_ID", "P_BILL_CYCLE_ID", ccsFloat, "", CCGetRequestParam("P_BILL_CYCLE_ID", ccsGet, NULL), $this);
        $this->P_CURRENCY_ID = & new clsControl(ccsHidden, "P_CURRENCY_ID", "P_CURRENCY_ID", ccsFloat, "", CCGetRequestParam("P_CURRENCY_ID", ccsGet, NULL), $this);
        $this->P_BILLING_PERIOD_UNIT_ID = & new clsControl(ccsHidden, "P_BILLING_PERIOD_UNIT_ID", "P_BILLING_PERIOD_UNIT_ID", ccsFloat, "", CCGetRequestParam("P_BILLING_PERIOD_UNIT_ID", ccsGet, NULL), $this);
        $this->P_CHARGING_METHOD_ID = & new clsControl(ccsHidden, "P_CHARGING_METHOD_ID", "P_CHARGING_METHOD_ID", ccsFloat, "", CCGetRequestParam("P_CHARGING_METHOD_ID", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "customer_account.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "customer_account.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 3, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->V_P_CUSTOMER_ACCOUNT_Insert = & new clsControl(ccsLink, "V_P_CUSTOMER_ACCOUNT_Insert", "V_P_CUSTOMER_ACCOUNT_Insert", ccsText, "", CCGetRequestParam("V_P_CUSTOMER_ACCOUNT_Insert", ccsGet, NULL), $this);
        $this->V_P_CUSTOMER_ACCOUNT_Insert->Page = "customer_account.php";
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

//Show Method @2-4E731B54
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);

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
            $this->ControlsVisible["ACCOUNT_NO"] = $this->ACCOUNT_NO->Visible;
            $this->ControlsVisible["LAST_NAME"] = $this->LAST_NAME->Visible;
            $this->ControlsVisible["ADDRESS_1"] = $this->ADDRESS_1->Visible;
            $this->ControlsVisible["CUSTOMER_SEGMENT_CODE"] = $this->CUSTOMER_SEGMENT_CODE->Visible;
            $this->ControlsVisible["BILL_PERIOD_UNIT_CODE"] = $this->BILL_PERIOD_UNIT_CODE->Visible;
            $this->ControlsVisible["CHARGING_METHOD_CODE"] = $this->CHARGING_METHOD_CODE->Visible;
            $this->ControlsVisible["CUSTOMER_NUMBER"] = $this->CUSTOMER_NUMBER->Visible;
            $this->ControlsVisible["CUSTOMER_ACCOUNT_ID"] = $this->CUSTOMER_ACCOUNT_ID->Visible;
            $this->ControlsVisible["CUSTOMER_ID"] = $this->CUSTOMER_ID->Visible;
            $this->ControlsVisible["P_CUSTOMER_SEGMENT_ID"] = $this->P_CUSTOMER_SEGMENT_ID->Visible;
            $this->ControlsVisible["P_CUSTOMER_TITLE_ID"] = $this->P_CUSTOMER_TITLE_ID->Visible;
            $this->ControlsVisible["ADDRESS_2"] = $this->ADDRESS_2->Visible;
            $this->ControlsVisible["ADDRESS_3"] = $this->ADDRESS_3->Visible;
            $this->ControlsVisible["P_REGION_ID"] = $this->P_REGION_ID->Visible;
            $this->ControlsVisible["REGION_NAME"] = $this->REGION_NAME->Visible;
            $this->ControlsVisible["CUSTOMER_TITLE_CODE"] = $this->CUSTOMER_TITLE_CODE->Visible;
            $this->ControlsVisible["CUSTOMER_NAME"] = $this->CUSTOMER_NAME->Visible;
            $this->ControlsVisible["ZIP_CODE"] = $this->ZIP_CODE->Visible;
            $this->ControlsVisible["P_BILL_CYCLE_ID"] = $this->P_BILL_CYCLE_ID->Visible;
            $this->ControlsVisible["P_CURRENCY_ID"] = $this->P_CURRENCY_ID->Visible;
            $this->ControlsVisible["P_BILLING_PERIOD_UNIT_ID"] = $this->P_BILLING_PERIOD_UNIT_ID->Visible;
            $this->ControlsVisible["P_CHARGING_METHOD_ID"] = $this->P_CHARGING_METHOD_ID->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->ACCOUNT_NO->SetValue($this->DataSource->ACCOUNT_NO->GetValue());
                $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                $this->ADDRESS_1->SetValue($this->DataSource->ADDRESS_1->GetValue());
                $this->CUSTOMER_SEGMENT_CODE->SetValue($this->DataSource->CUSTOMER_SEGMENT_CODE->GetValue());
                $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                $this->CHARGING_METHOD_CODE->SetValue($this->DataSource->CHARGING_METHOD_CODE->GetValue());
                $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
                $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                $this->P_CUSTOMER_SEGMENT_ID->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_ID->GetValue());
                $this->P_CUSTOMER_TITLE_ID->SetValue($this->DataSource->P_CUSTOMER_TITLE_ID->GetValue());
                $this->ADDRESS_2->SetValue($this->DataSource->ADDRESS_2->GetValue());
                $this->ADDRESS_3->SetValue($this->DataSource->ADDRESS_3->GetValue());
                $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                $this->CUSTOMER_TITLE_CODE->SetValue($this->DataSource->CUSTOMER_TITLE_CODE->GetValue());
                $this->CUSTOMER_NAME->SetValue($this->DataSource->CUSTOMER_NAME->GetValue());
                $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                $this->P_BILL_CYCLE_ID->SetValue($this->DataSource->P_BILL_CYCLE_ID->GetValue());
                $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                $this->P_BILLING_PERIOD_UNIT_ID->SetValue($this->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue());
                $this->P_CHARGING_METHOD_ID->SetValue($this->DataSource->P_CHARGING_METHOD_ID->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "CUSTOMER_ACCOUNT_ID", $this->DataSource->f("CUSTOMER_ACCOUNT_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "CUSTOMER_ACCOUNT_ID", $this->DataSource->f("CUSTOMER_ACCOUNT_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->ACCOUNT_NO->Show();
                $this->LAST_NAME->Show();
                $this->ADDRESS_1->Show();
                $this->CUSTOMER_SEGMENT_CODE->Show();
                $this->BILL_PERIOD_UNIT_CODE->Show();
                $this->CHARGING_METHOD_CODE->Show();
                $this->CUSTOMER_NUMBER->Show();
                $this->CUSTOMER_ACCOUNT_ID->Show();
                $this->CUSTOMER_ID->Show();
                $this->P_CUSTOMER_SEGMENT_ID->Show();
                $this->P_CUSTOMER_TITLE_ID->Show();
                $this->ADDRESS_2->Show();
                $this->ADDRESS_3->Show();
                $this->P_REGION_ID->Show();
                $this->REGION_NAME->Show();
                $this->CUSTOMER_TITLE_CODE->Show();
                $this->CUSTOMER_NAME->Show();
                $this->ZIP_CODE->Show();
                $this->P_BILL_CYCLE_ID->Show();
                $this->P_CURRENCY_ID->Show();
                $this->P_BILLING_PERIOD_UNIT_ID->Show();
                $this->P_CHARGING_METHOD_ID->Show();
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
        $this->V_P_CUSTOMER_ACCOUNT_Insert->Parameters = CCGetQueryString("QueryString", array("CUSTOMER_ACCOUNT_ID", "ccsForm"));
        $this->V_P_CUSTOMER_ACCOUNT_Insert->Parameters = CCAddParam($this->V_P_CUSTOMER_ACCOUNT_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->V_P_CUSTOMER_ACCOUNT_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-FC05A186
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ACCOUNT_NO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LAST_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADDRESS_1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_SEGMENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGING_METHOD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_NUMBER->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CUSTOMER_SEGMENT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CUSTOMER_TITLE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADDRESS_2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADDRESS_3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_REGION_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->REGION_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_TITLE_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CUSTOMER_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ZIP_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BILL_CYCLE_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CURRENCY_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_BILLING_PERIOD_UNIT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_CHARGING_METHOD_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End V_CUSTOMER_ACCOUNT Class @2-FCB6E20C

class clsV_CUSTOMER_ACCOUNTDataSource extends clsDBConn {  //V_CUSTOMER_ACCOUNTDataSource Class @2-0044C9FA

//DataSource Variables @2-C87BED97
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $ACCOUNT_NO;
    var $LAST_NAME;
    var $ADDRESS_1;
    var $CUSTOMER_SEGMENT_CODE;
    var $BILL_PERIOD_UNIT_CODE;
    var $CHARGING_METHOD_CODE;
    var $CUSTOMER_NUMBER;
    var $CUSTOMER_ACCOUNT_ID;
    var $CUSTOMER_ID;
    var $P_CUSTOMER_SEGMENT_ID;
    var $P_CUSTOMER_TITLE_ID;
    var $ADDRESS_2;
    var $ADDRESS_3;
    var $P_REGION_ID;
    var $REGION_NAME;
    var $CUSTOMER_TITLE_CODE;
    var $CUSTOMER_NAME;
    var $ZIP_CODE;
    var $P_BILL_CYCLE_ID;
    var $P_CURRENCY_ID;
    var $P_BILLING_PERIOD_UNIT_ID;
    var $P_CHARGING_METHOD_ID;
    var $DLink;
    var $ADLink;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-AE347F61
    function clsV_CUSTOMER_ACCOUNTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid V_CUSTOMER_ACCOUNT";
        $this->Initialize();
        $this->ACCOUNT_NO = new clsField("ACCOUNT_NO", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->ADDRESS_1 = new clsField("ADDRESS_1", ccsText, "");
        
        $this->CUSTOMER_SEGMENT_CODE = new clsField("CUSTOMER_SEGMENT_CODE", ccsText, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->CHARGING_METHOD_CODE = new clsField("CHARGING_METHOD_CODE", ccsText, "");
        
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsFloat, "");
        
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsFloat, "");
        
        $this->P_CUSTOMER_SEGMENT_ID = new clsField("P_CUSTOMER_SEGMENT_ID", ccsFloat, "");
        
        $this->P_CUSTOMER_TITLE_ID = new clsField("P_CUSTOMER_TITLE_ID", ccsFloat, "");
        
        $this->ADDRESS_2 = new clsField("ADDRESS_2", ccsText, "");
        
        $this->ADDRESS_3 = new clsField("ADDRESS_3", ccsText, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsFloat, "");
        
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->CUSTOMER_TITLE_CODE = new clsField("CUSTOMER_TITLE_CODE", ccsText, "");
        
        $this->CUSTOMER_NAME = new clsField("CUSTOMER_NAME", ccsText, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->P_BILL_CYCLE_ID = new clsField("P_BILL_CYCLE_ID", ccsFloat, "");
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsFloat, "");
        
        $this->P_BILLING_PERIOD_UNIT_ID = new clsField("P_BILLING_PERIOD_UNIT_ID", ccsFloat, "");
        
        $this->P_CHARGING_METHOD_ID = new clsField("P_CHARGING_METHOD_ID", ccsFloat, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        

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

//Prepare Method @2-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-D946A1C6
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT *\n" .
        "FROM V_CUSTOMER_ACCOUNT\n" .
        "WHERE ( ACCOUNT_NO LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR ADDRESS_1 LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_SEGMENT_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_TITLE_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_NAME LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_NUMBER LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CHARGING_METHOD_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR BILL_PERIOD_UNIT_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR REGION_NAME LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') ) cnt";
        $this->SQL = "SELECT *\n" .
        "FROM V_CUSTOMER_ACCOUNT\n" .
        "WHERE ( ACCOUNT_NO LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR ADDRESS_1 LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_SEGMENT_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_TITLE_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_NAME LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CUSTOMER_NUMBER LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR CHARGING_METHOD_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR BILL_PERIOD_UNIT_CODE LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%'\n" .
        "OR REGION_NAME LIKE '%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%') ";
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

//SetValues Method @2-66887702
    function SetValues()
    {
        $this->ACCOUNT_NO->SetDBValue($this->f("ACCOUNT_NO"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->ADDRESS_1->SetDBValue($this->f("ADDRESS_1"));
        $this->CUSTOMER_SEGMENT_CODE->SetDBValue($this->f("CUSTOMER_SEGMENT_CODE"));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->CHARGING_METHOD_CODE->SetDBValue($this->f("CHARGING_METHOD_CODE"));
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue(trim($this->f("CUSTOMER_ACCOUNT_ID")));
        $this->CUSTOMER_ID->SetDBValue(trim($this->f("CUSTOMER_ID")));
        $this->P_CUSTOMER_SEGMENT_ID->SetDBValue(trim($this->f("P_CUSTOMER_SEGMENT_ID")));
        $this->P_CUSTOMER_TITLE_ID->SetDBValue(trim($this->f("P_CUSTOMER_TITLE_ID")));
        $this->ADDRESS_2->SetDBValue($this->f("ADDRESS_2"));
        $this->ADDRESS_3->SetDBValue($this->f("ADDRESS_3"));
        $this->P_REGION_ID->SetDBValue(trim($this->f("P_REGION_ID")));
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->CUSTOMER_TITLE_CODE->SetDBValue($this->f("CUSTOMER_TITLE_CODE"));
        $this->CUSTOMER_NAME->SetDBValue($this->f("CUSTOMER_NAME"));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->P_BILL_CYCLE_ID->SetDBValue(trim($this->f("P_BILL_CYCLE_ID")));
        $this->P_CURRENCY_ID->SetDBValue(trim($this->f("P_CURRENCY_ID")));
        $this->P_BILLING_PERIOD_UNIT_ID->SetDBValue(trim($this->f("P_BILLING_PERIOD_UNIT_ID")));
        $this->P_CHARGING_METHOD_ID->SetDBValue(trim($this->f("P_CHARGING_METHOD_ID")));
        $this->DLink->SetDBValue($this->f("CUSTOMER_ACCOUNT_ID"));
        $this->ADLink->SetDBValue($this->f("CUSTOMER_ACCOUNT_ID"));
    }
//End SetValues Method

} //End V_CUSTOMER_ACCOUNTDataSource Class @2-FCB6E20C

class clsRecordV_CUSTOMER_ACCOUNTSearch { //V_CUSTOMER_ACCOUNTSearch Class @3-58550929

//Variables @3-D6FF3E86

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

//Class_Initialize Event @3-FE3A321A
    function clsRecordV_CUSTOMER_ACCOUNTSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_CUSTOMER_ACCOUNTSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_CUSTOMER_ACCOUNTSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->s_keyword = & new clsControl(ccsTextBox, "s_keyword", "s_keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-A144A629
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-D6729123
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @3-ED598703
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

//Operation Method @3-CBE47EA3
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "customer_account.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "customer_account.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-7913FA87
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
            $Error = ComposeStrings($Error, $this->s_keyword->Errors->ToString());
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

        $this->s_keyword->Show();
        $this->Button_DoSearch->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End V_CUSTOMER_ACCOUNTSearch Class @3-FCB6E20C

class clsRecordV_CUSTOMER_ACCOUNT1 { //V_CUSTOMER_ACCOUNT1 Class @118-DA61FF4A

//Variables @118-D6FF3E86

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

//Class_Initialize Event @118-6047DFF5
    function clsRecordV_CUSTOMER_ACCOUNT1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record V_CUSTOMER_ACCOUNT1/Error";
        $this->DataSource = new clsV_CUSTOMER_ACCOUNT1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "V_CUSTOMER_ACCOUNT1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->ADDRESS_1 = & new clsControl(ccsTextBox, "ADDRESS_1", "ADDRESS 1", ccsText, "", CCGetRequestParam("ADDRESS_1", $Method, NULL), $this);
            $this->ADDRESS_1->Required = true;
            $this->ADDRESS_2 = & new clsControl(ccsTextBox, "ADDRESS_2", "ADDRESS 2", ccsText, "", CCGetRequestParam("ADDRESS_2", $Method, NULL), $this);
            $this->ADDRESS_3 = & new clsControl(ccsTextBox, "ADDRESS_3", "ADDRESS 3", ccsText, "", CCGetRequestParam("ADDRESS_3", $Method, NULL), $this);
            $this->ZIP_CODE = & new clsControl(ccsTextBox, "ZIP_CODE", "ZIP CODE", ccsFloat, "", CCGetRequestParam("ZIP_CODE", $Method, NULL), $this);
            $this->CCDB_CODE = & new clsControl(ccsTextBox, "CCDB_CODE", "CCDB CODE", ccsText, "", CCGetRequestParam("CCDB_CODE", $Method, NULL), $this);
            $this->BILLING_UNIT = & new clsControl(ccsTextBox, "BILLING_UNIT", "BILLING UNIT", ccsFloat, "", CCGetRequestParam("BILLING_UNIT", $Method, NULL), $this);
            $this->BILLING_UNIT->Required = true;
            $this->NEXT_BILL_DATE = & new clsControl(ccsTextBox, "NEXT_BILL_DATE", "NEXT BILL DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("NEXT_BILL_DATE", $Method, NULL), $this);
            $this->TERMINATION_DATE = & new clsControl(ccsTextBox, "TERMINATION_DATE", "TERMINATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("TERMINATION_DATE", $Method, NULL), $this);
            $this->TOTAL_PAID_AMT = & new clsControl(ccsTextBox, "TOTAL_PAID_AMT", "TOTAL PAID AMT", ccsFloat, "", CCGetRequestParam("TOTAL_PAID_AMT", $Method, NULL), $this);
            $this->LAST_PAID_AMT = & new clsControl(ccsTextBox, "LAST_PAID_AMT", "LAST PAID AMT", ccsFloat, "", CCGetRequestParam("LAST_PAID_AMT", $Method, NULL), $this);
            $this->NEXT_END_BILL_DATE = & new clsControl(ccsTextBox, "NEXT_END_BILL_DATE", "NEXT END BILL DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("NEXT_END_BILL_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->CUSTOMER_TITLE_CODE = & new clsControl(ccsTextBox, "CUSTOMER_TITLE_CODE", "CUSTOMER TITLE CODE", ccsText, "", CCGetRequestParam("CUSTOMER_TITLE_CODE", $Method, NULL), $this);
            $this->CUSTOMER_TITLE_CODE->Required = true;
            $this->REGION_NAME = & new clsControl(ccsTextBox, "REGION_NAME", "REGION NAME", ccsText, "", CCGetRequestParam("REGION_NAME", $Method, NULL), $this);
            $this->BILL_CYCLE_CODE = & new clsControl(ccsTextBox, "BILL_CYCLE_CODE", "BILL CYCLE CODE", ccsText, "", CCGetRequestParam("BILL_CYCLE_CODE", $Method, NULL), $this);
            $this->BILL_CYCLE_CODE->Required = true;
            $this->CUSTOMER_NAME = & new clsControl(ccsTextBox, "CUSTOMER_NAME", "CUSTOMER NAME", ccsText, "", CCGetRequestParam("CUSTOMER_NAME", $Method, NULL), $this);
            $this->CUSTOMER_NAME->Required = true;
            $this->ACCOUNT_NO = & new clsControl(ccsTextBox, "ACCOUNT_NO", "ACCOUNT NO", ccsText, "", CCGetRequestParam("ACCOUNT_NO", $Method, NULL), $this);
            $this->ACCOUNT_NO->Required = true;
            $this->CUSTOMER_ACCOUNT_ID = & new clsControl(ccsTextBox, "CUSTOMER_ACCOUNT_ID", "CUSTOMER_ACCOUNT_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ACCOUNT_ID", $Method, NULL), $this);
            $this->CUSTOMER_NUMBER = & new clsControl(ccsTextBox, "CUSTOMER_NUMBER", "CUSTOMER NUMBER", ccsText, "", CCGetRequestParam("CUSTOMER_NUMBER", $Method, NULL), $this);
            $this->CUSTOMER_NUMBER->Required = true;
            $this->P_CUSTOMER_SEGMENT_ID = & new clsControl(ccsHidden, "P_CUSTOMER_SEGMENT_ID", "P CUSTOMER SEGMENT ID", ccsFloat, "", CCGetRequestParam("P_CUSTOMER_SEGMENT_ID", $Method, NULL), $this);
            $this->P_CUSTOMER_SEGMENT_ID->Required = true;
            $this->CUSTOMER_SEGMENT_CODE = & new clsControl(ccsTextBox, "CUSTOMER_SEGMENT_CODE", "CUSTOMER SEGMENT CODE", ccsText, "", CCGetRequestParam("CUSTOMER_SEGMENT_CODE", $Method, NULL), $this);
            $this->CUSTOMER_SEGMENT_CODE->Required = true;
            $this->LAST_NAME = & new clsControl(ccsTextBox, "LAST_NAME", "LAST NAME", ccsText, "", CCGetRequestParam("LAST_NAME", $Method, NULL), $this);
            $this->LAST_NAME->Required = true;
            $this->P_BILL_CYCLE_ID = & new clsControl(ccsHidden, "P_BILL_CYCLE_ID", "P BILL CYCLE ID", ccsFloat, "", CCGetRequestParam("P_BILL_CYCLE_ID", $Method, NULL), $this);
            $this->P_BILL_CYCLE_ID->Required = true;
            $this->NPWP = & new clsControl(ccsTextBox, "NPWP", "NPWP", ccsText, "", CCGetRequestParam("NPWP", $Method, NULL), $this);
            $this->CURRENCY_CODE = & new clsControl(ccsTextBox, "CURRENCY_CODE", "CURRENCY CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", $Method, NULL), $this);
            $this->CURRENCY_CODE->Required = true;
            $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsTextBox, "BILL_PERIOD_UNIT_CODE", "BILL PERIOD UNIT CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", $Method, NULL), $this);
            $this->BILL_PERIOD_UNIT_CODE->Required = true;
            $this->P_BILLING_PERIOD_UNIT_ID = & new clsControl(ccsHidden, "P_BILLING_PERIOD_UNIT_ID", "P BILLING PERIOD UNIT ID", ccsFloat, "", CCGetRequestParam("P_BILLING_PERIOD_UNIT_ID", $Method, NULL), $this);
            $this->P_BILLING_PERIOD_UNIT_ID->Required = true;
            $this->CHARGING_METHOD_CODE = & new clsControl(ccsTextBox, "CHARGING_METHOD_CODE", "CHARGING METHOD CODE", ccsText, "", CCGetRequestParam("CHARGING_METHOD_CODE", $Method, NULL), $this);
            $this->START_BILL_DATE = & new clsControl(ccsTextBox, "START_BILL_DATE", "START BILL DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("START_BILL_DATE", $Method, NULL), $this);
            $this->MAX_CREDIT_AMT = & new clsControl(ccsTextBox, "MAX_CREDIT_AMT", "MAX CREDIT AMT", ccsFloat, "", CCGetRequestParam("MAX_CREDIT_AMT", $Method, NULL), $this);
            $this->TOTAL_BILLED_AMT = & new clsControl(ccsTextBox, "TOTAL_BILLED_AMT", "TOTAL BILLED AMT", ccsFloat, "", CCGetRequestParam("TOTAL_BILLED_AMT", $Method, NULL), $this);
            $this->MIN_CHARGE = & new clsControl(ccsTextBox, "MIN_CHARGE", "MIN CHARGE", ccsFloat, "", CCGetRequestParam("MIN_CHARGE", $Method, NULL), $this);
            $this->CREATION_DATE = & new clsControl(ccsTextBox, "CREATION_DATE", "CREATION DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("CREATION_DATE", $Method, NULL), $this);
            $this->CREATION_DATE->Required = true;
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->LAST_BILLED_AMT = & new clsControl(ccsTextBox, "LAST_BILLED_AMT", "LAST_BILLED_AMT", ccsFloat, "", CCGetRequestParam("LAST_BILLED_AMT", $Method, NULL), $this);
            $this->P_CUSTOMER_TITLE_ID = & new clsControl(ccsHidden, "P_CUSTOMER_TITLE_ID", "P_CUSTOMER_TITLE_ID", ccsText, "", CCGetRequestParam("P_CUSTOMER_TITLE_ID", $Method, NULL), $this);
            $this->CUSTOMER_ID = & new clsControl(ccsHidden, "CUSTOMER_ID", "CUSTOMER_ID", ccsText, "", CCGetRequestParam("CUSTOMER_ID", $Method, NULL), $this);
            $this->P_CURRENCY_ID = & new clsControl(ccsHidden, "P_CURRENCY_ID", "P_CURRENCY_ID", ccsText, "", CCGetRequestParam("P_CURRENCY_ID", $Method, NULL), $this);
            $this->P_CHARGING_METHOD_ID = & new clsControl(ccsHidden, "P_CHARGING_METHOD_ID", "P_CHARGING_METHOD_ID", ccsText, "", CCGetRequestParam("P_CHARGING_METHOD_ID", $Method, NULL), $this);
            $this->P_REGION_ID = & new clsControl(ccsHidden, "P_REGION_ID", "P_REGION_ID", ccsText, "", CCGetRequestParam("P_REGION_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetValue(time());
                if(!is_array($this->CREATION_DATE->Value) && !strlen($this->CREATION_DATE->Value) && $this->CREATION_DATE->Value !== false)
                    $this->CREATION_DATE->SetValue(time());
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @118-583DA543
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlCUSTOMER_ACCOUNT_ID"] = CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL);
    }
//End Initialize Method

//Validate Method @118-D37BAEED
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->ADDRESS_1->Validate() && $Validation);
        $Validation = ($this->ADDRESS_2->Validate() && $Validation);
        $Validation = ($this->ADDRESS_3->Validate() && $Validation);
        $Validation = ($this->ZIP_CODE->Validate() && $Validation);
        $Validation = ($this->CCDB_CODE->Validate() && $Validation);
        $Validation = ($this->BILLING_UNIT->Validate() && $Validation);
        $Validation = ($this->NEXT_BILL_DATE->Validate() && $Validation);
        $Validation = ($this->TERMINATION_DATE->Validate() && $Validation);
        $Validation = ($this->TOTAL_PAID_AMT->Validate() && $Validation);
        $Validation = ($this->LAST_PAID_AMT->Validate() && $Validation);
        $Validation = ($this->NEXT_END_BILL_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_TITLE_CODE->Validate() && $Validation);
        $Validation = ($this->REGION_NAME->Validate() && $Validation);
        $Validation = ($this->BILL_CYCLE_CODE->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_NAME->Validate() && $Validation);
        $Validation = ($this->ACCOUNT_NO->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ACCOUNT_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_NUMBER->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_SEGMENT_CODE->Validate() && $Validation);
        $Validation = ($this->LAST_NAME->Validate() && $Validation);
        $Validation = ($this->P_BILL_CYCLE_ID->Validate() && $Validation);
        $Validation = ($this->NPWP->Validate() && $Validation);
        $Validation = ($this->CURRENCY_CODE->Validate() && $Validation);
        $Validation = ($this->BILL_PERIOD_UNIT_CODE->Validate() && $Validation);
        $Validation = ($this->P_BILLING_PERIOD_UNIT_ID->Validate() && $Validation);
        $Validation = ($this->CHARGING_METHOD_CODE->Validate() && $Validation);
        $Validation = ($this->START_BILL_DATE->Validate() && $Validation);
        $Validation = ($this->MAX_CREDIT_AMT->Validate() && $Validation);
        $Validation = ($this->TOTAL_BILLED_AMT->Validate() && $Validation);
        $Validation = ($this->MIN_CHARGE->Validate() && $Validation);
        $Validation = ($this->CREATION_DATE->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->LAST_BILLED_AMT->Validate() && $Validation);
        $Validation = ($this->P_CUSTOMER_TITLE_ID->Validate() && $Validation);
        $Validation = ($this->CUSTOMER_ID->Validate() && $Validation);
        $Validation = ($this->P_CURRENCY_ID->Validate() && $Validation);
        $Validation = ($this->P_CHARGING_METHOD_ID->Validate() && $Validation);
        $Validation = ($this->P_REGION_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->ADDRESS_1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ADDRESS_3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ZIP_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CCDB_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILLING_UNIT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NEXT_BILL_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TERMINATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TOTAL_PAID_AMT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LAST_PAID_AMT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NEXT_END_BILL_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_TITLE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->REGION_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_CYCLE_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ACCOUNT_NO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ACCOUNT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_NUMBER->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_SEGMENT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LAST_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILL_CYCLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NPWP->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CURRENCY_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BILL_PERIOD_UNIT_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_BILLING_PERIOD_UNIT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CHARGING_METHOD_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->START_BILL_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MAX_CREDIT_AMT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TOTAL_BILLED_AMT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MIN_CHARGE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CREATION_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LAST_BILLED_AMT->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CUSTOMER_TITLE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CUSTOMER_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CURRENCY_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_CHARGING_METHOD_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_REGION_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @118-C186C1AA
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ADDRESS_1->Errors->Count());
        $errors = ($errors || $this->ADDRESS_2->Errors->Count());
        $errors = ($errors || $this->ADDRESS_3->Errors->Count());
        $errors = ($errors || $this->ZIP_CODE->Errors->Count());
        $errors = ($errors || $this->CCDB_CODE->Errors->Count());
        $errors = ($errors || $this->BILLING_UNIT->Errors->Count());
        $errors = ($errors || $this->NEXT_BILL_DATE->Errors->Count());
        $errors = ($errors || $this->TERMINATION_DATE->Errors->Count());
        $errors = ($errors || $this->TOTAL_PAID_AMT->Errors->Count());
        $errors = ($errors || $this->LAST_PAID_AMT->Errors->Count());
        $errors = ($errors || $this->NEXT_END_BILL_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_TITLE_CODE->Errors->Count());
        $errors = ($errors || $this->REGION_NAME->Errors->Count());
        $errors = ($errors || $this->BILL_CYCLE_CODE->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_NAME->Errors->Count());
        $errors = ($errors || $this->ACCOUNT_NO->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ACCOUNT_ID->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_NUMBER->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_SEGMENT_CODE->Errors->Count());
        $errors = ($errors || $this->LAST_NAME->Errors->Count());
        $errors = ($errors || $this->P_BILL_CYCLE_ID->Errors->Count());
        $errors = ($errors || $this->NPWP->Errors->Count());
        $errors = ($errors || $this->CURRENCY_CODE->Errors->Count());
        $errors = ($errors || $this->BILL_PERIOD_UNIT_CODE->Errors->Count());
        $errors = ($errors || $this->P_BILLING_PERIOD_UNIT_ID->Errors->Count());
        $errors = ($errors || $this->CHARGING_METHOD_CODE->Errors->Count());
        $errors = ($errors || $this->START_BILL_DATE->Errors->Count());
        $errors = ($errors || $this->MAX_CREDIT_AMT->Errors->Count());
        $errors = ($errors || $this->TOTAL_BILLED_AMT->Errors->Count());
        $errors = ($errors || $this->MIN_CHARGE->Errors->Count());
        $errors = ($errors || $this->CREATION_DATE->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->LAST_BILLED_AMT->Errors->Count());
        $errors = ($errors || $this->P_CUSTOMER_TITLE_ID->Errors->Count());
        $errors = ($errors || $this->CUSTOMER_ID->Errors->Count());
        $errors = ($errors || $this->P_CURRENCY_ID->Errors->Count());
        $errors = ($errors || $this->P_CHARGING_METHOD_ID->Errors->Count());
        $errors = ($errors || $this->P_REGION_ID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @118-ED598703
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

//Operation Method @118-7FFF3D57
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
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "customer_account.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
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

//InsertRow Method @118-9A3397E6
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CUSTOMER_ACCOUNT_ID->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        $this->DataSource->ACCOUNT_NO->SetValue($this->ACCOUNT_NO->GetValue(true));
        $this->DataSource->CUSTOMER_ID->SetValue($this->CUSTOMER_ID->GetValue(true));
        $this->DataSource->LAST_NAME->SetValue($this->LAST_NAME->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->P_CUSTOMER_TITLE_ID->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        $this->DataSource->NPWP->SetValue($this->NPWP->GetValue(true));
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->P_BILL_CYCLE_ID->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        $this->DataSource->CCDB_CODE->SetValue($this->CCDB_CODE->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->P_CHARGING_METHOD_ID->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        $this->DataSource->START_BILL_DATE->SetValue($this->START_BILL_DATE->GetValue(true));
        $this->DataSource->NEXT_BILL_DATE->SetValue($this->NEXT_BILL_DATE->GetValue(true));
        $this->DataSource->MAX_CREDIT_AMT->SetValue($this->MAX_CREDIT_AMT->GetValue(true));
        $this->DataSource->TERMINATION_DATE->SetValue($this->TERMINATION_DATE->GetValue(true));
        $this->DataSource->TOTAL_BILLED_AMT->SetValue($this->TOTAL_BILLED_AMT->GetValue(true));
        $this->DataSource->TOTAL_PAID_AMT->SetValue($this->TOTAL_PAID_AMT->GetValue(true));
        $this->DataSource->LAST_BILLED_AMT->SetValue($this->LAST_BILLED_AMT->GetValue(true));
        $this->DataSource->LAST_PAID_AMT->SetValue($this->LAST_PAID_AMT->GetValue(true));
        $this->DataSource->MIN_CHARGE->SetValue($this->MIN_CHARGE->GetValue(true));
        $this->DataSource->NEXT_END_BILL_DATE->SetValue($this->NEXT_END_BILL_DATE->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @118-9F8FA150
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->ADDRESS_1->SetValue($this->ADDRESS_1->GetValue(true));
        $this->DataSource->ADDRESS_2->SetValue($this->ADDRESS_2->GetValue(true));
        $this->DataSource->ADDRESS_3->SetValue($this->ADDRESS_3->GetValue(true));
        $this->DataSource->ZIP_CODE->SetValue($this->ZIP_CODE->GetValue(true));
        $this->DataSource->CCDB_CODE->SetValue($this->CCDB_CODE->GetValue(true));
        $this->DataSource->BILLING_UNIT->SetValue($this->BILLING_UNIT->GetValue(true));
        $this->DataSource->NEXT_BILL_DATE->SetValue($this->NEXT_BILL_DATE->GetValue(true));
        $this->DataSource->TERMINATION_DATE->SetValue($this->TERMINATION_DATE->GetValue(true));
        $this->DataSource->TOTAL_PAID_AMT->SetValue($this->TOTAL_PAID_AMT->GetValue(true));
        $this->DataSource->LAST_PAID_AMT->SetValue($this->LAST_PAID_AMT->GetValue(true));
        $this->DataSource->NEXT_END_BILL_DATE->SetValue($this->NEXT_END_BILL_DATE->GetValue(true));
        $this->DataSource->UPDATE_DATE->SetValue($this->UPDATE_DATE->GetValue(true));
        $this->DataSource->CUSTOMER_TITLE_CODE->SetValue($this->CUSTOMER_TITLE_CODE->GetValue(true));
        $this->DataSource->REGION_NAME->SetValue($this->REGION_NAME->GetValue(true));
        $this->DataSource->BILL_CYCLE_CODE->SetValue($this->BILL_CYCLE_CODE->GetValue(true));
        $this->DataSource->CUSTOMER_NAME->SetValue($this->CUSTOMER_NAME->GetValue(true));
        $this->DataSource->ACCOUNT_NO->SetValue($this->ACCOUNT_NO->GetValue(true));
        $this->DataSource->CUSTOMER_NUMBER->SetValue($this->CUSTOMER_NUMBER->GetValue(true));
        $this->DataSource->P_CUSTOMER_SEGMENT_ID->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        $this->DataSource->CUSTOMER_SEGMENT_CODE->SetValue($this->CUSTOMER_SEGMENT_CODE->GetValue(true));
        $this->DataSource->LAST_NAME->SetValue($this->LAST_NAME->GetValue(true));
        $this->DataSource->P_BILL_CYCLE_ID->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        $this->DataSource->NPWP->SetValue($this->NPWP->GetValue(true));
        $this->DataSource->CURRENCY_CODE->SetValue($this->CURRENCY_CODE->GetValue(true));
        $this->DataSource->BILL_PERIOD_UNIT_CODE->SetValue($this->BILL_PERIOD_UNIT_CODE->GetValue(true));
        $this->DataSource->P_BILLING_PERIOD_UNIT_ID->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        $this->DataSource->CHARGING_METHOD_CODE->SetValue($this->CHARGING_METHOD_CODE->GetValue(true));
        $this->DataSource->START_BILL_DATE->SetValue($this->START_BILL_DATE->GetValue(true));
        $this->DataSource->MAX_CREDIT_AMT->SetValue($this->MAX_CREDIT_AMT->GetValue(true));
        $this->DataSource->TOTAL_BILLED_AMT->SetValue($this->TOTAL_BILLED_AMT->GetValue(true));
        $this->DataSource->MIN_CHARGE->SetValue($this->MIN_CHARGE->GetValue(true));
        $this->DataSource->LAST_BILLED_AMT->SetValue($this->LAST_BILLED_AMT->GetValue(true));
        $this->DataSource->P_CUSTOMER_TITLE_ID->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        $this->DataSource->CUSTOMER_ID->SetValue($this->CUSTOMER_ID->GetValue(true));
        $this->DataSource->P_CURRENCY_ID->SetValue($this->P_CURRENCY_ID->GetValue(true));
        $this->DataSource->P_CHARGING_METHOD_ID->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        $this->DataSource->P_REGION_ID->SetValue($this->P_REGION_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @118-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @118-FB99FCE0
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
                    $this->ADDRESS_1->SetValue($this->DataSource->ADDRESS_1->GetValue());
                    $this->ADDRESS_2->SetValue($this->DataSource->ADDRESS_2->GetValue());
                    $this->ADDRESS_3->SetValue($this->DataSource->ADDRESS_3->GetValue());
                    $this->ZIP_CODE->SetValue($this->DataSource->ZIP_CODE->GetValue());
                    $this->CCDB_CODE->SetValue($this->DataSource->CCDB_CODE->GetValue());
                    $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                    $this->NEXT_BILL_DATE->SetValue($this->DataSource->NEXT_BILL_DATE->GetValue());
                    $this->TERMINATION_DATE->SetValue($this->DataSource->TERMINATION_DATE->GetValue());
                    $this->TOTAL_PAID_AMT->SetValue($this->DataSource->TOTAL_PAID_AMT->GetValue());
                    $this->LAST_PAID_AMT->SetValue($this->DataSource->LAST_PAID_AMT->GetValue());
                    $this->NEXT_END_BILL_DATE->SetValue($this->DataSource->NEXT_END_BILL_DATE->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->CUSTOMER_TITLE_CODE->SetValue($this->DataSource->CUSTOMER_TITLE_CODE->GetValue());
                    $this->REGION_NAME->SetValue($this->DataSource->REGION_NAME->GetValue());
                    $this->BILL_CYCLE_CODE->SetValue($this->DataSource->BILL_CYCLE_CODE->GetValue());
                    $this->CUSTOMER_NAME->SetValue($this->DataSource->CUSTOMER_NAME->GetValue());
                    $this->ACCOUNT_NO->SetValue($this->DataSource->ACCOUNT_NO->GetValue());
                    $this->CUSTOMER_ACCOUNT_ID->SetValue($this->DataSource->CUSTOMER_ACCOUNT_ID->GetValue());
                    $this->CUSTOMER_NUMBER->SetValue($this->DataSource->CUSTOMER_NUMBER->GetValue());
                    $this->P_CUSTOMER_SEGMENT_ID->SetValue($this->DataSource->P_CUSTOMER_SEGMENT_ID->GetValue());
                    $this->CUSTOMER_SEGMENT_CODE->SetValue($this->DataSource->CUSTOMER_SEGMENT_CODE->GetValue());
                    $this->LAST_NAME->SetValue($this->DataSource->LAST_NAME->GetValue());
                    $this->P_BILL_CYCLE_ID->SetValue($this->DataSource->P_BILL_CYCLE_ID->GetValue());
                    $this->NPWP->SetValue($this->DataSource->NPWP->GetValue());
                    $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                    $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                    $this->P_BILLING_PERIOD_UNIT_ID->SetValue($this->DataSource->P_BILLING_PERIOD_UNIT_ID->GetValue());
                    $this->CHARGING_METHOD_CODE->SetValue($this->DataSource->CHARGING_METHOD_CODE->GetValue());
                    $this->START_BILL_DATE->SetValue($this->DataSource->START_BILL_DATE->GetValue());
                    $this->MAX_CREDIT_AMT->SetValue($this->DataSource->MAX_CREDIT_AMT->GetValue());
                    $this->TOTAL_BILLED_AMT->SetValue($this->DataSource->TOTAL_BILLED_AMT->GetValue());
                    $this->MIN_CHARGE->SetValue($this->DataSource->MIN_CHARGE->GetValue());
                    $this->CREATION_DATE->SetValue($this->DataSource->CREATION_DATE->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->LAST_BILLED_AMT->SetValue($this->DataSource->LAST_BILLED_AMT->GetValue());
                    $this->P_CUSTOMER_TITLE_ID->SetValue($this->DataSource->P_CUSTOMER_TITLE_ID->GetValue());
                    $this->CUSTOMER_ID->SetValue($this->DataSource->CUSTOMER_ID->GetValue());
                    $this->P_CURRENCY_ID->SetValue($this->DataSource->P_CURRENCY_ID->GetValue());
                    $this->P_CHARGING_METHOD_ID->SetValue($this->DataSource->P_CHARGING_METHOD_ID->GetValue());
                    $this->P_REGION_ID->SetValue($this->DataSource->P_REGION_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ADDRESS_1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ADDRESS_3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ZIP_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CCDB_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILLING_UNIT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NEXT_BILL_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TERMINATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TOTAL_PAID_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_PAID_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NEXT_END_BILL_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_TITLE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->REGION_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_CYCLE_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ACCOUNT_NO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ACCOUNT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_NUMBER->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_SEGMENT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILL_CYCLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NPWP->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CURRENCY_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_BILLING_PERIOD_UNIT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CHARGING_METHOD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->START_BILL_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MAX_CREDIT_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TOTAL_BILLED_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MIN_CHARGE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CREATION_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LAST_BILLED_AMT->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CUSTOMER_TITLE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CUSTOMER_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CURRENCY_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_CHARGING_METHOD_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_REGION_ID->Errors->ToString());
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

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->ADDRESS_1->Show();
        $this->ADDRESS_2->Show();
        $this->ADDRESS_3->Show();
        $this->ZIP_CODE->Show();
        $this->CCDB_CODE->Show();
        $this->BILLING_UNIT->Show();
        $this->NEXT_BILL_DATE->Show();
        $this->TERMINATION_DATE->Show();
        $this->TOTAL_PAID_AMT->Show();
        $this->LAST_PAID_AMT->Show();
        $this->NEXT_END_BILL_DATE->Show();
        $this->UPDATE_DATE->Show();
        $this->CUSTOMER_TITLE_CODE->Show();
        $this->REGION_NAME->Show();
        $this->BILL_CYCLE_CODE->Show();
        $this->CUSTOMER_NAME->Show();
        $this->ACCOUNT_NO->Show();
        $this->CUSTOMER_ACCOUNT_ID->Show();
        $this->CUSTOMER_NUMBER->Show();
        $this->P_CUSTOMER_SEGMENT_ID->Show();
        $this->CUSTOMER_SEGMENT_CODE->Show();
        $this->LAST_NAME->Show();
        $this->P_BILL_CYCLE_ID->Show();
        $this->NPWP->Show();
        $this->CURRENCY_CODE->Show();
        $this->BILL_PERIOD_UNIT_CODE->Show();
        $this->P_BILLING_PERIOD_UNIT_ID->Show();
        $this->CHARGING_METHOD_CODE->Show();
        $this->START_BILL_DATE->Show();
        $this->MAX_CREDIT_AMT->Show();
        $this->TOTAL_BILLED_AMT->Show();
        $this->MIN_CHARGE->Show();
        $this->CREATION_DATE->Show();
        $this->UPDATE_BY->Show();
        $this->LAST_BILLED_AMT->Show();
        $this->P_CUSTOMER_TITLE_ID->Show();
        $this->CUSTOMER_ID->Show();
        $this->P_CURRENCY_ID->Show();
        $this->P_CHARGING_METHOD_ID->Show();
        $this->P_REGION_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End V_CUSTOMER_ACCOUNT1 Class @118-FCB6E20C

class clsV_CUSTOMER_ACCOUNT1DataSource extends clsDBConn {  //V_CUSTOMER_ACCOUNT1DataSource Class @118-1B9F10BE

//DataSource Variables @118-A4B6E0CD
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
    var $ADDRESS_1;
    var $ADDRESS_2;
    var $ADDRESS_3;
    var $ZIP_CODE;
    var $CCDB_CODE;
    var $BILLING_UNIT;
    var $NEXT_BILL_DATE;
    var $TERMINATION_DATE;
    var $TOTAL_PAID_AMT;
    var $LAST_PAID_AMT;
    var $NEXT_END_BILL_DATE;
    var $UPDATE_DATE;
    var $CUSTOMER_TITLE_CODE;
    var $REGION_NAME;
    var $BILL_CYCLE_CODE;
    var $CUSTOMER_NAME;
    var $ACCOUNT_NO;
    var $CUSTOMER_ACCOUNT_ID;
    var $CUSTOMER_NUMBER;
    var $P_CUSTOMER_SEGMENT_ID;
    var $CUSTOMER_SEGMENT_CODE;
    var $LAST_NAME;
    var $P_BILL_CYCLE_ID;
    var $NPWP;
    var $CURRENCY_CODE;
    var $BILL_PERIOD_UNIT_CODE;
    var $P_BILLING_PERIOD_UNIT_ID;
    var $CHARGING_METHOD_CODE;
    var $START_BILL_DATE;
    var $MAX_CREDIT_AMT;
    var $TOTAL_BILLED_AMT;
    var $MIN_CHARGE;
    var $CREATION_DATE;
    var $UPDATE_BY;
    var $LAST_BILLED_AMT;
    var $P_CUSTOMER_TITLE_ID;
    var $CUSTOMER_ID;
    var $P_CURRENCY_ID;
    var $P_CHARGING_METHOD_ID;
    var $P_REGION_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @118-156670C8
    function clsV_CUSTOMER_ACCOUNT1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record V_CUSTOMER_ACCOUNT1/Error";
        $this->Initialize();
        $this->ADDRESS_1 = new clsField("ADDRESS_1", ccsText, "");
        
        $this->ADDRESS_2 = new clsField("ADDRESS_2", ccsText, "");
        
        $this->ADDRESS_3 = new clsField("ADDRESS_3", ccsText, "");
        
        $this->ZIP_CODE = new clsField("ZIP_CODE", ccsFloat, "");
        
        $this->CCDB_CODE = new clsField("CCDB_CODE", ccsText, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsFloat, "");
        
        $this->NEXT_BILL_DATE = new clsField("NEXT_BILL_DATE", ccsDate, $this->DateFormat);
        
        $this->TERMINATION_DATE = new clsField("TERMINATION_DATE", ccsDate, $this->DateFormat);
        
        $this->TOTAL_PAID_AMT = new clsField("TOTAL_PAID_AMT", ccsFloat, "");
        
        $this->LAST_PAID_AMT = new clsField("LAST_PAID_AMT", ccsFloat, "");
        
        $this->NEXT_END_BILL_DATE = new clsField("NEXT_END_BILL_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->CUSTOMER_TITLE_CODE = new clsField("CUSTOMER_TITLE_CODE", ccsText, "");
        
        $this->REGION_NAME = new clsField("REGION_NAME", ccsText, "");
        
        $this->BILL_CYCLE_CODE = new clsField("BILL_CYCLE_CODE", ccsText, "");
        
        $this->CUSTOMER_NAME = new clsField("CUSTOMER_NAME", ccsText, "");
        
        $this->ACCOUNT_NO = new clsField("ACCOUNT_NO", ccsText, "");
        
        $this->CUSTOMER_ACCOUNT_ID = new clsField("CUSTOMER_ACCOUNT_ID", ccsText, "");
        
        $this->CUSTOMER_NUMBER = new clsField("CUSTOMER_NUMBER", ccsText, "");
        
        $this->P_CUSTOMER_SEGMENT_ID = new clsField("P_CUSTOMER_SEGMENT_ID", ccsFloat, "");
        
        $this->CUSTOMER_SEGMENT_CODE = new clsField("CUSTOMER_SEGMENT_CODE", ccsText, "");
        
        $this->LAST_NAME = new clsField("LAST_NAME", ccsText, "");
        
        $this->P_BILL_CYCLE_ID = new clsField("P_BILL_CYCLE_ID", ccsFloat, "");
        
        $this->NPWP = new clsField("NPWP", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->P_BILLING_PERIOD_UNIT_ID = new clsField("P_BILLING_PERIOD_UNIT_ID", ccsFloat, "");
        
        $this->CHARGING_METHOD_CODE = new clsField("CHARGING_METHOD_CODE", ccsText, "");
        
        $this->START_BILL_DATE = new clsField("START_BILL_DATE", ccsDate, $this->DateFormat);
        
        $this->MAX_CREDIT_AMT = new clsField("MAX_CREDIT_AMT", ccsFloat, "");
        
        $this->TOTAL_BILLED_AMT = new clsField("TOTAL_BILLED_AMT", ccsFloat, "");
        
        $this->MIN_CHARGE = new clsField("MIN_CHARGE", ccsFloat, "");
        
        $this->CREATION_DATE = new clsField("CREATION_DATE", ccsDate, $this->DateFormat);
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->LAST_BILLED_AMT = new clsField("LAST_BILLED_AMT", ccsFloat, "");
        
        $this->P_CUSTOMER_TITLE_ID = new clsField("P_CUSTOMER_TITLE_ID", ccsText, "");
        
        $this->CUSTOMER_ID = new clsField("CUSTOMER_ID", ccsText, "");
        
        $this->P_CURRENCY_ID = new clsField("P_CURRENCY_ID", ccsText, "");
        
        $this->P_CHARGING_METHOD_ID = new clsField("P_CHARGING_METHOD_ID", ccsText, "");
        
        $this->P_REGION_ID = new clsField("P_REGION_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @118-EA1A6E1F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->Parameters["urlCUSTOMER_ACCOUNT_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "CUSTOMER_ACCOUNT_ID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @118-807D0831
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM V_CUSTOMER_ACCOUNT {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @118-38B2FC44
    function SetValues()
    {
        $this->ADDRESS_1->SetDBValue($this->f("ADDRESS_1"));
        $this->ADDRESS_2->SetDBValue($this->f("ADDRESS_2"));
        $this->ADDRESS_3->SetDBValue($this->f("ADDRESS_3"));
        $this->ZIP_CODE->SetDBValue(trim($this->f("ZIP_CODE")));
        $this->CCDB_CODE->SetDBValue($this->f("CCDB_CODE"));
        $this->BILLING_UNIT->SetDBValue(trim($this->f("BILLING_UNIT")));
        $this->NEXT_BILL_DATE->SetDBValue(trim($this->f("NEXT_BILL_DATE")));
        $this->TERMINATION_DATE->SetDBValue(trim($this->f("TERMINATION_DATE")));
        $this->TOTAL_PAID_AMT->SetDBValue(trim($this->f("TOTAL_PAID_AMT")));
        $this->LAST_PAID_AMT->SetDBValue(trim($this->f("LAST_PAID_AMT")));
        $this->NEXT_END_BILL_DATE->SetDBValue(trim($this->f("NEXT_END_BILL_DATE")));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->CUSTOMER_TITLE_CODE->SetDBValue($this->f("CUSTOMER_TITLE_CODE"));
        $this->REGION_NAME->SetDBValue($this->f("REGION_NAME"));
        $this->BILL_CYCLE_CODE->SetDBValue($this->f("BILL_CYCLE_CODE"));
        $this->CUSTOMER_NAME->SetDBValue($this->f("CUSTOMER_NAME"));
        $this->ACCOUNT_NO->SetDBValue($this->f("ACCOUNT_NO"));
        $this->CUSTOMER_ACCOUNT_ID->SetDBValue($this->f("CUSTOMER_ACCOUNT_ID"));
        $this->CUSTOMER_NUMBER->SetDBValue($this->f("CUSTOMER_NUMBER"));
        $this->P_CUSTOMER_SEGMENT_ID->SetDBValue(trim($this->f("P_CUSTOMER_SEGMENT_ID")));
        $this->CUSTOMER_SEGMENT_CODE->SetDBValue($this->f("CUSTOMER_SEGMENT_CODE"));
        $this->LAST_NAME->SetDBValue($this->f("LAST_NAME"));
        $this->P_BILL_CYCLE_ID->SetDBValue(trim($this->f("P_BILL_CYCLE_ID")));
        $this->NPWP->SetDBValue($this->f("NPWP"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->P_BILLING_PERIOD_UNIT_ID->SetDBValue(trim($this->f("P_BILLING_PERIOD_UNIT_ID")));
        $this->CHARGING_METHOD_CODE->SetDBValue($this->f("CHARGING_METHOD_CODE"));
        $this->START_BILL_DATE->SetDBValue(trim($this->f("START_BILL_DATE")));
        $this->MAX_CREDIT_AMT->SetDBValue(trim($this->f("MAX_CREDIT_AMT")));
        $this->TOTAL_BILLED_AMT->SetDBValue(trim($this->f("TOTAL_BILLED_AMT")));
        $this->MIN_CHARGE->SetDBValue(trim($this->f("MIN_CHARGE")));
        $this->CREATION_DATE->SetDBValue(trim($this->f("CREATION_DATE")));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->LAST_BILLED_AMT->SetDBValue(trim($this->f("LAST_BILLED_AMT")));
        $this->P_CUSTOMER_TITLE_ID->SetDBValue($this->f("P_CUSTOMER_TITLE_ID"));
        $this->CUSTOMER_ID->SetDBValue($this->f("CUSTOMER_ID"));
        $this->P_CURRENCY_ID->SetDBValue($this->f("P_CURRENCY_ID"));
        $this->P_CHARGING_METHOD_ID->SetDBValue($this->f("P_CHARGING_METHOD_ID"));
        $this->P_REGION_ID->SetDBValue($this->f("P_REGION_ID"));
    }
//End SetValues Method

//Insert Method @118-7D941E1F
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("ctrlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", $this->CUSTOMER_ACCOUNT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ACCOUNT_NO"] = new clsSQLParameter("ctrlACCOUNT_NO", ccsFloat, "", "", $this->ACCOUNT_NO->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ID"] = new clsSQLParameter("ctrlCUSTOMER_ID", ccsFloat, "", "", $this->CUSTOMER_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["LAST_NAME"] = new clsSQLParameter("ctrlLAST_NAME", ccsText, "", "", $this->LAST_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_TITLE_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_TITLE_ID", ccsFloat, "", "", $this->P_CUSTOMER_TITLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["NPWP"] = new clsSQLParameter("ctrlNPWP", ccsText, "", "", $this->NPWP->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsFloat, "", "", $this->P_REGION_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsFloat, "", "", $this->P_CURRENCY_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_BILL_CYCLE_ID"] = new clsSQLParameter("ctrlP_BILL_CYCLE_ID", ccsFloat, "", "", $this->P_BILL_CYCLE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["CCDB_CODE"] = new clsSQLParameter("ctrlCCDB_CODE", ccsText, "", "", $this->CCDB_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["P_CHARGING_METHOD_ID"] = new clsSQLParameter("ctrlP_CHARGING_METHOD_ID", ccsFloat, "", "", $this->P_CHARGING_METHOD_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["START_BILL_DATE"] = new clsSQLParameter("ctrlSTART_BILL_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->START_BILL_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["NEXT_BILL_DATE"] = new clsSQLParameter("ctrlNEXT_BILL_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->NEXT_BILL_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["MAX_CREDIT_AMT"] = new clsSQLParameter("ctrlMAX_CREDIT_AMT", ccsFloat, "", "", $this->MAX_CREDIT_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TERMINATION_DATE"] = new clsSQLParameter("ctrlTERMINATION_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->TERMINATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TOTAL_BILLED_AMT"] = new clsSQLParameter("ctrlTOTAL_BILLED_AMT", ccsFloat, "", "", $this->TOTAL_BILLED_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["TOTAL_PAID_AMT"] = new clsSQLParameter("ctrlTOTAL_PAID_AMT", ccsFloat, "", "", $this->TOTAL_PAID_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["LAST_BILLED_AMT"] = new clsSQLParameter("ctrlLAST_BILLED_AMT", ccsFloat, "", "", $this->LAST_BILLED_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["LAST_PAID_AMT"] = new clsSQLParameter("ctrlLAST_PAID_AMT", ccsFloat, "", "", $this->LAST_PAID_AMT->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["MIN_CHARGE"] = new clsSQLParameter("ctrlMIN_CHARGE", ccsFloat, "", "", $this->MIN_CHARGE->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["NEXT_END_BILL_DATE"] = new clsSQLParameter("ctrlNEXT_END_BILL_DATE", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->NEXT_END_BILL_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetValue($this->CUSTOMER_ACCOUNT_ID->GetValue(true));
        if (!strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetText(0);
        if (!is_null($this->cp["ACCOUNT_NO"]->GetValue()) and !strlen($this->cp["ACCOUNT_NO"]->GetText()) and !is_bool($this->cp["ACCOUNT_NO"]->GetValue())) 
            $this->cp["ACCOUNT_NO"]->SetValue($this->ACCOUNT_NO->GetValue(true));
        if (!strlen($this->cp["ACCOUNT_NO"]->GetText()) and !is_bool($this->cp["ACCOUNT_NO"]->GetValue(true))) 
            $this->cp["ACCOUNT_NO"]->SetText(0);
        if (!is_null($this->cp["CUSTOMER_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ID"]->SetValue($this->CUSTOMER_ID->GetValue(true));
        if (!strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_ID"]->SetText(0);
        if (!is_null($this->cp["LAST_NAME"]->GetValue()) and !strlen($this->cp["LAST_NAME"]->GetText()) and !is_bool($this->cp["LAST_NAME"]->GetValue())) 
            $this->cp["LAST_NAME"]->SetValue($this->LAST_NAME->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue(true))) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetText(0);
        if (!is_null($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        if (!strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue(true))) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetText(0);
        if (!is_null($this->cp["NPWP"]->GetValue()) and !strlen($this->cp["NPWP"]->GetText()) and !is_bool($this->cp["NPWP"]->GetValue())) 
            $this->cp["NPWP"]->SetValue($this->NPWP->GetValue(true));
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        if (!strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue(true))) 
            $this->cp["P_REGION_ID"]->SetText(0);
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue(true))) 
            $this->cp["ZIP_CODE"]->SetText(0);
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue(true))) 
            $this->cp["P_CURRENCY_ID"]->SetText(0);
        if (!is_null($this->cp["P_BILL_CYCLE_ID"]->GetValue()) and !strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue())) 
            $this->cp["P_BILL_CYCLE_ID"]->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        if (!strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue(true))) 
            $this->cp["P_BILL_CYCLE_ID"]->SetText(0);
        if (!is_null($this->cp["CCDB_CODE"]->GetValue()) and !strlen($this->cp["CCDB_CODE"]->GetText()) and !is_bool($this->cp["CCDB_CODE"]->GetValue())) 
            $this->cp["CCDB_CODE"]->SetValue($this->CCDB_CODE->GetValue(true));
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue(true))) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetText(0);
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        if (!strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue(true))) 
            $this->cp["BILLING_UNIT"]->SetText(0);
        if (!is_null($this->cp["P_CHARGING_METHOD_ID"]->GetValue()) and !strlen($this->cp["P_CHARGING_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_CHARGING_METHOD_ID"]->GetValue())) 
            $this->cp["P_CHARGING_METHOD_ID"]->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        if (!strlen($this->cp["P_CHARGING_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_CHARGING_METHOD_ID"]->GetValue(true))) 
            $this->cp["P_CHARGING_METHOD_ID"]->SetText(0);
        if (!is_null($this->cp["START_BILL_DATE"]->GetValue()) and !strlen($this->cp["START_BILL_DATE"]->GetText()) and !is_bool($this->cp["START_BILL_DATE"]->GetValue())) 
            $this->cp["START_BILL_DATE"]->SetValue($this->START_BILL_DATE->GetValue(true));
        if (!strlen($this->cp["START_BILL_DATE"]->GetText()) and !is_bool($this->cp["START_BILL_DATE"]->GetValue(true))) 
            $this->cp["START_BILL_DATE"]->SetText("");
        if (!is_null($this->cp["NEXT_BILL_DATE"]->GetValue()) and !strlen($this->cp["NEXT_BILL_DATE"]->GetText()) and !is_bool($this->cp["NEXT_BILL_DATE"]->GetValue())) 
            $this->cp["NEXT_BILL_DATE"]->SetValue($this->NEXT_BILL_DATE->GetValue(true));
        if (!strlen($this->cp["NEXT_BILL_DATE"]->GetText()) and !is_bool($this->cp["NEXT_BILL_DATE"]->GetValue(true))) 
            $this->cp["NEXT_BILL_DATE"]->SetText("");
        if (!is_null($this->cp["MAX_CREDIT_AMT"]->GetValue()) and !strlen($this->cp["MAX_CREDIT_AMT"]->GetText()) and !is_bool($this->cp["MAX_CREDIT_AMT"]->GetValue())) 
            $this->cp["MAX_CREDIT_AMT"]->SetValue($this->MAX_CREDIT_AMT->GetValue(true));
        if (!strlen($this->cp["MAX_CREDIT_AMT"]->GetText()) and !is_bool($this->cp["MAX_CREDIT_AMT"]->GetValue(true))) 
            $this->cp["MAX_CREDIT_AMT"]->SetText(0);
        if (!is_null($this->cp["TERMINATION_DATE"]->GetValue()) and !strlen($this->cp["TERMINATION_DATE"]->GetText()) and !is_bool($this->cp["TERMINATION_DATE"]->GetValue())) 
            $this->cp["TERMINATION_DATE"]->SetValue($this->TERMINATION_DATE->GetValue(true));
        if (!strlen($this->cp["TERMINATION_DATE"]->GetText()) and !is_bool($this->cp["TERMINATION_DATE"]->GetValue(true))) 
            $this->cp["TERMINATION_DATE"]->SetText("");
        if (!is_null($this->cp["TOTAL_BILLED_AMT"]->GetValue()) and !strlen($this->cp["TOTAL_BILLED_AMT"]->GetText()) and !is_bool($this->cp["TOTAL_BILLED_AMT"]->GetValue())) 
            $this->cp["TOTAL_BILLED_AMT"]->SetValue($this->TOTAL_BILLED_AMT->GetValue(true));
        if (!strlen($this->cp["TOTAL_BILLED_AMT"]->GetText()) and !is_bool($this->cp["TOTAL_BILLED_AMT"]->GetValue(true))) 
            $this->cp["TOTAL_BILLED_AMT"]->SetText(0);
        if (!is_null($this->cp["TOTAL_PAID_AMT"]->GetValue()) and !strlen($this->cp["TOTAL_PAID_AMT"]->GetText()) and !is_bool($this->cp["TOTAL_PAID_AMT"]->GetValue())) 
            $this->cp["TOTAL_PAID_AMT"]->SetValue($this->TOTAL_PAID_AMT->GetValue(true));
        if (!strlen($this->cp["TOTAL_PAID_AMT"]->GetText()) and !is_bool($this->cp["TOTAL_PAID_AMT"]->GetValue(true))) 
            $this->cp["TOTAL_PAID_AMT"]->SetText(0);
        if (!is_null($this->cp["LAST_BILLED_AMT"]->GetValue()) and !strlen($this->cp["LAST_BILLED_AMT"]->GetText()) and !is_bool($this->cp["LAST_BILLED_AMT"]->GetValue())) 
            $this->cp["LAST_BILLED_AMT"]->SetValue($this->LAST_BILLED_AMT->GetValue(true));
        if (!strlen($this->cp["LAST_BILLED_AMT"]->GetText()) and !is_bool($this->cp["LAST_BILLED_AMT"]->GetValue(true))) 
            $this->cp["LAST_BILLED_AMT"]->SetText(0);
        if (!is_null($this->cp["LAST_PAID_AMT"]->GetValue()) and !strlen($this->cp["LAST_PAID_AMT"]->GetText()) and !is_bool($this->cp["LAST_PAID_AMT"]->GetValue())) 
            $this->cp["LAST_PAID_AMT"]->SetValue($this->LAST_PAID_AMT->GetValue(true));
        if (!strlen($this->cp["LAST_PAID_AMT"]->GetText()) and !is_bool($this->cp["LAST_PAID_AMT"]->GetValue(true))) 
            $this->cp["LAST_PAID_AMT"]->SetText(0);
        if (!is_null($this->cp["MIN_CHARGE"]->GetValue()) and !strlen($this->cp["MIN_CHARGE"]->GetText()) and !is_bool($this->cp["MIN_CHARGE"]->GetValue())) 
            $this->cp["MIN_CHARGE"]->SetValue($this->MIN_CHARGE->GetValue(true));
        if (!strlen($this->cp["MIN_CHARGE"]->GetText()) and !is_bool($this->cp["MIN_CHARGE"]->GetValue(true))) 
            $this->cp["MIN_CHARGE"]->SetText(0);
        if (!is_null($this->cp["NEXT_END_BILL_DATE"]->GetValue()) and !strlen($this->cp["NEXT_END_BILL_DATE"]->GetText()) and !is_bool($this->cp["NEXT_END_BILL_DATE"]->GetValue())) 
            $this->cp["NEXT_END_BILL_DATE"]->SetValue($this->NEXT_END_BILL_DATE->GetValue(true));
        if (!strlen($this->cp["NEXT_END_BILL_DATE"]->GetText()) and !is_bool($this->cp["NEXT_END_BILL_DATE"]->GetValue(true))) 
            $this->cp["NEXT_END_BILL_DATE"]->SetText("");
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "/* Formatted on 27/09/2014 12:23:26 (QP5 v5.139.911.3011) */\n" .
        "INSERT INTO CUSTOMER_ACCOUNT (CUSTOMER_ACCOUNT_ID,ACCOUNT_NO,\n" .
        "                                      CUSTOMER_ID,LAST_NAME,P_CUSTOMER_SEGMENT_ID,\n" .
        "                                      P_CUSTOMER_TITLE_ID,NPWP,ADDRESS_1,ADDRESS_2,\n" .
        "                                      ADDRESS_3,P_REGION_ID,ZIP_CODE,P_CURRENCY_ID,\n" .
        "                                      P_BILL_CYCLE_ID,CCDB_CODE,P_BILLING_PERIOD_UNIT_ID,\n" .
        "                                      BILLING_UNIT,P_CHARGING_METHOD_ID,START_BILL_DATE,\n" .
        "                                      NEXT_BILL_DATE,MAX_CREDIT_AMT,TERMINATION_DATE,\n" .
        "                                      TOTAL_BILLED_AMT,TOTAL_PAID_AMT,LAST_BILLED_AMT,\n" .
        "                                      LAST_PAID_AMT,MIN_CHARGE,NEXT_END_BILL_DATE,\n" .
        "                                      CREATION_DATE,UPDATE_DATE,UPDATE_BY)\n" .
        "     VALUES (CUSTACC_SEQ.NEXTVAL,'" . $this->SQLValue($this->cp["ACCOUNT_NO"]->GetDBValue(), ccsFloat) . "'," . $this->SQLValue($this->cp["CUSTOMER_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "                  '" . $this->SQLValue($this->cp["LAST_NAME"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "                  " . $this->SQLValue($this->cp["P_CUSTOMER_TITLE_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["NPWP"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "','" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "',\n" .
        "                  '" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "                  " . $this->SQLValue($this->cp["P_BILL_CYCLE_ID"]->GetDBValue(), ccsFloat) . ",'" . $this->SQLValue($this->cp["CCDB_CODE"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "                  " . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["P_CHARGING_METHOD_ID"]->GetDBValue(), ccsFloat) . ",to_date(substr('" . $this->SQLValue($this->cp["START_BILL_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "                  to_date(substr('" . $this->SQLValue($this->cp["NEXT_BILL_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd')," . $this->SQLValue($this->cp["MAX_CREDIT_AMT"]->GetDBValue(), ccsFloat) . ",to_date(substr('" . $this->SQLValue($this->cp["TERMINATION_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "                  " . $this->SQLValue($this->cp["TOTAL_BILLED_AMT"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["TOTAL_PAID_AMT"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["LAST_BILLED_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "                  " . $this->SQLValue($this->cp["LAST_PAID_AMT"]->GetDBValue(), ccsFloat) . "," . $this->SQLValue($this->cp["MIN_CHARGE"]->GetDBValue(), ccsFloat) . ",to_date(substr('" . $this->SQLValue($this->cp["NEXT_END_BILL_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "                  SYSDATE,SYSDATE,'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @118-E765E782
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["ADDRESS_1"] = new clsSQLParameter("ctrlADDRESS_1", ccsText, "", "", $this->ADDRESS_1->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_2"] = new clsSQLParameter("ctrlADDRESS_2", ccsText, "", "", $this->ADDRESS_2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ADDRESS_3"] = new clsSQLParameter("ctrlADDRESS_3", ccsText, "", "", $this->ADDRESS_3->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ZIP_CODE"] = new clsSQLParameter("ctrlZIP_CODE", ccsFloat, "", "", $this->ZIP_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CCDB_CODE"] = new clsSQLParameter("ctrlCCDB_CODE", ccsText, "", "", $this->CCDB_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILLING_UNIT"] = new clsSQLParameter("ctrlBILLING_UNIT", ccsFloat, "", "", $this->BILLING_UNIT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["NEXT_BILL_DATE"] = new clsSQLParameter("ctrlNEXT_BILL_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->NEXT_BILL_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TERMINATION_DATE"] = new clsSQLParameter("ctrlTERMINATION_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->TERMINATION_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TOTAL_PAID_AMT"] = new clsSQLParameter("ctrlTOTAL_PAID_AMT", ccsFloat, "", "", $this->TOTAL_PAID_AMT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LAST_PAID_AMT"] = new clsSQLParameter("ctrlLAST_PAID_AMT", ccsFloat, "", "", $this->LAST_PAID_AMT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["NEXT_END_BILL_DATE"] = new clsSQLParameter("ctrlNEXT_END_BILL_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->NEXT_END_BILL_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_DATE"] = new clsSQLParameter("ctrlUPDATE_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->UPDATE_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_TITLE_CODE"] = new clsSQLParameter("ctrlCUSTOMER_TITLE_CODE", ccsText, "", "", $this->CUSTOMER_TITLE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["REGION_NAME"] = new clsSQLParameter("ctrlREGION_NAME", ccsText, "", "", $this->REGION_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILL_CYCLE_CODE"] = new clsSQLParameter("ctrlBILL_CYCLE_CODE", ccsText, "", "", $this->BILL_CYCLE_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_NAME"] = new clsSQLParameter("ctrlCUSTOMER_NAME", ccsText, "", "", $this->CUSTOMER_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["ACCOUNT_NO"] = new clsSQLParameter("ctrlACCOUNT_NO", ccsText, "", "", $this->ACCOUNT_NO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("urlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL), 0, false, $this->ErrorBlock);
        $this->cp["CUSTOMER_NUMBER"] = new clsSQLParameter("ctrlCUSTOMER_NUMBER", ccsText, "", "", $this->CUSTOMER_NUMBER->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_SEGMENT_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_SEGMENT_ID", ccsFloat, "", "", $this->P_CUSTOMER_SEGMENT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_SEGMENT_CODE"] = new clsSQLParameter("ctrlCUSTOMER_SEGMENT_CODE", ccsText, "", "", $this->CUSTOMER_SEGMENT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["LAST_NAME"] = new clsSQLParameter("ctrlLAST_NAME", ccsText, "", "", $this->LAST_NAME->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILL_CYCLE_ID"] = new clsSQLParameter("ctrlP_BILL_CYCLE_ID", ccsFloat, "", "", $this->P_BILL_CYCLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["NPWP"] = new clsSQLParameter("ctrlNPWP", ccsText, "", "", $this->NPWP->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CURRENCY_CODE"] = new clsSQLParameter("ctrlCURRENCY_CODE", ccsText, "", "", $this->CURRENCY_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["BILL_PERIOD_UNIT_CODE"] = new clsSQLParameter("ctrlBILL_PERIOD_UNIT_CODE", ccsText, "", "", $this->BILL_PERIOD_UNIT_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_BILLING_PERIOD_UNIT_ID"] = new clsSQLParameter("ctrlP_BILLING_PERIOD_UNIT_ID", ccsFloat, "", "", $this->P_BILLING_PERIOD_UNIT_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CHARGING_METHOD_CODE"] = new clsSQLParameter("ctrlCHARGING_METHOD_CODE", ccsText, "", "", $this->CHARGING_METHOD_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["START_BILL_DATE"] = new clsSQLParameter("ctrlSTART_BILL_DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->START_BILL_DATE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["MAX_CREDIT_AMT"] = new clsSQLParameter("ctrlMAX_CREDIT_AMT", ccsFloat, "", "", $this->MAX_CREDIT_AMT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["TOTAL_BILLED_AMT"] = new clsSQLParameter("ctrlTOTAL_BILLED_AMT", ccsFloat, "", "", $this->TOTAL_BILLED_AMT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["MIN_CHARGE"] = new clsSQLParameter("ctrlMIN_CHARGE", ccsFloat, "", "", $this->MIN_CHARGE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["LAST_BILLED_AMT"] = new clsSQLParameter("ctrlLAST_BILLED_AMT", ccsFloat, "", "", $this->LAST_BILLED_AMT->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CUSTOMER_TITLE_ID"] = new clsSQLParameter("ctrlP_CUSTOMER_TITLE_ID", ccsText, "", "", $this->P_CUSTOMER_TITLE_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["CUSTOMER_ID"] = new clsSQLParameter("ctrlCUSTOMER_ID", ccsText, "", "", $this->CUSTOMER_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CURRENCY_ID"] = new clsSQLParameter("ctrlP_CURRENCY_ID", ccsText, "", "", $this->P_CURRENCY_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_CHARGING_METHOD_ID"] = new clsSQLParameter("ctrlP_CHARGING_METHOD_ID", ccsText, "", "", $this->P_CHARGING_METHOD_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_REGION_ID"] = new clsSQLParameter("ctrlP_REGION_ID", ccsText, "", "", $this->P_REGION_ID->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["ADDRESS_1"]->GetValue()) and !strlen($this->cp["ADDRESS_1"]->GetText()) and !is_bool($this->cp["ADDRESS_1"]->GetValue())) 
            $this->cp["ADDRESS_1"]->SetValue($this->ADDRESS_1->GetValue(true));
        if (!is_null($this->cp["ADDRESS_2"]->GetValue()) and !strlen($this->cp["ADDRESS_2"]->GetText()) and !is_bool($this->cp["ADDRESS_2"]->GetValue())) 
            $this->cp["ADDRESS_2"]->SetValue($this->ADDRESS_2->GetValue(true));
        if (!is_null($this->cp["ADDRESS_3"]->GetValue()) and !strlen($this->cp["ADDRESS_3"]->GetText()) and !is_bool($this->cp["ADDRESS_3"]->GetValue())) 
            $this->cp["ADDRESS_3"]->SetValue($this->ADDRESS_3->GetValue(true));
        if (!is_null($this->cp["ZIP_CODE"]->GetValue()) and !strlen($this->cp["ZIP_CODE"]->GetText()) and !is_bool($this->cp["ZIP_CODE"]->GetValue())) 
            $this->cp["ZIP_CODE"]->SetValue($this->ZIP_CODE->GetValue(true));
        if (!is_null($this->cp["CCDB_CODE"]->GetValue()) and !strlen($this->cp["CCDB_CODE"]->GetText()) and !is_bool($this->cp["CCDB_CODE"]->GetValue())) 
            $this->cp["CCDB_CODE"]->SetValue($this->CCDB_CODE->GetValue(true));
        if (!is_null($this->cp["BILLING_UNIT"]->GetValue()) and !strlen($this->cp["BILLING_UNIT"]->GetText()) and !is_bool($this->cp["BILLING_UNIT"]->GetValue())) 
            $this->cp["BILLING_UNIT"]->SetValue($this->BILLING_UNIT->GetValue(true));
        if (!is_null($this->cp["NEXT_BILL_DATE"]->GetValue()) and !strlen($this->cp["NEXT_BILL_DATE"]->GetText()) and !is_bool($this->cp["NEXT_BILL_DATE"]->GetValue())) 
            $this->cp["NEXT_BILL_DATE"]->SetValue($this->NEXT_BILL_DATE->GetValue(true));
        if (!is_null($this->cp["TERMINATION_DATE"]->GetValue()) and !strlen($this->cp["TERMINATION_DATE"]->GetText()) and !is_bool($this->cp["TERMINATION_DATE"]->GetValue())) 
            $this->cp["TERMINATION_DATE"]->SetValue($this->TERMINATION_DATE->GetValue(true));
        if (!is_null($this->cp["TOTAL_PAID_AMT"]->GetValue()) and !strlen($this->cp["TOTAL_PAID_AMT"]->GetText()) and !is_bool($this->cp["TOTAL_PAID_AMT"]->GetValue())) 
            $this->cp["TOTAL_PAID_AMT"]->SetValue($this->TOTAL_PAID_AMT->GetValue(true));
        if (!is_null($this->cp["LAST_PAID_AMT"]->GetValue()) and !strlen($this->cp["LAST_PAID_AMT"]->GetText()) and !is_bool($this->cp["LAST_PAID_AMT"]->GetValue())) 
            $this->cp["LAST_PAID_AMT"]->SetValue($this->LAST_PAID_AMT->GetValue(true));
        if (!is_null($this->cp["NEXT_END_BILL_DATE"]->GetValue()) and !strlen($this->cp["NEXT_END_BILL_DATE"]->GetText()) and !is_bool($this->cp["NEXT_END_BILL_DATE"]->GetValue())) 
            $this->cp["NEXT_END_BILL_DATE"]->SetValue($this->NEXT_END_BILL_DATE->GetValue(true));
        if (!is_null($this->cp["UPDATE_DATE"]->GetValue()) and !strlen($this->cp["UPDATE_DATE"]->GetText()) and !is_bool($this->cp["UPDATE_DATE"]->GetValue())) 
            $this->cp["UPDATE_DATE"]->SetValue($this->UPDATE_DATE->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_TITLE_CODE"]->GetValue()) and !strlen($this->cp["CUSTOMER_TITLE_CODE"]->GetText()) and !is_bool($this->cp["CUSTOMER_TITLE_CODE"]->GetValue())) 
            $this->cp["CUSTOMER_TITLE_CODE"]->SetValue($this->CUSTOMER_TITLE_CODE->GetValue(true));
        if (!is_null($this->cp["REGION_NAME"]->GetValue()) and !strlen($this->cp["REGION_NAME"]->GetText()) and !is_bool($this->cp["REGION_NAME"]->GetValue())) 
            $this->cp["REGION_NAME"]->SetValue($this->REGION_NAME->GetValue(true));
        if (!is_null($this->cp["BILL_CYCLE_CODE"]->GetValue()) and !strlen($this->cp["BILL_CYCLE_CODE"]->GetText()) and !is_bool($this->cp["BILL_CYCLE_CODE"]->GetValue())) 
            $this->cp["BILL_CYCLE_CODE"]->SetValue($this->BILL_CYCLE_CODE->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_NAME"]->GetValue()) and !strlen($this->cp["CUSTOMER_NAME"]->GetText()) and !is_bool($this->cp["CUSTOMER_NAME"]->GetValue())) 
            $this->cp["CUSTOMER_NAME"]->SetValue($this->CUSTOMER_NAME->GetValue(true));
        if (!is_null($this->cp["ACCOUNT_NO"]->GetValue()) and !strlen($this->cp["ACCOUNT_NO"]->GetText()) and !is_bool($this->cp["ACCOUNT_NO"]->GetValue())) 
            $this->cp["ACCOUNT_NO"]->SetValue($this->ACCOUNT_NO->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetText(CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL));
        if (!strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetText(0);
        if (!is_null($this->cp["CUSTOMER_NUMBER"]->GetValue()) and !strlen($this->cp["CUSTOMER_NUMBER"]->GetText()) and !is_bool($this->cp["CUSTOMER_NUMBER"]->GetValue())) 
            $this->cp["CUSTOMER_NUMBER"]->SetValue($this->CUSTOMER_NUMBER->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_SEGMENT_ID"]->SetValue($this->P_CUSTOMER_SEGMENT_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_SEGMENT_CODE"]->GetValue()) and !strlen($this->cp["CUSTOMER_SEGMENT_CODE"]->GetText()) and !is_bool($this->cp["CUSTOMER_SEGMENT_CODE"]->GetValue())) 
            $this->cp["CUSTOMER_SEGMENT_CODE"]->SetValue($this->CUSTOMER_SEGMENT_CODE->GetValue(true));
        if (!is_null($this->cp["LAST_NAME"]->GetValue()) and !strlen($this->cp["LAST_NAME"]->GetText()) and !is_bool($this->cp["LAST_NAME"]->GetValue())) 
            $this->cp["LAST_NAME"]->SetValue($this->LAST_NAME->GetValue(true));
        if (!is_null($this->cp["P_BILL_CYCLE_ID"]->GetValue()) and !strlen($this->cp["P_BILL_CYCLE_ID"]->GetText()) and !is_bool($this->cp["P_BILL_CYCLE_ID"]->GetValue())) 
            $this->cp["P_BILL_CYCLE_ID"]->SetValue($this->P_BILL_CYCLE_ID->GetValue(true));
        if (!is_null($this->cp["NPWP"]->GetValue()) and !strlen($this->cp["NPWP"]->GetText()) and !is_bool($this->cp["NPWP"]->GetValue())) 
            $this->cp["NPWP"]->SetValue($this->NPWP->GetValue(true));
        if (!is_null($this->cp["CURRENCY_CODE"]->GetValue()) and !strlen($this->cp["CURRENCY_CODE"]->GetText()) and !is_bool($this->cp["CURRENCY_CODE"]->GetValue())) 
            $this->cp["CURRENCY_CODE"]->SetValue($this->CURRENCY_CODE->GetValue(true));
        if (!is_null($this->cp["BILL_PERIOD_UNIT_CODE"]->GetValue()) and !strlen($this->cp["BILL_PERIOD_UNIT_CODE"]->GetText()) and !is_bool($this->cp["BILL_PERIOD_UNIT_CODE"]->GetValue())) 
            $this->cp["BILL_PERIOD_UNIT_CODE"]->SetValue($this->BILL_PERIOD_UNIT_CODE->GetValue(true));
        if (!is_null($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue()) and !strlen($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetText()) and !is_bool($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetValue())) 
            $this->cp["P_BILLING_PERIOD_UNIT_ID"]->SetValue($this->P_BILLING_PERIOD_UNIT_ID->GetValue(true));
        if (!is_null($this->cp["CHARGING_METHOD_CODE"]->GetValue()) and !strlen($this->cp["CHARGING_METHOD_CODE"]->GetText()) and !is_bool($this->cp["CHARGING_METHOD_CODE"]->GetValue())) 
            $this->cp["CHARGING_METHOD_CODE"]->SetValue($this->CHARGING_METHOD_CODE->GetValue(true));
        if (!is_null($this->cp["START_BILL_DATE"]->GetValue()) and !strlen($this->cp["START_BILL_DATE"]->GetText()) and !is_bool($this->cp["START_BILL_DATE"]->GetValue())) 
            $this->cp["START_BILL_DATE"]->SetValue($this->START_BILL_DATE->GetValue(true));
        if (!is_null($this->cp["MAX_CREDIT_AMT"]->GetValue()) and !strlen($this->cp["MAX_CREDIT_AMT"]->GetText()) and !is_bool($this->cp["MAX_CREDIT_AMT"]->GetValue())) 
            $this->cp["MAX_CREDIT_AMT"]->SetValue($this->MAX_CREDIT_AMT->GetValue(true));
        if (!is_null($this->cp["TOTAL_BILLED_AMT"]->GetValue()) and !strlen($this->cp["TOTAL_BILLED_AMT"]->GetText()) and !is_bool($this->cp["TOTAL_BILLED_AMT"]->GetValue())) 
            $this->cp["TOTAL_BILLED_AMT"]->SetValue($this->TOTAL_BILLED_AMT->GetValue(true));
        if (!is_null($this->cp["MIN_CHARGE"]->GetValue()) and !strlen($this->cp["MIN_CHARGE"]->GetText()) and !is_bool($this->cp["MIN_CHARGE"]->GetValue())) 
            $this->cp["MIN_CHARGE"]->SetValue($this->MIN_CHARGE->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["LAST_BILLED_AMT"]->GetValue()) and !strlen($this->cp["LAST_BILLED_AMT"]->GetText()) and !is_bool($this->cp["LAST_BILLED_AMT"]->GetValue())) 
            $this->cp["LAST_BILLED_AMT"]->SetValue($this->LAST_BILLED_AMT->GetValue(true));
        if (!is_null($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue()) and !strlen($this->cp["P_CUSTOMER_TITLE_ID"]->GetText()) and !is_bool($this->cp["P_CUSTOMER_TITLE_ID"]->GetValue())) 
            $this->cp["P_CUSTOMER_TITLE_ID"]->SetValue($this->P_CUSTOMER_TITLE_ID->GetValue(true));
        if (!is_null($this->cp["CUSTOMER_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ID"]->SetValue($this->CUSTOMER_ID->GetValue(true));
        if (!is_null($this->cp["P_CURRENCY_ID"]->GetValue()) and !strlen($this->cp["P_CURRENCY_ID"]->GetText()) and !is_bool($this->cp["P_CURRENCY_ID"]->GetValue())) 
            $this->cp["P_CURRENCY_ID"]->SetValue($this->P_CURRENCY_ID->GetValue(true));
        if (!is_null($this->cp["P_CHARGING_METHOD_ID"]->GetValue()) and !strlen($this->cp["P_CHARGING_METHOD_ID"]->GetText()) and !is_bool($this->cp["P_CHARGING_METHOD_ID"]->GetValue())) 
            $this->cp["P_CHARGING_METHOD_ID"]->SetValue($this->P_CHARGING_METHOD_ID->GetValue(true));
        if (!is_null($this->cp["P_REGION_ID"]->GetValue()) and !strlen($this->cp["P_REGION_ID"]->GetText()) and !is_bool($this->cp["P_REGION_ID"]->GetValue())) 
            $this->cp["P_REGION_ID"]->SetValue($this->P_REGION_ID->GetValue(true));
        $this->SQL = "/* Formatted on 29/09/2014 11:11:51 (QP5 v5.139.911.3011) */\n" .
        "UPDATE CUSTOMER_ACCOUNT\n" .
        "   SET 	ACCOUNT_NO='" . $this->SQLValue($this->cp["ACCOUNT_NO"]->GetDBValue(), ccsText) . "',\n" .
        "		CUSTOMER_ID=" . $this->SQLValue($this->cp["CUSTOMER_ID"]->GetDBValue(), ccsText) . ",\n" .
        "		LAST_NAME='" . $this->SQLValue($this->cp["LAST_NAME"]->GetDBValue(), ccsText) . "',\n" .
        "		P_CUSTOMER_SEGMENT_ID=" . $this->SQLValue($this->cp["P_CUSTOMER_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "		P_CUSTOMER_TITLE_ID=" . $this->SQLValue($this->cp["P_CUSTOMER_TITLE_ID"]->GetDBValue(), ccsText) . ",\n" .
        "		NPWP='" . $this->SQLValue($this->cp["NPWP"]->GetDBValue(), ccsText) . "',\n" .
        "		ADDRESS_1='" . $this->SQLValue($this->cp["ADDRESS_1"]->GetDBValue(), ccsText) . "',\n" .
        "		ADDRESS_2='" . $this->SQLValue($this->cp["ADDRESS_2"]->GetDBValue(), ccsText) . "',\n" .
        "		ADDRESS_3='" . $this->SQLValue($this->cp["ADDRESS_3"]->GetDBValue(), ccsText) . "',\n" .
        "		P_REGION_ID=" . $this->SQLValue($this->cp["P_REGION_ID"]->GetDBValue(), ccsText) . ",\n" .
        "		ZIP_CODE=" . $this->SQLValue($this->cp["ZIP_CODE"]->GetDBValue(), ccsFloat) . ",\n" .
        "		P_CURRENCY_ID=" . $this->SQLValue($this->cp["P_CURRENCY_ID"]->GetDBValue(), ccsText) . ",\n" .
        "		P_BILL_CYCLE_ID=" . $this->SQLValue($this->cp["P_BILL_CYCLE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "		CCDB_CODE='" . $this->SQLValue($this->cp["CCDB_CODE"]->GetDBValue(), ccsText) . "',\n" .
        "		P_BILLING_PERIOD_UNIT_ID=" . $this->SQLValue($this->cp["P_BILLING_PERIOD_UNIT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "		BILLING_UNIT=" . $this->SQLValue($this->cp["BILLING_UNIT"]->GetDBValue(), ccsFloat) . ",\n" .
        "		P_CHARGING_METHOD_ID=" . $this->SQLValue($this->cp["P_CHARGING_METHOD_ID"]->GetDBValue(), ccsText) . ",\n" .
        "		START_BILL_DATE=to_date(substr('" . $this->SQLValue($this->cp["START_BILL_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "		NEXT_BILL_DATE=to_date(substr('" . $this->SQLValue($this->cp["NEXT_BILL_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "		MAX_CREDIT_AMT=" . $this->SQLValue($this->cp["MAX_CREDIT_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "		TERMINATION_DATE=to_date(substr('" . $this->SQLValue($this->cp["TERMINATION_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "		TOTAL_BILLED_AMT=" . $this->SQLValue($this->cp["TOTAL_BILLED_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "		TOTAL_PAID_AMT=" . $this->SQLValue($this->cp["TOTAL_PAID_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "		LAST_BILLED_AMT=" . $this->SQLValue($this->cp["LAST_BILLED_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "		LAST_PAID_AMT=" . $this->SQLValue($this->cp["LAST_PAID_AMT"]->GetDBValue(), ccsFloat) . ",\n" .
        "		MIN_CHARGE=" . $this->SQLValue($this->cp["MIN_CHARGE"]->GetDBValue(), ccsFloat) . ",\n" .
        "		NEXT_END_BILL_DATE=to_date(substr('" . $this->SQLValue($this->cp["NEXT_END_BILL_DATE"]->GetDBValue(), ccsDate) . "',1,10),'yyyy/mm/dd'),\n" .
        "		UPDATE_DATE=SYSDATE,\n" .
        "		UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "' \n" .
        " WHERE  CUSTOMER_ACCOUNT_ID = " . $this->SQLValue($this->cp["CUSTOMER_ACCOUNT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @118-DD98CE7B
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CUSTOMER_ACCOUNT_ID"] = new clsSQLParameter("urlCUSTOMER_ACCOUNT_ID", ccsFloat, "", "", CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue()) and !strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue())) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetText(CCGetFromGet("CUSTOMER_ACCOUNT_ID", NULL));
        if (!strlen($this->cp["CUSTOMER_ACCOUNT_ID"]->GetText()) and !is_bool($this->cp["CUSTOMER_ACCOUNT_ID"]->GetValue(true))) 
            $this->cp["CUSTOMER_ACCOUNT_ID"]->SetText(0);
        $this->SQL = "DELETE FROM CUSTOMER_ACCOUNT \n" .
        "WHERE  CUSTOMER_ACCOUNT_ID = " . $this->SQLValue($this->cp["CUSTOMER_ACCOUNT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End V_CUSTOMER_ACCOUNT1DataSource Class @118-FCB6E20C



//Initialize Page @1-850A5D7B
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
$TemplateFileName = "customer_account.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-1EDADFB1
include_once("./customer_account_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-0997F45F
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$V_CUSTOMER_ACCOUNT = & new clsGridV_CUSTOMER_ACCOUNT("", $MainPage);
$V_CUSTOMER_ACCOUNTSearch = & new clsRecordV_CUSTOMER_ACCOUNTSearch("", $MainPage);
$V_CUSTOMER_ACCOUNT1 = & new clsRecordV_CUSTOMER_ACCOUNT1("", $MainPage);
$MainPage->V_CUSTOMER_ACCOUNT = & $V_CUSTOMER_ACCOUNT;
$MainPage->V_CUSTOMER_ACCOUNTSearch = & $V_CUSTOMER_ACCOUNTSearch;
$MainPage->V_CUSTOMER_ACCOUNT1 = & $V_CUSTOMER_ACCOUNT1;
$V_CUSTOMER_ACCOUNT->Initialize();
$V_CUSTOMER_ACCOUNT1->Initialize();

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

//Execute Components @1-8436488D
$V_CUSTOMER_ACCOUNTSearch->Operation();
$V_CUSTOMER_ACCOUNT1->Operation();
//End Execute Components

//Go to destination page @1-C15B9934
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($V_CUSTOMER_ACCOUNT);
    unset($V_CUSTOMER_ACCOUNTSearch);
    unset($V_CUSTOMER_ACCOUNT1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-4B6E0B20
$V_CUSTOMER_ACCOUNT->Show();
$V_CUSTOMER_ACCOUNTSearch->Show();
$V_CUSTOMER_ACCOUNT1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7E89C6EF
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($V_CUSTOMER_ACCOUNT);
unset($V_CUSTOMER_ACCOUNTSearch);
unset($V_CUSTOMER_ACCOUNT1);
unset($Tpl);
//End Unload Page


?>
