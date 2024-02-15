# FORGE CONFIG (DO NOT REMOVE!)
include forge-conf/simplecharity.org/before/*;

server {
    # Listen for both IPv4 & IPv6 requests on port 443 with http2 enabled
    listen 443 ssl http2;
    listen [::]:443 ssl http2;

    # General virtual host settings
    server_name simplecharity.org;
    root /home/forge/simplecharity.org/current/web;
    index index.html index.htm index.php;
    charset utf-8;

    # Enable server-side includes as per: http://nginx.org/en/docs/http/ngx_http_ssi_module.html
    ssi on;

    # Disable limits on the maximum allowed size of the client request body
    client_max_body_size 0;

    # 404 error handler
    error_page 404 /index.php?$query_string;

    # 301 Redirect URLs with trailing /'s as per https://webmasters.googleblog.com/2010/04/to-slash-or-not-to-slash.html
    rewrite ^/(.*)/$ /$1 permanent;

    # Change // -> / for all URLs, so it works for our php location block, too
    merge_slashes off;
    rewrite (.*)//+(.*) $1/$2 permanent;

    # Handle Do Not Track as per https://www.eff.org/dnt-policy
    location /.well-known/dnt-policy.txt {
        try_files /dnt-policy.txt /index.php?p=/dnt-policy.txt;
    }

    # For WordPress bots/users
    location ~ ^/(wp-login|wp-admin|wp-config|wp-content|wp-includes|xmlrpc) {
        return 301 https://wordpress.com/wp-login.php;
    }

    # Access and error logging
    access_log off;
    error_log  /var/log/nginx/simplecharity.org-error.log error;
    # If you want error logging to go to SYSLOG (for services like Papertrailapp.com), uncomment the following:
    #error_log syslog:server=unix:/dev/log,facility=local7,tag=nginx,severity=error;

    # FORGE SSL (DO NOT REMOVE!)
    ssl_certificate /etc/nginx/ssl/simplecharity.org/632560/server.crt;
    ssl_certificate_key /etc/nginx/ssl/simplecharity.org/632560/server.key;

    ssl_protocols TLSv1.2;
    ssl_ciphers ECDHE-RSA-AES256-GCM-SHA512:DHE-RSA-AES256-GCM-SHA512:ECDHE-RSA-AES256-GCM-SHA384:DHE-RSA-AES256-GCM-SHA384:ECDHE-RSA-AES256-SHA384;
    ssl_prefer_server_ciphers on;
    ssl_dhparam /etc/nginx/dhparams.pem;

    # FORGE CONFIG (DO NOT REMOVE!)
    include forge-conf/simplecharity.org/server/*;

    # Load configuration files from nginx-partials
    include /home/forge/nginx-craft/nginx-partials/*.conf;

    location / {
        try_files $uri/index.html $uri $uri/ /index.php?$query_string;
    }

    # Craft-specific location handlers to ensure AdminCP requests route through index.php
    # If you change your `cpTrigger`, change it here as well
    location ^~ /admin {
        try_files $uri $uri/ /index.php?$query_string;
    }
    location ^~ /cpresources {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # php-fpm configuration
    location ~ [^/]\.php(/|$) {
        try_files $uri $uri/ /index.php?$query_string;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_param HTTP_PROXY "";
        fastcgi_param HTTP_HOST simplecharity.org;

        # Use Dotenvy to generate the .env variables as per: https://github.com/nystudio107/dotenvy
        include /home/forge/simplecharity.org/current/.env_nginx.txt;

        fastcgi_intercept_errors off;
        fastcgi_buffer_size 16k;
        fastcgi_buffers 4 16k;
        fastcgi_connect_timeout 300;
        fastcgi_send_timeout 300;
        fastcgi_read_timeout 300;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}

# FORGE CONFIG (DO NOT REMOVE!)
include forge-conf/simplecharity.org/after/*;
