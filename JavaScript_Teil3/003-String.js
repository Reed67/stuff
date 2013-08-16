/* Zahlen */
var myStr = String (24);
console.log(myStr);
myStr = '' + 24;
console.log(myStr);
myStr = (24).toString();        /* Basis 10 */
console.log(myStr);
myStr = (24).toString(2);       /* Basis 2 (dual) )*/
console.log(myStr);
myStr = (24).toString(16);      /* Basis 16 (hexadezimal) */
console.log(myStr);

/* Arrays */
var myArr = [5, -3, 10];

myStr = String(myArr);
console.log(myStr);

myStr = "" + myArr;
console.log(myStr);

myStr = myArr.toString();
console.log(myStr);

myStr = myArr.join(" + ");
console.log(myStr);

/* andere */
myStr = String(true);
myStr = "" + true;
myStr = String(false);
myStr = "" + false;
myStr = String(null);
myStr = "" + null;
myStr = String(undefined);
myStr = "" + undefined;
myStr = String(NaN);
myStr = "" + NaN;
