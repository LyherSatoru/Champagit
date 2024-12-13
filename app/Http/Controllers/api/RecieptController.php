<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\shop\ShopModel;
use Illuminate\Http\Request;
class RecieptController extends Controller
{
    public function customer001(){
        $customer = ShopModel::get();
        return $customer;
    }
}
