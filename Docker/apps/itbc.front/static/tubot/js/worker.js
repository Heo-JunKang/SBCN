function timedSignal(){
    postMessage( 'signal_updater' );
    setTimeout("timedSignal()", 60000 );
}

// worker message listener
self.onmessage = function(e) {
    console.log( 'receive: ', e.data );

    timedSignal();
};
