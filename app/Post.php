<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'categeory_id');

    public function categeory()
    {
        return $this->belongsTo('App\Categeory');
    }

    public function visitors()
    {
        return $this->belongsToMany('App\Client','post_visitor');
    }

}
