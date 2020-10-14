<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 02:14:09
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/rolechange.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f865ef1a96718_39791211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94b91fd5bd70f249e945fa04701c792d2e21b0c6' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/rolechange.html',
      1 => 1602641592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f865ef1a96718_39791211 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  暱稱：<?php echo $_smarty_tpl->tpl_vars['user']->value['userName'];?>
<br><br>
  職位：
  <select name='roleId'>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
      <option value='<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
</option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </select>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
