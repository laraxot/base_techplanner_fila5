<?php

declare(strict_types=1);

namespace Themes\Sixteen\Services;

use DOMDocument;
use DOMXPath;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;

/**
 * Servizio per l'autenticazione SPID
 *
 * Implementa il protocollo SAML 2.0 per l'integrazione con i provider SPID
 * secondo le specifiche AGID per l'autenticazione nelle PA
 */
class SpidAuthService
{
    protected array $providers = [];

    protected string $entityId;

    protected string $assertionConsumerServiceUrl;

    protected string $singleLogoutServiceUrl;

    public function __construct()
    {
        $this->entityId = config('spid.entity_id', config('app.url'));
        $this->assertionConsumerServiceUrl = route('spid.callback');
        $this->singleLogoutServiceUrl = route('spid.slo');
        $this->loadProviders();
    }

    /**
Session::put('spid.return_url', $returnUrl ? $returnUrl : url()->previous());
        Session::put('spid.auth_level', $level);

        $samlRequest = $this->buildSamlAuthRequest($requestId, $providerConfig, $level);
        $encodedRequest = base64_encode(gzdeflate($samlRequest));

        return $providerConfig['sso_url'].'?'.http_build_query([
            'SAMLRequest' => $encodedRequest,
            'RelayState' => $requestId,
        ]);
    }

    /**
     * Genera l'URL di logout SPID
     */
    public function getLogoutUrl(string $provider, string $nameId, string $sessionIndex): string
    {
        if (! isset($this->providers[$provider])) {
            throw new InvalidArgumentException("Provider SPID '{$provider}' non supportato");
            throw new InvalidArgumentException("Provider SPID '{$provider}' non supportato");
        }

        $providerConfig = $this->providers[$provider];
        $requestId = $this->generateRequestId();

        Session::put('spid.logout_request_id', $requestId);

        $samlLogoutRequest = $this->buildSamlLogoutRequest($requestId, $nameId, $sessionIndex, $providerConfig);
        $encodedRequest = base64_encode(gzdeflate($samlLogoutRequest));

        return $providerConfig['slo_url'].'?'.http_build_query([
            'SAMLRequest' => $encodedRequest,
            'RelayState' => $requestId,
        ]);
    }

    /**
     * Processa la response SAML dal provider SPID
     */
    public function processCallback(Request $request): array
    {
        $samlResponse = $request->input('SAMLResponse');
        $relayState = $request->input('RelayState');

        if (! $samlResponse) {
            throw new Exception('SAMLResponse mancante');
        }

        if (! $relayState || $relayState !== Session::get('spid.request_id')) {
            throw new Exception('RelayState non valido');
        }

        $decodedResponse = base64_decode($samlResponse);
$responseDoc = new DOMDocument();
        $responseDoc->loadXML($decodedResponse);

        // Valida la signature
        $this->validateSamlResponse($responseDoc);

        // Estrai gli attributi utente
        $attributes = $this->extractUserAttributes($responseDoc);

        // Log dell'autenticazione riuscita
        Log::info('SPID authentication successful', [
            'provider' => Session::get('spid.provider'),
            'user_attributes' => $attributes,
        ]);

        return $attributes;
    }

    /**
     * Genera il metadata SAML per il Service Provider
     */
    public function getMetadata(): string
    {
        $metadata = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        $metadata .= '<md:EntityDescriptor xmlns:md="urn:oasis:names:tc:SAML:2.0:metadata"'.PHP_EOL;
        $metadata .= '                     entityID="'.htmlspecialchars($this->entityId).'">'.PHP_EOL;

        $metadata .= '  <md:SPSSODescriptor AuthnRequestsSigned="true"'.PHP_EOL;
        $metadata .= '                      WantAssertionsSigned="true"'.PHP_EOL;
        $metadata .= '                      protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">'.PHP_EOL;

        // KeyDescriptor per signing
        $metadata .= '    <md:KeyDescriptor use="signing">'.PHP_EOL;
        $metadata .= '      <ds:KeyInfo xmlns:ds="http://www.w3.org/2000/09/xmldsig#">'.PHP_EOL;
        $metadata .= '        <ds:X509Data>'.PHP_EOL;
        $metadata .= '          <ds:X509Certificate>'.$this->getSigningCertificate().'</ds:X509Certificate>'.PHP_EOL;
        $metadata .= '        </ds:X509Data>'.PHP_EOL;
        $metadata .= '      </ds:KeyInfo>'.PHP_EOL;
        $metadata .= '    </md:KeyDescriptor>'.PHP_EOL;

        // Assertion Consumer Service
        $metadata .= '    <md:AssertionConsumerService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST"'.PHP_EOL;
        $metadata .= '                                 Location="'.htmlspecialchars($this->assertionConsumerServiceUrl).'"'.PHP_EOL;
        $metadata .= '                                 index="0" isDefault="true"/>'.PHP_EOL;

        // Single Logout Service
        $metadata .= '    <md:SingleLogoutService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST"'.PHP_EOL;
        $metadata .= '                           Location="'.htmlspecialchars($this->singleLogoutServiceUrl).'"/>'.PHP_EOL;

        // Attribute consuming service con gli attributi SPID
        $metadata .= '    <md:AttributeConsumingService index="0">'.PHP_EOL;
        $metadata .= '      <md:ServiceName xml:lang="it">'.config('app.name').'</md:ServiceName>'.PHP_EOL;

        $spidAttributes = [
            'spidCode', 'name', 'familyName', 'placeOfBirth', 'countyOfBirth',
            'dateOfBirth', 'gender', 'companyName', 'registeredOffice',
            'fiscalNumber', 'ivaCode', 'idCard', 'mobilePhone', 'email',
            'address', 'digitalAddress',
        ];

        foreach ($spidAttributes as $attr) {
            $metadata .= '      <md:RequestedAttribute Name="'.$attr.'" NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:basic"/>'.PHP_EOL;
        }

        $metadata .= '    </md:AttributeConsumingService>'.PHP_EOL;
        $metadata .= '  </md:SPSSODescriptor>'.PHP_EOL;
        $metadata .= '</md:EntityDescriptor>'.PHP_EOL;

        return $metadata;
    }

    /**
* Verifica se l'utente è autenticato con SPID
     */
    public function isAuthenticated(): bool
    {
        return Session::has('spid.authenticated') && Session::get('spid.authenticated') === true;
    }

    /**
     * Ottiene i dati dell'utente autenticato
     */
    public function getAuthenticatedUser(): ?array
    {
        if (! $this->isAuthenticated()) {
            return null;
        }

        return Session::get('spid.user_data');
    }

    /**
     * Effettua il logout dell'utente SPID
     */
    public function logout(): void
    {
        Session::forget([
            'spid.authenticated',
            'spid.user_data',
            'spid.provider',
            'spid.request_id',
            'spid.auth_level',
        ]);
    }

    /**
     * Carica la configurazione dei provider SPID
     */
    protected function loadProviders(): void
    {
        $this->providers = config('spid.providers', [
            'poste' => [
                'name' => 'Poste Italiane',
                'entityId' => 'https://posteid.poste.it',
                'sso_url' => 'https://posteid.poste.it/jod-fs/ssoservicepost',
                'slo_url' => 'https://posteid.poste.it/jod-fs/sloservicepost',
                'cert' => 'poste.crt',
                'logo' => 'poste-logo.svg',
            ],
            'sielte' => [
                'name' => 'Sielte',
                'entityId' => 'https://identity.sieltecloud.it',
                'sso_url' => 'https://identity.sieltecloud.it/simplesaml/saml2/idp/SSOService.php',
                'slo_url' => 'https://identity.sieltecloud.it/simplesaml/saml2/idp/SingleLogoutService.php',
                'cert' => 'sielte.crt',
                'logo' => 'sielte-logo.svg',
            ],
            'tim' => [
                'name' => 'TIM Trust Technologies',
                'entityId' => 'https://login.id.tim.it/affwebservices/public/saml2sso',
                'sso_url' => 'https://login.id.tim.it/affwebservices/public/saml2sso',
                'slo_url' => 'https://login.id.tim.it/affwebservices/public/saml2slo',
                'cert' => 'tim.crt',
                'logo' => 'tim-logo.svg',
            ],
        ]);
    }

    /**
}
