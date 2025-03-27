# Traduções do Filament

## Visão Geral

O Filament possui um sistema completo de traduções que permite localizar toda a interface para português do Brasil. As traduções estão localizadas em `resources/lang/vendor/filament/pt_BR/`.

## Estrutura de Arquivos

```
resources/lang/vendor/filament/pt_BR/
├── actions.php
├── layout.php
├── login.php
├── pages.php
└── ...
```

## Páginas (pages.php)

```php
return [
    'dashboard' => [
        'title' => 'Painel',
    ],
    
    'auth' => [
        'login' => [
            'title' => 'Login',
            'heading' => 'Entre na sua conta',
            'buttons' => [
                'submit' => [
                    'label' => 'Entrar',
                ],
            ],
            'form' => [
                'email' => [
                    'label' => 'E-mail',
                ],
                'password' => [
                    'label' => 'Senha',
                ],
                'remember' => [
                    'label' => 'Lembrar-me',
                ],
            ],
        ],
    ],
];
```

### Explicação das Traduções

1. **Dashboard**
   - `title`: Traduz o título do painel principal

2. **Autenticação**
   - `login.title`: Título da página de login
   - `login.heading`: Cabeçalho do formulário de login
   - `login.buttons.submit.label`: Texto do botão de login
   - `login.form`: Traduções dos campos do formulário
     - `email.label`: Label do campo de e-mail
     - `password.label`: Label do campo de senha
     - `remember.label`: Label do checkbox "Lembrar-me"

## Como Usar

O Filament carregará automaticamente as traduções baseado na configuração de idioma da aplicação. Para garantir que o sistema use português:

1. Configure o locale no `config/app.php`:
```php
'locale' => 'pt_BR',
```

2. Ou defina dinamicamente:
```php
App::setLocale('pt_BR');
```

## Personalizando Traduções

Para personalizar qualquer tradução:

1. Publique as traduções se ainda não o fez:
```bash
php artisan vendor:publish --tag=filament-translations
```

2. Edite os arquivos em `resources/lang/vendor/filament/pt_BR/`

## Benefícios

1. Interface totalmente em português
2. Melhor experiência para usuários brasileiros
3. Consistência na linguagem
4. Fácil manutenção e personalização
5. Suporte a múltiplos idiomas

## Recomendações

1. Mantenha as traduções consistentes
2. Use linguagem formal mas amigável
3. Mantenha os termos técnicos quando necessário
4. Teste a interface após modificar traduções
5. Mantenha backup das traduções personalizadas

## Observações

- As traduções são carregadas automaticamente
- Podem ser sobrescritas conforme necessário
- Suportam HTML quando especificado
- São atualizadas com novas versões do Filament
```

Esta documentação fornece uma visão geral completa do sistema de traduções do Filament, como ele funciona e como pode ser personalizado. Você pode adicionar mais seções específicas conforme necessário, como traduções de validação, mensagens de erro, etc.

Precisa de mais detalhes sobre alguma parte específica da documentação?