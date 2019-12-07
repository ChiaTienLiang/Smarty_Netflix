<?php
/* Smarty version 3.1.33, created on 2019-12-07 14:45:18
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\memberCenter.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5deb4a7e04f307_59569777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11987b543c19b7d26bb0d482203ffa2c12a94478' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\memberCenter.html',
      1 => 1575701042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/header.tpl' => 1,
  ),
),false)) {
function content_5deb4a7e04f307_59569777 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>CYTV Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="../images/icon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
    <!-- <link href="../css/butStyle.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/supersized.core.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
    <?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@9"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="../css/switch.css" type="text/css" media="screen">
    <?php echo '<script'; ?>
 src="../js/memberCenter.js"><?php echo '</script'; ?>
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
                    <div class="span3">
                        <div class="thumb9">
                            <div class="thumbnail clearfix">
                                <div id="jkoleftdiv">
                                    <div class="accordion" id="accordion1">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" id="memberBtn">
                                                    儲值紀錄
                                                </a>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" id="videoBtn">
                                                    影片購買紀錄
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span9 tableDiv">

                        <!-- 儲值紀錄 -->
                        <table class="table table-striped" id="memberData">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>金額</th>
                                    <th>點數</th>
                                    <th>購買時間</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['memberDeposit']->value, 'deposit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['deposit']->value) {
?>
                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->value['id'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->value['price'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->value['point'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->value['create_at'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>

                        <!-- 影片購買紀錄 -->
                        <table class="table table-striped" id="videoData">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>影片</th>
                                    <th>金額</th>
                                    <th>購買時間</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allVideo']->value, 'video');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
?>
                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['descript'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</td>
                                    <?php if ($_smarty_tpl->tpl_vars['video']->value['upload'] === "1") {?>
                                    <td>上架</td>
                                    <td> <label class="switch video">
                                            <button type="button" class="btn btn-danger " id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
"
                                                onclick="down('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
')">下架</button>
                                            <?php } else { ?>
                                    <td>已下架</td>
                                    <td> <label class="switch video">
                                            <button type="button" class="btn btn-success" id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
"
                                                onclick="up('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
')">上架</button>
                                            <?php }?>
                                            <span class="slider round"></span>
                                        </label></td>

                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>

</html><?php }
}
