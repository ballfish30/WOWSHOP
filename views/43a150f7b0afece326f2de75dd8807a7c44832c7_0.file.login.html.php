<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-16 05:47:41
  from '/Applications/MAMP/htdocs/WOWSHOP/views/user/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8933fdd7a170_69767488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43a150f7b0afece326f2de75dd8807a7c44832c7' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/user/login.html',
      1 => 1602827259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/user/head.html' => 1,
  ),
),false)) {
function content_5f8933fdd7a170_69767488 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['message']->value) {?>
<div class='alert alert-primary alert-dismissible fade show'>
  <strong>系統訊息!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

  <button type='button' class='close' data-dismiss='alert'>&times;</button>
</div>
<?php }
$_smarty_tpl->_subTemplateRender('file:views/user/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<br><br><br><br>
<!------ Include the above in your HEAD tag ---------->
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <span style="font-size: 48px;">
       <i class="far fa-user-circle"></i>
</span>
    </div>

    <!-- Login Form -->
    <form method="POST" action="/WOWShop/user/login"> 
      <input type="text" id="login" class="fadeIn second" name="accountName" placeholder="login" required="required">
      <input type="password" id="password" class="fadeIn third" name="passwd" placeholder="password" required="required">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Register -->
    <div id="formFooter">
      <a class="underlineHover" href="/WOWShop/user/register">Register?</a>
    </div>

  </div>
</div><?php }
}
