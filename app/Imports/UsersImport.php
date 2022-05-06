<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Role;
use App\Models\Address;
use App\Models\RoleUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $isexit = User::where('email', $row['email'])->first();
        if(empty($isexit) && $row['email'] != ''){
            $user = new User();
            $user->name =  $row['name'];
            $user->email = $row['email'];
            $user->emp_id = $row['emp_id'];
            $user->dob =  date('Y-m-d', strtotime($row['dob']));
            $user->gender =  $row['gender'];
            $user->phone_1 =  $row['phone'];
            $user->password = Hash::make('12345');
            $user->save();

            $role = Role::where('title', $row['role'])->first();
            $roleUser = new RoleUser();
            $roleUser->role_id = $role->id;
            $roleUser->user_id = $user->id;
            $roleUser->save();

            $address = new Address();
            $address->address_1	= $row['address'];
            $address->pincode	= $row['pincode'];
            $address->city	    = $row['city'];
            $address->states	= $row['states'];
            $address->country	= $row['country'];
            $address->user_id  = $user->id;
            $address->save();
            return $user;
        }else{
            return $isexit;
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
