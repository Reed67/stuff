function Person (LastName, FirstName) {
    this.Name = LastName;
    this.FName = FirstName;
}
function Employee(LastName, FirstName, Dep) {   
    this.constructor(LastName, FirstName);
    this.Department = Dep;
}
Employee.prototype = new Person();

var Salesman = new Employee('Mustermann', 'Max', 'Sale');
console.log(Salesman);
var Manager = new Employee('Schuster', 'Hans', 'Management');
console.log(Manager);
console.log(Salesman.hasOwnProperty('Name'));
console.log(Manager.hasOwnProperty('Name'));

Employee.prototype.Age = 30;
Salesman.Age = 42;
console.log(Salesman.Age);
console.log(Manager.Age);
console.log(Salesman.hasOwnProperty('Age'));
console.log(Manager.hasOwnProperty('Age'));
