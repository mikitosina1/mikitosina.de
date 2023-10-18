<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string|[]
	 */
	protected $fillable = [
		'name',
		'sname',
		'email',
		'bio',
		'password',
		'pic_link',
		'role',
		'visitor'
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


	/**
	 *
	 * @returns
	 */
	public static function create(array $data)
	{
		return static::query()->create([
			'name' => $data['name'],
			'sname' => $data['sname'],
			'email' => $data['email'],
			'bio' => $data['bio'],
			'password' => Hash::make($data['password']),
			'pic_link' => $data['pic_link'], // Путь к фотографии
			'role' => $data['role'],
			'visitor' => $data['visitor'],
		]);
	}
}
