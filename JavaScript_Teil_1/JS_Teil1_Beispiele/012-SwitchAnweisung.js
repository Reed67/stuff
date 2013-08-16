var a = 1;

switch (a)
{
    case 1 :
        print('Heute ist der erste Tag der Woche!');
        print('Es ist Montag!');
        break;
    case 2:
        print('Heute ist der zweite Tag der Woche!');
        print('Es ist Dienstag!');
        break;
    case 3: case 4: case 5 :
        print('Heute ist der dritte, vierte oder fünfte Tag der Woche!');
        print('Es ist Mittwoch, Donnerstag oder Freitag!');
        break;
    default:
        print('Heute ist Wochenende!');
        print('Es ist entweder Samstag oder Sonntag!');
};
