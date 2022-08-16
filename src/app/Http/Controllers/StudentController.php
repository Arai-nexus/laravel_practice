<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


// 仕様
// メールフォーム（正規表現）とか、文字数とか送信するときにバリデーション引っかかる場合は、
// 5秒間バリデーションで引っかかった内容が表示されるフラッシュメッセージを実装しましょう。
class StudentController extends Controller
{
    // DBからデータを取得
    public function index(Request $request)
    {
        //キーワード受け取り
        $keyword = $request->input('keyword');

        $query = Student::query();

        //もしキーワードがあったら
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
            $query->orWhere('email', 'like', '%' . $keyword . '%');
            $query->orWhere('tel', 'like', '%' . $keyword . '%');
            $query->orWhere('message', 'like', '%' . $keyword . '%');
        }

        // 検索条件の絞り込みをかけた全件取得
        $students = $query->get();
        return view('index')->with([
            'students' => $students,
            'keyword' => $keyword
        ]);
    }

    // 新規登録画面へ遷移
    public function create()
    {
        return view('student.create');
    }

    // データ登録処理
    public function store(Request $request)
    {
        //生徒のデータを受け取る
        $data = $request->all();

        if (!$data) {
            return redirect(route('create'))->with('flash_message', '項目を全て入力してください。');
        }

        // 生徒を登録
        Student::create($data);
        return redirect(route('index'))->with('flash_message', '投稿が完了しました。');
    }

    // ブログ編集画面表示
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit')->with('student', $student);
    }

    // ブログ更新
    public function update(Request $request, $id)
    {
        $stundent = Student::find($id);

        $stundent->name = $request->name;
        $stundent->email = $request->email;
        $stundent->tel = $request->tel;
        $stundent->message = $request->message;

        $stundent->save();
        return redirect(route('index'));
    }

    // ブログ削除
    public function delete($id)
    {
        $stundent = Student::find($id);
        $stundent->delete();
        return redirect('/');
    }
}
