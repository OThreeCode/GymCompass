<?php

namespace App\Services;

use App\Models\SubsManager\Product;
use App\Repositories\BookRepository;
use App\SubsManager\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BookService extends ProductService
{
    private BookRepository $bookRepository;

    public function __construct()
    {
        $this->bookRepository = new BookRepository;
    }

    public function getAll() : Collection
    {
        $products = $this->bookRepository->getAll();

        return $products;
    }

    public function save(array $data) : Product
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return $this->bookRepository->save($data);
    }

    public function update(Product $product, array $data) : Product
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        
        return $this->bookRepository->update($product, $data);
    }

    public function delete(Product $product) : void
    {
        $this->repository->delete($product);
    }

    protected function rules() : array
    {
        return [
            'title'       => 'required|string',
            'description' => 'required|string',
            'author'      => 'required|string',
            'genre'       => 'required|string',
            'isbn'        => 'required|string',
        ];
    }
}
