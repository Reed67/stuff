var obj = {};
 
Object.defineProperty( obj, "value", {
  value: true,
  writable: false,
  enumerable: true,
  configurable: true
});
obj.value=false;
console.log(obj.value);
/* liefert true */
Object.defineProperty( obj, "value", {
  writable: true,
  configurable: false
});
obj.value=false;
console.log(obj);
/* liefert Object {value: false} */
delete obj.value;
console.log(obj);
/* liefert Object {value: false} */
Object.defineProperty( obj, "value", {
  configurable: true
});
/* TypeError: Cannot redefine property: value */
delete obj.value;
console.log(obj);
/*
Object.defineProperty( obj, "name", {
    get: function(){ return name; },
    set: function(value){ name = value; }
    });
obj.name = 'Meier';
console.log(obj.name);
/* liefert 'Meier' */
for ( var prop in obj ) {
  console.log( prop );
}
/* liefert value */



