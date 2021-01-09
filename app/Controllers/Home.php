<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        helper(['number', 'form']);
        $data = [
            'title'     => 'Home',
            'barang'    => $this->BarangModel->getBarang(),
            'cart'      => \Config\Services::cart(),
        ];
        return view('guest/home_view', $data);
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        echo '<pre>';
            print_r($response);
        echo '</pre>';
    }

    public function add_cart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getPost('id'),
            'qty'     => 1,
            'price'   => $this->request->getPost('price'),
            'name'    => $this->request->getPost('name'),
            'options' => array(
                'berat' => $this->request->getPost('berat'),
                'gambar' => $this->request->getPost('gambar'),
            ),
        ));
        session()->setflashdata('pesan', 'Barang berhasil di tambah ke keranjang :)');
        return redirect()->to(base_url('home'));
    }

    public function clear_cart()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
    }

    public function privasi_view()
    {
    	return view('home_view/privasi_view');
	}

    public function layanan_view()
    {
    	return view('home_view/layanan_view');
	}

}
