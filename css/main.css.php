/* Voeg hier CSS toe */

<?php
// Geef aan dat dit als CSS geintepreteerd moet worden
header('Content-Type: text/css');

// Uit vendor.php zijn we de constanten nodig.
include_once "../app/vendor.php";
?>

/* Dit is de gehele header area, "promotie" en "navigatie" vallen hierbinnen. */
#header {
    background: <?php echo VENDOR_THEME_COLOR_BACKGROUND ?>;
}

#promotie {
    margin: 1.2rem 0 0.9rem 0;
}

/* --- navigatie balken --- */
/** TODO: samenvoegen van alle gedeelde attributen van "navigatie-site" en "navigatie-categorieen" naar 1 shared klasse. */

/* Dit is de balk boven de navigatiebalk, waar website-navigatie in staat (zoals home, contact, account) */
#navigatie-site {
    background: <?php echo VENDOR_THEME_COLOR_DARK ?>;
}

/* Deze container zorgt dat alle onderliggende elementen samen niet breder kunnen zijn dan 70% van de pagina. */
#navigatie-site-container {
    display: flex;
    display: -webkit-flex;
    justify-content: end;
    align-items: end;
}

/* Dit zijn de individuele elementen binnen de navigatiebalk */
#navigatie-site-container div {
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;
    padding: 0.7rem 1.6rem;
    height: 100%;
    float: right;
}

#navigatie-site-container div:hover {
    background: <?php echo VENDOR_THEME_COLOR_PRIMARY ?>;
}

#navigatie-site-container a {
    color: <?php echo VENDOR_THEME_COLOR_TEXT_NORMAL ?>;
    text-align: center;
    text-decoration: none;
}

/* Dit is de grote navigatiebalk in de header */
#navigatie-categorieen {
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;

    margin: 0 0 4.1rem 0;
    padding: 0;

    min-height: 3rem;
    height: 4.5rem;
    max-height: 5.2rem;

    background: <?php echo VENDOR_THEME_COLOR_PRIMARY ?>;

    overflow: hidden;
}

/* Dit zijn de individuele elementen binnen de navigatiebalk*/
#navigatie-categorieen div {
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;
    padding: 0.7rem 1.6rem;
    height: 100%;
    float: left;
}

#navigatie-categorieen div:hover {
    background: <?php echo VENDOR_THEME_COLOR_SECONDARY ?>;
}

/*#navigatie div :hover {
    background: <?php echo VENDOR_THEME_COLOR_SECONDARY ?>;
}*/

#navigatie-categorieen a {
    color: <?php echo VENDOR_THEME_COLOR_TEXT_NORMAL ?>;
    text-align: center;
    text-decoration: none;
}

/* ---- utils ---- */

/* Deze class zorgt er voor dat iets aan de bovenkant van het scherm blijft hangen */
.stick {
    position: fixed;
    top: 0;
    margin-top: 0;

    width: 100%;
}

/** Vergroot en/of verkleint naar de resolutie van het apparaat (zie de media queries hieronder) */
.responsive-container {
    display: table;
    margin: 0 auto;

    width: 70%;
}

/* Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) {
    #responsive-container {
        width: 100%;
    }
}

/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {
    #responsive-container {
        width: 90%;
    }
}

/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) {
    #responsive-container {
        width: 85%;
    }
}

/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {
    #responsive-container {
        width: 70%;
    }
}

/* Dit is de grote balk die verschijnt als er een waarschuwing is */
#warning {
    padding: 1.2rem 2rem;

    width: 100%;

    background-color: red;

    color: white;
    text-align: center;
    font-size: 1.35rem;
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
