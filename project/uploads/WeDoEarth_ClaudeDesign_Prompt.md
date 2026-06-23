# Claude Design Prompt — WeDoEarth Website (hi-fidelity)

*Paste everything below into Claude Design. It is a complete creative brief: brand, design system, page-by-page content, real project data, flows, and guardrails. Build it as a responsive, multi-page hi-fidelity website. Start with the Home page, then build the others to match.*

---

## ROLE & GOAL

You are the design lead building the hi-fidelity website for **WeDoEarth**, a Tamil Nadu real-estate company. Build a polished, responsive, multi-page website with consistent navigation and a single, distinctive visual identity — not a templated look.

**The site's primary job:** turn visitors into **genuine buyer enquiries** for our live project (Kudil, Navalur), while presenting our other services and our sustainability mission. A secondary job: let builders/owners list projects with us.

Build it as clean HTML/CSS/JS (or React if you prefer), mobile-first, accessible, with a shared design system across all pages.

---

## BRAND & POSITIONING

- **Name:** WeDoEarth. Always pair the wordmark with the descriptor **"Real estate, verified"** so the name never reads as a climate-only brand.
- **Domain:** wedoearth.com
- **Positioning in one line:** *Real estate you can trust, built for generations.* We do two things others don't: **prove the ground is clean** (verified title, real approvals, no disputes) and **build in a way that gives back to nature**.
- **Tagline / thesis:** "Property you can prove." and "Land you can trust. Homes that give back."
- **The belief (use prominently):** *"Real estate isn't just selling land — it's creating a sustainable livelihood for the generations to come."*
- **Tone:** confident, warm, plain-spoken, trustworthy. Specific over clever. Never hype, never guaranteed-return language.

---

## VISUAL DESIGN SYSTEM (follow exactly)

**Concept:** "Verified Ground" — a cadastral / land-survey precision meets warm, sustainable, human. Think measured grids and parcel maps, rendered in earthy, natural tones. Spend boldness on ONE signature element (the parcel map); keep everything else quiet and disciplined.

**Color palette (CSS variables):**
- `--ink: #14201B` (near-black forest — text, dark sections)
- `--ink-soft: #3A463F` (secondary text)
- `--ground: #EDEAE0` (limestone page background)
- `--ground-2: #E4E0D3` (alt background)
- `--paper: #F6F4EC` (cards)
- `--brand: #1C6B4B` (verified green — primary)
- `--brand-deep: #0F3D2C` (dark green sections)
- `--mint: #3FAE7F` (accent + "available" parcel state)
- `--blue: #2C6E8E` ("listed for resale" parcel state)
- `--clay: #B8552E` ("sold" parcel state)
- `--brass: #A9842F` ("title verified" marker — use sparingly)
- Lines: `rgba(20,32,27,.14)`

**Typography (Google Fonts):**
- Display / headings: **Space Grotesk** (600/700) — technical, precise.
- Body: **IBM Plex Sans** (400/500).
- Data / labels / parcel IDs / coordinates / eyebrows: **IBM Plex Mono** (uppercase, letter-spaced) — gives the land-record feel.

**Style rules:**
- Generous whitespace, ~14px border radius, soft long shadows on key cards only.
- Eyebrow labels in mono with a short leading rule (e.g. `—— TAMIL NADU · REAL ESTATE FOR GENERATIONS`).
- Subtle motion only: hover lifts, a scroll reveal, and one orchestrated "verification sweep" on the parcel map. Respect `prefers-reduced-motion`.
- Accessibility: visible keyboard focus, alt text, semantic headings, AA contrast.
- Avoid generic AI defaults (cream+serif+terracotta; black+acid-green; newspaper hairlines). This palette and the parcel-map signature are the identity.

**Signature element — the interactive parcel map** (on the What-we-do page hero, and reusable):
- A grid of square "parcels," each color-coded by state: mint = available, blue = listed for resale, clay = sold, hatched = fresh sale; a small brass dot = title-verified.
- Hover/tap a parcel → detail card with parcel ID (mono), coordinates, guideline value per sqft, verification status.
- **Multi-select:** tapping available/listed parcels adds them to a selection bar showing count, total sq ft, and combined guideline value, with "Clear" and "Enquire about N" actions.
- A "Run title scan" button triggers a sweep animation that lights up verified parcels.

---

## SITE STRUCTURE (pages + navigation)

Primary nav on every page: **WeDoEarth (logo→Home) · Properties · Sustainability · What we do · For builders · [Enquire button]**

1. **Home (`index.html`)**
2. **Properties hub (`properties.html`)**
3. **Project sub-page template (`properties/{slug}` — first one: Kudil)**
4. **Sustainability (`sustainability.html`)**
5. **What we do (`platform.html`)**
6. (Behind the scenes) an admin/CMS to add projects — see "Multi-project system" below.

Footer on every page: Explore (Properties, Kudil, Sustainability, What we do) · Company (For builders, Our promise, Contact) · Trust (Title verification, Compliance·RERA, Privacy·DPDP). Include an "indicative / prototype" disclaimer line.

---

## PAGE-BY-PAGE CONTENT

### 1) HOME — landing built to seek buyers for Kudil
- **Hero (split):** Left — eyebrow "Tamil Nadu · Real estate for generations"; H1 "Land you can trust. Homes that **give back.**" (color "give back" in brand green); subcopy "We verify every title and build around nature — because a home should outlast us, and leave the earth better than we found it. Starting in Tamil Nadu."; CTAs "See our project: Kudil" + "Our promise to nature". Right — a **featured "Now selling" Kudil card**: image, "Navalur · OMR" pin, name "Kudil — courtyard villas", "by Natarajan Estates · 2 villas available", quick facts (4 BHK · 2,662 sqft · ₹2.45 Cr*), buttons "View project" + "Book a visit".
- **Mission band (dark green):** eyebrow "Why we exist"; the belief quote as a large blockquote (highlight "sustainable livelihood" in mint); a paragraph on the two things we do (prove the ground + build to give back); four sustainability pillars (Design with nature / Protect water & green / Lighter on energy / Responsible land).
- **What we do:** four linked cards — Browse properties → Properties; Verify a title → What-we-do#verify; Manage property → #manage; Invest fractionally → #invest.
- **Trust strip:** three points (1 live project; Verified-first; Built for 2050).
- **Closing CTA (dark green):** "Looking for a home at Navalur?" → "Book a visit to Kudil".

### 2) PROPERTIES HUB
- Heading "Verified projects, one place." + intro on reviewing every project before listing.
- Filters: type (All / Villas / Plots / Commercial) and status (Any / Available / Upcoming); live count.
- **Project cards rendered from a data array** (this is the multi-project system — see below). Each card: thumbnail, config badge, verified badge (verified / verifying), locality, name, developer, built-up, status pill, units, price-from, "View project →" linking to its sub-page. Show Kudil as the live card + a couple of greyed "details soon" placeholders to demonstrate scale.
- A "Have a project to sell?" strip → For builders.

### 3) PROJECT SUB-PAGE (template; first instance = Kudil)
Build this as a reusable template driven by a project record. For Kudil, use the real data in the "KUDIL DATA" block below.
- Slim "verified" ribbon with TNRERA placeholder.
- Hero: eyebrow "Villas · Navalur · OMR, Chennai"; H1 "Kudil — courtyard villas, the Boat Club of OMR."; location line; CTAs "Enquire" / "See available villas" / "Watch the walkthrough" (link to the YouTube URL in the data block); a gallery of image placeholders labelled (Courtyard / Living / Exterior / Clubhouse / Aerial); a facts strip.
- **Available villas:** two cards (Plot 105C2 South, Plot 102B North) with specs + price + "Enquire about this villa" (prefills the enquiry).
- **Why Kudil:** courtyard design, the 4 BHK layout, V1 specification.
- **The township:** amenity chips.
- **Location:** connectivity / schools / hospitals / lifestyle.
- **Pricing & payment:** cost breakdown + construction-linked payment milestones + disclaimers (GST 5% extra, registration ~9% on guideline value, indicative).
- **Enquiry (qualifying):** the lead-capture form (see Flows).

### 4) SUSTAINABILITY
- Dark-green hero: eyebrow "Our initiative"; H1 "We don't just sell land. We grow what **lives on it.**"; subcopy about holding land in trust for the next generation.
- The belief quote in a bordered band + a paragraph that sustainability is the reason we exist.
- **Four commitments** (detailed, each with bullets): Design with nature; Protect water & green; Lighter on energy; Responsible land.
- **In practice — Kudil:** image + how Kudil lives these principles + chips (courtyard, two lakes, native trees, clean groundwater, cool roofing, water/sewage treatment) + "See Kudil".
- **Where we're headed:** honest commitments (e.g. "a tree for every home," green-certified projects) clearly labelled as goals vs live, with a note that these describe intent/direction, not guaranteed outcomes.
- Closing CTA → Explore Kudil.

### 5) WHAT WE DO
- Hero with the interactive parcel map (the signature element) + "Property you can prove."
- Trust strip (land-dispute context).
- Module cards: **Verify** (title due diligence), **Map** (parcel marketplace), **Manage** (tenant/rent SaaS + AI rent engine), **Invest** (fractional). Use anchor ids `#verify #manage #invest #builders`.
- **AI agents** section (buyer, seller, title assistant, property manager) — grounded in verified data, regulated actions routed to licensed entities.
- **Invest** section: fractional via **SEBI-registered SM REIT partners**, on-exchange resale — with bold risk disclosures and "returns not guaranteed."
- **For builders & owners** (`#builders`): "List your project. Reach verified buyers." 3 steps (list → we verify & map → qualified enquiries) + "List a project". **Do not mention commission anywhere.**
- **Trusted answers** FAQ (Is the title clear? What's the guideline value? Is it DTCP/CMDA approved? How do I reach the owner?) with `FAQPage` JSON-LD.

---

## KEY FLOWS

**A) Lead capture (the conversion engine).** Enquiry form fields: name, phone/WhatsApp, villa/unit of interest, **purpose (live in / invest / both)**, **budget readiness (ready / needs finance / exploring)**, **timeline**, optional message. These qualification fields are what make leads genuine. On submit → confirmation state ("we'll call you to arrange a visit"). When opened from a specific villa or parcel selection, prefill the unit(s). **Commission is never shown** — buyers see a trusted listing and an easy way to ask; we connect them to the builder behind the scenes.

**B) Multi-project system.** Project cards on the Properties hub render from a **data array / collection** (each object = one project record). Adding a project = adding one record; it appears as a card AND gets its own sub-page at `/properties/{slug}` using the project template. Build the front end so this array can later be swapped for a database/CMS API with no layout change. Project record fields: slug, name, developer, type, status, verification_status, rera_number, location, summary, price_from, configs, units[], amenities, specs, location_highlights, payment_schedule, media[], seo{}.

**C) SEO / AEO.** Each page has its own title + meta description + Open Graph; each project page emits `RealEstateListing` + `FAQPage` JSON-LD; site emits an `Organization` block (name WeDoEarth). Clean, stable URLs (`/properties/{slug}`). Server-render or static-generate for crawlability.

---

## KUDIL DATA (use real values)

- **Project:** Kudil, by Natarajan Estates · Greenwood City, Navalur (OMR), Chennai. Marketed via WeDoEarth.
- **Positioning:** design-led courtyard villas; "the Boat Club of OMR"; inside a 40-acre fully-compounded gated township; 2 min off OMR; bordered by two lakes; next to CSK High Performance Centre & Navalur Eco Lake Park; mature native trees; clean groundwater.
- **Configs:** 4 BHK — carpet 2,359 sqft, built-up 2,662 sqft, 4 bath, family lounge, modular open-plan kitchen, private courtyard, balcony, foyer + 2 car parking, double-height living. (Also a 3 BHK — carpet 1,827, built-up 2,079.)
- **Two available villas (both V1 / Essential):**
  - **Plot 105C2** — South facing; plot 25'0"×60'0" (1,501 sqft); built-up 2,662 sqft; road 30 ft; main door East.
  - **Plot 102B** — North facing; plot 24'9"×60'0" (1,485 sqft); built-up 2,662 sqft; road 40 ft; main door North.
- **Pricing (both):** villa base ₹2,35,00,000; +compound wall ₹4,40,000; +6000L sump ₹2,40,000; +EB ₹1,25,000; +clubhouse ₹1,50,000 = **₹2,44,55,000 before GST & registration** ("from ₹2.45 Cr*"). GST @ 5% extra at actuals. Registration ~9% on guideline value (₹3,300/sqft) at actuals. Booking advance ₹5,00,000. Construction-linked payment plan (20% agreement, 20% registration, then slab/brick/tile milestones to 3% before handover).
- **Amenities:** clubhouse, gym, swimming pool, jacuzzi, kids' pool, cricket nets, 5 private parks, 40 ft roads, water & sewage treatment, clean underground water, street lighting, landscaped streets, grand entrance.
- **Specification (V1):** RCC frame; premium GVT vitrified flooring; Kohler sanitaryware; Schneider/Legrand modular switches; African teak main door; Fenesta UPVC windows with Saint Gobain glass; heat-reflective "cool" terrace tiles. Upgrade variants: VS (interiors) and VS Pro (move-in ready).
- **Walkthrough video:** https://www.youtube.com/watch?v=pTp4lky-DnI
- **Note:** use labelled image placeholders (do not fabricate or copy the developer's renders); the team will drop in approved photos.

---

## SUSTAINABILITY CONTENT (the four commitments)

1. **Design with nature** — central courtyards, double-height spaces, cross-ventilation, natural light; cuts energy use; human-centric layouts.
2. **Protect water & green** — retain native trees & lakes; rainwater harvesting/recharge; water & sewage treatment; clean groundwater.
3. **Lighter on energy** — heat-reflective cool roofing; solar-ready homes; efficient fixtures & LED lighting.
4. **Responsible land** — verify title & approvals before listing; avoid eco-sensitive zones and farmland; respect the landscape.

---

## COMPLIANCE & INTEGRITY (non-negotiable)

- **Never show or mention commission** anywhere public. Buyers see trusted listings + easy enquiry; builders see "list with us."
- **Investments:** present fractional ownership only via **SEBI-registered SM REIT partners**; include risk disclosures (vacancy, illiquidity, capital loss); **never** promise or imply guaranteed returns; never describe a pooled "buy-a-square, we hold title, you get rent" scheme (that's an illegal collective investment scheme).
- **RERA:** show a TNRERA registration-number field/placeholder on each project page (real number to be added before launch).
- **Sustainability claims:** frame goals as intent/direction, not guaranteed outcomes; only state features that are real per project.
- **Disclaimers:** project details "indicative, sourced from the developer, subject to change"; "marketing listing, not an offer"; DPDP-compliant consent line on forms.

---

## TECHNICAL & QUALITY BAR

- Responsive (looks great on a 380px phone and on desktop); mobile-first.
- Accessible: keyboard navigation, visible focus, alt text, semantic HTML, AA contrast, reduced-motion support.
- One shared design system / component library across all pages (nav, footer, buttons, cards, forms, eyebrows).
- No browser localStorage/sessionStorage. Keep forms as prototype (confirmation state) unless wiring a backend.
- Clean, commented code the dev team can extend.

---

## BUILD ORDER (iterate with me)

1. Establish the **design system** (tokens, type, nav, footer, buttons, cards) on the **Home** page.
2. Build the **Project sub-page** for Kudil (the template) — it's the lead engine.
3. Build the **Properties hub** (data-array cards → sub-pages).
4. Build **Sustainability** and **What we do** (with the interactive parcel map).
5. Wire the **enquiry flow** and **SEO/structured data** across all pages.

Show me the Home page first; I'll give feedback before you build the rest.
