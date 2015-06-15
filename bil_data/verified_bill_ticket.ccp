<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="sikm" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" name="ENTRY_BILL_TICKET" pageSizeLimit="100" wizardCaption="List of P APP ROLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList" dataSource="SELECT *
FROM V_T_BILL_TICKET
WHERE VERIFICATION_DATE IS NOT NULL AND (UPPER(to_char(TICKET_DATE,'dd-MON-yyyy')) LIKE UPPER('%{s_keyword}%') OR
	UPPER(SERVICE_NO) LIKE UPPER('%{s_keyword}%') OR
	UPPER(SERVICE_TYPE_CODE) LIKE UPPER('%{s_keyword}%') OR
	UPPER(SUBSCRIPTION_NAME) LIKE UPPER('%{s_keyword}%') OR
	UPPER(BILL_TICKET_CODE) LIKE UPPER('%{s_keyword}%') OR
	UPPER(CURRENCY_CODE) LIKE UPPER('%{s_keyword}%') OR
	UPPER(TICKET_AMOUNT) LIKE UPPER('%{s_keyword}%') OR
	UPPER(TICKET_REASON_CODE) LIKE UPPER('%{s_keyword}%') OR
	UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%'))">
			<Components>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="SUBSCRIPTION_NAME" fieldSource="SUBSCRIPTION_NAME" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ENTRY_BILL_TICKETSUBSCRIPTION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="CURRENCY_CODE" fieldSource="CURRENCY_CODE" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ENTRY_BILL_TICKETCURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="18" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="True" wizardHideDisabled="True" wizardOfText="of" wizardPageSize="False" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="50"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="52" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="ENTRY_BILL_TICKETDLink" hrefSource="verified_bill_ticket.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="T_BILL_TICKET_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="235" sourceType="DataField" name="T_BILL_TICKET_ID" source="T_BILL_TICKET_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="54" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="ENTRY_BILL_TICKETADLink" hrefSource="verified_bill_ticket.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="T_BILL_TICKET_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="236" sourceType="DataField" name="T_BILL_TICKET_ID" source="T_BILL_TICKET_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="230" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="ENTRY_BILL_TICKETSERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="185" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_NO" fieldSource="SERVICE_NO" PathID="ENTRY_BILL_TICKETSERVICE_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="271" fieldSourceType="DBColumn" dataType="Date" html="False" name="TICKET_DATE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ENTRY_BILL_TICKETTICKET_DATE" fieldSource="TICKET_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="272" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_TICKET_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ENTRY_BILL_TICKETBILL_TICKET_CODE" fieldSource="BILL_TICKET_CODE">
					<Components/>
					<Events/>
					<Attributes/>

					<Features/>
				</Label>
				<Label id="273" fieldSourceType="DBColumn" dataType="Text" html="False" name="TICKET_AMOUNT" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ENTRY_BILL_TICKETTICKET_AMOUNT" fieldSource="TICKET_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="274" fieldSourceType="DBColumn" dataType="Text" html="False" name="TICKET_REASON_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ENTRY_BILL_TICKETTICKET_REASON_CODE" fieldSource="TICKET_REASON_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="275" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ENTRY_BILL_TICKETDESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="282" fieldSourceType="DBColumn" dataType="Text" name="T_BILL_TICKET_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="ENTRY_BILL_TICKETT_BILL_TICKET_ID" fieldSource="T_BILL_TICKET_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="51" styles="Row;AltRow" name="rowStyle"/>
						<Action actionName="Custom Code" actionCategory="General" id="127"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="231"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
			</TableParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="267" variable="s_keyword" parameterType="URL" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="BATCHSearch" wizardCaption="Search P APP ROLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="verified_bill_ticket.ccp" PathID="BATCHSearch" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="Keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="BATCHSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="BATCHSearchButton_DoSearch" removeParameters="TAMBAH;BATCH_CONTROL_ID">
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
		<Record id="19" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="BATCH1" errorSummator="Error" wizardCaption="Add/Edit P APP ROLE " wizardFormMethod="post" PathID="BATCH1" activeCollection="DSQLParameters" customInsert="/* Formatted on 29/10/2014 08:35:03 (QP5 v5.139.911.3011) */
INSERT INTO T_BILL_TICKET (T_BILL_TICKET_ID,
                           TICKET_DATE,
                           SUBSCRIBER_ID,
                           P_TICKET_COMPONENT_ID,
                           P_CURRENCY_ID,
                           TICKET_AMOUNT,
                           TICKET_REASON_ID,
                           DESCRIPTION,
                           FINAL_AMOUNT,
                           IS_OK,
                           VERIFICATION_DATE,
                           VERIFIED_BY,
                           INVOICE_DATE,
                           UPDATE_DATE,
                           UPDATE_BY,
                           INPUT_DATA_CONTROL_ID,
                           JOB_CONTROL_ID)
     VALUES (GENERATE_ID('BILLDB','T_BILL_TICKET', 'T_BILL_TICKET_ID'),
        to_date(substr('{TICKET_DATE}',1,10),'yyyy/mm/dd'),
        {SUBSCRIBER_ID}, {P_TICKET_COMPONENT_ID}, {P_CURRENCY_ID}, 
        {TICKET_AMOUNT}, {TICKET_REASON_ID}, '{DESCRIPTION}', NULL, 
        NULL, NULL, NULL, NULL, SYSDATE, '{UPDATE_BY}', NULL, NULL)" customInsertType="SQL" customUpdateType="SQL" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" customDeleteType="SQL" customDelete="DELETE FROM T_BILL_TICKET
WHERE T_BILL_TICKET_ID = {T_BILL_TICKET_ID}" customUpdate="UPDATE T_BILL_TICKET
SET TICKET_DATE = to_date(substr('{TICKET_DATE}',1,10),'yyyy/mm/dd'),
       SUBSCRIBER_ID = {SUBSCRIBER_ID},
       P_TICKET_COMPONENT_ID = {P_TICKET_COMPONENT_ID},
       P_CURRENCY_ID = {P_CURRENCY_ID},
       TICKET_AMOUNT = {TICKET_AMOUNT},
       TICKET_REASON_ID = {TICKET_REASON_ID},
       DESCRIPTION = '{DESCRIPTION}',
       UPDATE_DATE = SYSDATE,
       UPDATE_BY = '{UPDATE_BY}'
WHERE T_BILL_TICKET_ID = {T_BILL_TICKET_ID}" dataSource="SELECT   *
FROM V_T_BILL_TICKET
WHERE T_BILL_TICKET_ID = {T_BILL_TICKET_ID}">
			<Components>
				<TextBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SUBSCRIPTION_NAME" fieldSource="SUBSCRIPTION_NAME" required="False" caption="KETERANGAN" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="BATCH1SUBSCRIPTION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="BATCH1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="194" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_NO" caption="Direktori File" fieldSource="SERVICE_NO" PathID="BATCH1SERVICE_NO" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="218" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TICKET_DATE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1TICKET_DATE" fieldSource="TICKET_DATE" required="True" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="241" fieldSourceType="DBColumn" dataType="Float" name="T_BILL_TICKET_ID" required="False" PathID="BATCH1T_BILL_TICKET_ID" fieldSource="T_BILL_TICKET_ID" visible="Yes">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="278" fieldSourceType="DBColumn" dataType="Text" name="INPUT_DATA_CONTROL_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1INPUT_DATA_CONTROL_ID" fieldSource="INPUT_DATA_CONTROL_ID" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="281" fieldSourceType="DBColumn" dataType="Float" name="TICKET_AMOUNT" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1TICKET_AMOUNT" fieldSource="TICKET_AMOUNT" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="266" fieldSourceType="DBColumn" dataType="Float" html="False" name="TICKET_REASON_ID" PathID="BATCH1TICKET_REASON_ID" fieldSource="TICKET_REASON_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="283" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TICKET_REASON_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1TICKET_REASON_CODE" fieldSource="TICKET_REASON_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="279" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_TICKET_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1BILL_TICKET_CODE" fieldSource="BILL_TICKET_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="280" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CURRENCY_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1CURRENCY_CODE" fieldSource="CURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="BATCH1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="284" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1UPDATE_BY" fieldSource="UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="285" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_TYPE_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1SERVICE_TYPE_CODE" fieldSource="SERVICE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="286" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="217" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_TICKET_COMPONENT_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1P_TICKET_COMPONENT_ID" fieldSource="P_TICKET_COMPONENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="287" fieldSourceType="DBColumn" dataType="Text" name="P_CURRENCY_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1P_CURRENCY_ID" fieldSource="P_CURRENCY_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="306" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IS_OK" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1IS_OK" fieldSource="IS_OK" sourceType="ListOfValues" connection="Conn" _valueOfList="N" _nameOfList="NO" dataSource="Y;YES;N;NO">
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
				</TextBox>
				<TextBox id="307" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="FINAL_AMOUNT" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1FINAL_AMOUNT" required="True" fieldSource="FINAL_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="308" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="VERIFIED_BY" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1VERIFIED_BY" fieldSource="VERIFIED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="309" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VERIFICATION_DATE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1VERIFICATION_DATE" fieldSource="VERIFICATION_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="114"/>
					</Actions>
				</Event>
				<Event name="BeforeInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="130"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="168"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="234" conditionType="Parameter" useIsNull="False" field="BATCH_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="BATCH_CONTROL_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="239" parameterType="URL" variable="T_BILL_TICKET_ID" dataType="Float" parameterSource="T_BILL_TICKET_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="227" fieldName="*"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="288" variable="T_BILL_TICKET_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="T_BILL_TICKET_ID"/>
				<SQLParameter id="289" variable="TICKET_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="TICKET_DATE"/>
				<SQLParameter id="290" variable="SUBSCRIBER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SUBSCRIBER_ID"/>
				<SQLParameter id="291" variable="P_TICKET_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TICKET_COMPONENT_ID"/>
				<SQLParameter id="292" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
				<SQLParameter id="293" variable="TICKET_AMOUNT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TICKET_AMOUNT"/>
				<SQLParameter id="294" variable="TICKET_REASON_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TICKET_REASON_ID"/>
				<SQLParameter id="295" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="296" variable="UPDATE_BY" parameterType="Session" dataType="Text" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="59" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="60" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
				<CustomParameter id="61" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
				<CustomParameter id="62" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="63" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="64" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="65" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
				<CustomParameter id="66" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="67" field="VERIFICATION_DATE" dataType="Date" parameterType="Control" parameterSource="VERIFICATION_DATE"/>
				<CustomParameter id="68" field="VERIFIED_BY" dataType="Text" parameterType="Control" parameterSource="VERIFIED_BY"/>
				<CustomParameter id="69" field="APPROVAL_DATE" dataType="Date" parameterType="Control" parameterSource="APPROVAL_DATE"/>
				<CustomParameter id="70" field="APPROVED_BY" dataType="Text" parameterType="Control" parameterSource="APPROVED_BY"/>
			</IFormElements>
			<USPParameters>
				<SPParameter id="Key132" parameterName="i_afr_task_rule_id" parameterSource="i_afr_task_rule_id" dataType="Numeric" parameterType="URL" dataSize="28" direction="Input" scale="10" precision="6"/>
				<SPParameter id="Key133" parameterName="i_detail_afr_request_id" parameterSource="i_detail_afr_request_id" dataType="Numeric" parameterType="URL" dataSize="28" direction="Input" scale="10" precision="6"/>
				<SPParameter id="Key134" parameterName="i_user" parameterSource="i_user" dataType="Char" parameterType="URL" dataSize="255" direction="Input" scale="10" precision="6"/>
				<SPParameter id="Key135" parameterName="o_result_code" parameterSource="o_result_code" dataType="Char" parameterType="URL" dataSize="255" direction="Output" scale="10" precision="6"/>
				<SPParameter id="Key136" parameterName="o_result_msg" parameterSource="o_result_msg" dataType="Char" parameterType="URL" dataSize="255" direction="Output" scale="10" precision="6"/>
			</USPParameters>
			<USQLParameters>
				<SQLParameter id="297" variable="TICKET_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="TICKET_DATE"/>
				<SQLParameter id="298" variable="SUBSCRIBER_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SUBSCRIBER_ID"/>
				<SQLParameter id="299" variable="P_TICKET_COMPONENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_TICKET_COMPONENT_ID"/>
				<SQLParameter id="300" variable="P_CURRENCY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CURRENCY_ID"/>
				<SQLParameter id="301" variable="TICKET_AMOUNT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TICKET_AMOUNT"/>
				<SQLParameter id="302" variable="TICKET_REASON_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TICKET_REASON_ID"/>
				<SQLParameter id="303" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="304" variable="UPDATE_BY" parameterType="Session" dataType="Text" parameterSource="UserName"/>
				<SQLParameter id="305" variable="T_BILL_TICKET_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="T_BILL_TICKET_ID"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="98" conditionType="Parameter" useIsNull="False" field="P_APP_ROLE_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_ROLE_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="85" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE" omitIfEmpty="True"/>
				<CustomParameter id="86" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="87" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO" format="dd-mmm-yyyy" omitIfEmpty="True"/>
				<CustomParameter id="88" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION" omitIfEmpty="True"/>
				<CustomParameter id="89" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" omitIfEmpty="True"/>
				<CustomParameter id="90" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="91" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" omitIfEmpty="True"/>
				<CustomParameter id="92" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY" omitIfEmpty="True"/>
				<CustomParameter id="93" field="VERIFICATION_DATE" dataType="Date" parameterType="Control" parameterSource="VERIFICATION_DATE" omitIfEmpty="True"/>
				<CustomParameter id="94" field="VERIFIED_BY" dataType="Text" parameterType="Control" parameterSource="VERIFIED_BY" omitIfEmpty="True"/>
				<CustomParameter id="95" field="APPROVAL_DATE" dataType="Date" parameterType="Control" parameterSource="APPROVAL_DATE" omitIfEmpty="True"/>
				<CustomParameter id="96" field="APPROVED_BY" dataType="Text" parameterType="Control" parameterSource="APPROVED_BY" omitIfEmpty="True"/>
				<CustomParameter id="97" field="P_APP_ROLE_ID" dataType="Text" parameterType="Control" parameterSource="P_APP_ROLE_ID" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="240" variable="T_BILL_TICKET_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="T_BILL_TICKET_ID"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="112" conditionType="Parameter" useIsNull="False" field="P_APP_ROLE_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_ROLE_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="verified_bill_ticket_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="verified_bill_ticket.php" forShow="True" url="verified_bill_ticket.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnLoad" type="Client">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="57"/>
			</Actions>
		</Event>
	</Events>
</Page>
