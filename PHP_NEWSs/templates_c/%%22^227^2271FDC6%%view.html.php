<?php /* Smarty version 2.6.26, created on 2015-01-14 08:47:48
         compiled from view.html */ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['t_dir']; ?>
templates/css/simditor.css">
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['t_dir']; ?>
templates/css/css.css">
	<title><?php echo $this->_tpl_vars['sm_config'][0]; ?>
</title>
</head>
<body>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<ul>
		<li style="display:inline-block;margin-right:15px;"><a href="index.php">新闻首页</a></li>
		<?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['sm_class']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
		<li style="display:inline-block;margin-right:15px;"><a href="list.php?cid=<?php echo $this->_tpl_vars['sm_class'][$this->_sections['l']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['sm_class'][$this->_sections['l']['index']]['name']; ?>
</a></li>
		<?php endfor; endif; ?>
	</ul>
	<div>
		<h1 style="text-align:center;"><?php echo $this->_tpl_vars['row_news'][2]; ?>
</h1>
		<p style="text-align:center;">时间：<?php echo $this->_tpl_vars['row_news'][4]; ?>
&nbsp;&nbsp;&nbsp;作者：<?php echo $this->_tpl_vars['row_news'][3]; ?>
</p>
		<div style="width:800px;padding:10px;box-shadow:0px 0px 10px rgba(0,0,0,.4);margin:0 auto;"><?php echo $this->_tpl_vars['row_news'][7]; ?>
</div>
	</div>
</body>
</html>