<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'img', 'slug'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function state() {
        return $this->hasOne(State::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview(){
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans(){
        return $this->created_at->diffForHumans();
//        return $this->published_at->diffForHumans();
    }

    public function scopeLastLimit($query, $numbers)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($numbers)->get();
    }

    public function scopeAllPaginate($query, $numbers)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($numbers);
    }
    public function scopeFindBySlug($query, $slug)
    {
        return $query->with('comments', 'tags', 'state')->where('slug', $slug)->firstOrFail();
    }
    public function scopeFindByTag($query)
    {
        return $query->with( 'tags', 'state')->orderBy('created_at', "desc")->paginate(10);
    }






    use HasFactory;
}
