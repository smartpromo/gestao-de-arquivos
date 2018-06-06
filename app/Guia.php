<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Guia
 *
 * @package App
 * @property string $medico
 * @property string $nome_do_pacinte
 * @property string $convenio
 * @property time $horario_inicial
 * @property time $horario_final
 * @property tinyInteger $horario_especial
 * @property string $local
 * @property enum $via
 * @property enum $tipo_de_guia
 * @property enum $acomodacoes
 * @property string $guia
 * @property string $created_by
 * @property string $created_by_team
*/
class Guia extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['nome_do_pacinte', 'horario_inicial', 'horario_final', 'horario_especial', 'via', 'tipo_de_guia', 'acomodacoes', 'guia', 'local_address', 'local_latitude', 'local_longitude', 'medico_id', 'convenio_id', 'created_by_id', 'created_by_team_id'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Guia::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_via = ["Selecione o tipo de via" => "Selecione o tipo de via", "ÚNICA" => "ÚNICA", "MESMA" => "MESMA", "DIFERENTE" => "DIFERENTE"];

    public static $enum_tipo_de_guia = ["Selecione o tipo de guia" => "Selecione o tipo de guia", "Consulta" => "Consulta", "SADT" => "SADT", "Honorários" => "Honorários"];

    public static $enum_acomodacoes = ["Selecione o tipo de acomodação" => "Selecione o tipo de acomodação", "APARTAMENTO" => "APARTAMENTO", "ENFERMARIA" => "ENFERMARIA"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMedicoIdAttribute($input)
    {
        $this->attributes['medico_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setConvenioIdAttribute($input)
    {
        $this->attributes['convenio_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setHorarioInicialAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['horario_inicial'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['horario_inicial'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getHorarioInicialAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setHorarioFinalAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['horario_final'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['horario_final'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getHorarioFinalAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByTeamIdAttribute($input)
    {
        $this->attributes['created_by_team_id'] = $input ? $input : null;
    }
    
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id')->withTrashed();
    }
    
    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id')->withTrashed();
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
    public function created_by_team()
    {
        return $this->belongsTo(Team::class, 'created_by_team_id');
    }
    
}
