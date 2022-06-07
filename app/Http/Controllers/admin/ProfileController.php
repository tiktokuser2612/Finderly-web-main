<?php
namespace App\Http\Controllers\admin;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validate;
use File;
class ProfileController extends Controller
{
        function resetPassword()
        {
            return view('admin.Profile.resetPassword');
        }        
        function Update(Request $request)
        { 
         $id = Auth::guard('admin')->user()->id;
         $request->validate(
        [
            'image' => 'mimes:jpeg,png,jpg',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'first_name' => 'required',
            'last_name' => 'required',
        ],
        [
            'first_name.required' => 'Please enter first_name',
            'last_name.required' => 'Please enter last_name',
            'email.required' => 'Please enter email address',
        ]);
        
            if($request->hasFile('image'))
            {
           $imageName = time().'.'.$request->image->extension(); 
           $path = 'storage/app/public/User/img';
           $request->image->move($path, $imageName);
           $input['image'] = $imageName;
            }
           $input['first_name'] = $request->first_name;
           $input['last_name'] = $request->last_name;
           $input['email'] = $request->email;
            Admin::find($id)->update($input);
            return redirect()->back()->with('message','Your profile is updated successfully');
     
        }

        //Show Data
        function showProfile()
        {
            $adminData = Auth::guard('admin')->user();
            // return $adminData->all();
            return view('admin.Profile.editProfile',['activeData'=>$adminData]);
        }
        //reset password
        function reset(Request $request)
        {
          $request->validate(
        [
          'old_password' => 'required',
          'new_password' => 'min:8|required',
          'confirm_password' =>'required_with:password|min:8',
        ]);
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        if($new_password == $confirm_password)
        {
            Admin::find(Auth::guard('admin')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            return redirect()->back()->with('message','Your password is updated successfully');
        }
        else
        {
          return redirect()->back()->with('error', 'Current password and confirm password does not matched');
        }
        }

}
