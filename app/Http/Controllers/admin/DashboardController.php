<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Businesse;
use App\Models\Banner;

class DashboardController extends Controller
{
     function Dashboard(Request $request)
     {
         $users = User::all();
         $categorie = Categorie::all();
         $business = Businesse::all();
         $banner = Banner::all();
         return view('admin.Dashboard.index',compact('users','categorie','business','banner'));

     }
}
