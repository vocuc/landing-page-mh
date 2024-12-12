<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $table = 'blogs';

    public $fillable = [
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

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'content' => 'string',
        'short_desc' => 'string',
        'default_img_url' => 'string',
        'meta_title' => 'string',
        'meta_description' => 'string',
        'meta_keyword' => 'string',
        'status' => 'boolean'
    ];

    public static array $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'string|max:255',
        'content' => 'required|string|max:65535',
        'short_desc' => 'required|string|max:500',
        'default_img_url' => 'required|string|max:255',
        'category_id' => 'nullable',
        'meta_title' => 'required|string|max:255',
        'meta_description' => 'required|string|max:500',
        'meta_keyword' => 'required|string|max:255',
        'status' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public static $categories = array(
        7 => "Basic Guide",
        1 => "DESIGN",
        2 => "CODE",
        3 => "Integrations",
        4 => "Founder’s diary",
        5 => "Design to code",
        6 => "Document"
        );
    
    
        public static $status = [
            1 => "Hoạt động",
            0 => "Không hoạt động"
        ];

    
}
