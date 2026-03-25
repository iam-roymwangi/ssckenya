<?php
namespace App\Enums;

enum OrganizationTypeEnum: string
{
    use \App\Traits\EnumHelpers;

    case COMPANY = 'company';
    case REFINERY = 'refinery';
    case LAB = 'lab';
    case COURIER = 'courier';

}