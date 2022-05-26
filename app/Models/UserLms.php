<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property int $cd_pessoa
 * @property int $cd_cliente
 * @property int $cd_imagem
 * @property string $ds_nome
 * @property string $ds_login
 * @property string $ds_senha
 * @property boolean $sn_pessoa_juridica
 * @property string $me_qualificacao
 * @property string $ds_seguimento
 * @property string $ds_marca
 * @property string $ds_unidade
 * @property string $ds_turma
 * @property string $dt_cadastro
 * @property string $dt_base
 * @property string $ds_login_md5
 */
class UserLms extends Authenticatable implements JWTSubject
{
    use Notifiable;
    
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'unim_pessoa';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cd_pessoa';

    /**
     * @var array
     */
    protected $fillable = ['cd_cliente', 'cd_imagem', 'ds_nome', 'ds_login', 'ds_senha', 'sn_pessoa_juridica', 'me_qualificacao', 'ds_seguimento', 'ds_marca', 'ds_unidade', 'ds_turma', 'dt_cadastro', 'dt_base', 'ds_login_md5'];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
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

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->ds_senha;
    }
}
