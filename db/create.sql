/* Maak database aan */
DROP DATABASE IF EXISTS cms;
CREATE DATABASE IF NOT EXISTS cms;
USE cms;

/* Maak tabel Catagorie met sample data */
DROP TABLE IF EXISTS `Categorie`;
CREATE TABLE IF NOT EXISTS `Categorie` (

    /* Interne ID */
    `id`       int(32)     NOT NULL AUTO_INCREMENT PRIMARY KEY,

    /* URL Key,            "tablets-en-smartphones" */
    `key`      varchar(64) NOT NULL,
    /* User Friendly naam, "Tablets en Smartphones" */
    `name`     varchar(64) NOT NULL,

    /* Is de categorie actief/zichtbaar? */
    `active`   boolean     NOT NULL,
    /* Mode, wordt nog niet gebruikt */
    `mode`     smallint    NOT NULL

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `Categorie`
    (`id`,  `key`,         `name`,         `active`, `mode`) VALUES
    (10001, 'tablets',     'Tablets',       TRUE,     0    ),
    (10002, 'smartphones', 'Smartphones',   TRUE,     0    ),
    (10003, 'laptops',     'Laptops',       TRUE,     0    );

/* Maak users aan
        TOELICHING USERS:
        - api-local: PHP api user
*/
DROP USER IF EXISTS 'api-local'@'localhost';
CREATE USER IF NOT EXISTS 'api-local'@'localhost';
GRANT SELECT ON cms.Categorie TO 'api-local'@'localhost';
