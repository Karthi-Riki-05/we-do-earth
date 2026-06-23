# WeDoEarth — Web (Next.js)

Production application for WeDoEarth. The prototype lives in `../project/*.dc.html` and is the
visual reference. See [`../PRODUCTION_ROADMAP.md`](../PRODUCTION_ROADMAP.md) for the phase plan.

## Stack
- **Next.js 15** (App Router, TypeScript)
- **Prisma** + **PostgreSQL** (`leads` table)
- **Zod** validation (strict; Indian +91 phone normalization)
- **Resend** for broker/admin lead notifications
- Branding via `src/app/globals.css` design tokens + `next/font` (Space Grotesk, IBM Plex Sans/Mono)

## Setup
```bash
cp .env.example .env     # fill DATABASE_URL + RESEND_* values
npm install
npm run db:migrate       # apply schema to Postgres
npm run dev              # http://localhost:3000
```

## Lead capture API
`POST /api/leads` — Content-Type `application/json`

| Field | Required | Notes |
|---|---|---|
| `name` | ✅ | 2–120 chars |
| `phone` | ✅ | normalized to `+91XXXXXXXXXX`; must start 6–9 |
| `projectSlug` | ✅ | lowercase/dashes, e.g. `kudil` |
| `consent` | ✅ | must be `true` (DPDP) |
| `unit`, `purpose`, `budget`, `timeline`, `message` | — | optional; selects map to enums |

Responses: `201` ok · `422` validation (`{ fields }`) · `400` bad JSON · `500` DB error.
Email failure is logged but does **not** fail the request (`notified: false`).

## Project layout
```
src/
  app/
    layout.tsx          # fonts + metadata
    page.tsx            # placeholder landing (Phase 2 replaces with migrated Home)
    globals.css         # design tokens
    api/leads/route.ts  # lead capture handler
  lib/
    db.ts               # Prisma client singleton
    validation.ts       # Zod schema + phone normalization
    email.ts            # Resend notification
prisma/
  schema.prisma         # leads table + enums
```
