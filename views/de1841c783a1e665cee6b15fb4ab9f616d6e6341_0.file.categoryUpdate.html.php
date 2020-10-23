<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-16 02:12:05
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/categoryUpdate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8901756bbac4_97187455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de1841c783a1e665cee6b15fb4ab9f616d6e6341' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/categoryUpdate.html',
      1 => 1602814322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f8901756bbac4_97187455 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style>
  #preview {
    display: none;
  }
  #preview.show {
    display: block;
  }
</style>
<div style="padding-top:7em;" align="center">
  <form method="post" action="/WOWShop/backend/categoryUpdate/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" enctype="multipart/form-data">
    名稱：<input type='text' name='name' required="required" value='<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
'><br>
    縮圖：<input type="file" name="fileToUpload" id="fileToUpload">
    <div class="c-zt-pic">
      <img id="preview" width=300px src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['category']->value['icon'];?>
">
    </div><br>
    <input type="submit" value="建立">
  </form>
</div>
<?php echo '<script'; ?>
>
  $('#fileToUpload').change(function () {
    var f = document.getElementById('fileToUpload').files[0];
    var src = window.URL.createObjectURL(f);
    document.getElementById('preview').src = src;
  });
  preview.classList.toggle('show');
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
