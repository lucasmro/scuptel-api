# ScupTel - Fale Mais

Sistema web para simular o custo da ligação telefônica dos clientes da empresa ScupTel.

## Como funciona?

Os clientes da ScupTel deverão informar o tempo de duração da ligação, o DDD de origem e de destino da ligação.
O resultado será um comparativo entre os planos do produto "Fale Mais".

## Requisitos

- Apache 2
- PHP 5.5.9
- Composer
- PHPUnit

## Instalação

    $ composer install
    $ php app/console project:setup www-data
    
**OBS:** www-data é o usuário do apache na distribuição ubuntu linux, use outro usuário caso necessário. 

## Suíte de testes

    $ phpunit
    
36 tests, 87 assertions.

## Code Coverage

Após a execução da suíte de testes (phpunit), um relatório em HTML será gerado em: "build/coverage/index.html"

## API

### Simular Preço

**Exemplo de requisição:**

- **POST** [http://localhost/price-simulator](http://localhost/price-simulator)
- **Accept:** application/json
- **Content-Type:** application/json

```html
    {
        "fromAreaCode": 11,
        "toAreaCode": 17,
        "timeInMinutes": 200
    }
```

**Exemplo de resposta:**

- **200** OK

```html
    {
      "falemais-30": 317.9,
      "falemais-60": 261.8,
      "falemais-120": 149.6,
      "no-plan": 340
    }
```

### Planos 

**Exemplo de requisição:**

- **GET** [http://localhost/plans](http://localhost/plans)
- **Accept:** application/json
- **Content-Type:** application/json

**Exemplo de resposta:**

- **200** OK

```html
    {
      "data": [
        {
          "id": "falemais-30",
          "name": "FaleMais 30",
          "timeInMinutes": 30,
          "additionalMinuteRate": 0.1
        },
        {
          "id": "falemais-60",
          "name": "FaleMais 60",
          "timeInMinutes": 60,
          "additionalMinuteRate": 0.1
        },
        {
          "id": "falemais-120",
          "name": "FaleMais 120",
          "timeInMinutes": 120,
          "additionalMinuteRate": 0.1
        }
      ],
      "total": 3
    }
```

### Códigos de Área 

**Exemplo de requisição:**

- **GET** [http://localhost/area-codes](http://localhost/area-codes)
- **Accept:** application/json
- **Content-Type:** application/json

**Exemplo de resposta:**

- **200** OK

```html
    {
      "data": [
        {
          "code": 11,
          "name": "São Paulo"
        },
        {
          "code": 16,
          "name": "Ribeirão Preto"
        },
        {
          "code": 17,
          "name": "Mirassol"
        },
        {
          "code": 18,
          "name": "Tupi Paulista"
        }
      ],
      "total": 4
    }
```

### Preços 

**Exemplo de requisição:**

- **GET** [http://localhost/prices](http://localhost/prices)
- **Accept:** application/json
- **Content-Type:** application/json

**Exemplo de resposta:**

- **200** OK

```html
    {
      "data": [
        {
          "origin": {
            "code": 11,
            "name": "São Paulo"
          },
          "destiny": {
            "code": 16,
            "name": "Ribeirão Preto"
          },
          "price": 1.9
        },
        {
          "origin": {
            "code": 16,
            "name": "Ribeirão Preto"
          },
          "destiny": {
            "code": 11,
            "name": "São Paulo"
          },
          "price": 2.9
        },
        {
          "origin": {
            "code": 11,
            "name": "São Paulo"
          },
          "destiny": {
            "code": 17,
            "name": "Mirassol"
          },
          "price": 1.7
        },
        {
          "origin": {
            "code": 17,
            "name": "Mirassol"
          },
          "destiny": {
            "code": 11,
            "name": "São Paulo"
          },
          "price": 2.7
        },
        {
          "origin": {
            "code": 11,
            "name": "São Paulo"
          },
          "destiny": {
            "code": 18,
            "name": "Tupi Paulista"
          },
          "price": 0.9
        },
        {
          "origin": {
            "code": 18,
            "name": "Tupi Paulista"
          },
          "destiny": {
            "code": 11,
            "name": "São Paulo"
          },
          "price": 1.9
        }
      ],
      "total": 6
    }
```
