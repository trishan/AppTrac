<?php /* Smarty version 2.6.26, created on 2010-06-23 10:06:18
         compiled from home.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">

<h2>Students</h2>
<p>
<?php $_from = $this->_tpl_vars['students']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['student']):
?>
<a href="student-reports-lander?student_id=<?php echo $this->_tpl_vars['student']['Student_ID']; ?>
"><?php echo $this->_tpl_vars['student']['First_Name']; ?>
 <?php echo $this->_tpl_vars['student']['Last_Name']; ?>
</a><br/>
<?php endforeach; endif; unset($_from); ?>
</p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>