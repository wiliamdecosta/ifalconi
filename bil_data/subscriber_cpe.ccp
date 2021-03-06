<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM V_SUBSCRIBER_CPE    
WHERE 
SUBSCRIBER_ID = {SUBSCRIBER_ID}
" name="CPE" pageSizeLimit="100" wizardCaption=" V SUBS OT PROMO SERVICE " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No Record" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="18" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="PROMOTION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CPEVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CPEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="CPE_TYPE_CODE" wizardCaption="OT PROMO CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CPECPE_TYPE_CODE" fieldSource="CPE_TYPE_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="19" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="175"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="29" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Editlink" PathID="CPEEditlink" hrefSource="subscriber_cpe_form1.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="SUBSCRIBER_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="168" sourceType="DataField" name="SUBSCRIBER_CPE_ID" source="SUBSCRIBER_CPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="125" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" PathID="CPEVALID_FROM" fieldSource="VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="126" fieldSourceType="DBColumn" dataType="Text" html="False" name="CPE_BRAND_CODE" PathID="CPECPE_BRAND_CODE" fieldSource="CPE_BRAND_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="162" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERIAL_NO" PathID="CPESERIAL_NO" fieldSource="SERIAL_NO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="163" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_CPE_ID" PathID="CPESUBSCRIBER_CPE_ID" fieldSource="SUBSCRIBER_CPE_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Link id="33" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="CPEDLink" hrefSource="subscriber_cpe.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="164" sourceType="DataField" name="SUBSCRIBER_CPE_ID" source="SUBSCRIBER_CPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ServicePromo_Insert" hrefSource="subscriber_cpe_form1.ccp" removeParameters="SUBSCRIBER_CPE_ID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="CPEServicePromo_Insert">
					<Components/>
					<Events>
					</Events>
					<LinkParameters>
						<LinkParameter id="174" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="165"/>
						<Action actionName="Set Row Style" actionCategory="General" id="10" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="OT_PROMO_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="51" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="52" variable="SUBSCRIBER_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="SUBSCRIBER_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
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
		<Grid id="110" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM V_SUBSCRIBER_CPE_RECU_TARIFF
WHERE
SUBSCRIBER_CPE_ID = {SUBSCRIBER_CPE_ID}
" name="CPEREQURRINGTARIFF" pageSizeLimit="100" wizardCaption=" V SUBS OT PROMO SERVICE " wizardGridType="Tabular" wizardAllowInsert="True" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No Record" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Navigator id="114" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="CPE_REQURRING_TARIF_Insert" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="CPEREQURRINGTARIFFCPE_REQURRING_TARIF_Insert" removeParameters="SUBSCRIBER_CPE_TARIFF_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="172"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="117" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Editlink" PathID="CPEREQURRINGTARIFFEditlink" hrefSource="subscriber_cpe_form2.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="SUBSCRIBER_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="170" sourceType="DataField" name="SUBSCRIBER_CPE_TARIFF_ID" source="SUBSCRIBER_CPE_TARIFF_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="127" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_COMPONENT_CODE" PathID="CPEREQURRINGTARIFFBILL_COMPONENT_CODE" fieldSource="BILL_COMPONENT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="128" fieldSourceType="DBColumn" dataType="Text" html="False" name="CURRENCY_CODE" PathID="CPEREQURRINGTARIFFCURRENCY_CODE" fieldSource="CURRENCY_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="131" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" PathID="CPEREQURRINGTARIFFDESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="135" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" PathID="CPEREQURRINGTARIFFVALID_FROM" fieldSource="VALID_FROM" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="136" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="PROMOTION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="CPEREQURRINGTARIFFVALID_TO" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="137" fieldSourceType="DBColumn" dataType="Text" html="False" name="CHARGE_AMOUNT" PathID="CPEREQURRINGTARIFFCHARGE_AMOUNT" fieldSource="CHARGE_AMOUNT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="138" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILL_PERIOD_UNIT_CODE" PathID="CPEREQURRINGTARIFFBILL_PERIOD_UNIT_CODE" fieldSource="BILL_PERIOD_UNIT_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="139" fieldSourceType="DBColumn" dataType="Text" html="False" name="BILLING_UNIT" PathID="CPEREQURRINGTARIFFBILLING_UNIT" fieldSource="BILLING_UNIT">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<TextBox id="169" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_CPE_TARIFF_ID" PathID="CPEREQURRINGTARIFFSUBSCRIBER_CPE_TARIFF_ID" fieldSource="SUBSCRIBER_CPE_TARIFF_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="119" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="176"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="120" conditionType="Parameter" useIsNull="False" field="OT_PROMO_CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="121" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="122" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="167" variable="SUBSCRIBER_CPE_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="SUBSCRIBER_CPE_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="subscriber_cpe_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="subscriber_cpe.php" forShow="True" url="subscriber_cpe.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="166"/>
			</Actions>
		</Event>
	</Events>
</Page>
