<!--resourse/views/todos.blade.php-->
@extends('layouts.app')
@section('content')
<!--バリデーションエラーの表示に使用-->
@include('common.errors')
<!--バリデーションエラーの表示に使用-->

<!--Todo登録フォーム-->
<form action="{{ url('/todo/create') }}" method="POST" class="flex between mb-30">
    @csrf
   <input type="text" name="content" class="input-add">
   <button type="submit" class="button-add">追加</button>
</form>
<!-- 現在のタスクのリスト -->
@if (count($todos) > 0)
    <table>
        <!-- テーブルヘッダ -->
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
        <!-- テーブル本体 -->
        @foreach ($todos as $todo)
        <tr>
            <td>
                <div>{{ $todo->created_at }}</div>
            </td>
            <form action="{{ url('todo/update/'.$todo->id) }}" method="POST">
            @csrf
                <input type="hidden" name="id" value="{{ $todo->id }}">
                <td>
                    <input type="text" class="input-update" name="content" value="{{ $todo->content }}" />
                </td>
                <!-- タスクリスト: 更新ボタン -->
                <td>

                    <button type="submit" class="button-update">更新</button>
                </td>
            </form>
            <!-- タスクのリスト: 削除ボタン -->
            <td>
                <form action="{{ url('todo/delete/'.$todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="button-delete">
                        削除
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
@endsection