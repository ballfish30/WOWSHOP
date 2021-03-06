<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 03:31:46
  from '/Applications/MAMP/htdocs/WOWSHOP/views/backend/head.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f87c2a26b8e53_51936059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b09a42b0251e2c53d20b4da92233f63c9c4b394' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/backend/head.html',
      1 => 1602732702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f87c2a26b8e53_51936059 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<!--
	Itsy by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html class="home blog no-js" lang="en-US">
<head>
    <title>魔獸世界</title>

    <meta charset="UTF-8"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css" media="all"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC%3A400%2C700%7CLato%3A400%2C700%2C400italic%2C700italic&amp;ver=4.9.8"
          type="text/css" media="screen"/>
    <link rel="stylesheet" href="/WOWSHOP/css/style.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/WOWSHOP/css/print.css" type="text/css" media="print"/>
    <?php echo '<script'; ?>
 src='/WOWSHOP/js/jquery.min.js''><?php echo '</script'; ?>
>
</head>
<body class="home sticky-menu sidebar-off" id="top">
<header class="header">

    <div class="header-wrap">

        <div class="logo plain logo-left">
            <div class="site-title">
                <a href="/WOWSHOP/store/" title="Go to Home">魔獸世界</a>
            </div>
        </div><!-- /logo -->


        <nav id="nav" role="navigation">
            <div class="table">
                <div class="table-cell">
                    <ul id="menu-menu-1">
                        <li class="menu-item">
                            <a href="/WOWShop/store/">商店</a></li>
                        <li class="menu-item">
                          <a href="/WOWShop/backend/members">會員</a></li>
                        <li class="menu-item">
                          <a href="/WOWShop/backend/roles">權限</a></li>
                        <li class="menu-item">
                          <a href="/WOWShop/backend/orders">訂單</a></li>
                        <li class="menu-item">
                          <a href="/WOWShop/backend/categorys">類別</a>
                          <ul>
                            <li><a href="/WOWShop/backend/secondCategory">類別細項</a></li>
                          </ul>
                        </li>
                        <li class="menu-item">
                            <a href="/WOWShop/backend/products">商品</a></li>
                        <li class='menu-item'>
                            <?php if ($_smarty_tpl->tpl_vars['login']->value) {?>
                            <a href='/WOWShop/user/logout'>登出</a></li>
                            <?php } else { ?>
                            <a href='/WOWShop/user/login'>登入</a></li>
                            <?php }?>
                        <li class="menu-inline menu-item">
                            <a title="Facebook" href="https://www.facebook.com/groups/wowclassicchinese">
                                <i class="fa fa-facebook"></i><span class="i">Facebook</span>
                            </a></li>
                        <li class="menu-inline menu-item">
                            <a title="Instagram" href="https://www.wowboh.com/">
                                <i class="fa fa-instagram"></i><span class="i">官網</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <a href="#nav" class="menu-trigger"><i class="fa fa-bars"></i></a>

        <a href="#topsearch" class="search-trigger"><i class="fa fa-search"></i></a>

    </div>

</header><?php }
}
