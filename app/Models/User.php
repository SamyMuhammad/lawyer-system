<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles; // Every role is associated with multiple permissions.

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'photo',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /* protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */

    /**
     * Get full path of user photo.
     * 
     * @return string
     */
    public function getFullPhotoPathAttribute()
    {
        if (empty($this->photo)) {
            return '/assets/images/default_profile.png';
        }
        return config('appGlobals.uploads_path') .'/users/images/'. $this->photo;
    }

    /**
     * Delete the user photo from the uploads.
     */
    public function deletePhotoFromUploads()
    {
        return Storage::disk('uploads')->delete('/users/images/'. $this->photo);
    }
}
