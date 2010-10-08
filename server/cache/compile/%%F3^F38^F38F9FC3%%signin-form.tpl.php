<?php /* Smarty version 2.6.26, created on 2010-06-14 11:38:01
         compiled from signin-form.tpl */ ?>
<form action="signin-process" method="post">
	<p><label for="username">Username:</label>
	<input type="text" id="username" name="username" value="<?php echo $this->_tpl_vars['request']['username']; ?>
"/></p>
	<p><label for="password">Password:</label>
	<input type="password" id="password" name="password"/></p>
	<p><input type="submit" value="Sign in"/>
</form>