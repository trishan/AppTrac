<html>
	<head>
		<title>Hartford Public Library Adult Literacy Center Reporting System - {$title}</title>
		<link rel="stylesheet" href="{$base}/res/style.css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		{$extra_head}
	</head>
	<body>
	
	<div id="header">

	<div id="slogan">Adult Literacy Center Student Monitoring System</div>

	<div id="logo">Hartford Public Library</a></div>

	</div>
	{if $signed_in}
	<div id="menu">
	<ul>
	<li><a href=".">Home</a></li>
	<li><a href="activity">Recent Activity</a></li>
	<li><a href="lab-reports">Lab Reports</a></li>
	<li><a href="user-info">User Information</a><li>
	<li><a href="intake">Intake form</a></li>
	<li>
	</ul>
	<div id="session-signout">
			{* [<a href="account">Account settings</a>] *}
	<a href="signout">Sign out</a>
	</div>
	

	</div>
		
		<h4>Signed in as {$session.user.username}</h4>
		
		{/if}

		
		<!--
		{*
		<h1 id="header">Literacy Lab Monitoring System</h1>
		{if $signed_in}
		<ul id="nav">
			<li><a href="activity">Recent activity</a></li>
			<li><a href="lab-reports">Lab reports</a></li>
			<li><a href="user-info">User information</a></li>
			<li><a href="intake">Intake form</a></li>
		</ul>
		<p id="session-info">
			Signed in as {$session.user.username} *}
			{* [<a href="account">Account settings</a>] *}
		{*	[<a href="signout">Sign out</a>]
		</p>
		{/if} *}
		-->
