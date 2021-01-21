<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\User;

class UserController extends Controller
{
    protected $user;
    function __construct() {
        $this->user = new UserRepository();
    }
    
    public function index()
    {
        $user = User::latest()->paginate(10);
        return view('admin.user.index', compact('user'));
    }

    
    public function create()
    {
        return view('admin.user.create');
    }

    
    public function store(UserRequest $request)
    {
        $this->user->insertUser();     
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.user.edit', compact('user'));
    }

    
    public function update(UserRequest $request, $id)
    {
        $this->user->updateUser($id);        
    }

    
    public function destroy($id)
    {
        $this->user->deleteUser($id); 
    }
}
