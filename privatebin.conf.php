;<?php http_response_code(403);
[main]
; name = "ION606's PrivateBin Instance"

; The full URL, with the domain name and directories that point to the
; PrivateBin files, including an ending slash (/). This URL is essential to
; allow Opengraph images to be displayed on social networks.
basepath = "https://pbin.ion606.com/"

; enable or disable the discussion feature, defaults to true
discussion = true

; preselect the discussion feature, defaults to false
opendiscussion = false

; enable or disable the display of dates & times in the comments, defaults to true
; Note that internally the creation time will still get tracked in order to sort
; the comments by creation time, but you can choose not to display them.
; discussiondatedisplay = false

; enable or disable the password feature, defaults to true
password = true

; enable or disable the file upload feature, defaults to false
fileupload = true

; preselect the burn-after-reading feature, defaults to false
burnafterreadingselected = true

; which display mode to preselect by default, defaults to "plaintext"
; make sure the value exists in [formatter_options]
defaultformatter = "markdown"

; (optional) set a syntax highlighting theme, as found in css/prettify/
; syntaxhighlightingtheme = "sons-of-obsidian"

; size limit per document or comment in bytes, defaults to 10 Megabytes
sizelimit = 500000000

; by default PrivateBin use "bootstrap5" template (tpl/bootstrap5.php).
; Optionally you can enable the template selection menu, which uses
; a session cookie to store the choice until the browser is closed.
templateselection = false

; List of available for selection templates when "templateselection" option is enabled
availabletemplates[] = "bootstrap5"
availabletemplates[] = "bootstrap"
availabletemplates[] = "bootstrap-page"
availabletemplates[] = "bootstrap-dark"
availabletemplates[] = "bootstrap-dark-page"
availabletemplates[] = "bootstrap-compact"
availabletemplates[] = "bootstrap-compact-page"

; set the template your installs defaults to, defaults to "bootstrap5" (tpl/bootstrap5.php), also
; bootstrap template (tpl/bootstrap.php) and it's variants: "bootstrap-dark", "bootstrap-compact", "bootstrap-page",
; which can be combined with "-dark" and "-compact" for "bootstrap-dark-page",
; "bootstrap-compact-page" - previews at:
; https://privatebin.info/screenshots.html
; template = "bootstrap5"

; set the language your installs defaults to, defaults to English
; if this is set and language selection is disabled, this will be the only language
; languagedefault = "en"

; (optional) URL shortener address to offer after a new document is created.
; It is suggested to only use this with self-hosted shorteners as this will leak
; the documents encryption key.
; in privatebin.conf.php  ([main] section)
; important: only do this with your self-hosted shortener (see note below)

urlshortener = "https://{env.SHORT_DOMAIN}/shorten?link="

; (optional) Whether to shorten the URL by default when a new document is created.
; If set to true, the "Shorten URL" functionality will be automatically called.
; This only works if the "urlshortener" option is set.
; shortenbydefault = false

; (optional) Let users create a QR code for sharing the document URL with one click.
; It works both when a new document is created and when you view a document.
qrcode = true

; (optional) Let users send an email sharing the document URL with one click.
; It works both when a new document is created and when you view a document.
email = true

; Content Security Policy headers allow a website to restrict what sources are
; allowed to be accessed in its context. You need to change this if you added
; custom scripts from third-party domains to your templates, e.g. tracking
; scripts or run your site behind certain DDoS-protection services.
; Check the documentation at https://content-security-policy.com/
; Notes:
; - By default this disallows to load images from third-party servers, e.g. when
;   they are embedded in documents. If you wish to allow that, you can adjust the
;   policy here. See https://github.com/PrivateBin/PrivateBin/wiki/FAQ#why-does-not-it-load-embedded-images
;   for details.
; - The 'wasm-unsafe-eval' is used to enable webassembly support (used for zlib
;   compression). You can remove it if compression doesn't need to be supported.
; - The 'unsafe-inline' style-src is used by Chrome when displaying PDF previews
;   and can be omitted if attachment upload is disabled (which is the default).
;   See https://issues.chromium.org/issues/343754409
; - To allow displaying PDF previews in Firefox or Chrome, sandboxing must also
;   get turned off. The following CSP allows PDF previews:
; cspheader = "default-src 'none'; base-uri 'self'; form-action 'none'; manifest-src 'self'; connect-src * blob:; script-src 'self' 'wasm-unsafe-eval'; style-src 'self' 'unsafe-inline'; font-src 'self'; frame-ancestors 'none'; frame-src blob:; img-src 'self' data: blob:; media-src blob:; object-src blob:"
;
; The recommended and default used CSP is:
; cspheader = "default-src 'none'; base-uri 'self'; form-action 'none'; manifest-src 'self'; connect-src * blob:; script-src 'self' 'wasm-unsafe-eval'; style-src 'self'; font-src 'self'; frame-ancestors 'none'; frame-src blob:; img-src 'self' data: blob:; media-src blob:; object-src blob:; sandbox allow-same-origin allow-scripts allow-forms allow-modals allow-downloads"

; Enable or disable the warning message when the site is served over an insecure
; connection (insecure HTTP instead of HTTPS), defaults to true.
; Secure transport methods like Tor and I2P domains are automatically whitelisted.
; It is **strongly discouraged** to disable this.
; See https://github.com/PrivateBin/PrivateBin/wiki/FAQ#why-does-it-show-me-an-error-about-an-insecure-connection for more information.
; httpwarning = true

; Pick compression algorithm or disable it. Only applies to documents & comments
; created after changing the setting.
; Can be set to one these values: "none" / "zlib" (default).
; compression = "zlib"

[expire]
; expire value that is selected per default
; make sure the value exists in [expire_options]
default = "1week"

[expire_options]
; Set each one of these to the number of seconds in the expiration period,
; or 0 if it should never expire
5min = 300
10min = 600
1hour = 3600
1day = 86400
1week = 604800
; Well this is not *exactly* one month, it's 30 days:
1month = 2592000
1year = 31536000
never = 0

[formatter_options]
; Set available formatters, their order and their labels
plaintext = "Plain Text"
syntaxhighlighting = "Source Code"
markdown = "Markdown"

[traffic]
; time limit between calls from the same IP address in seconds
; Set this to 0 to disable rate limiting.
limit = 10

; (optional) Set IPs addresses (v4 or v6) or subnets (CIDR) which are exempted
; from the rate-limit. Invalid IPs will be ignored. If multiple values are to
; be exempted, the list needs to be comma separated. Leave unset to disable
; exemptions.
; exempted = "1.2.3.4,10.10.10/24"

; (optional) If you want only some source IP addresses (v4 or v6) or subnets
; (CIDR) to be allowed to create documents, set these here. Invalid IPs will be
; ignored. If multiple values are to be exempted, the list needs to be comma
; separated. Leave unset to allow anyone to create documents.
; creators = "1.2.3.4,10.10.10/24"

; (optional) if your website runs behind a reverse proxy or load balancer,
; set the HTTP header containing the visitors IP address, i.e. X_FORWARDED_FOR
; header = "X_FORWARDED_FOR"

[purge]
; minimum time limit between two purgings of expired documents, it is only
; checked when documents get created
; Set this to 0 to run a purge every time a document is created.
limit = 300

; maximum amount of expired documents to delete in one purge
; Set this to 0 to disable purging. Set it higher, if you are running a large
; site
batchsize = 1000

[model]
; name of data model class to load and directory for storage
; the default model "Filesystem" stores everything in the filesystem
class = Filesystem

[model_options]
; Use the writable data volume (privatebin_data:/srv/data)
; Default syntax in upstream config is: dir = PATH "data"
; Either form below works. Pick ONE (uncommented). Here we use the conventional form:
dir = PATH "data"
; Alternative explicit absolute path (also valid):
; dir = "/srv/data"