/* Create databases */
DROP DATABASE IF EXISTS fear;
CREATE DATABASE IF NOT EXISTS fear;
USE fear;

/* Create tables */
DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (

    /* Internal ID, unique for each user */
    `id`          int(32)      NOT NULL AUTO_INCREMENT PRIMARY KEY,

    /* E-mail,                   ex.: "jakemiller@example.com" */
    `email`       varchar(128),
    /* Username,                 ex.: "jakemiller" */
    `name`        varchar(64)  NOT NULL,
    /* First name,               ex.: "Jake"       */
    `first_name`  varchar(32),
    /* Last name (surname),      ex.: "Miller"     */
    `last_name`   varchar(32),

    /*
     * password = hash
     * hashver =
     *   - 1: argon2i
     */
    `hashver`     tinyint      NOT NULL,
    `password`    varchar(255) NOT NULL,

    /* If disabled is active, users will not be able to log into the account */
    `disabled`    boolean      NOT NULL DEFAULT FALSE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Category`;
CREATE TABLE IF NOT EXISTS `Category` (

    /* Internal ID, unique for each category */
    `id`          int(32)      NOT NULL AUTO_INCREMENT PRIMARY KEY,

    /* URL Key,                    ex.: "tablets-and-smartphones" */
    `key`         varchar(64)  NOT NULL,
    /* User friendly name,         ex.: "Tablets and Smartphones" */
    `name`        varchar(64)  NOT NULL,
    /* User friendly description,  ex.: "These are our best handhelds!" */
    `description` longtext,
    /* Relative path to the image, ex.: "/img/category/hello.png" */
    `image`       varchar(255),

    /* Is active/visible? */
    `active`      boolean      NOT NULL DEFAULT FALSE,
    /* Not used yet. */
    `mode`        smallint     NOT NULL DEFAULT 0,

    `last_editor` int(32)      NOT NULL,
    FOREIGN KEY (last_editor)  REFERENCES User(id),
    `created`     timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified`    timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/* Insert default data */
INSERT INTO `User`
    (`id`, `name`,          `hashver`, `password`, `disabled`) VALUES
    (-1,   'System User',    1,        '',          TRUE     )
    ;

INSERT INTO `Category`
    (`id`,  `key`,         `name`,         `active`, `last_editor`) VALUES
    (10001, 'tablets',     'Tablets',       TRUE,     -1          ),
    (10002, 'smartphones', 'Smartphones',   TRUE,     -1          ),
    (10003, 'laptops',     'Laptops',       TRUE,     -1          )
    ;

/* Create users */
DROP USER IF EXISTS 'fear-api'@'localhost';
CREATE USER IF NOT EXISTS 'fear-api'@'localhost' IDENTIFIED BY 'change_me!';
GRANT SELECT ON fear.Category TO 'fear-api'@'localhost';
