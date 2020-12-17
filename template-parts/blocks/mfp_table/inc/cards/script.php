<?php
 /*** SCRIPT ***/
 $html .= '<script type="application/javascript">
 // document.addEventListener("DOMContentLoaded", function(e) {
    const '.$block['id'].'cards = document.querySelectorAll(".icon_info_wr'.$block['id'].'");
 
    function flipCard() {
        this.parentElement.parentElement.classList.toggle("is-flipped");
    }
    '.$block['id'].'cards.forEach((card'.$block['id'].') => card'.$block['id'].'.addEventListener("click", flipCard));
 // });

 </script>';
   /*** / SCRIPT ***/