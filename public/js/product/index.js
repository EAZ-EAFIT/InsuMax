const banner = document.getElementsByClassName('notification-banner')[0];

setTimeout(() => {
    let opacity = 1;

    const intervalId = setInterval(() => {
        opacity -= 0.1;
        banner.style.opacity = opacity;

        if (opacity <= 0) {
            clearInterval(intervalId);
            banner.classList.add('hide');
        }
    }, 80);
}, 3000);
