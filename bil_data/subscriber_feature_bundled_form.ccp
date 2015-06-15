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
		<Record id="110" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_SUBSCRIBER_BUNDLED_FEAT" dataSource="V_SUBSCRIBER_BUNDLED_FEATURE" errorSummator="Error" wizardCaption=" V SUBSCRIBER BUNDLED FEATURE " wizardFormMethod="post" PathID="V_SUBSCRIBER_BUNDLED_FEAT" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO SUBSCRIBER_BUNDLED_FEATURE(
SUBSCRIBER_BUNDLED_FEATURE_ID,
SUBSCRIBER_ID, 
P_BUNDLED_FEATURE_ID, 
ACTIVE_DATE, 
TERMINATION_DATE, 
DESCRIPTION, 
UPDATE_DATE, 
UPDATE_BY
) VALUES(
GENERATE_ID('BILLDB','SUBSCRIBER_BUNDLED_FEATURE','SUBSCRIBER_BUNDLED_FEATURE_ID'),
{SUBSCRIBER_ID}, 
{P_BUNDLED_FEATURE_ID}, 
'{ACTIVE_DATE}', 
'{TERMINATION_DATE}', 
INITCAP(TRIM('{DESCRIPTION}')), 
SYSDATE, 
'{UPDATE_BY}'
)" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customUpdateType="SQL" customUpdate="UPDATE SUBSCRIBER_BUNDLED_FEATURE SET 
SUBSCRIBER_ID={SUBSCRIBER_ID}, 
P_BUNDLED_FEATURE_ID={P_BUNDLED_FEATURE_ID}, 
ACTIVE_DATE='{ACTIVE_DATE}', 
TERMINATION_DATE='{TERMINATION_DATE}', 
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')), 
UPDATE_DATE=SYSDATE, 
UPDATE_BY='{UPDATE_BY}' 
WHERE  SUBSCRIBER_BUNDLED_FEATURE_ID = {SUBSCRIBER_BUNDLED_FEATURE_ID}" customDeleteType="SQL" customDelete="DELETE FROM SUBSCRIBER_BUNDLED_FEATURE WHERE  SUBSCRIBER_BUNDLED_FEATURE_ID = {SUBSCRIBER_BUNDLED_FEATURE_ID}">
			<Components>
				<Button id="111" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_SUBSCRIBER_BUNDLED_FEATButton_Insert" returnPage="subscriber_feature.ccp" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="112" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_SUBSCRIBER_BUNDLED_FEATButton_Update" returnPage="subscriber_feature.ccp" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="113" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_SUBSCRIBER_BUNDLED_FEATButton_Delete" returnPage="subscriber_feature.ccp" removeParameters="SUBSCRIBER_BUNDLED_FEATURE_ID">
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
				<Button id="115" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_SUBSCRIBER_BUNDLED_FEATButton_Cancel" returnPage="subscriber_feature.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" required="True" caption="SUBSCRIBER ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATSUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUNDLED_FEATURE_ID" fieldSource="P_BUNDLED_FEATURE_ID" required="True" caption="P BUNDLED FEATURE ID" wizardCaption="P BUNDLED FEATURE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATP_BUNDLED_FEATURE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="ACTIVE_DATE" fieldSource="ACTIVE_DATE" required="False" caption="ACTIVE DATE" wizardCaption="ACTIVE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATACTIVE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TERMINATION_DATE" fieldSource="TERMINATION_DATE" required="False" caption="TERMINATION DATE" wizardCaption="TERMINATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATTERMINATION_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" required="True" caption="SERVICE TYPE CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TARIFF_LOCATION_CODE" fieldSource="TARIFF_LOCATION_CODE" required="True" caption="TARIFF LOCATION CODE" wizardCaption="TARIFF LOCATION CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATTARIFF_LOCATION_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUNDLED_FEATURE_CODE" fieldSource="BUNDLED_FEATURE_CODE" required="True" caption="BUNDLED FEATURE CODE" wizardCaption="BUNDLED FEATURE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATBUNDLED_FEATURE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="130" name="DatePicker_ACTIVE_DATE" style="../Styles/trb/Style.css" control="ACTIVE_DATE" PathID="V_SUBSCRIBER_BUNDLED_FEATDatePicker_ACTIVE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<DatePicker id="131" name="DatePicker_TERMINATION_DATE" style="../Styles/trb/Style.css" control="TERMINATION_DATE" PathID="V_SUBSCRIBER_BUNDLED_FEATDatePicker_TERMINATION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_BUNDLED_FEATUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="138" fieldSourceType="DBColumn" dataType="Text" name="SUBSCRIBER_BUNDLED_FEATURE_ID" PathID="V_SUBSCRIBER_BUNDLED_FEATSUBSCRIBER_BUNDLED_FEATURE_ID" fieldSource="SUBSCRIBER_BUNDLED_FEATURE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="139" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" PathID="V_SUBSCRIBER_BUNDLED_FEATP_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="132"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="133"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="134"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="135"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="136"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="137"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="116" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_BUNDLED_FEATURE_ID" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="151" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
<SQLParameter id="152" variable="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<SQLParameter id="153" variable="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="154" variable="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="155" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="160" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="161" variable="SUBSCRIBER_BUNDLED_FEATURE_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="140" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID" omitIfEmpty="True"/>
				<CustomParameter id="141" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID" omitIfEmpty="True"/>
				<CustomParameter id="142" field="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="143" field="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="144" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="145" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="146" field="SERVICE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_TYPE_CODE" omitIfEmpty="True"/>
				<CustomParameter id="147" field="TARIFF_LOCATION_CODE" dataType="Text" parameterType="Control" parameterSource="TARIFF_LOCATION_CODE" omitIfEmpty="True"/>
				<CustomParameter id="148" field="BUNDLED_FEATURE_CODE" dataType="Text" parameterType="Control" parameterSource="BUNDLED_FEATURE_CODE" omitIfEmpty="True"/>
				<CustomParameter id="149" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
				<CustomParameter id="150" field="SUBSCRIBER_BUNDLED_FEATURE_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="174" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
<SQLParameter id="175" variable="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<SQLParameter id="176" variable="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="177" variable="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="178" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<SQLParameter id="179" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<SQLParameter id="180" variable="SERVICE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_TYPE_CODE"/>
<SQLParameter id="181" variable="TARIFF_LOCATION_CODE" dataType="Text" parameterType="Control" parameterSource="TARIFF_LOCATION_CODE"/>
<SQLParameter id="182" variable="BUNDLED_FEATURE_CODE" dataType="Text" parameterType="Control" parameterSource="BUNDLED_FEATURE_CODE"/>
<SQLParameter id="183" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="184" variable="SUBSCRIBER_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID" defaultValue="0"/>
</USQLParameters>
			<UConditions>
<TableParameter id="162" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_BUNDLED_FEATURE_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
</UConditions>
			<UFormElements>
<CustomParameter id="163" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
<CustomParameter id="164" field="P_BUNDLED_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="P_BUNDLED_FEATURE_ID"/>
<CustomParameter id="165" field="ACTIVE_DATE" dataType="Date" parameterType="Control" parameterSource="ACTIVE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="166" field="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="167" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="168" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="169" field="SERVICE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_TYPE_CODE"/>
<CustomParameter id="170" field="TARIFF_LOCATION_CODE" dataType="Text" parameterType="Control" parameterSource="TARIFF_LOCATION_CODE"/>
<CustomParameter id="171" field="BUNDLED_FEATURE_CODE" dataType="Text" parameterType="Control" parameterSource="BUNDLED_FEATURE_CODE"/>
<CustomParameter id="172" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="173" field="SUBSCRIBER_BUNDLED_FEATURE_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="186" variable="SUBSCRIBER_BUNDLED_FEATURE_ID" parameterType="Control" dataType="Float" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID" defaultValue="0"/>
</DSQLParameters>
			<DConditions>
<TableParameter id="185" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_BUNDLED_FEATURE_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_BUNDLED_FEATURE_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber_feature_bundled_form.php" forShow="True" url="subscriber_feature_bundled_form.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_feature_bundled_form_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
