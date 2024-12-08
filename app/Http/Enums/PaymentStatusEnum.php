<?php

namespace App\Http\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = 'pending';
    case PAID = 'pain';
}
