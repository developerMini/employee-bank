<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;
use Auth;

class UserController extends Controller
{
    public function import(Request $request)
    {
        if($request->hasFile('import_file')){
            Excel::import(new UsersImport, $request->file('import_file')->store('temp'));
            return response()->json(['status'=>true]);
        }
    }

    public function list(Request $request)
    {
        $user = Auth::user();
        $meta_title = 'User List';
        $body_class= 'user list';
        return view('backend.user_list', compact('user', 'meta_title','body_class'));
    }

    public function ajaxList(Request $request)
    {
        $authUser = Auth::user();
        $authUserRole = $authUser->roles[0]->title;
        $authUserId = $authUser->id;

        $search="";
        $searchAr=$request->input('search');
        $search=$searchAr['value'];
        $draw = $request->draw;
        $row = $request->start;
        $rowperpage = $request->length; // Rows display per page
        $orderAr=$request->input('order');
        $status=$request->input('status');

        $user= User::with('roles','address'); 
        
        if(!empty($search)){
            $user = $user->where(function($que) use($search){
                        $que->where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('email', 'LIKE', '%'.$search.'%')
                        ->orWhere('phone_1', 'LIKE', '%'.$search.'%')
                        ->orWhere('emp_id', 'LIKE', '%'.$search.'%')
                        ->orWhereHas('roles', function($q) use($search) {                       
                            $q->where('title', 'LIKE', '%'.$search.'%');
                        });
                    });            
        }
        if(!empty($orderAr)){
         if($orderAr[0]['column'] == 1){
            $user = $user->orderBy('name', $orderAr[0]['dir']);
         }elseif($orderAr[0]['column'] == 0){
            $user = $user->orderBy('emp_id', $orderAr[0]['dir']);
         }
        }else{
            $user = $user->orderBy('emp_id', 'ASC');
        }
        

        $recordsTotal=$recordsFiltered = $user->count();

        if($rowperpage > 0){
            $user = $user->offset($row)->limit($rowperpage);
        }
        $user = $user->get();
        

        $user = $user->map(function($u) use($authUserRole, $authUserId) {
          if($authUserRole != 'Super Admin' && $authUserId != $u->id){
            $star_email_ary = explode('@', $u->email);
            $star_email_ary[0] = $this->get_starred($star_email_ary[0]);
            $u->email = implode('@', $star_email_ary);
            $u->phone_1 = ($u->phone_1)?$this->get_starred($u->phone_1):$u->phone_1;
          }
          return $u;
        });

        //dd(DB::getQueryLog());
        return [
            'lists' => $user,
            'draw' => intval($draw),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered
        ];
    }

    public function show(User $user, Request $request)
    {   $authUser = Auth::user();
        $authUserRole = $authUser->roles[0]->title;
        if($authUserRole != 'Super Admin' && $authUser->id != $user->id ){
            $star_email_ary = explode('@', $user->email);
            $star_email_ary[0] = $this->get_starred($star_email_ary[0]);
            $user->email = implode('@', $star_email_ary);
            $user->phone_1 = ($user->phone_1)?$this->get_starred($user->phone_1):$user->phone_1;
        }
        $html=view('backend.partials.user_view', compact('user'))->render();
        return response()->json(['status'=>true,'html'=>$html,'modalId'=>'user_modal']);
    }

    protected function get_starred($str)
    {
        $len = strlen($str);
        return substr($str, 0, 2).str_repeat('*', $len - 1);
    }
}
