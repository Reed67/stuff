var myPerson = new Object();
myPerson.name = 'Mustermann';
myPerson.firstname = 'Max';
myPerson.age = 25;
myPerson.celebrateBirthday = function() {
    this.age++; 
}
console.log(myPerson);
myPerson.celebrateBirthday();
console.log(myPerson.age);
console.log('Jahre bis zur Rente: ', 67 - myPerson.age);


delete myPerson.name;
delete myPerson.firstname;
delete myPerson.age;
delete myPerson.celebrateBirthday;
console.log(myPerson);
console.log('Jahre bis zur Rente: ', 67 - myPerson.age);
