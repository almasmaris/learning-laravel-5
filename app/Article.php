<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends  \Eloquent{

	//fillable attribute
	protected $fillable = [
		'title',
		'body',
		'published_at',
        'user_id' //temporary
	];


    /**
     * Additional fields to treat as Carbon instances
     * @var array
     *
     */
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

    /**
     * Get the published_at attribute
     *
     * @param $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {

        return Carbon::parse($date)->format('Y-m-d');
    }


    /**
     *  An article is owned by a User
     */
    public function user()
    {
        return $this->belongsTo('App\User');


    }

    /**
     * Get the tags associated with the given article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tags ids associates with the current article
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
}
