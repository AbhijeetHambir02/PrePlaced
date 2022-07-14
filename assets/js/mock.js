function endtest() {
    var end = confirm("Are you sure you want to end the test?");
    if( end == true ) {
        location.href = 'mock1.php';
    }
}

function submittest() {
    var end = confirm("Are you sure you want to submit the test?");
    if( end == true ) {
        document.forms["mocktest"].submit();
    }
}




function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var timerdiv = document.getElementById('timeshow');
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (timer <= 300) {
            timerdiv.style.backgroundColor ='#ff5050bd';
        }
        if (--timer < 0) {
            document.forms["mocktest"].submit();
        }
    }, 1000);
}


function startTest(){

    var inst = document.getElementById('instructions');
    var timer = document.getElementById('timeshow');
    var mock = document.getElementById('mock');
    var header = document.getElementById('header');

    if (inst.style.display == 'block') {
        if (confirm('Are you sure you want to start the test?')) 
        {
            inst.style.display = 'none';
            timer.style.display = 'block';
            mock.style.display = 'block';
            header.style.display = 'none';
            var fiveMinutes = 60 * 20,
            display = document.querySelector('#timer');

            
            startTimer(fiveMinutes, display);
        }
        
    }
}
