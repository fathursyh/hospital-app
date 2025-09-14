<?php

namespace App;

enum SpecializationEnum: string
{
    case ANESTHESIONLOGIST = 'anesthesiologist';
    case CARDIOLOGY = 'cardiology';
    case DERMATOLOGY = 'dermatology';
    case ENDOCRINOLOGY = 'endocrinology';
    case GASTROENTEROLOGY = 'gastroenterology';
    case GENERAL = 'general';
    case GYNECOLOGY = 'gynecology';
    case HEMATOLOGY = 'hematology';
    case NEPHROLOGY = 'nephrology';
    case NEUROLOGY = 'neurology';
    case ONCOLOGY = 'oncology';
    case OPHTHALMOLOGY = 'ophthalmology';
    case ORTHOPEDICS = 'orthopedics';
    case OTOLARYNGOLOGY = 'otolaryngology'; // ENT
    case PEDIATRICS = 'pediatrics';
    case PSYCHIATRY = 'psychiatry';
    case PULMONOLOGY = 'pulmonology';
    case RADIOLOGY = 'radiology';
    case RHEUMATOLOGY = 'rheumatology';
    case SURGERY = 'surgery';
    case UROLOGY = 'urology';
}
