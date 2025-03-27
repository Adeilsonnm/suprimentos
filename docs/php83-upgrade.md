27032025 - Atualizar o php
# Atualização para PHP 8.3 no Debian 11

## 1. Adicionar Repositório Sury
```bash
# Instalar dependências necessárias
apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2

# Adicionar repositório
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list
wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add -

# Atualizar lista de pacotes
apt update
```

## 2. Instalar PHP 8.3
```bash
# Instalar PHP 8.3 e extensões necessárias
apt install -y php8.3-fpm php8.3-mysql php8.3-curl php8.3-gd php8.3-mbstring \
    php8.3-xml php8.3-zip php8.3-bcmath php8.3-intl php8.3-cli
```

## 3. Configurar PHP-FPM
```bash
# Parar versão antiga do PHP-FPM (se existir)
systemctl stop php8.2-fpm

# Iniciar PHP 8.3
systemctl start php8.3-fpm
systemctl enable php8.3-fpm
```

## 4. Atualizar Configuração do Nginx
Editar o arquivo de configuração do site:
```bash
nano /etc/nginx/sites-available/suprimentos.wzp.icu
```

Atualizar a linha do fastcgi_pass:
```nginx
fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
```

## 5. Reiniciar Nginx
```bash
systemctl restart nginx
```

## 6. Verificar Instalação
```bash
# Verificar versão do PHP
php -v

# Verificar status do PHP-FPM
systemctl status php8.3-fpm

# Verificar extensões instaladas
php -m
```

## 7. Atualizar Composer
```bash
# Limpar cache do composer
composer clear-cache

# Atualizar dependências
composer update
```

## 8. Verificação Final
- [ ] PHP 8.3 está instalado e rodando
- [ ] PHP-FPM 8.3 está ativo
- [ ] Nginx está configurado corretamente
- [ ] Composer reconhece a nova versão do PHP
- [ ] Aplicação Laravel está funcionando

## Notas Importantes
1. Faça backup antes de atualizar
2. Teste a aplicação após a atualização
3. Verifique os logs por possíveis erros
4. Mantenha as versões antigas do PHP até confirmar que tudo está funcionando

## Logs para Monitoramento
- PHP-FPM: `/var/log/php8.3-fpm.log`
- Nginx: `/var/log/nginx/error.log`
- Laravel: `/var/www/suprimentos/storage/logs/laravel.log` 