function test(key, value) {
    if (key === "") return value; 
    return value * 2; 
}
var parsed = JSON.parse('{"Anzahl": 5}', test);
console.log(parsed);
/* liefert 
Object {Anzahl: 10}
*/
var Person = {
    name: 'Nachname',
    firstname: 'Vorname',
    department: 'Department',
    age: 18
}
var filterarray = ['name', 'department'];
console.log(JSON.stringify(Person, filterarray, "\t"));
/* liefert 
{
        "name": "Nachname",
        "department": "Department"
}
*/

