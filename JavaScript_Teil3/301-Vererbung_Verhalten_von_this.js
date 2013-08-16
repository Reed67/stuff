function Person(LastName, FirstName) {
    'use strict';
    var that = this;
    this.Name = LastName;
    this.FName = FirstName;
    /* Methode ist Methode des eigenen Objektes */
    this.myFunction = function() {
        console.log(this.Name);
        console.log(that.Name);
        console.log(this);
    }
    /* globale Methode wird zu Methode des Windowobjektes */
    myOtherFunction = function() {
        console.log(this.Name);
        console.log(that.Name);
        console.log(this);
    }
}
var Salesman = new Person('Mustermann', 'Max');
console.log(Salesman);
/* funtioniert nicht */
window.myFunction();
/* funtioniert */
Salesman.myFunction();

/* funtioniert */
window.myOtherFunction();
/* funtioniert nicht myFunction ist keine Methode von Person */
Salesman.myOtherFunction();
