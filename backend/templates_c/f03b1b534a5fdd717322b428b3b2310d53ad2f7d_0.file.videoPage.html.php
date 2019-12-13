<?php
/* Smarty version 3.1.33, created on 2019-12-12 12:20:13
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\videoPage.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df1bffd597139_59548377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f03b1b534a5fdd717322b428b3b2310d53ad2f7d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\videoPage.html',
      1 => 1576123854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/header.tpl' => 1,
    'file:../templates/footer.tpl' => 1,
  ),
),false)) {
function content_5df1bffd597139_59548377 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>CYTV</title>
    <meta charset="utf-8">
    <?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="../images/icon.ico" type="image/x-icon">
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@9"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/supersized.core.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
    <?php echo '<script'; ?>
 src="../js/videoPage.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../js/home.js"><?php echo '</script'; ?>
>
</head>

<body class="subpage">
    <div id="main">
        <?php $_smarty_tpl->_subTemplateRender("file:../templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <h1 class="text-center"><?php ob_start();
echo $_smarty_tpl->tpl_vars['videoName']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</h1>
                        <div class="thumb6">
                            <div class="thumbnail clearfix">
                                <figure class=""><img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['videoImg1']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
" alt=""></figure>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="span12">
                <div class="line1"></div>
                <h1>Details</h1>
                <div class="thumb2">
                    <div class="thumbnail clearfix">
                        <div class="caption">
                            <h4><?php ob_start();
echo $_smarty_tpl->tpl_vars['videoDes']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

                            </h4>
                        </div>
                    </div>
                </div>
                <div class="line1"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h1>Episodes</h1>
                    <ul class="thumbnails" id="isotope-items">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['episodes']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                        <li class="span4 isotope-element isotope-filter1">
                            <?php if ($_smarty_tpl->tpl_vars['value']->value['isbuy'] === true) {?>
                            <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['videoImg1']->value;
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
" alt="" onclick="watchVideo('<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
')">
                            <h5><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['episode'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</h5>
                            <h3 class="isbuy">已購買</h3>
                            <?php } else { ?>
                            <?php if ($_smarty_tpl->tpl_vars['value']->value['price'] > $_smarty_tpl->tpl_vars['memberWallet']->value) {?>
                            <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['videoImg1']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
" alt="" onclick="noMoney()">
                            <h5><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['episode'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</h5>
                            <h3 class="isbuy">$<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</h3>
                            <?php } else { ?>
                            <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['videoImg1']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
" alt="" onclick="buyVideo('<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
')">
                            <h5><?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['episode'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
</h5>
                            <h3 class="isbuy" id=isbuy<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
>$<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
</h3>
                            <?php }?>
                            <?php }?>
                            <div class="caption">
                            </div>
                        </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['episodes']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                    <div class="modal hide" id="myModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
" role="dialog">
                        <video class="video" width="100%" height="100%" controls>
                            <source src="../video/<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['url'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
" type="video/mp4">
                        </video>
                    </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>

            </div>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:../templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>

</html><?php }
}
