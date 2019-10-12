/* Create databases */
DROP DATABASE IF EXISTS fear;
CREATE DATABASE IF NOT EXISTS fear;
USE fear;

/* Create tables */
DROP TABLE IF EXISTS `Category`;
CREATE TABLE IF NOT EXISTS `Category` (

    /* Internal ID, unique for each category */
    `id`       int(32)     NOT NULL AUTO_INCREMENT PRIMARY KEY,

    /* URL Key,            ex.: "tablets-and-smartphones" */
    `key`      varchar(64) NOT NULL,
    /* User Friendly name, ex.: "Tablets and Smartphones" */
    `name`     varchar(64) NOT NULL,

    /* Is active/visible? */
    `active`   boolean     NOT NULL,
    /* Not used yet. */
    `mode`     smallint    NOT NULL

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/* Insert default data */
INSERT INTO `Category`
    (`id`,  `key`,         `name`,         `active`, `mode`) VALUES
    (10001, 'tablets',     'Tablets',       TRUE,     0    ),
    (10002, 'smartphones', 'Smartphones',   TRUE,     0    ),
    (10003, 'laptops',     'Laptops',       TRUE,     0    );

/* Create users */
DROP USER IF EXISTS 'fear-api'@'localhost';
CREATE USER IF NOT EXISTS 'fear-api'@'localhost';
GRANT SELECT ON fear.Category TO 'fear-api'@'localhost';
