<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['text', 'title', 'slug', 'user_id'];

    protected $appends = ['teaser'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCreatedAtAttribute($value)
    {
        switch (\App::getLocale()){
            case 'sk' :
                return date('\d\ň\a j. m. Y \o G:i', strtotime($value));
                break;
            default :
                return date('j M Y, G:i', strtotime($value));
                break;
        }

    }

    public function getTeaserAttribute()
    {
//        return str_limit($this->text, 200);
        return word_limiter($this->text, 40);
    }

    public function getRichTextAttribute($value)
    {
        return add_paragraphs( filter_url( e($this->text)));
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }



}
