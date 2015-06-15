<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT *
FROM V_CUSTOMER_ACCOUNT
WHERE ( ACCOUNT_NO LIKE '%{s_keyword}%'
OR ADDRESS_1 LIKE '%{s_keyword}%'
OR CUSTOMER_SEGMENT_CODE LIKE '%{s_keyword}%'
OR CUSTOMER_TITLE_CODE LIKE '%{s_keyword}%'
OR CUSTOMER_NAME LIKE '%{s_keyword}%'
OR CUSTOMER_NUMBER LIKE '%{s_keyword}%'
OR CHARGING_METHOD_CODE LIKE '%{s_keyword}%'
OR BILL_PERIOD_UNIT_CODE LIKE '%{s_keyword}%'
OR REGION_NAME LIKE '%{s_keyword}%') " name="V_CUSTOMER_ACCOUNT" pageSizeLimit="100" wizardCaption=" V CUSTOMER ACCOUNT " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data tidak ditemukan" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" name="ACCOUNT_NO" fieldSource="ACCOUNT_NO" wizardCaption="ACCOUNT NO" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTACCOUNT_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="LAST_NAME" fieldSource="LAST_NAME" wizardCaption="LAST NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTLAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="52" fieldSourceType="DBColumn" dataType="Text" html="False" name="ADDRESS_1" fieldSource="ADDRESS_1" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTADDRESS_1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="100" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_SEGMENT_CODE" fieldSource="CUSTOMER_SEGMENT_CODE" wizardCaption="CUSTOMER SEGMENT CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTCUSTOMER_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="110" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" wizardCaption="BILL PERIOD UNIT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTBILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="112" fieldSourceType="DBColumn" dataType="Text" html="False" name="CHARGING_METHOD_CODE" fieldSource="CHARGING_METHOD_CODE" wizardCaption="CHARGING METHOD CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTCHARGING_METHOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="116" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NUMBER" fieldSource="CUSTOMER_NUMBER" wizardCaption="CUSTOMER NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTCUSTOMER_NUMBER">
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
				<Hidden id="38" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID" wizardCaption="CUSTOMER ACCOUNT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTCUSTOMER_ACCOUNT_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="42" fieldSourceType="DBColumn" dataType="Float" html="False" name="CUSTOMER_ID" fieldSource="CUSTOMER_ID" wizardCaption="CUSTOMER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTCUSTOMER_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="46" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_CUSTOMER_SEGMENT_ID" fieldSource="P_CUSTOMER_SEGMENT_ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTP_CUSTOMER_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="48" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_CUSTOMER_TITLE_ID" fieldSource="P_CUSTOMER_TITLE_ID" wizardCaption="P CUSTOMER TITLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTP_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="54" fieldSourceType="DBColumn" dataType="Text" html="False" name="ADDRESS_2" fieldSource="ADDRESS_2" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTADDRESS_2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" name="ADDRESS_3" fieldSource="ADDRESS_3" wizardCaption="ADDRESS 3" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTADDRESS_3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="58" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_REGION_ID" fieldSource="P_REGION_ID" wizardCaption="P REGION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTP_REGION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="104" fieldSourceType="DBColumn" dataType="Text" html="False" name="REGION_NAME" fieldSource="REGION_NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTREGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="102" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_TITLE_CODE" fieldSource="CUSTOMER_TITLE_CODE" wizardCaption="CUSTOMER TITLE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTCUSTOMER_TITLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="114" fieldSourceType="DBColumn" dataType="Text" html="False" name="CUSTOMER_NAME" fieldSource="CUSTOMER_NAME" wizardCaption="CUSTOMER NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTCUSTOMER_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="60" fieldSourceType="DBColumn" dataType="Float" html="False" name="ZIP_CODE" fieldSource="ZIP_CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="64" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_BILL_CYCLE_ID" fieldSource="P_BILL_CYCLE_ID" wizardCaption="P BILL CYCLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTP_BILL_CYCLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="62" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_CURRENCY_ID" fieldSource="P_CURRENCY_ID" wizardCaption="P CURRENCY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTP_CURRENCY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="68" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" wizardCaption="P BILLING PERIOD UNIT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTP_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="72" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_CHARGING_METHOD_ID" fieldSource="P_CHARGING_METHOD_ID" wizardCaption="P CHARGING METHOD ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_CUSTOMER_ACCOUNTP_CHARGING_METHOD_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="80" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_CUSTOMER_ACCOUNTDLink" hrefSource="customer_account.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="81" sourceType="DataField" name="CUSTOMER_ACCOUNT_ID" source="CUSTOMER_ACCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="82" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="V_CUSTOMER_ACCOUNTADLink" hrefSource="customer_account.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="CUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="83" sourceType="DataField" format="yyyy-mm-dd" name="CUSTOMER_ACCOUNT_ID" source="CUSTOMER_ACCOUNT_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="V_P_CUSTOMER_ACCOUNT_Insert" hrefSource="customer_account.ccp" removeParameters="CUSTOMER_ACCOUNT_ID" wizardThemeItem="FooterA" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNTV_P_CUSTOMER_ACCOUNT_Insert">
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
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="V_CUSTOMER_ACCOUNTSearch" wizardCaption=" V CUSTOMER ACCOUNT " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="customer_account.ccp" PathID="V_CUSTOMER_ACCOUNTSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" PathID="V_CUSTOMER_ACCOUNTSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="V_CUSTOMER_ACCOUNTSearchButton_DoSearch">
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
		<Record id="118" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_CUSTOMER_ACCOUNT1" dataSource="V_CUSTOMER_ACCOUNT" errorSummator="Error" wizardCaption=" V CUSTOMER ACCOUNT " wizardFormMethod="post" PathID="V_CUSTOMER_ACCOUNT1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" customInsert="/* Formatted on 27/09/2014 12:23:26 (QP5 v5.139.911.3011) */
INSERT INTO CUSTOMER_ACCOUNT (CUSTOMER_ACCOUNT_ID,ACCOUNT_NO,
                                      CUSTOMER_ID,LAST_NAME,P_CUSTOMER_SEGMENT_ID,
                                      P_CUSTOMER_TITLE_ID,NPWP,ADDRESS_1,ADDRESS_2,
                                      ADDRESS_3,P_REGION_ID,ZIP_CODE,P_CURRENCY_ID,
                                      P_BILL_CYCLE_ID,CCDB_CODE,P_BILLING_PERIOD_UNIT_ID,
                                      BILLING_UNIT,P_CHARGING_METHOD_ID,START_BILL_DATE,
                                      NEXT_BILL_DATE,MAX_CREDIT_AMT,TERMINATION_DATE,
                                      TOTAL_BILLED_AMT,TOTAL_PAID_AMT,LAST_BILLED_AMT,
                                      LAST_PAID_AMT,MIN_CHARGE,NEXT_END_BILL_DATE,
                                      CREATION_DATE,UPDATE_DATE,UPDATE_BY)
     VALUES (CUSTACC_SEQ.NEXTVAL,'{ACCOUNT_NO}',{CUSTOMER_ID},
                  '{LAST_NAME}',{P_CUSTOMER_SEGMENT_ID},
                  {P_CUSTOMER_TITLE_ID},'{NPWP}','{ADDRESS_1}','{ADDRESS_2}',
                  '{ADDRESS_3}',{P_REGION_ID},{ZIP_CODE},{P_CURRENCY_ID},
                  {P_BILL_CYCLE_ID},'{CCDB_CODE}',{P_BILLING_PERIOD_UNIT_ID},
                  {BILLING_UNIT},{P_CHARGING_METHOD_ID},to_date(substr('{START_BILL_DATE}',1,10),'yyyy/mm/dd'),
                  to_date(substr('{NEXT_BILL_DATE}',1,10),'yyyy/mm/dd'),{MAX_CREDIT_AMT},to_date(substr('{TERMINATION_DATE}',1,10),'yyyy/mm/dd'),
                  {TOTAL_BILLED_AMT},{TOTAL_PAID_AMT},{LAST_BILLED_AMT},
                  {LAST_PAID_AMT},{MIN_CHARGE},to_date(substr('{NEXT_END_BILL_DATE}',1,10),'yyyy/mm/dd'),
                  SYSDATE,SYSDATE,'{UPDATE_BY}')" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customUpdateType="SQL" customUpdate="/* Formatted on 29/09/2014 11:11:51 (QP5 v5.139.911.3011) */
UPDATE CUSTOMER_ACCOUNT
   SET 	ACCOUNT_NO='{ACCOUNT_NO}',
		CUSTOMER_ID={CUSTOMER_ID},
		LAST_NAME='{LAST_NAME}',
		P_CUSTOMER_SEGMENT_ID={P_CUSTOMER_SEGMENT_ID},
		P_CUSTOMER_TITLE_ID={P_CUSTOMER_TITLE_ID},
		NPWP='{NPWP}',
		ADDRESS_1='{ADDRESS_1}',
		ADDRESS_2='{ADDRESS_2}',
		ADDRESS_3='{ADDRESS_3}',
		P_REGION_ID={P_REGION_ID},
		ZIP_CODE={ZIP_CODE},
		P_CURRENCY_ID={P_CURRENCY_ID},
		P_BILL_CYCLE_ID={P_BILL_CYCLE_ID},
		CCDB_CODE='{CCDB_CODE}',
		P_BILLING_PERIOD_UNIT_ID={P_BILLING_PERIOD_UNIT_ID},
		BILLING_UNIT={BILLING_UNIT},
		P_CHARGING_METHOD_ID={P_CHARGING_METHOD_ID},
		START_BILL_DATE=to_date(substr('{START_BILL_DATE}',1,10),'yyyy/mm/dd'),
		NEXT_BILL_DATE=to_date(substr('{NEXT_BILL_DATE}',1,10),'yyyy/mm/dd'),
		MAX_CREDIT_AMT={MAX_CREDIT_AMT},
		TERMINATION_DATE=to_date(substr('{TERMINATION_DATE}',1,10),'yyyy/mm/dd'),
		TOTAL_BILLED_AMT={TOTAL_BILLED_AMT},
		TOTAL_PAID_AMT={TOTAL_PAID_AMT},
		LAST_BILLED_AMT={LAST_BILLED_AMT},
		LAST_PAID_AMT={LAST_PAID_AMT},
		MIN_CHARGE={MIN_CHARGE},
		NEXT_END_BILL_DATE=to_date(substr('{NEXT_END_BILL_DATE}',1,10),'yyyy/mm/dd'),
		UPDATE_DATE=SYSDATE,
		UPDATE_BY='{UPDATE_BY}' 
 WHERE  CUSTOMER_ACCOUNT_ID = {CUSTOMER_ACCOUNT_ID}" customDeleteType="SQL" customDelete="DELETE FROM CUSTOMER_ACCOUNT 
WHERE  CUSTOMER_ACCOUNT_ID = {CUSTOMER_ACCOUNT_ID}">
			<Components>
				<Button id="119" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_CUSTOMER_ACCOUNT1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="333" message="Save this record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="120" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_CUSTOMER_ACCOUNT1Button_Update" removeParameters="s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="334" message="Change this record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="121" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_CUSTOMER_ACCOUNT1Button_Delete" returnPage="customer_account.ccp">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="122" message="Delete this record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="123" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_CUSTOMER_ACCOUNT1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_AR_SEGMENTPage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_1" fieldSource="ADDRESS_1" required="True" caption="ADDRESS 1" wizardCaption="ADDRESS 1" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1ADDRESS_1">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="132" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_2" fieldSource="ADDRESS_2" required="False" caption="ADDRESS 2" wizardCaption="ADDRESS 2" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1ADDRESS_2">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ADDRESS_3" fieldSource="ADDRESS_3" required="False" caption="ADDRESS 3" wizardCaption="ADDRESS 3" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1ADDRESS_3">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="ZIP_CODE" fieldSource="ZIP_CODE" required="False" caption="ZIP CODE" wizardCaption="ZIP CODE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1ZIP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CCDB_CODE" fieldSource="CCDB_CODE" required="False" caption="CCDB CODE" wizardCaption="CCDB CODE" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CCDB_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="140" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="BILLING_UNIT" fieldSource="BILLING_UNIT" required="True" caption="BILLING UNIT" wizardCaption="BILLING UNIT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1BILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="144" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="NEXT_BILL_DATE" fieldSource="NEXT_BILL_DATE" required="False" caption="NEXT BILL DATE" wizardCaption="NEXT BILL DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1NEXT_BILL_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="147" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TERMINATION_DATE" fieldSource="TERMINATION_DATE" required="False" caption="TERMINATION DATE" wizardCaption="TERMINATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1TERMINATION_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="150" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="TOTAL_PAID_AMT" fieldSource="TOTAL_PAID_AMT" required="False" caption="TOTAL PAID AMT" wizardCaption="TOTAL PAID AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1TOTAL_PAID_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="152" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LAST_PAID_AMT" fieldSource="LAST_PAID_AMT" required="False" caption="LAST PAID AMT" wizardCaption="LAST PAID AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1LAST_PAID_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="NEXT_END_BILL_DATE" fieldSource="NEXT_END_BILL_DATE" required="False" caption="NEXT END BILL DATE" wizardCaption="NEXT END BILL DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1NEXT_END_BILL_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="158" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="162" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_TITLE_CODE" fieldSource="CUSTOMER_TITLE_CODE" required="True" caption="CUSTOMER TITLE CODE" wizardCaption="CUSTOMER TITLE CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CUSTOMER_TITLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="163" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REGION_NAME" fieldSource="REGION_NAME" required="False" caption="REGION NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="165" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_CYCLE_CODE" fieldSource="BILL_CYCLE_CODE" required="True" caption="BILL CYCLE CODE" wizardCaption="BILL CYCLE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1BILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="168" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_NAME" fieldSource="CUSTOMER_NAME" required="True" caption="CUSTOMER NAME" wizardCaption="CUSTOMER NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CUSTOMER_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ACCOUNT_NO" fieldSource="ACCOUNT_NO" required="True" caption="ACCOUNT NO" wizardCaption="ACCOUNT NO" wizardSize="20" wizardMaxLength="20" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1ACCOUNT_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="175" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ACCOUNT_ID" PathID="V_CUSTOMER_ACCOUNT1CUSTOMER_ACCOUNT_ID" fieldSource="CUSTOMER_ACCOUNT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="169" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_NUMBER" fieldSource="CUSTOMER_NUMBER" required="True" caption="CUSTOMER NUMBER" wizardCaption="CUSTOMER NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CUSTOMER_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CUSTOMER_SEGMENT_ID" fieldSource="P_CUSTOMER_SEGMENT_ID" required="True" caption="P CUSTOMER SEGMENT ID" wizardCaption="P CUSTOMER SEGMENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1P_CUSTOMER_SEGMENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="161" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_SEGMENT_CODE" fieldSource="CUSTOMER_SEGMENT_CODE" required="True" caption="CUSTOMER SEGMENT CODE" wizardCaption="CUSTOMER SEGMENT CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CUSTOMER_SEGMENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LAST_NAME" fieldSource="LAST_NAME" required="True" caption="LAST NAME" wizardCaption="LAST NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1LAST_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILL_CYCLE_ID" fieldSource="P_BILL_CYCLE_ID" required="True" caption="P BILL CYCLE ID" wizardCaption="P BILL CYCLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1P_BILL_CYCLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NPWP" fieldSource="NPWP" required="False" caption="NPWP" wizardCaption="NPWP" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1NPWP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="164" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CURRENCY_CODE" fieldSource="CURRENCY_CODE" required="True" caption="CURRENCY CODE" wizardCaption="CURRENCY CODE" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="166" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE" required="True" caption="BILL PERIOD UNIT CODE" wizardCaption="BILL PERIOD UNIT CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1BILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="139" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BILLING_PERIOD_UNIT_ID" fieldSource="P_BILLING_PERIOD_UNIT_ID" required="True" caption="P BILLING PERIOD UNIT ID" wizardCaption="P BILLING PERIOD UNIT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1P_BILLING_PERIOD_UNIT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="167" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CHARGING_METHOD_CODE" fieldSource="CHARGING_METHOD_CODE" required="False" caption="CHARGING METHOD CODE" wizardCaption="CHARGING METHOD CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CHARGING_METHOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="142" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="START_BILL_DATE" fieldSource="START_BILL_DATE" required="False" caption="START BILL DATE" wizardCaption="START BILL DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1START_BILL_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="146" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="MAX_CREDIT_AMT" fieldSource="MAX_CREDIT_AMT" required="False" caption="MAX CREDIT AMT" wizardCaption="MAX CREDIT AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1MAX_CREDIT_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="149" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="TOTAL_BILLED_AMT" fieldSource="TOTAL_BILLED_AMT" required="False" caption="TOTAL BILLED AMT" wizardCaption="TOTAL BILLED AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1TOTAL_BILLED_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="153" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="MIN_CHARGE" fieldSource="MIN_CHARGE" required="False" caption="MIN CHARGE" wizardCaption="MIN CHARGE" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1MIN_CHARGE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="156" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="160" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_CUSTOMER_ACCOUNT1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="176" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LAST_BILLED_AMT" PathID="V_CUSTOMER_ACCOUNT1LAST_BILLED_AMT" fieldSource="LAST_BILLED_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="177" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CUSTOMER_TITLE_ID" PathID="V_CUSTOMER_ACCOUNT1P_CUSTOMER_TITLE_ID" fieldSource="P_CUSTOMER_TITLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CUSTOMER_ID" PathID="V_CUSTOMER_ACCOUNT1CUSTOMER_ID" fieldSource="CUSTOMER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="179" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CURRENCY_ID" PathID="V_CUSTOMER_ACCOUNT1P_CURRENCY_ID" fieldSource="P_CURRENCY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CHARGING_METHOD_ID" PathID="V_CUSTOMER_ACCOUNT1P_CHARGING_METHOD_ID" fieldSource="P_CHARGING_METHOD_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="249" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_REGION_ID" PathID="V_CUSTOMER_ACCOUNT1P_REGION_ID" fieldSource="P_REGION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="124" conditionType="Parameter" useIsNull="False" field="CUSTOMER_ACCOUNT_ID" parameterSource="CUSTOMER_ACCOUNT_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="220" variable="CUSTOMER_ACCOUNT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<SQLParameter id="221" variable="ACCOUNT_NO" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ACCOUNT_NO"/>
				<SQLParameter id="222" variable="CUSTOMER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="CUSTOMER_ID"/>
				<SQLParameter id="223" variable="LAST_NAME" parameterType="Control" dataType="Text" parameterSource="LAST_NAME"/>
				<SQLParameter id="224" variable="P_CUSTOMER_SEGMENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<SQLParameter id="225" variable="P_CUSTOMER_TITLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CUSTOMER_TITLE_ID"/>
				<SQLParameter id="226" variable="NPWP" parameterType="Control" dataType="Text" parameterSource="NPWP"/>
				<SQLParameter id="227" variable="ADDRESS_1" parameterType="Control" dataType="Text" parameterSource="ADDRESS_1"/>
				<SQLParameter id="228" variable="ADDRESS_2" parameterType="Control" dataType="Text" parameterSource="ADDRESS_2"/>
				<SQLParameter id="229" variable="ADDRESS_3" parameterType="Control" dataType="Text" parameterSource="ADDRESS_3"/>
				<SQLParameter id="230" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
				<SQLParameter id="231" variable="ZIP_CODE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="ZIP_CODE"/>
				<SQLParameter id="232" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
				<SQLParameter id="233" variable="P_BILL_CYCLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_CYCLE_ID"/>
				<SQLParameter id="234" variable="CCDB_CODE" parameterType="Control" dataType="Text" parameterSource="CCDB_CODE"/>
				<SQLParameter id="235" variable="P_BILLING_PERIOD_UNIT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<SQLParameter id="236" variable="BILLING_UNIT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="BILLING_UNIT"/>
				<SQLParameter id="237" variable="P_CHARGING_METHOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CHARGING_METHOD_ID"/>
				<SQLParameter id="238" variable="START_BILL_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" format="dd-mmm-yyyy" parameterSource="START_BILL_DATE"/>
				<SQLParameter id="239" variable="NEXT_BILL_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="NEXT_BILL_DATE"/>
				<SQLParameter id="240" variable="MAX_CREDIT_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="MAX_CREDIT_AMT"/>
				<SQLParameter id="241" variable="TERMINATION_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="TERMINATION_DATE"/>
				<SQLParameter id="242" variable="TOTAL_BILLED_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TOTAL_BILLED_AMT"/>
				<SQLParameter id="243" variable="TOTAL_PAID_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TOTAL_PAID_AMT"/>
				<SQLParameter id="244" variable="LAST_BILLED_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LAST_BILLED_AMT"/>
				<SQLParameter id="245" variable="LAST_PAID_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LAST_PAID_AMT"/>
				<SQLParameter id="246" variable="MIN_CHARGE" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="MIN_CHARGE"/>
				<SQLParameter id="247" variable="NEXT_END_BILL_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="NEXT_END_BILL_DATE"/>
				<SQLParameter id="248" variable="UPDATE_BY" parameterType="Session" dataType="Text" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="181" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1" omitIfEmpty="True"/>
				<CustomParameter id="182" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2" omitIfEmpty="True"/>
				<CustomParameter id="183" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3" omitIfEmpty="True"/>
				<CustomParameter id="184" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE" omitIfEmpty="True"/>
				<CustomParameter id="185" field="CCDB_CODE" dataType="Text" parameterType="Control" parameterSource="CCDB_CODE" omitIfEmpty="True"/>
				<CustomParameter id="186" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT" omitIfEmpty="True"/>
				<CustomParameter id="187" field="NEXT_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_BILL_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="188" field="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="189" field="TOTAL_PAID_AMT" dataType="Float" parameterType="Control" parameterSource="TOTAL_PAID_AMT" omitIfEmpty="True"/>
				<CustomParameter id="190" field="LAST_PAID_AMT" dataType="Float" parameterType="Control" parameterSource="LAST_PAID_AMT" omitIfEmpty="True"/>
				<CustomParameter id="191" field="NEXT_END_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_END_BILL_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="192" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="193" field="CUSTOMER_TITLE_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_TITLE_CODE" omitIfEmpty="True"/>
				<CustomParameter id="194" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME" omitIfEmpty="True"/>
				<CustomParameter id="195" field="BILL_CYCLE_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_CYCLE_CODE" omitIfEmpty="True"/>
				<CustomParameter id="196" field="CUSTOMER_NAME" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NAME" omitIfEmpty="True"/>
				<CustomParameter id="197" field="ACCOUNT_NO" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NO" omitIfEmpty="True"/>
				<CustomParameter id="198" field="CUSTOMER_ACCOUNT_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID" omitIfEmpty="True"/>
				<CustomParameter id="199" field="CUSTOMER_NUMBER" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NUMBER" omitIfEmpty="True"/>
				<CustomParameter id="200" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID" omitIfEmpty="True"/>
				<CustomParameter id="201" field="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE" omitIfEmpty="True"/>
				<CustomParameter id="202" field="LAST_NAME" dataType="Text" parameterType="Control" parameterSource="LAST_NAME" omitIfEmpty="True"/>
				<CustomParameter id="203" field="P_BILL_CYCLE_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_CYCLE_ID" omitIfEmpty="True"/>
				<CustomParameter id="204" field="NPWP" dataType="Text" parameterType="Control" parameterSource="NPWP" omitIfEmpty="True"/>
				<CustomParameter id="205" field="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE" omitIfEmpty="True"/>
				<CustomParameter id="206" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE" omitIfEmpty="True"/>
				<CustomParameter id="207" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID" omitIfEmpty="True"/>
				<CustomParameter id="208" field="CHARGING_METHOD_CODE" dataType="Text" parameterType="Control" parameterSource="CHARGING_METHOD_CODE" omitIfEmpty="True"/>
				<CustomParameter id="209" field="START_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="START_BILL_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="210" field="MAX_CREDIT_AMT" dataType="Float" parameterType="Control" parameterSource="MAX_CREDIT_AMT" omitIfEmpty="True"/>
				<CustomParameter id="211" field="TOTAL_BILLED_AMT" dataType="Float" parameterType="Control" parameterSource="TOTAL_BILLED_AMT" omitIfEmpty="True"/>
				<CustomParameter id="212" field="MIN_CHARGE" dataType="Float" parameterType="Control" parameterSource="MIN_CHARGE" omitIfEmpty="True"/>
				<CustomParameter id="213" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="214" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY" omitIfEmpty="True"/>
				<CustomParameter id="215" field="LAST_BILLED_AMT" dataType="Float" parameterType="Control" parameterSource="LAST_BILLED_AMT" omitIfEmpty="True"/>
				<CustomParameter id="216" field="P_CUSTOMER_TITLE_ID" dataType="Text" parameterType="Control" parameterSource="P_CUSTOMER_TITLE_ID" omitIfEmpty="True"/>
				<CustomParameter id="217" field="CUSTOMER_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ID" omitIfEmpty="True"/>
				<CustomParameter id="218" field="P_CURRENCY_ID" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_ID" omitIfEmpty="True"/>
				<CustomParameter id="219" field="P_CHARGING_METHOD_ID" dataType="Text" parameterType="Control" parameterSource="P_CHARGING_METHOD_ID" omitIfEmpty="True"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="291" variable="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
				<SQLParameter id="292" variable="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
				<SQLParameter id="293" variable="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
				<SQLParameter id="294" variable="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
				<SQLParameter id="295" variable="CCDB_CODE" dataType="Text" parameterType="Control" parameterSource="CCDB_CODE"/>
				<SQLParameter id="296" variable="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
				<SQLParameter id="297" variable="NEXT_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_BILL_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="298" variable="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="299" variable="TOTAL_PAID_AMT" dataType="Float" parameterType="Control" parameterSource="TOTAL_PAID_AMT"/>
				<SQLParameter id="300" variable="LAST_PAID_AMT" dataType="Float" parameterType="Control" parameterSource="LAST_PAID_AMT"/>
				<SQLParameter id="301" variable="NEXT_END_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_END_BILL_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="302" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="303" variable="CUSTOMER_TITLE_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_TITLE_CODE"/>
				<SQLParameter id="304" variable="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
				<SQLParameter id="305" variable="BILL_CYCLE_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_CYCLE_CODE"/>
				<SQLParameter id="306" variable="CUSTOMER_NAME" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NAME"/>
				<SQLParameter id="307" variable="ACCOUNT_NO" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NO"/>
				<SQLParameter id="308" variable="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_ACCOUNT_ID" defaultValue="0"/>
				<SQLParameter id="309" variable="CUSTOMER_NUMBER" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NUMBER"/>
				<SQLParameter id="310" variable="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<SQLParameter id="311" variable="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE"/>
				<SQLParameter id="312" variable="LAST_NAME" dataType="Text" parameterType="Control" parameterSource="LAST_NAME"/>
				<SQLParameter id="313" variable="P_BILL_CYCLE_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_CYCLE_ID"/>
				<SQLParameter id="314" variable="NPWP" dataType="Text" parameterType="Control" parameterSource="NPWP"/>
				<SQLParameter id="315" variable="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE"/>
				<SQLParameter id="316" variable="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
				<SQLParameter id="317" variable="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<SQLParameter id="318" variable="CHARGING_METHOD_CODE" dataType="Text" parameterType="Control" parameterSource="CHARGING_METHOD_CODE"/>
				<SQLParameter id="319" variable="START_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="START_BILL_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="320" variable="MAX_CREDIT_AMT" dataType="Float" parameterType="Control" parameterSource="MAX_CREDIT_AMT"/>
				<SQLParameter id="321" variable="TOTAL_BILLED_AMT" dataType="Float" parameterType="Control" parameterSource="TOTAL_BILLED_AMT"/>
				<SQLParameter id="322" variable="MIN_CHARGE" dataType="Float" parameterType="Control" parameterSource="MIN_CHARGE"/>
				<SQLParameter id="324" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="325" variable="LAST_BILLED_AMT" dataType="Float" parameterType="Control" parameterSource="LAST_BILLED_AMT"/>
				<SQLParameter id="326" variable="P_CUSTOMER_TITLE_ID" dataType="Text" parameterType="Control" parameterSource="P_CUSTOMER_TITLE_ID"/>
				<SQLParameter id="327" variable="CUSTOMER_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ID"/>
				<SQLParameter id="328" variable="P_CURRENCY_ID" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
				<SQLParameter id="329" variable="P_CHARGING_METHOD_ID" dataType="Text" parameterType="Control" parameterSource="P_CHARGING_METHOD_ID"/>
				<SQLParameter id="330" variable="P_REGION_ID" dataType="Text" parameterType="Control" parameterSource="P_REGION_ID"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="250" conditionType="Parameter" useIsNull="False" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_ACCOUNT_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="251" field="ADDRESS_1" dataType="Text" parameterType="Control" parameterSource="ADDRESS_1"/>
				<CustomParameter id="252" field="ADDRESS_2" dataType="Text" parameterType="Control" parameterSource="ADDRESS_2"/>
				<CustomParameter id="253" field="ADDRESS_3" dataType="Text" parameterType="Control" parameterSource="ADDRESS_3"/>
				<CustomParameter id="254" field="ZIP_CODE" dataType="Float" parameterType="Control" parameterSource="ZIP_CODE"/>
				<CustomParameter id="255" field="CCDB_CODE" dataType="Text" parameterType="Control" parameterSource="CCDB_CODE"/>
				<CustomParameter id="256" field="BILLING_UNIT" dataType="Float" parameterType="Control" parameterSource="BILLING_UNIT"/>
				<CustomParameter id="257" field="NEXT_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_BILL_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="258" field="TERMINATION_DATE" dataType="Date" parameterType="Control" parameterSource="TERMINATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="259" field="TOTAL_PAID_AMT" dataType="Float" parameterType="Control" parameterSource="TOTAL_PAID_AMT"/>
				<CustomParameter id="260" field="LAST_PAID_AMT" dataType="Float" parameterType="Control" parameterSource="LAST_PAID_AMT"/>
				<CustomParameter id="261" field="NEXT_END_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="NEXT_END_BILL_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="262" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="263" field="CUSTOMER_TITLE_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_TITLE_CODE"/>
				<CustomParameter id="264" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
				<CustomParameter id="265" field="BILL_CYCLE_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_CYCLE_CODE"/>
				<CustomParameter id="266" field="CUSTOMER_NAME" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NAME"/>
				<CustomParameter id="267" field="ACCOUNT_NO" dataType="Text" parameterType="Control" parameterSource="ACCOUNT_NO"/>
				<CustomParameter id="268" field="CUSTOMER_ACCOUNT_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ACCOUNT_ID"/>
				<CustomParameter id="269" field="CUSTOMER_NUMBER" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_NUMBER"/>
				<CustomParameter id="270" field="P_CUSTOMER_SEGMENT_ID" dataType="Float" parameterType="Control" parameterSource="P_CUSTOMER_SEGMENT_ID"/>
				<CustomParameter id="271" field="CUSTOMER_SEGMENT_CODE" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_SEGMENT_CODE"/>
				<CustomParameter id="272" field="LAST_NAME" dataType="Text" parameterType="Control" parameterSource="LAST_NAME"/>
				<CustomParameter id="273" field="P_BILL_CYCLE_ID" dataType="Float" parameterType="Control" parameterSource="P_BILL_CYCLE_ID"/>
				<CustomParameter id="274" field="NPWP" dataType="Text" parameterType="Control" parameterSource="NPWP"/>
				<CustomParameter id="275" field="CURRENCY_CODE" dataType="Text" parameterType="Control" parameterSource="CURRENCY_CODE"/>
				<CustomParameter id="276" field="BILL_PERIOD_UNIT_CODE" dataType="Text" parameterType="Control" parameterSource="BILL_PERIOD_UNIT_CODE"/>
				<CustomParameter id="277" field="P_BILLING_PERIOD_UNIT_ID" dataType="Float" parameterType="Control" parameterSource="P_BILLING_PERIOD_UNIT_ID"/>
				<CustomParameter id="278" field="CHARGING_METHOD_CODE" dataType="Text" parameterType="Control" parameterSource="CHARGING_METHOD_CODE"/>
				<CustomParameter id="279" field="START_BILL_DATE" dataType="Date" parameterType="Control" parameterSource="START_BILL_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="280" field="MAX_CREDIT_AMT" dataType="Float" parameterType="Control" parameterSource="MAX_CREDIT_AMT"/>
				<CustomParameter id="281" field="TOTAL_BILLED_AMT" dataType="Float" parameterType="Control" parameterSource="TOTAL_BILLED_AMT"/>
				<CustomParameter id="282" field="MIN_CHARGE" dataType="Float" parameterType="Control" parameterSource="MIN_CHARGE"/>
				<CustomParameter id="283" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="284" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="285" field="LAST_BILLED_AMT" dataType="Float" parameterType="Control" parameterSource="LAST_BILLED_AMT"/>
				<CustomParameter id="286" field="P_CUSTOMER_TITLE_ID" dataType="Text" parameterType="Control" parameterSource="P_CUSTOMER_TITLE_ID"/>
				<CustomParameter id="287" field="CUSTOMER_ID" dataType="Text" parameterType="Control" parameterSource="CUSTOMER_ID"/>
				<CustomParameter id="288" field="P_CURRENCY_ID" dataType="Text" parameterType="Control" parameterSource="P_CURRENCY_ID"/>
				<CustomParameter id="289" field="P_CHARGING_METHOD_ID" dataType="Text" parameterType="Control" parameterSource="P_CHARGING_METHOD_ID"/>
				<CustomParameter id="290" field="P_REGION_ID" dataType="Text" parameterType="Control" parameterSource="P_REGION_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="332" variable="CUSTOMER_ACCOUNT_ID" parameterType="URL" dataType="Float" parameterSource="CUSTOMER_ACCOUNT_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="331" conditionType="Parameter" useIsNull="False" field="CUSTOMER_ACCOUNT_ID" dataType="Float" parameterType="URL" parameterSource="CUSTOMER_ACCOUNT_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="customer_account_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="customer_account.php" forShow="True" url="customer_account.php" comment="//" codePage="windows-1252"/>
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
