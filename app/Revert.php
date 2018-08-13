<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revert extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'qt', 'product_value_id', 'quotation_product_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quotationProduct()
    {
        return $this->belongsTo(QuotationProduct::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productValue()
    {
        return $this->hasOne(ProductValue::class);
    }
}
