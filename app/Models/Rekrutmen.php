<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Rekrutmen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $oldNIK = $model->getOriginal('nik');
            $newNIK = $model->nik;

            if ($oldNIK !== $newNIK) {
                $oldPath = 'public/images/' . $oldNIK;
                $newPath = 'public/images/' . $newNIK;

                // Ubah path file
                Storage::move($oldPath, $newPath);
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
