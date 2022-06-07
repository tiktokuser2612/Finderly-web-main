<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Admin;
use Auth;
use File;
use Crypt;
use Hash;
use validate;

class UserController extends Controller
{
        public function index()
        {
           $users = User::latest()->paginate(10);
          return view('admin.User.index',['users'=>$users]);
        }
        
        public function add()
        {
          return view('admin.User.add');
        }
        public function store(Request $request){
          $request->validate(
            [
              'user_name' => 'required',
              'mobile_number' => 'required|min:10|max:10',
              'image' => 'required|mimes:jpeg,png,jpg',
              'email' => 'required|email|unique:users,email,',                
            ],
            [
              'user_name.required' => 'Please enter name',
              'mobile_number.required' => 'Please enter mobile number',
              'image.required' => 'Please upload image',
              'email.required' => 'Please enter unique email address',
            ]);
          $input = $request->all();
          $imageName = time().'.'.$request->image->extension(); 
          $path = 'storage/app/public/User/img';
          $request->image->move($path, $imageName);
          $input['image'] = $imageName;
          $input['user_name'] = $request->user_name;
          $input['mobile_number'] = $request->mobile_number;
          $input['country_code'] = '220001';
          $input['password'] = hash::make($request->password);
          User::create($input);
          return redirect('User')->with('message','User added successfully');
         }
        public function edit($id) 
        {
          $prodID = Crypt::decrypt($id);
          $users = User::findOrFail($prodID);
          return view('admin.User.edit',['users'=>$users]);
        }
        public function update(Request $request) 
        {
        $request->validate(
            [
              'image' => 'mimes:jpeg,png,jpg',
              'user_name' => 'required',
              'mobile_number' => 'required|min:10|max:10',
              'email' => 'required|email|unique:users,email,'.$request->id,
            ],
            [
              'image.mimes'=>'Please upload image(jpeg,png,jpg)',
              'user_name.required' => 'Please enter name',
              'mobile_number.required' =>'Please enter mobile number',
              'email.required' => 'Please enter unique email address',
            ]);
            $id = $request->id;
           if($request->hasFile('image'))
          {
          $imageName = time().'.'.$request->image->extension(); 
          $path = 'storage/app/public/User/img';
          $request->image->move($path, $imageName);
          $input['image'] = $imageName; 
          }
          $input['user_name'] = $request->user_name;
         $input['email'] = $request->email;
          $input['mobile_number'] = $request->mobile_number;
          User::Where('id', $id)->update($input);
          return redirect()->route('admin.User.index')->with('message','User is updated successfully');
        }
    
    //Delete user
     public function delete($id)
     {
      $prodID = Crypt::decrypt($id);
      $row =User::findOrFail($prodID);
      $img = $row->profile_picture;
      $destinationPath = 'storage/app/public/User/img';
      if(File::exists($destinationPath))
      {
       File::delete($destinationPath);
      }
      $row->delete();
      return redirect()->back()->with('error','User record deleted successfully');
     }
    
}


          

