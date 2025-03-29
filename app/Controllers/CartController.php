<?php
namespace App\Controllers;

use App\Models\CartModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        $cartModel = new CartModel();
        $userId = session()->get('id'); // Get the logged-in user ID

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Please log in to view your cart.');
        }

        $data['cart_items'] = $cartModel->getCartItemsByUser($userId);
        return view('cart', $data);
    }

    public function addItem()
    {
        $cartModel = new CartModel();
        $userId = session()->get('id'); // Get user ID

        $cartModel->save([
            'user_id' => $userId,
            'product_name' => $this->request->getPost('product_name'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
        ]);

        return redirect()->to('/cart')->with('success', 'Item added to cart.');
    }

    public function removeItem($id)
    {
        $cartModel = new CartModel();
        $cartModel->delete($id);
        return redirect()->to('/cart')->with('success', 'Item removed.');
    }
}
