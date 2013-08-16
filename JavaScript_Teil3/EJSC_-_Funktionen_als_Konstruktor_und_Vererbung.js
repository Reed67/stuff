
///// Klassen / Konstruktor-Funktionen /////////////////////////////////////////////////////////////

/**
 * neuer Daten-Typ (in anderen Sprachen würde man sagen Klasse) {Auto}
 * 
 * @constructor
 * 
 * @param  {string} marke
 * @param  {string} farbe
 * @return {Auto}
 */
function Auto(marke, farbe) {
    // "private" Eigenschaft, nur innerhalb des Konstruktors sichtbar
    var raeder = 4;
    var kmh    = 130;
    
    // dynamische "öffentliche" Eigenschaften setzen
    this.marke = marke;
    this.farbe = farbe;
    
    // dynamische "öffentliche" Methoden setzen
    // wird im Konstruktor definiert, damit sie auf private Eigenschaften zugreifen kann
    this.info = function() {
        alert('Marke: ' + this.marke + ', Farbe: ' + this.farbe + ', Raeder: ' + raeder + ', Tueren: ' + this.tueren);
    };
    
    this.kmh  = function() {
        return kmh;
    }
}

/**
 * statische öffentliche Eigenschaft über prototype (Object-Entwurf) definieren
 * @var {number}
 */
Auto.prototype.tueren = 4;

/**
 * statische öffentliche Methode über prototype (Object-Entwurf) definieren
 * @return {void}
 */
Auto.prototype.fahre = function() {
    alert('ich fahre jetzt: ' + this.kmh());
}


/**
 * Probe: eigenes Auto erzeugen
 */
var meinAuto = new Auto('Opel', 'schwarz');
meinAuto.info();
meinAuto.fahre();



///// Vererbung ////////////////////////////////////////////////////////////////////////////////////

/**
 * soll von Auto erben
 * 
 * @constructor
 * 
 */
function LKW(marke, farbe) {
    this.marke = marke;
    this.farbe = farbe;
};

/**
 * 1. einfachste Möglichkeit: setzen des Prototypen:
 */
LKW.prototype = new Auto;

// jetzt können wir Eigenschaften und Methoden überschreiben
LKW.prototype.tueren = 2;

/**
 * 2. besser: Vererbung ohne Aufruf des Eltern-Konstruktors bei der Vererbung
 *            dafür im aktuellen Konstuktor
 */
function LKW(marke, farbe) {
    Auto.call(this, marke, farbe); // noch besser: Auto.apply(this, arguments);
}
 
// leere Dummy-Funktion erzeugen und Prototypen übergeben
var dummy = function() {};
dummy.prototype = fct.prototype;
// Methoden und Eigenschaften erben
LKW.prototype = new dummy();
// .constructor-Eigenschaft von .prototype wieder korrekt setzen
LKW.prototype.constructor = LKW;

/**
 * 3. wir schreiben eine Helfer-Funktion um den relativ aufwändigen Vererbungsablauf zu vereinfachen
 *    im konkreten Fall erweitern wir den Daten-Typ Function um die Methode `inherit`
 *    um Methoden und Eigenschaften einer anderen Konstruktor-Funktion zu erben
 * 
 * @param  {function} fct "Eltern"-Funktion (-Klasse)
 * @return {function) gibt sich selbst zurück (fluent-interface)
 */
Function.prototype.inherit = function(fct) {
    // leere Dummy-Funktion erzeugen und Prototypen übergeben
    var dummy = function() {};
    dummy.prototype = fct.prototype;
    
    // "normale" Methoden und Eigenschaften erben
    this.prototype = new dummy();
    this.prototype.constructor = this;
    
    // statische Methoden und Eigenschaften erben, wenn vorhanden
    for (var name in fct) {
        this[name] = fct[name];
    }
    
    // Eltern-Klasse "merken"
    this.prototype.super = fct;
    
    return this;
};

/**
 * neuer Daten-Typ {VW}, soll von {Auto} erben
 * 
 * @param  {string} farbe
 * @return {VW}
 */
function LKW(farbe) {
    // wir benutzen den Eltern-Konstruktor (in php würde man schreiben: parent::__contruct();)
    // mit .apply(this, arguments) binden wir den Konstruktor an das erzeugte Objekt und übergeben alle Parameter
    this.super.apply(this, arguments);
    
    // ggf. Überschreiben dynamischer Eigenschaften / Methoden, wenn nötig
    var kmh = 80;
    this.kmh = function() {
        return kmh;
    }
}

/**
 * nun erben wir alle Methoden von {Auto}
 * bitte ERST erben, dann neue Eigenschaften und Methoden via proto
 */
LKW.inherit(Auto);

LKW.prototype.tueren = 2;
