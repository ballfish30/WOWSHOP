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
}
