<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 07:30:50
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/categorys.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f86a92a302065_20131448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cd6e91702a98d3e6fc2fd9eacfc0e7b781096c9' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/categorys.html',
      1 => 1602660628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f86a92a302065_20131448 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <a href="/WOWSHOP/backend/categoryCreate" class="create">新增</a>
  <table text-align="center" text-valign="middle">
      <tr>
        <th>圖示</th><th>類別名稱</th><th>刪除</th>
      </tr>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorys']->value, 'category', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
      <tr>
        <td><img height="50px" width="50px" src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['category']->value['icon'];?>
"/></td>
        <td><a href="#" class="update"><pre><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</pre></a></td>
        <td><button class="cancel" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" type="button">刪除</button> </td>
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
          url:"/WOWShop/backend/categoryDelete/"+$this.val()
        })
        .done(function (data) {
          $data = JSON.parse(data);
          alert($data['message']);
          $this.parent().parent().remove();
        })
    }
    
  });
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
