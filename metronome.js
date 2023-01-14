import Timer from './timer.js';

const tempoSlider = 60;

const startStopBtn = document.querySelector('.start-stop');


const click1 = new Audio('tac.mp3');
//const click2 = new Audio('click2.mp3');

let bpm = 60;
let beatsPerMeasure = 2;
let count = 0;
let isRunning = false;
let tempoTextString = 'Medium';

startStopBtn.addEventListener('click', () => {
    count = 0;
    if (!isRunning) {
        metronome.start();
        isRunning = true;
        startStopBtn.textContent = 'STOP';
    } else {
        metronome.stop();
        isRunning = false;
        startStopBtn.textContent = 'START';
    }
});

function playClick() {
    console.log(count);
    if (count === beatsPerMeasure) {
        count = 0;
    }
    if (count === 0) {
        click1.play();
        click1.currentTime = 0;
    } else {
        click1.play();
        click1.currentTime = 0;
    }
    count++;
}

const metronome = new Timer(playClick, 60000 / bpm, { immediate: true });

