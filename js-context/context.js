var jsReady = function (fn) {
    jsReady.add(fn);
}

jsReady.callbacks = [];

// Adds a callback to the array above
jsReady.add = function(fn) {
    if (typeof(fn) === 'function') {
        this.callbacks.push(fn);
    }
}

jsReady.go = function() {
    while (fn = this.callbacks.shift()) {
        fn();
    }
}