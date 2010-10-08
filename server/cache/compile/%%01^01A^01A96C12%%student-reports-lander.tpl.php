<?php /* Smarty version 2.6.26, created on 2010-06-30 12:32:35
         compiled from student-reports-lander.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">

<h2>Reports available for <?php echo $this->_tpl_vars['student']['First_Name']; ?>
 <?php echo $this->_tpl_vars['student']['Last_Name']; ?>
</h2>

<h3>General information</h3>
<table>
<tr>
	<th>Student ID</th>
	<td><?php echo $this->_tpl_vars['student']['Student_ID']; ?>
</td>
</tr>
<tr>
	<th>Name</th>
	<td><?php echo $this->_tpl_vars['student']['First_Name']; ?>
 <?php echo $this->_tpl_vars['student']['MI']; ?>
 <?php echo $this->_tpl_vars['student']['Last_Name']; ?>
</td>
</tr>
<tr>
	<th>Username</th>
	<td><?php echo $this->_tpl_vars['student']['User_Name']; ?>
</td>
</tr>
<tr>
	<th>Password</th>
	<td><?php echo $this->_tpl_vars['student']['Password']; ?>
</td>
</tr>
<tr>
	<th>Birth date</th>
	<td><?php echo $this->_tpl_vars['student']['Birth_Date']; ?>
</td>
</tr>
<tr>
	<th>Gender</th>
	<td><?php echo $this->_tpl_vars['student']['Sex']; ?>
</td>
</tr>
<tr>
	<th>Grade</th>
	<td><?php echo $this->_tpl_vars['student']['Grade']; ?>
</td>
</tr>
</table>

<a href="student-hours-report?student_id=<?php echo $this->_tpl_vars['student']['Student_ID']; ?>
">Hourly attendance report</a><br/>
<a href="student-lexia-report?student_id=<?php echo $this->_tpl_vars['student']['Student_ID']; ?>
">Lexia progress reports</a>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>