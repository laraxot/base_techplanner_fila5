<?php

declare(strict_types=1);

?>
@php
    $mapId = 'client-map-'.\Illuminate\Support\Str::random(8);
@endphp

<div
    class="client-map-widget"
    data-map-id="{{ $mapId }}"
    wire:ignore
>
    <link rel="stylesheet" href="{{ $asset_base }}/leaflet.css">
    <style>
        .client-map-marker-dot {
            display: block;
            width: 14px;
            height: 14px;
            border-radius: 9999px;
            background: #2563eb;
            border: 2px solid #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
        }
        .client-map-origin-dot {
            display: block;
            width: 18px;
            height: 18px;
            border-radius: 9999px;
            background: #dc2626;
            border: 3px solid #fff;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.5);
        }
    </style>
    <div
        id="{{ $mapId }}"
        role="region"
        aria-label="{{ __('techplanner::client.map.aria_label') }}"
        tabindex="0"
        style="height: 420px; width: 100%; border-radius: 0.5rem;"
    ></div>
    <div class="text-xs text-gray-500 mt-2">
        {{ trans('techplanner::client.map.markers_shown', ['count' => count($markers)]) }}
    </div>
</div>

@script
<script>
    const clientMapId = @js($mapId);
    const clientMapMarkers = @js($markers);
    const clientMapOrigin = @js($origin);
    const clientMapAssetBase = @js($asset_base);

    window.clientMapEscape = function (value) {
        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    };

    window.clientMapSetOrigin = function (clientId) {
        $wire.setDistanceOrigin(clientId);
    };

    function initClientMap() {
        const el = document.getElementById(clientMapId);
        if (!el || typeof L === 'undefined') {
            return false;
        }
        if (el.dataset.clientMapReady === '1') {
            return true;
        }
        el.dataset.clientMapReady = '1';

        const map = L.map(el, { scrollWheelZoom: false });
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors',
        }).addTo(map);

        const bounds = [];
        const validMarkers = clientMapMarkers.filter((m) =>
            m.latitude !== null && m.longitude !== null &&
            isFinite(m.latitude) && isFinite(m.longitude)
        );

        validMarkers.forEach((marker) => {
            const icon = L.divIcon({
                className: 'client-map-marker',
                html: '<span class="client-map-marker-dot"></span>',
                iconSize: [14, 14],
                iconAnchor: [7, 7],
            });

            const clientMarker = L.marker([marker.latitude, marker.longitude], { icon })
                .addTo(map);
            bounds.push([marker.latitude, marker.longitude]);

            const rows = [
                marker.address ? `<div>${window.clientMapEscape(marker.address)}</div>` : '',
                marker.phone ? `<div><a href="tel:${window.clientMapEscape(marker.phone)}">${window.clientMapEscape(marker.phone)}</a></div>` : '',
            ].join('');

            clientMarker.bindPopup(`
                <div class="client-map-popup" style="min-width: 200px;">
                    <strong>${window.clientMapEscape(marker.label)}</strong>
                    ${rows}
                    <div style="margin-top: 6px; display: flex; gap: 6px; flex-wrap: wrap;">
                        <a class="fi-btn fi-btn-color-gray fi-btn-size-sm" href="${window.clientMapEscape(marker.view_url)}">
                            {{ trans('filament-actions::modal.view.actions.view.label') }}
                        </a>
                        <a class="fi-btn fi-btn-color-gray fi-btn-size-sm" href="${window.clientMapEscape(marker.edit_url)}">
                            {{ trans('filament-actions::modal.edit.actions.edit.label') }}
                        </a>
                        <button type="button" class="fi-btn fi-btn-color-primary fi-btn-size-sm"
                                onclick="clientMapSetOrigin(${Number(marker.id)})">
                            {{ trans('techplanner::client.map.set_origin') }}
                        </button>
                    </div>
                </div>
            `);
        });

        if (clientMapOrigin.latitude !== null && clientMapOrigin.longitude !== null &&
            isFinite(clientMapOrigin.latitude) && isFinite(clientMapOrigin.longitude)) {
            L.marker([clientMapOrigin.latitude, clientMapOrigin.longitude], {
                icon: L.divIcon({
                    className: 'client-map-origin-marker',
                    html: '<span class="client-map-origin-dot"></span>',
                    iconSize: [18, 18],
                    iconAnchor: [9, 9],
                }),
            }).addTo(map)
                .bindPopup({ content: @js(trans('techplanner::client.map.origin_popup')) });
            bounds.push([clientMapOrigin.latitude, clientMapOrigin.longitude]);
        }

        if (bounds.length === 1) {
            map.setView(bounds[0], 14);
        } else if (bounds.length > 1) {
            map.fitBounds(bounds, { padding: [30, 30], maxZoom: 13 });
        } else {
            map.setView([41.8719, 12.5674], 6);
        }

        return true;
    }

    if (typeof L === 'undefined' && !document.querySelector('script[data-client-map-leaflet]')) {
        const script = document.createElement('script');
        script.src = `${clientMapAssetBase}/leaflet.js`;
        script.dataset.clientMapLeaflet = '1';
        script.onload = () => initClientMap();
        document.body.appendChild(script);
    } else if (typeof L !== 'undefined') {
        initClientMap();
    }
</script>
@endscript
