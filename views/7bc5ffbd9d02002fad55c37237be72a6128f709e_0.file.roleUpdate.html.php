<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 02:11:56
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roleUpdate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f850cec9c0863_87200589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bc5ffbd9d02002fad55c37237be72a6128f709e' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roleUpdate.html',
      1 => 1602555112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f850cec9c0863_87200589 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <form method="post" action="/WOWShop/backend/roleUpdate/<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
">
    角色名：<input type='text' name='name' value="<?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
" required="required"><br>
    角色描述：<input type='text' name='desc' value="<?php echo $_smarty_tpl->tpl_vars['role']->value['desc'];?>
" required="required"><br>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['permissions']->value, 'permission', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['permission']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['permission']->value) {
$_smarty_tpl->tpl_vars['permission']->do_else = false;
?>
    <?php if (in_array($_smarty_tpl->tpl_vars['permission']->value['id'],$_smarty_tpl->tpl_vars['perIds']->value)) {?>
      <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['permission']->value['id'];?>
" name="permissions[]" checked><?php echo $_smarty_tpl->tpl_vars['permission']->value['name'];?>
<br>
    <?php } else { ?>
      <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['permission']->value['id'];?>
" name="permissions[]" ><?php echo $_smarty_tpl->tpl_vars['permission']->value['name'];?>
<br>
    <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <input type="submit" value="建立">
  </form>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
