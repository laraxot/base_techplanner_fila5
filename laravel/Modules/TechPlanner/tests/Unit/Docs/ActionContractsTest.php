<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

use function Safe\file_get_contents;

uses(TestCase::class);

/*
 * Action del dominio TechPlanner che scrivono dati, mandano mail o chiamano servizi esterni: il contratto e' obbligatorio
 * (regola Modules/Xot/docs/rules/action-behavioral-contract.md). La completezza del formato la controlla
 * Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php; qui si controlla che ci siano tutti. Source-level.
 */
const TECHPLANNER_REQUIRED_CONTRACTS = [
    'app/Actions/Contact/SubmitContactFormAction.php' => 'submit-contact-form-action.md',
    'app/Actions/Contact/DeliverContactMessageAction.php' => 'deliver-contact-message-action.md',
    'app/Actions/Contact/SendContactMessageAction.php' => 'send-contact-message-action.md',
    'app/Actions/Contact/PurgeExpiredContactMessagesAction.php' => 'purge-expired-contact-messages-action.md',
    'app/Actions/UpdateAllClientCoordinatesAction.php' => 'update-all-client-coordinates-action.md',
];

it('gives every side-effecting TechPlanner Action a contract linked from its docblock', function (): void {
    $module = dirname(__DIR__, 3);
    $problems = [];
    foreach (TECHPLANNER_REQUIRED_CONTRACTS as $action => $contract) {
        if (! is_file($module.'/docs/contracts/'.$contract)) {
            $problems[] = 'manca docs/contracts/'.$contract;
        }
        if (! str_contains(file_get_contents($module.'/'.$action), '@contract docs/contracts/'.$contract)) {
            $problems[] = $action.' non rimanda a docs/contracts/'.$contract;
        }
    }

    Assert::assertSame([], $problems);
});
