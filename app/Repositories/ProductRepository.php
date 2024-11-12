<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'short_description',
        'full_description',
        'price',
        'original_price',
        'download_url'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Product::class;
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
                
        $filePath = $file->storeAs('public/download', $fileName);

        return $fileName;  
    }

    public function getProductFilePath($fileName) {
        return storage_path('app/public/download/' . $fileName);
    }
}
