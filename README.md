# INSTRUÇÕES PARA INSTALAÇÃO
## REQUISITOS
• npm + Node v22.16.0 (https://nodejs.org/pt-br/download)

• MySQL Server 9.7.1 (https://dev.mysql.com/downloads/mysql/8.0.html)

• PHP 8.5.0

• Composer 2.8.12

#### COMANDO PARA INSTALAR PHP + COMPOSER (EXECUTAR COMO ADMIN) VIA WINDOWS POWERSHELL:

*Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))*

## EXECUTANDO O FRONTEND:

• Na pasta do frontend, executar: *npm install* e *npm run dev* para instalar dependências e rodar o servidor. 

**OBS**: o frontend acessa o banco na porta localhost:8000. Se necessário alterar, mude no arquivo api.ts no caminho: **src\services\api.ts**

## EXECUTANDO O BACKEND:

Dentro da pasta do backend executar: 

*npm install*

*composer install*

*composer run dev*

*php artisan migrate (inicializar banco de dados)*

## BANCO DE DADOS

Após instalar o MySQL Server, executar:

*mysql -u root -p*

*create database systemppc;*

## CONFIGURAÇÃO DO BANCO DE DADOS NO .ENV

DB_CONNECTION=mysql

DB_HOST=localhost

DB_PORT=3306

DB_DATABASE=systemppc

DB_USERNAME=root

DB_PASSWORD=


# Tela inicial
<img width="1381" height="677" alt="image" src="https://github.com/user-attachments/assets/9c2db7cf-8d09-4882-9ed8-15586c282694" />

