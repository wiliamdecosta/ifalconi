<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\pay_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn_Pay" dataSource="SELECT P_CALL_ITEM.*, TO_CHAR(P_CALL_ITEM.UPDATE_DATE, 'DD-MON-YYYY') as UPDATE_DATE1
FROM P_CALL_ITEM

" name="P_CALL_ITEMGrid" orderBy="P_BILL_CYCLE_ID" pageSizeLimit="100" wizardCaption=" P BILL CYCLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="CALL_ITEM" fieldSource="CALL_ITEM" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CALL_ITEMGridCALL_ITEM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CALL_ITEMGridDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_DATE" fieldSource="UPDATE_DATE1" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CALL_ITEMGridUPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATE_BY" fieldSource="UPDATE_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CALL_ITEMGridUPDATE_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="37" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link_Insert" hrefSource="p_call_item.ccp" removeParameters="P_CALL_ITEM_ID;FLAG;s_keyword;P_CALL_ITEMPage;P_CALL_ITEMPageSize;P_CALL_ITEMOrder;P_CALL_ITEMDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_CALL_ITEMGridLink_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="68"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="87" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_CALL_ITEMGridDLink" hrefSource="p_call_item.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CALL_ITEM_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="88" sourceType="DataField" name="P_CALL_ITEM_ID" source="P_CALL_ITEM_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="89" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_CALL_ITEMGridADLink" hrefSource="p_call_item.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CALL_ITEM_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="55" sourceType="DataField" format="yyyy-mm-dd" name="P_CALL_ITEM_ID" source="P_CALL_ITEM_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CALL_ITEM_ID" fieldSource="P_CALL_ITEM_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_call_item.ccp" wizardThemeItem="GridA" PathID="P_CALL_ITEMGridP_CALL_ITEM_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="20" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_CYCLE_ID" source="P_BILL_CYCLE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="69" styles="Row;AltRow"/>
						<Action actionName="Custom Code" actionCategory="General" id="70"/>
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
				<SQLParameter id="106" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_CALL_ITEMSearch" wizardCaption=" P BILL CYCLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_call_item.ccp" PathID="P_CALL_ITEMSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_CALL_ITEMSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_CALL_ITEMSearchButton_DoSearch">
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
		<Record id="38" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn_Pay" name="P_CALL_ITEMForm" dataSource="SELECT * 
FROM P_CALL_ITEM
WHERE P_CALL_ITEM_ID={P_CALL_ITEM_ID}
" errorSummator="Error" wizardCaption=" P Bill Cycle " wizardFormMethod="post" PathID="P_CALL_ITEMForm" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_CALL_ITEM
(P_CALL_ITEM_ID,
CALL_ITEM,
DESCRIPTION,
UPDATE_DATE, 
UPDATE_BY) 
VALUES
(GENERATE_ID('PAYTV','P_CALL_ITEM','P_CALL_ITEM_ID'),
UPPER(TRIM('{CALL_ITEM}')),
INITCAP(TRIM('{DESCRIPTION}')),
sysdate, 
'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_CALL_ITEM SET 
CALL_ITEM=UPPER(TRIM('{CALL_ITEM}')),
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATE_DATE=sysdate,
UPDATE_BY='{UPDATE_BY}'
WHERE  P_CALL_ITEM_ID = {P_CALL_ITEM_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_CALL_ITEM WHERE P_CALL_ITEM_ID= {P_CALL_ITEM_ID}">
			<Components>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CALL_ITEM" fieldSource="CALL_ITEM" required="True" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CALL_ITEMFormCALL_ITEM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CALL_ITEMFormDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CALL_ITEMFormUPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CALL_ITEMFormUPDATE_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_CALL_ITEMFormButton_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="58" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="59" message="Anda Yakin Menyimpan Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="60" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_CALL_ITEMFormButton_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="61" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="62" message="Anda Yakin Mengubah Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="63" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_CALL_ITEMFormButton_Delete" removeParameters="TAMBAH;P_CALL_ITEM_ID;s_keyword;P_CALL_ITEMPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="64" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="65" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="66" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_CALL_ITEMFormButton_Cancel" removeParameters="TAMBAH;s_keyword;P_CALL_ITEMPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="67" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_CALL_ITEM_ID" fieldSource="P_CALL_ITEM_ID" required="False" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_CALL_ITEMFormP_CALL_ITEM_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="P_BILL_CYCLE_ID" parameterSource="P_BILL_CYCLE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="108" parameterType="URL" variable="P_CALL_ITEM_ID" dataType="Float" parameterSource="P_CALL_ITEM_ID" defaultValue="null"/>
			</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="81" variable="CALL_ITEM" parameterType="Control" dataType="Text" parameterSource="CALL_ITEM"/>
				<SQLParameter id="84" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="86" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY" defaultValue="null"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="73" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="74" field="START_DAY" dataType="Float" parameterType="Control" parameterSource="START_DAY"/>
				<CustomParameter id="75" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="76" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="77" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="78" field="END_DAY" dataType="Float" parameterType="Control" parameterSource="END_DAY"/>
				<CustomParameter id="79" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="80" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="98" variable="CALL_ITEM" parameterType="Control" dataType="Text" parameterSource="CALL_ITEM"/>
				<SQLParameter id="100" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="103" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
				<SQLParameter id="104" variable="P_CALL_ITEM_ID" parameterType="Control" defaultValue="null" dataType="Float" parameterSource="P_CALL_ITEM_ID"/>
			</USQLParameters>
			<UConditions/>
			<UFormElements>
				<CustomParameter id="90" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
				<CustomParameter id="91" field="START_DAY" dataType="Float" parameterType="Control" parameterSource="START_DAY"/>
				<CustomParameter id="92" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
				<CustomParameter id="93" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
				<CustomParameter id="94" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
				<CustomParameter id="95" field="END_DAY" dataType="Float" parameterType="Control" parameterSource="END_DAY"/>
				<CustomParameter id="96" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="97" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="105" variable="P_CALL_ITEM_ID" parameterType="Control" defaultValue="null" dataType="Float" parameterSource="P_CALL_ITEM_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_call_item_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_call_item.php" forShow="True" url="p_call_item.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="71"/>
			</Actions>
		</Event>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="72"/>
			</Actions>
		</Event>
	</Events>
</Page>
