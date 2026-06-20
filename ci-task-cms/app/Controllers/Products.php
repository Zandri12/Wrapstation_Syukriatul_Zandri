<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('layout', ['content' => view('products/index', $data)]);
    }

    public function create()
    {
        return view('layout', ['content' => view('products/create')]);
    }

    public function store()
    {
        $model = new ProductModel();

        $rules = [
            'product_name' => [
                'rules'  => 'required|min_length[2]|max_length[150]',
                'errors' => [
                    'required'   => 'Nama produk wajib diisi.',
                    'min_length' => 'Nama produk minimal 2 karakter.',
                    'max_length' => 'Nama produk maksimal 150 karakter.',
                ],
            ],
            'qty_in_stock' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'   => 'Stok wajib diisi.',
                    'is_natural' => 'Stok harus berupa angka bulat positif (tidak boleh desimal atau negatif).',
                ],
            ],
            'price' => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required'     => 'Harga wajib diisi.',
                    'numeric'      => 'Harga harus berupa angka.',
                    'greater_than' => 'Harga harus lebih dari 0.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = implode(' ', $this->validator->getErrors());
            session()->setFlashdata('error', $errors);
            return redirect()->to('/products/create');
        }

        $name = trim($this->request->getPost('product_name'));

        $existing = $model->where("LOWER(product_name) = LOWER('{$name}')")->first();
        if ($existing) {
            session()->setFlashdata('warning', "Produk dengan nama \"{$name}\" sudah ada di katalog.");
            return redirect()->to('/products/create');
        }

        $model->save([
            'product_name' => $name,
            'qty_in_stock' => $this->request->getPost('qty_in_stock'),
            'price'        => $this->request->getPost('price'),
        ]);
        session()->setFlashdata('success', "Produk \"{$name}\" berhasil ditambahkan.");
        return redirect()->to('/products');
    }

    public function edit($id = null)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        if (!$data['product']) {
            session()->setFlashdata('error', 'Produk tidak ditemukan.');
            return redirect()->to('/products');
        }
        return view('layout', ['content' => view('products/edit', $data)]);
    }

    public function update($id = null)
    {
        $model = new ProductModel();

        $rules = [
            'product_name' => [
                'rules'  => 'required|min_length[2]|max_length[150]',
                'errors' => [
                    'required'   => 'Nama produk wajib diisi.',
                    'min_length' => 'Nama produk minimal 2 karakter.',
                    'max_length' => 'Nama produk maksimal 150 karakter.',
                ],
            ],
            'qty_in_stock' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required'   => 'Stok wajib diisi.',
                    'is_natural' => 'Stok harus berupa angka bulat positif.',
                ],
            ],
            'price' => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required'     => 'Harga wajib diisi.',
                    'numeric'      => 'Harga harus berupa angka.',
                    'greater_than' => 'Harga harus lebih dari 0.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $errors = implode(' ', $this->validator->getErrors());
            session()->setFlashdata('error', $errors);
            return redirect()->to('/products/edit/' . $id);
        }

        $name = trim($this->request->getPost('product_name'));

        $existing = $model->where("LOWER(product_name) = LOWER('{$name}')")
                          ->where("product_id !=", $id)
                          ->first();
        if ($existing) {
            session()->setFlashdata('warning', "Produk dengan nama \"{$name}\" sudah ada di katalog.");
            return redirect()->to('/products/edit/' . $id);
        }

        $model->update($id, [
            'product_name' => $name,
            'qty_in_stock' => $this->request->getPost('qty_in_stock'),
            'price'        => $this->request->getPost('price'),
        ]);
        session()->setFlashdata('success', "Produk \"{$name}\" berhasil diperbarui.");
        return redirect()->to('/products');
    }

    public function delete($id = null)
    {
        $model = new ProductModel();
        $product = $model->find($id);
        if (!$product) {
            session()->setFlashdata('error', 'Produk tidak ditemukan.');
            return redirect()->to('/products');
        }
        $model->delete($id);
        session()->setFlashdata('success', "Produk \"{$product['product_name']}\" berhasil dihapus.");
        return redirect()->to('/products');
    }
}
