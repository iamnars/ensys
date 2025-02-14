<?php

namespace App\Enums;

enum UserRole: string
{
    case CASHIER = 'cashier';
    case FIN_OFFICER = 'fin_officer';
    case ASST_FIN_OFFICER = 'asst_fin_officer';
    case ADMIN = 'admin';
    case FACULTY = 'faculty';
    case REGISTRAR = 'registrar';
    case ASST_REGISTRAR = 'asst_registrar';
    case STUDENT = 'student';
}
