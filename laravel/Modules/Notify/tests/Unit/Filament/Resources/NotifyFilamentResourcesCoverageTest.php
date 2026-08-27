<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Filament\Resources;
<<<<<<< .merge_file_wclOVb
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======

use Filament\Actions\Action;
>>>>>>> .merge_file_VO1WKY
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Modules\Notify\Filament\Resources\ContactResource;
use Modules\Notify\Filament\Resources\ContactResource\Pages\ListContacts;
use Modules\Notify\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ListNotifications;
use Modules\Notify\Filament\Resources\NotificationTemplateResource;
use Modules\Notify\Filament\Resources\NotificationTemplateResource\Pages\PreviewNotificationTemplate;
use Modules\Notify\Tests\Fixtures\EditContactTestProxy;
use Modules\Notify\Tests\Fixtures\PreviewMailTemplateTestProxy;
use Modules\Notify\Tests\Fixtures\ViewNotificationTestProxy;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_lOCTLn
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
=======
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_wclOVb
=======
use Modules\Xot\Tests\XotBasePest;
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w

use function Safe\file_put_contents;
use function Safe\mkdir;

<<<<<<< .merge_file_wclOVb
uses(\Modules\Notify\Tests\TestCase::class);

function makeEditContactTestProxy(): EditContactTestProxy
{
    return new EditContactTestProxy();
=======
uses(TestCase::class)->group('no-notify-db');

function makeEditContactTestProxy(): EditContactTestProxy
{
<<<<<<< .merge_file_lOCTLn
    return new EditContactTestProxy();
=======
    return new EditContactTestProxy;
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w
}

function makePreviewMailTemplateTestProxy(): PreviewMailTemplateTestProxy
{
<<<<<<< .merge_file_lOCTLn
    return new PreviewMailTemplateTestProxy();
=======
<<<<<<< .merge_file_wclOVb
    return new PreviewMailTemplateTestProxy();
=======
    return new PreviewMailTemplateTestProxy;
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w
}

function makeViewNotificationTestProxy(): ViewNotificationTestProxy
{
<<<<<<< .merge_file_lOCTLn
    return new ViewNotificationTestProxy();
=======
<<<<<<< .merge_file_wclOVb
    return new ViewNotificationTestProxy();
=======
    return new ViewNotificationTestProxy;
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w
}

function makePreviewNotificationTemplateTestProxy(): PreviewNotificationTemplate
{
    return new class() extends PreviewNotificationTemplate {};
}

test('contact resource form schema exposes expected fields', function (): void {
<<<<<<< .merge_file_YfmPFQ
    $schema = TestCase::assertNotifyArray(ContactResource::getFormSchema());
=======
<<<<<<< .merge_file_lOCTLn
    $schema = \assertNotifyArray(ContactResource::getFormSchema());
=======
<<<<<<< .merge_file_wclOVb
    $schema = \assertNotifyArray(ContactResource::getFormSchema());
=======
    $schema = XotBasePest::assertArray(ContactResource::getFormSchemaOld());
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w
>>>>>>> .merge_file_rkU5Lb

    Assert::assertArrayHasKey('name', $schema);
    Assert::assertArrayHasKey('email', $schema);
    Assert::assertArrayHasKey('phone', $schema);
});

test('edit contact page exposes delete header action', function (): void {
    $page = makeEditContactTestProxy();
<<<<<<< .merge_file_wclOVb
    $actions = \assertNotifyArray($page->exposedHeaderActions());
=======
    $actions = XotBasePest::assertArray($page->exposedHeaderActions());
>>>>>>> .merge_file_VO1WKY

    Assert::assertArrayHasKey('delete', $actions);
    Assert::assertInstanceOf(DeleteAction::class, $actions['delete']);
});

test('list contacts page exposes expected table columns and filters', function (): void {
<<<<<<< .merge_file_wclOVb
    $page = new ListContacts;

    $columns = \assertNotifyArray($page->getTableColumns());
    $filters = \assertNotifyArray($page->getTableFilters());
=======
    $columns = XotBasePest::assertArray(ListContacts::contactTableColumns());
    $filters = XotBasePest::assertArray(ListContacts::contactTableFilters());
>>>>>>> .merge_file_VO1WKY

    Assert::assertArrayHasKey('id', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['id']);
    Assert::assertArrayHasKey('is_read', $columns);
    Assert::assertInstanceOf(IconColumn::class, $columns['is_read']);
    Assert::assertArrayHasKey('active', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['active']);
    Assert::assertArrayHasKey('inactive', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['inactive']);
});

test('list mail templates page exposes expected table columns', function (): void {
<<<<<<< .merge_file_wclOVb
    $page = new ListMailTemplates;
    $columns = \assertNotifyArray($page->getTableColumns());
=======
    $columns = XotBasePest::assertArray(ListMailTemplates::mailTemplateTableColumns());
>>>>>>> .merge_file_VO1WKY

    Assert::assertArrayHasKey('slug', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['slug']);
    Assert::assertArrayHasKey('subject', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['subject']);
    Assert::assertArrayHasKey('counter', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['counter']);
});

test('preview mail template page title and header actions are configured', function (): void {
    $page = makePreviewMailTemplateTestProxy();
    $actions = $page->exposedHeaderActions();

<<<<<<< .merge_file_wclOVb
    $actions = array_values(\assertNotifyArray($actions));
=======
    $actions = array_values(XotBasePest::assertArray($actions));
>>>>>>> .merge_file_VO1WKY
    Assert::assertCount(1, $actions);
    Assert::assertInstanceOf(Action::class, $actions[0]);
});

test('list notifications page exposes expected columns and filters', function (): void {
<<<<<<< .merge_file_wclOVb
    $page = new ListNotifications;

    $columns = \assertNotifyArray($page->getTableColumns());
    $filters = \assertNotifyArray($page->getTableFilters());
=======
    $columns = XotBasePest::assertArray(ListNotifications::notificationTableColumns());
    $filters = XotBasePest::assertArray(ListNotifications::notificationTableFilters());
>>>>>>> .merge_file_VO1WKY

    Assert::assertArrayHasKey('id', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['id']);
    Assert::assertArrayHasKey('type', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['type']);
    Assert::assertArrayHasKey('read', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['read']);
    Assert::assertArrayHasKey('unread', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['unread']);
    Assert::assertArrayHasKey('type', $filters);
    Assert::assertInstanceOf(SelectFilter::class, $filters['type']);
});

test('view notification page infolist schema contains section with text entries', function (): void {
    $page = makeViewNotificationTestProxy();
    $schema = $page->exposedInfolistSchema();

    Assert::assertCount(1, $schema);
    Assert::assertInstanceOf(Section::class, $schema[0]);

    $reflection = new \ReflectionClass($schema[0]);
    $prop = $reflection->getProperty('childComponents');
    $prop->setAccessible(true);
<<<<<<< .merge_file_wclOVb
    $components = \assertNotifyArray($prop->getValue($schema[0]));
=======
    $components = XotBasePest::assertArray($prop->getValue($schema[0]));
>>>>>>> .merge_file_VO1WKY

    Assert::assertNotEmpty($components);
});

test('mail template resource form schema exposes expected components', function (): void {
<<<<<<< .merge_file_wclOVb
    $mailLayoutsPath = base_path('Themes/Meetup/resources/mail-layouts');
    if (! is_dir($mailLayoutsPath)) {
        mkdir($mailLayoutsPath, 0777, true);
    }
    $fixture = $mailLayoutsPath.'/test-layout.html';
    if (! file_exists($fixture)) {
        file_put_contents($fixture, '<html><body>layout</body></html>');
    }

<<<<<<< .merge_file_YfmPFQ
    $schema = TestCase::assertNotifyArray(MailTemplateResource::getFormSchema());
=======
    $schema = \assertNotifyArray(MailTemplateResource::getFormSchema());
<<<<<<< .merge_file_lOCTLn
=======
=======
    // Nessuna fixture da creare: HtmlLayoutPathSelect legge
    // XotData::make()->getMailHtmlLayoutPath(), cioe' Themes/<pub_theme>/resources/mail-layouts,
    // e in questo progetto pub_theme e' 'Zero', che i suoi layout ce li ha gia'.
    $schema = XotBasePest::assertArray(MailTemplateResource::getFormSchemaOld());
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w
>>>>>>> .merge_file_rkU5Lb

    Assert::assertArrayHasKey('mailable_slug_group', $schema);
    Assert::assertInstanceOf(Group::class, $schema['mailable_slug_group']);
    Assert::assertArrayHasKey('subject', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['subject']);
    Assert::assertArrayHasKey('html_layout_path', $schema);
    Assert::assertArrayHasKey('html_template', $schema);
    Assert::assertInstanceOf(RichEditor::class, $schema['html_template']);
    Assert::assertArrayHasKey('params_display', $schema);
    Assert::assertArrayHasKey('text_template', $schema);
    Assert::assertInstanceOf(Textarea::class, $schema['text_template']);
});

test('notification resource form schema exposes expected components', function (): void {
<<<<<<< .merge_file_YfmPFQ
    $schema = TestCase::assertNotifyArray(NotificationResource::getFormSchema());
=======
<<<<<<< .merge_file_lOCTLn
    $schema = \assertNotifyArray(NotificationResource::getFormSchema());
=======
<<<<<<< .merge_file_wclOVb
    $schema = \assertNotifyArray(NotificationResource::getFormSchema());
=======
    $schema = XotBasePest::assertArray(NotificationResource::getFormSchemaOld());
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w
>>>>>>> .merge_file_rkU5Lb

    Assert::assertArrayHasKey('type', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['type']);
    Assert::assertArrayHasKey('data', $schema);
    Assert::assertInstanceOf(Textarea::class, $schema['data']);
    Assert::assertArrayHasKey('read_at', $schema);
    Assert::assertInstanceOf(DateTimePicker::class, $schema['read_at']);
});

test('notification template resource form schema and pages are configured', function (): void {
<<<<<<< .merge_file_YfmPFQ
    $schema = TestCase::assertNotifyArray(NotificationTemplateResource::getFormSchema());
    $pages = TestCase::assertNotifyArray(NotificationTemplateResource::getPages());
=======
<<<<<<< .merge_file_lOCTLn
    $schema = \assertNotifyArray(NotificationTemplateResource::getFormSchema());
    $pages = \assertNotifyArray(NotificationTemplateResource::getPages());
=======
<<<<<<< .merge_file_wclOVb
    $schema = \assertNotifyArray(NotificationTemplateResource::getFormSchema());
    $pages = \assertNotifyArray(NotificationTemplateResource::getPages());
=======
    $schema = XotBasePest::assertArray(NotificationTemplateResource::getFormSchemaOld());
    $pages = XotBasePest::assertArray(NotificationTemplateResource::getPages());
>>>>>>> .merge_file_VO1WKY
>>>>>>> .merge_file_xwKl6w
>>>>>>> .merge_file_rkU5Lb

    Assert::assertArrayHasKey('name', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['name']);
    Assert::assertArrayHasKey('type', $schema);
    Assert::assertInstanceOf(Select::class, $schema['type']);
    Assert::assertArrayHasKey('attachments', $schema);
    Assert::assertInstanceOf(SpatieMediaLibraryFileUpload::class, $schema['attachments']);
    Assert::assertArrayHasKey('preview', $pages);
});

test('preview notification template page exposes title and subheading', function (): void {
    $page = makePreviewNotificationTemplateTestProxy();

    Assert::assertNotSame('', $page->getTitle());
    Assert::assertNotSame('', $page->getSubheading());
});
<<<<<<< .merge_file_wclOVb

=======
>>>>>>> .merge_file_VO1WKY
