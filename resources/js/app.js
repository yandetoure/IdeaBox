import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();






function maFonction(param1, param2) {
    // Code de la fonction(instructions)
    return param1 + param2;
}


let a;
console.log(a); // Affiche "undefined"


let b = null;
console.log(b); // Affiche "null"



let c = "abc" / 4;
console.log(c); // Affiche "NaN"




let age = 18;

if (age < 18) {
    console.log("Vous êtes mineur.");
} else if (age === 18) {
    console.log("Vous avez exactement 18 ans.");
} else {
    console.log("Vous êtes majeur.");
}



for (let i = 0; i < 5; i++) {
    console.log("Itération n°", i);
}
