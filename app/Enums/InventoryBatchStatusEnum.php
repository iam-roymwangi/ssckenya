<?php
namespace App\Enums;

enum InventoryBatchStatusEnum: string
{
    use \App\Traits\EnumHelpers; 

    case AVAILABLE = 'available';
    case RESERVED = 'reserved';
    case ALLOCATED = 'allocated';
    case SOLD = 'sold';

}