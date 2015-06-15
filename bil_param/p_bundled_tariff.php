<?php
//Include Common Files @1-6CF8CC97
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_bundled_tariff.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_DETAIL_FEATURE { //P_DETAIL_FEATURE class @2-89664E09

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

//Class_Initialize Event @2-A60289FB
    function clsGridP_DETAIL_FEATURE($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_DETAIL_FEATURE";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_DETAIL_FEATURE";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_DETAIL_FEATUREDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 7;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->RECU_TARIFF_SCEN_CODE = & new clsControl(ccsLabel, "RECU_TARIFF_SCEN_CODE", "RECU_TARIFF_SCEN_CODE", ccsText, "", CCGetRequestParam("RECU_TARIFF_SCEN_CODE", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->BILL_PERIOD_UNIT_CODE = & new clsControl(ccsLabel, "BILL_PERIOD_UNIT_CODE", "BILL_PERIOD_UNIT_CODE", ccsText, "", CCGetRequestParam("BILL_PERIOD_UNIT_CODE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = & new clsControl(ccsHidden, "P_RECU_TARIFF_BUNDLED_FEAT_ID", "P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsText, "", CCGetRequestParam("P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_bundled_tariff.php";
        $this->BILLING_UNIT = & new clsControl(ccsLabel, "BILLING_UNIT", "BILLING_UNIT", ccsText, "", CCGetRequestParam("BILLING_UNIT", ccsGet, NULL), $this);
        $this->skenarioEdit = & new clsControl(ccsLink, "skenarioEdit", "skenarioEdit", ccsText, "", CCGetRequestParam("skenarioEdit", ccsGet, NULL), $this);
        $this->skenarioEdit->HTML = true;
        $this->skenarioEdit->Page = "p_bundled_tariff_act.php";
        $this->skenarioDel = & new clsControl(ccsLink, "skenarioDel", "skenarioDel", ccsText, "", CCGetRequestParam("skenarioDel", ccsGet, NULL), $this);
        $this->skenarioDel->HTML = true;
        $this->skenarioDel->Page = "p_bundled_tariff.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->ST_NEW = & new clsControl(ccsLink, "ST_NEW", "ST_NEW", ccsText, "", CCGetRequestParam("ST_NEW", ccsGet, NULL), $this);
        $this->ST_NEW->HTML = true;
        $this->ST_NEW->Parameters = CCGetQueryString("QueryString", array("P_RECU_TARIFF_BUNDLED_FEAT_ID", "ccsForm"));
        $this->ST_NEW->Page = "p_bundled_tariff_act.php";
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

//Show Method @2-50CAD9C2
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlP_BUNDLED_FEATURE_ID"] = CCGetFromGet("P_BUNDLED_FEATURE_ID", NULL);

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
            $this->ControlsVisible["RECU_TARIFF_SCEN_CODE"] = $this->RECU_TARIFF_SCEN_CODE->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["BILL_PERIOD_UNIT_CODE"] = $this->BILL_PERIOD_UNIT_CODE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["P_RECU_TARIFF_BUNDLED_FEAT_ID"] = $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["BILLING_UNIT"] = $this->BILLING_UNIT->Visible;
            $this->ControlsVisible["skenarioEdit"] = $this->skenarioEdit->Visible;
            $this->ControlsVisible["skenarioDel"] = $this->skenarioDel->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->RECU_TARIFF_SCEN_CODE->SetValue($this->DataSource->RECU_TARIFF_SCEN_CODE->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->BILL_PERIOD_UNIT_CODE->SetValue($this->DataSource->BILL_PERIOD_UNIT_CODE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetValue($this->DataSource->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_RECU_TARIFF_BUNDLED_FEAT_ID", $this->DataSource->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
                $this->BILLING_UNIT->SetValue($this->DataSource->BILLING_UNIT->GetValue());
                $this->skenarioEdit->SetValue($this->DataSource->skenarioEdit->GetValue());
                $this->skenarioEdit->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->skenarioEdit->Parameters = CCAddParam($this->skenarioEdit->Parameters, "P_RECU_TARIFF_BUNDLED_FEAT_ID", $this->DataSource->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
                $this->skenarioDel->SetValue($this->DataSource->skenarioDel->GetValue());
                $this->skenarioDel->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "action_delete", 1);
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "P_RECU_TARIFF_BUNDLED_FEAT_ID", $this->DataSource->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->RECU_TARIFF_SCEN_CODE->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->BILL_PERIOD_UNIT_CODE->Show();
                $this->DESCRIPTION->Show();
                $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Show();
                $this->DLink->Show();
                $this->BILLING_UNIT->Show();
                $this->skenarioEdit->Show();
                $this->skenarioDel->Show();
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
        $this->ST_NEW->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-A62A3F7E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->RECU_TARIFF_SCEN_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_PERIOD_UNIT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILLING_UNIT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioEdit->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioDel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_DETAIL_FEATURE Class @2-FCB6E20C

class clsP_DETAIL_FEATUREDataSource extends clsDBConn {  //P_DETAIL_FEATUREDataSource Class @2-BE6E8489

//DataSource Variables @2-66935F99
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $RECU_TARIFF_SCEN_CODE;
    var $VALID_FROM;
    var $VALID_TO;
    var $BILL_PERIOD_UNIT_CODE;
    var $DESCRIPTION;
    var $P_RECU_TARIFF_BUNDLED_FEAT_ID;
    var $BILLING_UNIT;
    var $skenarioEdit;
    var $skenarioDel;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-43CA05E6
    function clsP_DETAIL_FEATUREDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_DETAIL_FEATURE";
        $this->Initialize();
        $this->RECU_TARIFF_SCEN_CODE = new clsField("RECU_TARIFF_SCEN_CODE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsDate, $this->DateFormat);
        
        $this->BILL_PERIOD_UNIT_CODE = new clsField("BILL_PERIOD_UNIT_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = new clsField("P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsText, "");
        
        $this->BILLING_UNIT = new clsField("BILLING_UNIT", ccsText, "");
        
        $this->skenarioEdit = new clsField("skenarioEdit", ccsText, "");
        
        $this->skenarioDel = new clsField("skenarioDel", ccsText, "");
        

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

//Prepare Method @2-479B909F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlP_BUNDLED_FEATURE_ID", ccsFloat, "", "", $this->Parameters["urlP_BUNDLED_FEATURE_ID"], 0, false);
    }
//End Prepare Method

//Open Method @2-4C7C6B92
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_P_RECU_TARIFF_BUNDLED_FEAT \n" .
        "WHERE P_BUNDLED_FEATURE_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_P_RECU_TARIFF_BUNDLED_FEAT \n" .
        "WHERE P_BUNDLED_FEATURE_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "";
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

//SetValues Method @2-AE0D4112
    function SetValues()
    {
        $this->RECU_TARIFF_SCEN_CODE->SetDBValue($this->f("RECU_TARIFF_SCEN_CODE"));
        $this->VALID_FROM->SetDBValue(trim($this->f("VALID_FROM")));
        $this->VALID_TO->SetDBValue(trim($this->f("VALID_TO")));
        $this->BILL_PERIOD_UNIT_CODE->SetDBValue($this->f("BILL_PERIOD_UNIT_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetDBValue($this->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
        $this->BILLING_UNIT->SetDBValue($this->f("BILLING_UNIT"));
        $this->skenarioEdit->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
        $this->skenarioDel->SetDBValue($this->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
    }
//End SetValues Method

} //End P_DETAIL_FEATUREDataSource Class @2-FCB6E20C

class clsGridP_BILL_COMP { //P_BILL_COMP class @288-310CD4C2

//Variables @288-AC1EDBB9

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

//Class_Initialize Event @288-AD4BB7CE
    function clsGridP_BILL_COMP($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_BILL_COMP";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_BILL_COMP";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_BILL_COMPDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 7;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_bundled_tariff.php";
        $this->skenarioEdit = & new clsControl(ccsLink, "skenarioEdit", "skenarioEdit", ccsText, "", CCGetRequestParam("skenarioEdit", ccsGet, NULL), $this);
        $this->skenarioEdit->HTML = true;
        $this->skenarioEdit->Page = "p_bill_component_act.php";
        $this->skenarioDel = & new clsControl(ccsLink, "skenarioDel", "skenarioDel", ccsText, "", CCGetRequestParam("skenarioDel", ccsGet, NULL), $this);
        $this->skenarioDel->HTML = true;
        $this->skenarioDel->Page = "p_bundled_tariff.php";
        $this->BILL_COMPONENT_CODE = & new clsControl(ccsLabel, "BILL_COMPONENT_CODE", "BILL_COMPONENT_CODE", ccsText, "", CCGetRequestParam("BILL_COMPONENT_CODE", ccsGet, NULL), $this);
        $this->P_RT_BUND_FEAT_BILL_COMP_ID = & new clsControl(ccsHidden, "P_RT_BUND_FEAT_BILL_COMP_ID", "P_RT_BUND_FEAT_BILL_COMP_ID", ccsText, "", CCGetRequestParam("P_RT_BUND_FEAT_BILL_COMP_ID", ccsGet, NULL), $this);
        $this->CURRENCY_CODE = & new clsControl(ccsLabel, "CURRENCY_CODE", "CURRENCY_CODE", ccsText, "", CCGetRequestParam("CURRENCY_CODE", ccsGet, NULL), $this);
        $this->CHARGE_AMOUNT = & new clsControl(ccsLabel, "CHARGE_AMOUNT", "CHARGE_AMOUNT", ccsText, "", CCGetRequestParam("CHARGE_AMOUNT", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = & new clsControl(ccsTextBox, "P_RECU_TARIFF_BUNDLED_FEAT_ID", "P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsText, "", CCGetRequestParam("P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsGet, NULL), $this);
        $this->ST_NEW = & new clsControl(ccsLink, "ST_NEW", "ST_NEW", ccsText, "", CCGetRequestParam("ST_NEW", ccsGet, NULL), $this);
        $this->ST_NEW->HTML = true;
        $this->ST_NEW->Parameters = CCGetQueryString("QueryString", array("P_RT_BUND_FEAT_BILL_COMP_ID", "ccsForm"));
        $this->ST_NEW->Parameters = CCAddParam($this->ST_NEW->Parameters, "P_RECU_TARIFF_BUNDLED_FEAT_ID", CCGetFromPost("P_RECU_TARIFF_BUNDLED_FEAT_ID2", NULL));
        $this->ST_NEW->Page = "p_bill_component_act.php";
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @288-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @288-FF7ABC8E
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);
        $this->DataSource->Parameters["urlP_RECU_TARIFF_BUNDLED_FEAT_ID"] = CCGetFromGet("P_RECU_TARIFF_BUNDLED_FEAT_ID", NULL);

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
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["skenarioEdit"] = $this->skenarioEdit->Visible;
            $this->ControlsVisible["skenarioDel"] = $this->skenarioDel->Visible;
            $this->ControlsVisible["BILL_COMPONENT_CODE"] = $this->BILL_COMPONENT_CODE->Visible;
            $this->ControlsVisible["P_RT_BUND_FEAT_BILL_COMP_ID"] = $this->P_RT_BUND_FEAT_BILL_COMP_ID->Visible;
            $this->ControlsVisible["CURRENCY_CODE"] = $this->CURRENCY_CODE->Visible;
            $this->ControlsVisible["CHARGE_AMOUNT"] = $this->CHARGE_AMOUNT->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["P_RECU_TARIFF_BUNDLED_FEAT_ID"] = $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_RECU_TARIFF_BUNDLED_FEAT_ID", $this->DataSource->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
                $this->skenarioEdit->SetValue($this->DataSource->skenarioEdit->GetValue());
                $this->skenarioEdit->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->skenarioEdit->Parameters = CCAddParam($this->skenarioEdit->Parameters, "P_RT_BUND_FEAT_BILL_COMP_ID", $this->DataSource->f("P_RT_BUND_FEAT_BILL_COMP_ID"));
                $this->skenarioDel->SetValue($this->DataSource->skenarioDel->GetValue());
                $this->skenarioDel->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "action_delete2", 1);
                $this->skenarioDel->Parameters = CCAddParam($this->skenarioDel->Parameters, "P_RT_BUND_FEAT_BILL_COMP_ID", $this->DataSource->f("P_RT_BUND_FEAT_BILL_COMP_ID"));
                $this->BILL_COMPONENT_CODE->SetValue($this->DataSource->BILL_COMPONENT_CODE->GetValue());
                $this->P_RT_BUND_FEAT_BILL_COMP_ID->SetValue($this->DataSource->P_RT_BUND_FEAT_BILL_COMP_ID->GetValue());
                $this->CURRENCY_CODE->SetValue($this->DataSource->CURRENCY_CODE->GetValue());
                $this->CHARGE_AMOUNT->SetValue($this->DataSource->CHARGE_AMOUNT->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetValue($this->DataSource->P_RECU_TARIFF_BUNDLED_FEAT_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->DLink->Show();
                $this->skenarioEdit->Show();
                $this->skenarioDel->Show();
                $this->BILL_COMPONENT_CODE->Show();
                $this->P_RT_BUND_FEAT_BILL_COMP_ID->Show();
                $this->CURRENCY_CODE->Show();
                $this->CHARGE_AMOUNT->Show();
                $this->DESCRIPTION->Show();
                $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Show();
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
        $this->ST_NEW->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @288-A0F7DBE5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioEdit->Errors->ToString());
        $errors = ComposeStrings($errors, $this->skenarioDel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BILL_COMPONENT_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_RT_BUND_FEAT_BILL_COMP_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CURRENCY_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CHARGE_AMOUNT->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_BILL_COMP Class @288-FCB6E20C

class clsP_BILL_COMPDataSource extends clsDBConn {  //P_BILL_COMPDataSource Class @288-F3A85C67

//DataSource Variables @288-117C32CC
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $skenarioEdit;
    var $skenarioDel;
    var $BILL_COMPONENT_CODE;
    var $P_RT_BUND_FEAT_BILL_COMP_ID;
    var $CURRENCY_CODE;
    var $CHARGE_AMOUNT;
    var $DESCRIPTION;
    var $P_RECU_TARIFF_BUNDLED_FEAT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @288-9C6E8880
    function clsP_BILL_COMPDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_BILL_COMP";
        $this->Initialize();
        $this->skenarioEdit = new clsField("skenarioEdit", ccsText, "");
        
        $this->skenarioDel = new clsField("skenarioDel", ccsText, "");
        
        $this->BILL_COMPONENT_CODE = new clsField("BILL_COMPONENT_CODE", ccsText, "");
        
        $this->P_RT_BUND_FEAT_BILL_COMP_ID = new clsField("P_RT_BUND_FEAT_BILL_COMP_ID", ccsText, "");
        
        $this->CURRENCY_CODE = new clsField("CURRENCY_CODE", ccsText, "");
        
        $this->CHARGE_AMOUNT = new clsField("CHARGE_AMOUNT", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID = new clsField("P_RECU_TARIFF_BUNDLED_FEAT_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @288-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @288-AAE8208D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
        $this->wp->AddParameter("2", "urlP_RECU_TARIFF_BUNDLED_FEAT_ID", ccsFloat, "", "", $this->Parameters["urlP_RECU_TARIFF_BUNDLED_FEAT_ID"], 0, false);
    }
//End Prepare Method

//Open Method @288-4617B5A8
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT * \n" .
        "FROM V_P_RT_BUND_FEAT_BILL_COMP \n" .
        "WHERE P_RECU_TARIFF_BUNDLED_FEAT_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . ") cnt";
        $this->SQL = "SELECT * \n" .
        "FROM V_P_RT_BUND_FEAT_BILL_COMP \n" .
        "WHERE P_RECU_TARIFF_BUNDLED_FEAT_ID = " . $this->SQLValue($this->wp->GetDBValue("2"), ccsFloat) . "";
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

//SetValues Method @288-8A34331B
    function SetValues()
    {
        $this->skenarioEdit->SetDBValue($this->f("CUST_ACCOUNT_DISCOUNT_ID"));
        $this->skenarioDel->SetDBValue($this->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
        $this->BILL_COMPONENT_CODE->SetDBValue($this->f("BILL_COMPONENT_CODE"));
        $this->P_RT_BUND_FEAT_BILL_COMP_ID->SetDBValue($this->f("P_RT_BUND_FEAT_BILL_COMP_ID"));
        $this->CURRENCY_CODE->SetDBValue($this->f("CURRENCY_CODE"));
        $this->CHARGE_AMOUNT->SetDBValue($this->f("CHARGE_AMOUNT"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->P_RECU_TARIFF_BUNDLED_FEAT_ID->SetDBValue($this->f("P_RECU_TARIFF_BUNDLED_FEAT_ID"));
    }
//End SetValues Method

} //End P_BILL_COMPDataSource Class @288-FCB6E20C







//Initialize Page @1-6DC5DADF
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
$TemplateFileName = "p_bundled_tariff.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-B18CC89C
include_once("./p_bundled_tariff_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-C2F5DF8F
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_DETAIL_FEATURE = & new clsGridP_DETAIL_FEATURE("", $MainPage);
$P_BILL_COMP = & new clsGridP_BILL_COMP("", $MainPage);
$MainPage->P_DETAIL_FEATURE = & $P_DETAIL_FEATURE;
$MainPage->P_BILL_COMP = & $P_BILL_COMP;
$P_DETAIL_FEATURE->Initialize();
$P_BILL_COMP->Initialize();

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

//Go to destination page @1-12542F04
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_DETAIL_FEATURE);
    unset($P_BILL_COMP);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-8791AA6D
$P_DETAIL_FEATURE->Show();
$P_BILL_COMP->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-3180441C
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_DETAIL_FEATURE);
unset($P_BILL_COMP);
unset($Tpl);
//End Unload Page


?>
