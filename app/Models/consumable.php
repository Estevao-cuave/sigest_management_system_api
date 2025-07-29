<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class consumable extends Model
{
    /** @use HasFactory<\Database\Factories\ConsumableFactory> */
    use HasFactory;


    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(supplier::class);
    }

    

}
