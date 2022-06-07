<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesse;
use App\Models\Categorie;
use App\Models\Specialization;
use App\Models\BusinessSpecialization;
use App\Models\BusinessImage;
use Auth;
use File;
use Crypt;
use validate;
use DB;

class BusinessesController extends Controller
 {
    public function index()
    {
      $business = Businesse::orderBy('id','desc')->paginate(10);
      foreach ($business as $value)
      {
        $data = BusinessImage::where('business_id', $value->id)->first();
        $value->image = $data->business_image;
      } 
       return view('admin.Businesses.index', compact('business'));           
    }
    public function add()
    {
      $categories = Categorie::get();
      $Specialization = Specialization::get();
      return view('admin.Businesses.add',['categories'=>$categories,'Specialization' => $Specialization]);
    }
    public function store(Request $request)
    {

      $request->validate(
       [
        'business_name' =>'required',
        'phone_number' => 'required|min:10|max:10',
        'category_id' => 'required',
        'specialization_id' =>'required', 
        'location' => 'required',
       ],

       [
        'business_name.required' => 'Please enter name',
        'phone_number.required' =>  'Please enter mobile number',
        'category_id.required' => 'Please select category ',
        'specialization_id.required' => 'Please select specialization',
        'location.required' => 'Please search location',
       ]);

      $input = $request->all();
      $input['business_name'] = $request->business_name;
      $input['phone_number'] = $request->phone_number;
      $input['location'] = $request->location;
      $business = Businesse::create($input);

      if($request->hasfile('business_image'))
      {

      foreach ($request->business_image as $business_image)
      {
        $input2 =[];    
        $imageName = time().rand(100,999).".".$business_image->extension();
        $path = 'storage/app/public/businessImage/img/';
        $business_image->move($path, $imageName);
        $input2['business_image'] = $imageName;
        $input2['business_id'] = $business->id;
         BusinessImage::create($input2);
      }
      }
        if(!empty($request->specialization_id))
        {
        foreach($request->specialization_id as $specialization_id)
        {
          $input1['business_id'] = $business->id;
          $input1['specialization_id'] = $specialization_id;
          BusinessSpecialization::create($input1);
        }
        }
        return redirect('Businesses')->with('message', 'Business added successfully');
      }
     function edit($id)
     {   
      $prodID = Crypt::decrypt($id);
        $categories = Categorie::get();
        $specializations = Specialization::get();
        $business = Businesse::findOrFail($prodID);
        $businessSpecialization = BusinessSpecialization::where('business_id',$prodID)->pluck('specialization_id');
        $businessSpecialization = $businessSpecialization->toArray();

        $business=Businesse::where('id',$prodID)->first();
        $businessImage =BusinessImage::where('business_id',$prodID )->pluck('business_image',);
       $Image_id =BusinessImage::where('business_id',$prodID )->pluck('id',);
        $business->image_id = $Image_id;
        $business->images = $businessImage;

        return view('admin.Businesses.edit',['business'=>$business,'Image_id' => $Image_id,'categories'=>$categories, 'specializations' => $specializations, 'businessSpecialization' =>$businessSpecialization]);
     }
    public function update(Request $request)
    { 


      $request->validate(
      [
        // 'business_icon' => 'mimes:jpeg,png,jpg',
        'business_name' =>'required',
        'phone_number' => 'required|min:10|max:10',
        'category_id' => 'required',
        'specialization_id' =>'required', 
        'location' => 'required',
      ],
      [
        // 'business_icon.mimes'=>'Please upload image (jpeg,png,jpg)',
        'business_name.required' => 'Please enter name',
        'phone_number.required' =>  'Please enter mobile number',
        'category_id.required' => 'Please select category ',
        'specialization_id.required' => 'Please select specialization',
        'location.required' => 'Please search location',
      ]);

      // if($request->hasFile('business_icon'))
      // {
      // $imageName = time().'.'.$request->business_icon->extension(); 
      // $path = 'storage/app/public/business/img';
      // $request->business_icon->move($path, $imageName);
      // $input['business_icon'] = $imageName;   
      // } 
       $id = $request->id;
      $input['business_name'] = $request->business_name;
      $input['phone_number'] = $request->phone_number;
      $input['category_id'] = $request->category_id;
      $input['location'] = $request->location;
      $business = Businesse::Where('id', $id)->update($input);
      if(!empty($request->specialization_id))
      {
        BusinessSpecialization::Where('business_id', $id)->delete();
        foreach($request->specialization_id as $specialization_id)
        {
          $input1['business_id'] = $id;  
          $input1['specialization_id'] = $specialization_id;
          BusinessSpecialization::create($input1);
        }
      }

      if(!empty($request->business_image))
      {
      foreach($request->business_image as $key=>$business_image ){
      $input2=[];    
      if(!empty($business_image) && !empty($request->image_id[$key]))
      {
        $business = BusinessImage::Where('id', $request->image_id[$key])->first();
        $path ="storage/app/public/businessImage/img/".$business->business_image;
        if(File::exists($path)){
        File::delete($path);
        }
       $path = 'storage/app/public/businessImage/img/';
       $imageName = time().rand(100,999).".".$business_image->extension();
       $business_image->move($path, $imageName);            
       $input2['business_image'] = $imageName; 
       $input2['business_id'] = $id;
      BusinessImage::where('id',$request->image_id[$key])->update($input2);
      }
       elseif(!empty($images) && empty($request->image_id[$key]))
        {                
         $path = 'storage/app/public/businessImage/img/';
         $imageName = time().rand(100,999).".".$business_image->extension();          
         $business_image->move($path, $imageName);
         $input2['business_image'] = $business_image; 
         $input2['business_id'] = $id;
        $business =BusinessImage::create($input2);
       }
       }
       if(!empty($request->remove_id)){
       $remove_id = explode(",",$request->remove_id);
       foreach($remove_ids as $delete_id){
       $post = BusinessImage::find($delete_id);
       $post->delete();
      }
      }  
      Businesse::where('id',$id)->update($input);
      return redirect('Businesses')->with('message','Business is updated successfully');
    }
  }
    public function delete($id)
    {
      $prodID = Crypt::decrypt($id);
      $businessImages = BusinessImage::where('business_id',$prodID)->get();
      foreach($businessImages as $row)
      {
        $img = $row->business_image;
        $path = 'storage/app/public/businessImage/img/'.$img;
          if(File::exists($path)){
            File::delete($path);
          }
      }
      BusinessImage::where('business_id',$prodID)->delete();
      Businesse::where('id',$prodID)->delete();
      return redirect()->back()->with('error','Business record deleted successfully');
     }
}


