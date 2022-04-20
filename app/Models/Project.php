<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Trait\Attributes\ProjectAttribute;

class Project extends Model
{
    use HasFactory, SoftDeletes, ProjectAttribute;

    protected $table = 'projets';
    protected $fillable = [
        'numero', 'nom', 'description', 'technologies', 'client_id', 'type_id', 'responsable', 'date_debut', 'date_fin_estimee', 'date_fin_reelle'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
