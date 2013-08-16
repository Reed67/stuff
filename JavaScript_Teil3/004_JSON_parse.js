var tmpStr = '{"name":"name","firstname":"firstname","age":18}';
var Person = JSON.parse(tmpStr);
console.log(Person);
var tmpArr = '["name","firstname",18]';
var Arr  = JSON.parse(tmpArr);
console.log(Arr);
/* String muss in einer Zeile stehen */
var bookStr = '{"Herausgeber": "Xema" , "Nummer": "1234-5678-9012-3456", "Währung": "EURO", "Inhaber": { "Name": "Mustermann", "Vorname": "Max", "männlich": true, "Hobbys": [ "Reiten", "Golfen", "Lesen" ], "Alter": 42, "Kinder": [], "Partner": null}, "Deckung": 2e+6}';
/*  
*/
var bookObject = JSON.parse(bookStr);
console.log(bookObject);
