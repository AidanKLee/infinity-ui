import 'pace-js';

const paceOptions = {
    ajax: false,
};

document.querySelectorAll('[preloader\\.dots]').forEach((element) => {
    let dots = 1

    element.innerText = '.'.repeat(3)
    element.style.display = 'inline-block'
    element.style.width = `${element.offsetWidth}px`
    
    setInterval(() => {
        element.innerText = '.'.repeat(dots)
        dots = dots % 3 + 1
    }, 200)
});

function getProgress() {
    document.querySelectorAll('[preloader\\.bar]').forEach((element) => {
        element.style.width = Pace.bar.progress + '%';
    });

    document.querySelectorAll('[preloader\\.progress]').forEach((element) => {
        element.innerText = Math.ceil(Pace.bar.progress) + '%';
    });

    if (Pace.bar.progress != 100) {
        requestAnimationFrame(getProgress);
    }
}

getProgress();
Pace.start(paceOptions);