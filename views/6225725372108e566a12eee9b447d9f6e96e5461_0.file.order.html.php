<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 07:23:45
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/order.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8556011be287_23570150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6225725372108e566a12eee9b447d9f6e96e5461' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/order.html',
      1 => 1602573821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
  ),
),false)) {
function content_5f8556011be287_23570150 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
  </table>
</div>
<?php echo '<script'; ?>
>
  $("input[name=quantity]").on("change", function() {
    $this = $(this);
    $quantity = $this.val();
    $productId = $this.prev().val();
    $cartId = $this.prev().prev().val();
    if ($quantity<=0){
      $.ajax({
      type:"GET",
      url:"/WOWShop/store/cartDelete?cartId=" + $cartId
      })
      .done(function (data) {
        $data = JSON.parse(data);
        alert($data['message']);
        $this.parent().parent().remove()
        var sum = 0;
        $('.cartTotal').each(function(){
          $this = $(this);
          sum += parseFloat($this.html());
        });
        $('.total').html("總計：" + sum);
      })
    }else{
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
    }
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
