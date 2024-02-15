<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'agency_id',
        'range_id',
        'state',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function range()
    {
        return $this->belongsTo(Range::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function assigns()
    {
        return $this->hasMany(Assign::class);
    }

    public function observeds()
    {
        return $this->hasMany(Observed::class);
    }

    public function approveds()
    {
        return $this->hasMany(Approved::class);
    }

    public function rejecteds()
    {
        return $this->hasMany(Rejected::class);
    }

    public function disbursements()
    {
        return $this->hasMany(Disbursement::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignments::class);
    }

    public function returnComponents()
    {
        return $this->hasMany(ReturnComponent::class);
    }
}
