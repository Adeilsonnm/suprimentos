# Configuração de Múltiplas Versões PHP

## 1. Instalação do PHP 8.3 junto com PHP 8.2

```bash
# Manter PHP 8.2
apt install php8.2-fpm php8.2-common php8.2-mysql php8.2-xml php8.2-curl php8.2-gd php8.2-imagick php8.2-cli php8.2-dev php8.2-imap php8.2-mbstring php8.2-opcache php8.2-soap php8.2-zip

# Instalar PHP 8.3
apt install php8.3-fpm php8.3-common php8.3-mysql php8.3-xml php8.3-curl php8.3-gd php8.3-imagick php8.3-cli php8.3-dev php8.3-imap php8.3-mbstring php8.3-opcache php8.3-soap php8.3-zip
```

## 2. Configuração do PHP-FPM

### 2.1 Configurar Pool do PHP 8.3
```bash
nano /etc/php/8.3/fpm/pool.d/suprimentos.conf
```

Adicione:
```ini
[suprimentos]
user = www-data
group = www-data
listen = /run/php/php8.3-fpm-suprimentos.sock
listen.owner = www-data
listen.group = www-data
php_admin_value[disable_functions] = exec,passthru,shell_exec,system
php_admin_flag[allow_url_fopen] = on
pm = dynamic
pm.max_children = 5
pm.start_servers = 2
pm.min_spare_servers = 1
pm.max_spare_servers = 3
chdir = /
```

## 3. Configuração do Nginx

### 3.1 Atualizar Virtual Host
```bash
nano /etc/nginx/sites-available/suprimentos.wzp.icu
```

Modifique a configuração do PHP-FPM:
```nginx
server {
    # ... outras configurações ...

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.3-fpm-suprimentos.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # ... resto da configuração ...
}
```

## 4. Reiniciar Serviços

```bash
# Reiniciar PHP-FPM 8.3
systemctl restart php8.3-fpm

# Reiniciar Nginx
systemctl restart nginx
```

## 5. Verificação

### 5.1 Verificar Status dos Sockets
```bash
ls -l /run/php/
```

### 5.2 Verificar Logs
```bash
tail -f /var/log/php8.3-fpm.log
tail -f /var/log/nginx/error.log
```

## 6. Configuração do Composer

### 6.1 Criar Wrapper Script
```bash
nano /usr/local/bin/composer-php83
```

Adicione:
```bash
#!/bin/bash
PHP_PATH=/usr/bin/php8.3
COMPOSER_PATH=/usr/local/bin/composer

$PHP_PATH $COMPOSER_PATH "$@"
```

```bash
chmod +x /usr/local/bin/composer-php83 