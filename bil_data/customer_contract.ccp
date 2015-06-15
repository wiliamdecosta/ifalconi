<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" name="CustomerContractGrid" pageSizeLimit="100" wizardCaption=" V CUSTOMER " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data tidak ditemukan." pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT * FROM V_CUSTOMER_CONTRACT
WHERE CUSTOMER_ID = {CUSTOMER_ID}">
			<Components>
				<Label id="41" fieldSourceType="DBColumn" dataType="Text" html="False" name="CONTRACT_NO" fieldSource="CONTRACT_NO" wizardCaption="CUSTOMER NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CustomerContractGridCONTRACT_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="LAST NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CustomerContractGridVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="61" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CustomerContractGridVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="85" fieldSourceType="DBColumn" dataType="Date" html="False" name="CONTRACT_DATE" fieldSource="CONTRACT_DATE" wizardCaption="CUSTOMER TITLE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CustomerContractGridCONTRACT_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="91" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CustomerContractGridDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="134" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardTheme="sikm" wizardThemeVersion="3.0" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="135"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="139" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="CustomerContractGridDLink" hrefSource="customer_contract.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="443" sourceType="DataField" name="CUSTOMER_CONTRACT_ID" source="CUSTOMER_CONTRACT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="141" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_ID" PathID="CustomerContractGridCUSTOMER_ID" fieldSource="CUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="145" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="CustomerContractInsert" hrefSource="customer_contract.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="CustomerContractGridCustomerContractInsert" removeParameters="CUSTOMER_CONTRACT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="146" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="333" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_CONTRACT_ID" PathID="CustomerContractGridCUSTOMER_CONTRACT_ID" fieldSource="CUSTOMER_CONTRACT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="440" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_PIC" PathID="CustomerContractGridCUSTOMER_PIC" fieldSource="CUSTOMER_PIC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="441" fieldSourceType="DBColumn" dataType="Text" html="False" name="ACCOUNT_NAME" PathID="CustomerContractGridACCOUNT_NAME" fieldSource="ACCOUNT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="442" fieldSourceType="DBColumn" dataType="Text" html="False" name="EMPLOYEE_NO" PathID="CustomerContractGridEMPLOYEE_NO" fieldSource="EMPLOYEE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="37" styles="Row;AltRow" name="rowStyle"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CUSTOMER_NUMBER" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" parameterSource="s_keyword"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="LAST_NAME" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3" parameterSource="s_keyword"/>
				<TableParameter id="23" conditionType="Parameter" useIsNull="False" field="ZIP_CODE" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="16" parameterSource="s_keyword"/>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="REGION_NAME" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="27" parameterSource="s_keyword"/>
				<TableParameter id="35" conditionType="Parameter" useIsNull="False" field="CUSTOMER_CLASS_CODE" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="28" parameterSource="s_keyword"/>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="ADDRESS_1" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" orderNumber="12" parameterSource="s_keyword"/>
				<TableParameter id="213" conditionType="Parameter" useIsNull="False" field="CUSTOMER_TITLE_CODE" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" rightBrackets="1" parameterSource="s_keyword"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="332" variable="CUSTOMER_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="CUSTOMER_ID" designDefaultValue="1"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="97" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="CustomerContractRecord" connection="Conn" PathID="CustomerContractRecord" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" returnPage="customer_contract.ccp" dataSource="V_CUSTOMER_CONTRACT" customInsertType="SQL" customInsert="INSERT INTO CUSTOMER_CONTRACT(
CUSTOMER_CONTRACT_ID, 
CUSTOMER_ID, 
CONTRACT_NO,
CONTRACT_DATE,
VALID_FROM, 
VALID_TO, 
P_ACCOUNT_REP_ID,
CUSTOMER_PIC,
UPDATE_DATE, 
UPDATE_BY, 
DESCRIPTION 
) VALUES(
GENERATE_ID('BILLDB','CUSTOMER_CONTRACT','CUSTOMER_CONTRACT_ID'),
 {CUSTOMER_ID},
 '{CONTRACT_NO}',
 '{CONTRACT_DATE}', 
 '{VALID_FROM}',
 '{VALID_TO}',
 {P_ACCOUNT_REP_ID},
 '{CUSTOMER_PIC}', 
 SYSDATE,
 '{UPDATE_BY}',
 TRIM('{DESCRIPTION}'))" customDeleteType="SQL" activeTableType="customDelete" customDelete="DELETE FROM CUSTOMER_CONTRACT WHERE  CUSTOMER_CONTRACT_ID = {CUSTOMER_CONTRACT_ID}" customUpdateType="SQL" customUpdate="UPDATE CUSTOMER_CONTRACT SET 
CONTRACT_NO='{CONTRACT_NO}', 
CONTRACT_DATE='{CONTRACT_DATE}',
VALID_FROM='{VALID_FROM}', 
VALID_TO='{VALID_TO}', 
P_ACCOUNT_REP_ID={P_ACCOUNT_REP_ID},
CUSTOMER_PIC='{CUSTOMER_PIC}', 
UPDATE_DATE=SYSDATE, 
UPDATE_BY='{UPDATE_BY}', 
DESCRIPTION=TRIM('{DESCRIPTION}')
WHERE  CUSTOMER_CONTRACT_ID = {CUSTOMER_CONTRACT_ID}">
			<Components>
				<Button id="98" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="CustomerContractRecordButton_Insert" removeParameters="TAMBAH" returnPage="customer_contract.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="99" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="CustomerContractRecordButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="100" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="CustomerContractRecordButton_Delete" removeParameters="TAMBAH;CUSTOMER_CONTRACT_ID" returnPage="customer_contract.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="147" message="Delete Record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="102" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="CustomerContractRecordButton_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" caption="VALID_FROM" fieldSource="VALID_FROM" required="True" PathID="CustomerContractRecordVALID_FROM" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" caption="UPDATE DATE" fieldSource="UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate" required="True" PathID="CustomerContractRecordUPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" caption="UPDATE BY" fieldSource="UPDATE_BY" defaultValue="CCGetUserLogin()" required="True" PathID="CustomerContractRecordUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="336" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" caption="VALID_TO" fieldSource="VALID_TO" required="False" PathID="CustomerContractRecordVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="338" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" PathID="CustomerContractRecordDESCRIPTION" fieldSource="DESCRIPTION" caption="Description" required="False">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
<DatePicker id="341" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="CustomerContractRecordDatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="368" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_ID" PathID="CustomerContractRecordCUSTOMER_ID" fieldSource="CUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="335" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_CONTRACT_ID" PathID="CustomerContractRecordCUSTOMER_CONTRACT_ID" fieldSource="CUSTOMER_CONTRACT_ID" required="False" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="446" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_PIC" PathID="CustomerContractRecordCUSTOMER_PIC" fieldSource="CUSTOMER_PIC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="447" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EMPLOYEE_NO" PathID="CustomerContractRecordEMPLOYEE_NO" fieldSource="EMPLOYEE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="448" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NAME" PathID="CustomerContractRecordACCOUNT_NAME" fieldSource="ACCOUNT_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="449" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CONTRACT_DATE" PathID="CustomerContractRecordCONTRACT_DATE" fieldSource="CONTRACT_DATE" format="dd-mmm-yyyy" required="True" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="450" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CONTRACT_NO" PathID="CustomerContractRecordCONTRACT_NO" fieldSource="CONTRACT_NO" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="451" name="DatePicker_UPDATE_DATE3" style="../Styles/trb/Style.css" control="CONTRACT_DATE" PathID="CustomerContractRecordDatePicker_UPDATE_DATE3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="452" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ACCOUNT_REP_ID" PathID="CustomerContractRecordP_ACCOUNT_REP_ID" fieldSource="P_ACCOUNT_REP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<DatePicker id="138" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="CustomerContractRecordDatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="520"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="521"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="522"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="523"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="524"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="525"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="445" conditionType="Parameter" useIsNull="False" field="CUSTOMER_CONTRACT_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="CUSTOMER_CONTRACT_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="444" tableName="V_CUSTOMER_CONTRACT" schemaName="BILLDB" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="371" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="372" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="373" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="375" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="380" variable="CUSTOMER_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ID" defaultValue="0"/>
				<SQLParameter id="420" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="422" variable="P_ACCOUNT_REP_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCOUNT_REP_ID"/>
				<SQLParameter id="466" variable="CUSTOMER_CONTRACT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CONTRACT_ID"/>
				<SQLParameter id="467" variable="CUSTOMER_PIC" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_PIC"/>
				<SQLParameter id="468" variable="CONTRACT_DATE" dataType="Date" parameterType="Control" parameterSource="CONTRACT_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="469" variable="CONTRACT_NO" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NO"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="453" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="454" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="455" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="456" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="457" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="458" field="CUSTOMER_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ID"/>
				<CustomParameter id="459" field="CUSTOMER_CONTRACT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CONTRACT_ID"/>
				<CustomParameter id="460" field="CUSTOMER_PIC" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_PIC"/>
				<CustomParameter id="461" field="EMPLOYEE_NO" dataType="Text" parameterType="Control" parameterSource="EMPLOYEE_NO"/>
				<CustomParameter id="462" field="ACCOUNT_NAME" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NAME"/>
				<CustomParameter id="463" field="CONTRACT_DATE" dataType="Date" parameterType="Control" parameterSource="CONTRACT_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="464" field="CONTRACT_NO" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NO"/>
				<CustomParameter id="465" field="P_ACCOUNT_REP_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCOUNT_REP_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="395" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="396" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="397" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="399" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="437" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="439" variable="P_ACCOUNT_REP_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCOUNT_REP_ID"/>
				<SQLParameter id="485" variable="CUSTOMER_CONTRACT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CONTRACT_ID" defaultValue="0"/>
				<SQLParameter id="486" variable="CUSTOMER_PIC" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_PIC"/>
				<SQLParameter id="487" variable="CONTRACT_DATE" dataType="Date" parameterType="Control" parameterSource="CONTRACT_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="488" variable="CONTRACT_NO" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NO"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="489" conditionType="Parameter" useIsNull="False" field="CUSTOMER_CONTRACT_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_CONTRACT_ID" searchConditionType="Equal" logicOperator="And"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="490" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="491" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="492" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="493" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="494" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="495" field="CUSTOMER_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ID"/>
				<CustomParameter id="496" field="CUSTOMER_CONTRACT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CONTRACT_ID"/>
				<CustomParameter id="497" field="CUSTOMER_PIC" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_PIC"/>
				<CustomParameter id="498" field="EMPLOYEE_NO" dataType="Text" parameterType="Control" parameterSource="EMPLOYEE_NO"/>
				<CustomParameter id="499" field="ACCOUNT_NAME" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NAME"/>
				<CustomParameter id="500" field="CONTRACT_DATE" dataType="Date" parameterType="Control" parameterSource="CONTRACT_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="501" field="CONTRACT_NO" dataType="Text" parameterType="Control" parameterSource="CONTRACT_NO"/>
				<CustomParameter id="502" field="P_ACCOUNT_REP_ID" dataType="Float" parameterType="Control" parameterSource="P_ACCOUNT_REP_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="470" variable="CUSTOMER_CONTRACT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUSTOMER_CONTRACT_ID"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="471" conditionType="Parameter" useIsNull="False" field="CUSTOMER_CONTRACT_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_CONTRACT_ID" searchConditionType="Equal" logicOperator="And"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="86" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="Customer_Inf" connection="Conn" dataSource="SELECT *
FROM CUSTOMER
WHERE CUSTOMER_ID = {CUSTOMER_ID}" customInsertType="SQL" customInsert="INSERT INTO P_INPUT_FILE_DESC(P_INPUT_FILE_DESC_ID, P_INPUT_FILE_TYPE_ID, P_SERVICE_TYPE_ID, PROCEDURE_NAME, START_POSITION_NAME, END_POSITION_NAME, PARTIAL_FILE_NAME, START_DATA_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
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
WHERE  P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_INPUT_FILE_DESC WHERE P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}" PathID="Customer_Inf">
			<Components>
				<Label id="87" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_ID" fieldSource="CUSTOMER_ID" PathID="Customer_InfCUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="503" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" fieldSource="LAST_NAME" PathID="Customer_InfLAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="504" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NUMBER" fieldSource="CUSTOMER_NUMBER" PathID="Customer_InfCUSTOMER_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="88" conditionType="Parameter" useIsNull="False" field="P_INPUT_FILE_DESC_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" parameterSource="P_INPUT_FILE_DESC_ID" logicOperator="And" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="89" variable="CUSTOMER_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_ID" defaultValue="-99" designDefaultValue="1"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="90" variable="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="505" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="92" variable="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="506" variable="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="94" variable="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="95" variable="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="96" variable="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION" defaultValue="0"/>
				<SQLParameter id="507" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="508" variable="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<SQLParameter id="509" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="510" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="101" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="511" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="512" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="513" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="514" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<CustomParameter id="106" field="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION"/>
				<CustomParameter id="107" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="108" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="109" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="110" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="111" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="112" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="113" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="114" variable="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="115" variable="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
				<SQLParameter id="116" variable="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="117" variable="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="118" variable="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME" defaultValue="0"/>
				<SQLParameter id="119" variable="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="120" variable="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION" defaultValue="0"/>
				<SQLParameter id="121" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="122" variable="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<SQLParameter id="418" variable="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="124" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="419" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="126" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="127" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="128" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="129" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<CustomParameter id="130" field="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION"/>
				<CustomParameter id="131" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="132" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="133" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="515" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="516" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="517" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="137" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
				<CustomParameter id="518" field="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="519" variable="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="customer_contract_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="customer_contract.php" forShow="True" url="customer_contract.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="142"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="273"/>
			</Actions>
		</Event>
	</Events>
</Page>
