<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Trait\Attributes\ClientAttribute;

class Client extends Model
{
    use HasFactory, SoftDeletes, ClientAttribute;

    protected $table = 'clients';
    protected $fillable = ['nom', 'adresse', 'cp', 'ville', 'pays_id'];
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'pays_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
