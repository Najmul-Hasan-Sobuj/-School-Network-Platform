<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSlug;

class Project extends Model
{
    use HasFactory;

    //protected $slugSourceColumn = 'title';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMembersAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setMembersAttribute($value)
    {
        $this->attributes['members'] = json_encode($value);
    }
}
