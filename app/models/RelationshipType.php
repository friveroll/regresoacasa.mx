<?php

class RelationshipType extends Eloquent {

	protected $table = 'relationship_types';

	protected $fillable = array('name', 'plural_name', 'active', 'mutual');

	public function type()
	{
		return $this->belongsTo('Relationship', 'relationships', 'type');
	}

	public function relationships()
	{
		return $this->hasMany('Relationship');
	}

	public function getRelationshipTypeIdentifier()
	{
		return $this->getKey();
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPluralName()
	{
		return $this->plural_name;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function setActive()
	{
		$this->active = 1;
		return $this->active->save();
	}

	public function getMutual()
	{
		return $this->mutual;
	}

	public function scopeActive($query)
	{
		return $query->where('active', '=', 1);
	}

	public function scopeMutual($query)
	{
		return $query->where('mutual', '=', 1);
	}

}