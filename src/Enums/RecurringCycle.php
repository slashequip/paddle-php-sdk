<?php

namespace SlashEquip\PaddlePhpSdk\Enums;

enum RecurringCycle: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}