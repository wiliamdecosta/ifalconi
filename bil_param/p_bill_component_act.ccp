<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="Bill_CompRecord" errorSummator="Error" wizardCaption=" V P SERVICE CATEGORY " wizardFormMethod="post" PathID="Bill_CompRecord" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" dataSource="V_P_RT_BUND_FEAT_BILL_COMP" customInsertType="SQL" customInsert="INSERT INTO P_RT_BUND_FEAT_BILL_COMP(
 P_RT_BUND_FEAT_BILL_COMP_ID,
 P_RECU_TARIFF_BUNDLED_FEAT_ID,
 P_BILL_COMPONENT_ID,
 P_CURRENCY_ID, 
 CHARGE_AMOUNT,
 DESCRIPTION, 
 UPDATE_DATE, 
 UPDATE_BY
 ) 
 VALUES(
 GENERATE_ID('BILLDB','P_RT_BUND_FEAT_BILL_COMP','P_RT_BUND_FEAT_BILL_COMP_ID'),
 {P_RECU_TARIFF_BUNDLED_FEAT_ID}, 
 {P_BILL_COMPONENT_ID},
 {P_CURRENCY_ID}, 
 {CHARGE_AMOUNT},
 INITCAP('{DESCRIPTION}'), 
  SYSDATE,
 '{UPDATE_BY}'
 )" customUpdateType="SQL" customUpdate="UPDATE P_RT_BUND_FEAT_BILL_COMP SET 
P_CURRENCY_ID={P_CURRENCY_ID}, 
UPDATE_DATE=SYSDATE, 
DESCRIPTION=INITCAP('{DESCRIPTION}'), 
 UPDATE_BY='{UPDATE_BY}', 
P_BILL_COMPONENT_ID={P_BILL_COMPONENT_ID},
CHARGE_AMOUNT={CHARGE_AMOUNT} 
WHERE  
P_RT_BUND_FEAT_BILL_COMP_ID = {P_RT_BUND_FEAT_BILL_COMP_ID}">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="Bill_CompRecordButton_Insert" returnPage="p_bundled_tariff.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="Bill_CompRecordButton_Update" returnPage="p_bundled_tariff.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="Bill_CompRecordButton_Cancel" returnPage="p_bundled_tariff.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE" required="True" caption="RECU_TARIFF_SCEN_CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Bill_CompRecordBILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" required="False" caption="P_SERVICE_TYPE_ID" wizardCaption="P FEATURE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Bill_CompRecordP_CURRENCY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Bill_CompRecordUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="57" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Bill_CompRecordDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="81" fieldSourceType="DBColumn" dataType="Float" name="P_RECU_TARIFF_BUNDLED_FEAT_ID" PathID="Bill_CompRecordP_RECU_TARIFF_BUNDLED_FEAT_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="60" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CURRENCY_CODE" fieldSource="CURRENCY_CODE" required="True" caption="Service Type Code" wizardCaption="FEATURE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Bill_CompRecordCURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Bill_CompRecordUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="196" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_COMPONENT_ID" PathID="Bill_CompRecordP_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="197" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_RT_BUND_FEAT_BILL_COMP_ID" PathID="Bill_CompRecordP_RT_BUND_FEAT_BILL_COMP_ID" fieldSource="P_RT_BUND_FEAT_BILL_COMP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="200" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CHARGE_AMOUNT" PathID="Bill_CompRecordCHARGE_AMOUNT" fieldSource="CHARGE_AMOUNT" caption="Charge Amount">
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
				<TableParameter id="250" conditionType="Parameter" useIsNull="False" field="P_RT_BUND_FEAT_BILL_COMP_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_RT_BUND_FEAT_BILL_COMP_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="249" tableName="V_P_RT_BUND_FEAT_BILL_COMP" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="112" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="119" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="263" variable="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
				<SQLParameter id="265" variable="P_RECU_TARIFF_BUNDLED_FEAT_ID" dataType="Float" parameterType="Control" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID"/>
				<SQLParameter id="267" variable="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
				<SQLParameter id="268" variable="P_RT_BUND_FEAT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="P_RT_BUND_FEAT_BILL_COMP_ID"/>
				<SQLParameter id="269" variable="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="251" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE" omitIfEmpty="True"/>
				<CustomParameter id="252" field="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID" omitIfEmpty="True"/>
				<CustomParameter id="253" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="254" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="255" field="P_RECU_TARIFF_BUNDLED_FEAT_ID" dataType="Float" parameterType="Control" parameterSource="P_RECU_TARIFF_BUNDLED_FEAT_ID" omitIfEmpty="True"/>
				<CustomParameter id="256" field="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE" omitIfEmpty="True"/>
				<CustomParameter id="257" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
				<CustomParameter id="258" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID" omitIfEmpty="True"/>
				<CustomParameter id="259" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID" omitIfEmpty="True"/>
				<CustomParameter id="260" field="P_RT_BUND_FEAT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="P_RT_BUND_FEAT_BILL_COMP_ID" omitIfEmpty="True"/>
				<CustomParameter id="261" field="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="296" variable="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
<SQLParameter id="297" variable="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
<SQLParameter id="298" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="299" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="300" variable="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE"/>
<SQLParameter id="301" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="302" variable="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
<SQLParameter id="303" variable="P_RT_BUND_FEAT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="P_RT_BUND_FEAT_BILL_COMP_ID" defaultValue="0"/>
<SQLParameter id="304" variable="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT"/>
</USQLParameters>
			<UConditions>
				<TableParameter id="286" conditionType="Parameter" useIsNull="False" field="P_RT_BUND_FEAT_BILL_COMP_ID" dataType="Float" parameterType="URL" parameterSource="P_RT_BUND_FEAT_BILL_COMP_ID" searchConditionType="Equal" logicOperator="And"/>
</UConditions>
			<UFormElements>
				<CustomParameter id="287" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE" omitIfEmpty="True"/>
<CustomParameter id="288" field="P_CURRENCY_ID" dataType="Float" parameterType="Control" parameterSource="P_CURRENCY_ID" omitIfEmpty="True"/>
<CustomParameter id="289" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="290" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
<CustomParameter id="291" field="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE" omitIfEmpty="True"/>
<CustomParameter id="292" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
<CustomParameter id="293" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID" omitIfEmpty="True"/>
<CustomParameter id="294" field="P_RT_BUND_FEAT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="P_RT_BUND_FEAT_BILL_COMP_ID" omitIfEmpty="True"/>
<CustomParameter id="295" field="CHARGE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="CHARGE_AMOUNT" omitIfEmpty="True"/>
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
		<CodeFile id="Events" language="PHPTemplates" name="p_bill_component_act_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_bill_component_act.php" forShow="True" url="p_bill_component_act.php" comment="//" codePage="windows-1252"/>
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
