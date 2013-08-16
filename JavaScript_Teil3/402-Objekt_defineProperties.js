var myPerson = {}
Object.defineProperties(myPerson, {
    'name': {
        writable: true,
        enumerable: true,
        configurable: true,
        value: ''
    },
    'firstname': {
        writable: true,
        enumerable: false,
        configurable: false,
        value: ''
    },
    'age': {
        writable: true,
        enumerable: true,
        configurable: true,
        value: 0
    },
    'celebrateBirthday': {
        writable: true,
        enumerable: false,
        configurable: true,
        value: function() {
               this.age++
               }
    }
});
myPerson.name = 'Mustermann';
myPerson.firstname = 'Max';
for(prop in myPerson) {
    console.log(prop, myPerson[prop]);
}

// Gibt die komplette property descriptor map fuer Property als Objekt zurück
console.log(Object.getOwnPropertyDescriptor(myPerson, 'firstname'));
