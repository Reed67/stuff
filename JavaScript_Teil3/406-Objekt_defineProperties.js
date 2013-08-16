var Person = {}
Object.defineProperties(Person,
    {
    'age': {
        writable: true,
        enumerable: true,
        configurable: true,
        value: 18
        },
    'birthday': {
        writable: true,
        enumerable: true,
        configurable: false,
        value: function() {
            this.age++;
            console.log(this.age);
            }
        }
    }
);
console.log(Person.age);
console.log(Person.birthday());
var John = Object.create(Person, {'name': {value: 'John', enumerable:true}});
console.log(John);

