<?php
namespace App\Enums;
enum LabTestStatusEnum: string
{
    use \App\Traits\EnumHelpers; 

    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case VERIFIED = 'verified';

}