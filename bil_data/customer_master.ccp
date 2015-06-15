<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM v_customer
WHERE ( CUSTOMER_NUMBER LIKE '%{s_keyword}%'
OR UPPER(LAST_NAME) LIKE UPPER('%{s_keyword}%')
OR ZIP_CODE LIKE '%{s_keyword}%'
OR UPPER(REGION_NAME) LIKE UPPER('%{s_keyword}%')
OR UPPER(CUSTOMER_CLASS_CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(ADDRESS_1) LIKE UPPER('%{s_keyword}%')
OR CUSTOMER_TITLE_CODE LIKE UPPER('%{s_keyword}%') ) 
ORDER BY CUSTOMER_ID ASC" name="V_CUSTOMER" pageSizeLimit="100" wizardCaption=" V CUSTOMER " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data tidak ditemukan." pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" activeCollection="TableParameters">
			<Components>
				<Label id="41" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NUMBER" fieldSource="CUSTOMER_NUMBER" wizardCaption="CUSTOMER NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERCUSTOMER_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" fieldSource="LAST_NAME" wizardCaption="LAST NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERLAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="61" fieldSourceType="DBColumn" dataType="Text" html="False" name="ADDRESS_1" fieldSource="ADDRESS_1" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERADDRESS_1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="69" fieldSourceType="DBColumn" dataType="Float" html="False" name="ZIP_CODE" fieldSource="ZIP_CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMERZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="85" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_TITLE_CODE" fieldSource="CUSTOMER_TITLE_CODE" wizardCaption="CUSTOMER TITLE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERCUSTOMER_TITLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="91" fieldSourceType="DBColumn" dataType="Text" html="False" name="REGION_NAME" fieldSource="REGION_NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERREGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="93" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_CLASS_CODE" fieldSource="CUSTOMER_CLASS_CODE" wizardCaption="CUSTOMER CLASS CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERCUSTOMER_CLASS_CODE">
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
								<Action actionName="Custom Code" actionCategory="General" id="135" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="63" fieldSourceType="DBColumn" dataType="Text" html="False" name="ADDRESS_2" fieldSource="ADDRESS_2" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERADDRESS_2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="65" fieldSourceType="DBColumn" dataType="Text" html="False" name="ADDRESS_3" fieldSource="ADDRESS_3" wizardCaption="ADDRESS 3" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMERADDRESS_3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="139" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_CUSTOMERDLink" hrefSource="customer_master.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="140" sourceType="DataField" name="CUSTOMER_ID" source="CUSTOMER_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="141" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ID" PathID="V_CUSTOMERCUSTOMER_ID" fieldSource="CUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="145" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CUSTOMER_Insert" hrefSource="customer_master.ccp" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="V_CUSTOMERP_CUSTOMER_Insert" removeParameters="CUSTOMER_ID">
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
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="37" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
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
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="V_CUSTOMERSearch" wizardCaption=" V CUSTOMER " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="customer_master.ccp" PathID="V_CUSTOMERSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<TextBox id="136" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="V_CUSTOMERSearchs_keyword" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="V_CUSTOMERSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
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
		<Record id="97" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="CustomerForm" connection="Conn" dataSource="v_customer" PathID="CustomerForm" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customDeleteType="SQL" customDelete="DELETE FROM customer WHERE  CUSTOMER_ID = {CUSTOMER_ID}" activeTableType="v_customer" customInsert="INSERT INTO CUSTOMER(
CUSTOMER_ID,
CUSTOMER_NUMBER,
LAST_NAME,
CUST_QQ_NAME,
CUSTOMER_CLASS_ID,
P_DEBTOR_SEGMENT_ID,
P_CUSTOMER_SEGMENT_ID,
P_CUSTOMER_TITLE_ID,
P_BUSINESS_SEGMENT_ID,
GENDER_TYPE_ID,
ADDRESS_1,
ADDRESS_2,
ADDRESS_3,
P_REGION_ID,
ZIP_CODE,
CCDB_CODE,
FIRST_SUBSCRIPTION_DATE,
DESCRIPTION,
UPDATE_DATE,
UPDATE_BY,
P_SUB_DEBTOR_SEGMENT_ID
) VALUES(
GENERATE_ID('BILLDB','CUSTOMER','CUSTOMER_ID'),
'{CUSTOMER_NUMBER}',
UPPER(TRIM('{LAST_NAME}')),
NULL,
{CUSTOMER_CLASS_ID},
{P_DEBTOR_SEGMENT_ID},
{P_CUSTOMER_SEGMENT_ID},
{P_CUSTOMER_TITLE_ID},
{P_BUSINESS_SEGMENT_ID},
{GENDER_TYPE_ID},
UPPER(TRIM('{ADDRESS_1}')),
UPPER(TRIM('{ADDRESS_2}')),
UPPER(TRIM('{ADDRESS_3}')),
{P_REGION_ID},
{ZIP_CODE},
{CCDB_CODE},
'{FIRST_SUBSCRIPTION_DATE}',
TRIM('{DESCRIPTION}'),
SYSDATE,
'{UPDATE_BY}',
{P_SUB_DEBTOR_SEGMENT_ID}
)" customUpdateType="SQL" customUpdate="UPDATE CUSTOMER SET 
CUSTOMER_NUMBER='{CUSTOMER_NUMBER}',
 LAST_NAME=UPPER(TRIM('{LAST_NAME}')),
 ADDRESS_1=UPPER(TRIM('{ADDRESS_1}')),
 ADDRESS_3=UPPER(TRIM('{ADDRESS_3}')),
 ZIP_CODE={ZIP_CODE},
 CCDB_CODE={CCDB_CODE},
 FIRST_SUBSCRIPTION_DATE='{FIRST_SUBSCRIPTION_DATE}',
 UPDATE_DATE=SYSDATE,
 CUSTOMER_CLASS_ID={CUSTOMER_CLASS_ID},
 P_DEBTOR_SEGMENT_ID={P_DEBTOR_SEGMENT_ID},
 P_CUSTOMER_SEGMENT_ID={P_CUSTOMER_SEGMENT_ID},
 P_CUSTOMER_TITLE_ID={P_CUSTOMER_TITLE_ID},
 GENDER_TYPE_ID={GENDER_TYPE_ID},
 P_SUB_DEBTOR_SEGMENT_ID={P_SUB_DEBTOR_SEGMENT_ID},
 UPDATE_BY='{UPDATE_BY}',
 P_BUSINESS_SEGMENT_ID={P_BUSINESS_SEGMENT_ID},
 ADDRESS_2='{ADDRESS_2}',
 P_REGION_ID={P_REGION_ID},
 DESCRIPTION=TRIM('{DESCRIPTION}')
 WHERE  
 CUSTOMER_ID = {CUSTOMER_ID}" returnPage="customer_master.ccp">
			<Components>
				<Button id="98" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="CustomerFormButton_Insert" removeParameters="TAMBAH;s_keyword" returnPage="customer_master.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="99" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="CustomerFormButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="100" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="CustomerFormButton_Delete" removeParameters="TAMBAH" returnPage="customer_master.ccp">
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
				<Button id="102" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="CustomerFormButton_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_NUMBER" caption="CUSTOMER NUMBER" fieldSource="CUSTOMER_NUMBER" required="True" PathID="CustomerFormCUSTOMER_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LAST_NAME" caption="LAST NAME" fieldSource="LAST_NAME" required="True" PathID="CustomerFormLAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_1" caption="ADDRESS 1" fieldSource="ADDRESS_1" required="True" PathID="CustomerFormADDRESS_1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_3" caption="ADDRESS 3" fieldSource="ADDRESS_3" required="False" PathID="CustomerFormADDRESS_3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ZIP_CODE" caption="ZIP CODE" fieldSource="ZIP_CODE" required="False" PathID="CustomerFormZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CCDB_CODE" caption="CCDB CODE" fieldSource="CCDB_CODE" required="False" PathID="CustomerFormCCDB_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="120" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="FIRST_SUBSCRIPTION_DATE" caption="FIRST SUBSCRIPTION DATE" fieldSource="FIRST_SUBSCRIPTION_DATE" format="dd-mmm-yyyy" required="False" PathID="CustomerFormFIRST_SUBSCRIPTION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" caption="UPDATE DATE" fieldSource="UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate" required="True" PathID="CustomerFormUPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ID" fieldSource="CUSTOMER_ID" PathID="CustomerFormCUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="107" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_CLASS_ID" caption="CUSTOMER CLASS ID" fieldSource="CUSTOMER_CLASS_ID" required="True" PathID="CustomerFormCUSTOMER_CLASS_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DEBTOR_SEGMENT_CODE" caption="DEBTOR SEGMENT CODE" fieldSource="DEBTOR_SEGMENT_CODE" required="True" PathID="CustomerFormDEBTOR_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_SEGMENT_CODE" caption="CUSTOMER SEGMENT CODE" fieldSource="CUSTOMER_SEGMENT_CODE" required="True" PathID="CustomerFormCUSTOMER_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_TITLE_CODE" caption="CUSTOMER TITLE CODE" fieldSource="CUSTOMER_TITLE_CODE" required="False" PathID="CustomerFormCUSTOMER_TITLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GENDER_CODE" caption="GENDER CODE" fieldSource="GENDER_CODE" required="False" PathID="CustomerFormGENDER_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="138" name="DatePicker_UPDATE_DATE1" style="../Styles/trb/Style.css" control="FIRST_SUBSCRIPTION_DATE" PathID="CustomerFormDatePicker_UPDATE_DATE1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="147" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CustomerClass" fieldSource="CUSTOMER_CLASS_CODE" required="True" PathID="CustomerFormCustomerClass">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="148" fieldSourceType="DBColumn" dataType="Float" name="P_DEBTOR_SEGMENT_ID" fieldSource="P_DEBTOR_SEGMENT_ID" PathID="CustomerFormP_DEBTOR_SEGMENT_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="150" fieldSourceType="DBColumn" dataType="Float" name="P_CUSTOMER_SEGMENT_ID" fieldSource="P_CUSTOMER_SEGMENT_ID" PathID="CustomerFormP_CUSTOMER_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="151" fieldSourceType="DBColumn" dataType="Float" name="P_CUSTOMER_TITLE_ID" fieldSource="P_CUSTOMER_TITLE_ID" PathID="CustomerFormP_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="153" fieldSourceType="DBColumn" dataType="Float" name="GENDER_TYPE_ID" fieldSource="GENDER_TYPE_ID" PathID="CustomerFormGENDER_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SUB_DEBTOR_SEGMENT_CODE" caption="SUB DEBTOR SEGMENT CODE" fieldSource="SUB_DEBTOR_SEGMENT_CODE" required="False" PathID="CustomerFormSUB_DEBTOR_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="149" fieldSourceType="DBColumn" dataType="Float" name="P_SUB_DEBTOR_SEGMENT_ID" fieldSource="P_SUB_DEBTOR_SEGMENT_ID" PathID="CustomerFormP_SUB_DEBTOR_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" caption="UPDATE BY" fieldSource="UPDATE_BY" defaultValue="CCGetUserLogin()" required="True" PathID="CustomerFormUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUSINESS_SEGMENT_CODE" caption="BUSINESS SEGMENT CODE" fieldSource="BUSINESS_SEGMENT_CODE" required="False" PathID="CustomerFormBUSINESS_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="152" fieldSourceType="DBColumn" dataType="Float" name="P_BUSINESS_SEGMENT_ID" fieldSource="P_BUSINESS_SEGMENT_ID" PathID="CustomerFormP_BUSINESS_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_2" caption="ADDRESS 2" fieldSource="ADDRESS_2" required="False" PathID="CustomerFormADDRESS_2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REGION_NAME" caption="REGION NAME" fieldSource="REGION_NAME" required="False" PathID="CustomerFormREGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="154" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" fieldSource="P_REGION_ID" PathID="CustomerFormP_REGION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextArea id="211" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" PathID="CustomerFormDESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="331"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="332"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="333"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="334"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="335"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="336"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="103" conditionType="Parameter" useIsNull="False" field="CUSTOMER_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" parameterSource="CUSTOMER_ID" logicOperator="And" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="245" variable="CUSTOMER_NUMBER" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NUMBER"/>
				<SQLParameter id="246" variable="LAST_NAME" dataType="Text" parameterType="Control" parameterSource="LAST_NAME"/>
				<SQLParameter id="247" variable="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
				<SQLParameter id="248" variable="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
				<SQLParameter id="249" variable="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
				<SQLParameter id="250" variable="CCDB_CODE" dataType="Float" parameterType="Control" parameterSource="CCDB_CODE"/>
				<SQLParameter id="251" variable="FIRST_SUBSCRIPTION_DATE" dataType="Date" parameterType="Control" parameterSource="FIRST_SUBSCRIPTION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="252" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="253" variable="CUSTOMER_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ID"/>
				<SQLParameter id="254" variable="CUSTOMER_CLASS_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CLASS_ID"/>
				<SQLParameter id="255" variable="DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="DEBTOR_SEGMENT_CODE"/>
				<SQLParameter id="256" variable="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE"/>
				<SQLParameter id="257" variable="CUSTOMER_TITLE_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_TITLE_CODE"/>
				<SQLParameter id="258" variable="GENDER_CODE" dataType="Text" parameterType="Control" parameterSource="GENDER_CODE"/>
				<SQLParameter id="259" variable="CustomerClass" dataType="Text" parameterType="Control" parameterSource="CustomerClass"/>
				<SQLParameter id="260" variable="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID"/>
				<SQLParameter id="261" variable="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<SQLParameter id="262" variable="P_CUSTOMER_TITLE_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_TITLE_ID"/>
				<SQLParameter id="263" variable="GENDER_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="GENDER_TYPE_ID"/>
				<SQLParameter id="264" variable="SUB_DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="SUB_DEBTOR_SEGMENT_CODE"/>
				<SQLParameter id="265" variable="P_SUB_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_DEBTOR_SEGMENT_ID"/>
				<SQLParameter id="266" variable="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<SQLParameter id="267" variable="BUSINESS_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="BUSINESS_SEGMENT_CODE"/>
				<SQLParameter id="268" variable="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID"/>
				<SQLParameter id="269" variable="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
				<SQLParameter id="270" variable="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
				<SQLParameter id="271" variable="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
				<SQLParameter id="272" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="217" field="CUSTOMER_NUMBER" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NUMBER"/>
				<CustomParameter id="218" field="LAST_NAME" dataType="Text" parameterType="Control" parameterSource="LAST_NAME"/>
				<CustomParameter id="219" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
				<CustomParameter id="220" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
				<CustomParameter id="221" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
				<CustomParameter id="222" field="CCDB_CODE" dataType="Float" parameterType="Control" parameterSource="CCDB_CODE"/>
				<CustomParameter id="223" field="FIRST_SUBSCRIPTION_DATE" dataType="Date" parameterType="Control" parameterSource="FIRST_SUBSCRIPTION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="224" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="225" field="CUSTOMER_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ID"/>
				<CustomParameter id="226" field="CUSTOMER_CLASS_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CLASS_ID"/>
				<CustomParameter id="227" field="DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="DEBTOR_SEGMENT_CODE"/>
				<CustomParameter id="228" field="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE"/>
				<CustomParameter id="229" field="CUSTOMER_TITLE_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_TITLE_CODE"/>
				<CustomParameter id="230" field="GENDER_CODE" dataType="Text" parameterType="Control" parameterSource="GENDER_CODE"/>
				<CustomParameter id="231" field="CUSTOMER_CLASS_CODE" dataType="Text" parameterType="Control" parameterSource="CustomerClass"/>
				<CustomParameter id="232" field="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID"/>
				<CustomParameter id="233" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="234" field="P_CUSTOMER_TITLE_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_TITLE_ID"/>
				<CustomParameter id="235" field="GENDER_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="GENDER_TYPE_ID"/>
				<CustomParameter id="236" field="SUB_DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="SUB_DEBTOR_SEGMENT_CODE"/>
				<CustomParameter id="237" field="P_SUB_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_DEBTOR_SEGMENT_ID"/>
				<CustomParameter id="238" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="239" field="BUSINESS_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="BUSINESS_SEGMENT_CODE"/>
				<CustomParameter id="240" field="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID"/>
				<CustomParameter id="241" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
				<CustomParameter id="242" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
				<CustomParameter id="243" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
				<CustomParameter id="244" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="303" variable="CUSTOMER_NUMBER" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NUMBER"/>
				<SQLParameter id="304" variable="LAST_NAME" dataType="Text" parameterType="Control" parameterSource="LAST_NAME"/>
				<SQLParameter id="305" variable="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
				<SQLParameter id="306" variable="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
				<SQLParameter id="307" variable="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
				<SQLParameter id="308" variable="CCDB_CODE" dataType="Float" parameterType="Control" parameterSource="CCDB_CODE"/>
				<SQLParameter id="309" variable="FIRST_SUBSCRIPTION_DATE" dataType="Date" parameterType="Control" parameterSource="FIRST_SUBSCRIPTION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="310" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="311" variable="CUSTOMER_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ID" defaultValue="0"/>
				<SQLParameter id="312" variable="CUSTOMER_CLASS_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CLASS_ID"/>
				<SQLParameter id="318" variable="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID"/>
				<SQLParameter id="319" variable="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<SQLParameter id="320" variable="P_CUSTOMER_TITLE_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_TITLE_ID"/>
				<SQLParameter id="321" variable="GENDER_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="GENDER_TYPE_ID"/>
				<SQLParameter id="323" variable="P_SUB_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_DEBTOR_SEGMENT_ID"/>
				<SQLParameter id="324" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="326" variable="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID"/>
				<SQLParameter id="327" variable="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
				<SQLParameter id="328" variable="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
				<SQLParameter id="329" variable="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
				<SQLParameter id="330" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="274" conditionType="Parameter" useIsNull="False" field="CUSTOMER_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="275" field="CUSTOMER_NUMBER" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NUMBER" omitIfEmpty="True"/>
				<CustomParameter id="276" field="LAST_NAME" dataType="Text" parameterType="Control" parameterSource="LAST_NAME" omitIfEmpty="True"/>
				<CustomParameter id="277" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1" omitIfEmpty="True"/>
				<CustomParameter id="278" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3" omitIfEmpty="True"/>
				<CustomParameter id="279" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE" omitIfEmpty="True"/>
				<CustomParameter id="280" field="CCDB_CODE" dataType="Float" parameterType="Control" parameterSource="CCDB_CODE" omitIfEmpty="True"/>
				<CustomParameter id="281" field="FIRST_SUBSCRIPTION_DATE" dataType="Date" parameterType="Control" parameterSource="FIRST_SUBSCRIPTION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="282" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="283" field="CUSTOMER_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ID" omitIfEmpty="True"/>
				<CustomParameter id="284" field="CUSTOMER_CLASS_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_CLASS_ID" omitIfEmpty="True"/>
				<CustomParameter id="285" field="DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="DEBTOR_SEGMENT_CODE" omitIfEmpty="True"/>
				<CustomParameter id="286" field="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE" omitIfEmpty="True"/>
				<CustomParameter id="287" field="CUSTOMER_TITLE_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_TITLE_CODE" omitIfEmpty="True"/>
				<CustomParameter id="288" field="GENDER_CODE" dataType="Text" parameterType="Control" parameterSource="GENDER_CODE" omitIfEmpty="True"/>
				<CustomParameter id="289" field="CUSTOMER_CLASS_CODE" dataType="Text" parameterType="Control" parameterSource="CustomerClass" omitIfEmpty="True"/>
				<CustomParameter id="290" field="P_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_DEBTOR_SEGMENT_ID" omitIfEmpty="True"/>
				<CustomParameter id="291" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID" omitIfEmpty="True"/>
				<CustomParameter id="292" field="P_CUSTOMER_TITLE_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_TITLE_ID" omitIfEmpty="True"/>
				<CustomParameter id="293" field="GENDER_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="GENDER_TYPE_ID" omitIfEmpty="True"/>
				<CustomParameter id="294" field="SUB_DEBTOR_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="SUB_DEBTOR_SEGMENT_CODE" omitIfEmpty="True"/>
				<CustomParameter id="295" field="P_SUB_DEBTOR_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_SUB_DEBTOR_SEGMENT_ID" omitIfEmpty="True"/>
				<CustomParameter id="296" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
				<CustomParameter id="297" field="BUSINESS_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="BUSINESS_SEGMENT_CODE" omitIfEmpty="True"/>
				<CustomParameter id="298" field="P_BUSINESS_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_SEGMENT_ID" omitIfEmpty="True"/>
				<CustomParameter id="299" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2" omitIfEmpty="True"/>
				<CustomParameter id="300" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME" omitIfEmpty="True"/>
				<CustomParameter id="301" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID" omitIfEmpty="True"/>
				<CustomParameter id="302" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="216" variable="CUSTOMER_ID" parameterType="Control" dataType="Float" parameterSource="CUSTOMER_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="215" conditionType="Parameter" useIsNull="False" field="CUSTOMER_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="customer_master.php" forShow="True" url="customer_master.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="customer_master_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
