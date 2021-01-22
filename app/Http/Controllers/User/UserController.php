<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }
    public function ProfileUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $oldpath = $data->image;
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg'
            ]);
            $path = $request->file('image')->store('user_images');
            $data->image = $path;
            Storage::delete($oldpath);
        }
        $update = $data->save();
        if($update){
            $notification=array(
                'message'=>'Successfully Profile Updated',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->back()->with($notification);
        }
    }
}
