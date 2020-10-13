<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 07:03:31
  from '/Applications/MAMP/htdocs/WOWSHOP/views/store/orderCheck.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f83ffc3cdcc75_82186568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c12c66e79fee8fe483c6e2d174074f40ceedf2a1' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/store/orderCheck.html',
      1 => 1602486207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/store/head.html' => 1,
  ),
),false)) {
function content_5f83ffc3cdcc75_82186568 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/store/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <table>
    <tr>
      <th>商品圖</th><th>商品名稱</th><th>商品描述</th><th>數量</th><th>價格</th><th>小計</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carts']->value, 'cart', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['cart']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cart']->value) {
$_smarty_tpl->tpl_vars['cart']->do_else = false;
?>
      <tr>
        <td><img style="width:200px" src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['cart']->value['img'];?>
"></td>
        <td style="vertical-align: middle;text-align: center;"><pre><?php echo $_smarty_tpl->tpl_vars['cart']->value['name'];?>
</pre></td>
        <td style="vertical-align: middle;text-align: center; width:20em;"><pre><?php echo $_smarty_tpl->tpl_vars['cart']->value['introduction'];?>
</pre></td>
        <td style="vertical-align: middle;text-align: center;"><?php echo $_smarty_tpl->tpl_vars['cart']->value['quantity'];?>
</td>
        <td style="vertical-align: middle;text-align: center;"><?php echo $_smarty_tpl->tpl_vars['cart']->value['price'];?>
</td>
        <td class="cartTotal" style="vertical-align: middle;text-align: center;"><?php echo $_smarty_tpl->tpl_vars['cart']->value['total'];?>
</td>
      </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <tr>
      <td colspan="6" style="text-align:right;" class="total"></td>
    </tr>
  </table><br><br><br>
  <form id="form1" name="form1" method="post" action="/WOWShop/store/pay">
    <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
      <tr>
        <td width="100" align="center" valign="baseline">收件人姓名：</td>
        <td valign="baseline"><input type="text" name="name" id="name" required="required"/></td>
      </tr>
      <tr>
        <td width="80" align="center" valign="baseline">收件人信箱：</td>
        <td valign="baseline"><input type="email" name="email" id="email" required="required"/></td>
      </tr>
      <tr>
        <td width="80" align="center" valign="baseline">收件人地址：</td>
        <td valign="baseline"><input type="text"" name="address" id="address" required="required"/></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="確認訂單" />
        </td>
      </tr>
    </table>
  </form>
  <p>測試卡號：4311-9522-2222-2222 </p>
  <p>安全密碼：２２２</p>
  <p>有效日期：今日之後即可</p>
</div>
<?php echo '<script'; ?>
>
  var sum = 0;
  $('.cartTotal').each(function(){
    $this = $(this);
    sum += parseFloat($this.html());
  });
  $('.total').html("總計：" + sum);
<?php echo '</script'; ?>
><?php }
}
