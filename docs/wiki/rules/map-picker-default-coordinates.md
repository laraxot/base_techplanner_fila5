---
name: map-picker-default-coordinates-rule
description: |
  **Rule**: MapPicker must default to current coordinates when lat/lng are null
  **Applies to**: MapPicker component only
  **Enforced by**: Code pattern and tests

  **Rule Details**:
  - If `latitude` or `longitude` is `null`, automatically set to current coordinates
  - Use `getCurrentLatitude()` and `getCurrentLongitude()` methods
  - Fallback to default coordinates (41.9028, 12.4964) if current location unavailable

  **Why**: Ensures map always centers on a valid location when no coordinates provided
  **How to apply**: Check for null in setUp() method and call current location methods

  **Files affected**:
  - `MapPicker.php` - Main implementation
  - `CoordinatePickerTest.php` - Add tests
  - `map-picker-lit.js` - Frontend coordinate handling

  **Examples**:
  ```php
  // In MapPicker.php setUp()
  if ($this->latitude === null || $this->longitude === null) {
      $this->center($this->getCurrentLatitude(), $this->getCurrentLongitude());
  }
  ```