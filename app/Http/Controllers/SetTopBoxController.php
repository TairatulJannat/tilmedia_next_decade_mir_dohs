<?php

namespace App\Http\Controllers;

use App\Models\SetTopBoxModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SetTopBoxController extends Controller
{
    //

    public function SetTopBox()
    {
        return view('backend.setTopBox.index');
    }

    public function setTopBoxCreate(Request $request)
    {
        $request->validate([

            'box_name' => 'required',
            'sc_id' => 'required',
            'stb_id' => 'required',
            'device_status' => 'required',
        ]);

        $setTop_box = new SetTopBoxModel();
        $setTop_box->box_name = $request->box_name;
        $setTop_box->sc_id =  $request->sc_id;
        $setTop_box->stb_id = $request->stb_id;
        $setTop_box->device_status = $request->device_status;
        $setTop_box->save();

        return redirect()->back();
    }

    public function search_setTopBox(Request $request)
    {
        if ($request->ajax()) {
            $query = SetTopBoxModel::query();
            $query->orderBy('id', 'DESC');
            return DataTables::of($query)
                ->setTotalRecords($query->count())
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-outline-danger btn-sm" onclick="delete_data(' . $data->id . ')">Delete</a> <a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm" onclick="edit(' . $data->id . ')">Edit</a>';
                    return $actionBtn;
                })->addColumn('status', function ($data) {
                    if ($data->device_status == "0") return '<button class="btn btn-success btn-sm">Available</button>';
                    if ($data->device_status == "1") return '<button class="btn btn-danger btn-sm">Not Available</button>';
                })->rawColumns(['action', 'status'])
                ->make(true);
        }
    }

    public function setTopBoxEdit($id)
    {
        $data = SetTopBoxModel::find($id);
        return response()->json(['data' => $data]);
    }

    public function setTopBoxUpdate(Request $request)
    {
        // $request->validate([
        //     'box_name' => 'required',
        //     'sc_id' => 'required',
        //     'stb_id' => 'required',
        //     'status' => 'required',
        // ]);

        SetTopBoxModel::find($request->edit_id)->update($request->all());
        return response()->json(['success' => 'Done']);
    }
    public function setTopBoxDelete($id)
    {
        SetTopBoxModel::find($id)->delete();
        return response()->json(['success' => 'Done']);
    }
}
