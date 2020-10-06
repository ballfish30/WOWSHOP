<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-06 01:54:04
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/categoryCreate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7bce3c344347_12935739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaa47250ff69fed85e5eb13314f4a27aff3d878a' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/categoryCreate.html',
      1 => 1601949239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f7bce3c344347_12935739 (Smarty_Internal_Template $_smarty_tpl) {
?>這是新增類別<br>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style>
  #preview {
    display: none;
  }
  #preview.show {
    display: block;
  }
</style>
<form method="post" action="/WOWShop/backend/categoryCreate" enctype="multipart/form-data">
  名稱：<input type='text' name='name' required="required"><br>
  縮圖：<input type="file" name="fileToUpload" id="fileToUpload">
  <div class="c-zt-pic">
    <img id="preview" width=300px src="">
  </div><br>
  <input type="submit" value="建立">
</form>
<?php echo '<script'; ?>
>
  $('#fileToUpload').change(function () {
    var f = document.getElementById('fileToUpload').files[0];
    var src = window.URL.createObjectURL(f);
    document.getElementById('preview').src = src;
    preview.classList.toggle('show');
  });
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
