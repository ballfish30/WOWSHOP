<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-16 07:54:12
  from '/Applications/MAMP/htdocs/WOWSHOP/views/user/register.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8951a4042c88_51490695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcdea69ad5b754a07c0d55a412a8e64f33607734' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/user/register.html',
      1 => 1602834849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/user/head.html' => 1,
  ),
),false)) {
function content_5f8951a4042c88_51490695 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['message']->value) {?>
<div class='alert alert-primary alert-dismissible fade show'>
  <strong>系統訊息!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

  <button type='button' class='close' data-dismiss='alert'>&times;</button>
</div>
<?php }
$_smarty_tpl->_subTemplateRender('file:views/user/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
    <form id='form1' method="post" action="/WOWSHOP/user/register"> 
      <input type="text" id="login" class="fadeIn second" name="accountName" placeholder="accountName" required="required">
      <input type="password" id="password" class="fadeIn third" name="passwd" placeholder="password" required="required">
      <input type="text" name="userName" class="fadeIn fourth" placeholder="userName" required="required" value="<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
">
      <input type="text" name="email" class="fadeIn fiveth" placeholder="email" required="required" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
      <input type="text" name="phone" class="fadeIn fiveth" placeholder="phone" required="required" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
      <input type="submit" class="" value="Register">
    </form>

    <!-- Remind Register -->
    <div id="formFooter">
      <a class="underlineHover" href="/WOWShop/user/login">Login?</a>
    </div>

  </div>
</div>
<?php echo '<script'; ?>
>
  $("input[name=accountName]").on("blur", function() {
    $this = $(this);
    var re = /^[A-Za-z0-9]+$/;
    var OK = re.exec($this.val())
    if (!OK && $this.val()){
      alert('帳號錯誤');
    }
  });
  $("input[name=passwd]").on("blur", function() {
    $this = $(this);
    var re = /^[A-Za-z0-9]+$/;
    var OK = re.exec($this.val())
    if (!OK && $this.val()){
      alert('密碼錯誤');
    }
  });
  $("input[name=userName]").on("blur", function() {
    $this = $(this);
    var re = /^[A-Za-z0-9]+$/;
    var OK = re.exec($this.val())
    if (!OK && $this.val()){
      alert('暱稱錯誤');
    }
  });
  $("input[name=email]").on("blur", function() {
    $this = $(this);
    var re = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
    var OK = re.exec($this.val())
    if (!OK && $this.val()){
      alert('信箱錯誤');
    }
  });
  $("input[name=phone]").on("blur", function() {
    $this = $(this);
    var re = /^[0-9]*[1-9][0-9]*$/;
    var OK = re.exec($this.val())
    if (!OK && $this.val()){
      alert('電話錯誤');
    }
    return false;
  });
<?php echo '</script'; ?>
>
<?php }
}
