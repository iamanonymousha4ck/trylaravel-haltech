<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $appends = ['image_url'];

    public function getImageUrlAttribute() {
        return config('services.file_path.user_profile') . $this->attributes['image'];
    }
}
