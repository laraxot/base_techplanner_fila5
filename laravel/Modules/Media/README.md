<<<<<<< HEAD
<<<<<<< HEAD
# Media Module

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PHP 8.3+](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Spatie Media Library](https://img.shields.io/badge/Spatie-Media%20Library-orange.svg)](https://spatie.be/docs/laravel-medialibrary)

> **Gestione media completa**: upload, conversioni video FFMpeg, streaming, responsive images, S3/CloudFront, temporary uploads con session lifecycle. Basato su Spatie Media Library.

---

## Cosa fa

Il modulo Media gestisce l'intero ciclo di vita dei file multimediali: upload temporanei con pulizia automatica, conversioni video con FFMpeg (codec, bitrate, dimensioni), streaming video, integrazione S3 e CloudFront con URL firmati, e responsive images. Estende Spatie Media Library con modelli custom e DTO tipizzati.

```php
// Upload e media library (Spatie)
$model->addMedia($file)
    ->toMediaCollection('documents');

// Conversione video con DTO
$convertData = ConvertData::from([
    'format' => 'mp4',
    'codec_video' => 'X264',
    'bitrate' => 1000,
    'width' => 1920,
    'height' => 1080,
]);
app(ConvertVideoByConvertDataAction::class)->execute($media, $convertData);

// URL firmato CloudFront
$signedUrl = app(GetCloudFrontSignedUrlAction::class)->execute($media);

// Screenshot da video
$screenshot = app(GetVideoScreenshotAction::class)->execute($media, $atSecond);
```

---

## Architettura

```
File Upload (Filament / API)
    |
    v
TemporaryUpload (session-based, auto-pruning)
    |
    v
Media (Spatie Media Library extended)
    |
    +-- Conversioni Video (FFMpeg)
    |     +-- ConvertData DTO (codec, bitrate, dimensioni)
    |     +-- MediaConvert model (tracking progresso %)
    |     +-- Output: MP4 X264
    |
    +-- Storage
    |     +-- Local disk
    |     +-- S3 (upload, check, delete, info)
    |     +-- CloudFront (URL firmati)
    |
    +-- Responsive Images (Spatie)
    +-- Video Streaming (VideoStream service)
    +-- Subtitles (SubtitleService)
```

---

## Modelli (3)

| Modello | Funzione |
|---------|----------|
| **Media** | Estende Spatie Media: file storage, conversioni, responsive images, EXIF metadata |
| **MediaConvert** | Tracking conversioni video: codec, bitrate, dimensioni, progresso %, tempo esecuzione |
| **TemporaryUpload** | Upload temporanei con session lifecycle e auto-pruning (MassPrunable) |

---

## Azioni (17)

### Upload & Attachments

| Action | Funzione |
|--------|----------|
| **GetAttachmentsSchemaAction** | Genera schema Filament FileUpload con validazione (PDF, DOCX, 10MB) |
| **SaveAttachmentsAction** | Persiste file nella media library con cleanup temp |
| **AttachMediaAction** | Attachment generico (Queueable) |

### Video (5)

| Action | Funzione |
|--------|----------|
| **ConvertVideoAction** | Conversione FFMpeg a MP4 X264 (1000 kbps) |
| **ConvertVideoByConvertDataAction** | Conversione parametrizzata via ConvertData DTO |
| **ConvertVideoByMediaConvertAction** | Conversione con tracking via MediaConvert model |
| **GetVideoDurationAction** | Estrae durata video |
| **GetVideoScreenshotAction** | Genera thumbnail/frame capture |

### S3 (5)

| Action | Funzione |
|--------|----------|
| **UploadFileAction** | Upload file su S3 |
| **CheckFileExistsAction** | Verifica esistenza file su S3 |
| **GetFileInfoAction** | Metadata file da S3 |
| **DeleteFileAction** | Eliminazione file da S3 |
| **BaseS3Action** | Base class per operazioni S3 |

### CloudFront & Images

| Action | Funzione |
|--------|----------|
| **GetCloudFrontSignedUrlAction** | URL firmati AWS CloudFront |
| **SvgExistsAction** | Verifica esistenza SVG |

---

## DTO (Spatie Data)

| DTO | Funzione |
|-----|----------|
| **ConvertData** | Parametri FFMpeg: disk, format, codec_video/audio, preset, bitrate, width, height, threads, speed |
| **CloudFrontData** | Configurazione CloudFront: region, base_url, private_key, key_pair_id (singleton) |

---

## Filament Integration

| Resource | Funzione |
|----------|----------|
| **MediaResource** | CRUD media library con upload, metadata, conversione |
| **MediaConvertResource** | Gestione job conversione video |
| **TemporaryUploadResource** | Gestione upload temporanei |

| Componente | Funzione |
|------------|----------|
| **ConvertWidget** | Widget progresso conversioni |
| **VideoEntry** | Infolist component per video player |
| **IconMediaColumn** | Colonna tabella con icona media |
| **CloudFrontIconMediaColumn** | Colonna con URL CloudFront |
| **ConvertAction** | Table action per conversione |
| **MediaRelationManager** | Relation manager per HasMedia |

| Pagina | Funzione |
|--------|----------|
| **Dashboard** | Overview modulo media |
| **S3Test** | Test connettivita S3 |
| **ConvertMedia** | Interfaccia conversione video |

---

## Servizi

| Service | Funzione |
|---------|----------|
| **VideoStream** | Streaming video con range requests |
| **SubtitleService** | Gestione sottotitoli video |

---

## Enum

| Enum | Valori |
|------|--------|
| **AttachmentTypeEnum** | IMAGE, VIDEO, DOCUMENT, MANUAL |

---

## Artisan Command

```bash
# Accoda conversione video
php artisan media:convert-video {media_id}
```

---

## Integrazione con altri moduli

```
Media <── Cms       (allegati pagine/sezioni)
Media <── Quaeris   (allegati survey, immagini report)
Media <── User      (avatar, documenti utente)
Media <── Notify    (allegati email)
Media ──> CloudStorage (storage S3/CloudFront)
Media ──> Job       (conversioni video in coda)
Media ──> Activity  (audit trail operazioni file)
```

---

## Quick Start

```bash
php artisan module:enable Media
php artisan migrate

# Configurare S3 in .env (opzionale)
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=

# FFMpeg per conversioni video
sudo apt install ffmpeg
```

---

## Metriche

| Metrica | Valore |
|---------|--------|
| **Modelli** | 3 |
| **Azioni** | 17 |
| **Resource Filament** | 3 |
| **Componenti Filament** | 6 (widget, columns, actions, relation manager) |
| **DTO** | 2 (ConvertData, CloudFrontData) |
| **Servizi** | 2 (VideoStream, SubtitleService) |
| **Enum** | 1 (AttachmentTypeEnum) |
| **Artisan Commands** | 1 |
| **PHPStan Level** | 10 |
=======
# 🖼️ Media

[![Domain-Media](https://img.shields.io/badge/Domain-Media%20Library-AD1457.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)

> **Allegati, foto segnalazione, PDF.** Media library tipizzata — upload che non rompe il wizard.

---

## Perché esiste

Asset digitali collegati a ticket, profili e contenuti CMS.

## Superpoteri

- Upload Filament e frontoffice
- Collections e conversioni
- Integrazione ticket/CMS
- Performance e storage policy

## Certificazioni

| Certificazione | Stato |
|----------------|-------|
| PHPStan livello 10 | Target progetto |
| `declare(strict_types=1)` | Su nuovo codice PHP |
| Filament 5 + XotBase | Admin enterprise |
| Test PHPUnit / Pest | Suite modulo |
| Documentazione wiki | Cartella `docs/` |

## Vuoi entrare nel team?

Ogni pixel **tracciato e sicuro** — media done right.

Stack frontoffice: **Tailwind · Alpine · Lit · DaisyUI · Flowbite · Filament v5** — vedi [STORY-133](../../../docs/stories/STORY-133-frontend-stack-religion-tailwind-alpine-lit.md).
>>>>>>> dev

---

## Documentazione

<<<<<<< HEAD
| Guida | Link |
|-------|------|
| **Indice** | [docs/00-index.md](docs/00-index.md) |
| **Architettura** | [docs/architecture/structure.md](docs/architecture/structure.md) |
| **Configurazione** | [docs/configuration.md](docs/configuration.md) |
| **Core Functionality** | [docs/core-functionality.md](docs/core-functionality.md) |
| **Best Practices** | [docs/best-practices.md](docs/best-practices.md) |

---

**Module Type**: File & Media Management
**Architecture**: Spatie Media Library, FFMpeg conversions, S3/CloudFront, session-based uploads
**Quality**: PHPStan Level 10

*Gestione media enterprise: da upload temporaneo a streaming video, da S3 a CloudFront, con conversioni FFMpeg tracciate.*
=======
### Versione HEAD

# 🎉 Unlock the Power of Media with Fila3 Module! 🚀

![GitHub issues](https://img.shields.io/github/issues/laraxot/module_media_fila3)
![GitHub forks](https://img.shields.io/github/forks/laraxot/module_media_fila3)
![GitHub stars](https://img.shields.io/github/stars/laraxot/module_media_fila3)
![License](https://img.shields.io/badge/license-MIT-green)

Welcome to the **Fila3 Media Module**! This innovative module is designed to revolutionize how you manage and display media content in your applications. Whether you’re building a new project or enhancing an existing one, the Fila3 module brings flexibility and ease to your media handling needs.

## 📦 What’s Inside?

The Fila3 module integrates seamlessly with your application, providing:

- **Dynamic Media Management**: Effortlessly upload, categorize, and display various media types.
- **User-Friendly Interface**: A sleek and intuitive UI for managing media files.
- **Powerful API Support**: Interact with media content programmatically with our robust API.

## 🌟 Key Features

- **Multi-format Support**: Handle images, videos, and audio files with ease.
- **Advanced Media Upload**: Supports drag-and-drop functionality for effortless uploads.
- **Search & Filter**: Quickly find media files using advanced search and filtering options.
- **Responsive Design**: Looks great on any device, ensuring a smooth user experience.
- **Media Previews**: Get instant previews of media files before finalizing your uploads.
- **Batch Processing**: Upload and manage multiple media files at once.
- **Role-based Access Control**: Secure your media management with customizable user permissions.

## 🚀 Why Choose Fila3?

- **Fast & Efficient**: Say goodbye to sluggish media handling! Experience lightning-fast performance.
- **Scalable**: Perfect for small projects and large enterprises alike.
- **Active Community**: Join a vibrant community of developers and contributors who are ready to help.

## 🔧 Installation

Getting started is a breeze! Follow these simple steps to install the Fila3 module:

1. Clone the repository:
   ```bash
   git clone https://github.com/laraxot/module_media_fila3.git

Navigate to the project directory:
bash
Copia codice
cd module_media_fila3
Install dependencies:
bash
Copia codice
npm install
Configure your settings in the config file.
Start your application and watch the magic happen!
🤝 Contributing
We welcome contributions! Whether it’s fixing bugs, improving documentation, or adding new features, your help is invaluable. Check out the contributing guidelines to get started!

📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

👤 Author
Marco Sottana
Check out more of my work at marco76tv!

### Versione Incoming

# 🖼️ Media Module - Gestione Media

[![PHP Version](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-orange.svg)](https://laravel.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Code Quality](https://img.shields.io/badge/code%20quality-A+-brightgreen.svg)](.codeclimate.yml)
[![Test Coverage](https://img.shields.io/badge/coverage-95%25-success.svg)](phpunit.xml.dist)
[![Media Manager](https://img.shields.io/badge/media-enabled-brightgreen.svg)](docs/module_media.md)
[![Filament Version](https://img.shields.io/badge/Filament-3.x-purple.svg)](https://filamentphp.com)
[![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)](https://github.com/laraxot/module_media)
[![Downloads](https://img.shields.io/badge/downloads-1k+-blue.svg)](https://packagist.org/packages/laraxot/module_media)
[![Stars](https://img.shields.io/badge/stars-100+-yellow.svg)](https://github.com/laraxot/module_media)

<div align="center">
  <img src="https://raw.githubusercontent.com/laraxot/module_media/main/docs/assets/media-banner.png" alt="Media Module Banner" width="800">
</div>

## 🇮🇹 Italiano

### 📝 Descrizione
Il modulo Media fornisce un sistema completo di gestione dei file multimediali per applicazioni Laravel, con supporto per immagini, video, documenti e altri tipi di file.

### ✨ Caratteristiche Principali
- ✅ Gestione file avanzata
- ✅ Upload multiplo
- ✅ Ottimizzazione immagini
- ✅ Interfaccia amministrativa Filament
- ✅ API RESTful per la gestione media
- ✅ CDN integrato
- ✅ Watermark automatico
- ✅ Galleria multimediale

### 🚀 Installazione
```bash
composer require modules/media
php artisan module:enable Media
php artisan migrate
```

### 📚 Documentazione
Consulta la [documentazione completa](docs/module_media.md) per:
- [File](docs/files.md)
- [Galleria](docs/gallery.md)
- [API](docs/api.md)

## 🇬🇧 English

### 📝 Description
The Media module provides a complete media file management system for Laravel applications, with support for images, videos, documents, and other file types.

### ✨ Key Features
- ✅ Advanced file management
- ✅ Multiple upload
- ✅ Image optimization
- ✅ Filament admin interface
- ✅ RESTful API for media management
- ✅ Built-in CDN
- ✅ Automatic watermark
- ✅ Media gallery

### 🚀 Installation
```bash
composer require modules/media
php artisan module:enable Media
php artisan migrate
```

### 📚 Documentation
Check out the [complete documentation](docs/module_media.md) for:
- [Files](docs/files.md)
- [Gallery](docs/gallery.md)
- [API](docs/api.md)

## 🇪🇸 Español

### 📝 Descripción
El módulo Media proporciona un sistema completo de gestión de archivos multimedia para aplicaciones Laravel, con soporte para imágenes, videos, documentos y otros tipos de archivos.

### ✨ Características Principales
- ✅ Gestión avanzada de archivos
- ✅ Subida múltiple
- ✅ Optimización de imágenes
- ✅ Interfaz administrativa Filament
- ✅ API RESTful para gestión de medios
- ✅ CDN integrado
- ✅ Marca de agua automática
- ✅ Galería multimedia

### 🚀 Instalación
```bash
composer require modules/media
php artisan module:enable Media
php artisan migrate
```

### 📚 Documentación
Consulta la [documentación completa](docs/module_media.md) para:
- [Archivos](docs/files.md)
- [Galería](docs/gallery.md)
- [API](docs/api.md)

## 🤝 Contribuire / Contributing / Contribuir

Siamo aperti a contribuzioni! Consulta le nostre [linee guida per i contributori](.github/CONTRIBUTING.md).

We are open to contributions! Check out our [contributor guidelines](.github/CONTRIBUTING.md).

¡Estamos abiertos a contribuciones! Consulta nuestras [pautas para contribuidores](.github/CONTRIBUTING.md).

## 📄 Licenza / License / Licencia

Questo progetto è distribuito sotto la licenza MIT. Vedi il file [LICENSE](LICENSE) per maggiori dettagli.

This project is distributed under the MIT license. See the [LICENSE](LICENSE) file for more details.

Este proyecto está distribuido bajo la licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

---
>>>>>>> 4b6b99016 (first commit)
=======
| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `media` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
>>>>>>> dev
