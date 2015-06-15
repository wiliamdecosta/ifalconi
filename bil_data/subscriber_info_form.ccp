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
		<Record id="172" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="CUSTOMER_INFOrecord" connection="Conn" PathID="CUSTOMER_INFOrecord" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsertType="SQL" dataSource="V_SUBSCRIBER_INFO" customInsert="INSERT INTO SUBSCRIBER_INFO(
SUBSCRIBER_INFO_ID,
SUBSCRIBER_ID,
INFO_TYPE_ID,
VALID_FROM, 
VALID_TO,
INFO_DESC_1, INFO_DESC_2, INFO_DESC_3,  
UPDATE_DATE, 
UPDATE_BY) 
VALUES(
GENERATE_ID('BILLDB','SUBSCRIBER_INFO','SUBSCRIBER_INFO_ID'),
{SUBSCRIBER_ID},
{INFO_TYPE_ID},
'{VALID_FROM}', 
'{VALID_TO}', 
'{INFO_DESC_1}', 
'{INFO_DESC_2}', 
'{INFO_DESC_3}',
SYSDATE,
'{UPDATE_BY}'
)" customUpdate="UPDATE SUBSCRIBER_INFO SET 
VALID_FROM='{VALID_FROM}', 
UPDATE_DATE=SYSDATE, 
UPDATE_BY='{UPDATE_BY}', 
VALID_TO='{VALID_TO}', 
INFO_DESC_1='{INFO_DESC_1}', 
INFO_DESC_2='{INFO_DESC_2}', 
INFO_DESC_3='{INFO_DESC_3}',
INFO_TYPE_ID={INFO_TYPE_ID}, 
SUBSCRIBER_ID={SUBSCRIBER_ID} 
WHERE  
SUBSCRIBER_INFO_ID = {SUBSCRIBER_INFO_ID}" customUpdateType="SQL" customDeleteType="SQL" customDelete="DELETE FROM SUBSCRIBER_INFO WHERE  SUBSCRIBER_INFO_ID = {SUBSCRIBER_INFO_ID}">
			<Components>
				<Button id="173" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="CUSTOMER_INFOrecordButton_Insert" removeParameters="TAMBAH" returnPage="subscriber_info.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="174" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="CUSTOMER_INFOrecordButton_Update" returnPage="subscriber_info.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="175" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="CUSTOMER_INFOrecordButton_Delete" removeParameters="TAMBAH;SUBSCRIBER_INFO_ID" returnPage="subscriber_info.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="147" message="Delete Record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="176" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="CUSTOMER_INFOrecordButton_Cancel" removeParameters="TAMBAH" returnPage="subscriber_info.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="177" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_TYPE_CODE" caption="INFO_TYPE_ID" fieldSource="INFO_TYPE_CODE" required="True" PathID="CUSTOMER_INFOrecordINFO_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" caption="VALID_FROM" fieldSource="VALID_FROM" required="True" PathID="CUSTOMER_INFOrecordVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" caption="UPDATE DATE" fieldSource="UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate" required="True" PathID="CUSTOMER_INFOrecordUPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" caption="UPDATE BY" fieldSource="UPDATE_BY" defaultValue="CCGetUserLogin()" required="True" PathID="CUSTOMER_INFOrecordUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" caption="VALID_TO" fieldSource="VALID_TO" required="False" PathID="CUSTOMER_INFOrecordVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="181" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_DESC_1" PathID="CUSTOMER_INFOrecordINFO_DESC_1" fieldSource="INFO_DESC_1" caption="INFO DESC 1" required="True">
					<Components/>
					<Events>
						<Event name="OnValidate" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="182"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="183" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_DESC_2" PathID="CUSTOMER_INFOrecordINFO_DESC_2" fieldSource="INFO_DESC_2" caption="INFO DESC 2" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="184" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_DESC_3" PathID="CUSTOMER_INFOrecordINFO_DESC_3" fieldSource="INFO_DESC_3" caption="INFO DESC 3" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="138" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="CUSTOMER_INFOrecordDatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<DatePicker id="186" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="CUSTOMER_INFOrecordDatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="242" fieldSourceType="DBColumn" dataType="Text" name="SUBSCRIBER_INFO_ID" PathID="CUSTOMER_INFOrecordSUBSCRIBER_INFO_ID" fieldSource="SUBSCRIBER_INFO_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="185" fieldSourceType="DBColumn" dataType="Float" name="INFO_TYPE_ID" PathID="CUSTOMER_INFOrecordINFO_TYPE_ID" fieldSource="INFO_TYPE_ID" required="True" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" required="True" caption="SUBSCRIBER ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="CUSTOMER_INFOrecordSUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="188"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="189"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="190"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="191"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="192"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="193"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="241" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_INFO_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="SUBSCRIBER_INFO_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="240" tableName="V_SUBSCRIBER_INFO" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="254" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<SQLParameter id="256" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="257" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<SQLParameter id="258" variable="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1"/>
<SQLParameter id="259" variable="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2"/>
<SQLParameter id="260" variable="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3"/>
<SQLParameter id="261" variable="SUBSCRIBER_INFO_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_INFO_ID"/>
<SQLParameter id="262" variable="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID"/>
<SQLParameter id="276" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
</ISQLParameters>
			<IFormElements>
				<CustomParameter id="263" field="INFO_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="INFO_TYPE_CODE" omitIfEmpty="True"/>
<CustomParameter id="264" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="265" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="266" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
<CustomParameter id="267" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy" omitIfEmpty="True"/>
<CustomParameter id="268" field="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1" omitIfEmpty="True"/>
<CustomParameter id="269" field="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2" omitIfEmpty="True"/>
<CustomParameter id="270" field="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3" omitIfEmpty="True"/>
<CustomParameter id="271" field="SUBSCRIBER_INFO_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_INFO_ID" omitIfEmpty="True"/>
<CustomParameter id="272" field="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID" omitIfEmpty="True"/>
<CustomParameter id="273" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="290" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<SQLParameter id="292" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
<SQLParameter id="293" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<SQLParameter id="294" variable="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1"/>
<SQLParameter id="295" variable="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2"/>
<SQLParameter id="296" variable="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3"/>
<SQLParameter id="297" variable="SUBSCRIBER_INFO_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_INFO_ID" defaultValue="0"/>
<SQLParameter id="298" variable="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID"/>
<SQLParameter id="299" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
</USQLParameters>
			<UConditions>
				<TableParameter id="288" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_INFO_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_INFO_ID" searchConditionType="Equal" logicOperator="And"/>
</UConditions>
			<UFormElements>
				<CustomParameter id="277" field="INFO_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="INFO_TYPE_CODE"/>
<CustomParameter id="278" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
<CustomParameter id="279" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="280" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="281" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
<CustomParameter id="282" field="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1"/>
<CustomParameter id="283" field="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2"/>
<CustomParameter id="284" field="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3"/>
<CustomParameter id="285" field="SUBSCRIBER_INFO_ID" dataType="Text" parameterType="Control" parameterSource="SUBSCRIBER_INFO_ID"/>
<CustomParameter id="286" field="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID"/>
<CustomParameter id="287" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="301" variable="SUBSCRIBER_INFO_ID" parameterType="Control" dataType="Float" parameterSource="SUBSCRIBER_INFO_ID" defaultValue="0"/>
</DSQLParameters>
			<DConditions>
				<TableParameter id="300" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_INFO_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_INFO_ID" searchConditionType="Equal" logicOperator="And"/>
</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_info_form_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber_info_form.php" forShow="True" url="subscriber_info_form.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="166"/>
			</Actions>
		</Event>
	</Events>
</Page>
