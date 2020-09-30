<?php

class StoreController extends Controller
{
    public function index()
    {
        $smarty = $this->smarty();
        return $smarty->display('user/login.html');
    }
}
