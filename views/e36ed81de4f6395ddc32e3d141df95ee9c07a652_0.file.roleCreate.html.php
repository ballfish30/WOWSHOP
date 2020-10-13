<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 08:49:18
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roleCreate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f856a0ea582a5_74510980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e36ed81de4f6395ddc32e3d141df95ee9c07a652' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roleCreate.html',
      1 => 1602578748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f856a0ea582a5_74510980 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
<form method="post" action="/WOWShop/backend/roleCreate">
  角色名：<input type='text' name='name' required="required"><br>
  角色描述：<input type='text' name='desc' required="required"><br>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['permissions']->value, 'permission', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['permission']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['permission']->value) {
$_smarty_tpl->tpl_vars['permission']->do_else = false;
?>
  <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['permission']->value['id'];?>
" name="permissions[]"><?php echo $_smarty_tpl->tpl_vars['permission']->value['name'];?>
<br>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <input type="submit" value="建立">
</form>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
