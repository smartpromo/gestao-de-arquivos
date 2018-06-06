<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Relatorio
 *
 * @package App
 * @property string $medico
 * @property string $data_inicial
 * @property string $data_final
 * @property string $relatorio
 * @property decimal $valor_total
 * @property string $created_by
*/
class Relatorio extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['data_inicial', 'data_final', 'relatorio', 'valor_total', 'medico_id', 'created_by_id', 'created_by_team_id'];
    protected $hidden = [];
    public static $searchable = [
    ];

    public static function boot()
    {
        parent::boot();

        Relatorio::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMedicoIdAttribute($input)
    {
        $this->attributes['medico_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataInicialAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data_inicial'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['data_inicial'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataInicialAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDataFinalAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['data_final'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['data_final'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDataFinalAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setValorTotalAttribute($input)
    {
        $this->attributes['valor_total'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id')->withTrashed();
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

}
