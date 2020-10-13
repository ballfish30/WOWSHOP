<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 04:17:11
  from '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/members.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f852a47b35010_35621856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f00756acaebddf88c43c4440767f3807ba620c46' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/Backend/members.html',
      1 => 1602562623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/backend/head.html' => 1,
  ),
),false)) {
function content_5f852a47b35010_35621856 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/backend/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div style="padding-top:7em;" align="center">
  <table>
    <tr>
      <th>編號</th><th>會員名稱</th><th>會員級別</th><th>啟用／停用</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['members']->value, 'member', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['member']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->do_else = false;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['member']->value['id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['member']->value['userName'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['member']->value['email'];?>
</td>
        <td><input type="checkbox" name="isActive" value='<?php echo $_smarty_tpl->tpl_vars['member']->value['id'];?>
'<?php if ($_smarty_tpl->tpl_vars['member']->value['isActive']) {?>checked<?php }?>></td>
      </tr>   
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>
</div>
<?php echo '<script'; ?>
>
  $(document).on('change', 'input[name=isActive]', function () {
    var $this = $(this);
    $.ajax({
          type:"GET",
          url:"/WOWShop/backend/memberisActive?userId="+$this.val()
        })
        .done(function (data) {
          alert(data);
        })
  });
<?php echo '</script'; ?>
><?php }
}
