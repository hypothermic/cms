# Hoe werken templates?

Om code niet meerdere keren in te hoeven typen gebruiken we templates.

Bijvoorbeeld, in plaats van in `index.php` en `inloggen.php` allebei de volledige code voor de header te typen,
hebben we de header in een apart bestand getypt en includen we hem in de voorgenoemde pagina's.
Nu hoeven we de header ook maar op 1 plaats te wijzigen en het updatet op elke pagina.

## Include met PHP

Typ het volgende ergens in de pagina body:

```php
<?php
    include("tpl/header_template.php");
?>
```
Nu komt de volledige header code uit de template in in plaats van de vorige code te staan.
