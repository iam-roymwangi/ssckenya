<?php
namespace App\Enums;

enum ProductTypeEnum: string
{
    use \App\Traits\EnumHelpers;

    //We will have to get the list from SSC
    case NUGGETS = 'nuggets';
    case DORE_BARS = 'dore_bars';
    case REFINED_BARS = 'refined_bars';
    case DUST = 'dust';

}