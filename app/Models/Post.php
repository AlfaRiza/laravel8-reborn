<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query)
    {
        if(request('search')){
            return $query->where('title', 'like', '%'. request('search') . '%')
                ->orWhere('body', 'like', '%'. request('search') . '%');
        }
    }
    
    public function category(){
        return $this->BelongsTo(Category::class);
    }

    public function author(){
        return $this->BelongsTo(User::class, 'user_id');
    }
}
