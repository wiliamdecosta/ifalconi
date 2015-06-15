<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM P_REGION_LEVEL
WHERE UPPER(LEVEL_NAME) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%')
OR UPPER(LEVEL_NUMBER) LIKE UPPER('%{s_keyword}%')" name="P_REGION_LEVEL" orderBy="P_REGION_LEVEL_ID" pageSizeLimit="100" wizardCaption=" P REGION LEVEL " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no record" pasteActions="pasteActions">
			<Components>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="LEVEL_NAME" fieldSource="LEVEL_NAME" wizardCaption="LEVEL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGION_LEVELLEVEL_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Float" html="False" name="LEVEL_NUMBER" fieldSource="LEVEL_NUMBER" wizardCaption="LEVEL NUMBER" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_REGION_LEVELLEVEL_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGION_LEVELDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="31" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="57" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_APPL_Insert" PathID="P_REGION_LEVELP_APPL_Insert" hrefSource="p_region_level.ccp" wizardUseTemplateBlock="False" removeParameters="P_REGION_LEVEL_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="52" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_REGION_LEVELDLink" hrefSource="p_region_level.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="54" sourceType="DataField" name="P_REGION_LEVEL_ID" source="P_REGION_LEVEL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REGION_LEVEL_ID" fieldSource="P_REGION_LEVEL_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_region_level.ccp" wizardThemeItem="GridA" PathID="P_REGION_LEVELP_REGION_LEVEL_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_REGION_LEVEL_ID" source="P_REGION_LEVEL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="55"/>
						<Action actionName="Set Row Style" actionCategory="General" id="56" styles="Row;AltRow"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="LEVEL_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="46" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_REGION_LEVELSearch" wizardCaption=" P REGION LEVEL " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_region_level.ccp" PathID="P_REGION_LEVELSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_REGION_LEVELSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="61" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_REGION_LEVELSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="32" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_region_level1" connection="Conn" dataSource="SELECT * FROM P_REGION_LEVEL
WHERE P_REGION_LEVEL_ID = {P_REGION_LEVEL_ID}" customInsertType="SQL" customInsert="INSERT INTO P_REGION_LEVEL (P_REGION_LEVEL_ID, LEVEL_NAME, LEVEL_NUMBER, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES(GENERATE_ID('BILLDB','P_REGION_LEVEL','P_REGION_LEVEL_ID'),'{LEVEL_NAME}',{LEVEL_NUMBER},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_REGION_LEVEL SET
LEVEL_NAME = '{LEVEL_NAME}',
LEVEL_NUMBER = {LEVEL_NUMBER},
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_REGION_LEVEL_ID = {P_REGION_LEVEL_ID}" customDeleteType="SQL" customDelete="DELETE P_REGION_LEVEL
WHERE P_REGION_LEVEL_ID = {P_REGION_LEVEL_ID}" PathID="p_region_level1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LEVEL_NAME" caption="LEVEL NAME" fieldSource="LEVEL_NAME" required="True" PathID="p_region_level1LEVEL_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="LEVEL_NUMBER" caption="LEVEL NUMBER" fieldSource="LEVEL_NUMBER" required="True" PathID="p_region_level1LEVEL_NUMBER">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" caption="DESCRIPTION" fieldSource="DESCRIPTION" required="False" PathID="p_region_level1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" caption="UPDATE DATE" fieldSource="UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate" required="True" PathID="p_region_level1UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="47" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" removeParameters="TAMBAH;s_keyword;P_REGION_LEVELPage" PathID="p_region_level1Button_Insert">
					<Components/>
					<Events>
<Event name="OnClick" type="Client">
<Actions>
<Action actionName="Confirmation Message" actionCategory="General" id="89" message="Are you sure wan to save this record?"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="48" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" removeParameters="TAMBAH" PathID="p_region_level1Button_Update">
					<Components/>
					<Events>
<Event name="OnClick" type="Client">
<Actions>
<Action actionName="Confirmation Message" actionCategory="General" id="90" message="Are you sure want to update this record?"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" removeParameters="TAMBAH;P_REGION_LEVEL_ID;P_REGION_LEVELPage;s_keyword" PathID="p_region_level1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="62" message="Are you sure want to delete this record ?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" removeParameters="TAMBAH;s_keyword;P_REGION_LEVELPage" PathID="p_region_level1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="63" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_LEVEL_ID" caption="LEVEL NAME" fieldSource="P_REGION_LEVEL_ID" required="False" PathID="p_region_level1P_REGION_LEVEL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" caption="UPDATE BY" fieldSource="UPDATE_BY" defaultValue="CCGetUserLogin()" required="True" PathID="p_region_level1UPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="64" eventType="Server"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="65"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="P_REGION_LEVEL_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" parameterSource="P_REGION_LEVEL_ID" logicOperator="And" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="66" variable="P_REGION_LEVEL_ID" dataType="Float" parameterType="URL" parameterSource="P_REGION_LEVEL_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="67" variable="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
				<SQLParameter id="68" variable="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER" defaultValue="0"/>
				<SQLParameter id="69" variable="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<SQLParameter id="70" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="71" field="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
				<CustomParameter id="72" field="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER"/>
				<CustomParameter id="73" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="74" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
				<CustomParameter id="75" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="76" field="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="LEVEL_NAME1"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="77" variable="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
				<SQLParameter id="78" variable="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER" defaultValue="0"/>
				<SQLParameter id="79" variable="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<SQLParameter id="80" variable="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_LEVEL_ID" defaultValue="0"/>
				<SQLParameter id="81" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="82" field="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
				<CustomParameter id="83" field="LEVEL_NUMBER" dataType="Float" parameterType="Control" parameterSource="LEVEL_NUMBER"/>
				<CustomParameter id="84" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="85" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="86" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="87" field="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="LEVEL_NAME1"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="88" variable="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_LEVEL_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_region_level.php" forShow="True" url="p_region_level.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_region_level_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="58"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="60"/>
			</Actions>
		</Event>
	</Events>
</Page>
