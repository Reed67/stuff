function TestForNullValue(value) {
    try {
        if (value === 0) {
            throw "division by zero";
        } else {
            throw "okay";
        };
    } catch (e) {
    if (e === "okay") {
            print(e);
            return;
        } else {
            print(e);
            return;
        };
    };
};
TestForNullValue(0);