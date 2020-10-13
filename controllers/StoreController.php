<?php

class StoreController extends Controller
{
    public function index()
    {
        $smarty = $this->smarty();
        $smarty->assign('products', $this->model('Product')->selectAll());
        return $smarty->display('store/store.html');
    }

    //加入購物車
    public function cartAdd()
    {
        $productId = $_GET['productId'];
        $product = $this->model('Product')->select($productId);
        $quantity = $_GET['quantity'];
        $cart = $this->model('Cart');
        $data['orderId'] = $_COOKIE['orderId'];
        $data['productId'] = $productId;
        $data['quantity'] = $quantity;
        $data['total'] = $quantity * $product['price'];
        $cartOld = $cart->selectCart($_COOKIE['orderId'], $productId);
        if ($cartOld) {
            $data['quantity'] += $cartOld['quantity'];
            $data['total'] = $data['quantity'] * $product['price'];
            $cart->update($cartOld['id'], $data);
        } else {
            $cart->add($data);
        }
        $json = array("status" => "1", "message" => "加入成功");
        echo json_encode($json);
    }

    //修改購物車
    public function cartUpdate()
    {
        $productId = $_GET['productId'];
        $product = $this->model('Product')->select($productId);
        $quantity = $_GET['quantity'];
        $cartId = $_GET['cartId'];
        $cart = $this->model('Cart');
        $data['quantity'] = $quantity;
        $data['total'] = $quantity * $product['price'];
        if ($cart->update($cartId, $data)) {
            $json = array("status" => "1", "message" => "修改成功", "total" => $quantity * $product['price']);
        } else {
            $json = array("status" => "0", "message" => "修改失敗");
        }
        echo json_encode($json);
    }

    //購物車
    public function carts()
    {
        $smarty = $this->smarty();
        $smarty->assign('carts', $this->model('Cart')->selectCarts($_COOKIE['orderId']));
        return $smarty->display('store/carts.html');
    }

    //cartDelete
    public function cartDelete()
    {
        $cartId = $_GET['cartId'];
        $this->model('Cart')->delete($cartId);
        $json = array("status" => "1", "message" => "刪除成功");
        echo json_encode($json);
    }

    //orderCheck
    public function orderCheck()
    {
        $smarty = $this->smarty();
        $smarty->assign('carts', $this->model('Cart')->selectCarts($_COOKIE['orderId']));
        return $smarty->display('store/orderCheck.html');
    }

    //付款
    public function pay()
    {
        $carts = $this->model('Cart')->selectCarts($_COOKIE['orderId']);
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['total'];
        }
        $data['subtotal'] = $total;
        $this->model('Order')->update($_COOKIE['orderId'], $data);
        $order = $this->model('Order')->select($_COOKIE['orderId']);
        include 'views/store/ECPay.Payment.Integration.php';
        try {

            $obj = new ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5"; //服務位置
            $obj->HashKey = '5294y06JbISpM5x9'; //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV = 'v77hoKGq4kWxNNIS'; //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID = '2000132'; //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1'; //CheckMacValue加密類型，請固定填入1，使用SHA256加密

            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = "Test" . time();
            $obj->Send['ReturnURL'] = "http://localhost:8888/WOWShop/store/orderDone?orderId=$order[id]"; //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo'] = $MerchantTradeNo; //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s'); //交易時間
            $obj->Send['TotalAmount'] = $total; //交易金額
            $obj->Send['TradeDesc'] = "魔獸世界"; //交易描述
            $obj->Send['ChoosePayment'] = ECPay_PaymentMethod::Credit; //付款方式:信用卡

            //訂單的商品資料
            foreach ($carts as $cart) {
                array_push($obj->Send['Items'], array('Name' => "$cart[name]", 'Price' => $cart['price'],
                    'Currency' => "元", 'Quantity' => $cart['quantity'], 'URL' => "dedwed"));
            }

            //因沒固定網域，無法接收結帳資訊，故先在此假設以結帳。
            $date['paymentDateTime'] = date("Y/m/d");
            $data['done'] = true;
            $data['paymentType'] = '信用卡';
            $this->delCookie('orderId');
            $this->model('Order')->update($_COOKIE['orderId'], $data);

            //產生訂單(auto submit至ECPay)
            $obj->CheckOut();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //已完成訂單
    public function orders()
    {
        $smarty = $this->smarty();
        $smarty->assign('orders', $this->model('Order')->selectOrderDone($_COOKIE['userId']));
        return $smarty->display('store/orders.html');
    }
}
