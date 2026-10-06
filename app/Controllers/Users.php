<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('users', [
            'users' => $this->userModel->findAll()
        ]);
    }

    public function new()
    {
        return view('user_form', [
            'user'       => null,
            'formAction' => site_url('users')
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'username'   => $this->request->getPost('username'),
            'password' => password_hash(
             $this->request->getPost('password'),
             PASSWORD_DEFAULT
        ),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('user_form', [
            'user'       => $user,
            'formAction' => site_url('users/' . $id)
        ]);
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'username'  => 'required',
            'password'  => 'required|min_length[8]',
            'full_name' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');

        $duplicate = $this->userModel
            ->where('username', $username)
            ->where('id !=', $id)
            ->first();

        if ($duplicate) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['username' => 'This username is already in use.']);
        }

        $data = [
            'username'  => $username,
            'full_name' => $this->request->getPost('full_name'),
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $avatarRules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
            ];

            if (! $this->validate($avatarRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $avatarName = $avatar->getRandomName();

            service('image')
                ->withFile($avatar)
                ->fit(200, 200, 'center')
                ->save(FCPATH . 'uploads/avatars/' . $avatarName, 85);

            $data['avatar'] = $avatarName;
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users');
    }
}