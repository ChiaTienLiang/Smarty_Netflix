<?php
/* Smarty version 3.1.33, created on 2019-11-29 11:34:28
  from 'C:\xampp\htdocs\Project\Smarty_Netflix\templates\buy.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de0f434d8da17_35546147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '897a21a754fd0653c31025201298ce9156814525' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Project\\Smarty_Netflix\\templates\\buy.html',
      1 => 1575023584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de0f434d8da17_35546147 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>CYTV Deposit</title>
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
    <?php echo '<script'; ?>
 src="../js/buy.js"><?php echo '</script'; ?>
>
</head>

<body class="subpage">
    <div id="main">

        <header>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="header_inner clearfix">
                            <div class="top1"><a href="../backend/home_index.php"
                                    class="logo">C&emsp;Y&emsp;<span>T&emsp;V<span></span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="thumb9">
                            <div class="thumbnail clearfix">
                                <div id="jkoleftdiv">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h2>價格</h2>
                                                </th>
                                                <th>
                                                    <h2>點數</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['money']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                                            <tr>
                                                <td><input type="radio" name="jkoprice" id="jko<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
"
                                                        value=<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
 checked
                                                        onclick="radioChang('<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
')">
                                                    <label id="price<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
" for="jko<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
">NT$
                                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</label></td>
                                                <td><label id="point<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['id'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
" for="jko<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['price'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
">TV幣 ×
                                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['point'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</label></td>
                                            </tr>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="span6">
                        <div class="thumb9">
                            <div class="thumbnail clearfix">
                                <div id="jkoleftdiv">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    <h2>確認購買內容</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>商品</td>
                                                <td id="cointable">TV幣 × </td>
                                            </tr>
                                            <tr>
                                                <td>價格</td>
                                                <td id="pricetable">NT$ </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 id="storeway">付款方式 </h2>
                                                </td>
                                                <td>
                                                    <h2 id="storeway">信用卡支付 </h2>
                                                    <div id="fields">
                                                        <form id="ajax-contact-form" class="form-horizontal">
                                                            <div class="control-group">
                                                                <h6 class="login" for="cardNum">持卡人姓名:</h6>
                                                                <div class="controls">
                                                                    <input class="span2" type="text" id="lastName"
                                                                        name="lastName" placeholder="名">
                                                                    <span>-</span>
                                                                    <input class="span2" type="text" id="firstName"
                                                                        name="firstName" placeholder="姓">
                                                                </div>
                                                                <span class="first last" id="errorName"></span>
                                                            </div>
                                                            <div class="control-group">
                                                                <h6 class="login" for="cardNum">信用卡卡號:</h6>
                                                                <div class="controls">
                                                                    <input class="span1" type="text" id="cardNum1"
                                                                        name="cardNum1" maxlength=4>
                                                                    <span>&ensp;-&ensp;</span>
                                                                    <input class="span1" type="text" id="cardNum2"
                                                                        name="cardNum2" maxlength=4>
                                                                    <span>&ensp;-&ensp;</span>
                                                                    <input class="span1" type="text" id="cardNum3"
                                                                        name="cardNum3" maxlength=4>
                                                                    <span>&ensp;-&ensp;</span>
                                                                    <input class="span1" type="text" id="cardNum4"
                                                                        name="cardNum4" maxlength=4>
                                                                </div>
                                                                <span class="card1 card2 card3 card4"
                                                                    id="errorCard"></span>
                                                            </div>
                                                            <div class="control-group">
                                                                <h6 class="login" for="password">信用卡到期日和安全碼:</h6>
                                                                <div class="controls">
                                                                    <input class="span1" type="text" id="cardMonth"
                                                                        name="password"
                                                                        placeholder="月"><span>&emsp;&ensp;</span>
                                                                    <input class="span1" type="text" id="cardYear"
                                                                        name="password"
                                                                        placeholder="年"><span>&emsp;&ensp;</span>
                                                                    <input class="span1" type="text" id="cardSafe"
                                                                        name="password" placeholder="安全碼">
                                                                </div>
                                                                <span class="month year safe" id="errorDate"></span>
                                                            </div>
                                                            <br>

                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group form-check">
                                                        <input type="checkbox" class="form-check-input" id="agree"
                                                            onclick="agreeCheck()">
                                                        <label class="form-check-label" for="agree">
                                                            我同意會員系統服務合約、個人資料隱私權保護政策未滿20歲之消費者，應由法定代理人閱讀並同意上述合約後，方得使用本儲值服務。
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-primary btn-lg btn-block  "
                                                        data-toggle="button" id="submitBuy" disabled>確認</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php }
}
