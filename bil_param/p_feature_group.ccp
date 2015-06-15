<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="pips" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="5" connection="Conn" name="FEATUREGROUP_GRID" pageSizeLimit="100" wizardCaption=" P REGION LEVEL " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no record" pasteActions="pasteActions" activeCollection="SQLParameters" dataSource="SELECT * 
FROM P_FEATURE_GROUP
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')
OR UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%')" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="LEVEL NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="FEATUREGROUP_GRIDCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="FEATUREGROUP_GRIDDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="FG_NEW" PathID="FEATUREGROUP_GRIDFG_NEW" hrefSource="p_feature_group.ccp" wizardUseTemplateBlock="False" removeParameters="P_FEATURE_GROUP_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="59"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="130" sourceType="Expression" name="FLAG" source="&quot;ADD&quot;"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="53" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="FEATUREGROUP_GRIDDLink" hrefSource="p_feature_group.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="90" sourceType="DataField" name="P_FEATURE_GROUP_ID" source="P_FEATURE_GROUP_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_FEATURE_GROUP_ID" fieldSource="P_FEATURE_GROUP_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_feature_group.ccp" wizardThemeItem="GridA" PathID="FEATUREGROUP_GRIDP_FEATURE_GROUP_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_REGION_LEVEL_ID" source="P_REGION_LEVEL_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
				<Navigator id="133" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardTheme="sikm" wizardThemeVersion="3.0" wizardUsePageScroller="True">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="134"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
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
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="LEVEL_NAME" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="Form" orderNumber="1" leftBrackets="1" rightBrackets="0" parameterSource="s_keyword"/>
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
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="FG_SEARCH" wizardCaption=" P REGION LEVEL " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_feature_group.ccp" PathID="FG_SEARCH" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="FG_SEARCHs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="61" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="FG_SEARCHButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;P_FEATURE_GROUP_ID">
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
		<Record id="91" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="FEATUREGROUP_RECORD" dataSource="p_feature_group" errorSummator="Error" wizardCaption=" P Feature Group " wizardFormMethod="post" PathID="FEATUREGROUP_RECORD" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="USQLParameters" customInsertType="SQL" parameterTypeListName="ParameterTypeList" customInsert="INSERT INTO p_feature_group(
P_FEATURE_GROUP_ID,
CODE, 
DESCRIPTION, 
UPDATE_DATE, 
UPDATE_BY) VALUES(
GENERATE_ID('BILLDB','p_feature_group','P_FEATURE_GROUP_ID'),
UPPER('{CODE}'), 
'{DESCRIPTION}', 
SYSDATE, 
'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE p_feature_group SET 
CODE=UPPER('{CODE}'), 
DESCRIPTION='{DESCRIPTION}', 
UPDATE_DATE=SYSDATE,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_FEATURE_GROUP_ID = {P_FEATURE_GROUP_ID}"><Components><Button id="92" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="FEATUREGROUP_RECORDButton_Insert" removeParameters="TAMBAH"><Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="93" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="FEATUREGROUP_RECORDButton_Update" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="94" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="FEATUREGROUP_RECORDButton_Delete" removeParameters="TAMBAH;P_FEATURE_GROUP_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="95" message="Delete Record ?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="96" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="FEATUREGROUP_RECORDButton_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATUREGROUP_RECORDCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATUREGROUP_RECORDDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATUREGROUP_RECORDUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="FEATUREGROUP_RECORDUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="103" fieldSourceType="DBColumn" dataType="Text" name="P_FEATURE_GROUP_ID" PathID="FEATUREGROUP_RECORDP_FEATURE_GROUP_ID" fieldSource="P_FEATURE_GROUP_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="115"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="116"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="128"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteUpdate" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="129"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteDelete" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="131"/>
</Actions>
</Event>
<Event name="AfterExecuteDelete" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="132"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="97" conditionType="Parameter" useIsNull="False" field="P_FEATURE_GROUP_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" parameterSource="P_FEATURE_GROUP_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="104" tableName="p_feature_group" posLeft="10" posTop="10" posWidth="158" posHeight="136"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="110" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="111" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="112" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="113" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="114" variable="P_FEATURE_GROUP_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_GROUP_ID"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="105" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="106" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="107" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="108" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="109" field="P_FEATURE_GROUP_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_GROUP_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="123" variable="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<SQLParameter id="124" variable="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<SQLParameter id="125" variable="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<SQLParameter id="126" variable="UPDATE_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
				<SQLParameter id="127" variable="P_FEATURE_GROUP_ID" dataType="Float" parameterType="Control" parameterSource="P_FEATURE_GROUP_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="117" conditionType="Parameter" useIsNull="False" field="P_FEATURE_GROUP_ID" dataType="Float" parameterType="URL" parameterSource="P_FEATURE_GROUP_ID" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="118" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="119" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="120" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="121" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="122" field="P_FEATURE_GROUP_ID" dataType="Text" parameterType="Control" parameterSource="P_FEATURE_GROUP_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_feature_group_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_feature_group.php" forShow="True" url="p_feature_group.php" comment="//" codePage="windows-1252"/>
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
