<?php
declare(strict_types=1);

namespace App\Models;

use Database\Factories\ClientInfoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientInfo extends Model
{
    /** @use HasFactory<ClientInfoFactory> */
    use HasFactory;

   protected $table = 'client_info';
   protected $primaryKey = 'client_id';
   public $incrementing = false;
   protected $keyType = 'string';

    protected $fillable = [
        'client_id',
        'name',
        'email',
        'phone',
        'url',
        'logo_path'
    ];

    public function websites(): HasMany
    {
        return $this->hasMany( siteInfo::class, 'client_id', 'client_id' );
    }
}
