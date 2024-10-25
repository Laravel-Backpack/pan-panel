<?php

namespace Backpack\Pan;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class PanAnalytic extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

    protected $table = 'pan_analytics';

    public function clicks(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => $this->toHumanReadableNumber($value).' ('.$this->toHumanReadablePercentage($this->impressions, $value).')',
        );
    }

    public function hovers(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => $this->toHumanReadableNumber($value).' ('.$this->toHumanReadablePercentage($this->impressions, $value).')',
        );
    }

    /**
     * Returns a human-readable number.
     * Function borrowed from panphp/pan package.
     */
    private function toHumanReadableNumber(int $number): string
    {
        return number_format($number);
    }

    /**
     * Returns a human-readable percentage.
     * Function borrowed from panphp/pan package.
     */
    private function toHumanReadablePercentage(int $total, int $part): string
    {
        if ($total === 0) {
            return 'Infinity%';
        }

        return number_format($part / $total * 100, 1).'%';
    }
}
