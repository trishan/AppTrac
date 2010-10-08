<?php /* Smarty version 2.6.26, created on 2010-07-19 16:07:29
         compiled from activity.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="content">

<h2>Recent activity</h2>
<ul>
<?php $_from = $this->_tpl_vars['activities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['activity']):
?>
	<li><?php echo $this->_tpl_vars['activity']['time']; ?>
 <?php echo $this->_tpl_vars['activity']['name']; ?>
 <?php echo $this->_tpl_vars['activity']['action']; ?>
 <?php echo $this->_tpl_vars['activity']['extra']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>