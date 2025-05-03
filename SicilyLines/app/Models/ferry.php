<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ferry extends Model
{
    use HasFactory;
    /**
     * the table
     * 
     * @var string
     **/
    protected $table = 'ferrys';
    
    protected $fillable = ["nom","photo","longueur","largeur","vitesse"];
    public function equipements(): BelongsToMany{
        return $this->belongsToMany(Equipement::class);
    }
}
