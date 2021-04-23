<?php

namespace App\Services;

use App\Repositories\MusicRepository;
use App\SubsManager\Services\ProductService;

class BookService extends ProductService
{
    private MusicRepository $musickRepository;

    public function __construct()
    {
        $this->musickRepository = new MusicRepository;
    }

    protected function rules() : array
    {
        return [
            'title'    => 'required|string',
            'singer'   => 'required|string',
            'album'    => 'required|string',
            'genre'    => 'required|string',
            'duration' => 'required|float',
        ];
    }
}
