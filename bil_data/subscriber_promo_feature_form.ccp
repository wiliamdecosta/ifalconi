<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Record id="110" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_SUBS_OT_PROMO_FEATURE" dataSource="SELECT * 
FROM V_SUBS_OT_PROMO_FEATURE
WHERE SUBS_OT_PROMO_FEATURE_ID = {SUBS_OT_PROMO_FEATURE_ID} " errorSummator="Error" wizardCaption=" V SUBS OT PROMO SERVICE " wizardFormMethod="post" PathID="V_SUBS_OT_PROMO_FEATURE" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customUpdateType="SQL" customDeleteType="SQL" customInsert="INSERT INTO SUBS_OT_PROMO_FEATURE(
SUBS_OT_PROMO_FEATURE_ID, 
SUBSCRIBER_ID, 
P_FEATURE_PROMOTION_ID, 
PROMOTION_DATE, 
DESCRIPTION, 
UPDATE_DATE,
UPDATE_BY
) VALUES(
GENERATE_ID('BILLDB','SUBS_OT_PROMO_FEATURE','SUBS_OT_PROMO_FEATURE_ID'),
{SUBSCRIBER_ID}, 
{P_FEATURE_PROMOTION_ID}, 
'{PROMOTION_DATE}', 
INITCAP(TRIM('{DESCRIPTION}')), 
SYSDATE,
 '{UPDATE_BY}'
 )" customUpdate="UPDATE SUBS_OT_PROMO_FEATURE SET 
P_FEATURE_PROMOTION_ID={P_FEATURE_PROMOTION_ID},
PROMOTION_DATE='{PROMOTION_DATE}', 
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),  
UPDATE_BY='{UPDATE_BY}', 
UPDATE_DATE=SYSDATE
WHERE  
SUBS_OT_PROMO_FEATURE_ID = {SUBS_OT_PROMO_FEATURE_ID}" customDelete="DELETE FROM SUBS_OT_PROMO_FEATURE WHERE SUBS_OT_PROMO_FEATURE_ID = {SUBS_OT_PROMO_FEATURE_ID}" activeTableType="customDelete">
			<Components>
				<Button id="111" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_SUBS_OT_PROMO_FEATUREButton_Insert" returnPage="subscriber_promo.ccp" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="112" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_SUBS_OT_PROMO_FEATUREButton_Update" returnPage="subscriber_promo.ccp" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="113" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_SUBS_OT_PROMO_FEATUREButton_Delete" returnPage="subscriber_promo.ccp" removeParameters="TAMBAH;SUBS_OT_PROMO_SERVICE_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="114" message="Are you sure delete this record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="115" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_SUBS_OT_PROMO_FEATUREButton_Cancel" returnPage="subscriber_promo.ccp" removeParameters="SUBS_OT_PROMO_SERVICE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" required="True" caption="SUBSCRIBER ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_FEATURESUBSCRIBER_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_FEATURE_PROMOTION_ID" fieldSource="P_FEATURE_PROMOTION_ID" required="True" caption="P ONETIME PROMOTION ID" wizardCaption="P ONETIME PROMOTION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_FEATUREP_FEATURE_PROMOTION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="PROMOTION_DATE" fieldSource="PROMOTION_DATE" required="True" caption="PROMOTION DATE" wizardCaption="PROMOTION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_FEATUREPROMOTION_DATE" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_FEATUREDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<Hidden id="126" fieldSourceType="DBColumn" dataType="Float" name="SUBS_OT_PROMO_FEATURE_ID" PathID="V_SUBS_OT_PROMO_FEATURESUBS_OT_PROMO_FEATURE_ID" fieldSource="SUBS_OT_PROMO_FEATURE_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OT_FEATURE_PROMO_CODE" fieldSource="OT_FEATURE_PROMO_CODE" required="True" caption="OT FEATURE PROMO CODE" wizardCaption="OT PROMO CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_FEATUREOT_FEATURE_PROMO_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" caption="UPDATE BY" fieldSource="UPDATE_BY" defaultValue="CCGetUserLogin()" required="True" PathID="V_SUBS_OT_PROMO_FEATUREUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" caption="UPDATE DATE" fieldSource="UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate" required="True" PathID="V_SUBS_OT_PROMO_FEATUREUPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="129" name="DatePicker_PROMOTION_DATE" style="../Styles/trb/Style.css" control="PROMOTION_DATE" PathID="V_SUBS_OT_PROMO_FEATUREDatePicker_PROMOTION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<Hidden id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_TARIFF_SCENARIO_ID" PathID="V_SUBS_OT_PROMO_FEATUREP_TARIFF_SCENARIO_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="131"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="132"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="148"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="149"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="150"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="151"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="116" conditionType="Parameter" useIsNull="False" field="SUBS_OT_PROMO_SERVICE_ID" parameterSource="SUBS_OT_PROMO_SERVICE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="171" parameterType="URL" variable="SUBS_OT_PROMO_FEATURE_ID" dataType="Float" parameterSource="SUBS_OT_PROMO_FEATURE_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="170" tableName="V_SUBS_OT_PROMO_SERVICE" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="180" variable="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<SQLParameter id="181" variable="P_FEATURE_PROMOTION_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_PROMOTION_ID"/>
				<SQLParameter id="182" variable="PROMOTION_DATE" dataType="Date" parameterType="Control" parameterSource="PROMOTION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="183" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="184" variable="SUBS_OT_PROMO_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_FEATURE_ID"/>
				<SQLParameter id="186" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="172" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<CustomParameter id="173" field="P_FEATURE_PROMOTION_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_PROMOTION_ID"/>
				<CustomParameter id="174" field="PROMOTION_DATE" dataType="Date" parameterType="Control" parameterSource="PROMOTION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="175" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="176" field="SUBS_OT_PROMO_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_FEATURE_ID"/>
				<CustomParameter id="177" field="OT_FEATURE_PROMO_CODE" dataType="Text" parameterType="Control" parameterSource="OT_FEATURE_PROMO_CODE"/>
				<CustomParameter id="178" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="179" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="196" variable="P_FEATURE_PROMOTION_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_PROMOTION_ID"/>
				<SQLParameter id="197" variable="PROMOTION_DATE" dataType="Date" parameterType="Control" parameterSource="PROMOTION_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="198" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="199" variable="SUBS_OT_PROMO_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_FEATURE_ID"/>
				<SQLParameter id="200" variable="OT_FEATURE_PROMO_CODE" dataType="Text" parameterType="Control" parameterSource="OT_FEATURE_PROMO_CODE"/>
				<SQLParameter id="201" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="152" conditionType="Parameter" useIsNull="False" field="SUBS_OT_PROMO_SERVICE_ID" dataType="Float" parameterType="URL" parameterSource="SUBS_OT_PROMO_SERVICE_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="187" field="SUBSCRIBER_ID" dataType="Float" parameterType="Control" parameterSource="SUBSCRIBER_ID"/>
				<CustomParameter id="188" field="P_FEATURE_PROMOTION_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_PROMOTION_ID"/>
				<CustomParameter id="189" field="PROMOTION_DATE" dataType="Date" parameterType="Control" parameterSource="PROMOTION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="190" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="191" field="SUBS_OT_PROMO_FEATURE_ID" dataType="Float" parameterType="Control" parameterSource="SUBS_OT_PROMO_FEATURE_ID"/>
				<CustomParameter id="192" field="OT_FEATURE_PROMO_CODE" dataType="Text" parameterType="Control" parameterSource="OT_FEATURE_PROMO_CODE"/>
				<CustomParameter id="193" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="194" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="202" variable="SUBS_OT_PROMO_FEATURE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SUBS_OT_PROMO_FEATURE_ID"/>
			</DSQLParameters>
			<DConditions>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_promo_feature_form_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber_promo_feature_form.php" forShow="True" url="subscriber_promo_feature_form.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
