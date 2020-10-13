<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    # Добавляем поля в белый список, без этого занесения в БД не возможно !
    protected $fillable = [
        'title', 'description', 'author_id',
    ];

    # Связь один ко многим, один автор может иметь много постов
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'author_id');
    }
}




