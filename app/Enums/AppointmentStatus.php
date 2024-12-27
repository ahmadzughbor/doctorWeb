<?php

namespace App\Enums;

enum AppointmentStatus: string
{
    case SCHEDULED = 'scheduled';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function toFilamentBadgeColor(): string | array | null
    {
        return match($this) {
            self::SCHEDULED => 'warning',
            self::COMPLETED => 'success',
            self::CANCELLED => 'danger',
            default => 'gray'
        };
    }

    public function toLabel(): string
    {
        return match($this) {
            self::SCHEDULED => 'Scheduled',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
            default => 'Unknown'
        };
    }

    public static function options(): array
    {
        return [
            self::SCHEDULED->value => 'Scheduled',
            self::COMPLETED->value => 'Completed',
            self::CANCELLED->value => 'Cancelled',
        ];
    }

    public static function fromString(string $value): self
    {
        return match(strtolower($value)) {
            'scheduled' => self::SCHEDULED,
            'completed' => self::COMPLETED,
            'cancelled', 'canceled' => self::CANCELLED,
            default => throw new \ValueError("Invalid status: {$value}")
        };
    }
} 