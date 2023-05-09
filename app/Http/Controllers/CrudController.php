<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
// use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    public function index(Request $request)
    {
        // $cruds = Crud::where('status', $request->status);
        
        $crud = QueryBuilder::for(Crud::class)
            ->allowedFilters(['status', 'rating'])
            ->allowedIncludes(['user'])
            ->paginate()
            ->appends(request()->query());


        return response()->json(
            [
                'message' => 'Data fetched successfully!',
                'data' => $crud,
            ], 200
        );
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ]);
        
        $data = new Crud;
        
        // $data->id = Str::uuid();

        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->user_id = $request->user_id;
        $data->save();

        return response()->json(
            [
                'message' => 'Data created successfully!',
                'data' => $data,
            ], 200
        );
    }

    public function show($id)
    {
        $data = Crud::findOrFail($id);
        return response()->json(
            [
                'message' => 'Data fetched successfully!',
                'data' => $data,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $data = Crud::findOrFail($id);
        
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->user_id = $request->user_id;
        $data->rating = $request->rating;
        
        $data->update();

        return response()->json(
            [
                'message' => 'Data Updated successfully!',
                'data' => $data,
            ]
        );
    }

    public function destroy($id)
    {
        $data = Crud::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }

    public function user($id)
    {
        // $user = User::findOrFail($id);
        $user = User::where('id', $id);
        // $add = $user->address;
        // $adds = $user->crud;
        $data = QueryBuilder::for($user)
            ->allowedIncludes(['address', 'crud'])
            ->get();

        return response()->json(
            [
                'message' => 'Successfull',
                'data' => $data,
            ]
        );
    }
}
