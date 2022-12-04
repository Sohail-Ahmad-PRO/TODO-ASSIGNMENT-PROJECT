<?php

namespace App\Models;

use App\Models\Scopes\TodoUserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    /**
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();

        //update user id whom this to-do belongs to
        static::creating(function ($todo) {
            $todo->user_id = Auth::id();
        });

        static::addGlobalScope(new TodoUserScope());
    }
}
