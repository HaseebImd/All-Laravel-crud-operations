<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Haseeb;
use App\Models\Friend;
use DB;

class HaseebImdad extends Controller
{
    function user_login(Request $request)
    {
        $user= Haseeb::where(['email'=>$request->email])->first();
        if($user)
        {
        $request->Session()->put('user',$user);
        return redirect('/');
        }
        else {
            $data ="Invalid User name or password";
            return redirect('/login')->with('message', 'Invalid Username or Password');
            
        }
        

    }
    function home(Request $request)
    {
        if($request->session()->has('user'))
        {
           $data= Friend::all();
            return view('home',['friends'=>$data]);
           

        }
        else
        {
            return redirect('/login');
        }

    }

    function addfriend()

    {
        return view('addfriend');
    }

    function savefriend(Request $request)
    {
        $friend=new Friend();
        $friend->name=$request->input('name');
        $friend->email=$request->input('email');
        $friend->phone=$request->input('phone');
        $friend->address=$request->input('address');
        $friend->save();
        return redirect('/')->with('message', 'Congratulations!!! New Friend is Added');
    }
     function unfriend($id)
    {
        Friend::destroy($id);
        return redirect('/')->with('message', 'Your Friend is Deleted');
    }
    function customizefriend(Request $request)
    {
        $id = $request->id;
        $data= Friend::where('id',$id)->get();
        return view('customizefriend',['friends'=>$data]);
    }
     function save_customizefriend(Request $request)
    {
        $friend=new Friend();
        $name=$request->input('name');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $address=$request->input('email');
        $id=$request->input('id');
        DB::update('update friends set name = ?,email=?, phone=?, address=?  where id = ?',[$name,$email,$phone,$address,$id]);
        return redirect('/')->with('message', 'Friend Updated Added Successfully');;
    }
}
