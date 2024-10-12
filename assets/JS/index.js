/* --------------------------------------------------SLIDER--------------------------------- */

const paysages = ["./assets/IMG/paysages/L2_1.jpeg", "./assets/IMG/paysages/L2_2.jpeg", "./assets/IMG/paysages/L2_3.jpeg", 
                "./assets/IMG/paysages/L3_1.jpeg", "./assets/IMG/paysages/L3_2.jpeg", "./assets/IMG/paysages/L3_3.jpeg", "./assets/IMG/paysages/L4_1.jpeg", 
                "./assets/IMG/paysages/L4_2.jpeg", "./assets/IMG/paysages/L4_3.jpeg", "./assets/IMG/paysages/L5_1.JPEG", "./assets/IMG/paysages/L5_2.jpeg", 
                "./assets/IMG/paysages/L5_3.jpeg", "./assets/IMG/paysages/L6_1.jpeg", "./assets/IMG/paysages/L6_2.jpeg", "./assets/IMG/paysages/L6_3.jpeg", 
                "./assets/IMG/paysages/L7_1.jpeg", "./assets/IMG/paysages/L7_2.jpeg", "./assets/IMG/paysages/L7_3.jpeg"];
let nature = 0;
function movePaysages(sens) {
    nature = nature + sens;

if(nature < 0){
nature = paysages.length -1;
}
    else if(nature > paysages.length -1) {
        nature = 0;
    }
    document.getElementById("img_paysages").src = paysages[nature];
}
setInterval(function() {
    movePaysages(1);
},  3000);

/* --------------------------------------------------MENU BURGER--------------------------------- */

const menu = document.querySelector('.menu');
const fermerMenu = document.querySelector('.fermerMenu');
const ouvrirMenu = document.querySelector('.ouvrirMenu');

ouvrirMenu.addEventListener('click', show);
fermerMenu.addEventListener('click', close);

function show() {
    menu.style.display = 'flex';
    menu.style.top = '0';
}

function close() {
    menu.style.top = '-100%';
}