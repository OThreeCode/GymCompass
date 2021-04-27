<?php

namespace App\Http\Controllers;

use App\Models\SubsManager\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    // private ProductService $service;
    // private ProductRepository $repository;

    // public function __construct()
    // {
    //     $this->service = new ProductService();
    //     $this->repository = new ProductRepository();
    // }

    public function index()
    {
        try {
            // $products = $this->service->getAll();
            return view('submanager.product.index', [
                'products' => $products ?? null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar produtos.');
        }
    }

    public function create()
    {
        try {
            return view('submanager.product.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar produtos.');
        }
    }

    public function show(Product $product)
    {
        try {
            return view('submanager.product.edit', [
                'product' => $product,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar produtos.');
        }
    }

    public function store(Request $request)
    {
        try {
            $this->service->save($request->all());
            return redirect()
                ->route('product.index')
                ->with('success', 'Produto cadastrado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha na criação do produto.');
        }
    }

    public function update(Request $request, Product $product)
    {
        try {
            $this->service->update($product, $request->all());
            return redirect()
                ->route('product.index')
                ->with('success', 'Produto atualizado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao atualizar produto.');
        }
    }

    public function destroy(Product $product)
    {
        try {
            $this->service->delete($product);
            return redirect()
                ->back()
                ->with('message', 'Produto deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Não foi possível deletar este produto.');
        }
    }
}
