{include file="header.tpl"}

<div id="content">

<h2>Report for {$student.First_Name} {$student.Last_Name}</h2>
<table>
<tr>
	<th>Student ID</th>
	<td>{$student.Student_ID}</td>
</tr>
<tr>
	<th>Name</th>
	<td>{$student.First_Name} {$student.MI} {$student.Last_Name}</td>
</tr>
<tr>
	<th>Username</th>
	<td>{$student.User_Name}</td>
</tr>
<tr>
	<th>Password</th>
	<td>{$student.Password}</td>
</tr>
<tr>
	<th>Birth date</th>
	<td>{$student.Birth_Date}</td>
</tr>
<tr>
	<th>Username</th>
	<td>{$student.Sex}</td>
</tr>
<tr>
	<th>Grade</th>
	<td>{$student.Grade}</td>
</tr>
</table>

<h2>Sessions</h2>
{foreach from=$sessions key=session_id item=session}

	<h3>{$session.session_start_time|date_format:"%A, %B %e, %Y"} {$session.session_start_time|date_format:"%l:%M %P"}&#8212;{$session.session_end_time|date_format:"%l:%M %P"} (#{$session_id})</h3>
	{if $session.datapts}<img src="http://chart.apis.google.com/chart?chs=320x200&chco=76A4FB&&cht=ls&chd=t:{$session.datapts}&chxt=y"/><br/>{/if}
	{foreach from=$session key=k item=session_part}
	{if count($session_part) > 1}
		<!--div style="font-size: 8px">
		{foreach from=$session_part.scores key=label item=score}
		[{$label}:{$score}]<br/>
		{/foreach}
		</div-->
	
	{*	Begin: {$session_part.Session_Begin_Date} {$session_part.Session_Begin_Time}<br/>
		End: {$session_part.Session_End_Date} {$session_part.Session_End_Time}<br/>	*}
	{*	Program tag: {$session_part.Program_Program_Tag}<br/>
		Activity: {$session_part.Activity}<br/>	*}
		
		Level {$session_part.Task_Session_ID_Begin_Date}: 
		{if $session_part.Accuracy}
			Scored {$session_part.Accuracy}% {* [{$session_part.complete}:{$session_part.practiceLevel}:{$session_part.practiceData}] *}
		{else}
			(No score)
		{/if}
		<br/>
	{/if}
	{/foreach}

{/foreach}
{include file="footer.tpl"}
