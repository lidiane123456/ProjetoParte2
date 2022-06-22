<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Hamcrest\Description;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
   
    public function index()
    {
        $todolist= todolist::all();
        return view('home', compact('todolist'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'conteudo' => 'required'
        ]);

        todolist::create($data);
        return back();
    }

    public function update(Request $request, int $id)
    {

            $todolist = todolist::findOrFail($id);
            $todolist->update($request->all());
            return back();

    }

 
    public function destroy(todolist $todolist)
    {
            $todolist->delete();
            return back();

    }
}
