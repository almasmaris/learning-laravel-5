<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * Get the articles associates with tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}