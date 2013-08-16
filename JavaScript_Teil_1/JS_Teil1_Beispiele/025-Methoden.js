function calculateMonthname( MonthNumber ) {
    if( MonthNumber == null ) {
        return '';
    } else {
    switch ( MonthNumber ) {
        case 1: return 'Januar';
                break;
        case 2: return 'Februar';
                break;
        case 3: return 'März';
                break;
        case 4: return 'April';
                break;
        case 5: return 'Mai';
                break;
        case 6: return 'Juni';
                break;
        case 7: return 'Juli';
                break;
        case 8: return 'August';
                break;
        case 9: return 'September';
                break;
        case 10: return 'Oktober';
                 break;
        case 11: return 'November';
                 break;
        default: return 'Dezember';
                 break;
        };
    };
};
print(calculateMonthname(4));



