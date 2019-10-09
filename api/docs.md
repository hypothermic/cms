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
    "return":"array",
    "array":{
        "record_name":"product",
        "records":[
            {
                "id":"75",
                "name":"Ride on big wheel monster truck",
                "supplier":"Northwind Electric Cars",
                "color":"Black",
                "package_unit":"Each",
                "package_outer":"Each",
                "qty_per_outer":"1",
                "brand":"Northwind",
                "size":"1\/12 scale",
                "lead_time":"14",
                "is_chill":"0",
                "barcode":"",
                "tax":"15.000",
                "price_unit":"345.00",
                "price_recommended":"515.78",
                "weight":"21.000",
                "comments_marketing":"Suits child to 20 kg",
                "photo":"",
                "custom_fields":"{ \"CountryOfManufacture\": \"China\", \"Tags\": [\"So Realistic\"] }",
                "tags":"[\"So Realistic\"]"
            },
            {
                "id":"73",
                "name":"Ride on vintage American toy coupe",
                "supplier":"Northwind Electric Cars",
                "color":"Red",
                "package_unit":"Each",
                "package_outer":"Each",
                "qty_per_outer":"1",
                "brand":"Northwind",
                "size":"1\/12 scale",
                "lead_time":"14",
                "is_chill":"0",
                "barcode":"",
                "tax":"15.000",
                "price_unit":"285.00",
                "price_recommended":"426.08",
                "weight":"18.000",
                "comments_marketing":"Suits child to 20 kg",
                "photo":"",
                "custom_fields":"{ \"CountryOfManufacture\": \"China\", \"Tags\": [\"Vintage\",\"So Realistic\"] }",
                "tags":"[\"Vintage\",\"So Realistic\"]"
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
