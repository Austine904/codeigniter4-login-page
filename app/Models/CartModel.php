<?php 

namespace App\Models;
use CodeIgniter\Model;




class CartModel extends Model
{
    protected $table = 'cart_items';  // Database table name
    protected $primaryKey = 'id';  // Primary key field

    protected $allowedFields = ['user_id', 'product_id', 'quantity', 'created_at'];

    // Fetch all cart items for a specific user
    public function getCartItems($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}