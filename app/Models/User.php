<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
	use HasFactory;

	protected $table = 'users';

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
//		'password',
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
	 * Creates new user
	 * @param array $data from register form
	 * @return Builder|Model
	 */
	 public function create(array $data): Builder|Model
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

	public function getAuthIdentifierName(): string
	{
		return 'id';
	}

	public function getAuthIdentifier()
	{
		return $this->id;
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}
}
