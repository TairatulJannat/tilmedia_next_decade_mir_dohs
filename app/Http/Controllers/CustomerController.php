<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CustomerModel;
use App\Models\PackageModel;
use App\Models\SetTopBoxModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\isTrue;

class CustomerController extends Controller
{
    //

    public function customer_profile()
    {
        $customer = CustomerModel::where('id', session('LoggedCustomer'))->first();
        return view('backend.customer.customer_profile', compact('customer'));
    }

    public function userList()
    {
        return view('backend.customer.index');
    }

    public function customerCreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'contact_no' => 'required|unique:customers|numeric|digits:11',
            'address' => 'required',
            'password' => 'required|min:6',
            // 'status' => 'required',
        ]);

        $customer = new CustomerModel();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->contact_no = $request->contact_no;
        $customer->password = Hash::make($request->password);
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->created_by = session('LoggedAdmin');
        $customer->save();

        return redirect()->back();
    }

    function search_user(Request $request)
    {
        if ($request->ajax()) {
            $query = CustomerModel::query();
            $query->orderBy('id', 'DESC');
            return DataTables::of($query)
                ->setTotalRecords($query->count())
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-outline-danger btn-sm" onclick="delete_data(' . $data->id . ')">Delete</a> <a href="javascript:void(0)" class="edit btn btn-outline-success btn-sm" onclick="edit(' . $data->id . ')">Edit</a> <a href="javascript:void(0)" class="package btn btn-outline-warning btn-sm" onclick="package(' . $data->id . ')">Package</a> <a href="javascript:void(0)" class="SetTopBox btn btn-outline-dark btn-sm" onclick="SetTopBox(' . $data->id . ')">SetTopBox</a> <a  target="_blank" href="' . route('customer_profile_view', $data->id) . '" class="package btn btn-outline-info btn-sm" >view</a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == '1') {
                        return '<button class="btn btn-success btn-sm">Active</button>';
                    }
                    if ($data->status == '0') {
                        return '<button class="btn btn-danger btn-sm">Inactive</button>';
                    }
                })->addColumn('package', function ($data) {
                    return $data->package_id ? $data->package->name : '';
                })->addColumn('set_top_box', function ($data) {
                    $settopview = "";
                    $settopboxs = SetTopBoxModel::where('customer_id', $data->id)->get();
                    foreach ($settopboxs as $settopbox) {
                        $settopview .= '<button class="btn btn-info btn-xs">' . $settopbox->box_name . '</button>&nbsp';
                    }
                    return $settopview;
                })
                ->rawColumns(['action', 'status', 'package', 'set_top_box'])
                ->make(true);
        }
    }

    public function customerEdit($id)
    {
        $data = CustomerModel::find($id);
        return response()->json(['data' => $data]);
    }

    public function customerUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25',
            'contact_no' => "required|digits:11|unique:customers,contact_no,$request->edit_id,id",
            'address' => 'required',
            'email' => 'required',
            // 'status' => "required",
        ]);

        CustomerModel::find($request->edit_id)->update($request->all());
        return response()->json(['success' => 'Done']);
    }

    public function customerDelete($id)
    {
        $customer = CustomerModel::find($id);

        $api_response = deactivate_smart_card($customer->set_top_box->sc_id, $customer->id,);

        if ($api_response['status']) {
            $package = SetTopBoxModel::find($customer->set_top_box_id);
            $package->status = 0;
            $package->update();

            $customer->delete();
            return response()->json(['message' => 'Done', 'status' => true]);
        } else {
            return response()->json(['message' => $api_response['message'], 'status' => false]);
        }
    }

    public function passwordReset(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'password' => 'required|confirmed'
        // ]);

        $customer = CustomerModel::find(session('LoggedCustomer'));
        // dd($customer);
        if (Hash::check($request->old_password, $customer->password)) {
            $customer->password = Hash::make($request->password);
            $customer->update();
            return back()->with('status', 'Password changed successfully!');
        } else {
            return back()->with('error', "Old Password Doesn't match!");
        }
    }

    public function package_assign($id)
    {
        $customer = CustomerModel::find($id);
        $packages = PackageModel::all();
        $customer_package = PackageModel::find($customer->package_id);
        return response()->json(['packages' => $packages, 'customer' => $customer, 'customer_package' => $customer_package]);
    }

    public function package_assign_perform(Request $request)
    {
        $customer = CustomerModel::find($request->customer_id);
        // $package = PackageModel::find($request->package_id);
        $customerSettop = SetTopBoxModel::where('customer_id', $customer->id)->first();

        $package_api_response = package_update($customerSettop->sc_id, $request->package_id, $request->connection_to, $request->connection_from);

        if ($package_api_response['status']) {
            $customer->package_id = $request->package_id;
            $customer->connection_to = $request->connection_to;
            $customer->connection_from = $request->connection_from;
            $customer->update();
            return response()->json(['message' => 'Package Assigned', 'status' => true]);
        } else {
            return response()->json(['message' => $package_api_response['message'], 'status' => false]);
        }
    }

    public function settop_box_assign($id)
    {
        $customer = CustomerModel::find($id);

        $settopboxes = SetTopBoxModel::where('device_status', "0")->get();

        return response()->json(['customer' => $customer, 'settopboxes' => $settopboxes]);
    }

    public function settop_box_assign_perform(Request $request)
    {
        $cnt = false;

        $customer = CustomerModel::find($request->settop_customer_id);
        foreach ($request->set_top_box_id as $set_top_box) {
            $settopbox = SetTopBoxModel::find($set_top_box);
<<<<<<< HEAD
            
            $customer_add_smart_card = $request->device_status == 0 ? add_smart_card(
                $settopbox->sc_id,
                $settopbox->stb_id,
                $customer->id,
                $customer->name,
                $customer->contact_no,
                $customer->address
            ) : deactivate_smart_card($settopbox->sc_id, $customer->id);
            if ($customer_add_smart_card['status'] == true) {
                //update customer status
                $settopbox->customer_id = $customer->id;
                $settopbox->device_status = $request->device_status;

                $settopbox->update();
                //update set-top-box status
                $cnt = true;
=======

            if ($request->device_status == "1") {
                $customer_add_smart_card = add_smart_card(
                    $settopbox->sc_id,
                    $settopbox->stb_id,
                    $customer->id,
                    $customer->name,
                    $customer->contact_no,
                    $customer->address
                );
                if ($customer_add_smart_card['status'] == true) {
                    //update customer status
                    $settopbox->customer_id = $customer->id;
                    $settopbox->device_status = $request->device_status;

                    $settopbox->update();

                    //update set-top-box status
                    $cnt = 1;
                }
            } else if ($request->device_status == "0") {
                $customer_deactive_smart_card = deactivate_smart_card($settopbox->sc_id, $customer->id);
                if ($customer_deactive_smart_card['status'] == true) {
                    $settopbox->customer_id = null;
                    $settopbox->device_status = $request->device_status;
                    $settopbox->update();
                    $cnt = 2;
                }
>>>>>>> bf146c8 (settopbox update)
            }
        }

        if ($cnt == false) {
            return response()->json(['message' => $customer_add_smart_card['message'], 'status' => false]);
<<<<<<< HEAD
        } else
            return response()->json(['message' => 'Assigned', 'status' => true]);
=======
        } else if ($cnt == 1) {
            return response()->json(['message' => 'Assigned', 'status' => true]);
        } else if ($cnt == 2) {
            return response()->json(['message' => 'Unassigned', 'status' => true]);
        }
>>>>>>> bf146c8 (settopbox update)
    }

    public function customerProfileView($id)
    {
        $customer = CustomerModel::find($id);
        $customerPackage = PackageModel::find($customer->package_id);
        $created_by = AdminModel::find($customer->created_by);
        return view('backend.admin.admin_customer_profile', compact('customer', 'customerPackage', 'created_by'));
    }
}
