{if $action eq 8}
  <div class="messages status no-popup">
    {icon icon="fa-info-circle"}{/icon}
    {$deleteMessage|smarty:nodefaults}
  </div>
{else}
  <div class="crm-submit-buttons">
  {include file="CRM/common/formButtons.tpl" location="top"}
  </div>

  {foreach from=$elementNames item=elementName}
    <div class="crm-section">
      <div class="label">{$form.$elementName.label}</div>
      <div class="content">{$form.$elementName.html}</div>
      <div class="clear"></div>
    </div>
  {/foreach}
{/if}

<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
