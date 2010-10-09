{include file="header.tpl"}

<div id="content">

<h2>User information</h2>
<p>The following users have profiles in the AppTrac system.</p>

{foreach from=$users item=user}
<a href="{$base}/student-view?username={$user.username}">{$user.username} ({$user.fname} {$user.lname})</a><br/>
{/foreach}

{include file="footer.tpl"}
