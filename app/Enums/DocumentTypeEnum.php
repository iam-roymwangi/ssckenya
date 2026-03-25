<?php
namespace App\Enums;
enum DocumentTypeEnum: string
{
    case SPA = 'spa';
    case ASSAY_REPORT = 'assay_report';
    case INVOICE = 'invoice';
    case EXPORT_PERMIT = 'export_permit';
    case DELIVERY_NOTE = 'delivery_note';
    case OTHER = 'other';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}