<?php
 /*** SCRIPT ***/
 $html .= '<script>
 // document.addEventListener("DOMContentLoaded", function(e) {
    const cards = document.querySelectorAll(".icon-info-wr");
 
    function flipCard() {
        this.parentElement.parentElement.classList.toggle("is-flipped");
    }
    cards.forEach((card) => card.addEventListener("click", flipCard));
// });

 </script>';
   /*** / SCRIPT ***/