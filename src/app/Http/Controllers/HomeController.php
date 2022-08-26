<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ログインユーザーを取得
        $user = Auth::user();

        // ログインユーザーに紐づくフォルダーを一つ取得
        $folder = $user->folders()->first();

        // まだ一つもフォルダを作っていなければ、ホームページをレスポンス
        if(is_null($folder)) {
            return view('home');
        }

        return view('home');

        //　フォルダがあれば、そのフォルダのタスク一覧にリダイレクトする
        // return redirect()->route('tasks.index', [
        //     'id' => $folder->id,
        // ]);
    }
}
