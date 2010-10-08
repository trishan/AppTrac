{include file="header.tpl"}

<div id="content">

<h2>Recent activity</h2>
<ul>
{foreach from=$activities item=activity}
	<li>{$activity.time} {$activity.name} {$activity.action} {$activity.extra}</li>
{/foreach}
</ul>

{include file="footer.tpl"}
