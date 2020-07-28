<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SitePage extends Model
{
    /**
     * @var string
     */
    protected $table = 'site_pages';

    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'type_id', 'logo', 'content', 'show_in_footer', 'show_in_header'];
 
    /**
     * @var array
     */
    protected $casts = [
        'type_id'           =>  'integer',
        'show_in_footer'    =>  'boolean',
        'show_in_header'    =>  'boolean'
    ];

    /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}