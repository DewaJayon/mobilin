<?php

namespace App\Enums;

enum FuelEnum: string
{
    case DIESEL  = 'diesel';
    case BENSIN  = 'bensin';
    case LISTRIK = 'listrik';

    /**
     * Returns the label of the fuel type.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::DIESEL  => 'Diesel',
            self::BENSIN  => 'Bensin',
            self::LISTRIK => 'Listrik',
        };
    }

    /**
     * Returns the value of the fuel type.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Returns an array of fuel type options.
     *
     * @return array
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->map(fn($case) => [
                'value' => $case->value,
                'label' => $case->getLabel(),
            ])
            ->toArray();
    }
}
