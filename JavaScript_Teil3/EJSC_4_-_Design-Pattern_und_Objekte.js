
///// Funktion: Unterscheidung zwischen "normaler" Funktion und Konstruktor ////////////////////////

/**
 * Test-Klasse
 * 
 * @constructor
 *
 * @param  {string} name
 * @param  {mixed}  value
 * @return {Test}
 */
function Test(name, value) {
    if (this instanceof Test) {
        // this (also Objekt) ist eine Instanz der aufrufenden Funktion: Konstruktor
        this.name = name;
        this.value = value;
        
    } else if (Test.allowFactory) {
        // wenn factory erlaubt ist:
        var obj = new Test(name, value);
        return obj;
        
    } else {
        // sonst ...
        throw 'use function only as constructor';
    }
}

/**
 * @var {boolean}
 */
Test.allowFactory = false;

// ..... Probe .................................................................................. //

/**
 * Probe Konstruktor
 */
var obj = new Test('hallo', 12);
alert(obj.name);

/**
 * Probe Funktion
 */
var obj = Test('huhu', 14);
alert(obj.name);

/**
 * Probe Funktion - Factory
 */
Test.allowFactory = true;
var obj = Test('huhu', 14);
alert(obj.name);



///// Singleton-Pattern ////////////////////////////////////////////////////////////////////////////

/**
 * Wir bauen uns eine Klasse, die das Singleton-Entwurfsmuster implementiert
 * 
 * @constructor
 *
 * @return {Single}
 */
function Single() {
    var fct = arguments.callee;
    if (Single.caller != Single.getInstance) {
        throw 'singleton pattern, use "getInstance()"-method';
    }
    
    // code
}

/** Closure, wir benutzen die Gültigkeitsbereiche um die Variable `instance` nach außen zu verbergen */
(function() {
    
    /** @var {Single} */
    var instance;

    /**
     *
     * @return {Single}
     */
    Single.getInstanceOf = function() {
        if (!this._instance) {
            this._instance = new this();
        }
        
        return this._instance;
    };
    
})();

// ..... Probe .................................................................................. //

/**
 * mit Konstruktor
 */
var obj = new Single; // Fehler
alert(obj);

/**
 * mit getInstanceOf()
 */
var obj = Single.getInstance();
alert(obj);



///// Anwendungs-Bsp.: Lazy-Binding ////////////////////////////////////////////////////////////////

/**
 * Anwendungs-Bsp. Lazy-Binding -> spätes Binden von Methoden
 * 
 */
var Elem = function(id) {
    this.el = document.getElementById(id);
};

/**
 * das ist die "faul" gebundene Methode
 */
Elem.prototype.css = function() {
    var getCss;
    // beim ersten Aufruf der Methode entscheiden wir, was sie tun soll, in dem Fall ist Browser-abhängig
    if (document.defaultView && 'function' === typeof document.defaultView.getComputedStyle) {
        // alle "vernünftigen" Browser ;) ...
        getCss = function() { 
            return document.defaultView.getComputedStyle(this.el);
        };
    } else {
        // ... außer die ollen IEs :(
        getCss = function() {
            return this.el.currentStyle;
        }
    }
    
    // jetzt erst weisen wir die korrekte Methode
    // sowohl dem aktuellen Objekt als auch dem Konstukoer-Prototypen zu
    this.css =
    this.constructor.prototype.css = getCss;
    
    // und nun führen wir die aus und binden sie dabei ans Objekt
    return getCss.call(this);
};

/**
 * test 
 */
var el = new Elem('wrapper');

el.css();



///// Objekt-Konvertierung /////////////////////////////////////////////////////////////////////////

/**
 * ein simples Object
 */
var obj = {
    title: 'mein Titel',
    value: 12
}

alert(obj); // irgendwas wie "Object"

/**
 * Konverierung in String steuern
 */
obj.toString = function() {
    return 'object-string: ' + this.title;
};

/**
 * Konvertierung in Wert/Zahl steuern
 */
obj.valueOf = function() {
    return this.value;
};

 // Voilá: "object-string: mein Titel"
alert(obj);

// was hier heraus kommt unterscheidet sich je nach Browser und Version
// EIGENTLICH sollte hier die .toString-Methode aufgerufen werden
alert('Object ist ' + obj);
// besser explizit erzwingen:
alert('Object ist ' + String(obj));

// hier sollte ausgegeben werden was wir erwarten: 17
alert(obj - -5);
// falls nicht, dann sollte auch hier die Konvertierung erzwungen werden
alert(Number(obj) + 5);