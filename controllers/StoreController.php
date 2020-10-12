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
        if ($cartOld){
            $data['quantity'] += $cartOld['quantity'];
            $data['total'] = $data['quantity'] * $product['price'];
            $cart->update($cartOld['id'], $data);
        }
        else
        {
            $cart->add($data);
        }
        $json = array("status"=>"1", "message"=>"加入成功");
        echo json_encode($json);
    }

    //修改購物車
    public function cartUpdate()
    {

    }
}
