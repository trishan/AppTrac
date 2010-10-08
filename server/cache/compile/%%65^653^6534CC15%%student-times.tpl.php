<?php /* Smarty version 2.6.26, created on 2010-07-07 10:34:40
         compiled from student-times.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'student-times.tpl', 9, false),array('modifier', 'trim', 'student-times.tpl', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">

<h2>Hours report for <?php echo $this->_tpl_vars['student']['First_Name']; ?>
 <?php echo $this->_tpl_vars['student']['Last_Name']; ?>
</h2>

<h2>Sessions</h2>
<?php $_from = $this->_tpl_vars['session_times']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['session']):
?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['session']['begin_ts'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['session']['begin_ts'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M %P") : smarty_modifier_date_format($_tmp, "%l:%M %P")))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['session']['end_ts'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%l:%M %P") : smarty_modifier_date_format($_tmp, "%l:%M %P")))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
 (<?php echo $this->_tpl_vars['session']['duration']; ?>
) (Lexia)<br/>
<?php endforeach; endif; unset($_from); ?>

<p>Average time per session: <?php echo $this->_tpl_vars['avg_duration']; ?>
</p>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>