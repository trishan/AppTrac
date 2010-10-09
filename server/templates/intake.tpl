{include file="header.tpl"}

<div id="content">

<h2>New User Intake form</h2>

<form action="intake-process" method="post">
	<table>
		<tr>
			<td><label for="username">Username:</label></td>
			<td><input type="text" name="username" id="username"/></td>
		</tr><tr>
			<td><label for="fname">First name:</label></td>
			<td><input type="text" name="fname" id="fname"/></td>
		</tr><tr>
			<td><label for="lname">Last name:</label></td>
			<td><input type="text" name="lname" id="lname"/></td>
		</tr><tr>
			<td><label for="password">Password:</label></td>
			<td><input type="text" name="password" id="password"/></td>
		</tr><tr>
			<td colspan="2">
				<fieldset><legend>Assigned Applications<legend>
{foreach from=$apps item=app}
<input type="checkbox" name="apps[]" id="app_{$app.id}" value="{$app.id}"
	{if $app.intake_checked_default > 0} checked="checked"{/if}/>
<label for="app_{$app.id}">{$app.name}</label><br/>
{/foreach}
				</fieldset>
			</td>
		</tr><tr>
			<td style="text-align: right" colspan="2">
				<input type="reset" value="Clear"/>
				<input type="submit" value="Add user"/>
			</td>
		</tr>
	</table>
</form>

{include file="footer.tpl"}
