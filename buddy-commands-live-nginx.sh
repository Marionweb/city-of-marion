echo "Copying NGINX config"
sudo -n cp -R -f releases/${execution.to_revision.revision}/nginx-config/partials/* /etc/nginx-sp/vhosts.d/cityofmarion-production.d/partials
sudo -n cp -f releases/${execution.to_revision.revision}/nginx-config/cityofmarion-production/main.custom.conf /etc/nginx-sp/vhosts.d/cityofmarion-production.d/main.custom.conf
sudo -n cp -f releases/${execution.to_revision.revision}/nginx-config/cityofmarion-production/ssl.conf /etc/nginx-sp/vhosts.d/cityofmarion-production.d/ssl.conf
sudo -n cp -f releases/${execution.to_revision.revision}/nginx-config/cityofmarion-production.conf /etc/nginx-sp/vhosts.d/cityofmarion-production.conf

echo "Add environment variables"
sudo -n mkdir ~/playground && cd ~/playground && printf '%s\n' 'fastcgi_param CRAFTENV_CRAFT_ENVIRONMENT "live";' 'fastcgi_param CRAFTENV_DB_DRIVER "mysql";' 'fastcgi_param CRAFTENV_DB_SERVER "localhost";' 'fastcgi_param CRAFTENV_DB_USER "${DB_USER_LIVE}";' 'fastcgi_param CRAFTENV_DB_PASSWORD "${DB_PASSWORD_LIVE}";' 'fastcgi_param CRAFTENV_DB_DATABASE "${DB_NAME_LIVE}";' 'fastcgi_param CRAFTENV_DB_SCHEMA "public";' 'fastcgi_param CRAFTENV_DB_TABLE_PREFIX "";' 'fastcgi_param CRAFTENV_SECURITY_KEY "${SECURITY_KEY}";' 'fastcgi_param CRAFTENV_SITE_URL "https://cityofmarion.in.gov/";' 'fastcgi_param CRAFTENV_BASE_URL "https://cityofmarion.in.gov/";' 'fastcgi_param CRAFTENV_BASE_PATH "/srv/users/serverpilot/apps/cityofmarion-production/public";' 'fastcgi_param CRAFTENV_STRIPE_KEY "${STRIPE_KEY}";' 'fastcgi_param CRAFTENV_AWS_BUCKET "${AWS_BUCKET}";' 'fastcgi_param CRAFTENV_AWS_REGION "${AWS_REGION}";' 'fastcgi_param CRAFTENV_AWS_KEY "${AWS_KEY}";' 'fastcgi_param CRAFTENV_AWS_SECRET "${AWS_SECRET}";' 'fastcgi_param CRAFTENV_GOOGLE_API_KEY "${GOOGLE_API_KEY}";' 'fastcgi_param CRAFTENV_GOOGLE_OAUTH_CLIENT_ID "${GOOGLE_OAUTH_CLIENT_ID}";' 'fastcgi_param CRAFTENV_GOOGLE_OAUTH_CLIENT_SECRET "${GOOGLE_OAUTH_CLIENT_SECRET}";' 'fastcgi_param CRAFTENV_VIMEO_OAUTH_CLIENT_ID "${VIMEO_OAUTH_CLIENT_ID}";' 'fastcgi_param CRAFTENV_VIMEO_OAUTH_CLIENT_SECRET "${VIMEO_OAUTH_CLIENT_SECRET}";' 'fastcgi_param CRAFTENV_BUGSNAG_API_KEY "${BUGSNAG_API_KEY}";' 'fastcgi_param CRAFTENV_FACEBOOK_CLIENT_ID "${FACEBOOK_CLIENT_ID}";' 'fastcgi_param CRAFTENV_FACEBOOK_CLIENT_SECRET "${FACEBOOK_CLIENT_SECRET}";' 'fastcgi_param CRAFTENV_TWITTER_CONSUMER_KEY "${TWITTER_CONSUMER_KEY}";' 'fastcgi_param CRAFTENV_TWITTER_CONSUMER_SECRET "${TWITTER_CONSUMER_SECRET}";' | sudo -n tee ~/playground/craft-vars.conf
if [ ! -d "/etc/nginx-sp/vhosts.d/cityofmarion-production.d/fastcgi-vars" ]; then sudo -n mkdir /etc/nginx-sp/vhosts.d/cityofmarion-production.d/fastcgi-vars; fi
sudo -n mv -f ~/playground/craft-vars.conf /etc/nginx-sp/vhosts.d/cityofmarion-production.d/fastcgi-vars/craft-vars.conf
sudo -n rm -rf ~/playground

echo "Restart NGINX"
sudo nginx-sp -s reload
sudo -n service nginx-sp restart
