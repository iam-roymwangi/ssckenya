<?php
namespace App\Enums;

enum ProductSpecificationLabelEnum: string
{
    use \App\Traits\EnumHelpers;

    //We will have to get the list from SSC
    case PREMIUM = 'premium';
    case STANDARD = 'standard';
    case ACCEPTABLE = 'acceptable';

}