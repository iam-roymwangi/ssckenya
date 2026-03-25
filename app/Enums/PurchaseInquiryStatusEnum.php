<?php
namespace App\Enums;

enum PurchaseInquiryStatusEnum: string
{
    use \App\Traits\EnumHelpers;

    case PENDING = 'pending';
    case REVIEWED = 'reviewed';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

}