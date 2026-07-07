<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Traits;

<<<<<<< HEAD
=======
use BackedEnum;
use UnitEnum;

>>>>>>> 6ed19256f (.)
trait HasDynamicFillable
{
    /**
     * Overrides the default getFillable method to include fields from specified Enums.
     *
<<<<<<< HEAD
     * Models using this trait can override getDynamicFillableEnums() with the
     * fully qualified class names of Enums whose cases should be added to fillable.
=======
     * Models using this trait should define a protected array property `$dynamicFillableEnums`
     * containing the fully qualified class names of Enums whose cases should be added to fillable.
>>>>>>> 6ed19256f (.)
     *
     * Example: protected array $dynamicFillableEnums = [AddressItemEnum::class, ContactTypeEnum::class];
     *
     * @return list<string>
     */
    public function getFillable(): array
    {
        $fillable = array_values(parent::getFillable());

<<<<<<< HEAD
        $dynamicFillableEnums = $this->getDynamicFillableEnums();

        foreach ($dynamicFillableEnums as $enumClass) {
            if (! is_string($enumClass) || '' === $enumClass) {
=======
        $dynamicFillableEnums = $this->dynamicFillableEnums ?? null;

        // Ensure the property is an array
        if (! is_array($dynamicFillableEnums)) {
            return $fillable;
        }

        foreach ($dynamicFillableEnums as $enumClass) {
            if (! is_string($enumClass) || $enumClass === '') {
>>>>>>> 6ed19256f (.)
                continue;
            }

            // Basic validation for enum class
            if (! enum_exists($enumClass)) {
                continue; // Skip invalid enum classes
            }

            // Get enum cases' values and merge
            $enumCases = $enumClass::cases();
            $enumFields = array_map(
<<<<<<< HEAD
                static function (\UnitEnum $item): string {
                    if ($item instanceof \BackedEnum) {
=======
                static function (UnitEnum $item): string {
                    if ($item instanceof BackedEnum) {
>>>>>>> 6ed19256f (.)
                        return (string) $item->value;
                    }

                    return $item->name;
                },
                $enumCases,
            );

            $fillable = array_merge($fillable, array_values($enumFields));
        }

        // Ensure unique values and reset keys for cleanliness
        return array_values(array_unique($fillable));
    }
<<<<<<< HEAD

    /**
     * @return array<int, class-string<\UnitEnum>>
     */
    protected function getDynamicFillableEnums(): array
    {
        return [];
    }
=======
>>>>>>> 6ed19256f (.)
}
