<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 *
 * @package App
 * @property string $medico
 * @property string $periodo
 * @property string $relatorio
*/
class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = ['periodo', 'relatorio', 'medico_id'];
    protected $hidden = [];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        Cliente::observe(new \App\Observers\UserActionsObserver);
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
    public function setPeriodoAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['periodo'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['periodo'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getPeriodoAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id')->withTrashed();
    }
    
}
