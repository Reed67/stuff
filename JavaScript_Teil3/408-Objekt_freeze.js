var obj = {
    prop: function () {},
    foo: "baz"
  };
console.log(1, obj);
/* liefert
Object {prop: function, foo: "baz"}
*/

/* 
    neue Eigenschaften koennen hinzugefügt oder geloescht werden 
    Eigenschaften koennen veraendert werden
*/
obj.lumpy = "woof";
obj.cat='Minka';
obj.foo = 'foo';
delete obj.prop;
console.log(2, obj);
/* liefert 
Object {foo: "foo", lumpy: "woof", cat: "Minka"}
*/

Object.freeze(obj);
/* 
    neue Eigenschaften koennen nicht hinzugefuegt oder geloescht werden 
    Eigenschaften koennen nicht veraendert werden
*/
console.log(3, obj);
/* liefert 
Object {foo: "foo", lumpy: "woof", cat: "Minka"}
*/
obj.cat='Mauz'
console.log(4, obj);
/* liefert 
Object {foo: "foo", lumpy: "woof", cat: "Minka"}
*/
delete obj.cat;
console.log(5, obj);
/* liefert 
Object {foo: "foo", lumpy: "woof", cat: "Minka"}
*/
console.log(Object.isFrozen(obj));
