
var obj = {
	set length(l) {
		alert('property length wird gesetzt: ' + l);
		if (isNaN(l + ''))
			throw 'length has to be a number';
			
		this._length = l - 0;
	},
	
	get length() {
		return (this._length == null ? 0: this._length);
	}
};

Object.defineProperty(obj, 'BLUB', {
	value : 'blubber di blub',
	writeable : true,
	configurable : true,
	enumerable : true
});

Object.create(Object.property, {

});


obj.BLUB = 'irgendwas';

console.log(obj.BLUB);

delete obj.BLUB;

console.log(obj.BLUB);






var obj = {
    get length() {
        var i, l = 0;
        for (i in this) {
            if (this.hasOwnProperty(i) && 'length' != i) {
                l++;
            }
        }

        return l;
    },

    set length(l) {
        if ('number' != typeof l || l < 0) {
            throw 'length has to be a number gt -1';
        }
        
        var i, j = 0;
        for (i in this) {
            if (this.hasOwnProperty(i) && 'length' != i) {
                if (j >= l) {
                    delete this[i];
                }
                j++;
            }
        }
    }
};

console.log(obj.length);

obj.name = 'Hannes';
obj.age = Infinity;

console.log(obj.length);

obj.length = 1;

console.log(obj.length);

console.log(obj);




var obj = {};

Object.defineProperty(obj, 'length', {
    //value : 0,
    get : function() {
        var i, l = 0;
        for (i in this) {
            if (this.hasOwnProperty(i)) {
                l++;
            }
        }

        return l;
    },
    set : function() {
    }
});

obj.name = 'Hannes';

delete obj.length;

obj.length;

