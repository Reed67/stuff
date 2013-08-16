var Basisklasse = function() {
    this.valX = 10;
    this.valY = 20;
    this.meth = function() {return this.valX * this.valY}
}
var Instanz1 = new Basisklasse;
console.log(Instanz1.valX);
console.log(Instanz1.valY);
console.log(Instanz1.meth);
console.log(Instanz1.meth());
var Instanz2 = new Basisklasse;
Instanz2.valX = 40;
Instanz2.meth = function() {return this.valX / this.valY};
console.log(Instanz1.meth);
console.log(Instanz1.valX);
console.log(Instanz2.valX);
console.log(Instanz2.valY);
console.log(Instanz2.meth());
Basisklasse.meth2=function(){return Math.PI}
Basisklasse.meth2(); // liefert Pi
console.log(Instanz1.meth2()); // TypeError: Object [object Object] has no method 'meth2' --> Rest wird nicht mehr ausgeführt
console.log(Instanz2.meth2()); // TypeError: Object [object Object] has no method 'meth2' --> Rest wird nicht mehr ausgeführt


//* folgender Code führt zum Ergebnis
Basisklasse.prototype.meth2 = function() {return Math.PI}
console.log(Instanz1.meth2()); // liefert Pi
console.log(Instanz2.meth2()); // liefert Pi
//*/