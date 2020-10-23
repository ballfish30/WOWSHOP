<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-16 06:10:35
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/products.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f89395ba80991_61323997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '170a2743ef4fd6f0748e3029003fcecf48f7fa03' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/products.html',
      1 => 1602828632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f89395ba80991_61323997 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <?php if ($_smarty_tpl->tpl_vars['productCreate']->value) {?>
  <a href="/WOWSHOP/backend/productCreate" class="create">新增</a>
  <?php }?>
  <table text-align="center" text-valign="middle">
    <tr>
      <th>商品圖</th>
      <th>名稱</th>
      <th>裝等</th>
      <th>品質</th>
      <th>數量</th>
      <th>價格</th>
      <th>介紹</th>
      <?php if ($_smarty_tpl->tpl_vars['productDelete']->value) {?>
      <th>刪除</th>
      <?php }?>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
      <tr>
        <td><img height="100px" width="100px" src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['product']->value['img'];?>
"/></td>
        <?php if ($_smarty_tpl->tpl_vars['productUpdate']->value) {?>
        <td><a href="/WOWSHOP/backend/productUpdate/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="update"><pre><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</pre></a></td>
        <?php } else { ?>
        <td><pre><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</pre></td>
        <?php }?>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['itemLevel'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['quality'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['invetory'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['introduction'];?>
</td>
        <?php if ($_smarty_tpl->tpl_vars['productDelete']->value) {?>
        <td><button class="cancel" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" type="button">刪除</button></td>
        <?php }?>
      </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>
</div>
<?php echo '<script'; ?>
>
  $(document).on('click', '.cancel', function () {
    var $this = $(this);
    if (!confirm("是否刪除")){
      return false;
    }else{
      $.ajax({
          type:"GET",
          url:"/WOWShop/backend/productDelete/"+$this.val()
        })
        .done(function (data) {
          $data = JSON.parse(data);
          $this.parent().parent().remove();
          alert($data['message']);
        })
    }
    
  });
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
