<?php

namespace App\Http\Controllers\Lists;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Lists\UserList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    // get all user's lists
    public function index()
    {
        $lists = auth()->user()->lists;
        return response()->json($lists);
    }

    // create a new list
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $user = User::find(auth()->user()->id);
        $list = new UserList();
        $list->name = $request->get('name');
        $list->user_id = $user->id;
        $list->save();

        return response()->json($list);
    }

    // get a list by id
    public function show($id)
    {
        $user = User::find(auth()->user()->id);
        $list = $user->lists()->find($id);
        if (!$list) {
            return response()->json(['error' => 'List not found'], 404);
        }
        return response()->json($list);
    }

    // update a list by id
    public function update(Request $request, $id)
    {
        $user = User::find(auth()->user()->id);
        $list = $user->lists()->find($id);

        if (!$list) {
            return response()->json(['error' => 'List not found'], 404);
        }

        // $list->update($request->all());

        if ($list && $request->serie_id) {
            $list->series()->sync($request->serie_id);
        }

        if ($list && $request->movie_id) {
            $list->movies()->sync($request->movie_id);
        }
        return response()->json($list);
    }

    // delete a list by id
    public function destroy($id)
    {
        $user = User::find(auth()->user()->id);
        $list = $user->lists()->find($id);
        if (!$list) {
            return response()->json(['error' => 'List not found'], 404);
        }
        $list->delete();
        return response()->json(['message' => 'List deleted successfully']);
    }
}
