# INSTRUÇÕES PARA INSTALAÇÃO
# REQUISITOS
• Node v22.16.0 (https://nodejs.org/pt-br/download)

• MySQL Server 9.7.1 (https://dev.mysql.com/downloads/mysql/8.0.html)

• PHP 8.5.0

• Composer 2.8.12

COMANDO PARA INSTALAR PHP + COMPOSER:

#Run as administrator...

Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))

#EXECUTANDO O FRONTEND:

• Na pasta do frontend, executar: npm install e npm run dev para instalar dependências e rodar o servidor. 

#EXECUTANDO O BACKEND:
