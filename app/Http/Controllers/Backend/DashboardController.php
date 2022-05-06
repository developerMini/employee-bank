<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use Auth;
use DB;

class DashboardController  extends Controller
{
    
    public function index(){ 
      $user = Auth::user();
      $meta_title = 'Dashboard';
      $body_class= 'dashboard';
      $userCount = User::get()->count();
      return view('backend.dashboard', compact('user', 'meta_title','body_class','userCount'));
    }
        
}