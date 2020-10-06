<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-06 03:39:13
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/secondCategoryCreate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7be6e14794d2_40009421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1244239447c884263b39461f7ee73560a445dbc8' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/secondCategoryCreate.html',
      1 => 1601955372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f7be6e14794d2_40009421 (Smarty_Internal_Template $_smarty_tpl) {
?>這是新增類別細項<br>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<form method="post" action="/WOWShop/backend/secondCategoryCreate">
  <select name="category">
    <?php echo $_smarty_tpl->tpl_vars['category']->value['icon'];?>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorys']->value, 'category', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </select><br>
  名稱：<input type='text' name='name' required="required"><br>
  <input type="submit" value="建立">
</form>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
