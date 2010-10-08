{include file="header.tpl"}

<div id="content">

<h2>Reports available for {$student.First_Name} {$student.Last_Name}</h2>

<h3>General information</h3>
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
	<th>Gender</th>
	<td>{$student.Sex}</td>
</tr>
<tr>
	<th>Grade</th>
	<td>{$student.Grade}</td>
</tr>
</table>

<a href="student-hours-report?student_id={$student.Student_ID}">Hourly attendance report</a><br/>
<a href="student-lexia-report?student_id={$student.Student_ID}">Lexia progress reports</a>


{include file="footer.tpl"}
