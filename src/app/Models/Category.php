<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'content'
    ];

    //リレーションの設定
    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
}
