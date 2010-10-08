{include file="header.tpl" title="Sign In"}

<div id="content">
	<h2>Sign in</h2>
	{if $error_message}
		<p>{$error_message}</p>
	{/if}
	{include file="signin-form.tpl"}
</div>

{include file="footer.tpl"}