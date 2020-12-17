<?php
 /*** SCRIPT ***/
 $html .= '<script type="application/javascript">

 document.addEventListener("DOMContentLoaded", function(e) {
    const '.$block['id'].'cards = document.querySelectorAll(".icon-info-wr");
 
    function flipCard() {
        this.parentElement.parentElement.classList.toggle("is-flipped");
    }
    '.$block['id'].'cards.forEach((card) => card.addEventListener("click", flipCard));
 });

 </script>';
   /*** / SCRIPT ***/