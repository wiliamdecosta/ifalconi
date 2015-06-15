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
		<Record id="167" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_SUBSCRIBER_CPE" dataSource="V_SUBSCRIBER_CPE" errorSummator="Error" wizardCaption=" V SUBSCRIBER CPE " wizardFormMethod="post" PathID="V_SUBSCRIBER_CPE" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO SUBSCRIBER_CPE(
SUBSCRIBER_CPE_ID,
SUBSCRIBER_ID, 
CPE_LIST_ID, 
VALID_FROM, 
VALID_TO,  
DESCRIPTION, 
UPDATE_DATE, 
UPDATE_BY
) 
VALUES(
GENERATE_ID('BILLDB','SUBSCRIBER_CPE','SUBSCRIBER_CPE_ID'),
{SUBSCRIBER_ID}, 
{CPE_LIST_ID}, 
'{VALID_FROM}', 
'{VALID_TO}', 
INITCAP(TRIM('{DESCRIPTION}')), 
SYSDATE,
'{UPDATE_BY}'
)" customUpdateType="SQL" customUpdate="UPDATE SUBSCRIBER_CPE SET 
SUBSCRIBER_ID={SUBSCRIBER_ID}, 
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')), 
VALID_FROM='{VALID_FROM}', 
VALID_TO='{VALID_TO}',   
CPE_LIST_ID={CPE_LIST_ID}, 
UPDATE_BY='{UPDATE_BY}', 
UPDATE_DATE=SYSDATE
WHERE  SUBSCRIBER_CPE_ID = {SUBSCRIBER_CPE_ID}" customDeleteType="SQL" customDelete="DELETE FROM SUBSCRIBER_CPE WHERE  SUBSCRIBER_CPE_ID = {SUBSCRIBER_CPE_ID}">
			<Components>
				<Button id="168" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_SUBSCRIBER_CPEButton_Insert" returnPage="subscriber_cpe.ccp" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="169" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_SUBSCRIBER_CPEButton_Update" removeParameters="TAMBAH" returnPage="subscriber_cpe.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="170" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_SUBSCRIBER_CPEButton_Delete" removeParameters="SUBSCRIBER_CPE_ID" returnPage="subscriber_cpe.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="171"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="172" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_SUBSCRIBER_CPEButton_Cancel" returnPage="subscriber_cpe.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="174" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" required="True" caption="SUBSCRIBER ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPESUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="184" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERIAL_NO" fieldSource="SERIAL_NO" required="True" caption="SERIAL NO" wizardCaption="SERIAL NO" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPESERIAL_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="186" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CPE_BRAND_ID" fieldSource="P_CPE_BRAND_ID" required="True" caption="P CPE BRAND ID" wizardCaption="P CPE BRAND ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPEP_CPE_BRAND_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPEVALID_FROM" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="136" name="DatePicker_VALID_FROM" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="V_SUBSCRIBER_CPEDatePicker_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPEVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="137" name="DatePicker_VALID_TO1" style="../Styles/trb/Style.css" control="VALID_TO" PathID="V_SUBSCRIBER_CPEDatePicker_VALID_TO1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="187" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CPE_TYPE_CODE" fieldSource="CPE_TYPE_CODE" required="True" caption="CPE TYPE CODE" wizardCaption="CPE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPECPE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="188" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CPE_BRAND_CODE" fieldSource="CPE_BRAND_CODE" required="True" caption="CPE BRAND CODE" wizardCaption="CPE BRAND CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPECPE_BRAND_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="185" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CPE_TYPE_ID" fieldSource="P_CPE_TYPE_ID" required="True" caption="P CPE TYPE ID" wizardCaption="P CPE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPEP_CPE_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="175" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CPE_LIST_ID" fieldSource="CPE_LIST_ID" required="True" caption="CPE LIST ID" wizardCaption="CPE LIST ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPECPE_LIST_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPEUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBSCRIBER_CPEUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="189" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_CPE_ID" PathID="V_SUBSCRIBER_CPESUBSCRIBER_CPE_ID" fieldSource="SUBSCRIBER_CPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="190"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="191"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="192"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="193"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="194"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="195"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="173" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_CPE_ID" parameterSource="SUBSCRIBER_CPE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="209" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<SQLParameter id="210" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="213" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="214" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="218" variable="CPE_LIST_ID" dataType="Float" parameterType="Control" parameterSource="CPE_LIST_ID"/>
				<SQLParameter id="219" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="221" variable="SUBSCRIBER_CPE_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_CPE_ID"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="196" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<CustomParameter id="197" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="198" field="SERIAL_NO" dataType="Text" parameterType="Control" parameterSource="SERIAL_NO"/>
				<CustomParameter id="199" field="P_CPE_BRAND_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_BRAND_ID"/>
				<CustomParameter id="200" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="201" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="202" field="CPE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="CPE_TYPE_CODE"/>
				<CustomParameter id="203" field="CPE_BRAND_CODE" dataType="Text" parameterType="Control" parameterSource="CPE_BRAND_CODE"/>
				<CustomParameter id="204" field="P_CPE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_TYPE_ID"/>
				<CustomParameter id="205" field="CPE_LIST_ID" dataType="Float" parameterType="Control" parameterSource="CPE_LIST_ID"/>
				<CustomParameter id="206" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="207" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="208" field="SUBSCRIBER_CPE_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_CPE_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="236" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<SQLParameter id="237" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="240" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="241" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="245" variable="CPE_LIST_ID" dataType="Float" parameterType="Control" parameterSource="CPE_LIST_ID"/>
				<SQLParameter id="246" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="248" variable="SUBSCRIBER_CPE_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_CPE_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="222" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_CPE_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_CPE_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="223" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<CustomParameter id="224" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="225" field="SERIAL_NO" dataType="Text" parameterType="Control" parameterSource="SERIAL_NO"/>
				<CustomParameter id="226" field="P_CPE_BRAND_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_BRAND_ID"/>
				<CustomParameter id="227" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="228" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="229" field="CPE_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="CPE_TYPE_CODE"/>
				<CustomParameter id="230" field="CPE_BRAND_CODE" dataType="Text" parameterType="Control" parameterSource="CPE_BRAND_CODE"/>
				<CustomParameter id="231" field="P_CPE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_CPE_TYPE_ID"/>
				<CustomParameter id="232" field="CPE_LIST_ID" dataType="Float" parameterType="Control" parameterSource="CPE_LIST_ID"/>
				<CustomParameter id="233" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="234" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="235" field="SUBSCRIBER_CPE_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_CPE_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="250" variable="SUBSCRIBER_CPE_ID" parameterType="Control" dataType="Float" parameterSource="SUBSCRIBER_CPE_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="249" conditionType="Parameter" useIsNull="False" field="SUBSCRIBER_CPE_ID" dataType="Float" parameterType="URL" parameterSource="SUBSCRIBER_CPE_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_cpe_form1_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber_cpe_form1.php" forShow="True" url="subscriber_cpe_form1.php" comment="//" codePage="windows-1252"/>
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
