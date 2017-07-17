<?php

namespace App\Notifications;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;

class SubNotification extends Model
{
    // we don't use created_at/updated_at
    public $timestamps = false;

    // nothing guarded - mass assigment allowed
    protected $guarded = [];

    // cast read_at as datetime
    protected $casts = [
        'read_at' => 'datetime',
    ];

    // set up relation to the parent notification
    public function notification()
    {
        return $this->belongsTo(DatabaseNotification::class);
    }

    /**
     * Get the notifiable entity that the notification belongs to.
     */
    public function notifiable()
    {
        return $this->morphTo();
    }

    /**
     * Mark the subnotification as read.
     *
     * @return void
     */
    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->forceFill(['read_at' => $this->freshTimestamp()])->save();
        }
    }

}
