<?php 
namespace App\validation;
use App\Models\UserModel;

class userRules
{
    public function validateuser(string $str, string $fields, array $data){

        $model = new UserModel();
        $user = $model->where('email', $data['email'])
                        ->first();

        if(!$user)
        return false;

        return password_verify($data['password'], $user['password']);
    }
}
?>