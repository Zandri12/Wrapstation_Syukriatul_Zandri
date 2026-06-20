<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\UserModel;
use App\Models\ProductModel;

class Transactions extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT t.*, u.name as user_name, p.product_name, p.price
            FROM transactions t
            JOIN users u ON t.user_id = u.user_id
            JOIN products p ON t.product_id = p.product_id
            ORDER BY t.transaction_id DESC
        ");
        $data['transactions'] = $query->getResultArray();
        return view('layout', ['content' => view('transactions/index', $data)]);
    }

    public function create()
    {
        $userModel = new UserModel();
        $productModel = new ProductModel();

        $data['users'] = $userModel->findAll();
        $data['products'] = $productModel->findAll();

        return view('layout', ['content' => view('transactions/create', $data)]);
    }

    public function store()
    {
        $model = new TransactionModel();
        $productModel = new ProductModel();

        $product_id = $this->request->getPost('product_id');
        $qty = (int) $this->request->getPost('qty');

        $product = $productModel->find($product_id);
        if (!$product) {
            session()->setFlashdata('error', 'Produk tidak ditemukan.');
            return redirect()->to('/transactions/create');
        }

        if ($qty > $product['qty_in_stock']) {
            session()->setFlashdata('warning', "Stok tidak mencukupi. Stok tersedia: {$product['qty_in_stock']}.");
            return redirect()->to('/transactions/create');
        }

        $productModel->update($product_id, ['qty_in_stock' => $product['qty_in_stock'] - $qty]);

        $model->save([
            'user_id'        => $this->request->getPost('user_id'),
            'product_id'     => $product_id,
            'payment_method' => $this->request->getPost('payment_method'),
            'qty'            => $qty,
        ]);

        session()->setFlashdata('success', "Transaksi untuk \"{$product['product_name']}\" berhasil dicatat.");
        return redirect()->to('/transactions');
    }

    public function delete($id = null)
    {
        $model = new TransactionModel();
        $model->delete($id);
        session()->setFlashdata('success', "Transaksi berhasil dihapus.");
        return redirect()->to('/transactions');
    }
}
