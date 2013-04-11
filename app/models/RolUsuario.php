<?php
use Toddish\Verify\Models\Role as Role;

class RolUsuario extends Role {

	 protected $fillable = array('user_id', 'role_id');

	 protected $table = 'role_user';

}