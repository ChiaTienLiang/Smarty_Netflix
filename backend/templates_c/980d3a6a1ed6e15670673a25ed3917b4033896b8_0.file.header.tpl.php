<?php
/* Smarty version 3.1.33, created on 2019-11-29 10:39:39
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de0e75b44ffe4_58152797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '980d3a6a1ed6e15670673a25ed3917b4033896b8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\header.tpl',
      1 => 1575020268,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de0e75b44ffe4_58152797 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
			<div class="container">
				<div class="row">
					<div class="span12">
						<div class="header_inner clearfix">
							<div class="top1"><a class="logo">C&emsp;Y&emsp;<span>T&emsp;V</span></a>
							</div>
							<div class="top2">
								<div class="menu_top">
									<ul id="menu_top" class="clearfix">
									<?php if ($_smarty_tpl->tpl_vars['memberName']->value != 'Guest') {?>
										<li><a href="../backend/buy_index.php">儲值</a></li>
										<li><a href="../templates/login.html" id="logout">Log out</a></li>
									<?php } else { ?>
										<li><a href="../templates/signUp.html">Sign Up</a></li>
										<li><a href="../templates/login.html">Log In</a></li>
									<?php }?>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header><?php }
}
