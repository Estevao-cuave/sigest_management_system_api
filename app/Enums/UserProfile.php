<?php

namespace App\Enums;

enum UserProfile: string
{
    case ADMIN = "admin";
    case SUPERVISOR = "supervisor";
    case DEFAULT = "default";   
    
}
