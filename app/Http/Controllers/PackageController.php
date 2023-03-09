<?php

namespace App\Http\Controllers;

use App\Models\PackageModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    //

    public function packeageList()
    {
        return view('backend.package.index');
    }

    function search_package(Request $request)
    {
        if ($request->ajax()) {
            $query = PackageModel::query();
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

    public function packageCreate(Request $request)
    {
// dd($request);
        $request->validate([
            'name' => 'required',
            'monthly_bill' => 'required',
            'validity_days' => 'required',
        ]);

        $package = new PackageModel();
        $package->name = $request->name;
        $package->monthly_bill = $request->monthly_bill;
        $package->validity_days = $request->validity_days;
        $package->save();
        return redirect()->back();
    }

    public function packageEdit($id)
    {
        $data = PackageModel::find($id);
        return response()->json(['data' => $data]);
    }

    public function packageUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'monthly_bill' => 'required',
            'validity_days' => 'required'
        ]);


        PackageModel::find($request->edit_id)->update($request->all());
        return response()->json(['success' => 'Done']);
    }

    public function packageDelete($id)
    {
        PackageModel::find($id)->delete();
        return response()->json(['success' => 'Done']);
    }

}
