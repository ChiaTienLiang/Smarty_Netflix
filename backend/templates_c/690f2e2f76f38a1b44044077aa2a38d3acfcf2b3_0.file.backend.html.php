<?php
/* Smarty version 3.1.33, created on 2019-12-07 13:52:00
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\backend.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5deb3e0079ad00_88899439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '690f2e2f76f38a1b44044077aa2a38d3acfcf2b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\backend.html',
      1 => 1575688580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/header.tpl' => 1,
  ),
),false)) {
function content_5deb3e0079ad00_88899439 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="../js/backend.js"><?php echo '</script'; ?>
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
                                                    會員管理
                                                </a>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" id="videoBtn">
                                                    影片管理
                                                </a>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" id="createBtn">
                                                    新增影集資訊
                                                </a>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" id="uploadBtn">
                                                    上傳分集
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span9 tableDiv">

                        <!-- 會員資訊 - 停權 -->
                        <table class="table table-striped" id="memberData">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>目前狀態</th>
                                    <th>停權</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allMember']->value, 'member');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
?>
                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['name'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['email'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</td>
                                    <?php if ($_smarty_tpl->tpl_vars['member']->value['permission'] === "1") {?>
                                    <td>正常使用中</td>
                                    <td> <label class="switch">
                                            <button type="button" class="btn btn-danger" id="permission<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
"
                                                onclick="stop('<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
')">停權</button>
                                            <?php } else { ?>
                                    <td>停權中</td>
                                    <td> <label class="switch">
                                            <button type="button" class="btn btn-success" id="permission<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"
                                                onclick="restore('<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
')">恢復</button>
                                            <?php }?>
                                            <span class="slider round"></span>
                                        </label></td>

                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>

                        <!-- 影集資訊 - 上下架 -->
                        <table class="table table-striped" id="videoData">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>descript</th>
                                    <th>目前狀態</th>
                                    <th>下架</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allVideo']->value, 'video');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
?>
                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['descript'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
</td>
                                    <?php if ($_smarty_tpl->tpl_vars['video']->value['upload'] === "1") {?>
                                    <td>上架</td>
                                    <td> <label class="switch video">
                                            <button type="button" class="btn btn-danger " id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
"
                                                onclick="down('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
')">下架</button>
                                            <?php } else { ?>
                                    <td>已下架</td>
                                    <td> <label class="switch video">
                                            <button type="button" class="btn btn-success" id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
"
                                                onclick="up('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
')">上架</button>
                                            <?php }?>
                                            <span class="slider round"></span>
                                        </label></td>

                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>

                        <!-- 新增影集資訊 -->
                        <table class="table table-striped" id="newVideo">
                            <thead>
                                <tr>
                                    <th>新增影集資訊</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="span3">影集名稱</td>
                                    <td>
                                        <div id="fields">
                                            <form id="ajax-contact-form" class="form-horizontal">
                                                <div class="control-group">
                                                    <input class="span6" type="text" id="videoName" name="videoName"
                                                        placeholder="影集名">
                                                    <span class="videoName" id="errorName"></span>
                                                </div>
                                                <span class="name"></span>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="span3">描述</td>
                                    <td>
                                        <div id="fields">
                                            <form id="ajax-contact-form" class="form-horizontal">
                                                <div class="control-group">
                                                    <textarea class="span6" rows="5" type="text" id="descriptV"
                                                        name="descript" placeholder="描述"></textarea>
                                                    <span class="descript" id="errordes"></span>
                                                </div>
                                                <span class="des"></span>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="span3">上傳橫幅圖片</td>
                                    <td>
                                        <div id="fields">
                                            <form enctype="multipart/form-data">
                                                <input class="span4" type="file" id="imgInput1"
                                                    accept="image/gif, image/jpeg, image/png, image/jpg" />
                                                <div class="Img"><img id="showImg1" src="../images/icon.png" />
                                                </div>
                                                <span class="Img1"></span>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="span3">上傳直幅圖片</td>
                                    <td>
                                        <form enctype="multipart/form-data">
                                            <input class="span4" type="file" id="imgInput2"
                                                accept="image/gif, image/jpeg, image/png, image/jpg" />
                                            <div class="Img"><img id="showImg2" src="../images/icon.png" />
                                            </div>
                                            <span class="Img2"></span>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <button class="btn btn-primary btn-lg btn-block" data-toggle="button"
                                            onclick="newVideo()">確認</button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                        <!-- 上傳分集 -->
                        <table class="table table-striped" id="uploadEp">
                            <thead>
                                <tr>
                                    <th>上傳分集</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="span3">分集名稱</td>
                                    <td>
                                        <div id="fields">
                                            <form id="ajax-contact-form" class="form-horizontal">
                                                <div class="control-group">
                                                    第<input class="span1" type="text" id="epNum" name="epNum"
                                                        placeholder="輸入數字" maxlength=2>話
                                                    <input class="span5" type="text" id="epName" name="epName"
                                                        placeholder="該集名稱">
                                                </div>
                                                <span class="epNum span1" id="errorNum"></span>
                                                <span class="epName span2" id="errorName"></span>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="span3">價錢</td>
                                    <td>
                                        <div id="fields">
                                            <form id="ajax-contact-form" class="form-horizontal">
                                                <div class="control-group">
                                                    <input class="span3" type="text" id="epPrice" name="epPrice"
                                                        placeholder="輸入數字" maxlength=3>
                                                </div>
                                                <span class="epPrice span1" id="errorPrice"></span>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="span3">影集</td>
                                    <td>
                                        <div id="fields">
                                            <form class="form-horizontal">
                                                <select name="videoList" class="span6" id="selectVideo">
                                                    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allVideo']->value, 'video');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

                                                    　<option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
</option>
                                                    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>

                                                </select>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="span3">上傳影片</td>
                                    <td>
                                        <div id="fields">
                                            <form enctype="multipart/form-data">
                                                <input class="span6" type="file" id="videoInput" accept="video/*" />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <button class="btn btn-primary btn-lg btn-block" id="uploadButton">確認</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- 分集資訊 - 上下架 -->
                        <!-- <table class="table table-striped" id="videoData">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>descript</th>
                                        <th>下架</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allVideo']->value, 'video');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
?>
                                    <tr>
                                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
</td>
                                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
</td>
                                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['descript'];
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
</td>
                                        <td> <label class="switch video">
                                                <?php if ($_smarty_tpl->tpl_vars['video']->value['upload'] === "1") {?>
                                                <button type="button" class="btn btn-danger " id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
"
                                                    onclick="down('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>
')">下架</button>
                                                <?php } else { ?>
                                                <button type="button" class="btn btn-success" id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>
"
                                                    onclick="up('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
')">上架</button>
                                                <?php }?>
                                                <span class="slider round"></span>
                                            </label></td>
                                    </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </tbody>
                            </table> -->
                    </div>
                </div>
            </div>
        </div>

</body>

</html><?php }
}
