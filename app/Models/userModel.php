<?php namespace App\Models;

use Codeigniter\Model;

class userModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'updated_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
 //last update here
}