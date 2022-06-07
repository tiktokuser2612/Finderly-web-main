<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;


class UserStatusController 
{
    public function Status (Request $request)
    {
      $users = User::find($request->id)->update(['status' => $request->status]);
     
      return response()->json(['success'=>'Status changed successfully.']);

    }    
}
