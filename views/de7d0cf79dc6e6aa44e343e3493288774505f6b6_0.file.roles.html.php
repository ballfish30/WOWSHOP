<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-07 09:01:05
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roles.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7d83d1821355_81804715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de7d0cf79dc6e6aa44e343e3493288774505f6b6' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roles.html',
      1 => 1602061262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f7d83d1821355_81804715 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <a href="/WOWSHOP/backend/roleCreate" class="create">新增</a>
  <table text-align="center" text-valign="middle">
    <tr>
      <th>角色</th><th>權限</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemlist']->value, 'items', false, NULL, 'foo', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['items']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['items']->value) {
$_smarty_tpl->tpl_vars['items']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['total'];
?>
    <tr>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item', false, NULL, 'foo', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['total'];
?>
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first'] : null)) {?>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
        <?php } else { ?>
          <td>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value, 'per', false, NULL, 'foo', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['per']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['per']->value) {
$_smarty_tpl->tpl_vars['per']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['total'];
?>
              <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['last'] : null)) {?>
                <?php echo $_smarty_tpl->tpl_vars['per']->value['name'];?>
,
              <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['per']->value['name'];?>

              <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </td>
        <?php }?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
