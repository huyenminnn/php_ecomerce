<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusOrder extends Enum
{
    const Pending = 0;
    const Confirmed = 1;
    const Canceled = 2;
}
