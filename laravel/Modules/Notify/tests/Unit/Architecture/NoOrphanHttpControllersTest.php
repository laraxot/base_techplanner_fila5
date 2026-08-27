<?php

declare(strict_types=1);

<<<<<<< .merge_file_PhvDWZ
=======
use PHPUnit\Framework\Assert;

>>>>>>> .merge_file_HEMiMY
it('does not contain the legacy notification tracking controller', function (): void {
    $controllerPath = dirname(__DIR__, 4)
        .'/app/Http/Controllers/NotificationTrackingController.php';

<<<<<<< .merge_file_PhvDWZ
=======
    Assert::assertFileDoesNotExist($controllerPath);
>>>>>>> .merge_file_HEMiMY
});
