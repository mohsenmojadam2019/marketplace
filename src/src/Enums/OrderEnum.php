<?php

namespace marketplace\src\Enums;

enum OrderEnum: int
{
    case  In_Store = 0;
    case  Home_Delivery = 1;

    public function text(): string
    {
        return match ($this) {
            self::In_Store => 'In Store',
            self::Home_Delivery => 'Home Delivery',
        };
    }
}
