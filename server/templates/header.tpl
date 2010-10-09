<html>
	<head>
		<title>Literacy lab reporting - {$title}</title>
		<link rel="stylesheet" href="{$base}/res/basic.css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		{$extra_head}
	</head>
	<body>
		<h1 id="header">Literacy lab reporting</h1>
		{if $signed_in}
		<ul id="nav">
			<li><a href="activity">Recent activity</a></li>
			<li><a href="lab-reports">Lab reports</a></li>
			<li><a href="user-info">User information</a></li>
			<li><a href="intake">Intake form</a></li>
		</ul>
		<p id="session-info">
			Signed in as {$session.user.username}
			{* [<a href="account">Account settings</a>] *}
			[<a href="signout">Sign out</a>]
		</p>
		{/if}
