<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Shop;


class ShopController extends Controller
{
    public function index()
    {

        // 1 対 多
        $shops = Area::find(1)->shops; // AreaModelのshopsメソッド
        $area = Shop::find(3)->area;

        // 多対多
        $routes = Shop::find(1)->routes()->get(); // ShopModelに記載したroutes()
        dd($shops, $area, $routes);
    }
}
