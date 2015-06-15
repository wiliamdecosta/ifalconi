<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Grid id="201" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT T_INVOICE_ID,
       INVOICE_NO,
       CUSTOMER_ACCOUNT_ID,
       ADDRESS,
       LAST_NAME,
       to_char(INVOICE_DATE,'dd-MON-yyyy') as INVOICE_DATE2,
       NPWP 
FROM paytv.T_INVOICE 
where  to_char(INVOICE_DATE,'dd-MON-yyyy') = '{INVOICE_DATE}'" name="T_BILL2" pageSizeLimit="100" wizardCaption=" T BILL " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="202" fieldSourceType="DBColumn" dataType="Float" html="False" name="T_INVOICE_ID" fieldSource="T_INVOICE_ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="T_BILL2T_INVOICE_ID" defaultValue="-99">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="205" fieldSourceType="DBColumn" dataType="Text" html="False" name="INVOICE_NO" fieldSource="INVOICE_NO" wizardCaption="SERVICE LINE NUMBER" wizardSize="30" wizardMaxLength="30" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="T_BILL2INVOICE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="206" fieldSourceType="DBColumn" dataType="Text" html="False" name="ADDRESS" fieldSource="ADDRESS" wizardCaption="SERVICE TYPE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="T_BILL2ADDRESS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="208" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID" wizardCaption="SUBSCRIBER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="T_BILL2CUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="209" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="210" fieldSourceType="DBColumn" dataType="Text" html="False" name="INVOICE_DATE2" PathID="T_BILL2INVOICE_DATE2" fieldSource="INVOICE_DATE2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="211" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" PathID="T_BILL2LAST_NAME" fieldSource="LAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="212" fieldSourceType="DBColumn" dataType="Text" html="False" name="NPWP" PathID="T_BILL2NPWP" fieldSource="NPWP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="213" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="T_BILL2DLink" hrefSource="t_invoice.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="T_INVOICE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="214" sourceType="DataField" name="T_INVOICE_ID" source="T_INVOICE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="215" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="T_BILL2ADLink" hrefSource="t_invoice.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="T_INVOICE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="216" sourceType="DataField" format="yyyy-mm-dd" name="T_INVOICE_ID" source="T_INVOICE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="219" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
						<Action actionName="Custom Code" actionCategory="General" id="220" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="221" variable="INVOICE_DATE" parameterType="URL" dataType="Text" parameterSource="INVOICE_DATE"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Grid id="225" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM paytv.t_line_invoice
where T_INVOICE_ID = {T_INVOICE_ID}
" name="V_T_DETAIL_BIL" pageSizeLimit="100" wizardCaption=" V T DETAIL BIL " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Label id="229" fieldSourceType="DBColumn" dataType="Float" html="False" name="T_LINE_INVOICE_ID" fieldSource="T_LINE_INVOICE_ID" wizardCaption="BILL COMPONENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_T_DETAIL_BILT_LINE_INVOICE_ID" defaultValue="-99">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="230" fieldSourceType="DBColumn" dataType="Float" html="False" name="SERVICE_NO" fieldSource="SERVICE_NO" wizardCaption="AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_T_DETAIL_BILSERVICE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="231" fieldSourceType="DBColumn" dataType="Date" html="False" name="DUE_DATE" fieldSource="DUE_DATE" wizardCaption="TAX AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_T_DETAIL_BILDUE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="232" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_T_DETAIL_BILSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="233" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Hidden id="227" fieldSourceType="DBColumn" dataType="Float" html="False" name="T_INVOICE_ID" fieldSource="T_INVOICE_ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_T_DETAIL_BILT_INVOICE_ID" visible="Yes" defaultValue="-99">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="245" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_T_DETAIL_BILDLink" hrefSource="t_invoice.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="INPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="246" sourceType="DataField" name="T_LINE_INVOICE_ID" source="T_LINE_INVOICE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="247" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="V_T_DETAIL_BILADLink" hrefSource="t_invoice.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="INPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="248" sourceType="DataField" format="yyyy-mm-dd" name="T_LINE_INVOICE_ID" source="T_LINE_INVOICE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="226" styles="Row;AltRow" name="rowStyle"/>
						<Action actionName="Custom Code" actionCategory="General" id="237"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="235" variable="T_INVOICE_ID" parameterType="URL" defaultValue="-99" dataType="Float" parameterSource="T_INVOICE_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="86" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_customer_account" errorSummator="Error" wizardCaption=" P Input File Desc " wizardFormMethod="post" PathID="p_customer_account" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_INPUT_FILE_DESC(P_INPUT_FILE_DESC_ID, P_INPUT_FILE_TYPE_ID, P_SERVICE_TYPE_ID, PROCEDURE_NAME, START_POSITION_NAME, END_POSITION_NAME, PARTIAL_FILE_NAME, START_DATA_POSITION, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
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
				<Label id="141" fieldSourceType="DBColumn" dataType="Text" html="False" name="INVOICE_DATE" PathID="p_customer_accountINVOICE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_PERIOD_CODE" PathID="p_customer_accountFINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="261" fieldSourceType="DBColumn" dataType="Text" name="invoice" PathID="p_customer_accountinvoice">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="262"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="263" fieldSourceType="DBColumn" dataType="Text" name="INPUT_DATA_CONTROL_ID" PathID="p_customer_accountINPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="264" fieldSourceType="DBColumn" dataType="Text" name="FINANCE_PERIOD_CODE2" PathID="p_customer_accountFINANCE_PERIOD_CODE2">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="265"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="88" conditionType="Parameter" useIsNull="False" field="P_INPUT_FILE_DESC_ID" parameterSource="P_INPUT_FILE_DESC_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
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
		<Grid id="238" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM paytv.VR_T_INVOICE_COMPONENT 
WHERE T_LINE_INVOICE_ID = {T_LINE_INVOICE_ID}" name="VR_T_INVOICE_COMPONENT" pageSizeLimit="100" wizardCaption=" VR T INVOICE COMPONENT " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Label id="240" fieldSourceType="DBColumn" dataType="Text" html="False" name="INV_COMP_CODE" fieldSource="INV_COMP_CODE" wizardCaption="INV COMP CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="VR_T_INVOICE_COMPONENTINV_COMP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="241" fieldSourceType="DBColumn" dataType="Text" html="False" name="CURRENCY_CODE" fieldSource="CURRENCY_CODE" wizardCaption="CURRENCY CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="VR_T_INVOICE_COMPONENTCURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="242" fieldSourceType="DBColumn" dataType="Float" html="False" name="VAT_AMOUNT" fieldSource="VAT_AMOUNT" wizardCaption="VAT AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="VR_T_INVOICE_COMPONENTVAT_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="243" fieldSourceType="DBColumn" dataType="Float" html="False" name="CHARGE_AMOUNT" fieldSource="CHARGE_AMOUNT" wizardCaption="CHARGE AMOUNT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="VR_T_INVOICE_COMPONENTCHARGE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="244" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Hidden id="251" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="T_LINE_INVOICE_ID" PathID="VR_T_INVOICE_COMPONENTT_LINE_INVOICE_ID" fieldSource="T_LINE_INVOICE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="253" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="T_INVOICE_COMPONENT_ID" PathID="VR_T_INVOICE_COMPONENTT_INVOICE_COMPONENT_ID" fieldSource="T_INVOICE_COMPONENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="255" fieldSourceType="DBColumn" dataType="Text" html="False" name="PAYMENT_CHARGE_AMT" PathID="VR_T_INVOICE_COMPONENTPAYMENT_CHARGE_AMT" fieldSource="PAYMENT_CHARGE_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="254" fieldSourceType="DBColumn" dataType="Text" html="False" name="CHRG_AMOUNT" PathID="VR_T_INVOICE_COMPONENTCHRG_AMOUNT">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="256" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="257" fieldSourceType="DBColumn" dataType="Text" html="False" name="VT_AMOUNT" PathID="VR_T_INVOICE_COMPONENTVT_AMOUNT">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="258" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="259" fieldSourceType="DBColumn" dataType="Text" html="False" name="PC_AMOUNT" PathID="VR_T_INVOICE_COMPONENTPC_AMOUNT">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="260"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="252"/>
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
				<SQLParameter id="250" variable="T_LINE_INVOICE_ID" parameterType="URL" defaultValue="-99" dataType="Float" parameterSource="T_LINE_INVOICE_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="t_invoice_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="t_invoice.php" forShow="True" url="t_invoice.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
