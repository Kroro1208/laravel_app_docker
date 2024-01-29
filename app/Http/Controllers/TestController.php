<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test; // モデルの読み込み
use Illuminate\Support\Facades\DB; // Facade文。DBから始まる機能を使える

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all(); // Eloquent
        $count = Test::count();
        $first = Test::findOrFail(1); // IDを指定してインスタンスを返す
        $whereTest = Test::where("test", "=", "これはテストデータです")->get(); // 条件指定

        // クエリビルダ
        $queryBuilder = DB::table("tests")->where("test", "=", "これはテストデータです")
            ->select("id", "test")
            ->get();

        dd($values, $count,  $first, $whereTest, $queryBuilder);
        return view("tests.test", compact("values"));
    }
}
