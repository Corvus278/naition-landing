# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

A single-page PHP landing (fake "first aid course" offer) used as a bootcamp exercise: students edit copy/design to
improve conversion, an external simulator generates fake visits/submissions, and Yandex.Metrika (Webvisor counter id
`110974111`, hardcoded in `index.php`) is used to analyze behavior. There is no framework, build step, package manager,
or test suite — plain PHP 8.3 + vanilla JS/CSS.

## Running locally

```bash
php -S 127.0.0.1:8765
curl http://127.0.0.1:8765/api/init.php   # creates/migrates data/app.db (SQLite)
```

Docker: `Dockerfile` builds on `php:8.3-apache` with `pdo_sqlite`, copies the repo to `/var/www/html`, and creates
`data/` owned by `www-data`.

No lint/test/build commands exist in this repo.

## Architecture

- `index.php` — the entire landing page (hero, program, pricing, registration form). Loads `api/visit.php` as a
  `<script>` in `<head>` and `js/main.js` before `</body>`.
- `api/db.php` — shared PDO/SQLite layer. `getPdo()` opens `data/app.db` (WAL mode). `ensureDatabaseReady()` runs
  `sql/schema.sql` (idempotent `CREATE TABLE IF NOT EXISTS`) then a one-off migration that drops the legacy
  `bot_session_id` column from `visits`/`orders` if present. `dbExecuteUntilSuccess()` retries on
  `SQLITE_BUSY`/"database is locked" with backoff — every write goes through it because Apache+SQLite means concurrent
  hits are expected.
- `api/visit.php` — served *as JavaScript* (`Content-Type: application/javascript`) from the `<head>` script tag; on
  load it inserts a row into `visits` and echoes `// ok`. It intentionally does nothing else (no visible behavior) so it
  can't break page rendering even if the DB write fails.
- `api/submit.php` — POST handler for the registration form (`name`, `phone`, `email`, `purpose`), validates then
  inserts into `orders`. Returns JSON `{ok, error}`; `js/main.js` submits via `fetch` and swaps in `#form-message`.
- `api/init.php` — thin wrapper that just calls `ensureDatabaseReady()`, used to bootstrap/migrate the DB (see local run
  command above).
- `api/export.php` — dumps all `visits`/`orders` as JSON; used to sanity-check conversion numbers against Metrika.
- `admin/orders.php` — session-password-gated (`FirstAid2026!`, hardcoded) view of the `orders` table.
- `sql/schema.sql` — the only source of truth for the `visits`/`orders` schema; re-run on every `ensureDatabaseReady()`
  call.

## Hard constraints (breaks the external simulator/analytics if changed)

These are enforced by an external grading/simulator tool, not by code in this repo — see `STUDENTS.md` for the
student-facing version:

- Form must stay `#registration-form` with `action="api/submit.php"`, fields named exactly `name`, `phone`, `email`,
  `purpose`.
- `<script src="api/visit.php">` must stay in `<head>`.
- CSS classes `.btn-register`, `.pricing-section`, `.program-module`, `.program-list` must stay.
- Nothing in `api/` or `sql/schema.sql` should change.
- Copy, styling, images, and in-section layout are fair game to edit.

## Data

`data/app.db` (SQLite) is gitignored — never commit it. It's created on demand by `ensureDatabaseReady()`.

## Работа с ресерчами

Все ресерчи клади в отдельную папку /docs/researches
