<?php
/* Smarty version 3.1.33, created on 2019-12-11 16:23:01
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\backend.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5df0a765e5bad9_81284104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '690f2e2f76f38a1b44044077aa2a38d3acfcf2b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\backend.html',
      1 => 1576052167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/header.tpl' => 1,
  ),
),false)) {
function content_5df0a765e5bad9_81284104 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div id="overlay">
        <div id="progstat"></div>
        <div id="progress"></div>

    </div>

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
                                                    影片編輯管理
                                                </a>
                                            </div>
                                        </div>
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle" id="editEp">
                                                    分集編輯管理
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
$_smarty_tpl->tpl_vars['member']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->index++;
$__foreach_member_0_saved = $_smarty_tpl->tpl_vars['member'];
?>
                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->index+1;
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
                                    <td class="memStop<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
">正常使用中</td>
                                    <td> <label class="switch">
                                            <button type="button" class="btn btn-danger stop"
                                                id="permission<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
">停權</button>
                                            <?php } else { ?>
                                    <td class="memStop<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
">停權中</td>
                                    <td> <label class="switch">
                                            <button type="button" class="btn btn-success restore"
                                                id="permission<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
">恢復</button>
                                            <?php }?>
                                            <span class="slider round"></span>
                                        </label></td>

                                </tr>
                                <?php
$_smarty_tpl->tpl_vars['member'] = $__foreach_member_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>

                        <!-- 影集資訊編輯 - 上下架 -->
                        <table class="table table-striped" id="videoData">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>descript</th>
                                    <th>目前狀態</th>
                                    <th>編輯</th>
                                    <th>下架</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allVideo']->value, 'video');
$_smarty_tpl->tpl_vars['video']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->index++;
$__foreach_video_1_saved = $_smarty_tpl->tpl_vars['video'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                                <tr>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->index+1;
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</td>
                                    <td id="newVname<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
</td>
                                    <td id="newVdes<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['descript'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
</td>
                                    <td class="onshelf" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
">編輯
                                    </td>
                                    <?php if ($_smarty_tpl->tpl_vars['video']->value['upload'] === "1") {?>
                                    <td>上架</td>
                                    <td> <label class="switch video">
                                            <button type="button" class="btn btn-danger down" id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
"
                                                onclick="down('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
')">下架</button>
                                            <?php } else { ?>
                                    <td>已下架</td>
                                    <td> <label class="switch video">
                                            <button type="button" class="btn btn-success up" id="shelf<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
"
                                                onclick="up('<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
')">上架</button>
                                            <?php }?>
                                            <span class="slider round"></span>
                                        </label></td>
                                </tr>
                                <?php ob_start();
$_smarty_tpl->tpl_vars['video'] = $__foreach_video_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>

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
                                            id="newVideoBtn">確認</button>
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
$_smarty_tpl->tpl_vars['video']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->index++;
$__foreach_video_2_saved = $_smarty_tpl->tpl_vars['video'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>

                                                    　<option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
</option>
                                                    <?php ob_start();
$_smarty_tpl->tpl_vars['video'] = $__foreach_video_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

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

                        <!-- 各影片分集列表 -->
                        <div id="selectDiv">
                            <form class="form-horizontal">
                                <select name="epList" class="span6 epList" id="selectEp">
                                    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allVideo']->value, 'video');
$_smarty_tpl->tpl_vars['video']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->index++;
$__foreach_video_3_saved = $_smarty_tpl->tpl_vars['video'];
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

                                    　<option id="option<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>
">
                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
</option>
                                    <?php ob_start();
$_smarty_tpl->tpl_vars['video'] = $__foreach_video_3_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>

                                </select>
                            </form>
                        </div>

                        <table class="table table-striped epTable">
                            <thead>
                                <tr>
                                    <th>話</th>
                                    <th>Name</th>
                                    <th>price</th>
                                    <th>編輯</th>
                                </tr>
                            </thead>
                            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['test']->value, 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>

                            <?php ob_start();
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? count($_smarty_tpl->tpl_vars['a']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['a']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>

                            <tbody class="epBody<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['videoId'];
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>
 epBodytest">
                                <tr>
                                    <td id="newNo<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['no'];
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['no'];
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>
</td>
                                    <td id="newName<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['no'];
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['episode'];
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>
</td>
                                    <td id="newPrice<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['no'];
$_prefixVariable36 = ob_get_clean();
echo $_prefixVariable36;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['price'];
$_prefixVariable37 = ob_get_clean();
echo $_prefixVariable37;?>
</td>
                                    <td class="epEdit" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable38 = ob_get_clean();
echo $_prefixVariable38;?>
">點擊編輯</td>
                                </tr>
                            </tbody>
                            <?php ob_start();
}
}
$_prefixVariable39 = ob_get_clean();
echo $_prefixVariable39;?>

                            <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable40 = ob_get_clean();
echo $_prefixVariable40;?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 影片編輯（Modal） -->
    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allVideo']->value, 'video');
$_smarty_tpl->tpl_vars['video']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->index++;
$__foreach_video_5_saved = $_smarty_tpl->tpl_vars['video'];
$_prefixVariable41 = ob_get_clean();
echo $_prefixVariable41;?>

    <div class="modal fade myModal" id="myModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable42 = ob_get_clean();
echo $_prefixVariable42;?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-toggle="modal" data-target="#myModal" aria-hidden="true">
        <div class="modal-dialog testMask">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        修改影片資訊
                    </h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped editModal" id="editModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable43 = ob_get_clean();
echo $_prefixVariable43;?>
">
                        <tbody>
                            <tr>
                                <td class="span3">影集名稱</td>
                                <td>
                                    <div>
                                        <form id="ajax-contact-form" class="form-horizontal">
                                            <div class="control-group">
                                                <input class="span6" type="text" id="editName<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable44 = ob_get_clean();
echo $_prefixVariable44;?>
"
                                                    name="editName" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['name'];
$_prefixVariable45 = ob_get_clean();
echo $_prefixVariable45;?>
">
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
                                            <span class="control-group">
                                                <textarea class="span6" rows="5" type="text"
                                                    id="editDescript<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable46 = ob_get_clean();
echo $_prefixVariable46;?>
"
                                                    name="descript"><?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['descript'];
$_prefixVariable47 = ob_get_clean();
echo $_prefixVariable47;?>
</textarea>
                                        </form>
                                    </div>
                                    <span class="des"></span>

                                </td>
                            </tr>
                            <tr>
                                <td class="span3">上傳橫幅圖片</td>
                                <td>
                                    <div id="fields">
                                        <form enctype="multipart/form-data">
                                            <input class="span4 editImg1" type="file" id="editImg1<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable48 = ob_get_clean();
echo $_prefixVariable48;?>
"
                                                accept="image/gif, image/jpeg, image/png, image/jpg" />
                                            <div class="Img"><img id="showEditImg1<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable49 = ob_get_clean();
echo $_prefixVariable49;?>
"
                                                    src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['img1'];
$_prefixVariable50 = ob_get_clean();
echo $_prefixVariable50;?>
" />
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
                                        <input class="span4 editImg2" type="file" id="editImg2<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable51 = ob_get_clean();
echo $_prefixVariable51;?>
"
                                            accept="image/gif, image/jpeg, image/png, image/jpg" />
                                        <div class="Img"><img id="showEditImg2<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable52 = ob_get_clean();
echo $_prefixVariable52;?>
" src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['img2'];
$_prefixVariable53 = ob_get_clean();
echo $_prefixVariable53;?>
" />
                                        </div>
                                        <span class="Img2"></span>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <button type="button" class="btn btn-primary editSubmit" id="editSubmit<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable54 = ob_get_clean();
echo $_prefixVariable54;?>
">
                        送出
                    </button>
                    <button type="button" class="btn btn-default editCancel" data-dismiss="myModal"
                        id="editCancel<?php ob_start();
echo $_smarty_tpl->tpl_vars['video']->value['id'];
$_prefixVariable55 = ob_get_clean();
echo $_prefixVariable55;?>
">取消
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php ob_start();
$_smarty_tpl->tpl_vars['video'] = $__foreach_video_5_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable56 = ob_get_clean();
echo $_prefixVariable56;?>

    <!-- /.modal -->

    <!-- Episode編輯（Modal） -->
    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['test']->value, 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_prefixVariable57 = ob_get_clean();
echo $_prefixVariable57;?>

    <?php ob_start();
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? count($_smarty_tpl->tpl_vars['a']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['a']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration === 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration === $_smarty_tpl->tpl_vars['foo']->total;
$_prefixVariable58 = ob_get_clean();
echo $_prefixVariable58;?>

    <div class="modal fade epModal" id="epModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable59 = ob_get_clean();
echo $_prefixVariable59;?>
" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" data-toggle="modal" data-target="#myModal" aria-hidden="true">
        <div class="modal-dialog testMask">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        修改影片資訊
                    </h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped editEpTable" id="editEpTable<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable60 = ob_get_clean();
echo $_prefixVariable60;?>
">
                        <tbody>
                            <tr>
                                <td class="span3">分集名稱</td>
                                <td>
                                    <div id="fields">
                                        <form id="ajax-contact-form" class="form-horizontal">
                                            <div class="control-group">
                                                第<input class="span1" type="text" id="epNum<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable61 = ob_get_clean();
echo $_prefixVariable61;?>
" name="epNum"
                                                    value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['no'];
$_prefixVariable62 = ob_get_clean();
echo $_prefixVariable62;?>
" maxlength=2>話
                                                <input class="span5" type="text" id="epName<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable63 = ob_get_clean();
echo $_prefixVariable63;?>
" name="epName"
                                                    value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['episode'];
$_prefixVariable64 = ob_get_clean();
echo $_prefixVariable64;?>
">
                                            </div>
                                            <!-- <span class="epNum span1" id="errorEditNum<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable65 = ob_get_clean();
echo $_prefixVariable65;?>
"></span>
                                            <span class="epName span2" id="errorEditName<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable66 = ob_get_clean();
echo $_prefixVariable66;?>
"></span> -->
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
                                                <input class="span3" type="text" id="epPrice<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable67 = ob_get_clean();
echo $_prefixVariable67;?>
"
                                                    name="epPrice" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['price'];
$_prefixVariable68 = ob_get_clean();
echo $_prefixVariable68;?>
" maxlength=3>
                                            </div>
                                            <!-- <span class="epPrice span1" id="errorEditPrice<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable69 = ob_get_clean();
echo $_prefixVariable69;?>
"></span> -->
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="span3">影集</td>
                                <td>
                                    <div id="fields">
                                        <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['name'];
$_prefixVariable70 = ob_get_clean();
echo $_prefixVariable70;?>
</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="span3">上傳影片</td>
                                <td>
                                    <div id="fields">
                                        <form enctype="multipart/form-data">
                                            <input class="span6" type="file" id="videoEdit<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable71 = ob_get_clean();
echo $_prefixVariable71;?>
"
                                                accept="video/*" />
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer modalFooter">
                    <button type="button" class="btn btn-primary editEpSubmit" id="editEpSubmit<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable72 = ob_get_clean();
echo $_prefixVariable72;?>
">
                        送出
                    </button>
                    <button type="button" class="btn btn-default editEpCancel" data-dismiss="epModal"
                        id="editEpCancel<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[$_smarty_tpl->tpl_vars['foo']->value]['id'];
$_prefixVariable73 = ob_get_clean();
echo $_prefixVariable73;?>
">取消
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php ob_start();
}
}
$_prefixVariable74 = ob_get_clean();
echo $_prefixVariable74;?>

    <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable75 = ob_get_clean();
echo $_prefixVariable75;?>

    <!-- /.modal -->

</body>

</html><?php }
}
