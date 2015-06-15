<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" name="CUSTOMER_INFOgrid" pageSizeLimit="100" wizardCaption=" V CUSTOMER " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data tidak ditemukan." pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT * FROM V_CUSTOMER_INFO
WHERE CUSTOMER_ID = {CUSTOMER_ID} AND
(UPPER(INFO_TYPE_CODE) LIKE UPPER('%{s_keyword}%')OR
UPPER(INFO_DESC_1) LIKE UPPER('%{s_keyword}%')OR
UPPER(INFO_DESC_2) LIKE UPPER('%{s_keyword}%')OR
UPPER(INFO_DESC_3) LIKE UPPER('%{s_keyword}%')
)">
			<Components>
				<Label id="41" fieldSourceType="DBColumn" dataType="Text" html="False" name="INFO_TYPE_CODE" fieldSource="INFO_TYPE_CODE" wizardCaption="CUSTOMER NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CUSTOMER_INFOgridINFO_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="LAST NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CUSTOMER_INFOgridVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="61" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CUSTOMER_INFOgridVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="85" fieldSourceType="DBColumn" dataType="Text" html="False" name="INFO_DESC_1" fieldSource="INFO_DESC_1" wizardCaption="CUSTOMER TITLE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CUSTOMER_INFOgridINFO_DESC_1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="91" fieldSourceType="DBColumn" dataType="Text" html="False" name="INFO_DESC_2" fieldSource="INFO_DESC_2" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CUSTOMER_INFOgridINFO_DESC_2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="93" fieldSourceType="DBColumn" dataType="Text" html="False" name="INFO_DESC_3" fieldSource="INFO_DESC_3" wizardCaption="CUSTOMER CLASS CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CUSTOMER_INFOgridINFO_DESC_3">
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
				<Link id="139" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="CUSTOMER_INFOgridDLink" hrefSource="p_customer_info.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="140" sourceType="DataField" name="CUSTOMER_INFO_ID" source="CUSTOMER_INFO_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="141" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_ID" PathID="CUSTOMER_INFOgridCUSTOMER_ID" fieldSource="CUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="145" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CUSTOMERINFO_Insert" hrefSource="p_customer_info.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="CUSTOMER_INFOgridP_CUSTOMERINFO_Insert" removeParameters="CUSTOMER_INFO_ID">
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
				<Hidden id="333" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_INFO_ID" PathID="CUSTOMER_INFOgridCUSTOMER_INFO_ID" fieldSource="CUSTOMER_INFO_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
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
				<SQLParameter id="214" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="332" variable="CUSTOMER_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="CUSTOMER_ID" designDefaultValue="1"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="V_CUSTOMERINFOSearch" wizardCaption=" V CUSTOMER " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_customer_info.ccp" PathID="V_CUSTOMERINFOSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="V_CUSTOMERINFOSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="136" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="V_CUSTOMERINFOSearchs_keyword" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="404" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ID" PathID="V_CUSTOMERINFOSearchCUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="97" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="CUSTOMER_INFOrecord" connection="Conn" dataSource="V_CUSTOMER_INFO" PathID="CUSTOMER_INFOrecord" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" activeTableType="customDelete" returnPage="p_customer_info.ccp" customInsertType="SQL" customInsert="INSERT INTO CUSTOMER_INFO(
CUSTOMER_INFO_ID,
CUSTOMER_ID, 
INFO_TYPE_ID,
VALID_FROM, 
VALID_TO,
INFO_DESC_1, INFO_DESC_2, INFO_DESC_3,  
UPDATE_DATE, 
UPDATE_BY) 
VALUES(
GENERATE_ID('BILLDB','CUSTOMER_INFO','CUSTOMER_INFO_ID'),
{CUSTOMER_ID},
{INFO_TYPE_ID},
'{VALID_FROM}', 
'{VALID_TO}', 
'{INFO_DESC_1}', 
'{INFO_DESC_2}', 
'{INFO_DESC_3}',
SYSDATE,
'{UPDATE_BY}'
)" customDelete="DELETE FROM CUSTOMER_INFO WHERE  CUSTOMER_INFO_ID = {CUSTOMER_INFO_ID}" customDeleteType="SQL" customUpdateType="SQL" customUpdate="UPDATE CUSTOMER_INFO SET 
INFO_TYPE_ID={INFO_TYPE_ID}, 
VALID_FROM='{VALID_FROM}', 
VALID_TO='{VALID_TO}',
INFO_DESC_1='{INFO_DESC_1}', 
INFO_DESC_2='{INFO_DESC_2}', 
INFO_DESC_3='{INFO_DESC_3}', 
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}'
WHERE  CUSTOMER_INFO_ID={CUSTOMER_INFO_ID}">
			<Components>
				<Button id="98" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="CUSTOMER_INFOrecordButton_Insert" removeParameters="TAMBAH;s_keyword" returnPage="p_customer_info.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="99" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="CUSTOMER_INFOrecordButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="100" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="CUSTOMER_INFOrecordButton_Delete" removeParameters="TAMBAH" returnPage="p_customer_info.ccp">
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
				<Button id="102" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="CUSTOMER_INFOrecordButton_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_TYPE_CODE" caption="INFO_TYPE_ID" fieldSource="INFO_TYPE_CODE" required="True" PathID="CUSTOMER_INFOrecordINFO_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" caption="VALID_FROM" fieldSource="VALID_FROM" required="True" PathID="CUSTOMER_INFOrecordVALID_FROM" format="dd-mmm-yyyy">
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
				<Hidden id="334" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_INFO_ID" PathID="CUSTOMER_INFOrecordCUSTOMER_INFO_ID" fieldSource="CUSTOMER_INFO_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="336" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" caption="VALID_TO" fieldSource="VALID_TO" required="False" PathID="CUSTOMER_INFOrecordVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="337" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_DESC_1" PathID="CUSTOMER_INFOrecordINFO_DESC_1" fieldSource="INFO_DESC_1" caption="INFO DESC 1" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="338" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_DESC_2" PathID="CUSTOMER_INFOrecordINFO_DESC_2" fieldSource="INFO_DESC_2" caption="INFO DESC 2" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="339" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="INFO_DESC_3" PathID="CUSTOMER_INFOrecordINFO_DESC_3" fieldSource="INFO_DESC_3" caption="INFO DESC 3" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="335" fieldSourceType="DBColumn" dataType="Float" name="INFO_TYPE_ID" PathID="CUSTOMER_INFOrecordINFO_TYPE_ID" fieldSource="INFO_TYPE_ID" required="True" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<DatePicker id="138" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="VALID_FROM" PathID="CUSTOMER_INFOrecordDatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<DatePicker id="341" name="DatePicker_UPDATE_DATE2" style="../Styles/trb/Style.css" control="VALID_TO" PathID="CUSTOMER_INFOrecordDatePicker_UPDATE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="368" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_ID" PathID="CUSTOMER_INFOrecordCUSTOMER_ID" fieldSource="CUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="426"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="427"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="428"/>
</Actions>
</Event>
<Event name="AfterExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="429"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="103" conditionType="Parameter" useIsNull="False" field="CUSTOMER_INFO_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" orderNumber="1" parameterSource="CUSTOMER_INFO_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="340" tableName="V_CUSTOMER_INFO" posLeft="10" posTop="10" posWidth="159" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="371" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="372" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="373" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="374" variable="CUSTOMER_INFO_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_INFO_ID" defaultValue="0"/>
				<SQLParameter id="375" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="376" variable="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1"/>
				<SQLParameter id="377" variable="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2"/>
				<SQLParameter id="378" variable="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3"/>
				<SQLParameter id="379" variable="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID"/>
				<SQLParameter id="380" variable="CUSTOMER_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ID" defaultValue="0"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="358" field="INFO_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="INFO_TYPE_CODE"/>
				<CustomParameter id="359" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="360" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="361" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="362" field="CUSTOMER_INFO_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_INFO_ID"/>
				<CustomParameter id="363" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="364" field="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1"/>
				<CustomParameter id="365" field="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2"/>
				<CustomParameter id="366" field="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3"/>
				<CustomParameter id="367" field="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID"/>
				<CustomParameter id="369" field="CUSTOMER_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="395" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="396" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="397" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="398" variable="CUSTOMER_INFO_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_INFO_ID"/>
				<SQLParameter id="399" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="400" variable="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1"/>
				<SQLParameter id="401" variable="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2"/>
				<SQLParameter id="402" variable="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3"/>
				<SQLParameter id="403" variable="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="274" conditionType="Parameter" useIsNull="False" field="CUSTOMER_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="383" field="INFO_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="INFO_TYPE_CODE"/>
				<CustomParameter id="384" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="385" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="386" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="387" field="CUSTOMER_INFO_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_INFO_ID"/>
				<CustomParameter id="388" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="389" field="INFO_DESC_1" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_1"/>
				<CustomParameter id="390" field="INFO_DESC_2" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_2"/>
				<CustomParameter id="391" field="INFO_DESC_3" dataType="Text" parameterType="Control" parameterSource="INFO_DESC_3"/>
				<CustomParameter id="392" field="INFO_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="INFO_TYPE_ID"/>
				<CustomParameter id="393" field="CUSTOMER_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="382" variable="CUSTOMER_INFO_ID" parameterType="URL" dataType="Float" parameterSource="CUSTOMER_INFO_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="381" conditionType="Parameter" useIsNull="False" field="CUSTOMER_INFO_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_INFO_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="86" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="Customer_Inf" dataSource="SELECT *
FROM CUSTOMER
WHERE CUSTOMER_ID = {CUSTOMER_ID}" errorSummator="Error" wizardCaption=" P Input File Desc " wizardFormMethod="post" PathID="Customer_Inf" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_INPUT_FILE_DESC(P_INPUT_FILE_DESC_ID, P_INPUT_FILE_TYPE_ID, P_SERVICE_TYPE_ID, PROCEDURE_NAME, START_POSITION_NAME, END_POSITION_NAME, PARTIAL_FILE_NAME, START_DATA_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
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
WHERE  P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_INPUT_FILE_DESC WHERE P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}" pasteAsReplace="pasteAsReplace">
			<Components>
				<Label id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ID" fieldSource="CUSTOMER_ID" required="True" caption="CODE" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="Customer_InfCUSTOMER_ID" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="425" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" PathID="Customer_InfLAST_NAME" fieldSource="LAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="406" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NUMBER" PathID="Customer_InfCUSTOMER_NUMBER" fieldSource="CUSTOMER_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="88" conditionType="Parameter" useIsNull="False" field="P_INPUT_FILE_DESC_ID" parameterSource="P_INPUT_FILE_DESC_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="89" parameterType="URL" variable="CUSTOMER_ID" dataType="Float" parameterSource="CUSTOMER_ID" defaultValue="-99" designDefaultValue="1"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="90" variable="P_INPUT_FILE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<SQLParameter id="408" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="92" variable="PROCEDURE_NAME" parameterType="Control" dataType="Text" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="409" variable="START_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_POSITION_NAME"/>
				<SQLParameter id="94" variable="END_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="END_POSITION_NAME"/>
				<SQLParameter id="95" variable="PARTIAL_FILE_NAME" parameterType="Control" dataType="Text" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="96" variable="START_DATA_POSITION" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_DATA_POSITION"/>
				<SQLParameter id="410" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="411" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="412" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="413" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="101" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="414" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="415" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="416" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="417" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
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
				<SQLParameter id="114" variable="P_INPUT_FILE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<SQLParameter id="115" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="116" variable="PROCEDURE_NAME" parameterType="Control" dataType="Text" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="117" variable="START_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_POSITION_NAME"/>
				<SQLParameter id="118" variable="END_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="END_POSITION_NAME"/>
				<SQLParameter id="119" variable="PARTIAL_FILE_NAME" parameterType="Control" dataType="Text" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="120" variable="START_DATA_POSITION" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_DATA_POSITION"/>
				<SQLParameter id="121" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="122" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="418" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
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
				<CustomParameter id="420" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="421" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="422" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="137" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
				<CustomParameter id="423" field="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="424" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_customer_info_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_customer_info.php" forShow="True" url="p_customer_info.php" comment="//" codePage="windows-1252"/>
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
