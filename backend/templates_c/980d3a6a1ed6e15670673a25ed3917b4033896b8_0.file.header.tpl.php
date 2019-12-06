<?php
/* Smarty version 3.1.33, created on 2019-12-06 15:59:48
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dea0a749f66a5_60165932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '980d3a6a1ed6e15670673a25ed3917b4033896b8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\header.tpl',
      1 => 1575619166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dea0a749f66a5_60165932 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
			<div class="container">
				<div class="row">
					<div class="span12">
						<div class="header_inner clearfix">
							<div class="top1"><a href="home_index.php" class="logo">C&emsp;Y&emsp;<span>T&emsp;V</span></a>
							</div>
							
							<div class="top2">
								<div class="menu_top">
									<ul id="menu_top" class="clearfix">
									<li><h5>Welcome，&emsp;<?php ob_start();
echo $_smarty_tpl->tpl_vars['memberName']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</h5></li>
									<?php ob_start();
if ($_smarty_tpl->tpl_vars['memberLevel']->value === 1) {
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

										<li><span>&emsp;</span><h5>餘額:<?php ob_start();
echo $_smarty_tpl->tpl_vars['memberWallet']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</h5></h5>
										<li><a href="../backend/backend.php">後台</a></li>
										<li><a href="../backend/buy_index.php">儲值</a></li>
										<li><a  class="logout">Log out</a></li>
									<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['memberLevel']->value === 0) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

										<li><span>&emsp;</span><h5>餘額:<?php ob_start();
echo $_smarty_tpl->tpl_vars['memberWallet']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</h5></h5>
										<li><a href="../backend/buy_index.php">儲值</a></li>
										<li><a class="logout">Log out</a></li>
									<?php ob_start();
} else {
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>

										<li><a href="../templates/signUp.html">Sign Up</a></li>
										<li><a href="../templates/login.html">Log In</a></li>
									<?php ob_start();
}
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header><?php }
}
