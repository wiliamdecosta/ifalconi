<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bil_data" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" pasteActions="pasteActions">
	<Components>
		<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="V_SUBS_OT_PROMO_SERVICE1" dataSource="V_SUBS_OT_PROMO_SERVICE" errorSummator="Error" wizardCaption=" V SUBS OT PROMO SERVICE " wizardFormMethod="post" PathID="V_SUBS_OT_PROMO_SERVICE1">
<Components>
<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" PathID="V_SUBS_OT_PROMO_SERVICE1Button_Insert">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" PathID="V_SUBS_OT_PROMO_SERVICE1Button_Update">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="5" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" PathID="V_SUBS_OT_PROMO_SERVICE1Button_Delete">
<Components/>
<Events>
<Event name="OnClick" type="Client">
<Actions>
<Action actionName="Confirmation Message" actionCategory="General" id="6" eventType="Client"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Button>
<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" PathID="V_SUBS_OT_PROMO_SERVICE1Button_Cancel">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SUBSCRIBER_ID" fieldSource="SUBSCRIBER_ID" required="True" caption="SUBSCRIBER ID" wizardCaption="SUBSCRIBER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_SERVICE1SUBSCRIBER_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_ONETIME_PROMOTION_ID" fieldSource="P_ONETIME_PROMOTION_ID" required="True" caption="P ONETIME PROMOTION ID" wizardCaption="P ONETIME PROMOTION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_SERVICE1P_ONETIME_PROMOTION_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="PROMOTION_DATE" fieldSource="PROMOTION_DATE" required="True" caption="PROMOTION DATE" wizardCaption="PROMOTION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_SERVICE1PROMOTION_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="11" name="DatePicker_PROMOTION_DATE" control="PROMOTION_DATE" wizardSatellite="True" wizardControl="PROMOTION_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/pips/Images/DatePicker.gif" style="../Styles/pips/Style.css" PathID="V_SUBS_OT_PROMO_SERVICE1DatePicker_PROMOTION_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_SERVICE1DESCRIPTION">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_SERVICE1UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<DatePicker id="14" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/pips/Images/DatePicker.gif" style="../Styles/pips/Style.css" PathID="V_SUBS_OT_PROMO_SERVICE1DatePicker_UPDATE_DATE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</DatePicker>
<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_SERVICE1UPDATE_BY">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OT_PROMO_CODE" fieldSource="OT_PROMO_CODE" required="True" caption="OT PROMO CODE" wizardCaption="OT PROMO CODE" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="V_SUBS_OT_PROMO_SERVICE1OT_PROMO_CODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
<Events/>
<TableParameters>
<TableParameter id="17" conditionType="Parameter" useIsNull="False" field="SUBS_OT_PROMO_SERVICE_ID" parameterSource="SUBS_OT_PROMO_SERVICE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="sub_promo_form.php" forShow="True" url="sub_promo_form.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events/>
</Page>
