<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 03:26:26
  from '/Applications/MAMP/htdocs/WOWSHOP/views/store/carts.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f83cce2ab4df6_55055076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf933a53d247d4e46dfc3f55f06f78398807dce5' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/store/carts.html',
      1 => 1602473183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/store/head.html' => 1,
  ),
),false)) {
function content_5f83cce2ab4df6_55055076 (Smarty_Internal_Template $_smarty_tpl) {
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
        <td style="vertical-align: middle;text-align: center;"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cart']->value['cartId'];?>
"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cart']->value['id'];?>
"><input type="number" name=quantity value="<?php echo $_smarty_tpl->tpl_vars['cart']->value['quantity'];?>
"></td>
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
  </table>
  <a href="/WOWShop/store/ordercheck" class="create">結帳</a>
</div>
<?php echo '<script'; ?>
>
  $("input[name=quantity]").on("change", function() {
    $this = $(this);
    $quantity = $this.val();
    $productId = $this.prev().val();
    $cartId = $this.prev().prev().val();
    $.ajax({
      type:"GET",
      url:"/WOWShop/store/cartUpdate?productId="+$productId + "&quantity=" + $quantity + "&cartId=" + $cartId
    })
    .done(function (data) {
      $data = JSON.parse(data);
      alert($data['message']);
      $this.parent().next().next().html($data['total']);
      var sum = 0;
      $('.cartTotal').each(function(){
        $this = $(this);
        sum += parseFloat($this.html());
      });
      $('.total').html("總計：" + sum);
    })
  });
  var sum = 0;
  $('.cartTotal').each(function(){
    $this = $(this);
    sum += parseFloat($this.html());
  });
  $('.total').html("總計：" + sum);
<?php echo '</script'; ?>
><?php }
}
