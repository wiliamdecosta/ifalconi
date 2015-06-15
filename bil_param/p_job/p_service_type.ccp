<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" name="P_SERVICE_TYPE" pageSizeLimit="100" wizardCaption=" P SERVICE TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions" dataSource="v_p_service_type" pasteAsReplace="pasteAsReplace" activeCollection="TableParameters" orderBy="P_SERVICE_TYPE_ID desc">
			<Components>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_NAME" fieldSource="SERVICE_NAME" wizardCaption="SERVICE NAME" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPESERVICE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="SERVICE_GROUP_CODE" fieldSource="SERVICE_GROUP_CODE" wizardCaption="P SERVICE GROUP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SERVICE_TYPESERVICE_GROUP_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_FROM" fieldSource="VALID_FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEVALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Date" html="False" name="VALID_TO" fieldSource="VALID_TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEVALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATE_DATE" fieldSource="UPDATE_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEUPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_BY" fieldSource="UPDATE_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="43" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SERVICE_TYPE_Insert" hrefSource="p_service_type.ccp" removeParameters="P_SERVICE_TYPE_ID;FLAG;s_keyword;P_SERVICE_TYPEPage;P_SERVICE_TYPEPageSize;P_SERVICE_TYPEOrder;P_SERVICE_TYPEDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_SERVICE_TYPEP_SERVICE_TYPE_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="75"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="80" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_SERVICE_TYPEDLink" hrefSource="p_service_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="81" sourceType="DataField" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="82" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_SERVICE_TYPEADLink" hrefSource="p_service_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="83" sourceType="DataField" format="yyyy-mm-dd" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_service_type.ccp" wizardThemeItem="GridA" PathID="P_SERVICE_TYPEP_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="22" sourceType="DataField" format="yyyy-mm-dd" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="110" fieldSourceType="DBColumn" dataType="Text" html="False" name="CHARGING_METHOD_CODE" PathID="P_SERVICE_TYPECHARGING_METHOD_CODE" fieldSource="CHARGING_METHOD_CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="76" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="77"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="88" conditionType="Parameter" useIsNull="False" field="code" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="Or" parameterSource="s_keyword"/>
<TableParameter id="89" conditionType="Parameter" useIsNull="False" field="service_name" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="s_keyword"/>
</TableParameters>
			<JoinTables>
				<JoinTable id="109" tableName="v_p_service_type" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
</JoinTables>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_SERVICE_TYPESearch" wizardCaption=" P SERVICE TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_service_type.ccp" PathID="P_SERVICE_TYPESearch" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_SERVICE_TYPESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_SERVICE_TYPESearchButton_DoSearch">
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
		<Record id="44" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_service_type1" dataSource="v_p_service_type" errorSummator="Error" wizardCaption=" P Service Type " wizardFormMethod="post" PathID="p_service_type1" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customInsert="INSERT INTO P_SERVICE_TYPE(P_SERVICE_TYPE_ID, CODE, SERVICE_NAME, LISTING_NO, P_SERVICE_GROUP_ID, P_CHARGING_METHOD_ID, VALID_FROM, VALID_TO, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES
(GENERATE_ID('BILLDB','P_SERVICE_TYPE','P_SERVICE_TYPE_ID'),UPPER(TRIM('{CODE}')),UPPER(TRIM('{SERVICE_NAME}')),'{LISTING_NO}',{P_SERVICE_GROUP_ID},{P_CHARGING_METHOD_ID},'{VALID_FROM}','{VALID_TO}','{DESCRIPTION}',sysdate, '{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_SERVICE_TYPE SET 
CODE='{CODE}',
SERVICE_NAME='{SERVICE_NAME}',
LISTING_NO={LISTING_NO},
P_SERVICE_GROUP_ID={P_SERVICE_GROUP_ID},
P_CHARGING_METHOD_ID={P_CHARGING_METHOD_ID},
VALID_FROM='{VALID_FROM}',
VALID_TO='{VALID_TO}',
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_SERVICE_TYPE_ID = {P_SERVICE_TYPE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_SERVICE_TYPE WHERE P_SERVICE_TYPE_ID = {P_SERVICE_TYPE_ID}">
			<Components>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_NAME" fieldSource="SERVICE_NAME" required="True" caption="SERVICE NAME" wizardCaption="SERVICE NAME" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1SERVICE_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_FROM" fieldSource="VALID_FROM" required="True" caption="VALID FROM" wizardCaption="VALID FROM" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="55" name="DatePicker_VALID_FROM" control="VALID_FROM" wizardSatellite="True" wizardControl="VALID_FROM" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/trb/Style.css" PathID="p_service_type1DatePicker_VALID_FROM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextArea id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="250" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="20" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_service_type1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="65" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="66" message="Anda Yakin Menyimpan Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="67" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_service_type1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="68" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="69" message="Anda Yakin Mengubah Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="70" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_service_type1Button_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="71" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="72" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="73" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="p_service_type1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="74" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<Hidden id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_GROUP_ID" fieldSource="P_SERVICE_GROUP_ID" required="True" caption="P SERVICE GROUP ID" wizardCaption="P SERVICE GROUP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1P_SERVICE_GROUP_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SERVICE_GROUP_CODE" PathID="p_service_type1SERVICE_GROUP_CODE" fieldSource="SERVICE_GROUP_CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="87" name="DatePicker_VALID_TO" control="VALID_TO" wizardSatellite="True" wizardControl="VALID_TO" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/trb/Style.css" PathID="p_service_type1DatePicker_VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
<TextBox id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LISTING_NO" PathID="p_service_type1LISTING_NO" fieldSource="LISTING_NO">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="108" fieldSourceType="DBColumn" dataType="Text" name="P_CHARGING_METHOD_ID" PathID="p_service_type1P_CHARGING_METHOD_ID" fieldSource="P_CHARGING_METHOD_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<TextBox id="111" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CHARGING_METHOD_CODE" PathID="p_service_type1CHARGING_METHOD_CODE" fieldSource="CHARGING_METHOD_CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Hidden id="134" fieldSourceType="DBColumn" dataType="Text" name="P_SERVICE_TYPE_ID" PathID="p_service_type1P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="P_SERVICE_TYPE_ID" parameterSource="P_SERVICE_TYPE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="98" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="99" variable="SERVICE_NAME" parameterType="Control" dataType="Text" parameterSource="SERVICE_NAME"/>
<SQLParameter id="100" variable="LISTING_NO" parameterType="Control" dataType="Float" parameterSource="LISTING_NO" defaultValue="0"/>
<SQLParameter id="101" variable="P_SERVICE_GROUP_ID" parameterType="Control" dataType="Float" parameterSource="P_SERVICE_GROUP_ID" defaultValue="0"/>
<SQLParameter id="102" variable="P_CHARGING_METHOD_ID" parameterType="Control" dataType="Float" parameterSource="P_CHARGING_METHOD_ID" defaultValue="0"/>
<SQLParameter id="103" variable="VALID_FROM" parameterType="Control" dataType="Date" parameterSource="VALID_FROM" defaultValue="00-00-0000"/>
<SQLParameter id="104" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="105" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="106" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="90" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="91" field="SERVICE_NAME" dataType="Text" parameterType="Control" parameterSource="SERVICE_NAME"/>
<CustomParameter id="92" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="93" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="94" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="95" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="96" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="97" field="P_SERVICE_GROUP_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_GROUP_ID"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="124" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="125" variable="SERVICE_NAME" parameterType="Control" dataType="Text" parameterSource="SERVICE_NAME"/>
<SQLParameter id="126" variable="LISTING_NO" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LISTING_NO"/>
<SQLParameter id="127" variable="P_SERVICE_GROUP_ID" parameterType="Control" dataType="Text" parameterSource="P_SERVICE_GROUP_ID"/>
<SQLParameter id="128" variable="P_CHARGING_METHOD_ID" parameterType="Control" dataType="Text" parameterSource="P_CHARGING_METHOD_ID"/>
<SQLParameter id="129" variable="VALID_FROM" parameterType="Control" defaultValue="0-00-0000" dataType="Date" parameterSource="VALID_FROM"/>
<SQLParameter id="130" variable="VALID_TO" parameterType="Control" dataType="Text" parameterSource="VALID_TO"/>
<SQLParameter id="131" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="132" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="133" variable="P_SERVICE_TYPE_ID" parameterType="Control" dataType="Float" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="112" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="113" field="SERVICE_NAME" dataType="Text" parameterType="Control" parameterSource="SERVICE_NAME"/>
<CustomParameter id="114" field="VALID_FROM" dataType="Date" parameterType="Control" parameterSource="VALID_FROM"/>
<CustomParameter id="115" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="116" field="VALID_TO" dataType="Date" parameterType="Control" parameterSource="VALID_TO"/>
<CustomParameter id="117" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="118" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="119" field="P_SERVICE_GROUP_ID" dataType="Float" parameterType="Control" parameterSource="P_SERVICE_GROUP_ID"/>
<CustomParameter id="120" field="SERVICE_GROUP_CODE" dataType="Text" parameterType="Control" parameterSource="SERVICE_GROUP_CODE"/>
<CustomParameter id="121" field="LISTING_NO" dataType="Float" parameterType="Control" parameterSource="LISTING_NO"/>
<CustomParameter id="122" field="P_CHARGING_METHOD_ID" dataType="Text" parameterType="Control" parameterSource="P_CHARGING_METHOD_ID"/>
<CustomParameter id="123" field="CHARGING_METHOD_CODE" dataType="Text" parameterType="Control" parameterSource="CHARGING_METHOD_CODE"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="135" variable="P_SERVICE_TYPE_ID" parameterType="Control" dataType="Float" parameterSource="P_SERVICE_TYPE_ID" defaultValue="0"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_service_type.php" forShow="True" url="p_service_type.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_service_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="78"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="79"/>
			</Actions>
		</Event>
	</Events>
</Page>
