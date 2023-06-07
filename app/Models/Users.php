<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'name',
		'sname',
		'email',
		'bio',
		'password',
		'pic_link',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
		'role',
		'visitor'
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	protected $guarded = ["*","\\","drop","/","table"];
}
