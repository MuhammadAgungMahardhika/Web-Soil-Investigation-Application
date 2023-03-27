<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;

    /**
     * Get the sondir that owns the result
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sondir()
    {
        return $this->belongsTo(sondir::class, 'sondir_id');
    }
}
