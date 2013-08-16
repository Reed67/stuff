var myPerson = new Object();
myPerson.name = 'Mustermann';
myPerson.firstname = 'Max';
myPerson.age = 25;
myPerson.celebrateBirthday = function() {
    this.age++; 
}
myPerson.celebrateBirthday();

function iterateObject(obj){
    for(var prop in obj){
        console.log(prop, obj[prop]);
    }
}

iterateObject(myPerson);


