<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

/**
 * @property int $cd_curso
 * @property int $cd_cliente
 * @property int $imagem
 * @property int $cd_professor
 * @property string $ds_nome
 * @property string $me_ementa
 * @property string $me_resumo
 */
class Courses extends Model
{
    use Filterable;

    protected $filters = ['cd_curso', 'cd_professor'];

    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'api_curso';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cd_curso';

    /**
     * @var array
     */
    protected $fillable = ['cd_cliente', 'imagem', 'cd_professor', 'ds_nome', 'me_ementa', 'me_resumo'];
    
}
