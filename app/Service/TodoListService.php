<?php


namespace App\Service;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListService
{
    public function findBySearchCondition(Request $request)
    {
        $qb = TodoList::query()->with('attachment');

        $searchTitle = $request->get("title");
        if ($searchTitle){
            $qb->title($searchTitle);
        }

        $searchContent = $request->get("content");
        if ($searchContent){
            $qb->content($searchContent);
        }

        $paginate = $request->get("paginate");
        if ($paginate){
            $qb->paginate($paginate);
        }

        $searchDoneAt = $request->get("doneAt");
        if ($searchDoneAt && isset($searchDoneAt["gte"])){
            $qb->doneAtGte($searchDoneAt["gte"]);
        }

        $searchDoneAt = $request->get("doneAt");
        if ($searchDoneAt && isset($searchDoneAt["lte"])){
            $qb->doneAtLte($searchDoneAt["lte"]);
        }

        return $qb->get();
    }

}
