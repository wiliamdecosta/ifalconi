<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Record id="53" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="SubscribInfo" connection="Conn" dataSource="SELECT *
FROM V_SUBSCRIBER
WHERE SUBSCRIBER_ID = {SUBSCRIBER_ID}" customInsertType="SQL" customInsert="INSERT INTO P_INPUT_FILE_DESC(P_INPUT_FILE_DESC_ID, P_INPUT_FILE_TYPE_ID, P_SERVICE_TYPE_ID, PROCEDURE_NAME, START_POSITION_NAME, END_POSITION_NAME, PARTIAL_FILE_NAME, START_DATA_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_INPUT_FILE_DESC','P_INPUT_FILE_DESC_ID'),{P_INPUT_FILE_TYPE_ID},{P_SERVICE_TYPE_ID},'{PROCEDURE_NAME}',{START_POSITION_NAME},{END_POSITION_NAME},'{PARTIAL_FILE_NAME}',{START_DATA_POSITION},'{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_INPUT_FILE_DESC SET 
P_INPUT_FILE_TYPE_ID={P_INPUT_FILE_TYPE_ID},
P_SERVICE_TYPE_ID={P_SERVICE_TYPE_ID},
PROCEDURE_NAME='{PROCEDURE_NAME}',
START_POSITION_NAME={START_POSITION_NAME},
END_POSITION_NAME={END_POSITION_NAME},
PARTIAL_FILE_NAME='{PARTIAL_FILE_NAME}',
START_DATA_POSITION={START_DATA_POSITION},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_INPUT_FILE_DESC WHERE P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}" PathID="SubscribInfo" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" pasteActions="pasteActions">
			<Components>
				<Label id="54" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_NO" fieldSource="SERVICE_NO" PathID="SubscribInfoSERVICE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="55" fieldSourceType="DBColumn" dataType="Text" html="False" name="TARIFF_SCENARIO_CODE" fieldSource="TARIFF_SCENARIO_CODE" PathID="SubscribInfoTARIFF_SCENARIO_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="109" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIPTION_NAME" PathID="SubscribInfoSUBSCRIPTION_NAME" fieldSource="SUBSCRIPTION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" PathID="SubscribInfoSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="57" conditionType="Parameter" useIsNull="False" field="P_INPUT_FILE_DESC_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" parameterSource="P_INPUT_FILE_DESC_ID" logicOperator="And" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="58" variable="SUBSCRIBER_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="59" variable="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="60" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="61" variable="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="62" variable="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="63" variable="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="64" variable="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="65" variable="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION" defaultValue="0"/>
				<SQLParameter id="66" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="67" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<SQLParameter id="68" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="69" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="70" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="71" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="72" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="73" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="74" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<CustomParameter id="75" field="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION"/>
				<CustomParameter id="76" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="77" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="78" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="79" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="80" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="81" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="82" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="83" variable="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="84" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="85" variable="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="86" variable="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="87" variable="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="88" variable="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="89" variable="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION" defaultValue="0"/>
				<SQLParameter id="90" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="91" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<SQLParameter id="92" variable="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="93" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="94" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="95" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="96" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="97" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="98" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<CustomParameter id="99" field="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION"/>
				<CustomParameter id="100" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="101" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="102" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="103" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="104" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="105" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="106" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
				<CustomParameter id="107" field="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="108" variable="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="110" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_SUBS_OVERRIDE_RECU_TARI" errorSummator="Error" wizardCaption=" V SUBS OVERRIDE RECU TARIFF " wizardFormMethod="post" PathID="V_SUBS_OVERRIDE_RECU_TARI" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" dataSource="V_SUBS_OVER_FEAT_RECU_TARIFF" customInsertType="SQL" customUpdateType="SQL" customDeleteType="SQL" customInsert="INSERT INTO SUBS_OVER_FEAT_RECU_TARIFF(
SUBS_OVER_FEAT_RECU_TARIFF_ID, 
SUBSCRIBER_ID, 
P_FEATURE_TYPE_ID, 
P_BILL_COMPONENT_ID,
VALID_FROM, 
VALID_TO, 
P_CURRENCY_ID, 
CHARGE_AMOUNT, 
P_BILLING_PERIOD_UNIT_ID, 
BILLING_UNIT, 
SUBS_OT_PROMO_FEATURE_ID, 
DESCRIPTION,
UPDATE_DATE,
UPDATE_BY
) VALUES(
GENERATE_ID('BILLDB','SUBS_OVER_FEAT_RECU_TARIFF','SUBS_OVER_FEAT_RECU_TARIFF_ID'),
{SUBSCRIBER_ID}, 
{P_FEATURE_TYPE_ID}, 
{P_BILL_COMPONENT_ID},
'{VALID_FROM}', 
'{VALID_TO}', 
{P_CURRENCY_ID}, 
{CHARGE_AMOUNT}, 
{P_BILLING_PERIOD_UNIT_ID}, 
{BILLING_UNIT}, 
{SUBS_OT_PROMO_SERVICE_ID}, 
INITCAP(TRIM('{DESCRIPTION}')), 
SYSDATE,
'{UPDATE_BY}'
)" customUpdate="UPDATE SUBS_OVER_FEAT_RECU_TARIFF SET 
P_FEATURE_TYPE_ID={P_FEATURE_TYPE_ID}, 
VALID_FROM='{VALID_FROM}', 
P_CURRENCY_ID={P_CURRENCY_ID}, 
CHARGE_AMOUNT={CHARGE_AMOUNT}, 
P_BILLING_PERIOD_UNIT_ID={P_BILLING_PERIOD_UNIT_ID}, 
BILLING_UNIT={BILLING_UNIT}, 
SUBS_OT_PROMO_FEATURE_ID={SUBS_OT_PROMO_SERVICE_ID}, 
UPDATE_BY='{UPDATE_BY}', 
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')), 
VALID_TO='{VALID_TO}', 
UPDATE_DATE=SYSDATE, 
P_BILL_COMPONENT_ID={P_BILL_COMPONENT_ID} 
WHERE  SUBS_OVER_FEAT_RECU_TARIFF_ID = {SUBS_OVER_FEAT_RECU_TARIFF_ID}" customDelete="DELETE FROM SUBS_OVER_FEAT_RECU_TARIFF WHERE  SUBS_OVER_FEAT_RECU_TARIFF_ID = {SUBS_OVER_FEAT_RECU_TARIFF_ID}">
			<Components>
				<Button id="111" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_SUBS_OVERRIDE_RECU_TARIButton_Insert" removeParameters="TAMBAH" returnPage="subscriber_tariff_override.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="112" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_SUBS_OVERRIDE_RECU_TARIButton_Update" removeParameters="TAMBAH" returnPage="subscriber_tariff_override.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="113" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_SUBS_OVERRIDE_RECU_TARIButton_Delete" removeParameters="SUBS_OVER_FEAT_RECU_TARIFF_ID" returnPage="subscriber_tariff_override.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="114" message="Are you sure delete this record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="115" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_SUBS_OVERRIDE_RECU_TARIButton_Cancel" returnPage="subscriber_tariff_override.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" required="True" caption="SUBSCRIBER ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARISUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_TYPE_ID" fieldSource="P_FEATURE_TYPE_ID" required="True" caption="P FEATURE TYPE ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIP_FEATURE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIVALID_FROM" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" required="True" caption="P CURRENCY ID" wizardCaption="P CURRENCY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIP_CURRENCY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CHARGE_AMOUNT" fieldSource="CHARGE_AMOUNT" required="True" caption="CHARGE AMOUNT" wizardCaption="CHARGE AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARICHARGE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="True" caption="P BILLING PERIOD UNIT ID" wizardCaption="P BILLING PERIOD UNIT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIP_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="BILLING_UNIT" fieldSource="BILLING_UNIT" required="True" caption="BILLING UNIT" wizardCaption="BILLING UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIBILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBS_OT_PROMO_SERVICE_ID" fieldSource="SUBS_OT_PROMO_FEATURE_ID" required="False" caption="SUBS OT PROMO SERVICE ID" wizardCaption="SUBS OT PROMO SERVICE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARISUBS_OT_PROMO_SERVICE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="132" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FEATURE_TYPE_CODE" fieldSource="FEATURE_TYPE_CODE" required="True" caption="FEATURE TYPE" wizardCaption="BILL COMPONENT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIFEATURE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="136" name="DatePicker_VALID_FROM" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="V_SUBS_OVERRIDE_RECU_TARIDatePicker_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CURRENCY_CODE" fieldSource="CURRENCY_CODE" required="True" caption="CURRENCY CODE" wizardCaption="CURRENCY CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARICURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="137" name="DatePicker_VALID_TO" style="../Styles/trb/Style.css" control="VALID_TO" PathID="V_SUBS_OVERRIDE_RECU_TARIDatePicker_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" required="True" caption="BILL PERIOD UNIT CODE" wizardCaption="BILL PERIOD UNIT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIBILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OT_FEAT_PROMOTION_CODE" fieldSource="OT_FEAT_PROMOTION_CODE" required="False" caption="OT_FEAT_PROMOTION_CODE" wizardCaption="OT PROMOTION CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIOT_FEAT_PROMOTION_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="138" fieldSourceType="DBColumn" dataType="Float" name="SUBS_OVER_FEAT_RECU_TARIFF_ID" PathID="V_SUBS_OVERRIDE_RECU_TARISUBS_OVER_FEAT_RECU_TARIFF_ID" fieldSource="SUBS_OVER_FEAT_RECU_TARIFF_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="218" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE" required="True" caption="BILL COMPONENT" wizardCaption="BILL COMPONENT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIBILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="219" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" required="True" caption="BILL COMPONENT ID" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OVERRIDE_RECU_TARIP_BILL_COMPONENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="139"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="140"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="141"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="142"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="143"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="144"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="217" conditionType="Parameter" useIsNull="False" field="SUBS_OVER_FEAT_RECU_TARIFF_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="216" tableName="V_SUBS_OVER_FEAT_RECU_TARIFF" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="239" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<SQLParameter id="240" variable="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<SQLParameter id="241" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="242" variable="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
				<SQLParameter id="243" variable="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT"/>
				<SQLParameter id="244" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<SQLParameter id="245" variable="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
				<SQLParameter id="246" variable="SUBS_OT_PROMO_SERVICE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_SERVICE_ID"/>
				<SQLParameter id="247" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="248" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="251" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="255" variable="SUBS_OVER_FEAT_RECU_TARIFF_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID"/>
				<SQLParameter id="257" variable="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="220" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<CustomParameter id="221" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
				<CustomParameter id="222" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="223" field="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
				<CustomParameter id="224" field="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT"/>
				<CustomParameter id="225" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<CustomParameter id="226" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
				<CustomParameter id="227" field="SUBS_OT_PROMO_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_SERVICE_ID"/>
				<CustomParameter id="228" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="229" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="230" field="FEATURE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_TYPE_CODE"/>
				<CustomParameter id="231" field="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE"/>
				<CustomParameter id="232" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="233" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
				<CustomParameter id="234" field="OT_FEAT_PROMOTION_CODE" dataType="Text" parameterType="Control" parameterSource="OT_FEAT_PROMOTION_CODE"/>
				<CustomParameter id="235" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="236" field="SUBS_OVER_FEAT_RECU_TARIFF_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID"/>
				<CustomParameter id="237" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
				<CustomParameter id="238" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="278" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
<SQLParameter id="279" variable="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<SQLParameter id="280" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<SQLParameter id="281" variable="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
<SQLParameter id="282" variable="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT"/>
<SQLParameter id="283" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="284" variable="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
<SQLParameter id="285" variable="SUBS_OT_PROMO_SERVICE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_SERVICE_ID"/>
<SQLParameter id="286" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="287" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="290" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<SQLParameter id="294" variable="SUBS_OVER_FEAT_RECU_TARIFF_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID" defaultValue="0"/>
<SQLParameter id="296" variable="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
</USQLParameters>
			<UConditions>
				<TableParameter id="258" conditionType="Parameter" useIsNull="False" field="SUBS_OVER_FEAT_RECU_TARIFF_ID" dataType="Float" parameterType="URL" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID" searchConditionType="Equal" logicOperator="And"/>
</UConditions>
			<UFormElements>
				<CustomParameter id="259" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
<CustomParameter id="260" field="P_FEATURE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_TYPE_ID"/>
<CustomParameter id="261" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<CustomParameter id="262" field="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
<CustomParameter id="263" field="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT"/>
<CustomParameter id="264" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<CustomParameter id="265" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
<CustomParameter id="266" field="SUBS_OT_PROMO_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_SERVICE_ID"/>
<CustomParameter id="267" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="268" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="269" field="FEATURE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="FEATURE_TYPE_CODE"/>
<CustomParameter id="270" field="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE"/>
<CustomParameter id="271" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<CustomParameter id="272" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
<CustomParameter id="273" field="OT_FEAT_PROMOTION_CODE" dataType="Text" parameterType="Control" parameterSource="OT_FEAT_PROMOTION_CODE"/>
<CustomParameter id="274" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="275" field="SUBS_OVER_FEAT_RECU_TARIFF_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID"/>
<CustomParameter id="276" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
<CustomParameter id="277" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="298" variable="SUBS_OVER_FEAT_RECU_TARIFF_ID" parameterType="Control" dataType="Float" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID" defaultValue="0"/>
</DSQLParameters>
			<DConditions>
				<TableParameter id="297" conditionType="Parameter" useIsNull="False" field="SUBS_OVER_FEAT_RECU_TARIFF_ID" dataType="Float" parameterType="URL" parameterSource="SUBS_OVER_FEAT_RECU_TARIFF_ID" searchConditionType="Equal" logicOperator="And"/>
</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_tariff_override_form2_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber_tariff_override_form2.php" forShow="True" url="subscriber_tariff_override_form2.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
