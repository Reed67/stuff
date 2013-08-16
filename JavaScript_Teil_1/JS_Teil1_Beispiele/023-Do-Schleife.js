var Bestaetigung = true;
var i = prompt('Bitte Startwert angeben!');
do {
    Bestaetigung =
           window.confirm('Test');
    alert(i++);
} while(Bestaetigung);
