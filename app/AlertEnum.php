<?php

namespace App;

enum AlertEnum: string
{
    case Success = 'success';
    case Warning = 'warning';
    case Error = 'error';
    case Info = 'info';
}
