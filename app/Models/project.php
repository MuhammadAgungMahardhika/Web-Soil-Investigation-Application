<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sondir()
    {
        return $this->hasMany(sondir::class, 'project_id', 'id');
    }
}
