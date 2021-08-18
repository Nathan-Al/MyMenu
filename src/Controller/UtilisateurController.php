<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class UtilisateurController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));
    }
}