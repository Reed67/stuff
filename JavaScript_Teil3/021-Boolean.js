var myBool = true;
console.log(myBool);
myBool = new Boolean(true);
/* ACHTUNG Unterschied beachten */
console.log(myBool);
console.log( myBool.toString() );
myBool = new Boolean(false);
console.log( myBool.toString() );

/* ACHTUNG Ergebnis beachten */
myBool = new Boolean(true);
if(myBool){console.log('true')}else{console.log('false')}
myBool = new Boolean(false);
if(myBool){console.log('true')}else{console.log('false')}
