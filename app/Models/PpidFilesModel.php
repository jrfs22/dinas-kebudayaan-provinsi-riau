<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PpidFilesModel extends Model
{
    use HasFactory;

    protected $table = 'ppid_files';

    protected $fillable = [
        'file_name',
        'file_number',
        'file_path',
        'release_date',
        'ppid_id',
    ];

    public function ppid(): BelongsTo
    {
        return $this->belongsTo(PPIDModel::class, 'ppid_id');
    }
}
