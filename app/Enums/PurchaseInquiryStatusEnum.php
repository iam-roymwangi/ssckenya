<?php
namespace App\Enums;

enum PurchaseInquiryStatusEnum: string
{
    case PENDING = 'pending';
    case REVIEWED = 'reviewed';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}