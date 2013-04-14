<?php

class Friendship extends Eloquent {

	protected $table = 'friendships';

	protected $fillable = array('user_id', 'friend_id');

	public function getId()
	{
		return $this->getKey()
	}

	public function user()
	{
		return $this->belongsTo('User');//, 'friendships', 'user_id', 'friend_id');//, 'friendships', 'user_id', 'friend_id')->withTimestamps();//, 'friendships', 'friend_id', 'user_id')
	}

	public function scopeConfirmed($query)
	{
		return $query->where('confirmed', '=', '1');
	}

	public function scopeUnconfirmed($query)
	{
		return $query->where('confirmed', '=', '0');
	}

	public function getUserId()
	{
		return $this->user_id;
	}

	public function getFriendId()
	{
		return $this->friend_id;
	}

}