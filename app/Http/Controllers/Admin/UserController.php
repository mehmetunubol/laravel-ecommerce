<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreUserFormRequest;

class UserController extends BaseController
{

    protected $userRepository;

    public function __construct(
        UserContract $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->listUsers();
        foreach($users as $user)
        {
            $user['orders'] = $user->orders->count();
        }
        $this->setPageTitle('Users', 'Users List');
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->setPageTitle('Users', 'Create User');
        return view('admin.users.create');
    }

    public function store(StoreUserFormRequest $request)
    {
        $params = $request->except('_token');

        $user = $this->userRepository->createUser($params);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while creating user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'User added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $user = $this->userRepository->findUserById($id);

        $this->setPageTitle('Users', 'Edit User');
        return view('admin.users.edit', compact('user'));
    }

    public function update(StoreUserFormRequest $request)
    {
        $params = $request->except('_token');

        $user = $this->userRepository->updateUser($params);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while updating user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'User updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $user = $this->userRepository->deleteUser($id);

        if (!$user) {
            return $this->responseRedirectBack('Error occurred while deleting user.', 'error', true, true);
        }
        return $this->responseRedirect('admin.users.index', 'User deleted successfully' ,'success',false, false);
    }

    public function loginToUser($id)
    {
        auth()->loginUsingId($id);
        
        return redirect("/");
    }
}