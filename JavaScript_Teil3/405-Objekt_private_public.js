var Person = function() {
    this.age = 18;
    var pnr = '0123456789';
    this.getPnr = function() { return pnr; };
    function checkPnr() { 
                         return !isNaN(pnr);
                         }
    this.Pnr = function() {
          return (checkPnr()) ? 'gesetzt' : 'nicht gesetzt';
          }
}
myPerson = new Person();
console.log(myPerson.age, myPerson.pnr);
console.log(myPerson.getPnr());
console.log(myPerson.checkPnr());