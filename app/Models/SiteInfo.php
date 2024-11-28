<?php

namespace App\Models;

use Database\Factories\SiteInfoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiteInfo extends Model
{
    /** @use HasFactory<SiteInfoFactory> */
    use HasFactory;
    protected $table = 'site_info';
    protected $primaryKey = 'website_id';
    protected $fillable = [
        'website_id',
        'website_name',
        'website_url',
        'client_id',
        'site_ip',
        'site_admin_email',
        'ssl_status',
        'host_provider',
        'site_status',
        'wp_version',
        'php_version',
        'mysql_version',
        'server_software',
        'server_ip',
        'server_status',
        'health_status',
        'server_type',
    ];
    public function client(): BelongsTo
    {
        return $this->belongsTo(clientinfo::class, 'client_id', 'client_id');
    }
    public function website(): HasMany
    {
        return $this->hasMany(plugininfo::class, 'website_id', 'website_id');
    }
}
