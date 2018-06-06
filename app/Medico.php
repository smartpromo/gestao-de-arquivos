<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Medico
 *
 * @package App
 * @property string $nome
 * @property string $email
 * @property string $fone
 * @property string $especialidade
 * @property integer $crm
 * @property string $uf_do_crm
 * @property string $cpf
 * @property integer $rg
 * @property string $created_by
 * @property string $created_by_team
*/
class Medico extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['nome', 'email', 'fone', 'especialidade', 'crm', 'uf_do_crm', 'cpf', 'rg', 'created_by_id', 'created_by_team_id'];
    protected $hidden = [];
    public static $searchable = [
        'cpf',
    ];
    
    public static function boot()
    {
        parent::boot();

        Medico::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCrmAttribute($input)
    {
        $this->attributes['crm'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setRgAttribute($input)
    {
        $this->attributes['rg'] = $input ? $input : null;
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
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
    public function created_by_team()
    {
        return $this->belongsTo(Team::class, 'created_by_team_id');
    }
    
}
