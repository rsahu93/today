<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function Index(){
        return view('admin.admin_login');
    } // end mehtod

    public function user(){
        return view('admin.user.index');
    } // end mehtod


    public function Dashboard(){
        return view('admin.index');
    }// end mehtod


    public function Login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']  ])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }else{
            return back()->with('error','Invaild Email Or Password');
        }

    } // end mehtod


    public function AdminLogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('login_from')->with('error','Admin Logout Successfully');

    } // end mehtod


    public function AdminRegister(){

        return view('admin.admin_register');

    } // end mehtod



    public function AdminRegisterCreate(Request $request){

        // dd($request->all());

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

         return redirect()->route('login_from')->with('error','Admin Created Successfully');

    } // end mehtod


    public function create()
    {
        if (Auth::guard('admin')->check()){
            $id = Auth::user()->id;
            $userData = User::find($id);
        }
        
        return view('admin.profile', compact('userData'));

    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->username = $request->username;

        if ($request->file('image')) {
            $file = $request->file('image');

            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/adminProfile'), $fileName);
            $userData['image'] = $fileName;
        }
        $userData->save();

        $notification = array('message'=>'Admin Profile is updated successfully','alert-type'=>'success');
        return redirect()->route('adminProfile')->with($notification);
    }

    public function edit()
    {
        $id = Auth::user()->id;

        $userData = User::find($id);
        return view('admin.profileEdit', compact('userData'));
    }

    public function update()
    {
        return view('admin.changePassword');
    }

    public function passwordUpdate(Request $request)
    {
        $validate = $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirm_password'=>'required|same:newpassword',
        ]);

        $checkPass = Auth::user()->password;
        if (Hash::check($request->oldpassword,$checkPass)) {
            $users = User::find(Auth::user()->id);
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        }else{
            session()->flash('message','Old Password was invalid');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function profile(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.body.sidebar',compact('userData'));
    }

    // public function contact(Request $request)
    // {
    //     $contacts = Contact::Paginate(5);
    //     return view('admin.contact.index',compact('contacts'));
    // }




}
