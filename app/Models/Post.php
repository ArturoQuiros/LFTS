<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; //If we want to make all the fields mass assignable

    //protected $guarded = ['id']; //All are fillable except id

    //protected $guarded = ['*']; //If we want to block all the fields from being mass-assigned

    // protected $fillable = [ //All these are fillable
    //     'title',
    //     'excerpt',
    //     'body',
    // ];

    //Alternativa para buscar por slug
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            );
        });
    }

    public function category() 
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() 
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
}