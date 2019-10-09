# API Documentatie

## Inhoud
- [Categorieeen](#categorieeen)
    - [Verkrijg alle categorieeen](#verkrijg-alle-categorieeen)
- [Producten](#producten)
    - [Verkrijg alle producten](#verkrijg-alle-producten)
- [API Info](#api-info)

## Categorieeen

#### Verkrijg alle categorieeen

Voorbeeld request:

`GET /api/v1/categorie/get`

Voorbeeld response:

```json
{
    "return": "array",
    "array": {
        "record_name": "categorie",
        "records": [
            {
                "id": "1",
                "name": "Novelty Items",
                "last_edited": "1",
                "valid_from": "2013-01-01 00:00:00",
                "valid_to": "9999-12-31 23:59:59"
            },
            {
                "id": "2",
                "name": "Clothing",
                "last_edited": "1",
                "valid_from": "2013-01-01 00:00:00",
                "valid_to": "9999-12-31 23:59:59"
            }
        ]
    }
}
```

## Producten

#### Verkrijg alle producten

Voorbeeld requests:

`GET /api/v1/product/get`

`GET /api/v1/product/get?limit=50`

Query Parameters:

| Parameter | Required? | Description |
| --------- | --------- | ----------- |
| `limit` | optional, default 20 | Maximale hoeveelheid producten er gereturned moeten worden.


Voorbeeld response:

```json
{
    "return": "array",
    "array": {
        "record_name": "product",
        "records": [
            {
                "id": "1",
                "name": "USB missile launcher (Green)",
                "supplier_id": "12"
            },
            {
                "id": "2",
                "name": "USB rocket launcher (Gray)",
                "supplier_id": "12"
            }
        ]
    }
}
```

## API Info

_Geeft actuele informatie over de API._

Voorbeeld request:

`GET /api/v1/api`

Voorbeeld response:

```json
{
    "return": "info",
    "info": {
        "version": "v1.0.0.0",
        "impl": "standard",
        "client": {
            "name": "Wide World Importers",
            "logo": "img/logo/small-250x90.png"
        }
    }
}
```
