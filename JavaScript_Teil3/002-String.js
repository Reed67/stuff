var myStr = 'Ein' + ' ' + 'einfacher' + ' ' + 'Text' + '.';
console.log('1:', myStr);

myStr = 'Ein';
myStr = myStr + ' ';
myStr = myStr + 'einfacher';
myStr = myStr + ' ';
myStr = myStr + 'Text';
myStr = myStr + '.';
console.log('2:', myStr);

myStr = 'Ein ';
myStr += 'einfacher ';
myStr += 'Text';
console.log('3:', myStr);

var myStr1 = 'Ein ';
var myStr2 = 'einfacher Text.';
var myStr = myStr1 + myStr2;
console.log('4:', myStr);

myStr = myStr1.concat(myStr2);
console.log('5:', myStr);
