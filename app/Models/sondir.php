<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sondir extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the sondir
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(project::class, 'project_id');
    }
    /**
     * Get all of the comments for the sondir
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function result()
    {
        return $this->hasMany(result::class, 'sondir_id', 'id');
    }
}
