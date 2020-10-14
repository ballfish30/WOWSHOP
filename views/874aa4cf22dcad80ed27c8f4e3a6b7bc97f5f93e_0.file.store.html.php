<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 10:03:45
  from '/Applications/MAMP/htdocs/WOWSHOP/views/store/store.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f86cd01bfa988_53015389',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '874aa4cf22dcad80ed27c8f4e3a6b7bc97f5f93e' => 
    array (
      0 => '/Applications/MAMP/htdocs/WOWSHOP/views/store/store.html',
      1 => 1602669822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:views/store/head.html' => 1,
  ),
),false)) {
function content_5f86cd01bfa988_53015389 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:views/store/head.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="wrap full-wrap">
  <div class="main-wrap">
    <section class="main main-archive">
      <div class="looｐ">
        <article class="post format-gallery post_format-post-format-gallery">
          <a href="#" title="陰間條例 夜神篇">
            <div class="part-gallery">
              <div class="flexslider">
                <ul class="slides">
                  <li><span class="post-image"><img class="post-image" style="background: #0e0e0e;" width="502" height="502" src="/WOWSHOP/img/BOH-2.png" alt="陰間條例 夜神篇" /></span></li>
                  <!-- <li><span class="post-image"><img width="502" height="502" src="/PID_Assignment/img/118076033_1485082471673645_778841976934694298_n.jpg" alt="Run-1" /></span></li>
                  <li><span class="post-image"><img width="502" height="502" src="/PID_Assignment/img/118398197_1483998731782019_4389253984520822273_o.jpg" alt="Run-2" /></span></li> -->
                </ul>
              </div>
            </div>
          </a>
          <div class="inner">
            <h2 class="entry-title">
              <a href="#" title="部落氣息">
                部落氣息 </a>
            </h2>
            <ul class="meta top">
              <li class="time">
                <a href="#" title="陰間條例 夜神篇">
                  <time class="post-date updated" datetime="2015-02-01">September 2, 2020</time>
                </a></li>
              <li class="author-m post-tags">
                By <span class="vcard author post-author"><span class="fn"><a href="#" title="Posts by Clare Smith" rel="author">Ballfish</a></span></span>
              </li>
            </ul>
            <div class="post-content">
              <p>Breath of Horde為魔獸世界經典版開服就創立至今的休閒型公會，

                公會所有副本團隊皆為內銷金模式，不使用DKP、EPGP、ROLL等方式，
                
                我們認為金團模式是最符合現今生態的規則，我們在乎公平及勞有所得，
                
                對於心儀的裝備，想先拿的就付出對應的金幣，而沒有拿取裝備的團員
                
                則有金幣收入，並且我們只組會內成員，形成良性內銷金生態。
                
                ​
                
                公會核心骨幹為十年以上並肩作戰的老戰友，
                
                我們走過大小遊戲最後再次齊聚魔獸，全通NAXX是我們的目標，
                
                並在能力所及下拿下每一個團本的好成績，
                
                公會三權分立，指揮拍賣、會計財務、後勤管理各自獨立運作，
                
                並設有法務組監管，公會各團位置安排皆為中央幹部統一管理安排，
                
                您只需要告知您的可配合出席時間，便可以得到安排出團位置的機會，
                
                並且我們也設有輪調制度來為工作時間不穩定、輪班的會員爭取更多出團機會。
                
                ​
                
                Breath of  Horde為永續經營公會，
                
                你的魔獸、你的未來，我負責，歡迎加入我們！</p>
            </div>
          </div>
        </article>
      </div>
    </section>



    <h1>戰場補給</h1>
    <div class="row">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, NULL, 'foo', array (
));
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <div class="col-md-4">
          <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h3>
          <div>
            <div class="pull-left">
              <img src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['product']->value['img'];?>
" style="background-size: contain; width:200px; height:250px" border="0" title="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
            </div>
            <div class="pull-left">
              <h4><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
$NTD</h4>
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                <div class="form-group">
                  <label>數量：</label>
                  <input type="number" value="1" class="form-control quantity">
                </div>
                <div class="form-group pull-right">
                  <butten class="btn btn-danger add-to-cart">
                    <i class="fa fa-shopping-cart">加入購物車</i>
                  </butten>
                </div>
            </div>
            <div class="clearfix">
            </div>
          </div>
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div><!-- /main-wrap -->
</div><!-- /wrap -->

<?php echo '<script'; ?>
>
  $(".add-to-cart").on("click", function() {
    $this = $(this);
    $productId = $this.parent().prev().parent().children().next().first().val();
    $quantity = $this.parent().parent().children().children().next().val();
    console.log("/WOWShop/store/cartAdd?productId="+$productId + "&quantity=" + $quantity)
    $.ajax({
      type:"GET",
      url:"/WOWShop/store/cartAdd?productId="+$productId + "&quantity=" + $quantity
    })
    .done(function (data) {
      $data = JSON.parse(data);
      alert($data['message']);
    })
  });
<?php echo '</script'; ?>
><?php }
}
