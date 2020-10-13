<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 08:56:42
  from '/Applications/MAMP/htdocs/WOWSHOP/views/store/orders.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f841a4acd77a7_07042813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c419052cf2a108c9a8a1d7e548d18e350e04c6a2' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/store/orders.html',
      1 => 1602493000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/store/head.html' => 1,
  ),
),false)) {
function content_5f841a4acd77a7_07042813 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/store/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <table>
    <tr>
      <th>編號</th><th>日期</th><th>訂單狀態</th><th>付款狀態</th><th>付款方式</th><th>總額</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>
    <tr>
      <td><a href="/store/order?orderId=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</a></td>
      <td><?php echo $_smarty_tpl->tpl_vars['order']->value['paymentDateTime'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['order']->value['orderStatus'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['order']->value['paymentStatus'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['order']->value['paymentType'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['order']->value['subTotal'];?>
</td>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>
</div><?php }
}
