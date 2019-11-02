/* <1> Deze code zorgt er voor dat de navigatiebalk blijft "plakken" aan de bovenkant van het scherm */
document.addEventListener("DOMContentLoaded", function () {
    window.onscroll = function() {
        onNavScroll()
    };

    /**
     * Functie om de offset van element naar pagina top in pixels te bepalen
     */
    const getOffsetTop = element => {
        let offsetTop = 0;
        while (element) {
            offsetTop += element.offsetTop;
            element = element.offsetParent;
        }
        return offsetTop;
    };

    const navigatiebalk = document.getElementById("navigatie-categorieen");
    const standaardOffset = getOffsetTop(navigatiebalk);

    /**
     * Deze functie wordt gecalled als de user scrollt (zie window.onscroll).
     */
    function onNavScroll() {
        if (window.pageYOffset >= standaardOffset) {
            navigatiebalk.classList.add("stick")
        } else {
            navigatiebalk.classList.remove("stick");
        }
    }
});
/* </1> */

