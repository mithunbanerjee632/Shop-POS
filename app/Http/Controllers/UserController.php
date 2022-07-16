<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function AddUser(Request $request){
       $name = $request->input('name');
       $username = $request->input('username');
       $password = $request->input('password');
       $roll = $request->input('roll');

       $userCount = UserModel::where('username','=',$username)->count();

       if($userCount>0){
           return "Username Already Exist";
       }else{
          $result = UserModel::insert([
               'fullname'=>$name,
               'username'=>$username,
               'roll'=>$roll,
               'lastactivity'=>'no activity',
               'password'=>$password
           ]);

          return $result;
       }
    }

    function DeleteUser(Request $request){
       $id = $request->id;
       $result = UserModel::where('id','=',$id)->delete();
       return $result;
    }

    function SelectUser(){
      $result = UserModel::all();
      return $result;
    }

    function UpdateUser(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password');
        $roll = $request->input('roll');

        $result = UserModel::where('id',$id)->update([
            'fullname'=>$name,
            'username'=>$username,
            'roll'=>$roll,
            'lastactivity'=>'no activity',
            'password'=>$password
        ]);

        return $result;
    }
}
