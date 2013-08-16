var myPerson = {
    age: 18,
    set setAge(newAge) {
	this.age = newAge;
	}
}
myPerson.setAge=20;
console.log(myPerson.age);
myPerson.name = 'Mustermann';
Object.defineProperties(myPerson, {
    'setName': { set: function (newName) { this.name = newName; } }
});
console.log(myPerson.name);
myPerson.setName='Meier';
console.log(myPerson.name);
