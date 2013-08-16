function liste_unterknoten(knoten) {
    var ausgabe;
    ausgabe = '<li>';
    switch (knoten.nodeType) {
        case 1 :
            ausgabe += '<strong>' + knoten.nodeName + '<\/strong>-Element';
            if (knoten.hasChildNodes()) {
                ausgabe += ', ' + knoten.childNodes.length + ' Unterknoten';
            }
            break;
        case 3 :
            var knotenwert = knoten.nodeValue.replace(/</g, '&lt;').replace(/\n/g, '\\n');
            ausgabe += 'Textknoten: [<strong>' + knotenwert + '<\/strong>]';
            break;
        case 8 :
            var knotenwert = knoten.nodeValue.replace(/</g, '&lt;').replace(/\n/g, '\\n');
            ausgabe += 'Kommentarknoten: [' + knotenwert + ']';
            break;
        default :
            ausgabe += 'Knoten des Typs ' + knoten.nodeType +
                ', Wert: [' + knoten.nodeValue + ']';
    }
    if (knoten.hasChildNodes()) {
        ausgabe += '\n<ol>\n';
        for (var i = 0; i < knoten.childNodes.length; i++) {
            knotenneu = knoten.childNodes[i];
            ausgabe += liste_unterknoten(knotenneu); // Rekursion
        }
        ausgabe += '</ol>\n';
    }
    ausgabe += '</li>\n';
    return ausgabe;
}
document.write(liste_unterknoten(document));