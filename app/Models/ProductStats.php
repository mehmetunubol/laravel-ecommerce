<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStats extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_stats';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'type', 'count'];

    /**
     * @var array
     */
    protected $casts = [
        'product_id'    =>  'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
