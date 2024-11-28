<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Enum representing the possible status values for a plugin.
 * The `Active` status indicates the plugin is currently enabled and functioning.
 * The `Inactive` status indicates the plugin is currently disabled or not in use.
 */

final class PluginStatusEnum extends Enum
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
}
