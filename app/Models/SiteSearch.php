<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteSearch
 * @package App\Models
 */
class SiteSearch extends Model
{
    /**
     * @var string
     */
    protected $table = 'site_searches';

    /**
     * @var array
     */
    protected $fillable = ['search', 'count', 'type', 'results', 'resultIds'];

}