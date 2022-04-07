function verif(data, message) {
    var accept = confirm("Voulez vous vraiment " + message + " ?");
    if (accept) {
        document.location = data;
    }
}