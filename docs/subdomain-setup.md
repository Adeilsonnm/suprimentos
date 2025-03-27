27032027 - testado
# Configuração do Subdomínio - suprimentos.wzp.icu

Este documento descreve os passos para configurar o subdomínio `suprimentos.wzp.icu` no servidor Nginx.

## 1. Criar Arquivo de Configuração

```bash
sudo nano /etc/nginx/sites-available/suprimentos.wzp.icu
```

## 2. Configuração do Nginx

Adicione o seguinte conteúdo ao arquivo:

```server {
    listen 80;
    listen [::]:80;
    server_name suprimentos.wzp.icu;
    root /var/www/suprimentos/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 3. Habilitar o Site

Criar link simbólico para habilitar o site:

```bash
sudo ln -s /etc/nginx/sites-available/suprimentos.wzp.icu /etc/nginx/sites-enabled/
```

## 4. Testar e Reiniciar

```bash
# Testar configuração
sudo nginx -t

# Reiniciar Nginx se o teste for bem-sucedido
sudo systemctl restart nginx
```

## 5. Configurar Permissões

```bash
sudo chown -R www-data:www-data /var/www/suprimentos
sudo chmod -R 755 /var/www/suprimentos
```

## 6. Configurar SSL (Let's Encrypt)

```bash
sudo certbot --nginx -d suprimentos.wzp.icu
```

## 7. Checklist de Verificação

Certifique-se de que:

- [ ] O domínio suprimentos.wzp.icu está apontando para o IP do servidor
- [ ] As portas 80 e 443 estão liberadas no firewall
- [ ] O diretório `/var/www/suprimentos` contém os arquivos do Laravel
- [ ] A pasta `public` contém o arquivo `index.php`
- [ ] As permissões dos arquivos estão corretas
- [ ] O certificado SSL está instalado e funcionando

## 8. URLs de Acesso

Após a configuração, o site estará disponível em:
- http://suprimentos.wzp.icu
- https://suprimentos.wzp.icu (após configuração do SSL)

## 9. Solução de Problemas

### Logs para Verificação
- Nginx: `/var/log/nginx/error.log`
- Laravel: `/var/www/suprimentos/storage/logs/laravel.log`
- PHP-FPM: `/var/log/php8.2-fpm.log`

### Comandos Úteis
```bash
# Verificar status do Nginx
sudo systemctl status nginx

# Verificar sintaxe da configuração
sudo nginx -t

# Reiniciar Nginx
sudo systemctl restart nginx

# Verificar permissões
ls -la /var/www/suprimentos
```

## 10. Manutenção

- Mantenha o certificado SSL atualizado
- Monitore regularmente os logs
- Faça backup da configuração do Nginx
- Mantenha as permissões dos arquivos corretas 