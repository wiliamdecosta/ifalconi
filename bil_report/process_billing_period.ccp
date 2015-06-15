<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_process" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="{CCS_Style}" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="All" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="BATCHSearch" wizardCaption="Search P APP ROLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="process_billing_period.ccp" PathID="BATCHSearch" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
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
		<Record id="19" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="BATCH1" errorSummator="Error" wizardCaption="Add/Edit P APP ROLE " wizardFormMethod="post" PathID="BATCH1" activeCollection="DSQLParameters" customInsert="/* Formatted on 20/10/2014 11:16:27 (QP5 v5.139.911.3011) */
INSERT INTO INPUT_DATA_CONTROL (INPUT_DATA_CONTROL_ID,
                                INPUT_FILE_NAME,
                                INPUT_DATA_CLASS_ID,
                                P_FINANCE_PERIOD_ID,
                                P_BILL_CYCLE_ID,
                                DATA_STATUS_ID,
                                FILE_DIRECTORY,
                                CREATION_DATE,
                                OPERATOR_ID,
                                IS_FINISH_PROCESSED,
                                FILE_DATE,
                                FILE_SIZE,
                                INVOICE_DATE,
                                BILL_AMT,
                                INVOICE_AMT,
                                IS_CLOSED,
                                CLOSING_DATE,
                                CLOSED_BY,
                                IS_BACKUP,
                                BACKUP_DATE,
                                BACKUP_BY,
                                BACKUP_FILE,
                                BACKUP_DIR,
                                IS_RELEASED,
                                RELEASED_DATE,
                                RELEASED_BY)
     VALUES (generate_id('BILLDB','INPUT_DATA_CONTROL','INPUT_DATA_CONTROL_ID'),'{INPUT_FILE_NAME}',{INPUT_DATA_CLASS_ID},{P_FINANCE_PERIOD_ID},{P_BILL_CYCLE_ID},{DATA_STATUS_ID},
      '{FILE_DIRECTORY}', SYSDATE, '{OPERATOR_ID}', '{IS_FINISH_PROCESSED}', '{FILE_DATE}', {FILE_SIZE}, to_date(substr('{INVOICE_DATE}',1,10),'yyyy/mm/dd'), {BILL_AMT}, {INVOICE_AMT},
      '{IS_CLOSED}', '{CLOSING_DATE}',
      '{CLOSED_BY}', '{IS_BACKUP}', '{BACKUP_DATE}', '{BACKUP_BY}', '{BACKUP_FILE}', '{BACKUP_DIR}', '{IS_RELEASED}', '{RELEASED_DATE}', '{RELEASED_BY}')" customInsertType="SQL" customUpdateType="SQL" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" parameterTypeListName="ParameterTypeList" customUpdate="/* Formatted on 20/10/2014 11:16:27 (QP5 v5.139.911.3011) */
UPDATE INPUT_DATA_CONTROL
SET INPUT_FILE_NAME = '{INPUT_FILE_NAME}',
    INPUT_DATA_CLASS_ID = {INPUT_DATA_CLASS_ID},
    P_FINANCE_PERIOD_ID = {P_FINANCE_PERIOD_ID},
    P_BILL_CYCLE_ID = {P_BILL_CYCLE_ID},
    DATA_STATUS_ID = {DATA_STATUS_ID},
    FILE_DIRECTORY =  '{FILE_DIRECTORY}',
    IS_FINISH_PROCESSED = '{IS_FINISH_PROCESSED}',
    FILE_DATE =  '{FILE_DATE}', 
    FILE_SIZE = {FILE_SIZE}, 
    INVOICE_DATE = to_date(substr('{INVOICE_DATE}',1,10),'yyyy/mm/dd'), 
    BILL_AMT = {BILL_AMT}, 
    INVOICE_AMT = {INVOICE_AMT},
    IS_CLOSED =  '{IS_CLOSED}', 
    CLOSING_DATE = '{CLOSING_DATE}',
    CLOSED_BY = '{CLOSED_BY}', 
    IS_BACKUP = '{IS_BACKUP}', 
    BACKUP_DATE = '{BACKUP_DATE}', 
    BACKUP_BY = '{BACKUP_BY}', 
    BACKUP_FILE = '{BACKUP_FILE}', 
    BACKUP_DIR = '{BACKUP_DIR}', 
    IS_RELEASED = '{IS_RELEASED}', 
    RELEASED_DATE = '{RELEASED_DATE}', 
    RELEASED_BY = '{RELEASED_BY}'
WHERE INPUT_DATA_CONTROL_ID = {INPUT_DATA_CONTROL_ID}" dataSource="SELECT   *
FROM v_input_data_control_bill
WHERE INPUT_DATA_CONTROL_ID = {INPUT_DATA_CONTROL_ID}" customDeleteType="SQL" customDelete="DELETE 
FROM INPUT_DATA_CONTROL
WHERE  INPUT_DATA_CONTROL_ID = {INPUT_DATA_CONTROL_ID}">
			<Components>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="BATCH1Button_Insert" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="116"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="164" message="Save this record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="21" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="BATCH1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="117"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="165" message="Change this record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="22" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="BATCH1Button_Delete" removeParameters="TAMBAH;BATCH_CONTROL_ID;s_keyword;BATCHPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="23" message="Delete this record?"/>
								<Action actionName="Custom Code" actionCategory="General" id="118"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="24" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="BATCH1Button_Cancel" removeParameters="TAMBAH;BATCH_CONTROL_ID;s_keyword;BATCHPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="119"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CLOSING_DATE" fieldSource="CLOSING_DATE" required="False" caption="UPDATE DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="BATCH1CLOSING_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="194" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="INVOICE_DATE" caption="Direktori File" fieldSource="INVOICE_DATE" PathID="BATCH1INVOICE_DATE" required="False" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="217" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FINANCE_PERIOD_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1P_FINANCE_PERIOD_ID" fieldSource="P_FINANCE_PERIOD_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="218" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FINANCE_PERIOD_CODE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="237" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Text" returnValueType="Number" name="P_BATCH_TYPE_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" wizardEmptyCaption="Select Value" PathID="BATCH1P_BATCH_TYPE_ID" connection="Conn" dataSource="select * from v_bill_creation_data_class" boundColumn="P_REFERENCE_LIST_ID" textColumn="CODE" fieldSource="BATCH_TYPE" required="True">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Hidden id="266" fieldSourceType="DBColumn" dataType="Float" html="False" name="BILLING_CENTER_ID" PathID="BATCH1BILLING_CENTER_ID" fieldSource="BILLING_CENTER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OPERATOR_ID" fieldSource="OPERATOR_ID" required="True" wizardCaption="CREATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="BATCH1OPERATOR_ID" defaultValue="CCGetUserLogin()" caption="CREATED BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="BATCH1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="171" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CLOSED_BY" fieldSource="CLOSED_BY" required="False" wizardCaption="UPDATED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="BATCH1CLOSED_BY" defaultValue="CCGetUserLogin()" caption="UPDATE BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="241" fieldSourceType="DBColumn" dataType="Text" name="INPUT_FILE_NAME" required="True" PathID="BATCH1INPUT_FILE_NAME" fieldSource="INPUT_FILE_NAME" visible="Yes">
<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="277"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
<Hidden id="278" fieldSourceType="DBColumn" dataType="Text" name="INPUT_DATA_CONTROL_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1INPUT_DATA_CONTROL_ID" fieldSource="INPUT_DATA_CONTROL_ID" required="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="279" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_STATUS" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1BILL_STATUS" fieldSource="BILL_STATUS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="280" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_AMT" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1BILL_AMT" fieldSource="BILL_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="281" fieldSourceType="DBColumn" dataType="Text" name="DATA_STATUS_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1DATA_STATUS_ID" fieldSource="DATA_STATUS_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="321" fieldSourceType="DBColumn" dataType="Text" name="FILE_DIRECTORY" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1FILE_DIRECTORY" fieldSource="FILE_DIRECTORY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="322" fieldSourceType="DBColumn" dataType="Text" name="P_BILL_CYCLE_ID" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1P_BILL_CYCLE_ID" fieldSource="P_BILL_CYCLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="323" fieldSourceType="DBColumn" dataType="Text" name="IS_FINISH_PROCESSED" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1IS_FINISH_PROCESSED" fieldSource="IS_FINISH_PROCESSED" defaultValue="&quot;N&quot;">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="324" fieldSourceType="DBColumn" dataType="Date" name="FILE_DATE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1FILE_DATE" fieldSource="FILE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="325" fieldSourceType="DBColumn" dataType="Float" name="FILE_SIZE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1FILE_SIZE" fieldSource="FILE_SIZE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="326" fieldSourceType="DBColumn" dataType="Text" name="IS_CLOSED" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1IS_CLOSED" fieldSource="IS_CLOSED">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="327" fieldSourceType="DBColumn" dataType="Text" name="IS_BACKUP" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1IS_BACKUP" fieldSource="IS_BACKUP">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="328" fieldSourceType="DBColumn" dataType="Text" name="BACKUP_DATE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1BACKUP_DATE" fieldSource="BACKUP_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="329" fieldSourceType="DBColumn" dataType="Text" name="BACKUP_BY" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1BACKUP_BY" fieldSource="BACKUP_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="330" fieldSourceType="DBColumn" dataType="Text" name="BACKUP_FILE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1BACKUP_FILE" fieldSource="BACKUP_FILE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="331" fieldSourceType="DBColumn" dataType="Text" name="BACKUP_DIR" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1BACKUP_DIR" fieldSource="BACKUP_DIR">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="332" fieldSourceType="DBColumn" dataType="Text" name="IS_RELEASED" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1IS_RELEASED" fieldSource="IS_RELEASED">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="333" fieldSourceType="DBColumn" dataType="Date" name="RELEASED_DATE" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1RELEASED_DATE" fieldSource="RELEASED_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="334" fieldSourceType="DBColumn" dataType="Text" name="RELEASED_BY" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1RELEASED_BY" fieldSource="RELEASED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BILL_CYCLE_CODE" caption="KETERANGAN" fieldSource="BILL_CYCLE_CODE" required="False" PathID="BATCH1BILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="360" fieldSourceType="DBColumn" dataType="Float" name="INVOICE_AMT" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="BATCH1INVOICE_AMT" fieldSource="INVOICE_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
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
				<Event name="BeforeExecuteInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="385"/>
</Actions>
</Event>
<Event name="AfterExecuteInsert" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="386"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="234" conditionType="Parameter" useIsNull="False" field="BATCH_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="BATCH_CONTROL_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="239" parameterType="URL" variable="INPUT_DATA_CONTROL_ID" dataType="Float" parameterSource="INPUT_DATA_CONTROL_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="227" fieldName="*"/>
			</Fields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="335" variable="INPUT_DATA_CONTROL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="INPUT_DATA_CONTROL_ID"/>
				<SQLParameter id="336" variable="INPUT_FILE_NAME" parameterType="Control" dataType="Text" parameterSource="INPUT_FILE_NAME"/>
				<SQLParameter id="337" variable="INPUT_DATA_CLASS_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BATCH_TYPE_ID"/>
				<SQLParameter id="338" variable="P_FINANCE_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
				<SQLParameter id="339" variable="P_BILL_CYCLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_CYCLE_ID"/>
				<SQLParameter id="340" variable="DATA_STATUS_ID" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="DATA_STATUS_ID"/>
				<SQLParameter id="341" variable="FILE_DIRECTORY" parameterType="Control" dataType="Text" parameterSource="FILE_DIRECTORY"/>
				<SQLParameter id="342" variable="OPERATOR_ID" parameterType="Session" dataType="Text" parameterSource="UserName"/>
				<SQLParameter id="343" variable="IS_FINISH_PROCESSED" parameterType="Control" dataType="Text" parameterSource="IS_FINISH_PROCESSED"/>
				<SQLParameter id="344" variable="FILE_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="FILE_DATE"/>
				<SQLParameter id="345" variable="FILE_SIZE" parameterType="Control" dataType="Float" parameterSource="FILE_SIZE" defaultValue="0"/>
				<SQLParameter id="346" variable="INVOICE_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="INVOICE_DATE"/>
				<SQLParameter id="347" variable="BILL_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="BILL_AMT"/>
				<SQLParameter id="348" variable="INVOICE_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="INVOICE_AMT"/>
				<SQLParameter id="349" variable="IS_CLOSED" parameterType="Control" dataType="Text" parameterSource="IS_CLOSED"/>
				<SQLParameter id="350" variable="CLOSING_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="CLOSING_DATE"/>
				<SQLParameter id="351" variable="CLOSED_BY" parameterType="Control" dataType="Text" parameterSource="CLOSED_BY"/>
				<SQLParameter id="352" variable="IS_BACKUP" parameterType="Control" dataType="Text" parameterSource="IS_BACKUP"/>
				<SQLParameter id="353" variable="BACKUP_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Text" parameterSource="BACKUP_DATE"/>
				<SQLParameter id="354" variable="BACKUP_BY" parameterType="Control" dataType="Text" parameterSource="BACKUP_BY"/>
				<SQLParameter id="355" variable="BACKUP_FILE" parameterType="Control" dataType="Text" parameterSource="BACKUP_FILE"/>
				<SQLParameter id="356" variable="BACKUP_DIR" parameterType="Control" dataType="Text" parameterSource="BACKUP_DIR"/>
				<SQLParameter id="357" variable="IS_RELEASED" parameterType="Control" dataType="Text" parameterSource="IS_RELEASED"/>
				<SQLParameter id="358" variable="RELEASED_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="RELEASED_DATE"/>
				<SQLParameter id="359" variable="RELEASED_BY" parameterType="Control" dataType="Text" parameterSource="RELEASED_BY"/>
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
				<SQLParameter id="361" variable="INPUT_FILE_NAME" parameterType="Control" dataType="Text" parameterSource="INPUT_FILE_NAME"/>
				<SQLParameter id="362" variable="INPUT_DATA_CLASS_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BATCH_TYPE_ID"/>
				<SQLParameter id="363" variable="P_FINANCE_PERIOD_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_FINANCE_PERIOD_ID"/>
				<SQLParameter id="364" variable="P_BILL_CYCLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_CYCLE_ID"/>
				<SQLParameter id="365" variable="DATA_STATUS_ID" parameterType="Control" defaultValue="null" dataType="Float" parameterSource="DATA_STATUS_ID"/>
				<SQLParameter id="366" variable="FILE_DIRECTORY" parameterType="Control" dataType="Text" parameterSource="FILE_DIRECTORY"/>
				<SQLParameter id="367" variable="IS_FINISH_PROCESSED" parameterType="Control" dataType="Text" parameterSource="IS_FINISH_PROCESSED"/>
				<SQLParameter id="368" variable="FILE_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="FILE_DATE"/>
				<SQLParameter id="369" variable="FILE_SIZE" parameterType="Control" dataType="Float" parameterSource="FILE_SIZE" defaultValue="null"/>
				<SQLParameter id="370" variable="INVOICE_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="INVOICE_DATE"/>
				<SQLParameter id="371" variable="BILL_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="BILL_AMT"/>
				<SQLParameter id="372" variable="INVOICE_AMT" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="INVOICE_AMT"/>
				<SQLParameter id="373" variable="IS_CLOSED" parameterType="Control" dataType="Text" parameterSource="IS_CLOSED"/>
				<SQLParameter id="374" variable="CLOSING_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="CLOSING_DATE"/>
				<SQLParameter id="375" variable="CLOSED_BY" parameterType="Control" dataType="Text" parameterSource="CLOSED_BY"/>
				<SQLParameter id="376" variable="IS_BACKUP" parameterType="Control" dataType="Text" parameterSource="IS_BACKUP"/>
				<SQLParameter id="377" variable="BACKUP_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="BACKUP_DATE"/>
				<SQLParameter id="378" variable="BACKUP_BY" parameterType="Control" dataType="Text" parameterSource="BACKUP_BY"/>
				<SQLParameter id="379" variable="BACKUP_FILE" parameterType="Control" dataType="Text" parameterSource="BACKUP_FILE"/>
				<SQLParameter id="380" variable="BACKUP_DIR" parameterType="Control" dataType="Text" parameterSource="BACKUP_DIR"/>
				<SQLParameter id="381" variable="IS_RELEASED" parameterType="Control" dataType="Text" parameterSource="IS_RELEASED"/>
				<SQLParameter id="382" variable="RELEASED_DATE" parameterType="Control" defaultValue="&quot;&quot;" dataType="Date" parameterSource="RELEASED_DATE"/>
				<SQLParameter id="383" variable="RELEASED_BY" parameterType="Control" dataType="Text" parameterSource="RELEASED_BY"/>
				<SQLParameter id="384" variable="INPUT_DATA_CONTROL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="INPUT_DATA_CONTROL_ID"/>
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
				<SQLParameter id="240" variable="INPUT_DATA_CONTROL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="INPUT_DATA_CONTROL_ID"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="112" conditionType="Parameter" useIsNull="False" field="P_APP_ROLE_ID" dataType="Float" parameterType="URL" parameterSource="P_APP_ROLE_ID" defaultValue="SELECTED_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Grid id="282" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" name="V_INPUT_DATA_CONTROL_BILL" pageSizeLimit="100" wizardCaption=" V INPUT DATA CONTROL BILL " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" pasteActions="pasteActions" activeCollection="TableParameters" parameterTypeListName="ParameterTypeList" dataSource="V_INPUT_DATA_CONTROL_BILL">
			<Components>
				<Label id="284" fieldSourceType="DBColumn" dataType="Float" html="False" name="INPUT_DATA_CONTROL_ID" fieldSource="INPUT_DATA_CONTROL_ID" wizardCaption="INPUT DATA CONTROL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLINPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="291" fieldSourceType="DBColumn" dataType="Date" html="False" name="CREATION_DATE" fieldSource="CREATION_DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLCREATION_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="292" fieldSourceType="DBColumn" dataType="Text" html="False" name="OPERATOR_ID" fieldSource="OPERATOR_ID" wizardCaption="OPERATOR ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLOPERATOR_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="296" fieldSourceType="DBColumn" dataType="Date" html="False" name="INVOICE_DATE" fieldSource="INVOICE_DATE" wizardCaption="INVOICE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLINVOICE_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="297" fieldSourceType="DBColumn" dataType="Float" html="False" name="BILL_AMT" fieldSource="BILL_AMT" wizardCaption="BILL AMT" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLBILL_AMT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="300" fieldSourceType="DBColumn" dataType="Date" html="False" name="CLOSING_DATE" fieldSource="CLOSING_DATE" wizardCaption="CLOSING DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLCLOSING_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="301" fieldSourceType="DBColumn" dataType="Text" html="False" name="CLOSED_BY" fieldSource="CLOSED_BY" wizardCaption="CLOSED BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLCLOSED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="310" fieldSourceType="DBColumn" dataType="Text" html="False" name="BATCH_TYPE" fieldSource="BATCH_TYPE" wizardCaption="BATCH TYPE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLBATCH_TYPE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="311" fieldSourceType="DBColumn" dataType="Text" html="False" name="FINANCE_PERIOD_CODE" fieldSource="FINANCE_PERIOD_CODE" wizardCaption="FINANCE PERIOD CODE" wizardSize="24" wizardMaxLength="24" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLFINANCE_PERIOD_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="314" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_CYCLE_CODE" fieldSource="BILL_CYCLE_CODE" wizardCaption="BILL CYCLE CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLBILL_CYCLE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="315" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_STATUS" fieldSource="BILL_STATUS" wizardCaption="BILL STATUS" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="V_INPUT_DATA_CONTROL_BILLBILL_STATUS">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="52" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="V_INPUT_DATA_CONTROL_BILLDLink" hrefSource="process_billing_period.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="INPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="235" sourceType="DataField" name="INPUT_DATA_CONTROL_ID" source="INPUT_DATA_CONTROL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="54" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="V_INPUT_DATA_CONTROL_BILLADLink" hrefSource="process_billing_period.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="INPUT_DATA_CONTROL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="236" sourceType="DataField" name="INPUT_DATA_CONTROL_ID" source="INPUT_DATA_CONTROL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Navigator id="316" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="318" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="BATCH_Insert1" hrefSource="process_billing_period.ccp" removeParameters="T_BUDGET_ID;FLAG;s_keyword" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="V_INPUT_DATA_CONTROL_BILLBATCH_Insert1" fieldSource="INPUT_DATA_CONTROL_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="319"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="320" sourceType="DataField" name="INPUT_DATA_CONTROL_ID" source="INPUT_DATA_CONTROL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="283" styles="Row;AltRow" name="rowStyle"/>
						<Action actionName="Custom Code" actionCategory="General" id="317"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
<TableParameter id="389" conditionType="Parameter" useIsNull="False" field="INPUT_DATA_CONTROL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
<TableParameter id="390" conditionType="Parameter" useIsNull="False" field="BILL_AMT" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
<TableParameter id="391" conditionType="Parameter" useIsNull="False" field="FINANCE_PERIOD_CODE" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
</TableParameters>
			<JoinTables>
<JoinTable id="388" tableName="V_INPUT_DATA_CONTROL_BILL" schemaName="BILLDB" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="387" variable="s_keyword" parameterType="URL" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="process_billing_period_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="process_billing_period.php" forShow="True" url="process_billing_period.php" comment="//" codePage="windows-1252"/>
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
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="129"/>
			</Actions>
		</Event>
	</Events>
</Page>
