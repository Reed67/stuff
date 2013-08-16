/* primitive Deklaration */
var myString = 'Dies ist ein Text.';
console.log(myString);
var myOtherString = 'Dies ist ein Text.';
console.log(myOtherString);
console.log(myString == myOtherString);
console.log(myString === myOtherString);
/* Objektdeklaration */
var myObjString = new String('Dies ist ein Text.');
var myOtherObjString = new String('Dies ist ein Text.');
console.log(myObjString, myOtherObjString);
console.log(myObjString == myOtherObjString);
console.log(myObjString === myOtherObjString);
/* Objekt zu primitiv */
myString = '';
console.log(myString + myObjString);
