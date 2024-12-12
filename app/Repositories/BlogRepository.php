<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'slug',
        'content',
        'short_desc',
        'default_img_url',
        'category_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Blog::class;
    }
}
