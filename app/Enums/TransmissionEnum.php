<?php

namespace App\Enums;

enum TransmissionEnum: string
{

    case MANUAL = 'manual';
    case AUTOMATIC = 'automatic';

    /**
     * Returns the value of the transmission type.
     *
     * @return string
     */
    public  function getValues(): string
    {
        return $this->value;
    }

    /**
     * Returns the label of the transmission type.
     *
     * @return string
     */
    public function getLabels(): string
    {
        return match ($this) {
            self::MANUAL => 'Manual',
            self::AUTOMATIC => 'Automatic',
        };
    }

    /**
     * Returns an array of transmission type options.
     *
     * The array contains the value of the transmission type as key and the label of the transmission type as value.
     *
     * @return array
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->map(fn($case) => [
                'value' => $case->value,
                'label' => $case->getLabels(),
            ])
            ->toArray();
    }
}
