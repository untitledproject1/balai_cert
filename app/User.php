<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyApiEmail;
// use NotificationChannels\WebPush\HasPushSubscriptions;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable;
    // use HasPushSubscriptions;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'role_id', 'negeri', 'email_verified_at', 'nama_perusahaan', 'pimpinan_perusahaan', 'alamat_perusahaan', 'negeri', 'kota', 'provinsi', 'kode_pos', 'no_fax', 'email_pengguna', 'jml_pegawai_tetap', 'jml_pegawai_tidak_tetap', 'jml_line_produksi', 'contact_person', 'no_telp', 'email_perusahaan', 'npwp', 'surat_domisili'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [
        'id'
    ];

    public function sendApiEmailVerificationNotification(){
        $this->notify(new VerifyApiEmail); // my notification
    }

    public function role() {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
    
    public function produk_client() {
        return $this->hasMany('App\Produk', 'user_id');
    }


    public function produk() {
        $model = $this->produk_client();
        $result = null;
        // if (count($model) > 0) {
        //     $result = $model->where('tgl_request_sert', null)->first();
        // }
        return $model->first();
    }

    public function currentProduct() {
        $model = $this->produk_client()->get();
        $result = null;
        if (count($model) > 0) {
            $result = $model->where('kode_tahap', '!=', 24);
        }
        return $result;
    }

    public function total_available_cert() {
        $model = $this->produk_client()->where('kode_tahap', '!=', 24)->get();
        return 5 - count($model);
    }


    public function id_produk() {
        $produk = $this->produk();
        $result = null;
        if (!is_null($produk)) {
            $result = $produk->id;
        }
        return $result;
    }

    public function hasAnyRoles($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role) {
        if ($this->role()->where('role',$role)->first()) {
            return true;
        }
        return false;
    }

    public function home() {
        $role = \Auth::user()->role()->first()->role;
        if ($role == 'client') {return '/dashboard';}
        elseif ($role == 'super_admin') {return '/bc_admin/super/dashboard';} 
        else {return '/cert_list/on_going';}
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function flashMsg_emailVerify($userModel) {
        if (!is_null($userModel->email_verified_at)) {
            $flashInfo = 'Verifikasi email berhasil dilakukan!';
            if (is_null($userModel->verified)) {
                $userModel->verified = 1;
                $userModel->save();
            } else {
                $flashInfo = null;
            }
        }
        return $flashInfo;
    }
}
