function bookSeat(seat) {

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "book_seat.php?seat=" + seat, true);
        xmlhttp.send();
				document.location.reload(true);
}
