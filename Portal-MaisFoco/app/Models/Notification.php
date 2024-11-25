<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['notice_id', 'alias'];

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }
    
    public function users()
    {
        return $this->hasMany(NotificationUser::class);
    }
}