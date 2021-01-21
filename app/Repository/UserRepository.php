<?php 

namespace App\Repository;
use App\User;

class UserRepository
{
    function insertUser(){
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'role' => request('role'),
            'password' => bcrypt(request('password')),
        ]);
    }
    
    function updateUser($id){
        $user_data = [
            'name' => request('name'),
            'email' => request('email'),
            'role' => request('role'),
        ];

        User::whereId($id)->update($user_data);
    }

    function deleteUser($id){
        $user = User::findorfail($id);
        $user->delete();
    }
}