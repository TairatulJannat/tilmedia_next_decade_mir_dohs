<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CustomerModel;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
class AdminController extends Controller
{
    //
    public function index()
    {
        $roles = RoleModel::all();
        return view('backend.admin.index',compact('roles'));
    }

    public function adminCreate(Request $request)
    {
        // dd($request); 
        $request->validate([

            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required',
            'mobile' => 'required|numeric|unique:admins|digits:11',
            'password' => 'required',
        ]);
        $admin = new AdminModel();
        $admin->name = $request->name;
        $admin->role_id = $request->role_id;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->status = $request->status;
        $admin->password = Hash::make($request->password);
    
        $admin->save();
        return response()->json(['success' => 'Done']);
    }




    function searchAdmin(Request $request)
    {
        if ($request->ajax()) {
            $query = AdminModel::query();
            $query->orderBy('id', 'DESC');
            return DataTables::of($query)
                ->setTotalRecords($query->count())
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-outline-danger btn-sm" onclick="delete_data(' . $data->id . ')">Delete</a> <a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm" onclick="edit(' . $data->id . ')">Edit</a>';
                    return $actionBtn;
                }) ->addColumn('role', function ($data) {
                    return $data->role ? $data->role->name : '';
                })->rawColumns(['action','role'])
                ->make(true);
        }
    }



    public  function AdminEdit($id)
    {
        $admin = AdminModel::where('id', $id)->with('role')->first();
        $roles = RoleModel::all();

        return response()->json(['admin' => $admin, 'roles' => $roles]);
    }

 

    public function adminUpdate(Request $request)
    {
      $request->validate([

            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required',
            'status' => 'required',
            'mobile' => 'required|numeric|digits:11',
        ]);

         AdminModel::find($request->edit_id)->update($request->all());
        return response()->json(['success' => 'Done']);
    }

    public function adminDelete($id)
    {
        $admin = AdminModel::find($id);
        $admin->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }


    public function customerResetPassword($id)
    {
        $customer = CustomerModel::find($id);
        $customer->password = Hash::make('123456');
        $customer->update();
        return redirect()->back()->with("Password reset successfully!");
    }



    
  
}
