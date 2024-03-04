<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

/**
 * @property mixed $id
 * @property mixed $password
 * @property string $remember_token
 */
class User extends Model implements Authenticatable, MustVerifyEmail
{
	use HasFactory, Notifiable;

	protected $table = 'users';
	const ADMIN_ROLE = 'ADMIN_ROLE';
	const USER_ROLE = 'USER_ROLE';

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
	 * create
	 * -----------------------------------------------------------------------------------------------------------------
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
			'role' => $this->getUserRoleId(),
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

	/**
	 * getUserRoleId
	 * -----------------------------------------------------------------------------------------------------------------
	 *  gets standard (user) role id from .env
	 * @return int
	 */
	public static function getUserRoleId():int
	{
		return env(self::USER_ROLE);
	}

	/**
	 * @return bool
	 */
	public function hasVerifiedEmail(): bool
	{
		return true;
	}

	public function markEmailAsVerified()
	{
		// dummy
	}

	public function sendEmailVerificationNotification()
	{
		// dummy
	}

	public function getEmailForVerification()
	{
		// dummy
	}
}
