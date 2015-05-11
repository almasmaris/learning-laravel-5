<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends  \Eloquent{

	//fillable attribute
	protected $fillable = [
		'title',
		'body',
		'published_at'
	];

	protected $dates = ['published_at'];

	/*
	 * scope for showing articles based on published_at attribute
	 */
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}

	/**
	 * scope for showing unpublished articles
	 */
	public function scopeUnpublished($query)
	{
		$query->where('published_at', '>', Carbon::now());
	}

	/**
	 * change attribute before send to database
	 */
	public function setPublishedAtAttribute($date)
	{
		
		$this->attributes['published_at'] = Carbon::parse($date);
	}
}
