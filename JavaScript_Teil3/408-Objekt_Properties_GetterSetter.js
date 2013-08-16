Person = {}
Object.defineProperty( Person, "age", {
  value: 18,
  writable: false,
  enumerable: true,
  configurable: true
});
console.log(Person.age);


