<?php

namespace App;

enum HospitalTypeEnum: string
{
    case Private = 'Private';
    case Government = 'Government';
    case Specialty = 'Specialty';
    case Clinic = 'Clinic';
    case Others = 'Others';
}
