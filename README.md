# Unruh Admin 2.0

Painel CMS completo com gerenciador de mídia, editor rich-text, dashboard com gráficos e contador de visitas funcional integrado e muitos outros recursos.
Monolítico, construído com Laravel, Blade templates e jQuery

## Requerimentos:

- PHP 7.3+

## Bibliotecas utilizadas:

- [Laravel Browscap](https://packagist.org/packages/propa/laravel-browscap) - Para armazenar dados dos visitantes
- [Responsive File Manager](https://www.responsivefilemanager.com/) - Para gerenciamento de arquivos, imagens e videos
- [Tiny MCE](https://www.tiny.cloud/tinymce/) - Editor Rich Text com integração com o Responsive File Manager
- [API Geo IP](http://ip-api.com/) - Para obter dados de localização dos visitantes do site

## Instalação:

Após clonar esse repositório:

Copie e renomeie o arquivo *.env.example* para *.env* e configure os dados de conexão com sua base de dados. Ajuste também os parâmetros APP_URL E ASSET_URL de acordo com sua aplicação.

Rode os seguintes comandos via terminal, dentro do reposiorio clonado

```
composer install
```
```
php artisan key:generate
```
```
php artisan browscap:update
```
```
php artisan migrate
```

E finalmente, para rodar a aplicação inicie o servidor com:
```
php artisan serve
```
Acesse a aplicação via URL do servidor. Uma página simulando a página inicial de um site será exibida com uma mensagem e nenhuma formatação. Ela existe apenas para exemplo de contabilização de visitas. Todas a páginas do  site que você deseja monitorar (contador de visitas para o dashboard) devem estar incluídas nas rotas do Laravel e dentro do middleware group "stats" conforme o exemplo dessa página inicial citada no arquivo de rotas web.

Para acessar o admin: http://seu_host/admin.

Ex: http://localhost:8000/admin

Usuário: **usuario@admin.com**
\
Senha: **admin01**