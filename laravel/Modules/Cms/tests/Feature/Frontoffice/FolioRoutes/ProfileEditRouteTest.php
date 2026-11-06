<?php

declare(strict_types=1);

it('GET /it/profile/edit acceptable (likely auth required)', function (): void {
<<<<<<< .merge_file_agKkIE
    $res = $this->get('/it/profile/edit');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
=======
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $res = $this->get('/it/profile/edit');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_EzfT3g
});
