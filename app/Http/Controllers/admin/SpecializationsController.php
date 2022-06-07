<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use validate;
use Crypt;

class SpecializationsController extends Controller
{
    public function index()
    {
      $specialization = Specialization::latest()->get();
      return view('admin.Specializations.index',['specialization'=>$specialization]);
        
    }
    public function store(Request $request)
    {
      $request->validate(
      [
        'name' =>'required',
      ],
      [
        'name.required' => 'Please enter specialization name'
      ]);
         $input = $request->all();  
         $input['name'] = $request->name;
        
        Specialization::create($input);
        return redirect('Specializations')->with('message','Specialization added successfully');

    }
    public function add()
    {
        return view('admin.Specializations.add');
    }
    public function edit($id)
    {
      $prodID = Crypt::decrypt($id);
      $Specializations = Specialization::findOrFail($prodID);
      return view('admin.Specializations.edit',['Specializations'=>$Specializations]);
        
    }
    public function update(Request $request)
     {
        $request->validate(
      [
        'name' =>'required',
      ],
      [
        'name.required' => 'Please enter specialization name'
      ]);

       $id = $request->id;  
      $input['name'] = $request->name;
      Specialization::create($input);
       return redirect('Specializations')->with('message',' Specialization is updated successfully');
    }
    public function delete($id)
    {
      $prodID = Crypt::decrypt($id);
      $row =Specialization::findOrFail($prodID);
      $row->delete();
      return redirect()->back()->with('error','Specialization record deleted successfully');
    }

}
