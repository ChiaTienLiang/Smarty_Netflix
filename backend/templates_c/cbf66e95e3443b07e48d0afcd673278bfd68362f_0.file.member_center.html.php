<?php
/* Smarty version 3.1.33, created on 2019-12-11 10:46:38
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\member_center.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df0588e97fe31_87146623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbf66e95e3443b07e48d0afcd673278bfd68362f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\member_center.html',
      1 => 1576031966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/header.tpl' => 1,
  ),
),false)) {
function content_5df0588e97fe31_87146623 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>CYTV Member Center</title>
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
 src="../js/member_center.js"><?php echo '</script'; ?>
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
                                    <th>消費金額</th>
                                    <th>點數</th>
                                    <th>購買時間</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ob_start();
if (isset($_smarty_tpl->tpl_vars['memberDeposit']->value)) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

                                <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['memberDeposit']->value, 'deposit');
$_smarty_tpl->tpl_vars['deposit']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['deposit']->value) {
$_smarty_tpl->tpl_vars['deposit']->index++;
$__foreach_deposit_0_saved = $_smarty_tpl->tpl_vars['deposit'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->index+1;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->value['price'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->value['point'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['deposit']->value['create_at'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</td>
                                </tr>
                                <?php ob_start();
$_smarty_tpl->tpl_vars['deposit'] = $__foreach_deposit_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

                                <?php ob_start();
}
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                            </tbody>
                        </table>

                        <!-- 影片購買紀錄 -->
                        <table class="table table-striped" id="videoData">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>片名</th>
                                    <th>Episode</th>
                                    <th>狀態</th>
                                    <th>購買時間</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ob_start();
if (isset($_smarty_tpl->tpl_vars['shopingList']->value)) {
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

                                <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopingList']->value, 'shop');
$_smarty_tpl->tpl_vars['shop']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['shop']->value) {
$_smarty_tpl->tpl_vars['shop']->index++;
$__foreach_shop_1_saved = $_smarty_tpl->tpl_vars['shop'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['shop']->index+1;
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['shop']->value['name'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['shop']->value['episode'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
</td>
                                    <?php ob_start();
if ($_smarty_tpl->tpl_vars['shop']->value['upload'] === 1) {
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

                                    <td class="onshelf" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['shop']->value['id'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
">點擊觀看</td>
                                    <?php ob_start();
} else {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

                                    <td class="offshelf">已下架</td>
                                    <?php ob_start();
}
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>

                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['shop']->value['create_at'];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
</td>
                                </tr>
                                <?php ob_start();
$_smarty_tpl->tpl_vars['shop'] = $__foreach_shop_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>

                            </tbody>
                        </table>
                    </div>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopingList']->value, 'shop');
$_smarty_tpl->tpl_vars['shop']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['shop']->value) {
$_smarty_tpl->tpl_vars['shop']->index++;
$__foreach_shop_2_saved = $_smarty_tpl->tpl_vars['shop'];
?>
                    <div class="modal hide" id="Modal<?php ob_start();
echo $_smarty_tpl->tpl_vars['shop']->value['id'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
" role="dialog">
                        <video class="video" width="100%" height="100%" controls>
                            <source src="../video/<?php ob_start();
echo $_smarty_tpl->tpl_vars['shop']->value['url'];
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
" type="video/mp4">
                        </video>
                    </div>
                    <?php
$_smarty_tpl->tpl_vars['shop'] = $__foreach_shop_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php ob_start();
}
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

                </div>
            </div>
        </div>

</body>

</html><?php }
}
