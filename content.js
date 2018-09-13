(function() {
    // collect variables
    // you can change this to change which element you replace
    var reference = document.querySelector('.vone__desc');
    if(reference){
        var text = reference.innerText;
        var replacement = text.replace(reference, "www.somewhere.com/q?=" + reference);
        // create new anchor tag
        var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
        text = text.replace(exp,"<a href='$1'>$1</a>");
        reference.innerHTML = text;
    }
})();