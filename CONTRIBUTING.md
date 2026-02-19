# CONTRIBUTING

## Frontend-Regeln (PHP-first)

Dieses Projekt ist **PHP-first**. Frontend-Logik wird nur so komplex wie nötig umgesetzt.

## Entscheidungsreihenfolge

Bei neuen Features immer in dieser Reihenfolge prüfen:

1. **PHP/HTML**
2. **Vanilla JavaScript**

Wenn **PHP/HTML** oder **Vanilla JavaScript** sauber ausreichen, wird keine zusätzliche Frontend-Bibliothek eingeführt.

## Wann was verwenden?

### 1) PHP/HTML verwenden (Standard)

Verwenden, wenn:

- Inhalte serverseitig gerendert werden können
- Interaktion gering ist
- Ein Seiten-Reload fachlich in Ordnung ist

Typische Beispiele:

- Listen- und Detailansichten
- Klassische Formulare mit Submit
- Statische Informationsseiten

### 2) Vanilla JavaScript verwenden

Verwenden, wenn:

- kleine Interaktionen ohne Build-Tool nötig sind
- nur wenige UI-Zustände verwaltet werden
- einfache DOM-Updates reichen

Typische Beispiele:

- Dropdown/Accordion/Modal-Toggle
- einfache Filter/Sortierung im Browser
- kleine dynamische Bereiche

## Team-Regeln

- Standard ist **PHP + Bootstrap**.
- Kein NPM/Vite-Zwang für normale Seiten.
- Lokale Vendor-Assets bleiben unter `public/vendor`.

## Mini-Checkliste vor JavaScript

Vor zusätzlichem JavaScript kurz prüfen:

- Reicht serverseitiges Rendering in PHP aus?
- Brauche ich wirklich Interaktion ohne Seiten-Reload?
- Kann die Funktion klein und ohne Build-Tool umgesetzt werden?

## Aktueller Projekt-Setup-Hinweis

- Bootstrap lokal: `public/vendor/bootstrap`
- Projekt-Assets: `public/assets`
