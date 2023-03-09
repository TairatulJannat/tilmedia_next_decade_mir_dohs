<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    //
    public function roleIndex()
    {
        return view('backend.role.index');
    }

    public function roleCreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:roles',
        ]);

        $role = new RoleModel();
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();
        return redirect()->back();
    }

    function searchRole(Request $request)
    {
        if ($request->ajax()) {
            $query = RoleModel::query();
            $query->orderBy('id', 'DESC');
            return DataTables::of($query)
                ->setTotalRecords($query->count())
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-outline-danger btn-sm" onclick="delete_data(' . $data->id . ')">Delete</a> <a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm" onclick="edit(' . $data->id . ')">Edit</a>';
                    return $actionBtn;
                })->rawColumns(['action'])
                ->make(true);
        }
    }

    public function roleEdit($id)
    {
        $data = RoleModel::find($id);
        return response()->json(['data' => $data]);
    }

    public function roleUpdate(Request $request)
    {
        $request->validate([
            'name' => "required",
            'slug' => "required",

        ]);

        RoleModel::find($request->edit_id)->update($request->all());
        return response()->json(['success' => 'Done']);
    }

    public function roleDelete($id)
    {
        RoleModel::find($id)->delete();
        return response()->json(['success' => 'Done']);
    }
}
