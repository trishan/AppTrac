<?php /* Smarty version 2.6.26, created on 2010-10-08 17:19:21
         compiled from header.tpl */ ?>
<html>
	<head>
		<title>Literacy lab reporting - <?php echo $this->_tpl_vars['title']; ?>
</title>
		<link rel="stylesheet" href="<?php echo $this->_tpl_vars['base']; ?>
/res/basic.css"/>
		<?php echo $this->_tpl_vars['extra_head']; ?>

	</head>
	<body>
		<h1 id="header">Literacy lab reporting</h1>
		<?php if ($this->_tpl_vars['signed_in']): ?>
		<ul id="nav">
			<li><a href="activity">Recent activity</a></li>
			<li><a href="lab-reports">Lab reports</a></li>
			<li><a href="intake">Intake form</a></li>
		</ul>
		<p id="session-info">
			Signed in as <?php echo $this->_tpl_vars['session']['user']['username']; ?>

						[<a href="signout">Sign out</a>]
		</p>
		<?php endif; ?>