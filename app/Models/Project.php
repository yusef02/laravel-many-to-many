<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'repository',
        'date_create',
        'last_update',
        'author',
        'type_id',
    ];
    protected $guarded = ['type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technology()
    {
        return $this->belongsToMany(Technology::class);
    }
    public function getTechText()
    {
        return implode(' - ', $this->technology->pluck('technology')->toArray());
    }
}
