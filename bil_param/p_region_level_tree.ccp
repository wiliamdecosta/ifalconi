<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" pasteActions="pasteActions" needGeneration="0">
	<Components>
		<Grid id="393" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * 
FROM P_REGION
WHERE NVL(PARENT_ID,0) = {PARENT_ID} 
	AND( UPPER(REGION_NAME) LIKE UPPER('%{s_keyword}%') OR
		UPPER(DESCRIPTION) LIKE UPPER('%{s_keyword}%') ) 
ORDER BY P_REGION_ID ASC" name="P_REGIONGridPage" pageSizeLimit="100" wizardCaption=" P REGION " wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data not found" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="SQLParameters" parameterTypeListName="ParameterTypeList">
			<Components>
				<Label id="399" fieldSourceType="DBColumn" dataType="Text" html="False" name="REGION_NAME" fieldSource="REGION_NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGIONGridPageREGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="401" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImagesScheme="Basic">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="52" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_REGIONGridPageDLink" hrefSource="p_region_level_tree.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REGION_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="235" sourceType="DataField" name="P_REGION_ID" source="P_REGION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="54" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_REGIONGridPageADLink" hrefSource="p_region_level_tree.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_REGION_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="236" sourceType="DataField" name="P_REGION_ID" source="P_REGION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="406" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_REGION_ID" PathID="P_REGIONGridPageP_REGION_ID" fieldSource="P_REGION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Hidden id="428" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_LEVEL_ID" PathID="P_REGIONGridPageP_REGION_LEVEL_ID" fieldSource="P_REGION_LEVEL_ID" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Label id="429" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" PathID="P_REGIONGridPageDESCRIPTION" fieldSource="DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="318" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="BATCH_Insert1" hrefSource="p_region_level_tree.ccp" removeParameters="P_REGION_ID;FLAG;s_keyword" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_REGIONGridPageBATCH_Insert1" fieldSource="P_REGION_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="319" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="320" sourceType="DataField" name="P_REGION_ID" source="P_REGION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="468" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARENT_ID" PathID="P_REGIONGridPagePARENT_ID" fieldSource="PARENT_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="477"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="402" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="403"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="397" conditionType="Parameter" useIsNull="False" field="REGION_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="405" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
				<SQLParameter id="467" variable="PARENT_ID" parameterType="URL" defaultValue="0" dataType="Float" parameterSource="PARENT_ID"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="394" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_REGIONSearch" wizardCaption=" P REGION " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_region_level_tree.ccp" PathID="P_REGIONSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" removeParameters="P_REGION_ID">
			<Components>
				<TextBox id="396" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_REGIONSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="474" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARENT_ID" PathID="P_REGIONSearchPARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="475" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_LEVEL_ID" PathID="P_REGIONSearchP_REGION_LEVEL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="476" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" PathID="P_REGIONSearchP_REGION_ID" defaultValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="47" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_REGIONSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
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
		<Record id="407" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_REGION1" dataSource="SELECT A.*,B.LEVEL_NAME,C.BUSINESS_AREA_NAME FROM P_REGION A , P_REGION_LEVEL B , P_BUSINESS_AREA C
WHERE A.P_REGION_LEVEL_ID = B.P_REGION_LEVEL_ID (+)
AND A.P_BUSINESS_AREA_ID = C.P_BUSINESS_AREA_ID (+)
AND P_REGION_ID = {P_REGION_ID}" errorSummator="Error" wizardCaption=" P REGION " wizardFormMethod="post" PathID="P_REGION1" activeCollection="USQLParameters" parameterTypeListName="ParameterTypeList" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsertType="SQL" customUpdateType="SQL" customInsert="/* Formatted on 22/10/2014 15:53:27 (QP5 v5.139.911.3011) */
INSERT INTO P_REGION (P_REGION_ID,
                      REGION_NAME,
                      P_REGION_LEVEL_ID,
                      P_BUSINESS_AREA_ID,
                      PARENT_ID,
                      DESCRIPTION,
                      UPDATE_DATE,
                      UPDATE_BY)
     VALUES (GENERATE_ID('BILLDB','P_REGION','P_REGION_ID'),
             '{REGION_NAME}',
             {P_REGION_LEVEL_ID},
             {P_BUSINESS_AREA_ID},
             {PARENT_ID},
             '{DESCRIPTION}',
             SYSDATE,
             '{UPDATE_BY}')" customUpdate="/* Formatted on 22/10/2014 15:53:27 (QP5 v5.139.911.3011) */
UPDATE P_REGION 
   SET   REGION_NAME = '{REGION_NAME}',
            P_REGION_LEVEL_ID = {P_REGION_LEVEL_ID},
            P_BUSINESS_AREA_ID = {P_BUSINESS_AREA_ID},
            PARENT_ID = {PARENT_ID},
            DESCRIPTION = '{DESCRIPTION}',
            UPDATE_DATE = SYSDATE,
            UPDATE_BY = '{UPDATE_BY}'
WHERE P_REGION_ID = {P_REGION_ID}" customDeleteType="SQL" customDelete="DELETE P_REGION WHERE P_REGION_ID = {P_REGION_ID}">
			<Components>
				<TextBox id="414" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REGION_NAME" fieldSource="REGION_NAME" required="True" caption="REGION NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="415" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LEVEL_NAME" required="True" caption="LEVEL ID" wizardCaption="LEVEL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1LEVEL_NAME" fieldSource="LEVEL_NAME" defaultValue="GenerateBySystem">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="423"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="417" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARENT_ID" fieldSource="PARENT_ID" required="False" caption="PARENT ID" wizardCaption="PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1PARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="418" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="419" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1UPDATE_DATE" format="dd-mmm-yyyy" defaultValue="CurrentDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="421" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="422" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_LEVEL_ID" PathID="P_REGION1P_REGION_LEVEL_ID" fieldSource="P_REGION_LEVEL_ID" visible="Yes">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="469"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Hidden>
				<TextBox id="430" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BUSINESS_AREA_NAME" PathID="P_REGION1BUSINESS_AREA_NAME" fieldSource="BUSINESS_AREA_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="416" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUSINESS_AREA_ID" fieldSource="P_BUSINESS_AREA_ID" required="False" caption="P BUSINESS AREA ID" wizardCaption="P BUSINESS AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1P_BUSINESS_AREA_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="466" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" PathID="P_REGION1P_REGION_ID" fieldSource="P_REGION_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Button id="478" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_REGION1Button_Insert" removeParameters="TAMBAH;s_keyword;P_REGIONGridPagePage" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
<Actions>
<Action actionName="Confirmation Message" actionCategory="General" id="87" message="Are you sure want to save this record?" eventType="Client"/>
</Actions>
</Event>
<Event name="OnClick" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="479"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="48" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" removeParameters="TAMBAH" PathID="P_REGION1Button_Update">
					<Components/>
					<Events>
<Event name="OnClick" type="Client">
<Actions>
<Action actionName="Confirmation Message" actionCategory="General" id="90" message="Are you sure want to update this record?" eventType="Client"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="40" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" removeParameters="TAMBAH;P_REGION_ID;P_REGIONGridPagePage;s_keyword" PathID="P_REGION1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="62" message="Are you sure want to delete this record ?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" removeParameters="TAMBAH;s_keyword;P_REGIONGridPagePage" PathID="P_REGION1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="424"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="464"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteInsert" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="465"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="413" conditionType="Parameter" useIsNull="False" field="P_REGION_ID" parameterSource="P_REGION_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="426" parameterType="URL" variable="P_REGION_ID" dataType="Float" parameterSource="P_REGION_ID"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="440" variable="REGION_NAME" parameterType="Control" dataType="Text" parameterSource="REGION_NAME"/>
				<SQLParameter id="441" variable="P_REGION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_LEVEL_ID"/>
				<SQLParameter id="442" variable="P_BUSINESS_AREA_ID" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="P_BUSINESS_AREA_ID"/>
				<SQLParameter id="443" variable="PARENT_ID" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="PARENT_ID"/>
				<SQLParameter id="444" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="445" variable="UPDATE_BY" parameterType="Session" dataType="Text" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="431" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
				<CustomParameter id="432" field="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
				<CustomParameter id="433" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
				<CustomParameter id="434" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="435" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="436" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="437" field="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_LEVEL_ID"/>
				<CustomParameter id="438" field="BUSINESS_AREA_NAME" dataType="Text" parameterType="Control" parameterSource="BUSINESS_AREA_NAME"/>
				<CustomParameter id="439" field="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="456" variable="REGION_NAME" parameterType="Control" dataType="Text" parameterSource="REGION_NAME"/>
				<SQLParameter id="457" variable="P_REGION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_LEVEL_ID"/>
				<SQLParameter id="458" variable="P_BUSINESS_AREA_ID" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="P_BUSINESS_AREA_ID"/>
				<SQLParameter id="459" variable="PARENT_ID" parameterType="Control" defaultValue="NULL" dataType="Float" parameterSource="PARENT_ID"/>
				<SQLParameter id="460" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="461" variable="UPDATE_BY" parameterType="Session" dataType="Text" parameterSource="UserName"/>
				<SQLParameter id="462" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="447" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
				<CustomParameter id="448" field="LEVEL_NAME" dataType="Text" parameterType="Control" parameterSource="LEVEL_NAME"/>
				<CustomParameter id="449" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
				<CustomParameter id="450" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="451" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="452" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
				<CustomParameter id="453" field="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_LEVEL_ID"/>
				<CustomParameter id="454" field="BUSINESS_AREA_NAME" dataType="Text" parameterType="Control" parameterSource="BUSINESS_AREA_NAME"/>
				<CustomParameter id="455" field="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="463" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_region_level_tree_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_region_level_tree.php" forShow="True" url="p_region_level_tree.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="446"/>
			</Actions>
		</Event>
		<Event name="BeforeInitialize" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="480"/>
</Actions>
</Event>
</Events>
</Page>
