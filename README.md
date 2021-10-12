<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Documentação API Simulador em Laravel

Esta aplicação é responsável por ler três arquivos .JSON, retornando seus convênios, instituições, taxas e "realizar" simulações de empréstimos.

Bibliotecas e versões utilizadas nesse sistema:

- "php": ^7.3
- "laravel/framework": 8.54

Abaixo segue o passo a passo para executar o projeto e realizar os testes

### Passo a Passo

- Realizar o download do repositório
- Abrir o CMD no diretório root do projeto e executar "composer update"
- Iniciar o ambiente de desenvolvimento do laravel "php artisan serve"
- Observação importantes:
    -   Os arquivos .JSON estão sendos lidos dentro da pasta "\storage\app\public\", por exemplo:
        - "\storage\app\public\simulador\convenios.json"
        - "\storage\app\public\simulador\instituicoes.json"
        - "\storage\app\public\simulador\taxas_instituicoes.json"
    - Dito isso, por gentileza ao realizar o download do sistema para a sua máquina, mova também os arquivos, obrigado.

#### Rotas

- Documentação das Rotas:
    - https://documenter.getpostman.com/view/9534004/UV5TFKg4
    - Lista de Rotas:
        - api/v1
        - api/v1/convenios
        - api/v1/instituicoes
        - api/v1/simulador


