<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_service_type" name="P_SERVICE_TYPE" orderBy="P_SERVICE_TYPE_ID" pageSizeLimit="100" wizardCaption=" P SERVICE TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Link id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_SERVICE_TYPE_ID" fieldSource="P_SERVICE_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_service_type.ccp" wizardThemeItem="GridA" PathID="P_SERVICE_TYPEP_SERVICE_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="22" sourceType="DataField" format="yyyy-mm-dd" name="P_SERVICE_TYPE_ID" source="P_SERVICE_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
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
				<Label id="28" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_SERVICE_GROUP_ID" fieldSource="P_SERVICE_GROUP_ID" wizardCaption="P SERVICE GROUP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_SERVICE_TYPEP_SERVICE_GROUP_ID">
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
				<Label id="36" fieldSourceType="DBColumn" dataType="Date" html="False" name="CREATION_DATE" fieldSource="CREATION_DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPECREATION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="False" name="CREATED_BY" fieldSource="CREATED_BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPECREATED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="40" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATED_DATE" fieldSource="UPDATED_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEUPDATED_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATED_BY" fieldSource="UPDATED_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_SERVICE_TYPEUPDATED_BY">
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
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="SERVICE_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
				<Field id="6" tableName="P_SERVICE_TYPE" fieldName="P_SERVICE_TYPE_ID"/>
				<Field id="23" tableName="P_SERVICE_TYPE" fieldName="CODE"/>
				<Field id="25" tableName="P_SERVICE_TYPE" fieldName="SERVICE_NAME"/>
				<Field id="27" tableName="P_SERVICE_TYPE" fieldName="P_SERVICE_GROUP_ID"/>
				<Field id="29" tableName="P_SERVICE_TYPE" fieldName="VALID_FROM"/>
				<Field id="31" tableName="P_SERVICE_TYPE" fieldName="VALID_TO"/>
				<Field id="33" tableName="P_SERVICE_TYPE" fieldName="DESCRIPTION"/>
				<Field id="35" tableName="P_SERVICE_TYPE" fieldName="CREATION_DATE"/>
				<Field id="37" tableName="P_SERVICE_TYPE" fieldName="CREATED_BY"/>
				<Field id="39" tableName="P_SERVICE_TYPE" fieldName="UPDATED_DATE"/>
				<Field id="41" tableName="P_SERVICE_TYPE" fieldName="UPDATED_BY"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_SERVICE_TYPESearch" wizardCaption=" P SERVICE TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_service_type.ccp" PathID="P_SERVICE_TYPESearch" pasteActions="pasteActions">
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
		<Record id="44" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_service_type1" dataSource="p_service_type" errorSummator="Error" wizardCaption=" P Service Type " wizardFormMethod="post" PathID="p_service_type1" pasteActions="pasteActions">
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
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_SERVICE_GROUP_ID" fieldSource="P_SERVICE_GROUP_ID" required="True" caption="P SERVICE GROUP ID" wizardCaption="P SERVICE GROUP ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1P_SERVICE_GROUP_ID">
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
				<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1CREATED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1UPDATED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="56" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="VALID_TO" fieldSource="VALID_TO" required="False" caption="VALID TO" wizardCaption="VALID TO" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1VALID_TO">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1CREATION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_service_type1UPDATED_DATE">
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
