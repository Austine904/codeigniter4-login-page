<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'updated_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {

        $data = $this->passwordHash($data);


        return $data;
    }

    /**
     * Hash the password before updating the user
     *
     * @param array $data
     * @return array
     */
    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }



    protected function passwordHash(array $data)
    {
        //password hashing
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);


        return $data;
    }
    
}
  
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