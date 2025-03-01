<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avatars extends Model
{
    /** @use HasFactory<\Database\Factories\AvatarsFactory> */
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'avatars';
    protected $fillable = [
        'avatar',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
