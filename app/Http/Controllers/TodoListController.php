<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\TodoListAttachment;
use App\Service\TodoListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,TodoListService $listService)
    {
        return  $listService->findBySearchCondition($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:140',
            'content' => 'required',
            'done_at' => 'date'
        ]);


        $todoList =  TodoList::create($request->except(['attachment']));
        $attachmentId = $request->get("attachment");
        if ($attachmentId){
            $todoList->attachment()->associate(TodoListAttachment::find($attachmentId));
        }
        $todoList->save();
        return $todoList;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TodoList::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:140',
            'content' => 'required',
            'done_at' => 'date'
        ]);

        $todoList = TodoList::findOrFail($id);

        Gate::authorize('show-todoLis-attachment', $todoList);

        $todoList->update($request->all());

        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todoList = TodoList::find($id);
        Gate::authorize('destroy-todoLis-attachment', $todoList);
        $todoList->delete();

        return response(null, 204);
    }
}
