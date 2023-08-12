<?php

namespace App\Enums;

enum EstateType: string
{
    use Enum;

    case House = 'House';
    case Apartment = 'Apartment';
    case Hotel = 'Hotel';
    case GuestHouse = 'Guest House';
    case Other = 'Other';
}
