<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfitabilityCalculation extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'sort_id', 'p_type_id', 'customer_id', 'tree_amount' ];
}
