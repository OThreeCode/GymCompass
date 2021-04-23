<?php

namespace App\Services;

use App\Models\SubsManager\Product;
use App\Repositories\BookRepository;
use App\SubsManager\Services\ProductService;

class BookService extends ProductService
{
    private BookRepository $bookRepository;

    public function __construct()
    {
        $this->bookRepository = new BookRepository;
    }

    protected function rules() : array
    {
        return [
            'name'        => 'required|string',
            'description' => 'required|string',
            'author'      => 'required|string',
            'genre'       => 'required|string',
            'isbn'        => 'required|string',
        ];
    }
}
