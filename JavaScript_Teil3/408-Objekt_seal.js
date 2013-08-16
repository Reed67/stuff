var obj = {
    prop: function () {},
    foo: "baz"
  };
console.log(obj);
/* liefert */
Object {prop: function, foo: "baz"}
/* 
    neue Eigenschaften koennen hinzugefügt oder geloescht werden 
    Eigenschaften koennen veraendert werden
*/
obj.lumpy = "woof";
obj.cat='Minka';
obj.foo = 'foo';
delete obj.prop;
console.log(obj);
/* liefert */
Object {foo: "foo", lumpy: "woof", cat: "Minka"}


Object.seal(obj)
console.log(obj);
/* 
    neue Eigenschaften koennen nicht hinzugefügt werden 
    Eigenschaften koennen veraendert aber nicht geloescht werden
*/

/* liefert */
Object {foo: "foo", lumpy: "woof", cat: "Minka"}
obj.cat='Mauz'
console.log(obj);
/* liefert */
Object {foo: "foo", lumpy: "woof", cat: "Mauz"}
delete obj.cat
console.log(obj);
/* liefert */
Object {foo: "foo", lumpy: "woof", cat: "Mauz"}
