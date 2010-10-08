<?php /* Smarty version 2.6.26, created on 2010-06-22 14:12:06
         compiled from student-report.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'student-report.tpl', 40, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">

<h2>Report for <?php echo $this->_tpl_vars['student']['First_Name']; ?>
 <?php echo $this->_tpl_vars['student']['Last_Name']; ?>
</h2>
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
	<th>Username</th>
	<td><?php echo $this->_tpl_vars['student']['Sex']; ?>
</td>
</tr>
<tr>
	<th>Grade</th>
	<td><?php echo $this->_tpl_vars['student']['Grade']; ?>
</td>
</tr>
</table>

<h2>Sessions</h2>
<?php $_from = $this->_tpl_vars['sessions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['session_id'] => $this->_tpl_vars['session']):
?>

	<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['session']['session_start_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['session']['session_start_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M %P") : smarty_modifier_date_format($_tmp, "%l:%M %P")); ?>
&#8212;<?php echo ((is_array($_tmp=$this->_tpl_vars['session']['session_end_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M %P") : smarty_modifier_date_format($_tmp, "%l:%M %P")); ?>
 (#<?php echo $this->_tpl_vars['session_id']; ?>
)</h3>
	<?php if ($this->_tpl_vars['session']['datapts']): ?><img src="http://chart.apis.google.com/chart?chs=320x200&chco=76A4FB&&cht=ls&chd=t:<?php echo $this->_tpl_vars['session']['datapts']; ?>
&chxt=y"/><br/><?php endif; ?>
	<?php $_from = $this->_tpl_vars['session']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['session_part']):
?>
	<?php if (count ( $this->_tpl_vars['session_part'] ) > 1): ?>
		<!--div style="font-size: 8px">
		<?php $_from = $this->_tpl_vars['session_part']['scores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['score']):
?>
		[<?php echo $this->_tpl_vars['label']; ?>
:<?php echo $this->_tpl_vars['score']; ?>
]<br/>
		<?php endforeach; endif; unset($_from); ?>
		</div-->
	
				
		Level <?php echo $this->_tpl_vars['session_part']['Task_Session_ID_Begin_Date']; ?>
: 
		<?php if ($this->_tpl_vars['session_part']['Accuracy']): ?>
			Scored <?php echo $this->_tpl_vars['session_part']['Accuracy']; ?>
% 		<?php else: ?>
			(No score)
		<?php endif; ?>
		<br/>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>

<?php endforeach; endif; unset($_from); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>