<?php

class Relationship extends Eloquent {

	protected $table = 'relationships';

	protected $fillable = array('type_id', 'user_a', 'user_b', 'accepted');

	public function user()
	{
		return $this->belongsToMany('User', 'relationship_types', 'user_a', 'user_b');
	}

	public function type()
	{
		return $this->hasMany('RelationshipType');
	}

	public function scopeAccepted($query)
	{
		return $query->where('accepted', '=', 1);
	}
}