{include file="header.tpl"}

<div id="content">

<h2>Information for student {$user.username}</h2>

<div id="show">
<table>
		<tr>
			<td>Username:</td>
			<td>{$user.username}</td>
		</tr><tr>
			<td>Name:</td>
			<td>{$user.fname} {$user.lname}</td>
		</tr><tr>
			<td>Password:</td>
			<td>{$user.password}</td>
		</tr><tr>
			<td colspan="2">
				<fieldset><legend>Assigned Applications<legend>
{foreach from=$user.apps item=appid}
{$app_table.$appid.name}<br/>
{/foreach}
				</fieldset>
			</td>
		</tr>
	</table>
	<a href="#" onclick="document.getElementById('show').style.display = 'none'; document.getElementById('edit').style.display = 'block';">Edit information for {$user.username}</a>
</div>

<div id="edit" style="display: none">
<form action="student-edit-process" method="post">
	<input type="hidden" name="username" value="{$user.username}"/>
	<table>
		<tr>
			<td>Username:</td>
			<td>{$user.username}</td>
		</tr><tr>
			<td><label for="fname">First name:</label></td>
			<td><input type="text" name="fname" id="fname" value="{$user.fname}"/></td>
		</tr><tr>
			<td><label for="lname">Last name:</label></td>
			<td><input type="text" name="lname" id="lname" value="{$user.lname}"/></td>
		</tr><tr>
			<td><label for="password">Password:</label></td>
			<td><input type="text" name="password" id="password" value="{$user.password}"/></td>
		</tr><tr>
			<td colspan="2">
				<fieldset><legend>Assigned Applications<legend>
{foreach from=$app_table item=app}
<input type="checkbox" name="apps[]" id="app_{$app.id}" value="{$app.id}"
	{if in_array($app.id, $user.apps)} checked="checked"{/if}/>
<label for="app_{$app.id}">{$app.name}</label><br/>
{/foreach}
				</fieldset>
			</td>
		</tr><tr>
			<td style="text-align: right" colspan="2">
			<input type="button" onclick="document.getElementById('edit').style.display = 'none'; document.getElementById('show').style.display = 'block';" value="Cancel"/></a>
				<input type="submit" value="Save changes"/>
			</td>
		</tr>
	</table>
</form>
<h3>Other options</h3>
<input type="button" style="background-color: darkred; color: white" onclick="if(confirm('Are you sure you want to delete the user {$user.username} ({$user.fname} {$user.lname})? If you click OK, this user\'s information will be permanently deleted.'))window.location='{$base}/student-delete?username={$user.username}';"
	value="Delete this user"/>
</div>

{include file="footer.tpl"}
