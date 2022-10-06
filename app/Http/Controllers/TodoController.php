<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;
class TodoController extends Controller
{
    public function todoList()
    {
        $todos = Todo::all();
        return view('todo',compact('todos'));
    }
    public function todoListAdd(Request $request)
    {
        $request->validate(
            [
                'content'=>'required|min:5'
            ],
            [
                'content.required'=>'İçerik alanı boş bırakılamaz'
            ]
        );
        Todo::create([
            'content'=>$request->content,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function todoDelete($id,Request $request)
    {
        Todo::find($id)->delete();
        return response()->json(['message' => "Silindi" , "status" => "Success"]);
    }
}
