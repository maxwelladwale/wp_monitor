<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\PluginStatusEnum;
use App\Enums\VulnerabilityStatusEnum;
use Database\Factories\PluginInfoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PluginInfo extends Model
{
    /** @use HasFactory<PluginInfoFactory> */

    use HasFactory;

    protected $fillable = [
        'website_id',
        'plugin_name',
        'current_version',
        'latest_version',
        'status',
        'vulnerability_status',
        'vulnerability_description',
    ];

    public function website(): BelongsTo
    {
        return $this->belongsTo(SiteInfo::class);
    }
    protected $casts = [
        'status' => PluginStatusEnum::class,
        'vulnerability_status' => VulnerabilityStatusEnum::class,
    ];

}
