<?php

namespace App\Core\Enums;

enum ModerationEnum: string
{
    case PENDING = 'Проверка';
    case EDIT = 'Редакция';
    case PUBLISHED = 'Опубликован';
}
