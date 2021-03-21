<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Somerecord;

class SomerecordsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧をymdの降順で取得
            $somerecords = $user->somerecords()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'somerecords' => $somerecords,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    public function create()
    {
        $somerecord = new Somerecord;
        // メッセージ作成ビューを表示
        return view('somerecords.create',[
            'somerecord' => $somerecord,
        ]);
    }
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:100',
            'memo' => 'max:400',
            'ymd' => 'required|max:50'
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->somerecords()->create([
            'title' => $request->title,
            'memo' => $request->memo,
            'ymd' => $request->ymd,
        ]);
        return redirect('/');
    }
    public function edit($id)
    {
        $somerecord = Somerecord::findOrFail($id);
        // 編集ビューでそれを表示
        return view('somerecords.edit', [
            'somerecord' => $somerecord,
        ]);
    }

    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:100',
            'memo' => 'max:400',
            'ymd' => 'required|max:50'
        ]);
        $somerecord = Somerecord::findOrFail($id);
        //更新
        $somerecord->title = $request->title;
        $somerecord->memo = $request->memo;
        $somerecord->ymd = $request->ymd;

        $somerecord->save();
        return redirect('/');
    }
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $somerecord = \App\Somerecord::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $somerecord->user_id) {
            $somerecord->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }

}
