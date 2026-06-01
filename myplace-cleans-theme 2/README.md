# MyPlace Cleans — WordPress Theme

A clean, modular WordPress theme matching the MyPlace Cleans brand
(slate background, yellow accent, Poppins typography).

## File structure

```
myplace-cleans-theme/
├── style.css              ← Theme header + all CSS (design tokens, layout, components)
├── functions.php          ← Enqueue, theme supports, menus, helpers (myplace_icon)
├── header.php             ← <head>, sticky site header, primary + mobile nav
├── footer.php             ← 4-column footer (brand / services / contact / hours)
├── index.php              ← Blog/archive fallback (required by WP)
├── front-page.php         ← Homepage with hero + services + latest posts
├── page.php               ← Default single-page template
├── single.php             ← Single blog post
├── 404.php                ← Not-found page
├── searchform.php         ← Search form partial
├── template-parts/
│   └── content-card.php   ← Reusable post card (homepage + archives)
├── page-templates/
│   └── page-services.php  ← "Template Name: Services Landing" page template
└── assets/
    ├── js/main.js         ← Mobile nav toggle + smooth scroll
    └── images/            ← Drop hero.jpg + service images here
```

## Install

1. Zip the `myplace-cleans-theme/` folder.
2. WP Admin → **Appearance → Themes → Add New → Upload Theme**.
3. Activate.
4. **Appearance → Menus**: create a menu and assign to **Primary** (and optionally **Footer**).
5. **Settings → Reading**: set "Your homepage displays" to a **static page** if you want `front-page.php` behavior, or leave as "Your latest posts" to use `index.php`.

## Hero image

Place a hero image at `assets/images/hero.jpg` (recommended 1600×1024).
Or wire it to the Customizer / a custom field — the markup is in
`front-page.php`.

## Customising

- **Colours / fonts**: edit the CSS variables at the top of `style.css`.
- **Adding sections**: create new files in `template-parts/` and call them
  with `get_template_part( 'template-parts/your-file' )`.
- **New page layouts**: add files to `page-templates/` with a
  `Template Name:` header — they'll appear in the page editor's
  "Template" dropdown.
- **Icons**: extend the `myplace_icon()` helper in `functions.php`.

## Notes

- No external build step. All CSS is hand-written, no Tailwind compile required.
- Uses standard WP template hierarchy — every template is overridable by a
  child theme.
- Passes core WP requirements: `wp_head`, `wp_body_open`, `wp_footer`,
  `body_class`, `post_class`, escaping on all dynamic output.

## Customizing the theme (no code)

Go to **Appearance → Customize → MyPlace Theme Options**:

- **Site Identity** — upload your **Logo** (replaces the brand mark).
- **Branding Colors** — brand accent, slate surfaces, page background, body text.
- **Contact Details** — phone (display + tel: link), WhatsApp (display + international number), email, address, opening hours.
- **Social Links** — Facebook, Instagram, X/Twitter, LinkedIn, TikTok, YouTube. Leave blank to hide an icon.

All changes apply site-wide via `header.php`, `footer.php` and CSS variables — no template edits needed.
