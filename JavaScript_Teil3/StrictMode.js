function useStrictModeWrong() {
    'use strict';
    x = 1;
    console.log(x);
}
function useStrictModeRight() {
    'use strict';
    var x = 1;
    console.log(x);
}