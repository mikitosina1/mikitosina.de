<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * @property mixed $id
 * @property mixed $password
 * @property string $remember_token
 */
class User extends Model implements Authenticatable
{
	use HasFactory;

	protected $table = 'users';

	const ADMIN_ROLE = 'ADMIN_ROLE';

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

	/**
	 * getAuthIdentifierName
	 * -----------------------------------------------------------------------------------------------------------------
	 * @return string
	 */
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

	public function getRememberToken(): string
	{
		return $this->remember_token;
	}

	public function setRememberToken($value): void
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName(): string
	{
		return 'remember_token';
	}

	/**
	 * getAdminRoleId
	 * -----------------------------------------------------------------------------------------------------------------
	 *  gets admin role id from .env
	 * @return int
	 */
	public static function getAdminRoleId():int
	{
		return env(self::ADMIN_ROLE);
	}
}
