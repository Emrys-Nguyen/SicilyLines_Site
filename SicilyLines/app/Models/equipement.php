<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class equipement extends Model
{
    use HasFactory;

    public function ferrys():BelongsToMany{
        return $this->belongsToMany(Ferry::class);
    }
}
