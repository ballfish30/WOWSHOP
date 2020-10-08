<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-07 06:54:37
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/secondCategorys.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7d662d4379b1_84492803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1c219ff12afce401cba619e89bf8ed232011230' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/secondCategorys.html',
      1 => 1602053674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f7d662d4379b1_84492803 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <a href="/WOWSHOP/backend/secondCategoryCreate" class="create">新增</a>
  <table text-align="center" text-valign="middle">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemlist']->value, 'items', false, NULL, 'foo', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index'];
?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item', false, NULL, 'foo', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index'];
?>
      <tr>
      <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first'] : null)) {?>
      <th><img height="50px" width="50px" src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['item']->value['icon'];?>
"/></th>
      <th><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</th>
      <?php } else { ?>
        <td><a href="#" class="update"><pre><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</pre></a></td>
        <td><a href="#" class="cancel">刪除</a></td>
      <?php }?>
      </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
