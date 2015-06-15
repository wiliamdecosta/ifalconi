<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT *
FROM V_CUST_ACC_PAYMENT_METHOD
WHERE CUSTOMER_ACCOUNT_ID = {CUSTOMER_ACCOUNT_ID}" name="V_CUST_ACC_PAYMENT_METHOD" pageSizeLimit="100" wizardCaption=" V CUSTOMER ACCOUNT " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data tidak ditemukan" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" name="PAYMENT_METHOD_CODE" fieldSource="PAYMENT_METHOD_CODE" wizardCaption="ACCOUNT NO" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODPAYMENT_METHOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" fieldSource="LAST_NAME" wizardCaption="LAST NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODLAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="52" fieldSourceType="DBColumn" dataType="Text" html="False" name="REFERENCE_NAME" fieldSource="REFERENCE_NAME" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODREFERENCE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="100" fieldSourceType="DBColumn" dataType="Date" html="False" name="REF_VALID_FROM" fieldSource="REF_VALID_FROM" wizardCaption="CUSTOMER SEGMENT CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODREF_VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="110" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="BILL PERIOD UNIT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="112" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATE_DATE" fieldSource="UPDATE_DATE" wizardCaption="CHARGING METHOD CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODUPDATE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="116" fieldSourceType="DBColumn" dataType="Text" html="False" name="REFERENCE_NO" fieldSource="REFERENCE_NO" wizardCaption="CUSTOMER NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODREFERENCE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="117" size="3" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="3" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Hidden id="38" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID" wizardCaption="CUSTOMER ACCOUNT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODCUSTOMER_ACCOUNT_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="42" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUSTOMER_ID" fieldSource="CUSTOMER_ID" wizardCaption="CUSTOMER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODCUSTOMER_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="46" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_CUSTOMER_SEGMENT_ID" fieldSource="P_CUSTOMER_SEGMENT_ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODP_CUSTOMER_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="48" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_CUSTOMER_TITLE_ID" fieldSource="P_CUSTOMER_TITLE_ID" wizardCaption="P CUSTOMER TITLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODP_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="54" fieldSourceType="DBColumn" dataType="Text" html="False" name="BANK_NAME" fieldSource="BANK_NAME" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODBANK_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="102" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="CUSTOMER TITLE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODVALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="114" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="CUSTOMER NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="64" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_BILL_CYCLE_ID" fieldSource="P_BILL_CYCLE_ID" wizardCaption="P BILL CYCLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODP_BILL_CYCLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="62" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" wizardCaption="P CURRENCY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODP_CURRENCY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="68" fieldSourceType="DBColumn" dataType="Date" html="False" name="REF_VALID_TO" fieldSource="REF_VALID_TO" wizardCaption="P BILLING PERIOD UNIT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUST_ACC_PAYMENT_METHODREF_VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="80" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_CUST_ACC_PAYMENT_METHODDLink" hrefSource="cust_acc_payment_method.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACC_PAYMENT_METHOD_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="81" sourceType="DataField" name="CUST_ACC_PAYMENT_METHOD_ID" source="CUST_ACC_PAYMENT_METHOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="82" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="V_CUST_ACC_PAYMENT_METHODADLink" hrefSource="cust_acc_payment_method.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUST_ACC_PAYMENT_METHOD_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="83" sourceType="DataField" format="yyyy-mm-dd" name="CUST_ACC_PAYMENT_METHOD_ID" source="CUST_ACC_PAYMENT_METHOD_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="V_P_CUST_ACC_PAY_METHOD_Insert" hrefSource="cust_acc_payment_method.ccp" removeParameters="CUST_ACC_PAYMENT_METHOD_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHODV_P_CUST_ACC_PAY_METHOD_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="172" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="65" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="364" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUST_ACC_PAYMENT_METHOD_ID" PathID="V_CUST_ACC_PAYMENT_METHODCUST_ACC_PAYMENT_METHOD_ID" fieldSource="CUST_ACC_PAYMENT_METHOD_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="365" fieldSourceType="DBColumn" dataType="Text" html="False" name="PAYMENT_METHOD_TYPE_CODE" PathID="V_CUST_ACC_PAYMENT_METHODPAYMENT_METHOD_TYPE_CODE" fieldSource="PAYMENT_METHOD_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="366" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATE_BY" PathID="V_CUST_ACC_PAYMENT_METHODUPDATE_BY" fieldSource="UPDATE_BY" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="35" styles="Row;AltRow" name="rowStyle"/>
						<Action actionName="Custom Code" actionCategory="General" id="174"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="ACCOUNT_NO" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="LAST_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="10" conditionType="Parameter" useIsNull="False" field="NPWP" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="ADDRESS_1" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
				<TableParameter id="12" conditionType="Parameter" useIsNull="False" field="ZIP_CODE" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
				<TableParameter id="13" conditionType="Parameter" useIsNull="False" field="CCDB_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="6"/>
				<TableParameter id="14" conditionType="Parameter" useIsNull="False" field="BILLING_UNIT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="7"/>
				<TableParameter id="15" conditionType="Parameter" useIsNull="False" field="NEXT_BILL_DATE" parameterSource="s_keyword" dataType="Date" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="8"/>
				<TableParameter id="16" conditionType="Parameter" useIsNull="False" field="MAX_CREDIT_AMT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="9"/>
				<TableParameter id="17" conditionType="Parameter" useIsNull="False" field="CUSTOMER_SEGMENT_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="10"/>
				<TableParameter id="18" conditionType="Parameter" useIsNull="False" field="CUSTOMER_TITLE_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="11"/>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="NEXT_END_BILL_DATE" parameterSource="s_keyword" dataType="Date" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="12"/>
				<TableParameter id="20" conditionType="Parameter" useIsNull="False" field="MIN_CHARGE" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="13"/>
				<TableParameter id="21" conditionType="Parameter" useIsNull="False" field="CUSTOMER_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="14"/>
				<TableParameter id="22" conditionType="Parameter" useIsNull="False" field="CUSTOMER_NUMBER" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="15"/>
				<TableParameter id="23" conditionType="Parameter" useIsNull="False" field="START_BILL_DATE" parameterSource="s_keyword" dataType="Date" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="16"/>
				<TableParameter id="24" conditionType="Parameter" useIsNull="False" field="CHARGING_METHOD_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="17"/>
				<TableParameter id="25" conditionType="Parameter" useIsNull="False" field="BILL_PERIOD_UNIT_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="18"/>
				<TableParameter id="26" conditionType="Parameter" useIsNull="False" field="BILL_CYCLE_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="19"/>
				<TableParameter id="27" conditionType="Parameter" useIsNull="False" field="CURRENCY_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="20"/>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="REGION_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="21"/>
				<TableParameter id="29" conditionType="Parameter" useIsNull="False" field="CREATION_DATE" parameterSource="s_keyword" dataType="Date" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="22"/>
				<TableParameter id="30" conditionType="Parameter" useIsNull="False" field="LAST_PAID_AMT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="23"/>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="LAST_BILLED_AMT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="24"/>
				<TableParameter id="32" conditionType="Parameter" useIsNull="False" field="TOTAL_PAID_AMT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="25"/>
				<TableParameter id="33" conditionType="Parameter" useIsNull="False" field="TOTAL_BILLED_AMT" parameterSource="s_keyword" dataType="Float" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="26"/>
				<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="TERMINATION_DATE" parameterSource="s_keyword" dataType="Date" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="27" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="171" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="335" variable="CUSTOMER_ACCOUNT_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="CUSTOMER_ACCOUNT_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="86" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_customer_account" dataSource="SELECT *
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
				<Label id="336" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" PathID="p_customer_accountLAST_NAME" fieldSource="LAST_NAME">
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
				<Label id="337" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NAME" PathID="p_customer_accountCUSTOMER_NAME" fieldSource="CUSTOMER_NAME">
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
				<CustomParameter id="338" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="101" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="339" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="103" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="340" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="105" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<CustomParameter id="106" field="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION"/>
				<CustomParameter id="107" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="108" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="109" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="341" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="111" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="342" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="113" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="343" variable="P_INPUT_FILE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<SQLParameter id="115" variable="P_SERVICE_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_SERVICE_TYPE_ID"/>
				<SQLParameter id="344" variable="PROCEDURE_NAME" parameterType="Control" dataType="Text" parameterSource="PROCEDURE_NAME"/>
				<SQLParameter id="345" variable="START_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_POSITION_NAME"/>
				<SQLParameter id="346" variable="END_POSITION_NAME" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="END_POSITION_NAME"/>
				<SQLParameter id="347" variable="PARTIAL_FILE_NAME" parameterType="Control" dataType="Text" parameterSource="PARTIAL_FILE_NAME"/>
				<SQLParameter id="348" variable="START_DATA_POSITION" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_DATA_POSITION"/>
				<SQLParameter id="349" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="350" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="351" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="352" field="P_INPUT_FILE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID"/>
				<CustomParameter id="353" field="P_SERVICE_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID"/>
				<CustomParameter id="126" field="PROCEDURE_NAME" dataType="Text" parameterType="Control" parameterSource="PROCEDURE_NAME"/>
				<CustomParameter id="354" field="START_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="START_POSITION_NAME"/>
				<CustomParameter id="355" field="END_POSITION_NAME" dataType="Float" parameterType="Control" parameterSource="END_POSITION_NAME"/>
				<CustomParameter id="129" field="PARTIAL_FILE_NAME" dataType="Text" parameterType="Control" parameterSource="PARTIAL_FILE_NAME"/>
				<CustomParameter id="356" field="START_DATA_POSITION" dataType="Float" parameterType="Control" parameterSource="START_DATA_POSITION"/>
				<CustomParameter id="357" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="358" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="359" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="134" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="360" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="136" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_INPUT_FILE_TYPE_ID1"/>
				<CustomParameter id="361" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="P_SERVICE_TYPE_ID1"/>
				<CustomParameter id="362" field="P_INPUT_FILE_DESC_ID" dataType="Float" parameterType="Control" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="363" variable="P_INPUT_FILE_DESC_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_INPUT_FILE_DESC_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="395" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_CUST_ACC_PAYMENT_METHOD1" dataSource="V_CUST_ACC_PAYMENT_METHOD" errorSummator="Error" wizardCaption=" V CUST ACC PAYMENT METHOD " wizardFormMethod="post" PathID="V_CUST_ACC_PAYMENT_METHOD1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO CUST_ACC_PAYMENT_METHOD(
    CUST_ACC_PAYMENT_METHOD_ID,
    CUSTOMER_ACCOUNT_ID,
    P_PAYMENT_METHOD_ID,
    P_PAYMENT_METHOD_TYPE_ID, 
    REFERENCE_NO,
    VALID_FROM,
    VALID_TO,
    REFERENCE_NAME,    
    BANK_NAME,
    REF_VALID_FROM,
    REF_VALID_TO,
    DESCRIPTION,
    UPDATE_DATE,
    UPDATE_BY) 
VALUES(
    generate_id('BILLDB','CUST_ACC_PAYMENT_METHOD','CUST_ACC_PAYMENT_METHOD_ID'),
    {CUSTOMER_ACCOUNT_ID},
    {P_PAYMENT_METHOD_ID},
    {P_PAYMENT_METHOD_TYPE_ID},
    '{REFERENCE_NO}',
    to_date(substr('{VALID_FROM}',1,10),'yyyy/mm/dd'),
    to_date(substr('{VALID_TO}',1,10),'yyyy/mm/dd'),
    '{REFERENCE_NAME}',
    '{BANK_NAME}',
    to_date(substr('{REF_VALID_FROM}',1,10),'yyyy/mm/dd'),
    to_date(substr('{REF_VALID_TO}',1,10),'yyyy/mm/dd'),
    '{DESCRIPTION}',
    SYSDATE,
    '{UPDATE_BY}'
    )" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customUpdateType="SQL" customUpdate="UPDATE CUST_ACC_PAYMENT_METHOD 
SET  P_PAYMENT_METHOD_ID={P_PAYMENT_METHOD_ID}, 
        P_PAYMENT_METHOD_TYPE_ID={P_PAYMENT_METHOD_TYPE_ID}, 
        REFERENCE_NO='{REFERENCE_NO}', 
        VALID_FROM=to_date(substr('{VALID_FROM}',1,10),'yyyy/mm/dd'), 
        VALID_TO=to_date(substr('{VALID_TO}',1,10),'yyyy/mm/dd'),
        UPDATE_DATE=SYSDATE, 
        REFERENCE_NAME='{REFERENCE_NAME}', 
        BANK_NAME='{BANK_NAME}', 
        REF_VALID_FROM=to_date(substr('{REF_VALID_FROM}',1,10),'yyyy/mm/dd'),
        REF_VALID_TO=to_date(substr('{REF_VALID_TO}',1,10),'yyyy/mm/dd'),  
        DESCRIPTION='{DESCRIPTION}', 
        UPDATE_BY='{UPDATE_BY}' 
WHERE  
        CUST_ACC_PAYMENT_METHOD_ID = {CUST_ACC_PAYMENT_METHOD_ID}" customDeleteType="SQL" customDelete="DELETE FROM CUST_ACC_PAYMENT_METHOD 
WHERE  CUST_ACC_PAYMENT_METHOD_ID = {CUST_ACC_PAYMENT_METHOD_ID}">
			<Components>
				<Hidden id="400" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID" required="True" caption="CUSTOMER ACCOUNT ID" wizardCaption="CUSTOMER ACCOUNT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1CUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="401" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_PAYMENT_METHOD_ID" fieldSource="P_PAYMENT_METHOD_ID" required="True" caption="P PAYMENT METHOD ID" wizardCaption="P PAYMENT METHOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1P_PAYMENT_METHOD_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="402" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_PAYMENT_METHOD_TYPE_ID" fieldSource="P_PAYMENT_METHOD_TYPE_ID" required="False" caption="P PAYMENT METHOD TYPE ID" wizardCaption="P PAYMENT METHOD TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1P_PAYMENT_METHOD_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="420" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="CUST_ACC_PAYMENT_METHOD_ID" PathID="V_CUST_ACC_PAYMENT_METHOD1CUST_ACC_PAYMENT_METHOD_ID" fieldSource="CUST_ACC_PAYMENT_METHOD_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="421" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PAYMENT_METHOD_CODE" fieldSource="PAYMENT_METHOD_CODE" required="True" caption="PAYMENT METHOD CODE" wizardCaption="CUSTOMER NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1PAYMENT_METHOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="422" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PAYMENT_METHOD_TYPE_CODE" fieldSource="PAYMENT_METHOD_TYPE_CODE" required="False" caption="PAYMENT METHOD TYPE CODE" wizardCaption="LAST NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1PAYMENT_METHOD_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="423" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REFERENCE_NO" fieldSource="REFERENCE_NO" required="True" caption="REFERENCE NO" wizardCaption="CUSTOMER TITLE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1REFERENCE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="424" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="NEXT BILL DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="425" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="TERMINATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="426" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="427" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REFERENCE_NAME" fieldSource="REFERENCE_NAME" required="False" caption="REFERENCE NAME" wizardCaption="ACCOUNT NO" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1REFERENCE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="428" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BANK_NAME" fieldSource="BANK_NAME" required="False" caption="BANK NAME" wizardCaption="CUSTOMER NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1BANK_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="429" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="REF_VALID_FROM" fieldSource="REF_VALID_FROM" required="False" caption="REF VALID FROM" wizardCaption="START BILL DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1REF_VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="430" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="REF_VALID_TO" fieldSource="REF_VALID_TO" required="False" caption="REF VALID TO" wizardCaption="NEXT END BILL DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1REF_VALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="431" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" PathID="V_CUST_ACC_PAYMENT_METHOD1DESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="432" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUST_ACC_PAYMENT_METHOD1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="465" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_CUST_ACC_PAYMENT_METHOD1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="466" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_CUST_ACC_PAYMENT_METHOD1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="467" message="Save this record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="468" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_CUST_ACC_PAYMENT_METHOD1Button_Update" removeParameters="s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="469" message="Change this record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="470" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_CUST_ACC_PAYMENT_METHOD1Button_Delete" returnPage="cust_acc_payment_method.ccp" removeParameters="CUST_ACC_PAYMENT_METHOD_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="471" message="Delete this record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="507"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="508"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="509"/>
</Actions>
</Event>
<Event name="AfterExecuteUpdate" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="510"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="399" conditionType="Parameter" useIsNull="False" field="CUST_ACC_PAYMENT_METHOD_ID" parameterSource="CUST_ACC_PAYMENT_METHOD_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="449" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<SQLParameter id="450" variable="P_PAYMENT_METHOD_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_ID"/>
				<SQLParameter id="451" variable="P_PAYMENT_METHOD_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_TYPE_ID"/>
				<SQLParameter id="452" variable="CUST_ACC_PAYMENT_METHOD_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACC_PAYMENT_METHOD_ID"/>
				<SQLParameter id="455" variable="REFERENCE_NO" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NO"/>
				<SQLParameter id="456" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="457" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="458" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="459" variable="REFERENCE_NAME" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NAME"/>
				<SQLParameter id="460" variable="BANK_NAME" dataType="Text" parameterType="Control" parameterSource="BANK_NAME"/>
				<SQLParameter id="461" variable="REF_VALID_FROM" dataType="Date" parameterType="Control" parameterSource="REF_VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="462" variable="REF_VALID_TO" dataType="Date" parameterType="Control" parameterSource="REF_VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="463" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="464" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="433" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<CustomParameter id="434" field="P_PAYMENT_METHOD_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_ID"/>
				<CustomParameter id="435" field="P_PAYMENT_METHOD_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_TYPE_ID"/>
				<CustomParameter id="436" field="CUST_ACC_PAYMENT_METHOD_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACC_PAYMENT_METHOD_ID"/>
				<CustomParameter id="437" field="PAYMENT_METHOD_CODE" dataType="Text" parameterType="Control" parameterSource="PAYMENT_METHOD_CODE"/>
				<CustomParameter id="438" field="PAYMENT_METHOD_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="PAYMENT_METHOD_TYPE_CODE"/>
				<CustomParameter id="439" field="REFERENCE_NO" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NO"/>
				<CustomParameter id="440" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="441" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="442" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="443" field="REFERENCE_NAME" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NAME1"/>
				<CustomParameter id="444" field="BANK_NAME" dataType="Text" parameterType="Control" parameterSource="BANK_NAME"/>
				<CustomParameter id="445" field="REF_VALID_FROM" dataType="Date" parameterType="Control" parameterSource="REF_VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="446" field="REF_VALID_TO" dataType="Date" parameterType="Control" parameterSource="REF_VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="447" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="448" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="489" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<SQLParameter id="490" variable="P_PAYMENT_METHOD_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_ID"/>
				<SQLParameter id="491" variable="P_PAYMENT_METHOD_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_TYPE_ID"/>
				<SQLParameter id="492" variable="CUST_ACC_PAYMENT_METHOD_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACC_PAYMENT_METHOD_ID" defaultValue="0"/>
				<SQLParameter id="495" variable="REFERENCE_NO" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NO"/>
				<SQLParameter id="496" variable="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="497" variable="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="498" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="499" variable="REFERENCE_NAME" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NAME"/>
				<SQLParameter id="500" variable="BANK_NAME" dataType="Text" parameterType="Control" parameterSource="BANK_NAME"/>
				<SQLParameter id="501" variable="REF_VALID_FROM" dataType="Date" parameterType="Control" parameterSource="REF_VALID_FROM" format="dd-mmm-yyyy"/>
				<SQLParameter id="502" variable="REF_VALID_TO" dataType="Date" parameterType="Control" parameterSource="REF_VALID_TO" format="dd-mmm-yyyy"/>
				<SQLParameter id="503" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="504" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="472" conditionType="Parameter" useIsNull="False" field="CUST_ACC_PAYMENT_METHOD_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACC_PAYMENT_METHOD_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="473" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<CustomParameter id="474" field="P_PAYMENT_METHOD_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_ID"/>
				<CustomParameter id="475" field="P_PAYMENT_METHOD_TYPE_ID" dataType="Float" parameterType="Control" parameterSource="P_PAYMENT_METHOD_TYPE_ID"/>
				<CustomParameter id="476" field="CUST_ACC_PAYMENT_METHOD_ID" dataType="Float" parameterType="Control" parameterSource="CUST_ACC_PAYMENT_METHOD_ID"/>
				<CustomParameter id="477" field="PAYMENT_METHOD_CODE" dataType="Text" parameterType="Control" parameterSource="PAYMENT_METHOD_CODE"/>
				<CustomParameter id="478" field="PAYMENT_METHOD_TYPE_CODE" dataType="Text" parameterType="Control" parameterSource="PAYMENT_METHOD_TYPE_CODE"/>
				<CustomParameter id="479" field="REFERENCE_NO" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NO"/>
				<CustomParameter id="480" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="481" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="482" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="483" field="REFERENCE_NAME" dataType="Text" parameterType="Control" parameterSource="REFERENCE_NAME"/>
				<CustomParameter id="484" field="BANK_NAME" dataType="Text" parameterType="Control" parameterSource="BANK_NAME"/>
				<CustomParameter id="485" field="REF_VALID_FROM" dataType="Date" parameterType="Control" parameterSource="REF_VALID_FROM" format="dd-mmm-yyyy"/>
				<CustomParameter id="486" field="REF_VALID_TO" dataType="Date" parameterType="Control" parameterSource="REF_VALID_TO" format="dd-mmm-yyyy"/>
				<CustomParameter id="487" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="488" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="506" variable="CUST_ACC_PAYMENT_METHOD_ID" parameterType="URL" dataType="Float" parameterSource="CUST_ACC_PAYMENT_METHOD_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="505" conditionType="Parameter" useIsNull="False" field="CUST_ACC_PAYMENT_METHOD_ID" dataType="Float" parameterType="URL" parameterSource="CUST_ACC_PAYMENT_METHOD_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="cust_acc_payment_method_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="cust_acc_payment_method.php" forShow="True" url="cust_acc_payment_method.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="173"/>
			</Actions>
		</Event>
	</Events>
</Page>
