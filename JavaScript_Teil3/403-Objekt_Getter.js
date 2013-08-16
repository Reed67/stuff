var myPerson = {
    age: 18,
    get getAge(){
	return age;
	}
}
console.log(myPerson.getAge);
myPerson.name = 'Mustermann';
console.log(myPerson.getName);
Object.defineProperties(myPerson, {
    'getName': { get: function () { return this.name; } }
});
console.log(myPerson.getName);
