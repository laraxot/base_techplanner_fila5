<?php

declare(strict_types=1);

?>
@if (app()->hasDebugModeEnabled())
    <div class="p-4 text-sm text-red-600 bg-red-50 border border-red-200 rounded">
        <strong>{{ $title }}</strong>
        <div>{!! $message !!}</div>
    </div>
@endif
