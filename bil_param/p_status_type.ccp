<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM p_status_type
WHERE ( UPPER(CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%') ) 
ORDER BY P_STATUS_TYPE_ID" name="P_STATUS_TYPE" orderBy="P_STATUS_TYPE_ID" pageSizeLimit="100" wizardCaption=" P STATUS TYPE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_STATUS_TYPECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_STATUS_TYPEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="31" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="89" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_STATUS_TYPE_Insert" hrefSource="p_status_type.ccp" removeParameters="P_STATUS_TYPE_ID;FLAG;s_keyword;P_STATUS_TYPEPage;P_STATUS_TYPEPageSize;P_STATUS_TYPEOrder;P_STATUS_TYPEDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_STATUS_TYPEP_STATUS_TYPE_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="58"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="87" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_STATUS_TYPEDLink" hrefSource="p_status_type.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_STATUS_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="88" sourceType="DataField" name="P_STATUS_TYPE_ID" source="P_STATUS_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_STATUS_TYPE_ID" fieldSource="P_STATUS_TYPE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_status_type.ccp" wizardThemeItem="GridA" PathID="P_STATUS_TYPEP_STATUS_TYPE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_STATUS_TYPE_ID" source="P_STATUS_TYPE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="95"/>
						<Action actionName="Set Row Style" actionCategory="General" id="94" styles="Row;AltRow"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="DESCRIPTION" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="91" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_STATUS_TYPESearch" wizardCaption=" P STATUS TYPE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_status_type.ccp" PathID="P_STATUS_TYPESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_STATUS_TYPESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_STATUS_TYPESearchButton_DoSearch">
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
		<Record id="32" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_status_type1" dataSource="SELECT * 
FROM p_status_type
WHERE P_STATUS_TYPE_ID = {P_STATUS_TYPE_ID} " errorSummator="Error" wizardCaption=" P Status Type " wizardFormMethod="post" PathID="p_status_type1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customInsert="INSERT INTO P_STATUS_TYPE (P_STATUS_TYPE_ID,CODE,LISTING_NO,DESCRIPTION,UPDATE_DATE, UPDATE_BY) 
VALUES
(GENERATE_ID('BILLDB','P_STATUS_TYPE','P_STATUS_TYPE_ID'),
UPPER(TRIM('{CODE}')),
{LISTING_NO},
INITCAP(TRIM('{DESCRIPTION}')),
sysdate, 
'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_STATUS_TYPE SET 
CODE=UPPER(TRIM('{CODE}')),
LISTING_NO = {LISTING_NO},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_STATUS_TYPE_ID = {P_STATUS_TYPE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_STATUS_TYPE WHERE P_STATUS_TYPE_ID = {P_STATUS_TYPE_ID}" pasteAsReplace="pasteAsReplace">
			<Components>
				<TextBox id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_type1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_type1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="47" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_status_type1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_status_type1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="53" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_status_type1Button_Delete" removeParameters="P_STATUS_TYPE_ID;FLAG">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="54" message="Hapus Record?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="56" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="p_status_type1Button_Cancel" removeParameters="FLAG">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_STATUS_TYPE_ID" fieldSource="P_STATUS_TYPE_ID" required="False" caption="P_STATUS_TYPE_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_type1P_STATUS_TYPE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_type1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LISTING_NO" PathID="p_status_type1LISTING_NO" fieldSource="LISTING_NO" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_status_type1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="97"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="98"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="102"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="103"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="104"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteDelete" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="105"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="P_STATUS_TYPE_ID" parameterSource="P_STATUS_TYPE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="93" parameterType="URL" variable="P_STATUS_TYPE_ID" dataType="Float" parameterSource="P_STATUS_TYPE_ID"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="92" tableName="p_status_type" posWidth="155" posHeight="152" posLeft="10" posTop="10"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="71" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="72" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="73" variable="UPDATE_BY" parameterType="Session" dataType="Text" parameterSource="UserName"/>
				<SQLParameter id="100" variable="LISTING_NO" parameterType="Control" dataType="Float" parameterSource="LISTING_NO" defaultValue="0"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="64" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="65" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="66" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="67" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="68" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
				<CustomParameter id="69" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
				<CustomParameter id="70" field="P_STATUS_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_STATUS_TYPE_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="82" variable="P_STATUS_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_STATUS_TYPE_ID"/>
				<SQLParameter id="83" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="84" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="85" variable="UPDATE_BY" parameterType="Session" dataType="Text" parameterSource="UserName"/>
				<SQLParameter id="101" variable="LISTING_NO" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="LISTING_NO"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="75" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="76" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="77" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="78" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="79" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="80" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="81" field="P_STATUS_TYPE_ID" dataType="Text" parameterType="Control" parameterSource="P_STATUS_TYPE_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="86" variable="P_STATUS_TYPE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_STATUS_TYPE_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_status_type.php" forShow="True" url="p_status_type.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_status_type_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="61"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="96"/>
			</Actions>
		</Event>
	</Events>
</Page>
