<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Auth;
use File;
use Crypt;
use validate;

class CategoriesController extends Controller
{
    public function Categories()
    {
        $categorie = Categorie::latest()->paginate(10);
        return view('admin.Categories.index',['categorie'=>$categorie]);
    }
    public  function add()
    {
        return view('admin.Categories.add');
    }
    public function store(Request $request)
    {
        $request->validate(
      [
        'name' =>'required',
        'icon' => 'required|mimes:jpeg,png,jpg',
      ],
      [
        'name.required' => 'Please enter name',
        'icon.required' => 'Please upload icon',
      ]
  );
      $input = $request->all();
      $imageName = time().'.'.$request->icon->extension(); 
      $path = 'storage/app/public/category/img';
      $request->icon->move($path, $imageName);
      $input['icon'] = $imageName;
      $input['name'] = $request->name;  
      Categorie::create($input);
      return redirect('Categories')->with('message', 'Category added successfully');
    }
    public function edit($id)
    {
      $prodID = Crypt::decrypt($id);
      $category = Categorie::findOrFail($prodID);
      return view('admin.Categories.edit',['category'=>$category]);   
    }
    public function update(Request $request)
    {
        $request->validate(
        [
          'icon' => 'mimes:jpeg,png,jpg',
          'name' => 'required',
        ],
        [
          'icon.mimes'=>'Please upload icon (jpeg,png,jpg)',
          'name.required' => 'Please enter name',
        ]
    );
      $id = $request->id;
      if($request->hasFile('icon'))
      {
      $imageName = time().'.'.$request->icon->extension(); 
      $path = 'storage/app/public/category/img';
      $request->icon->move($path, $imageName);
      $input['icon'] = $imageName;
      }
      $input['name'] = $request->name; 
      Categorie::where('id', $id)->update($input);
      return redirect()->route('admin.Categories.index')->with('message','Category is updated successfully');
        
    }

    public function delete($id)
    {
      $prodID = Crypt::decrypt($id);
      $row =Categorie::findOrFail($prodID);
      $img = $row->profile_picture;
      $destinationPath = 'storage/app/public/category/img';
      if(File::exists($destinationPath))
     {
       File::delete($destinationPath);
     }
      $row->delete();
      return redirect()->back()->with('error','Category record deleted successfully');
    }
    
    public function status(Request $request)
    {
         $category = Categorie::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
