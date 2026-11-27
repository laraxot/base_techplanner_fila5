---
title: "Contratto — CheckMailDnsAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\CheckMailDnsAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, dns, verifica]
created: 2026-11-26
updated: 2026-11-26
---

# CheckMailDnsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/CheckMailDnsAction.php`. Verifica read-only dei record DNS
che un provider email chiede (CNAME per SPF/DKIM/tracking + DMARC TXT). Cattura il caso
classico del target CNAME senza punto finale.

## Input

- `string $domain`: dominio da controllare.
- `array<string, string> $expectedCnames`: `label.rispetto-al-dominio => target atteso`.
- `?Closure $resolver`: `(name, 'CNAME'|'TXT') => list<string>`; `null` = DNS di sistema.

## Output

- `list<DnsResult>`: una riga per CNAME in ordine di input, poi la riga DMARC. Ogni riga ha
  `record`, `expected`, `found`, `ok`, `hint` (`missing|missing-trailing-dot|wrong-target|null`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-DNS-INV-1 | Confronto case-insensitive e senza punto finale (`normalize` su entrambi i lati). | NOTIFY-DNS-INV-1 |
| NOTIFY-DNS-INV-2 | `hint = missing-trailing-dot` quando il target atteso risulta `<target>.<zone>`: e' il bug del punto finale mancante. | NOTIFY-DNS-INV-2 |
| NOTIFY-DNS-INV-3 | La riga DMARC (`_dmarc.<domain>`, TXT con prefisso `v=dmarc1`) e' sempre l'ultima, con `expected='v=DMARC1'` e `hint='missing'` se assente. Limite noto: il test non verifica il campo `expected`. | NOTIFY-DNS-INV-3 |
| NOTIFY-DNS-INV-4 | Errori di risoluzione DNS (`NetworkException`) diventano lista vuota → `found=null`, mai eccezione. | — (non dimostrato) |

## Effetti collaterali

- Query DNS verso il resolver di sistema (o il closure iniettato). Nessuna scrittura.

## Errori

- Nessuna eccezione: i fallimenti di rete sono normalizzati a "non trovato".

## Non fa

- Non crea/modifica record DNS: e' solo verifica.
- Non testa la deliverability: controlla solo i record dichiarati in input.
