<?php

namespace App\Modules\Users\models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Modules\Users\requests\PhoneNumber;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected  $appends = [
        'full_name',
    ];
    public static function getFileds(){
        return app(self::class)->getFillable();
    }
    public function getFullNameAttribute(){
        return ($this->first_name ? $this->first_name : '') . " " . ($this->last_name ? $this->last_name : '');
    }
    public static function getUpdateRules(){
        return [
            'first_name' => ['required','string','max:50'],
            'last_name' => ['required','string','max:50'],
            'username' => ['required','string','max:250',Rule::unique('users', 'username')->ignore(request()->id)],
            'password' => ['required','string','confirmed','min:8'],
            'phone' => ['required','string',new PhoneNumber,Rule::unique('users', 'phone')->ignore(request()->id)],
            'email' => ['required','email',Rule::unique('users', 'email')->ignore(request()->id)],
            'password_confirmation'=> [Rule::requiredIf(!is_null(request()->password)),'same:password'],
            'roles'=>['required','array']
        ];
    }

    public static function getCreateRules(){
        return [
            'first_name' => ['required','string','max:50'],
            'last_name' => ['required','string','max:50'],
            'username' => ['required','string','max:250','unique:users'],
            'password' => ['required','string','confirmed','min:8'],
            'phone' => ['required','string','unique:users',new PhoneNumber],
            'email' => ['required','unique:users','email'],
            'roles' => ['required','array'],
        ];
    }
}
