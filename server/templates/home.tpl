{include file="header.tpl"}

<div id="content">

<h2>Students</h2>
<p>
<script src="{$base}/res/student-search.js"></script>

<label for="student-search">Search:</label><input id="student-search" type="text"/><br/>
<div id="student-results></div>

{* foreach from=$students item=student}
<a href="student-reports-lander?student_id={$student.Student_ID}">{$student.First_Name} {$student.Last_Name}</a><br/>
{/foreach *}
</p>

{include file="footer.tpl"}
