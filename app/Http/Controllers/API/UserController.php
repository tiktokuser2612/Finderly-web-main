<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Userdevice;
use App\Models\Business;
use App\Models\Categorie;
use App\Models\Specialization;
use App\Models\BusinessLikeUnlike;
use App\Mail\OTPmail;
use App\Mail\ForgotPassword;
use Auth;
use DB;
use Validator;
use Hash;
use Mail;
use File;


class UserController extends CommonController 
{
     //for Register Api-------- ----------------------------------
     public function register(Request $request)
     {
        // $request_data = $request->all();
        // $obj = new SecurityController();
        // foreach ($request_data as $key => $value) {
        //     $dec_data = $obj->encryptdecrypt('decryption', $value);     
        //     $request->merge([
        //         $key => $dec_data,
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'country_code' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|min:8',
            'c_password' => 'required_with:password|same:password',
            'device_id' =>'required',
            'device_token'=>'required',
            'device_type'=>'required|in:Android,IOS,Web',
         
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }
        $input = $request->all();
        $details = [
        'otp' => rand(1000,9999),
        ];

        Mail::to($request->email)->send(new \App\Mail\OTPmail($details));
        $input ['user_name'] =($input['user_name']);
        $input['otp'] = $details['otp'];
        $input ['country_code'] =($input['country_code']);
        $input ['mobile_number'] =($input['mobile_number']);
        $input ['email'] =($input['email']);
        $input['email_verifed'] = '0';
        $input ['signup_step'] = '1';
        $input ['signup_type'] ='N';
        $input['password'] = Hash::make($request->password); 
        $user = User::create($input);
       // devices register api
        $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
        if(empty($user_devices)){
            $input1['user_id'] = $user->id;
            $input1['device_type']  = $request->device_type;
            $input1['device_id'] = $request->device_id;
            $input1['device_token'] = $request->device_token;
            Userdevice::create($input1);
        }else{
            $input1['user_id'] = $user->id;
            $input1['device_token'] = $request->device_token;
            Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
        }
        $user->token =  $user->createToken('MyApp')->accessToken;
        // $data= $user->toArray();
        // $newArr =array();
        // foreach($data as $key =>$string)
        // {
        //     $enc_data1 = $obj->encryptdecrypt('encryption',$string);
        //     $newArr[$key] = $enc_data1;
        // }  
        return $this->sendresponse($user,'User Registered successfully');
    }

 // for Login user Api----------------------------------------------
      public function login(Request $request)
     {
     // $request_data = $request->all();
     // $obj = new SecurityController();
     // foreach ($request_data as $key => $value) {
     //     $dec_data = $obj->encryptdecrypt('decryption', $value);        
     //     $request->merge([
     //         $key => $dec_data,
     //     ]);
     // }
     $validator = Validator::make($request->all(), [
         'email' => 'required|email',
         'password' => 'required|min:8',
         'device_id' =>'required',
         'device_token'=>'required',
         'device_type'=>'required|in:Android,IOS,Web',
     ]);
     if ($validator->fails()) { 
         return $this->senderror('Validation Error', $validator->errors()->first());            
     }
     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
        // $user = User::Where('email', $request->email)->first();
        $user = Auth::user(); 
        // device login api
        $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
            if(empty($user_devices)){
        $input1['user_id'] = $user->id;
        $input1['device_type']  = $request->device_type;
        $input1['device_id'] = $request->device_id;
        $input1['device_token'] = $request->device_token;
        Userdevice::create($input1);
        }else{
        $input1['user_id'] = $user->id;
        $input1['device_token'] = $request->device_token;
        Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
            }
        $user->token =  $user->createToken('MyApp')->accessToken;
        // $data= $user->toArray();            
        // $newArr = array();
        // foreach ($data as $key => $string) {
        // $enc_data1 = $obj->encryptdecrypt('encryption', $string);
        // $newArr[$key] = $enc_data1;
        // }
            $this->sendresponse($user,'User Login successfully');
        }
        else{ 
        return $this->senderror('Validation Error', 'Email or Password Invalid');
     }   
     } 
     //for otpVerification Api-------- ----------------------------------
     public function otpVerification (Request $request)
     {
        //encryptdecrypt
        // $request_data = $request->all();
        // $obj = new SecurityController();
        // foreach ($request_data as $key => $value) {
        //     $dec_data = $obj->encryptdecrypt('decryption', $value);     
        //     $request->merge([
        //         $key => $dec_data,
        //     ]);
        // }
         $validator = Validator::make($request->all(), [
         'otp' => 'required',
     ]);
       if ($validator->fails()) { 
         return $this->senderror('Validation Error', $validator->errors()->first());            
     }
        $id = Auth::id();
        $user = User::where('id', $id)->where('otp', $request->otp)->first();
        if($user){ 
            $input['otp'] = null;
            $input['email_verifed'] = '1';
            $input['signup_step'] ='2';
            User::Where('id', $id)->update($input);
            return $this->sendresponse('[]','Otp verified successfully');
        }
        else
        {
            return $this->senderror('Validation Error', 'Otp does not match.');
       }
     }
      //for registerProfilePhote Api-------- ----------------------------------
     public function registerProfilePhote(Request $request)
     {
        // $request_data = $request->all();
        // $obj = new SecurityController();
        // foreach ($request_data as $key => $value) {
        //     $dec_data = $obj->encryptdecrypt('decryption', $value);     
        //     $request->merge([
        //         $key => $dec_data,
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        if ($validator->fails()) { 
            return $this->senderror('Validation Error', $validator->errors()->first());         
        }
            $id = Auth::id();
            $input = $request->all(); 
            $imageName = time().'.'.$request->image->extension(); 
            $path = 'storage/app/public/User/img';
            $request->image->move($path, $imageName);
            $input['image'] = $imageName;
            $input['signup_step'] = '3';
            User::Where('id', $id)->update($input);
            $input['image'] = $request->root().'storage/app/public/User/img'.$imageName;
            $user = User::where('id', $id)->first();
        //     $data= $user->toArray();    
        //     $newArr = array();
        //     $obj = new SecurityController();
        //     foreach ($data as $key => $string) {
        //     $enc_data1 = $obj->encryptdecrypt('encryption', $string);
        //     $newArr[$key] = $enc_data1;
        // }
          return $this->sendresponse($user,'User image uploaded successfully');
     }
       //for forget_Password & send email Api-------- ----------------------------------
     public function forgotPassword(Request $request)
     {
        // $request_data = $request->all();
        // $obj = new SecurityController();
        // foreach ($request_data as $key => $value) {
        //     $dec_data = $obj->encryptdecrypt('decryption', $value);     
        //     $request->merge([
        //         $key => $dec_data,
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()){ 
            return $this->senderror('Validation Error', $validator->errors()->first());  }
        $user = User::where('email', '=', $request->email)->first();
        if($user){ 
            $details =[
                'otp' =>rand(1000,9999),
            ];
            Mail::to($request->email)->send(new \App\Mail\ForgotPassword($details));
            $data['otp'] = $details['otp'];
            $data['email'] = $request->email;
            $store['otp'] = $details['otp'];
            User::Where('email', $request->email)->update($store);
            // $data= $data->toArray();            
            // $newArr = array();
            // foreach ($data as $key => $string) {
            //     $enc_data1 = $obj->encryptdecrypt('encryption', $string);
            //     $newArr[$key] = $enc_data1;
            // }
            if (Mail::failures()) {
                return response()->json(['success'=>false, 'error' => 'There is some problem!'], 401);
            } else{
                return $this->sendresponse($user,'OTP sent successfully');
            }
        } else{
            return $this->senderror('Validation Error', 'Email not exist');    
        }
      }
       //for forgotPassword_OtpVerification Api-------- ----------------------------------
     public function forgotPasswordOtpVerification(Request $request)
     { 
        // $request_data = $request->all();
        // $obj = new SecurityController();
        // foreach ($request_data as $key => $value) {
        //     $dec_data = $obj->encryptdecrypt('decryption', $value);     
        //     $request->merge([
        //         $key => $dec_data,
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required',
        ]);
        if ($validator->fails()){ 
            return $this->senderror('Validation Error', $validator->errors()->first());
        }
        $user = User::where([['email','=',$request->email],['otp','=',request('otp')]])->first();
        if($user){ 
            $input['otp'] = null;
            $input['email_verifed'] = '1';
            User::Where('email', $request->email)->update($input);
            return $this->sendresponse('[]','Otp verified successfully');
        }else{
            return $this->senderror('Validation Error', 'Otp does not match.');
        }
    }
     //for Passwordchange Api-------- ----------------------------------- 
    public function Passwordchange(Request $request)
    {
        // $request_data = $request->all();
        // $obj = new SecurityController();
        // foreach ($request_data as $key => $value) {
        //     $dec_data = $obj->encryptdecrypt('decryption', $value);     
        //     $request->merge([
        //         $key => $dec_data,
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required', 
            'c_password' => 'required_with:password|same:password',
        ]);
        if ($validator->fails())
        { 
          return $this->senderror('Validation Error', $validator->errors()->first());          
        }
         $input = $request->all();
         $data['email'] = $input['email'];
         $data['password']= Hash::make($input['password']);
         User::Where('email', $request->email)->update($data);
         return $this->sendresponse('[]','Password Change successfully');
    }
      //for Logout Api-------- -----------------------------------  
      public function logout(Request $request)
      {
        // $request_data = $request->all();
        // $obj = new SecurityController();
        // foreach ($request_data as $key => $value) {
        //     $dec_data = $obj->encryptdecrypt('decryption', $value);     
        //     $request->merge([
        //         $key => $dec_data,
        //     ]);
        // }
        $validator = Validator::make($request->all(), [
            'device_id' => 'required',
        ]);
        if ($validator->fails()) { 
            return $this->senderror('Validation Error', $validator->errors());                    
        }
        $id = Auth::id();
        $data['user_id'] = $id;
        $data['device_id'] = $request->device_id;
        $reg = Userdevice::where('device_id', $request->device_id)->first();
        if(empty($reg))
        {
          return $this->senderror('[]','Invalid device_id');
        }
        else
        {    
          Userdevice::where(['user_id' => $id,'device_id'=>$request->device_id])->delete();
          return $this->sendresponse('[]','User logged out successfully'); 
           Auth::user()->token()->revoke(); 
        }
       }
       public function profileUpdate(Request $request)
       {
        $data = $request->all();
        if(empty($data)){
        return $this->senderror('Validation Error', 'Your input field is empty!'); 
        }
        else{

            // $request_data = $request->all();
            // $obj = new SecurityController();
            // foreach ($request_data as $key => $value) 
            // {
            // $dec_data = $obj->encryptdecrypt('decryption', $value); 
            // $request->merge([
            //   $key => $dec_data,
            //     ]);
            // }
             if($request->filled('user_name')){
                $input['user_name'] = $request->user_name;
            }
             if($request->filled('mobile_number')){
                $input['mobile_number'] = $request->mobile_number;
            } 
             if($request->filled('email')){
                $input['email'] = $request->email;
            } 
            $input = $request->all(); 
            if($request->hasFile('image'))
            {
            $imageName = time().'.'.$request->image->extension(); 
            $path = 'storage/app/public/User/img';
            $request->image->move($path, $imageName);
            $input['image'] = $imageName;
            }
            $id = Auth::id();
            User::Where('id', $id)->update($input);
            $user = User::where('id', $id)->first();
            // $data= $user->toArray();            
            // $newArr = array();
            // foreach ($data as $key => $string){
            // $enc_data1 = $obj->encryptdecrypt('encryption', $string);
            // $newArr[$key] = $enc_data1;
            // }
            return $this->sendresponse($user,'User data updated successfully');
        }
       }
      //for getBusiness Api-------- -------------------------
       public function getbusiness(Request $request)
       {
        
        $validator =Validator::make($request->all(), [
            'page_number' => 'required',
        ]);
        if ($validator->fails()){
            return $this->senderror('Validation Error', $validator->errors());
        }     

        $page_limit = 5;
        $page_number = $request->page_number;
        $currentPage =($page_number - 1) * $page_limit;
        $business = Business::offset($currentPage)->limit($page_limit)->get();
        $paginate['page_limit'] = $page_limit;
       $paginate['page_number'] = $page_number;
           $total_data = Business::count();
       $paginate['total_business'] = $total_data;
       $total_pages = ceil($total_data/$page_limit);
       $paginate['total_pages'] = $total_pages;
         return $this->pagination($business,$paginate,'Business data retrieved successfully');
       }

       // for getBusiness acconding to getCategory Api-------------
       public function getBusinessaccondingCategory(Request $request)
       { 
        $validator = Validator::make($request->all(),[
            'category_id' => 'required',
            'page_number'=> 'required',
        ]);

        if($validator->fails()){ 
            return $this->senderror('Validation Error', $validator->errors());
        }   

        $page_limit = 5;
        $page_number = $request->page_number;
        $currentPage =($page_number - 1) * $page_limit;
        $business = Business::offset($currentPage)->limit($page_limit)->get();
        $paginate['page_limit'] = $page_limit;
        $paginate['page_number'] = $page_number;
        $total_data = Business::count();
        $paginate['total_business'] = $total_data;
        $total_pages = ceil($total_data/$page_limit);
        $paginate['total_pages'] = $total_pages;
        $data['category_id'] = $request->category_id;
        $reg =Business::where('category_id', $request->category_id)->get();
         foreach($reg as $row){
          $row->business_icon= $request->root().'/storage/app/public/business/img/'.$row->business_icon;
         } 
        if(empty($reg)){
          return $this->senderror('[]','Invalid category_id');
        }
        else{ 
          Business::where(['category_id'=>$request->category_id]);
          return $this->pagination($reg,$paginate,'Business data successfully'); 
        }
     
       }
        // for liked and unliked Business Api-----------------------------------
       public function likeUnlikeBusiness(Request $request)
       {
         $validator = Validator::make($request->all(), [
            'business_id' => 'required',
        ]);
        if ($validator->fails()){
            return $this->senderror('Validation Error', $validator->errors()->first());
        }

         $user_id = Auth::id();  
         $data = BusinessLikeUnlike::where('business_id', $request->business_id)->where('user_id', $user_id)->first();
         $item = array();
        if(empty($data))
        {
          $data = $request->all();
          $data['user_id'] = $user_id;
          $data['business_id'] = $request->business_id;
          BusinessLikeUnlike::create($data);
          $item['islike'] = "1";
          $message = "Business liked successfully";
        }

        else
        {    
          BusinessLikeUnlike::where('business_id', $request->business_id)->where('user_id', $user_id)->delete();
            $item['islike'] = "0";
            $message = "Business unliked successfully";
        }
       
         return $this->sendresponse($item, $message); 
       }
       // for getCategories Api-----------------------------------
       public function getcategories(Request $request)
       {
        //return Categorie::all();
        $categories = Categorie::get();
        foreach($categories as $Category)
        {
          $Category->icon = $request->root().'/storage/app/public/category/img/'.$Category->icon;
        }
        // $path = 'storage/app/public/category/img';
        // return response()->json(compact('path'));

        // $obj = new SecurityController();
        // $newArr = array();
        // foreach($categories as $key => $string)
        // {
        //   $enc_data1 = $obj->encryptdecrypt('encryption',$string);
        //   $newArr[$key] = $enc_data1;
        // }
        return $this->sendresponse($categories,'Categories data retrieved successfully');        
        }
       
  // for get Specializations Api-------- -------------------
    public function getSpecializations(Request $request)
       {
        $Specialization = Specialization::get();
        // $obj = new SecurityController();
        // $newArr = array();
        // foreach($Specialization as $key => $string)
        // {
        //   $enc_data1 = $obj->encryptdecrypt('encryption',$string);
        //   $newArr[$key] = $enc_data1;
        // }
        return $this->sendresponse($Specialization,'Specialization data retrieved successfully');        
       }
}


   

