<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('layout', ['content' => view('users/index', $data)]);
    }

    public function create()
    {
        return view('layout', ['content' => view('users/create')]);
    }

    public function store()
    {
        $model = new UserModel();

        $rules = [
            'name' => [
                'rules'  => 'required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z\s]+$/]',
                'errors' => [
                    'required'    => 'Nama pengguna wajib diisi.',
                    'min_length'  => 'Nama pengguna minimal 2 karakter.',
                    'max_length'  => 'Nama pengguna maksimal 100 karakter.',
                    'regex_match' => 'Nama pengguna hanya boleh berisi huruf dan spasi.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = implode(' ', $this->validator->getErrors());
            session()->setFlashdata('error', $errors);
            return redirect()->to('/users/create');
        }

        $name = trim($this->request->getPost('name'));

        $existing = $model->where("LOWER(name) = LOWER('{$name}')")->first();
        if ($existing) {
            session()->setFlashdata('warning', "Pengguna dengan nama \"{$name}\" sudah pernah terdaftar.");
            return redirect()->to('/users/create');
        }

        $model->save(['name' => $name]);
        session()->setFlashdata('success', "Pengguna \"{$name}\" berhasil ditambahkan.");
        return redirect()->to('/users');
    }

    public function edit($id = null)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        if (!$data['user']) {
            session()->setFlashdata('error', 'Pengguna tidak ditemukan.');
            return redirect()->to('/users');
        }
        return view('layout', ['content' => view('users/edit', $data)]);
    }

    public function update($id = null)
    {
        $model = new UserModel();

        $rules = [
            'name' => [
                'rules'  => 'required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z\s]+$/]',
                'errors' => [
                    'required'    => 'Nama pengguna wajib diisi.',
                    'min_length'  => 'Nama pengguna minimal 2 karakter.',
                    'max_length'  => 'Nama pengguna maksimal 100 karakter.',
                    'regex_match' => 'Nama pengguna hanya boleh berisi huruf dan spasi.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = implode(' ', $this->validator->getErrors());
            session()->setFlashdata('error', $errors);
            return redirect()->to('/users/edit/' . $id);
        }

        $name = trim($this->request->getPost('name'));

        $existing = $model->where("LOWER(name) = LOWER('{$name}')")
                          ->where("user_id !=", $id)
                          ->first();
        if ($existing) {
            session()->setFlashdata('warning', "Pengguna dengan nama \"{$name}\" sudah terdaftar.");
            return redirect()->to('/users/edit/' . $id);
        }

        $model->update($id, ['name' => $name]);
        session()->setFlashdata('success', "Data pengguna berhasil diperbarui.");
        return redirect()->to('/users');
    }

    public function delete($id = null)
    {
        $model = new UserModel();
        $user = $model->find($id);
        if (!$user) {
            session()->setFlashdata('error', 'Pengguna tidak ditemukan.');
            return redirect()->to('/users');
        }
        $model->delete($id);
        session()->setFlashdata('success', "Pengguna \"{$user['name']}\" berhasil dihapus.");
        return redirect()->to('/users');
    }
}
