<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="p_bill_cycle" name="P_BILL_CYCLE" orderBy="P_BILL_CYCLE_ID" pageSizeLimit="100" wizardCaption=" P BILL CYCLE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_CYCLECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Float" html="False" name="START_DAY" fieldSource="START_DAY" wizardCaption="START DAY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_CYCLESTART_DAY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Float" html="False" name="END_DAY" fieldSource="END_DAY" wizardCaption="END DAY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_BILL_CYCLEEND_DAY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_CYCLEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="30" fieldSourceType="DBColumn" dataType="Date" html="False" name="CREATION_DATE" fieldSource="CREATION_DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_CYCLECREATION_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" name="CREATED_BY" fieldSource="CREATED_BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_CYCLECREATED_BY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="34" fieldSourceType="DBColumn" dataType="Date" html="False" name="UPDATED_DATE" fieldSource="UPDATED_DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_CYCLEUPDATED_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="False" name="UPDATED_BY" fieldSource="UPDATED_BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_BILL_CYCLEUPDATED_BY">
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
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_CYCLE_Insert" hrefSource="p_bill_cycle.ccp" removeParameters="P_BILL_CYCLE_ID;FLAG;s_keyword;P_BILL_CYCLEPage;P_BILL_CYCLEPageSize;P_BILL_CYCLEOrder;P_BILL_CYCLEDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_BILL_CYCLEP_BILL_CYCLE_Insert">
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
				<Link id="87" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_BILL_CYCLEDLink" hrefSource="p_bill_cycle.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILL_CYCLE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="88" sourceType="DataField" name="P_BILL_CYCLE_ID" source="P_BILL_CYCLE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="89" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_BILL_CYCLEADLink" hrefSource="p_bill_cycle.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_BILL_CYCLE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="55" sourceType="DataField" format="yyyy-mm-dd" name="P_BILL_CYCLE_ID" source="P_BILL_CYCLE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_BILL_CYCLE_ID" fieldSource="P_BILL_CYCLE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_bill_cycle.ccp" wizardThemeItem="GridA" PathID="P_BILL_CYCLEP_BILL_CYCLE_ID">
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
				<Field id="6" tableName="P_BILL_CYCLE" fieldName="P_BILL_CYCLE_ID"/>
				<Field id="21" tableName="P_BILL_CYCLE" fieldName="CODE"/>
				<Field id="23" tableName="P_BILL_CYCLE" fieldName="START_DAY"/>
				<Field id="25" tableName="P_BILL_CYCLE" fieldName="END_DAY"/>
				<Field id="27" tableName="P_BILL_CYCLE" fieldName="DESCRIPTION"/>
				<Field id="29" tableName="P_BILL_CYCLE" fieldName="CREATION_DATE"/>
				<Field id="31" tableName="P_BILL_CYCLE" fieldName="CREATED_BY"/>
				<Field id="33" tableName="P_BILL_CYCLE" fieldName="UPDATED_DATE"/>
				<Field id="35" tableName="P_BILL_CYCLE" fieldName="UPDATED_BY"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_BILL_CYCLESearch" wizardCaption=" P BILL CYCLE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_bill_cycle.ccp" PathID="P_BILL_CYCLESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_BILL_CYCLESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_BILL_CYCLESearchButton_DoSearch">
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
		<Record id="38" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_bill_cycle1" dataSource="p_bill_cycle" errorSummator="Error" wizardCaption=" P Bill Cycle " wizardFormMethod="post" PathID="p_bill_cycle1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters" customInsert="INSERT INTO P_BILL_CYCLE (P_BILL_CYCLE_ID,CODE,START_DAY,END_DAY,DESCRIPTION,CREATION_DATE,CREATED_BY,UPDATED_DATE, UPDATED_BY) 
VALUES
(GENERATE_ID('TRB','P_BILL_CYCLE','P_BILL_CYCLE_ID'),UPPER(TRIM('{CODE}')),{START_DAY},{END_DAY},INITCAP(TRIM('{DESCRIPTION}')),sysdate,'{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_BILL_CYCLE SET 
CODE=UPPER(TRIM('{CODE}')),
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
START_DAY={START_DAY},
END_DAY={END_DAY},
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}'
WHERE  P_BILL_CYCLE_ID = {P_BILL_CYCLE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_BILL_CYCLE WHERE P_BILL_CYCLE_ID = {P_BILL_CYCLE_ID}">
			<Components>
				<TextBox id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="START_DAY" fieldSource="START_DAY" required="True" caption="START DAY" wizardCaption="START DAY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1START_DAY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="END_DAY" fieldSource="END_DAY" required="False" caption="END DAY" wizardCaption="END DAY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1END_DAY">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_bill_cycle1Button_Insert" removeParameters="TAMBAH;s_keyword">
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
				<Button id="60" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_bill_cycle1Button_Update" removeParameters="TAMBAH">
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
				<Button id="63" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_bill_cycle1Button_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage">
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
				<Button id="66" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="p_bill_cycle1Button_Cancel" removeParameters="TAMBAH;s_keyword;P_APP_ROLEPage">
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
				<Hidden id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_BILL_CYCLE_ID" fieldSource="P_BILL_CYCLE_ID" required="False" caption="P_BILL_CYCLE_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_bill_cycle1P_BILL_CYCLE_ID">
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
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="81" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="82" variable="START_DAY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_DAY"/>
				<SQLParameter id="83" variable="END_DAY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="END_DAY"/>
				<SQLParameter id="84" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="85" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
				<SQLParameter id="86" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
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
				<SQLParameter id="98" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
				<SQLParameter id="100" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
				<SQLParameter id="101" variable="START_DAY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="START_DAY"/>
				<SQLParameter id="102" variable="END_DAY" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="END_DAY"/>
				<SQLParameter id="103" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
				<SQLParameter id="104" variable="P_BILL_CYCLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_CYCLE_ID"/>
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
				<SQLParameter id="105" variable="P_BILL_CYCLE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BILL_CYCLE_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_bill_cycle.php" forShow="True" url="p_bill_cycle.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_bill_cycle_events.php" forShow="False" comment="//" codePage="windows-1252"/>
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
