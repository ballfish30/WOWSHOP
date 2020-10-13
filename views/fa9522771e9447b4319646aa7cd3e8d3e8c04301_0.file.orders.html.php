<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 07:20:02
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/orders.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f855522633de7_97187504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa9522771e9447b4319646aa7cd3e8d3e8c04301' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/orders.html',
      1 => 1602573600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
  ),
),false)) {
function content_5f855522633de7_97187504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <table>
    <tr>
      <th>訂單編號</th><th>會員名稱</th><th>訂單狀態</th><th>付款狀態</th><th>付款日期</th><th>總額</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>
      <tr>
        <td>
          <a href="/WOWShop/backend/order/<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</a>
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['userName'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['orderStatus'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['paymentStatus'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['paymentDateTime'];?>
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
