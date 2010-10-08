<?php /* Smarty version 2.6.26, created on 2010-10-08 17:25:31
         compiled from intake.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">

<h2>New User Intake form</h2>

<form action="intake-process" method="post">
	<table>
		<tr>
			<td><label for="fname">First name:</label></td>
			<td><input type="text" name="fname" id="fname"/></td>
		</tr><tr>
			<td><label for="lname">Last name:</label></td>
			<td><input type="text" name="lname" id="lname"/></td>
		</tr><tr>
			<td><label for="password">Password:</label></td>
			<td><input type="text" name="password" id="password"/></td>
		</tr><tr>
			<td style="text-align: right" colspan="2">
				<input type="reset" value="Clear"/>
				<input type="submit" value="Add user"/>
			</td>
		</tr>
	</table>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>