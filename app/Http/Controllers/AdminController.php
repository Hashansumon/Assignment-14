<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            "message"=>'user logout successfully',
            "alert-type"=>'success'
          );


        return redirect('/login')->with($notification);
    }

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        // return view('/welcome');
         return view('admin.admin_profile_view', compact('adminData'));
    }

    public function Editprofile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function Storeprofile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data['profile_image']=$filename;
        }
        $data->save();

        $notification = array(
        "message"=>'Admin profile successfully',
        "alert-type"=>'success'
      );


        return redirect()->route('admin.profile')->with($notification);
    }


    public function changePassword(){
        return view('admin.admin_change_password');
    }

    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirm_password'=>'required|same:newpassword'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
         $users = User::find(Auth::id());
         $users->password = bcrypt($request->newpassword);

         $users->save();

         session()->flash('message','password updated successfully');
         return redirect()->back();
        }else{
            session()->flash('message','oldpassword is not match');
            return redirect()->back();
        }
    }

    // public function home(){
    //     return view('');
    // }
}
