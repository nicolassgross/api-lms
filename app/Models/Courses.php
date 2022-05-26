<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cd_curso
 * @property int $cd_coordenador
 * @property int $cd_tutor
 * @property int $cd_cliente
 * @property int $cd_imagem
 * @property int $cd_metodo_avaliacao
 * @property int $cd_professor
 * @property int $cd_categoria
 * @property int $cd_grau
 * @property string $ds_nome
 * @property string $me_ementa
 * @property string $me_resumo
 * @property float $nr_horas
 * @property boolean $sn_ativo
 * @property string $dt_criacao
 * @property float $vl_aproveitamento_minimo
 * @property boolean $sn_excluido
 * @property boolean $sn_matricula_outra_turma
 * @property string $dt_base
 * @property float $vl_nota_maxima
 * @property string $dt_excluido
 * @property boolean $sn_bloqueio_digitacao_nota
 * @property float $vl_media_minima_recuperacao
 * @property boolean $sn_curso_modelo
 * @property int $cd_curso_modelo
 */
class Courses extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ulms_curso';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cd_curso';

    /**
     * @var array
     */
    protected $fillable = ['cd_coordenador', 'cd_tutor', 'cd_cliente', 'cd_imagem', 'cd_metodo_avaliacao', 'cd_professor', 'cd_categoria', 'cd_grau', 'ds_nome', 'me_ementa', 'me_resumo', 'nr_horas', 'sn_ativo', 'dt_criacao', 'vl_aproveitamento_minimo', 'sn_excluido', 'sn_matricula_outra_turma', 'dt_base', 'vl_nota_maxima', 'dt_excluido', 'sn_bloqueio_digitacao_nota', 'vl_media_minima_recuperacao', 'sn_curso_modelo', 'cd_curso_modelo'];
}
