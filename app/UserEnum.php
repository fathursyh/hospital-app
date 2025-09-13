<?php

namespace App;

enum UserEnum: string
{
    case Superadmin = 'superadmin';
    case Admin = 'admin';
    case Doctor = 'doctor';
}
