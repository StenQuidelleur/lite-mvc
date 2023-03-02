<?php

namespace App\Controllers;

use App\Renderer;

class HomeController
{
    /**
     * Homepage
     *
     * @return string
     */
    public function index(): string
    {
        return Renderer::render('Home/home');
    }
}