<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\TodoListAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TodoListAttachmentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

        $request->validate([
            'file' => 'required|max:2048'
        ]);
        $destinationPath = '../uploads/todoLists';
        $todoListAttachment = new TodoListAttachment();

        $todoListAttachment->file_name = $file->getClientOriginalName();

        $storeName = hash("sha256",$file->getClientOriginalName());
        $todoListAttachment->file_path = $destinationPath."/".$storeName;

        $todoListAttachment->mimetype = $file->getMimeType();

        $file->move($destinationPath,$storeName);
        $todoListAttachment->save();

        return $todoListAttachment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TodoListAttachment::findOrFail($id);
        return response(null, 204);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $todoListAttachment =  TodoListAttachment::findOrFail($id);

        Gate::authorize('show-todoLis-attachment', $todoListAttachment);

        return response()->download(
            $todoListAttachment->file_path,
            $todoListAttachment->file_name,
            [
                'mimeType'=> $todoListAttachment->mimeType
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todoListAttachment = TodoListAttachment::find($id);
        Gate::authorize('destroy-todoLis-attachment', $todoListAttachment);
        $todoListAttachment->delete();

        return response(null, 204);
    }
}
