# WeDoEarth — Website Architecture & Build Spec

*A practical blueprint for the dev team: the site map, the project content model, the add-once → display-everywhere flow, the lead flow, and where every business line lives. Built to start with what we have (Kudil) and scale to many projects without rework.*

---

## 1. The whole site at a glance (site map)

```
wedoearth.com
│
├─ /                     Home  ........................ the pitch + signature parcel map + all business lines
│
├─ /properties           Properties hub  .............. filterable grid of ALL projects (cards from DB)
│   └─ /properties/{slug} Project sub-page  ............ one page per project (e.g. /properties/kudil-navalur)
│
├─ /verify               Verify  ...................... title-verification service + "verify a property" flow
│
├─ /manage               Manage  ...................... PropTech / tenant + rent management SaaS (lead/waitlist)
│
├─ /invest               Invest  ...................... fractional / SM-REIT (partner-led; compliance-bounded)
│
├─ /list-your-project    For builders & owners  ....... project submission + lead intake from sellers
│
├─ /about                About / vision  .............. WeDoEarth story, team, trust & compliance
│
├─ /insights             Insights (blog)  ............. SEO/AEO content: locality guides, "is title clear?" etc.
│
├─ /contact              Contact  ..................... general enquiry + office details
│
└─ (admin) /studio       Admin / CMS  ................. internal: add & edit projects, view leads (NOT public)
```

**Primary nav:** Properties · Verify · For builders · Invest · (CTA) Enquire
**Footer nav:** Platform (Properties, Verify, Manage, Invest) · Company (About, Insights, Careers, Contact) · Trust (How verification works, Compliance, Privacy/DPDP, RERA)

---

## 2. The project system (the part you asked about)

This is the engine. Add a project **once** in the admin; it appears in the Properties grid **and** gets its own sub-page automatically, with no developer involvement per project.

### 2.1 The flow

```
  ADMIN (you)                BACKEND                    FRONTEND (public)
  ───────────                ───────                    ─────────────────
  Add / edit a project  ──►  Save Project record   ──►  Card appears in /properties grid
  (form in /studio)          in database               (auto, filtered by type/status)
                                  │
  Upload photos, set       ──►   stored + slug   ──►    Sub-page /properties/{slug}
  units, price, status            generated              renders from the same record
                                  │
                                  └──────────────────►  Enquiry form on each page →
                                                         lead saved → routed to you
```

The Properties prototype already demonstrates this: the `PROJECTS` array in `properties.html` is the stand-in for the database table. Replace that array with an API call to your backend and nothing else changes.

### 2.2 Project content model (database schema)

One `projects` table (or CMS collection). Suggested fields:

| Field | Type | Notes |
|---|---|---|
| `id` | uuid | primary key |
| `slug` | string (unique) | URL: `/properties/{slug}` (e.g. `kudil-navalur`) |
| `name` | string | "Kudil" |
| `developer` | string / FK | "Natarajan Estates" (link to a `developers` table later) |
| `type` | enum | `villa` `plot` `commercial` `apartment` |
| `status` | enum | `available` `upcoming` `sold_out` `draft` |
| `verification_status` | enum | `verifying` `verified` `flagged` — drives the trust badge |
| `rera_number` | string | TNRERA reg no. — display when present (required for trust + compliance) |
| `location` | object | locality, city, lat/lng, road, pincode |
| `summary` | text | one-paragraph pitch |
| `description` | rich text | long copy (courtyard concept, etc.) |
| `price_from` | number + display | "₹2.45 Cr" + numeric for sorting/filtering |
| `price_note` | string | "before GST & registration" |
| `configs` | array | e.g. 3 BHK / 4 BHK with carpet, built-up, baths |
| `amenities` | array | clubhouse, pool, parks… |
| `specifications` | array/object | structure, flooring, sanitary, electrical… |
| `location_highlights` | array | schools, hospitals, connectivity, lifestyle |
| `payment_schedule` | array | milestone, % , amount |
| `media` | array | images/renders/video URLs (+ alt text for SEO) |
| `documents` | array | brochure, approvals (gated/internal as needed) |
| `seo` | object | meta title, description, OG image, JSON-LD |
| `marketed_by` | string / FK | "WeDoEarth" / partner — for attribution |
| `created_at / updated_at` | timestamp | |

Optional child table `units` (for inventory like the two Kudil villas):

| Field | Type | Notes |
|---|---|---|
| `id` | uuid | |
| `project_id` | FK | |
| `unit_no` | string | "105C2" |
| `facing` | string | "South" |
| `plot_dimension` / `plot_area` / `built_up` | values | |
| `road_width`, `main_door`, `package` | values | |
| `price` | number | |
| `status` | enum | `available` `reserved` `sold` |

### 2.3 Page generation

- **List:** `/properties` queries `projects` where `status != draft`, renders cards, supports filters (type, status, locality, budget) and sort (price, newest).
- **Detail:** `/properties/{slug}` fetches one project + its units and renders the sub-page (the Kudil page is the template). Build it **once** as a dynamic template; every project reuses it.
- **SEO per page:** each project page emits its own `<title>`, meta description, OG tags, and `RealEstateListing` + `FAQPage` JSON-LD from the `seo` field — this is how each project ranks individually and gets cited by AI search.

---

## 3. The lead flow (how enquiries become commission)

```
  Buyer on a project page / parcel map
        │  submits enquiry (name, phone, purpose, budget, timeline, unit)
        ▼
  Lead saved to `leads` table  ──►  Instant notify you (WhatsApp/email/SMS)
        │                            + appears in /studio leads inbox
        ▼
  You qualify (the form fields pre-score it) ──► connect buyer to builder/owner
        ▼
  Deal closes ──► builder pays commission (tracked privately, never shown on site)
```

`leads` table fields: `id, project_id, unit_id, name, phone, email, purpose (live/invest), budget_readiness, timeline, message, source (page/utm), status (new/contacted/visit/closed), created_at`. The qualification fields are what make leads **genuine** — you call "ready + visit now" first.

Commission stays entirely off the public site — buyers see a trusted listing and an easy way to ask; the brokerage economics live in the backend / your agreements.

---

## 4. The other business lines (and how each behaves)

Each is a section/page wired into the same nav and lead system. Status by phase keeps it honest about what's live now vs later.

| Module | Page | What it does | Phase |
|---|---|---|---|
| **Properties** | `/properties` (+ sub-pages) | Discover verified projects, enquire | **Live now** |
| **Verify** | `/verify` | Paid title due-diligence: upload docs → get a go/no-go report. Buyers, NRIs, lenders. | **Live now** (the cash + data engine) |
| **Manage** | `/manage` | Tenant + rent management SaaS with AI rent-rate suggestion. Start as waitlist/lead capture. | Phase 1 → SaaS |
| **For builders** | `/list-your-project` | Sellers submit a project → becomes a draft in `/studio` → you verify & publish. | **Live now** |
| **Invest** | `/invest` | Fractional access via SEBI SM-REIT **partners** (not our own scheme yet). Risk disclosures, no guaranteed returns. | Phase 2 (partner) → Phase 3 (own SM REIT) |
| **Insights** | `/insights` | SEO/AEO content engine: locality guides, "is this title clear?", guideline-value explainers. Feeds organic buyer traffic. | Start early — it's your distribution |
| **About / Trust** | `/about` | Vision, team, RERA, compliance, DPDP. Builds the trust the whole model rests on. | Live now |

Two flows to wire alongside leads:
- **Verify intake:** upload documents → create a `verification_request` → your team + AI produce a report → deliver + invoice. (Doubles as your proprietary title-data capture.)
- **Builder/seller intake:** `/list-your-project` form → creates a `draft` project + a seller lead → you do title verification → publish to `/properties`.

---

## 5. Implementation notes

- **CMS / admin:** use a headless CMS (Sanity, Strapi, Payload, or Directus) or a simple custom admin on your DB. Goal: a non-developer can add a project in minutes. This is `/studio`.
- **Stack (matches your team):** Next.js (SSR/SSG for SEO) + a Node/Postgres backend, or the CMS's own API. Project pages should be server-rendered or statically generated so Google and AI engines read them fully.
- **URL structure:** keep `/properties/{slug}` clean and stable — it's an SEO asset. Never change a slug once indexed (redirect if you must).
- **Media:** store images in object storage (S3/Cloudflare R2) + CDN; require alt text (SEO + accessibility).
- **Leads:** pipe to a Google Sheet or CRM + WhatsApp/email notification on day one; upgrade to a proper CRM later.
- **Search/filter:** start with DB queries; add a search index (Meilisearch/Elastic) once you have many projects.
- **Compliance baked in:** RERA number field shown on every project page; DPDP-compliant consent on every form; "indicative / not an offer" disclaimers from the project record.
- **Reuse the design system:** the tokens, fonts and components in the existing prototypes (`index.html, platform.html`, `kudil-navalur.html`, `properties.html`) are the component library — hand these to the team as the visual reference.

---

## 6. Build order (so it ships fast and compounds)

1. **Project model + admin + dynamic project template** — so any project (starting with Kudil) can be added and gets a sub-page. *(Highest priority — it's the engine.)*
2. **Properties hub** wired to the live DB (replace the demo array with the API).
3. **Lead capture + notification + inbox** — so enquiries actually reach you.
4. **Verify intake flow** — the cash/data engine.
5. **For-builders intake** — so sellers can submit; you control publishing.
6. **Insights/SEO content** — ongoing, drives the organic buyer traffic the whole model needs.
7. **Manage (SaaS) and Invest (partner)** — as those phases arrive.

---

*Prototype design files accompany this spec: the home page, the Kudil project sub-page (the template), and the Properties hub (the data-driven grid). Together they show the full front-end flow; this document is the backend and information-architecture plan behind it.*
