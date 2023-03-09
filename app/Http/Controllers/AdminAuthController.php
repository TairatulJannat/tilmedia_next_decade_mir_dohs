<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    //

    public function adminLoginPerform(Request $request)
    {
        $request->validate([
            'email' => "required",
            'password' => "required",
        ]);
        $admin = AdminModel::where('email', $request->email)->first();
        $customer = CustomerModel::where('email', $request->email)->first();
        if ($admin) {
            if (Hash::check($request['password'], $admin->password)) {
                $request->session()->put('LoggedAdmin', $admin->id);
                $request->session()->put('LoggedAdminName', $admin->name);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with("Password Does not Matched!");
            }
        } else if ($customer) {

            if (Hash::check($request['password'], $customer->password)) {
                $request->session()->put('LoggedCustomer', $customer->id);
                $request->session()->put('LoggedCustomerName', $customer->name);
                return redirect()->route('customer_profile');
            } else {
                return redirect()->back()->with("Password Does not Matched!");
            }
        } else {
            return redirect()->back()->with("No Profile Found");
        }
    }



    public function admin_logout()
    {
        if (session()->has('LoggedAdmin')) {
            session()->pull('LoggedAdmin');
            session()->pull('LoggedAdminName');
            return redirect()->route('admin_login');
        }

        else if (session()->has('LoggedCustomer')) {
            session()->pull('LoggedCustomer');
            session()->pull('LoggedCustomerName');
            return redirect()->route('admin_login');
        }
    }
}
