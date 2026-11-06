<?php

declare(strict_types=1);

it('GET /it/profile/show acceptable (likely auth required)', function (): void {
<<<<<<< .merge_file_aXEsu2
    $res = $this->get('/it/profile/show');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
=======
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $res = $this->get('/it/profile/show');
    expect($res->getStatusCode())->toBeIn([200, 204, 301, 302, 303, 307, 308, 401, 403]);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_i3oFq5
});
