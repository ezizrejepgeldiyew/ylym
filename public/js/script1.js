let timerShow = document.getElementById("timer");

window.onload = parseInt(time)

timer = setInterval(function () {
    seconds = time%60
    minutes = time/60%60
    hour = time/60/60%60

    time <= 0 ? document.getElementById("log").click() : timerShow.innerHTML = `${Math.trunc(hour)}:${Math.trunc(minutes)}:${seconds}`;

    --time;
}, 1000)

