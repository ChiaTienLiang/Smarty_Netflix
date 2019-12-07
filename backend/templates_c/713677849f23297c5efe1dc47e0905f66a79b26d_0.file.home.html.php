<?php
/* Smarty version 3.1.33, created on 2019-12-07 13:51:03
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\home.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5deb3dc73bd751_07285972',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '713677849f23297c5efe1dc47e0905f66a79b26d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\home.html',
      1 => 1575688580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/header.tpl' => 1,
    'file:../templates/footer.tpl' => 1,
  ),
),false)) {
function content_5deb3dc73bd751_07285972 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
	<title>CYTV</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="icon" href="../images/icon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
	<?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@9"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
	<?php echo '<script'; ?>
 src="../js/home.js"><?php echo '</script'; ?>
>

</head>

<body class="subpage">
	<div id="main">
		<?php $_smarty_tpl->_subTemplateRender("file:../templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<div id="navigation" class="container">
			<div class="row">
				<div class="span12">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
					<ul class="menu menu2 row sf-menu clearfix">
						<?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? count($_smarty_tpl->tpl_vars['value']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['value']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;?>
						<li class="nav2 span3">
							<?php if ($_smarty_tpl->tpl_vars['memberLevel']->value === null) {?>
							<a href="#"><img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['foo']->value]['img1'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" alt="">
								<span class="over1"></span>
								<span class="over2"><img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['foo']->value]['img2'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
" alt=""></span><span
									class="ic1"></span><span class="txt1"></span><span
									class="txt1"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['foo']->value]['name'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</span></a>
							<?php } else { ?>
							<a href="videoPage_index.php?id=<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
"><img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['foo']->value]['img1'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
" alt="">
								<span class="over1"></span>
								<span class="over2"><img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['foo']->value]['img2'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
" alt=""></span><span
									class="ic1"></span><span class="txt1"></span><span
									class="txt1"><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['foo']->value]['name'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</span></a>
							<?php }?>
						</li>
						<?php }
}
?>
					</ul>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<div class="hl1"></div>

				</div>
			</div>
		</div>
		<?php $_smarty_tpl->_subTemplateRender("file:../templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	</div>
</body>

</html><?php }
}
