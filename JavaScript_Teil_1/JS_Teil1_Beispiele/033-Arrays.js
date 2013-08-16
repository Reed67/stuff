/* funktioniert ungewohnt */
var foo = [];
foo['a'] = 'aaa';
foo['b'] = 'bbb';
foo['c'] = 'ccc';
/* liefert 0 ??? */
print(foo.length);

/* geht halbwegs */
var books = new Array();
books[0] = new Object();
books[0]['Title'] = 'JavaScript';
books[0]['Autor'] = 'Hans Mustermann';
books[1] = new Object();
books[1]['Title'] = 'JavaScript for Dummies';
books[1]['Autor'] = 'Johanna Mustermann';
print(books.length);
