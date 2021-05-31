<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使うクラスを宣言
use App\Models\Todo;
use Validator;

class TodosController extends Controller
{
    //Todoリストを表示
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'asc')->get();
        return view('todos', [
            'todos' => $todos
        ]);
    }

    //登録
    public function create(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:20',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquentモデル（登録処理）
        $todos = new Todo();
        $todos->content = $request->content;
        $todos->save();
        return redirect('/');
    }
    //更新
    public function update(Request $request, Todo $todo)
    {
        //データ更新
        $todo = Todo::find($request->id);
        $todo->content = $request->content;
        $todo->save();
        return redirect('/');
    }
     //削除
     public function delete(Todo $todo)
     {
        $todo->delete();
        return redirect('/');
     }
}
