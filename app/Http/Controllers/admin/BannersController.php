<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use validate;
use Crypt;
use File;

class BannersController extends Controller
{
    public function index()
    {
       $banner = Banner::latest()->get();
        return view('admin.Banners.index',['banner'=> $banner]);
        
    }
    public function store(Request $request)
    {
        $request->validate(
         [ 
           'banner' => 'required|mimes:jpeg,png,jpg',
         ],
         [
           'banner.required' => 'Please upload banner',        
         ]);
         $input = $request->all();   
         $bannerName = time().'.'.$request->banner->extension(); 
         $path = 'storage/app/public/banner/img';
         $request->banner->move($path, $bannerName);
         $input['banner'] = $bannerName;
         Banner::create($input);
         return redirect('Banners')->with('message','Upload Banner successfully');     
         
     }
     public function add()
     {
        return view('admin.Banners.add');
     }
     public function edit($id)
     {
        $prodID = Crypt::decrypt($id);
        $banners = Banner::findOrFail($prodID);
        return view('admin.Banners.edit',['banners'=>$banners]); 
     }
     public function update(Request $request)
     {
         $id = $request->id;
        if($request->hasFile('banner'))
        {
          $bannerName = time().'.'.$request->banner->extension(); 
          $path = 'storage/app/public/banner/img';
          $request->banner->move($path, $bannerName);
          $input['banner'] = $bannerName;
         Banner::Where('id', $id)->update($input);
     }
        return redirect()->route('admin.Banners.index')->with('message','Banner is updated successfully');
    
     }
     public function delete($id)
     {
        $prodID = Crypt::decrypt($id);
        $row =Banner::findOrFail($prodID);
        $img = $row->banner;
        $destinationPath = 'storage/app/public/banner/img';
        if(File::exists($destinationPath))
        {
           File::delete($destinationPath);
        }
           $row->delete();
          return redirect()->back()->with('error','Banner record deleted successfully');
     } 
}
