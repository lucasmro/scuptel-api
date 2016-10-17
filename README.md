# ScupTel - Talk More (Backend)

**To read this document in Brazilian Portuguese, access the [README.pt-br.md](README.pt-br.md) file.**

Web system to simulate the cost of a phone call of ScupTel (fictitious company) customers.

## How it works?

The customers must inform the connection duration (time), the originated area code (source) and the destination area code. The result will be presented as a comparison table between all plans.

## Documentation

The challenge documentation can be found in [ShowMeTheCode-Backend.pdf](docs/ShowMeTheCode-Backend.pdf).

## Technologies and requirements

- PHP 5.5.9
- Silex 2
- Composer
- PHPUnit
- Apache 2

## Setup

    $ composer install
    $ php app/console project:setup www-data
    
**NOTE:** www-data is the apache user on ubuntu linux distribution, use another user if necessary.

## Test suite

    $ phpunit
    
36 tests, 87 assertions.

## Code Coverage

After running the test suite (phpunit), an HTML report will be generated in "build/coverage/index.html"

## API

### Simulate Price

**Example request:**

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

**Example response:**

- **200** OK

```html
    {
      "falemais-30": 317.9,
      "falemais-60": 261.8,
      "falemais-120": 149.6,
      "no-plan": 340
    }
```

### Plans 

**Example request:**

- **GET** [http://localhost/plans](http://localhost/plans)
- **Accept:** application/json
- **Content-Type:** application/json

**Example response:**

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

### Area Codes

**Example request:**

- **GET** [http://localhost/area-codes](http://localhost/area-codes)
- **Accept:** application/json
- **Content-Type:** application/json

**Example response:**

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

### Prices 

**Example request:**

- **GET** [http://localhost/prices](http://localhost/prices)
- **Accept:** application/json
- **Content-Type:** application/json

**Example response:**

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
