<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use App\Models\Status;
use App\Models\Konfirmasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = [
        'noSurat',
        'noPR',
        'spph',
        'tanggal',
        'namaBarang',
        'deliverDate',
        'catatan',
        'jawaban',
        'status_id',
        'hargaTotal',
        'hargaEstimasi'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function konfirmasi(): BelongsTo
    {
        return $this->belongsTo(Konfirmasi::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
