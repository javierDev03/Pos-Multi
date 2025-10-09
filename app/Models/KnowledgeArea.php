<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeArea extends Model
{
    use HasFactory;

    protected $table = 'knowledge_areas';

    protected $fillable = ['name', 'description', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(KnowledgeArea::class, 'parent_id');
    }
    // programa -> children (áreas priorizadas)
    public function children()
    {
        return $this->hasMany(KnowledgeArea::class, 'parent_id');
    }

    // public function articles()
    // {
    //     return $this->hasMany(Article::class);
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
