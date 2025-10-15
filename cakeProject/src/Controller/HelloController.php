<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
class HelloController extends Controller
{
    public function index()
    {
        $name = 'Valentio';
        $this->set(compact('name'));
    }
}
