<?php

namespace App;

enum CourseType: string {
    case FREE = 'free';
    case PAID = 'paid';

    public function label(): string {
        return match($this) {
            self::FREE => 'Curso Gratuito',
            self::PAID => 'De Pago',
        };
    }
}