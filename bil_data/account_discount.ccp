<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM V_CUST_ACCOUNT_DISCOUNT
WHERE CUSTOMER_ACCOUNT_ID={CUSTOMER_ACCOUNT_ID}" name="V_ACCOUNT_DISC" pageSizeLimit="100" wizardCaption=" V SUBSCRIBER " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="4" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUST_ACCOUNT_DISCOUNT_ID" fieldSource="CUST_ACCOUNT_DISCOUNT_ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCCUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="5" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="SERVICE NO" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="6" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE" wizardCaption="SUBSCRIPTION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCBILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="14" fieldSourceType="DBColumn" dataType="Text" html="False" name="ABSOLUTE_AMOUNT" fieldSource="ABSOLUTE_AMOUNT" wizardCaption="LAST STATUS DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCABSOLUTE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="RELATIVE_AMOUNT" fieldSource="RELATIVE_AMOUNT" wizardCaption="IS INVOICED" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCRELATIVE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="IS VAT EXCEPTION" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" wizardCaption="SERVICE TYPE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCBILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" name="LOW_BILLING_UNIT" fieldSource="LOW_BILLING_UNIT" wizardCaption="TARIFF SCENARIO CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_ACCOUNT_DISCLOW_BILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="60" size="3" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="3" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="61" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_ACCOUNT_DISCDLink" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="62" sourceType="DataField" name="CUST_ACCOUNT_DISCOUNT_ID" source="CUST_ACCOUNT_DISCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="63" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="V_ACCOUNT_DISCADLink" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="64" sourceType="DataField" format="yyyy-mm-dd" name="CUST_ACCOUNT_DISCOUNT_ID" source="CUST_ACCOUNT_DISCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="66" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ACCOUNT_ID" PathID="V_ACCOUNT_DISCCUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="143" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioEdit" PathID="V_ACCOUNT_DISCskenarioEdit" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="225" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="144" sourceType="DataField" format="yyyy-mm-dd" name="CUST_ACCOUNT_DISCOUNT_ID" source="CUST_ACCOUNT_DISCOUNT_ID"/>
						<LinkParameter id="226" sourceType="DataField" name="CUSTOMER_ACCOUNT_ID" source="CUSTOMER_ACCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="145" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioDel" PathID="V_ACCOUNT_DISCskenarioDel" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;CUST_ACCOUNT_DISCOUNT_ID" fieldSource="CUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="219" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="146" sourceType="DataField" format="yyyy-mm-dd" name="CUST_ACCOUNT_DISCOUNT_ID" source="CUST_ACCOUNT_DISCOUNT_ID"/>
						<LinkParameter id="223" sourceType="Expression" name="action_delete" source="1"/>
						<LinkParameter id="224" sourceType="DataField" name="CUSTOMER_ACCOUNT_ID" source="CUSTOMER_ACCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="147" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" PathID="V_ACCOUNT_DISCVALID_TO" html="False" fieldSource="VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="148" fieldSourceType="DBColumn" dataType="Text" html="False" name="UP_BILLING_UNIT" PathID="V_ACCOUNT_DISCUP_BILLING_UNIT" fieldSource="UP_BILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="149" fieldSourceType="DBColumn" dataType="Text" html="False" name="IS_BASED_ON_TOTAL" PathID="V_ACCOUNT_DISCIS_BASED_ON_TOTAL" fieldSource="IS_BASED_ON_TOTAL">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="150" fieldSourceType="DBColumn" dataType="Text" html="False" name="PCT_MULTIPLIER" PathID="V_ACCOUNT_DISCPCT_MULTIPLIER" fieldSource="PCT_MULTIPLIER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="151" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATE_DATE" PathID="V_ACCOUNT_DISCUPDATE_DATE" fieldSource="UPDATE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="152" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_BY" PathID="V_ACCOUNT_DISCUPDATE_BY" fieldSource="UPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="179" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="V_P_ACCOUNT_DISC_Insert" hrefSource="customer_account.ccp" removeParameters="CUST_ACCOUNT_DISCOUNT_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="V_ACCOUNT_DISCV_P_ACCOUNT_DISC_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="180" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="181" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="3" styles="Row;AltRow" name="rowStyle"/>
						<Action actionName="Custom Code" actionCategory="General" id="65"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="68" variable="CUSTOMER_ACCOUNT_ID" parameterType="URL" defaultValue="-99" dataType="Float" parameterSource="CUSTOMER_ACCOUNT_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="69" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM V_CUST_ACCOUNT_COMP_DISCOUNT
WHERE CUST_ACCOUNT_DISCOUNT_ID={CUST_ACCOUNT_DISCOUNT_ID}" name="V_CUST_ACCOUNT_COMP_DISCOUNT" pageSizeLimit="100" wizardCaption=" V SUBSCRIBER STATUS " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" pasteActions="pasteActions">
			<Components>
				<Label id="71" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUST_ACCOUNT_COMP_DISCOUNT_ID" fieldSource="CUST_ACCOUNT_COMP_DISCOUNT_ID" wizardCaption="SUBSCRIBER STATUS ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTCUST_ACCOUNT_COMP_DISCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="74" fieldSourceType="DBColumn" dataType="Text" html="False" name="RESULT_BILL_COMP_CODE" fieldSource="RESULT_BILL_COMP_CODE" wizardCaption="STATUS DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTRESULT_BILL_COMP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="75" fieldSourceType="DBColumn" dataType="Float" html="False" name="ABSOLUTE_AMOUNT" fieldSource="ABSOLUTE_AMOUNT" wizardCaption="IS SENT TO NMS" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTABSOLUTE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="76" fieldSourceType="DBColumn" dataType="Text" html="False" name="PCT_MULTIPLIER" fieldSource="PCT_MULTIPLIER" wizardCaption="IS SENT OK" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTPCT_MULTIPLIER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="77" fieldSourceType="DBColumn" dataType="Float" html="False" name="RELATIVE_AMOUNT" fieldSource="RELATIVE_AMOUNT" wizardCaption="SENT DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTRELATIVE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="79" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="80" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATE_DATE" fieldSource="UPDATE_DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTUPDATE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="81" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_BY" fieldSource="UPDATE_BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="82" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE" wizardCaption="SUBSCRIPTION STATUS CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTBILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="83" size="3" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="3" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="264" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioEdit" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTskenarioEdit" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACCOUNT_COMP_DISCOUNT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="265"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="266" sourceType="DataField" format="yyyy-mm-dd" name="CUST_ACCOUNT_DISCOUNT_ID" source="CUST_ACCOUNT_DISCOUNT_ID"/>
						<LinkParameter id="267" sourceType="DataField" name="CUST_ACCOUNT_COMP_DISCOUNT_ID" source="CUST_ACCOUNT_COMP_DISCOUNT_ID"/>
						<LinkParameter id="372" sourceType="DataField" name="CUSTOMER_ACCOUNT_ID" source="CUSTOMER_ACCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="268" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="skenarioDel" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTskenarioDel" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG;CUST_ACCOUNT_COMP_DISCOUNT_ID" fieldSource="CUST_ACCOUNT_COMP_DISCOUNT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="269" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="270" sourceType="DataField" format="yyyy-mm-dd" name="CUST_ACCOUNT_DISCOUNT_ID" source="CUST_ACCOUNT_DISCOUNT_ID"/>
						<LinkParameter id="271" sourceType="Expression" name="action_delete2" source="1"/>
						<LinkParameter id="272" sourceType="DataField" name="CUST_ACCOUNT_COMP_DISCOUNT_ID" source="CUST_ACCOUNT_COMP_DISCOUNT_ID"/>
						<LinkParameter id="381" sourceType="URL" name="CUSTOMER_ACCOUNT_ID" source="CUSTOMER_ACCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="367" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="V_P_ACC_DISC_COMP_Insert" hrefSource="customer_account.ccp" removeParameters="CUST_ACCOUNT_COMP_DISCOUNT_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTV_P_ACC_DISC_COMP_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="368"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="369" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="370" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUST_ACCOUNT_DISCOUNT_ID" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTCUST_ACCOUNT_DISCOUNT_ID" fieldSource="CUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="371" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ACCOUNT_ID" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTCUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="376" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTDLink" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACCOUNT_COMP_DISCOUNT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="377" sourceType="DataField" name="CUST_ACCOUNT_COMP_DISCOUNT_ID" source="CUST_ACCOUNT_COMP_DISCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="378" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="V_CUST_ACCOUNT_COMP_DISCOUNTADLink" hrefSource="account_discount.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACCOUNT_COMP_DISCOUNT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="379" sourceType="DataField" format="yyyy-mm-dd" name="CUST_ACCOUNT_COMP_DISCOUNT_ID" source="CUST_ACCOUNT_COMP_DISCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="374" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="375"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="85" variable="CUST_ACCOUNT_DISCOUNT_ID" parameterType="URL" defaultValue="-99" dataType="Float" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="86" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_customer_account" dataSource="SELECT *
FROM V_CUSTOMER_ACCOUNT
WHERE CUSTOMER_ACCOUNT_ID = {CUSTOMER_ACCOUNT_ID}" errorSummator="Error" wizardCaption=" P Input File Desc " wizardFormMethod="post" PathID="p_customer_account" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_INPUT_FILE_DESC(P_INPUT_FILE_DESC_ID, P_INPUT_FILE_TYPE_ID, P_SERVICE_TYPE_ID, PROCEDURE_NAME, START_POSITION_NAME, END_POSITION_NAME, PARTIAL_FILE_NAME, START_DATA_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
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
WHERE  P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_INPUT_FILE_DESC WHERE P_INPUT_FILE_DESC_ID = {P_INPUT_FILE_DESC_ID}">
			<Components>
				<Label id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NO" fieldSource="ACCOUNT_NO" required="True" caption="CODE" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_customer_accountACCOUNT_NO" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="140" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" PathID="p_customer_accountLAST_NAME" fieldSource="LAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NUMBER" PathID="p_customer_accountCUSTOMER_NUMBER" fieldSource="CUSTOMER_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NAME" PathID="p_customer_accountCUSTOMER_NAME" fieldSource="CUSTOMER_NAME">
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
				<SQLParameter id="89" parameterType="URL" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterSource="CUSTOMER_ACCOUNT_ID" defaultValue="-99"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="90" variable="P_INPUT_FILE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<SQLParameter id="91" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="92" variable="PROCEDURE_NAME" parameterType="Control" dataType="Text" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="93" variable="START_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_POSITION_NAME"/>
				<SQLParameter id="94" variable="END_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="END_POSITION_NAME"/>
				<SQLParameter id="95" variable="PARTIAL_FILE_NAME" parameterType="Control" dataType="Text" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="96" variable="START_DATA_POSITION" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_DATA_POSITION"/>
				<SQLParameter id="97" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="98" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="99" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="100" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="101" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="102" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="103" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="104" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="105" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
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
				<SQLParameter id="123" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="124" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="125" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="126" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="127" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="128" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="129" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<CustomParameter id="130" field="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION"/>
				<CustomParameter id="131" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="132" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="133" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="134" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="135" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="136" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="137" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
				<CustomParameter id="138" field="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="139" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="153" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_CUST_ACCOUNT_DISCOUNT" dataSource="V_CUST_ACCOUNT_DISCOUNT" errorSummator="Error" wizardCaption=" V CUST ACCOUNT DISCOUNT " wizardFormMethod="post" PathID="V_CUST_ACCOUNT_DISCOUNT" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customInsert="/* Formatted on 30/09/2014 14:36:40 (QP5 v5.139.911.3011) */
INSERT INTO CUST_ACCOUNT_DISCOUNT (CUST_ACCOUNT_DISCOUNT_ID,
                                     CUSTOMER_ACCOUNT_ID,
                                     P_BILLING_PERIOD_UNIT_ID,
                                     LOW_BILLING_UNIT,
                                     UP_BILLING_UNIT,
                                     VALID_FROM,
                                     VALID_TO,
                                     RESULT_BILL_COMP_ID,
                                     IS_BASED_ON_TOTAL,
                                     PCT_MULTIPLIER,
                                     ABSOLUTE_AMOUNT,
                                     RELATIVE_AMOUNT,
                                     DESCRIPTION,
                                     UPDATE_BY,
                                     UPDATE_DATE)
     VALUES (CAD_SEQ.NEXTVAL,
                {CUSTOMER_ACCOUNT_ID}, 
                {P_BILLING_PERIOD_UNIT_ID}, 
                {LOW_BILLING_UNIT}, 
                {UP_BILLING_UNIT}, 
                to_date(substr('{VALID_FROM}',1,10),'yyyy/mm/dd'),
                to_date(substr('{VALID_TO}',1,10),'yyyy/mm/dd'),
                {RESULT_BILL_COMP_ID},  
                '{IS_BASED_ON_TOTAL}', 
                {PCT_MULTIPLIER}, 
                {ABSOLUTE_AMOUNT}, 
                {RELATIVE_AMOUNT}, 
                '{DESCRIPTION}', 
                '{UPDATE_BY}', 
                SYSDATE)" customDeleteType="SQL" customDelete="DELETE 
FROM CUST_ACCOUNT_DISCOUNT 
WHERE  CUST_ACCOUNT_DISCOUNT_ID = {CUST_ACCOUNT_DISCOUNT_ID}" customUpdateType="SQL" customUpdate="UPDATE V_CUST_ACCOUNT_DISCOUNT 
SET CUST_ACCOUNT_DISCOUNT_ID={CUST_ACCOUNT_DISCOUNT_ID}, 
	P_BILLING_PERIOD_UNIT_ID={P_BILLING_PERIOD_UNIT_ID}, 
	LOW_BILLING_UNIT={LOW_BILLING_UNIT}, 
	UP_BILLING_UNIT={UP_BILLING_UNIT}, 
	VALID_FROM=to_date(substr('{VALID_FROM}',1,10),'yyyy/mm/dd'), 
	VALID_TO=to_date(substr('{VALID_TO}',1,10),'yyyy/mm/dd'), 
	RESULT_BILL_COMP_ID={RESULT_BILL_COMP_ID}, 
	CUSTOMER_ACCOUNT_ID={CUSTOMER_ACCOUNT_ID},
	IS_BASED_ON_TOTAL='{IS_BASED_ON_TOTAL}', 
	PCT_MULTIPLIER={PCT_MULTIPLIER}, 
	ABSOLUTE_AMOUNT={ABSOLUTE_AMOUNT}, 
	RELATIVE_AMOUNT={RELATIVE_AMOUNT}, 
	DESCRIPTION='{DESCRIPTION}', 
	UPDATE_BY='{UPDATE_BY}', 
	UPDATE_DATE=SYSDATE 
WHERE  CUST_ACCOUNT_DISCOUNT_ID = {CUST_ACCOUNT_DISCOUNT_ID}"><Components><Button id="154" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_CUST_ACCOUNT_DISCOUNTButton_Insert" removeParameters="TAMBAH"><Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="382" message="Save this record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="155" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_CUST_ACCOUNT_DISCOUNTButton_Update">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="383" message="Change this record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="158" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_CUST_ACCOUNT_DISCOUNTButton_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="228" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="160" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUST_ACCOUNT_DISCOUNT_ID" fieldSource="CUST_ACCOUNT_DISCOUNT_ID" caption="CUST ACCOUNT DISCOUNT ID" wizardCaption="CUSTOMER ACCOUNT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTCUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="161" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="True" caption="BILL PERIOD UNIT CODE" wizardCaption="P BILLING PERIOD UNIT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTP_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="162" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LOW_BILLING_UNIT" fieldSource="LOW_BILLING_UNIT" required="True" caption="LOW BILLING UNIT" wizardCaption="LOW BILLING UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTLOW_BILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="163" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="UP_BILLING_UNIT" fieldSource="UP_BILLING_UNIT" required="False" caption="UP BILLING UNIT" wizardCaption="UP BILLING UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTUP_BILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="164" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTVALID_FROM" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="166" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="168" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="RESULT_BILL_COMP_ID" fieldSource="RESULT_BILL_COMP_ID" required="True" caption="BILL COMPONENT CODE" wizardCaption="RESULT BILL COMP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTRESULT_BILL_COMP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="184" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_ACCOUNT_ID" PathID="V_CUST_ACCOUNT_DISCOUNTCUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="177" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" required="False" caption="BILL PERIOD UNIT CODE" wizardCaption="BILL PERIOD UNIT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTBILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE" required="False" caption="BILL COMPONENT CODE" wizardCaption="BILL COMPONENT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTBILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="169" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_BASED_ON_TOTAL" fieldSource="IS_BASED_ON_TOTAL" required="True" caption="IS BASED ON TOTAL" wizardCaption="IS BASED ON TOTAL" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTIS_BASED_ON_TOTAL" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="NO" dataSource="Y;YES;N;NO">
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
				<TextBox id="170" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PCT_MULTIPLIER" fieldSource="PCT_MULTIPLIER" required="False" caption="PCT MULTIPLIER" wizardCaption="PCT MULTIPLIER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTPCT_MULTIPLIER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="171" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ABSOLUTE_AMOUNT" fieldSource="ABSOLUTE_AMOUNT" required="False" caption="ABSOLUTE AMOUNT" wizardCaption="ABSOLUTE AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTABSOLUTE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="172" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="RELATIVE_AMOUNT" fieldSource="RELATIVE_AMOUNT" required="False" caption="RELATIVE AMOUNT" wizardCaption="RELATIVE AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTRELATIVE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="173" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="176" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="174" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_DISCOUNTUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="227" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="384"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="385"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="159" conditionType="Parameter" useIsNull="False" field="CUST_ACCOUNT_DISCOUNT_ID" parameterSource="CUST_ACCOUNT_DISCOUNT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="202" variable="CUST_ACCOUNT_DISCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
				<SQLParameter id="203" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<SQLParameter id="204" variable="LOW_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="LOW_BILLING_UNIT"/>
				<SQLParameter id="205" variable="UP_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="UP_BILLING_UNIT"/>
				<SQLParameter id="206" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="207" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="208" variable="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<SQLParameter id="209" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<SQLParameter id="212" variable="IS_BASED_ON_TOTAL" dataType="Text" parameterType="Control" parameterSource="IS_BASED_ON_TOTAL"/>
				<SQLParameter id="213" variable="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<SQLParameter id="214" variable="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<SQLParameter id="215" variable="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<SQLParameter id="216" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="217" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="218" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="185" field="CUST_ACCOUNT_DISCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
				<CustomParameter id="186" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<CustomParameter id="187" field="LOW_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="LOW_BILLING_UNIT"/>
				<CustomParameter id="188" field="UP_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="UP_BILLING_UNIT"/>
				<CustomParameter id="189" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="190" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="191" field="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<CustomParameter id="192" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<CustomParameter id="193" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
				<CustomParameter id="194" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
				<CustomParameter id="195" field="IS_BASED_ON_TOTAL" dataType="Text" parameterType="Control" parameterSource="IS_BASED_ON_TOTAL"/>
				<CustomParameter id="196" field="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<CustomParameter id="197" field="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<CustomParameter id="198" field="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<CustomParameter id="199" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="200" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="201" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="247" variable="CUST_ACCOUNT_DISCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACCOUNT_DISCOUNT_ID" defaultValue="0"/>
				<SQLParameter id="248" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<SQLParameter id="249" variable="LOW_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="LOW_BILLING_UNIT"/>
				<SQLParameter id="250" variable="UP_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="UP_BILLING_UNIT"/>
				<SQLParameter id="251" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="252" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="253" variable="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<SQLParameter id="254" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<SQLParameter id="257" variable="IS_BASED_ON_TOTAL" dataType="Text" parameterType="Control" parameterSource="IS_BASED_ON_TOTAL"/>
				<SQLParameter id="258" variable="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<SQLParameter id="259" variable="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<SQLParameter id="260" variable="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<SQLParameter id="261" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="262" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="263" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="229" conditionType="Parameter" useIsNull="False" field="CUST_ACCOUNT_DISCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACCOUNT_DISCOUNT_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="230" field="CUST_ACCOUNT_DISCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
				<CustomParameter id="231" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<CustomParameter id="232" field="LOW_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="LOW_BILLING_UNIT"/>
				<CustomParameter id="233" field="UP_BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="UP_BILLING_UNIT"/>
				<CustomParameter id="234" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="235" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="236" field="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<CustomParameter id="237" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<CustomParameter id="238" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
				<CustomParameter id="239" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
				<CustomParameter id="240" field="IS_BASED_ON_TOTAL" dataType="Text" parameterType="Control" parameterSource="IS_BASED_ON_TOTAL"/>
				<CustomParameter id="241" field="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<CustomParameter id="242" field="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<CustomParameter id="243" field="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<CustomParameter id="244" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="245" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="246" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="221" variable="CUST_ACCOUNT_DISCOUNT_ID" parameterType="URL" dataType="Float" parameterSource="CUST_ACCOUNT_DISCOUNT_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="220" conditionType="Parameter" useIsNull="False" field="CUST_ACCOUNT_DISCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACCOUNT_DISCOUNT_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="292" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_CUST_ACCOUNT_COMP_DISCO" dataSource="V_CUST_ACCOUNT_COMP_DISCOUNT" errorSummator="Error" wizardCaption=" V CUST ACCOUNT COMP DISCOUNT " wizardFormMethod="post" PathID="V_CUST_ACCOUNT_COMP_DISCO" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customInsert="/* Formatted on 01/10/2014 13:35:48 (QP5 v5.139.911.3011) */
INSERT INTO CUST_ACCOUNT_COMP_DISCOUNT (CUST_ACCOUNT_COMP_DISCOUNT_ID,
                                          P_BILL_COMPONENT_ID,
                                          RESULT_BILL_COMP_ID,
                                          RELATIVE_AMOUNT,
                                          UPDATE_DATE,
                                          PCT_MULTIPLIER,
                                          ABSOLUTE_AMOUNT,
                                          DESCRIPTION,
                                          UPDATE_BY,
                                          CUST_ACCOUNT_DISCOUNT_ID)
     VALUES (GENERATE_ID ('BILLDB','CUST_ACCOUNT_COMP_DISCOUNT','CUST_ACCOUNT_COMP_DISCOUNT_ID'), 
            {P_BILL_COMPONENT_ID}, 
            {RESULT_BILL_COMP_ID},
            {RELATIVE_AMOUNT},
            SYSDATE, 
            {PCT_MULTIPLIER}, 
            {ABSOLUTE_AMOUNT}, 
            '{DESCRIPTION}', 
            '{UPDATE_BY}', 
            '{CUST_ACCOUNT_DISCOUNT_ID}')" returnPage="account_discount.ccp" customUpdateType="SQL" customUpdate="UPDATE CUST_ACCOUNT_COMP_DISCOUNT 
SET P_BILL_COMPONENT_ID={P_BILL_COMPONENT_ID}, 
    RESULT_BILL_COMP_ID={RESULT_BILL_COMP_ID}, 
    RELATIVE_AMOUNT={RELATIVE_AMOUNT}, 
    UPDATE_DATE=SYSDATE, 
    BILL_COMPONENT_CODE='{BILL_COMPONENT_CODE}', 
    RESULT_BILL_COMP_CODE='{RESULT_BILL_COMP_CODE}', 
    PCT_MULTIPLIER={PCT_MULTIPLIER}, 
    ABSOLUTE_AMOUNT={ABSOLUTE_AMOUNT}, 
    DESCRIPTION='{DESCRIPTION}', 
    UPDATE_BY='{UPDATE_BY}', 
    CUST_ACCOUNT_DISCOUNT_ID='{CUST_ACCOUNT_DISCOUNT_ID}' 
WHERE  CUST_ACCOUNT_COMP_DISCOUNT_ID = {CUST_ACCOUNT_COMP_DISCOUNT_ID}" customDeleteType="SQL" customDelete="DELETE FROM CUST_ACCOUNT_COMP_DISCOUNT 
WHERE  CUST_ACCOUNT_COMP_DISCOUNT_ID = {CUST_ACCOUNT_COMP_DISCOUNT_ID}">
			<Components>
				<Button id="293" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_CUST_ACCOUNT_COMP_DISCOButton_Insert" returnPage="account_discount.ccp" removeParameters="TAMBAH2">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="365" message="Save this record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="294" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_CUST_ACCOUNT_COMP_DISCOButton_Update" returnPage="account_discount.ccp" removeParameters="s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="366" message="Change this record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="297" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_CUST_ACCOUNT_COMP_DISCOButton_Cancel" removeParameters="TAMBAH2;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="380" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="298" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUST_ACCOUNT_COMP_DISCOUNT_ID" fieldSource="CUST_ACCOUNT_COMP_DISCOUNT_ID" caption="CUST ACCOUNT DISCOUNT ID" wizardCaption="CUST ACCOUNT DISCOUNT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOCUST_ACCOUNT_COMP_DISCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="299" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_COMPONENT_ID" fieldSource="P_BILL_COMPONENT_ID" required="True" caption="BILL COMPONENT CODE" wizardCaption="P BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOP_BILL_COMPONENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="300" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="RESULT_BILL_COMP_ID" fieldSource="RESULT_BILL_COMP_ID" required="False" caption="RESULT BILL COMP ID" wizardCaption="RESULT BILL COMP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCORESULT_BILL_COMP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="303" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="RELATIVE_AMOUNT" fieldSource="RELATIVE_AMOUNT" required="False" caption="RELATIVE AMOUNT" wizardCaption="RELATIVE AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCORELATIVE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="305" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="308" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE" required="True" caption="BILL COMPONENT CODE" wizardCaption="BILL COMPONENT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOBILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="309" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="RESULT_BILL_COMP_CODE" fieldSource="RESULT_BILL_COMP_CODE" required="False" caption="RESULT BILL COMP CODE" wizardCaption="RESULT BILL COMP CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCORESULT_BILL_COMP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="301" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PCT_MULTIPLIER" fieldSource="PCT_MULTIPLIER" required="False" caption="PCT MULTIPLIER" wizardCaption="PCT MULTIPLIER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOPCT_MULTIPLIER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="302" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ABSOLUTE_AMOUNT" fieldSource="ABSOLUTE_AMOUNT" required="False" caption="ABSOLUTE AMOUNT" wizardCaption="ABSOLUTE AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOABSOLUTE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="304" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCODESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="307" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACCOUNT_COMP_DISCOUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="311" fieldSourceType="DBColumn" dataType="Text" name="CUST_ACCOUNT_DISCOUNT_ID" PathID="V_CUST_ACCOUNT_COMP_DISCOCUST_ACCOUNT_DISCOUNT_ID" visible="Yes" fieldSource="CUST_ACCOUNT_DISCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="386" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ACCOUNT_ID" PathID="V_CUST_ACCOUNT_COMP_DISCOCUSTOMER_ACCOUNT_ID">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="387"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Hidden>
</Components>
			<Events>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="336" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="337" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="310" conditionType="Parameter" useIsNull="False" field="CUST_ACCOUNT_COMP_DISCOUNT_ID" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="324" variable="CUST_ACCOUNT_COMP_DISCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID"/>
				<SQLParameter id="325" variable="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
				<SQLParameter id="326" variable="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<SQLParameter id="327" variable="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<SQLParameter id="328" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="329" variable="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
				<SQLParameter id="330" variable="RESULT_BILL_COMP_CODE" dataType="Text" parameterType="Control" parameterSource="RESULT_BILL_COMP_CODE"/>
				<SQLParameter id="331" variable="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<SQLParameter id="332" variable="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<SQLParameter id="333" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="334" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="335" variable="CUST_ACCOUNT_DISCOUNT_ID" dataType="Text" parameterType="Control" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="312" field="CUST_ACCOUNT_COMP_DISCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID"/>
				<CustomParameter id="313" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
				<CustomParameter id="314" field="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<CustomParameter id="315" field="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<CustomParameter id="316" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="317" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
				<CustomParameter id="318" field="RESULT_BILL_COMP_CODE" dataType="Text" parameterType="Control" parameterSource="RESULT_BILL_COMP_CODE"/>
				<CustomParameter id="319" field="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<CustomParameter id="320" field="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<CustomParameter id="321" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="322" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="323" field="CUST_ACCOUNT_DISCOUNT_ID" dataType="Text" parameterType="Control" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="351" variable="CUST_ACCOUNT_COMP_DISCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID" defaultValue="0"/>
				<SQLParameter id="352" variable="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
				<SQLParameter id="353" variable="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<SQLParameter id="354" variable="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<SQLParameter id="355" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="356" variable="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
				<SQLParameter id="357" variable="RESULT_BILL_COMP_CODE" dataType="Text" parameterType="Control" parameterSource="RESULT_BILL_COMP_CODE"/>
				<SQLParameter id="358" variable="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<SQLParameter id="359" variable="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<SQLParameter id="360" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="361" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="362" variable="CUST_ACCOUNT_DISCOUNT_ID" dataType="Text" parameterType="Control" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="338" conditionType="Parameter" useIsNull="False" field="CUST_ACCOUNT_COMP_DISCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="339" field="CUST_ACCOUNT_COMP_DISCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID"/>
				<CustomParameter id="340" field="P_BILL_COMPONENT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_COMPONENT_ID"/>
				<CustomParameter id="341" field="RESULT_BILL_COMP_ID" dataType="Float" parameterType="Control" parameterSource="RESULT_BILL_COMP_ID"/>
				<CustomParameter id="342" field="RELATIVE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="RELATIVE_AMOUNT"/>
				<CustomParameter id="343" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="344" field="BILL_COMPONENT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_COMPONENT_CODE"/>
				<CustomParameter id="345" field="RESULT_BILL_COMP_CODE" dataType="Text" parameterType="Control" parameterSource="RESULT_BILL_COMP_CODE"/>
				<CustomParameter id="346" field="PCT_MULTIPLIER" dataType="Float" parameterType="Control" parameterSource="PCT_MULTIPLIER"/>
				<CustomParameter id="347" field="ABSOLUTE_AMOUNT" dataType="Float" parameterType="Control" parameterSource="ABSOLUTE_AMOUNT"/>
				<CustomParameter id="348" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="349" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="350" field="CUST_ACCOUNT_DISCOUNT_ID" dataType="Text" parameterType="Control" parameterSource="CUST_ACCOUNT_DISCOUNT_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="364" variable="CUST_ACCOUNT_COMP_DISCOUNT_ID" parameterType="URL" dataType="Float" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="363" conditionType="Parameter" useIsNull="False" field="CUST_ACCOUNT_COMP_DISCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACCOUNT_COMP_DISCOUNT_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="account_discount_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="account_discount.php" forShow="True" url="account_discount.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="183"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="222"/>
			</Actions>
		</Event>
	</Events>
</Page>
