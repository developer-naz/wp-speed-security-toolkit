# ⚡🔐 WordPress Speed & Security Toolkit

![WordPress](https://img.shields.io/badge/WordPress-6.x-21759B?style=flat&logo=wordpress&logoColor=white)
![WooCommerce](https://img.shields.io/badge/WooCommerce-ready-96588A?style=flat&logo=woocommerce&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=flat&logo=php&logoColor=white)
![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)

Ready-to-use code snippets and a practical checklist to make WordPress & WooCommerce sites **faster** and **more secure**.

> ⚠️ **Always take a full backup and test on a staging site first.** Add snippets one at a time so you know exactly what changed.

---

## 📁 What's inside

| File | What it does |
|---|---|
| [`snippets/security.php`](snippets/security.php) | Hide WP version, disable XML-RPC, block user enumeration, protect REST users endpoint, security headers |
| [`snippets/performance.php`](snippets/performance.php) | Remove emoji scripts, clean `<head>`, slow Heartbeat, defer scripts, load WooCommerce assets only where needed, preconnect hints |
| [`config/htaccess-rules.txt`](config/htaccess-rules.txt) | Apache rules to protect sensitive files, block XML-RPC, enable GZIP and browser caching, block PHP in uploads |
| [`config/wp-config-hardening.php`](config/wp-config-hardening.php) | Disable file editor, force SSL admin, limit revisions, memory limit, real cron |

---

## 🚀 How to use

**PHP snippets** (`security.php`, `performance.php`)
1. Install the free **Code Snippets** plugin (recommended), or use a child theme's `functions.php`.
2. Copy only the snippets you need, without the opening `<?php` line if your editor already has one.
3. Save, then check the front end and wp-admin.

**.htaccess rules**
1. Download a backup of your current `.htaccess` file.
2. Paste the rules **above** the `# BEGIN WordPress` block.
3. If you see a 500 error, restore the backup and add the sections one by one.

**wp-config.php settings**
```php
// Paste ABOVE this line in wp-config.php:
/* That's all, stop editing! Happy publishing. */
```

---

## ✅ Quick checklist

### 🔐 Security
- [ ] WordPress core, themes & plugins updated
- [ ] Unused themes & plugins deleted
- [ ] Strong passwords + 2FA for all admins
- [ ] Security plugin installed (Wordfence / Sucuri)
- [ ] SSL active and HTTP redirects to HTTPS
- [ ] Web Application Firewall enabled (Cloudflare / Wordfence)
- [ ] Daily off-site backups (UpdraftPlus / host backups)
- [ ] File editor disabled, XML-RPC blocked
- [ ] PHP blocked inside `wp-content/uploads`

### ⚡ Speed
- [ ] Lightweight theme (Hello, Astra, GeneratePress, Kadence)
- [ ] Caching plugin set up (WP Rocket / LiteSpeed Cache)
- [ ] Images compressed and served as WebP/AVIF, lazy-loaded
- [ ] CDN active (Cloudflare)
- [ ] GZIP/Brotli and browser caching enabled
- [ ] Unused CSS/JS removed; scripts deferred
- [ ] Database cleaned (revisions, transients, spam)
- [ ] Core Web Vitals checked in PageSpeed Insights & Search Console

---

## 🧩 Compatibility
Written for WordPress 6.x, WooCommerce and PHP 7.4+. The .htaccess rules are for Apache 2.4+ and LiteSpeed (not Nginx). Every site is different, so test on your own setup before going live.

## 🤝 Contributing
Found a bug or have a useful snippet? Open an issue or a pull request.

## 📄 License
[MIT](LICENSE) © Md Nazmul Islam

---

### 👨‍💻 Author
**Md Nazmul Islam** (Developer Naz)
Web Developer | WordPress & Shopify Expert | SEO Specialist

[![LinkedIn](https://img.shields.io/badge/LinkedIn-developernaz-0A66C2?style=flat&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/developernaz/)
[![GitHub](https://img.shields.io/badge/GitHub-developer--naz-181717?style=flat&logo=github&logoColor=white)](https://github.com/developer-naz)

Need help with WordPress speed, security, WooCommerce or SEO? Feel free to reach out.
