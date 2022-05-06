<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Excel;

class UserController extends Controller
{
    public function import(Request $request)
    {
        if($request->hasFile('import_file')){
            Excel::import(new UsersImport, $request->file('import_file')->store('temp'));
            return response()->json(['status'=>true]);
        }
    }
}
