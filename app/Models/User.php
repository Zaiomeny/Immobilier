<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_USER = 'USER';
    const ROLE_DEFAULT = self::ROLE_USER;

    const ROLES =[
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_USER => 'User'
    ];

    public function isAdmin(): bool
    {
        return $this->role == self::ROLE_ADMIN;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Post::class,'likes');
    }
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_followers','followed_id','follower_id');
    }
    public function subscribeTo(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_followers','follower_id','followed_id');
    }
    public function subscribedTo(self $user): bool
    {
        return $this->subscribeTo()->where('followed_id', $user->id)->exists();
    }
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function hasliked(Post $post): bool
    {
        return $this->likes()->where('post_id',$post->id)->exists();
    }
    public function getName(): string
    {
        if($this->name == currentUser()->name){
            return 'Vous';
        }
        return $this->name;
    }
}
