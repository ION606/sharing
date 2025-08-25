cat > .env <<EOF
LETSENCRYPT_EMAIL=ion606@protonmail.com
ADMIN_EMAIL=ion606@protonmail.com
PASTE_DOMAIN=bin.ion606.com
FILES_DOMAIN=tfiles.ion606.com
SHORT_DOMAIN=s.ion606.com

LUFI_SECRET=$(openssl rand -hex 32)
SHLINK_DB_PASSWORD=$(openssl rand -hex 24)
SHLINK_GEOLITE_KEY=YOUR_MAXMIND_KEY
SHLINK_API_KEY=$(openssl rand -hex 32)
EOF