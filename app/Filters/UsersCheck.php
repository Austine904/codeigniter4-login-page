<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UsersCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $uri= service('uri');
        if($uri ->getSegment(1) =='public'){
            if($uri->getSegment(2) == '')
            $segment = 'login';
        else
        $segment ='login'. $uri->getSegment(2);
     return redirect()->to($segment);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}