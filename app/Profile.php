<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    /*
     * Just to return a default image
     */
    public function profileImage()
    {
        return '/storage/' .
            (($this->src)
                ? $this->src
                : 'uploads/7GB5JGPoLkB7wpoq0LPgg6qvcM6pHXi6QQ4ER47c.png');

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

}
