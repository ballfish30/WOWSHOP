<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-06 07:26:42
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/productCreate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7c1c32736875_83539527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7652621e2716fe0f52ebfbae6fbf3a5dd647c30' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/productCreate.html',
      1 => 1601969199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f7c1c32736875_83539527 (Smarty_Internal_Template $_smarty_tpl) {
?>這是新增商品<br>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src='/WOWSHOP/js/jquery.min.js'><?php echo '</script'; ?>
>
<style>
  #preview {
    display: none;
  }
  #preview.show {
    display: block;
  }
</style>
<form method="post" action="/WOWShop/backend/productCreate" enctype="multipart/form-data">
  名稱：<input type='text' name='name' required="required"><br>
  <!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorys']->value, 'category', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
  <img height="250px" width="250px" src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['category']->value['icon'];?>
"/>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> -->
  類別：<select name="category" id="category">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorys']->value, 'category', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select><br>
  類別細項：<select name="secondCategory" id="secondCategory">

          </select><br>
  介紹：<br><textarea rows="4" cols="50" name="introduction"></textarea><br>
  裝等：<input type='number' name='itemLevel' required="required"><br>
  品質：<select name="quality">
        <option>粗糙</option>
        <option>普通</option>
        <option>優秀</option>
        <option>精良</option>
        <option>史詩</option>
        <option>神器</option>
      </select><br>
  價格：<input type='number' name='price' required="required"><br>
  庫存：<input type='number' name='invetory' required="required"><br>
  圖片：<input type="file" name="fileToUpload" id="fileToUpload">
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

  $('#category').change(function(){
    $.ajax({
          type:"POST",
          url:"/WOWShop/backend/secondCategorys",
          data: {
                  'categoryId': $(this).val()
          }
        })
        .done(function (data) {
          $data = JSON.parse(data);
          $html = '';
          for(secondCategory of $data){
            $html += "<option value='"+ secondCategory['id'] +"'>"+secondCategory['name']+"</option>"
          }
          $('#secondCategory').html($html);
        })
  });

  $('#category').change();
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
