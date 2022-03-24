<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(PostAttachment::class, 'post_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class, 'post_id');
    }
}