{include file="header.tpl"}

<div id="content">

<h2>Hours report for {$student.First_Name} {$student.Last_Name}</h2>

<h2>Sessions</h2>
{foreach from=$session_times item=session}
{$session.begin_ts|date_format:"%A, %B %e, %Y"} {$session.begin_ts|date_format:"%l:%M %P"|trim}-{$session.end_ts|date_format:"%l:%M %P"|trim} ({$session.duration}) (Lexia)<br/>
{/foreach}

<p>Average time per session: {$avg_duration}</p>

</div>

{include file="footer.tpl"}
