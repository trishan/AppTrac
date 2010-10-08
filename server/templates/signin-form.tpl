<form action="signin-process" method="post">
	<p><label for="username">Username:</label>
	<input type="text" id="username" name="username" value="{$request.username}"/></p>
	<p><label for="password">Password:</label>
	<input type="password" id="password" name="password"/></p>
	<p><input type="submit" value="Sign in"/>
</form>
