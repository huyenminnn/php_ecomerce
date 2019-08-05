<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusSuggest extends Enum
{
    const Pending = 0;
    const Accept = 1;
    const Reject = 2;
}
