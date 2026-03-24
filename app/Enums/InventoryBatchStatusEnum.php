<?php
namespace App\Enums;

enum InventoryBatchStatusEnum: string
{
    case AVAILABLE = 'available';
    case RESERVED = 'reserved';
    case ALLOCATED = 'allocated';
    case SOLD = 'sold';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}