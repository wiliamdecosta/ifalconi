<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_P_BUNDLED_FEATURE1" errorSummator="Error" wizardCaption=" V P SERVICE CATEGORY " wizardFormMethod="post" PathID="V_P_BUNDLED_FEATURE1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" dataSource="V_P_RECU_TARIFF_BUNDLED_FEAT" customInsertType="SQL" customInsert="INSERT INTO P_RECU_TARIFF_BUNDLED_FEAT(
P_RECU_TARIFF_BUNDLED_FEAT_ID, 
P_BUNDLED_FEATURE_ID, 
P_RECURR_TARIFF_SCENARIO_ID, 
SUB_QTY_FROM, 
SUB_QTY_TO,
VALID_FROM, 
VALID_TO, 
P_BILLING_PERIOD_UNIT_ID, 
BILLING_UNIT,
DESCRIPTION, 
UPDATE_DATE, 
UPDATE_BY
) VALUES(
GENERATE_ID('BILLDB','P_RECU_TARIFF_BUNDLED_FEAT','P_RECU_TARIFF_BUNDLED_FEAT_ID'),
{P_BUNDLED_FEATURE_ID}, 
{P_RECURR_TARIFF_SCENARIO_ID}, 
{SUB_QTY_FROM}, 
{SUB_QTY_TO}, 
'{VALID_FROM}', 
'{VALID_TO}',
{P_BILLING_PERIOD_UNIT_ID}, 
{BILLING_UNIT},
INITCAP('{DESCRIPTION}'),
SYSDATE,
'{UPDATE_BY}'
)" customUpdateType="SQL" customUpdate="UPDATE P_RECU_TARIFF_BUNDLED_FEAT SET 
P_BILLING_PERIOD_UNIT_ID={P_BILLING_PERIOD_UNIT_ID},
VALID_FROM='{VALID_FROM}', 
UPDATE_DATE=SYSDATE, 
DESCRIPTION=INITCAP('{DESCRIPTION}'),   
VALID_TO='{VALID_TO}', 
UPDATE_BY='{UPDATE_BY}', 
P_BUNDLED_FEATURE_ID={P_BUNDLED_FEATURE_ID}, 
P_RECURR_TARIFF_SCENARIO_ID={P_RECURR_TARIFF_SCENARIO_ID}, 
SUB_QTY_FROM={SUB_QTY_FROM}, 
SUB_QTY_TO={SUB_QTY_TO}, 
BILLING_UNIT={BILLING_UNIT} 
WHERE  
P_RECU_TARIFF_BUNDLED_FEAT_ID = {P_RECU_TARIFF_BUNDLED_FEAT_ID}">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_P_BUNDLED_FEATURE1Button_Insert" returnPage="p_bundled_tariff.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_P_BUNDLED_FEATURE1Button_Update" returnPage="p_bundled_tariff.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_P_BUNDLED_FEATURE1Button_Cancel" returnPage="p_bundled_tariff.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="RECU_TARIFF_SCEN_CODE" fieldSource="RECU_TARIFF_SCEN_CODE" required="True" caption="RECU_TARIFF_SCEN_CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1RECU_TARIFF_SCEN_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="False" caption="P_SERVICE_TYPE_ID" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1P_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="81" fieldSourceType="DBColumn" dataType="Float" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" PathID="V_P_BUNDLED_FEATURE1P_RECU_TARIFF_BUNDLED_FEAT_ID" fieldSource="P_RECU_TARIFF_BUNDLED_FEAT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" required="True" caption="Service Type Code" wizardCaption="FEATURE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1BILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="82" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="V_P_BUNDLED_FEATURE1DatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="83" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="V_P_BUNDLED_FEATURE1DatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_P_BUNDLED_FEATURE1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="195" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUNDLED_FEATURE_ID" PathID="V_P_BUNDLED_FEATURE1P_BUNDLED_FEATURE_ID" fieldSource="P_BUNDLED_FEATURE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="196" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_RECURR_TARIFF_SCENARIO_ID" PathID="V_P_BUNDLED_FEATURE1P_RECURR_TARIFF_SCENARIO_ID" fieldSource="P_RECURR_TARIFF_SCENARIO_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="197" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_TYPE_ID" PathID="V_P_BUNDLED_FEATURE1P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="198" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUB_QTY_FROM" PathID="V_P_BUNDLED_FEATURE1SUB_QTY_FROM" fieldSource="SUB_QTY_FROM" caption="Sub Qty From">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="199" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUB_QTY_TO" PathID="V_P_BUNDLED_FEATURE1SUB_QTY_TO" fieldSource="SUB_QTY_TO" caption="Sub Qty To">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="200" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="BILLING_UNIT" PathID="V_P_BUNDLED_FEATURE1BILLING_UNIT" fieldSource="BILLING_UNIT">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="85"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="86"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="87"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="88"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="89"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="90"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="194" conditionType="Parameter" useIsNull="False" field="P_RECU_TARIFF_BUNDLED_FEAT_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID"/>
</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="193" tableName="V_P_RECU_TARIFF_BUNDLED_FEAT" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="110" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="112" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="115" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="119" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="120" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="216" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="220" variable="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<SQLParameter id="221" variable="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<SQLParameter id="222" variable="SUB_QTY_FROM" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_FROM"/>
<SQLParameter id="223" variable="SUB_QTY_TO" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_TO"/>
<SQLParameter id="224" variable="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="201" field="RECU_TARIFF_SCEN_CODE" dataType="Text" parameterType="Control" parameterSource="RECU_TARIFF_SCEN_CODE"/>
<CustomParameter id="202" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<CustomParameter id="203" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<CustomParameter id="204" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="205" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="206" field="P_RECU_TARIFF_BUNDLED_FEAT_ID" dataType="Float" parameterType="Control" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID"/>
<CustomParameter id="207" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
<CustomParameter id="208" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<CustomParameter id="209" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="210" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<CustomParameter id="211" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<CustomParameter id="212" field="SUB_QTY_FROM" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_FROM"/>
<CustomParameter id="213" field="SUB_QTY_TO" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_TO"/>
<CustomParameter id="214" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="145" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="147" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="150" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="154" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="188" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="191" variable="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID" defaultValue="0"/>
				<SQLParameter id="241" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
<SQLParameter id="242" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="243" variable="P_RECU_TARIFF_BUNDLED_FEAT_ID" dataType="Float" parameterType="Control" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID" defaultValue="0"/>
<SQLParameter id="245" variable="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID"/>
<SQLParameter id="246" variable="SUB_QTY_FROM" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_FROM"/>
<SQLParameter id="247" variable="SUB_QTY_TO" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_TO"/>
<SQLParameter id="248" variable="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
</USQLParameters>
			<UConditions>
				<TableParameter id="225" conditionType="Parameter" useIsNull="False" field="P_RECU_TARIFF_BUNDLED_FEAT_ID" dataType="Float" parameterType="URL" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID" searchConditionType="Equal" logicOperator="And"/>
</UConditions>
			<UFormElements>
				<CustomParameter id="226" field="RECU_TARIFF_SCEN_CODE" dataType="Text" parameterType="Control" parameterSource="RECU_TARIFF_SCEN_CODE" omitIfEmpty="True"/>
<CustomParameter id="227" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID" omitIfEmpty="True"/>
<CustomParameter id="228" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="229" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="230" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
<CustomParameter id="231" field="P_RECU_TARIFF_BUNDLED_FEAT_ID" dataType="Float" parameterType="Control" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID" omitIfEmpty="True"/>
<CustomParameter id="232" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE" omitIfEmpty="True"/>
<CustomParameter id="233" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="234" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
<CustomParameter id="235" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID" omitIfEmpty="True"/>
<CustomParameter id="236" field="P_RECURR_TARIFF_SCENARIO_ID" dataType="Float" parameterType="Control" parameterSource="P_RECURR_TARIFF_SCENARIO_ID" omitIfEmpty="True"/>
<CustomParameter id="237" field="SUB_QTY_FROM" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_FROM" omitIfEmpty="True"/>
<CustomParameter id="238" field="SUB_QTY_TO" dataType="Float" parameterType="Control" parameterSource="SUB_QTY_TO" omitIfEmpty="True"/>
<CustomParameter id="239" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT" omitIfEmpty="True"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="192" variable="P_BUNDLED_FEATURE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUNDLED_FEATURE_ID"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="155" conditionType="Parameter" useIsNull="False" field="P_SERVICE_CATEGORY_ID" dataType="Float" parameterType="URL" parameterSource="P_SERVICE_CATEGORY_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_bundled_tariff_act_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_bundled_tariff_act.php" forShow="True" url="p_bundled_tariff_act.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="79"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="80"/>
			</Actions>
		</Event>
	</Events>
</Page>
