<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_SUBSCRIBER" dataSource="V_SUBSCRIBER" errorSummator="Error" wizardCaption=" V SUBSCRIBER " wizardFormMethod="post" PathID="V_SUBSCRIBER" pasteActions="pasteActions" customUpdateType="SQL" customDeleteType="SQL" customDelete="DELETE SUBSCRIBER WHERE SUBSCRIBER_ID={SUBSCRIBER_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsertType="SQL" pasteAsReplace="pasteAsReplace" customInsert="INSERT INTO SUBSCRIBER(
SUBSCRIBER_ID, 
SERVICE_NO, 
SUBSCRIPTION_NAME, 
CUSTOMER_ACCOUNT_ID, 
P_SERVICE_TYPE_ID, 
QTY_SUB_FROM,
QTY_SUB_TO, 
P_TARIFF_SCENARIO_ID,
P_BILL_CYCLE_ID,
P_SUBSCRIPTION_STATUS_ID,
LAST_STATUS_DATE,
IS_INVOICED,
P_SUBSCRIBER_SEGMENT_ID,
IS_VAT_EXCEPTION,
P_BILLING_PERIOD_UNIT_ID,
BILLING_UNIT, 
SUBSCRIPTION_TYPE_ID,
BUILDING_TYPE_ID,
BUILDING_STATUS_ID,
P_SALES_PERSON_ID,
ADDRESS_1,ADDRESS_2,ADDRESS_3,
P_REGION_ID,
ZIP_CODE,
ACTIVE_DATE,
TERMINATION_DATE,
START_INVOICE_DATE,
END_INVOICE_DATE,
CONTRACT_NUMBER,
 EM_DEGREE, 
 EM_MINUTE, 
 EM_SECOND, 
 SL_DEGREE, 
 SL_MINUTE, 
 SL_SECOND,
 CREATION_DATE,
UPDATE_DATE, 
UPDATE_BY,
P_BUSINESS_AREA_ID, 
P_SUB_BUSINESS_AREA_ID,
DESCRIPTION, 
P_SERVICE_GROUP_ID,
RE_ACTIVATION_DATE,
IS_PAYMENT_KEY, 
P_CUSTOMER_SEGMENT_ID,
P_BUSINESS_SEGMENT_ID,
P_DEBTOR_SEGMENT_ID
) VALUES(
GENERATE_ID('BILLDB','SUBSCRIBER','SUBSCRIBER_ID'),
{SERVICE_NO}, 
UPPER('{SUBSCRIPTION_NAME}'),
{CUSTOMER_ACCOUNT_ID},
{P_SERVICE_TYPE_ID},
{QTY_SUB_FROM},
{QTY_SUB_TO},
{P_TARIFF_SCENARIO_ID}, 
{P_BILL_CYCLE_ID}, 
{P_SUBSCRIPTION_STATUS_ID},
'{LAST_STATUS_DATE}',
'{IS_INVOICED}',
{P_SUBSCRIBER_SEGMENT_ID},
'{IS_VAT_EXCEPTION}',
{P_BILLING_PERIOD_UNIT_ID},
{BILLING_UNIT},
DECODE({SUBSCRIPTION_TYPE_ID},0,NULL,{SUBSCRIPTION_TYPE_ID}),
{BUILDING_TYPE_ID},
{BUILDING_STATUS_ID},
{P_SALES_PERSON_ID},
'{ADDRESS_1}', '{ADDRESS_2}', '{ADDRESS_3}',
{P_REGION_ID},
{ZIP_CODE},
'{ACTIVE_DATE}',
'{TERMINATION_DATE}',
'{START_INVOICE_DATE}',
'{END_INVOICE_DATE}',
'{CONTRACT_NUMBER}',
{EM_DEGREE}, {EM_MINUTE}, {EM_SECOND}, {SL_DEGREE}, {SL_MINUTE}, {SL_SECOND},
SYSDATE,
SYSDATE,
'{UPDATE_BY}', 
{P_BUSINESS_AREA_ID},
{P_SUB_BUSINESS_AREA_ID},
INITCAP(TRIM('{DESCRIPTION}')),
NULL,
'{RE_ACTIVATION_DATE}',
'{IS_PAYMENT_KEY}', 
{P_CUSTOMER_SEGMENT_ID},
{P_BUSINESS_SEGMENT_ID},
{P_DEBTOR_SEGMENT_ID}
 )" customUpdate="UPDATE SUBSCRIBER SET 
SERVICE_NO={SERVICE_NO}, 
SUBSCRIPTION_NAME=UPPER('{SUBSCRIPTION_NAME}'), 
QTY_SUB_FROM={QTY_SUB_FROM}, 
P_TARIFF_SCENARIO_ID={P_TARIFF_SCENARIO_ID}, 
BILLING_UNIT={BILLING_UNIT}, 
P_BILL_CYCLE_ID={P_BILL_CYCLE_ID}, 
LAST_STATUS_DATE='{LAST_STATUS_DATE}', 
IS_INVOICED='{IS_INVOICED}', 
IS_VAT_EXCEPTION='{IS_VAT_EXCEPTION}', 
BUILDING_TYPE_ID={BUILDING_TYPE_ID}, 
P_BUSINESS_AREA_ID={P_BUSINESS_AREA_ID}, 
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID}, 
TERMINATION_DATE='{TERMINATION_DATE}', 
EM_DEGREE={EM_DEGREE}, 
EM_MINUTE={EM_MINUTE}, 
EM_SECOND={EM_SECOND}, 
SL_DEGREE={SL_DEGREE}, 
SL_MINUTE={SL_MINUTE}, 
SL_SECOND={SL_SECOND}, 
P_SALES_PERSON_ID={P_SALES_PERSON_ID}, 
UPDATE_DATE=SYSDATE, 
P_SUBSCRIPTION_STATUS_ID={P_SUBSCRIPTION_STATUS_ID}, 
P_SUBSCRIBER_SEGMENT_ID={P_SUBSCRIBER_SEGMENT_ID}, 
CUSTOMER_ACCOUNT_ID={CUSTOMER_ACCOUNT_ID}, 
P_BILLING_PERIOD_UNIT_ID={P_BILLING_PERIOD_UNIT_ID}, 
QTY_SUB_TO={QTY_SUB_TO}, 
IS_PAYMENT_KEY='{IS_PAYMENT_KEY}', 
P_SUB_BUSINESS_AREA_ID={P_SUB_BUSINESS_AREA_ID}, 
RE_ACTIVATION_DATE='{RE_ACTIVATION_DATE}', 
P_DEBTOR_SEGMENT_ID={P_DEBTOR_SEGMENT_ID}, 
P_BUSINESS_SEGMENT_ID={P_BUSINESS_SEGMENT_ID}, 
SUBSCRIPTION_TYPE_ID={SUBSCRIPTION_TYPE_ID}, 
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')), 
P_CUSTOMER_SEGMENT_ID={P_CUSTOMER_SEGMENT_ID}, 
BUILDING_STATUS_ID={BUILDING_STATUS_ID}, 
ADDRESS_1='{ADDRESS_1}', ADDRESS_2='{ADDRESS_2}', ADDRESS_3='{ADDRESS_3}', 
P_REGION_ID={P_REGION_ID}, 
ZIP_CODE={ZIP_CODE}, 
ACTIVE_DATE='{ACTIVE_DATE}', 
START_INVOICE_DATE='{START_INVOICE_DATE}', 
END_INVOICE_DATE='{END_INVOICE_DATE}', 
CONTRACT_NUMBER='{CONTRACT_NUMBER}', 
UPDATE_BY='{UPDATE_BY}' 
WHERE  SUBSCRIBER_ID = {SUBSCRIBER_ID}">
			<Components>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SERVICE_NO" fieldSource="SERVICE_NO" required="True" caption="SERVICE NO" wizardCaption="SERVICE NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSERVICE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" required="False" caption="SERVICE NO" wizardCaption="SERVICE NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SUBSCRIPTION_NAME" fieldSource="SUBSCRIPTION_NAME" required="True" caption="SUBSCRIPTION NAME" wizardCaption="SUBSCRIPTION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSUBSCRIPTION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NAME" fieldSource="ACCOUNT_NAME" required="True" caption="ACCOUNT NAME" wizardCaption="ACCOUNT NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERACCOUNT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NO" fieldSource="ACCOUNT_NO" required="True" caption="ACCOUNT NO" wizardCaption="ACCOUNT NO" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERACCOUNT_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" required="True" caption="SERVICE TYPE CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="QTY_SUB_FROM" fieldSource="QTY_SUB_FROM" required="False" caption="QTY SUB FROM" wizardCaption="QTY SUB FROM" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERQTY_SUB_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TARIFF_SCENARIO_CODE" fieldSource="TARIFF_SCENARIO_CODE" required="True" caption="TARIFF SCENARIO CODE" wizardCaption="TARIFF SCENARIO CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERTARIFF_SCENARIO_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TARIFF_SCENARIO_ID" fieldSource="P_TARIFF_SCENARIO_ID" required="True" caption="P TARIFF SCENARIO ID" wizardCaption="P TARIFF SCENARIO ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_TARIFF_SCENARIO_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" required="True" caption="BILL PERIOD UNIT CODE" wizardCaption="BILL PERIOD UNIT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="BILLING_UNIT" fieldSource="BILLING_UNIT" required="True" caption="BILLING UNIT" wizardCaption="BILLING UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_CYCLE_CODE" fieldSource="BILL_CYCLE_CODE" required="True" caption="BILL CYCLE CODE" wizardCaption="BILL CYCLE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_CYCLE_ID" fieldSource="P_BILL_CYCLE_ID" required="True" caption="P BILL CYCLE ID" wizardCaption="P BILL CYCLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_BILL_CYCLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SUBSCRIPTION_STATUS_CODE" fieldSource="SUBSCRIPTION_STATUS_CODE" required="True" caption="SUBSCRIPTION STATUS CODE" wizardCaption="SUBSCRIPTION STATUS CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSUBSCRIPTION_STATUS_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="LAST_STATUS_DATE" fieldSource="LAST_STATUS_DATE" required="True" caption="LAST STATUS DATE" wizardCaption="LAST STATUS DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERLAST_STATUS_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="19" name="DatePicker_LAST_STATUS_DATE" control="LAST_STATUS_DATE" wizardSatellite="True" wizardControl="LAST_STATUS_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="V_SUBSCRIBERDatePicker_LAST_STATUS_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<ListBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_INVOICED" fieldSource="IS_INVOICED" required="True" caption="IS INVOICED" wizardCaption="IS INVOICED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERIS_INVOICED" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="No" dataSource="Y;Yes;N;No">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_VAT_EXCEPTION" fieldSource="IS_VAT_EXCEPTION" required="True" caption="IS VAT EXCEPTION" wizardCaption="IS VAT EXCEPTION" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERIS_VAT_EXCEPTION" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="No" dataSource="Y;Yes;N;No">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SUBSCRIBER_SEGMENT_CODE" fieldSource="SUBSCRIBER_SEGMENT_CODE" required="True" caption="SUBSCRIBER SEGMENT CODE" wizardCaption="SUBSCRIBER SEGMENT CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSUBSCRIBER_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUILDING_TYPE_CODE" fieldSource="BUILDING_TYPE_CODE" required="False" caption="BUILDING TYPE CODE" wizardCaption="BUILDING TYPE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBUILDING_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="BUILDING_TYPE_ID" fieldSource="BUILDING_TYPE_ID" required="False" caption="BUILDING TYPE ID" wizardCaption="BUILDING TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBUILDING_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUSINESS_AREA_ID" fieldSource="P_BUSINESS_AREA_ID" required="False" caption="P BUSINESS AREA ID" wizardCaption="P BUSINESS AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_BUSINESS_AREA_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="69" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUSINESS_AREA_CODE" fieldSource="BUSINESS_AREA_CODE" required="False" caption="BUSINESS AREA CODE" wizardCaption="BUSINESS AREA CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBUSINESS_AREA_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" required="True" caption="P SERVICE TYPE ID" wizardCaption="P SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TERMINATION_DATE" fieldSource="TERMINATION_DATE" required="False" caption="TERMINATION DATE" wizardCaption="TERMINATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERTERMINATION_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_DEGREE" fieldSource="EM_DEGREE" required="False" caption="EM DEGREE" wizardCaption="EM DEGREE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBEREM_DEGREE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_MINUTE" fieldSource="EM_MINUTE" required="False" caption="EM MINUTE" wizardCaption="EM MINUTE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBEREM_MINUTE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_SECOND" fieldSource="EM_SECOND" required="False" caption="EM SECOND" wizardCaption="EM SECOND" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBEREM_SECOND">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_DEGREE" fieldSource="SL_DEGREE" required="False" caption="SL DEGREE" wizardCaption="SL DEGREE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSL_DEGREE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_MINUTE" fieldSource="SL_MINUTE" required="False" caption="SL MINUTE" wizardCaption="SL MINUTE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSL_MINUTE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_SECOND" fieldSource="SL_SECOND" required="False" caption="SL SECOND" wizardCaption="SL SECOND" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSL_SECOND">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SALES_PERSON_CODE" fieldSource="SALES_PERSON_CODE" required="False" caption="SALES PERSON CODE" wizardCaption="SALES PERSON CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSALES_PERSON_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SALES_PERSON_ID" fieldSource="P_SALES_PERSON_ID" required="False" caption="P SALES PERSON ID" wizardCaption="P SALES PERSON ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_SALES_PERSON_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="53" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="V_SUBSCRIBERDatePicker_UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SUBSCRIPTION_STATUS_ID" fieldSource="P_SUBSCRIPTION_STATUS_ID" required="True" caption="P SUBSCRIPTION STATUS ID" wizardCaption="P SUBSCRIPTION STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_SUBSCRIPTION_STATUS_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SUBSCRIBER_SEGMENT_ID" fieldSource="P_SUBSCRIBER_SEGMENT_ID" required="True" caption="P SUBSCRIBER SEGMENT ID" wizardCaption="P SUBSCRIBER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_SUBSCRIBER_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID" required="True" caption="CUSTOMER ACCOUNT ID" wizardCaption="CUSTOMER ACCOUNT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERCUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="True" caption="P BILLING PERIOD UNIT ID" wizardCaption="P BILLING PERIOD UNIT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="QTY_SUB_TO" fieldSource="QTY_SUB_TO" required="False" caption="QTY SUB TO" wizardCaption="QTY SUB TO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERQTY_SUB_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="72" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="V_SUBSCRIBERButton_Insert" removeParameters="TAMBAH;s_keyword" returnPage="subscriber.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="73" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="75" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="V_SUBSCRIBERButton_Update" removeParameters="TAMBAH" returnPage="subscriber.ccp">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="78" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="V_SUBSCRIBERButton_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage" returnPage="subscriber.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="79" message="Ara you sure delete this record?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="80" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="81" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="V_SUBSCRIBERButton_Cancel" removeParameters="TAMBAH;s_keyword;P_APP_ROLEPage" returnPage="subscriber.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="82" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SALES_COMPANY" fieldSource="SALES_COMPANY" required="False" caption="SALES COMPANY" wizardCaption="SALES COMPANY" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSALES_COMPANY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="275" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_PAYMENT_KEY" PathID="V_SUBSCRIBERIS_PAYMENT_KEY" fieldSource="IS_PAYMENT_KEY" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="No" dataSource="Y;Yes;N;No">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="276" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SUB_ARE_CODE" fieldSource="SUB_ARE_CODE" required="False" caption="SUB AREA CODE" wizardCaption="BUSINESS AREA CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSUB_ARE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="277" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SUB_BUSINESS_AREA_ID" PathID="V_SUBSCRIBERP_SUB_BUSINESS_AREA_ID" fieldSource="P_SUB_BUSINESS_AREA_ID" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="279" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="RE_ACTIVATION_DATE" PathID="V_SUBSCRIBERRE_ACTIVATION_DATE" fieldSource="RE_ACTIVATION_DATE" caption="RE ACTIVATION DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="280" name="DatePicker_RE_ACTIVATION_DATE" control="RE_ACTIVATION_DATE" wizardSatellite="True" wizardControl="ACTIVE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="V_SUBSCRIBERDatePicker_RE_ACTIVATION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<DatePicker id="281" name="DatePicker_TERMINATION_DATE" control="TERMINATION_DATE" wizardSatellite="True" wizardControl="ACTIVE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="V_SUBSCRIBERDatePicker_TERMINATION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="433" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DEBTOR_SEGMENT_CODE" PathID="V_SUBSCRIBERDEBTOR_SEGMENT_CODE" fieldSource="DEBTOR_SEGMENT_CODE" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="434" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_DEBTOR_SEGMENT_ID" PathID="V_SUBSCRIBERP_DEBTOR_SEGMENT_ID" fieldSource="P_DEBTOR_SEGMENT_ID" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="435" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUSINESS_SEGMENT_CODE" PathID="V_SUBSCRIBERBUSINESS_SEGMENT_CODE" fieldSource="BUSINESS_SEGMENT_CODE" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="436" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUSINESS_SEGMENT_ID" PathID="V_SUBSCRIBERP_BUSINESS_SEGMENT_ID" fieldSource="P_BUSINESS_SEGMENT_ID" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="274" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIPTION_TYPE_ID" PathID="V_SUBSCRIBERSUBSCRIPTION_TYPE_ID" sourceType="SQL" connection="Conn" dataSource="select * from P_REFERENCE_LIST where P_REFERENCE_TYPE_ID=10" boundColumn="P_REFERENCE_LIST_ID" textColumn="CODE" fieldSource="SUBSCRIPTION_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextArea id="278" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" PathID="V_SUBSCRIBERDESCRIPTION" fieldSource="DESCRIPTION" caption="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="432" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_SEGMENT_CODE" PathID="V_SUBSCRIBERCUSTOMER_SEGMENT_CODE" fieldSource="CUSTOMER_SEGMENT_CODE" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="431" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CUSTOMER_SEGMENT_ID" PathID="V_SUBSCRIBERP_CUSTOMER_SEGMENT_ID" fieldSource="P_CUSTOMER_SEGMENT_ID" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUILDING_STATUS_CODE" fieldSource="BUILDING_STATUS_CODE" required="False" caption="BUILDING STATUS CODE" wizardCaption="BUILDING STATUS CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBUILDING_STATUS_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="BUILDING_STATUS_ID" fieldSource="BUILDING_STATUS_ID" required="False" caption="BUILDING STATUS ID" wizardCaption="BUILDING STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERBUILDING_STATUS_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="30" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_1" fieldSource="ADDRESS_1" required="False" caption="ADDRESS 1" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERADDRESS_1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_2" fieldSource="ADDRESS_2" required="False" caption="ADDRESS 2" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERADDRESS_2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_3" fieldSource="ADDRESS_3" required="False" caption="ADDRESS 3" wizardCaption="ADDRESS 3" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERADDRESS_3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REGION_NAME" fieldSource="REGION_NAME" required="False" caption="REGION NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERREGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" fieldSource="P_REGION_ID" required="False" caption="P REGION ID" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERP_REGION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ZIP_CODE" fieldSource="ZIP_CODE" required="False" caption="ZIP CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="ACTIVE_DATE" fieldSource="ACTIVE_DATE" required="False" caption="ACTIVE DATE" wizardCaption="ACTIVE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERACTIVE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="36" name="DatePicker_ACTIVE_DATE" control="ACTIVE_DATE" wizardSatellite="True" wizardControl="ACTIVE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="V_SUBSCRIBERDatePicker_ACTIVE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="START_INVOICE_DATE" fieldSource="START_INVOICE_DATE" required="False" caption="START INVOICE DATE" wizardCaption="START INVOICE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERSTART_INVOICE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="END_INVOICE_DATE" fieldSource="END_INVOICE_DATE" required="False" caption="END INVOICE DATE" wizardCaption="END INVOICE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBEREND_INVOICE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="42" name="DatePicker_END_INVOICE_DATE" control="END_INVOICE_DATE" wizardSatellite="True" wizardControl="END_INVOICE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="V_SUBSCRIBERDatePicker_END_INVOICE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CONTRACT_NUMBER" fieldSource="CONTRACT_NUMBER" required="False" caption="CONTRACT NUMBER" wizardCaption="CONTRACT NUMBER" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERCONTRACT_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERCREATION_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="51" name="DatePicker_CREATION_DATE" control="CREATION_DATE" wizardSatellite="True" wizardControl="CREATION_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="V_SUBSCRIBERDatePicker_CREATION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBERUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="437" name="DatePicker_START_INVOICE_DATE" style="../Styles/Apricot/Style.css" control="START_INVOICE_DATE" PathID="V_SUBSCRIBERDatePicker_START_INVOICE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="271"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="272"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_ID" parameterSource="SUBSCRIBER_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="503" variable="SERVICE_NO" dataType="Float" parameterType="Control" parameterSource="SERVICE_NO"/>
<SQLParameter id="504" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
<SQLParameter id="505" variable="SUBSCRIPTION_NAME" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_NAME"/>
<SQLParameter id="509" variable="QTY_SUB_FROM" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_FROM"/>
<SQLParameter id="511" variable="P_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_TARIFF_SCENARIO_ID"/>
<SQLParameter id="513" variable="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
<SQLParameter id="515" variable="P_BILL_CYCLE_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_CYCLE_ID"/>
<SQLParameter id="518" variable="IS_INVOICED" dataType="Text" parameterType="Control" parameterSource="IS_INVOICED"/>
<SQLParameter id="519" variable="IS_VAT_EXCEPTION" dataType="Text" parameterType="Control" parameterSource="IS_VAT_EXCEPTION"/>
<SQLParameter id="522" variable="BUILDING_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_TYPE_ID"/>
<SQLParameter id="523" variable="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
<SQLParameter id="525" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="526" variable="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="527" variable="EM_DEGREE" dataType="Float" parameterType="Control" parameterSource="EM_DEGREE"/>
<SQLParameter id="528" variable="EM_MINUTE" dataType="Float" parameterType="Control" parameterSource="EM_MINUTE"/>
<SQLParameter id="529" variable="EM_SECOND" dataType="Float" parameterType="Control" parameterSource="EM_SECOND"/>
<SQLParameter id="530" variable="SL_DEGREE" dataType="Float" parameterType="Control" parameterSource="SL_DEGREE"/>
<SQLParameter id="531" variable="SL_MINUTE" dataType="Float" parameterType="Control" parameterSource="SL_MINUTE"/>
<SQLParameter id="532" variable="SL_SECOND" dataType="Float" parameterType="Control" parameterSource="SL_SECOND"/>
<SQLParameter id="533" variable="SALES_PERSON_CODE" dataType="Text" parameterType="Control" parameterSource="SALES_PERSON_CODE"/>
<SQLParameter id="534" variable="P_SALES_PERSON_ID" dataType="Float" parameterType="Control" parameterSource="P_SALES_PERSON_ID"/>
<SQLParameter id="536" variable="P_SUBSCRIPTION_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIPTION_STATUS_ID"/>
<SQLParameter id="537" variable="P_SUBSCRIBER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIBER_SEGMENT_ID"/>
<SQLParameter id="538" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
<SQLParameter id="539" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="540" variable="QTY_SUB_TO" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_TO"/>
<SQLParameter id="541" variable="SALES_COMPANY" dataType="Text" parameterType="Control" parameterSource="SALES_COMPANY"/>
<SQLParameter id="542" variable="IS_PAYMENT_KEY" dataType="Text" parameterType="Control" parameterSource="IS_PAYMENT_KEY"/>
<SQLParameter id="544" variable="P_SUB_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_BUSINESS_AREA_ID"/>
<SQLParameter id="545" variable="RE_ACTIVATION_DATE" dataType="Date" parameterType="Control" parameterSource="RE_ACTIVATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="547" variable="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID"/>
<SQLParameter id="549" variable="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID"/>
<SQLParameter id="550" variable="SUBSCRIPTION_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_TYPE_ID"/>
<SQLParameter id="551" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="553" variable="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
<SQLParameter id="555" variable="BUILDING_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_STATUS_ID"/>
<SQLParameter id="556" variable="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
<SQLParameter id="557" variable="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
<SQLParameter id="558" variable="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
<SQLParameter id="560" variable="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
<SQLParameter id="561" variable="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
<SQLParameter id="562" variable="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="563" variable="START_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="START_INVOICE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="564" variable="END_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="END_INVOICE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="565" variable="CONTRACT_NUMBER" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NUMBER"/>
<SQLParameter id="567" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="570" variable="ACCOUNT_NO" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NO"/>
<SQLParameter id="574" variable="BILL_CYCLE_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_CYCLE_CODE"/>
<SQLParameter id="587" variable="LAST_STATUS_DATE" dataType="Date" parameterType="Control" parameterSource="LAST_STATUS_DATE" format="dd-mmm-yyyy"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="438" field="SERVICE_NO" dataType="Float" parameterType="Control" parameterSource="SERVICE_NO" omitIfEmpty="True"/>
<CustomParameter id="439" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID" omitIfEmpty="True"/>
<CustomParameter id="440" field="SUBSCRIPTION_NAME" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_NAME" omitIfEmpty="True"/>
<CustomParameter id="441" field="ACCOUNT_NAME" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NAME" omitIfEmpty="True"/>
<CustomParameter id="442" field="ACCOUNT_NO" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NO" omitIfEmpty="True"/>
<CustomParameter id="443" field="SERVICE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_TYPE_CODE" omitIfEmpty="True"/>
<CustomParameter id="444" field="QTY_SUB_FROM" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_FROM" omitIfEmpty="True"/>
<CustomParameter id="445" field="TARIFF_SCENARIO_CODE" dataType="Text" parameterType="Control" parameterSource="TARIFF_SCENARIO_CODE" omitIfEmpty="True"/>
<CustomParameter id="446" field="P_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_TARIFF_SCENARIO_ID" omitIfEmpty="True"/>
<CustomParameter id="447" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE" omitIfEmpty="True"/>
<CustomParameter id="448" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT" omitIfEmpty="True"/>
<CustomParameter id="449" field="BILL_CYCLE_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_CYCLE_CODE" omitIfEmpty="True"/>
<CustomParameter id="450" field="P_BILL_CYCLE_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_CYCLE_ID" omitIfEmpty="True"/>
<CustomParameter id="451" field="SUBSCRIPTION_STATUS_CODE" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_STATUS_CODE" omitIfEmpty="True"/>
<CustomParameter id="453" field="IS_INVOICED" dataType="Text" parameterType="Control" parameterSource="IS_INVOICED" omitIfEmpty="True"/>
<CustomParameter id="454" field="IS_VAT_EXCEPTION" dataType="Text" parameterType="Control" parameterSource="IS_VAT_EXCEPTION" omitIfEmpty="True"/>
<CustomParameter id="455" field="SUBSCRIBER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_SEGMENT_CODE" omitIfEmpty="True"/>
<CustomParameter id="456" field="BUILDING_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="BUILDING_TYPE_CODE" omitIfEmpty="True"/>
<CustomParameter id="457" field="BUILDING_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_TYPE_ID" omitIfEmpty="True"/>
<CustomParameter id="458" field="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID" omitIfEmpty="True"/>
<CustomParameter id="459" field="BUSINESS_AREA_CODE" dataType="Text" parameterType="Control" parameterSource="BUSINESS_AREA_CODE" omitIfEmpty="True"/>
<CustomParameter id="460" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID" omitIfEmpty="True"/>
<CustomParameter id="461" field="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="462" field="EM_DEGREE" dataType="Float" parameterType="Control" parameterSource="EM_DEGREE" omitIfEmpty="True"/>
<CustomParameter id="463" field="EM_MINUTE" dataType="Float" parameterType="Control" parameterSource="EM_MINUTE" omitIfEmpty="True"/>
<CustomParameter id="464" field="EM_SECOND" dataType="Float" parameterType="Control" parameterSource="EM_SECOND" omitIfEmpty="True"/>
<CustomParameter id="465" field="SL_DEGREE" dataType="Float" parameterType="Control" parameterSource="SL_DEGREE" omitIfEmpty="True"/>
<CustomParameter id="466" field="SL_MINUTE" dataType="Float" parameterType="Control" parameterSource="SL_MINUTE" omitIfEmpty="True"/>
<CustomParameter id="467" field="SL_SECOND" dataType="Float" parameterType="Control" parameterSource="SL_SECOND" omitIfEmpty="True"/>
<CustomParameter id="468" field="SALES_PERSON_CODE" dataType="Text" parameterType="Control" parameterSource="SALES_PERSON_CODE" omitIfEmpty="True"/>
<CustomParameter id="469" field="P_SALES_PERSON_ID" dataType="Float" parameterType="Control" parameterSource="P_SALES_PERSON_ID" omitIfEmpty="True"/>
<CustomParameter id="470" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="471" field="P_SUBSCRIPTION_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIPTION_STATUS_ID" omitIfEmpty="True"/>
<CustomParameter id="472" field="P_SUBSCRIBER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIBER_SEGMENT_ID" omitIfEmpty="True"/>
<CustomParameter id="473" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID" omitIfEmpty="True"/>
<CustomParameter id="474" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID" omitIfEmpty="True"/>
<CustomParameter id="475" field="QTY_SUB_TO" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_TO" omitIfEmpty="True"/>
<CustomParameter id="476" field="SALES_COMPANY" dataType="Text" parameterType="Control" parameterSource="SALES_COMPANY" omitIfEmpty="True"/>
<CustomParameter id="477" field="IS_PAYMENT_KEY" dataType="Text" parameterType="Control" parameterSource="IS_PAYMENT_KEY" omitIfEmpty="True"/>
<CustomParameter id="478" field="SUB_ARE_CODE" dataType="Text" parameterType="Control" parameterSource="SUB_ARE_CODE" omitIfEmpty="True"/>
<CustomParameter id="479" field="P_SUB_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_BUSINESS_AREA_ID" omitIfEmpty="True"/>
<CustomParameter id="480" field="RE_ACTIVATION_DATE" dataType="Date" parameterType="Control" parameterSource="RE_ACTIVATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="481" field="DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="DEBTOR_SEGMENT_CODE" omitIfEmpty="True"/>
<CustomParameter id="482" field="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID" omitIfEmpty="True"/>
<CustomParameter id="483" field="BUSINESS_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="BUSINESS_SEGMENT_CODE" omitIfEmpty="True"/>
<CustomParameter id="484" field="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID" omitIfEmpty="True"/>
<CustomParameter id="485" field="SUBSCRIPTION_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_TYPE_ID" omitIfEmpty="True"/>
<CustomParameter id="486" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
<CustomParameter id="487" field="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE" omitIfEmpty="True"/>
<CustomParameter id="488" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID" omitIfEmpty="True"/>
<CustomParameter id="489" field="BUILDING_STATUS_CODE" dataType="Text" parameterType="Control" parameterSource="BUILDING_STATUS_CODE" omitIfEmpty="True"/>
<CustomParameter id="490" field="BUILDING_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_STATUS_ID" omitIfEmpty="True"/>
<CustomParameter id="491" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1" omitIfEmpty="True"/>
<CustomParameter id="492" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2" omitIfEmpty="True"/>
<CustomParameter id="493" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3" omitIfEmpty="True"/>
<CustomParameter id="494" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME" omitIfEmpty="True"/>
<CustomParameter id="495" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID" omitIfEmpty="True"/>
<CustomParameter id="496" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE" omitIfEmpty="True"/>
<CustomParameter id="497" field="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="498" field="START_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="START_INVOICE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="499" field="END_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="END_INVOICE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="500" field="CONTRACT_NUMBER" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NUMBER" omitIfEmpty="True"/>
<CustomParameter id="501" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="502" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
<CustomParameter id="568" field="LAST_STATUS_DATE" dataType="Date" parameterType="Control" parameterSource="LAST_STATUS_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="654" variable="SERVICE_NO" dataType="Float" parameterType="Control" parameterSource="SERVICE_NO"/>
<SQLParameter id="655" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID" defaultValue="0"/>
<SQLParameter id="656" variable="SUBSCRIPTION_NAME" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_NAME"/>
<SQLParameter id="660" variable="QTY_SUB_FROM" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_FROM"/>
<SQLParameter id="662" variable="P_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_TARIFF_SCENARIO_ID"/>
<SQLParameter id="664" variable="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
<SQLParameter id="666" variable="P_BILL_CYCLE_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_CYCLE_ID"/>
<SQLParameter id="668" variable="LAST_STATUS_DATE" dataType="Date" parameterType="Control" parameterSource="LAST_STATUS_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="669" variable="IS_INVOICED" dataType="Text" parameterType="Control" parameterSource="IS_INVOICED"/>
<SQLParameter id="670" variable="IS_VAT_EXCEPTION" dataType="Text" parameterType="Control" parameterSource="IS_VAT_EXCEPTION"/>
<SQLParameter id="673" variable="BUILDING_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_TYPE_ID"/>
<SQLParameter id="674" variable="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
<SQLParameter id="676" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<SQLParameter id="677" variable="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="678" variable="EM_DEGREE" dataType="Float" parameterType="Control" parameterSource="EM_DEGREE"/>
<SQLParameter id="679" variable="EM_MINUTE" dataType="Float" parameterType="Control" parameterSource="EM_MINUTE"/>
<SQLParameter id="680" variable="EM_SECOND" dataType="Float" parameterType="Control" parameterSource="EM_SECOND"/>
<SQLParameter id="681" variable="SL_DEGREE" dataType="Float" parameterType="Control" parameterSource="SL_DEGREE"/>
<SQLParameter id="682" variable="SL_MINUTE" dataType="Float" parameterType="Control" parameterSource="SL_MINUTE"/>
<SQLParameter id="683" variable="SL_SECOND" dataType="Float" parameterType="Control" parameterSource="SL_SECOND"/>
<SQLParameter id="685" variable="P_SALES_PERSON_ID" dataType="Float" parameterType="Control" parameterSource="P_SALES_PERSON_ID"/>
<SQLParameter id="687" variable="P_SUBSCRIPTION_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIPTION_STATUS_ID"/>
<SQLParameter id="688" variable="P_SUBSCRIBER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIBER_SEGMENT_ID"/>
<SQLParameter id="689" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
<SQLParameter id="690" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="691" variable="QTY_SUB_TO" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_TO"/>
<SQLParameter id="693" variable="IS_PAYMENT_KEY" dataType="Text" parameterType="Control" parameterSource="IS_PAYMENT_KEY"/>
<SQLParameter id="695" variable="P_SUB_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_BUSINESS_AREA_ID"/>
<SQLParameter id="696" variable="RE_ACTIVATION_DATE" dataType="Date" parameterType="Control" parameterSource="RE_ACTIVATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="698" variable="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID"/>
<SQLParameter id="700" variable="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID"/>
<SQLParameter id="701" variable="SUBSCRIPTION_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIPTION_TYPE_ID"/>
<SQLParameter id="702" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="704" variable="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
<SQLParameter id="706" variable="BUILDING_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_STATUS_ID"/>
<SQLParameter id="707" variable="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
<SQLParameter id="708" variable="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
<SQLParameter id="709" variable="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
<SQLParameter id="711" variable="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
<SQLParameter id="712" variable="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
<SQLParameter id="713" variable="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="714" variable="START_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="START_INVOICE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="715" variable="END_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="END_INVOICE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="716" variable="CONTRACT_NUMBER" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NUMBER"/>
<SQLParameter id="718" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
</USQLParameters>
			<UConditions>
<TableParameter id="588" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
</UConditions>
			<UFormElements>
				<CustomParameter id="589" field="SERVICE_NO" dataType="Float" parameterType="Control" parameterSource="SERVICE_NO"/>
<CustomParameter id="590" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
<CustomParameter id="591" field="SUBSCRIPTION_NAME" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_NAME"/>
<CustomParameter id="592" field="ACCOUNT_NAME" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NAME"/>
<CustomParameter id="593" field="ACCOUNT_NO" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NO"/>
<CustomParameter id="594" field="SERVICE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_TYPE_CODE"/>
<CustomParameter id="595" field="QTY_SUB_FROM" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_FROM"/>
<CustomParameter id="596" field="TARIFF_SCENARIO_CODE" dataType="Text" parameterType="Control" parameterSource="TARIFF_SCENARIO_CODE"/>
<CustomParameter id="597" field="P_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_TARIFF_SCENARIO_ID"/>
<CustomParameter id="598" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
<CustomParameter id="599" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
<CustomParameter id="600" field="BILL_CYCLE_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_CYCLE_CODE"/>
<CustomParameter id="601" field="P_BILL_CYCLE_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_CYCLE_ID"/>
<CustomParameter id="602" field="SUBSCRIPTION_STATUS_CODE" dataType="Text" parameterType="Control" parameterSource="SUBSCRIPTION_STATUS_CODE"/>
<CustomParameter id="603" field="LAST_STATUS_DATE" dataType="Date" parameterType="Control" parameterSource="LAST_STATUS_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="604" field="IS_INVOICED" dataType="Text" parameterType="Control" parameterSource="IS_INVOICED"/>
<CustomParameter id="605" field="IS_VAT_EXCEPTION" dataType="Text" parameterType="Control" parameterSource="IS_VAT_EXCEPTION"/>
<CustomParameter id="606" field="SUBSCRIBER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_SEGMENT_CODE"/>
<CustomParameter id="607" field="BUILDING_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="BUILDING_TYPE_CODE"/>
<CustomParameter id="608" field="BUILDING_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_TYPE_ID"/>
<CustomParameter id="609" field="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
<CustomParameter id="610" field="BUSINESS_AREA_CODE" dataType="Text" parameterType="Control" parameterSource="BUSINESS_AREA_CODE"/>
<CustomParameter id="611" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
<CustomParameter id="612" field="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="613" field="EM_DEGREE" dataType="Float" parameterType="Control" parameterSource="EM_DEGREE"/>
<CustomParameter id="614" field="EM_MINUTE" dataType="Float" parameterType="Control" parameterSource="EM_MINUTE"/>
<CustomParameter id="615" field="EM_SECOND" dataType="Float" parameterType="Control" parameterSource="EM_SECOND"/>
<CustomParameter id="616" field="SL_DEGREE" dataType="Float" parameterType="Control" parameterSource="SL_DEGREE"/>
<CustomParameter id="617" field="SL_MINUTE" dataType="Float" parameterType="Control" parameterSource="SL_MINUTE"/>
<CustomParameter id="618" field="SL_SECOND" dataType="Float" parameterType="Control" parameterSource="SL_SECOND"/>
<CustomParameter id="619" field="SALES_PERSON_CODE" dataType="Text" parameterType="Control" parameterSource="SALES_PERSON_CODE"/>
<CustomParameter id="620" field="P_SALES_PERSON_ID" dataType="Float" parameterType="Control" parameterSource="P_SALES_PERSON_ID"/>
<CustomParameter id="621" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="622" field="P_SUBSCRIPTION_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIPTION_STATUS_ID"/>
<CustomParameter id="623" field="P_SUBSCRIBER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUBSCRIBER_SEGMENT_ID"/>
<CustomParameter id="624" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
<CustomParameter id="625" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<CustomParameter id="626" field="QTY_SUB_TO" dataType="Float" parameterType="Control" parameterSource="QTY_SUB_TO"/>
<CustomParameter id="627" field="SALES_COMPANY" dataType="Text" parameterType="Control" parameterSource="SALES_COMPANY"/>
<CustomParameter id="628" field="IS_PAYMENT_KEY" dataType="Text" parameterType="Control" parameterSource="IS_PAYMENT_KEY"/>
<CustomParameter id="629" field="SUB_ARE_CODE" dataType="Text" parameterType="Control" parameterSource="SUB_ARE_CODE"/>
<CustomParameter id="630" field="P_SUB_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_BUSINESS_AREA_ID"/>
<CustomParameter id="631" field="RE_ACTIVATION_DATE" dataType="Date" parameterType="Control" parameterSource="RE_ACTIVATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="632" field="DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="DEBTOR_SEGMENT_CODE"/>
<CustomParameter id="633" field="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID"/>
<CustomParameter id="634" field="BUSINESS_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="BUSINESS_SEGMENT_CODE"/>
<CustomParameter id="635" field="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID"/>
<CustomParameter id="636" field="SUBSCRIPTION_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIPTION_TYPE_ID"/>
<CustomParameter id="637" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="638" field="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE"/>
<CustomParameter id="639" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
<CustomParameter id="640" field="BUILDING_STATUS_CODE" dataType="Text" parameterType="Control" parameterSource="BUILDING_STATUS_CODE"/>
<CustomParameter id="641" field="BUILDING_STATUS_ID" dataType="Float" parameterType="Control" parameterSource="BUILDING_STATUS_ID"/>
<CustomParameter id="642" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
<CustomParameter id="643" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
<CustomParameter id="644" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
<CustomParameter id="645" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
<CustomParameter id="646" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
<CustomParameter id="647" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
<CustomParameter id="648" field="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="649" field="START_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="START_INVOICE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="650" field="END_INVOICE_DATE" dataType="Date" parameterType="Control" parameterSource="END_INVOICE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="651" field="CONTRACT_NUMBER" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NUMBER"/>
<CustomParameter id="652" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="653" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="270" variable="SUBSCRIBER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SUBSCRIBER_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber_form.php" forShow="True" url="subscriber_form.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_form_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
