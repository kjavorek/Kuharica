<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'url_1080', 'url_640', 'description', 'isPublic', 'userId'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    //protected $casts = [
    //    'prior_languages' => 'array',
    //];

}