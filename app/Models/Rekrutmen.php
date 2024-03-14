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
            // Periksa apakah nilai 'nik' berubah
            if ($model->isDirty('nik')) {
                $oldNIK = $model->getOriginal('nik');
                $newNIK = $model->nik;

                // Bangun jalur lama dan baru
                $oldPath = storage_path('app/public/berkas/' . $oldNIK);
                $newPath = storage_path('app/public/berkas/' . $newNIK);

                // Periksa apakah jalur lama ada dan pindahkan berkas jika iya
                if (file_exists($oldPath)) {
                    // Pastikan jalur baru ada sebelum memindahkan
                    if (!file_exists($newPath)) {
                        mkdir($newPath, 0755, true);
                    }
                    // Pindahkan berkas dari jalur lama ke jalur baru
                    $files = Storage::allFiles('public/berkas/' . $oldNIK);
                    foreach ($files as $file) {
                        Storage::move($file, str_replace('berkas/' . $oldNIK, 'berkas/' . $newNIK, $file));
                    }
                }
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
