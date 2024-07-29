<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'icon', 'icon_gray'];

    public function getIconUrlAttribute()
    {
        return $this->icon ? url('storage/' . $this->icon) : null;
    }

    public function getIconGrayUrlAttribute()
    {
        return $this->icon_gray ? url('storage/' . $this->icon_gray) : null;
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function($parameter) {
            if ($parameter->icon) {
                \Storage::delete($parameter->icon);
            }
            if ($parameter->icon_gray) {
                \Storage::delete($parameter->icon_gray);
            }
        });
    }

    /**
     * Uploads an image and returns the path.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @return string
     */
    public static function uploadImage($image)
    {
        // Transliterate the file name to Latin characters and make it lowercase
        $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $image->getClientOriginalExtension();

        // Store the file in the public/images directory
        return $image->storeAs('images', $filename, 'public');
    }
}
