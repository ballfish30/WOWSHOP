<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 09:20:58
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roleUserCreate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f85717aa89c27_25563211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2df1989d181d93b42dd5905862e8815e1ad7dec3' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/roleUserCreate.html',
      1 => 1602580854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
    'file:views/backend/footer.html' => 1,
  ),
),false)) {
function content_5f85717aa89c27_25563211 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <form method="post" action="/WOWSHOP/backend/roleUserCreate"> 
    職位：
    <select name=role>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
        <option value='<?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
'><?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
</option>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>
    帳號：<input type="text" id="login" name="accountName" placeholder="accountName" required="required"><br><br>
    密碼：<input type="text" id="password" name="passwd" placeholder="password" required="required"><br><br>
    暱稱：<input type="text" name="userName" placeholder="userName" required="required" value="<?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
"><br><br>
    信箱：<input type="text" name="email" placeholder="email" required="required" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"><br><br>
    電話：<input type="text" name="phone" placeholder="phone" required="required" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"><br><br>
    <input type="submit" class="" value="新增">
  </form>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:views/backend/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
