<?php

namespace App\Models;

use App\Traits\ManageFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PPIDModel extends Model
{
    use HasFactory, ManageFiles;

    protected $table = 'ppid';

    protected $fillable = [
        'name',
        'content',
        'file_path',
        'responsible_person',
        'year_of_publication',
        'information_format',
        'storage_duration',
        'ppid_category_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($ppid) {
            foreach ($ppid->files as $file) {
                $this->deleteFile($file->file_path);

                $file->delete();
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PPIDCategoryModel::class, 'ppid_category_id', 'id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(PpidFilesModel::class, 'ppid_id');
    }
}
