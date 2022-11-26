const metronome_button = document.getElementById('metronome_button');
const dot = document.getElementsByClassName('dot')[0];
let appui = false;

Audio.prototype.stop = function() {
    this.pause();
    this.currentTime = 0;
};

function metronome(bpm){
    let audio = new Audio('tac.mp3');
    if(bpm != 0){
        let time = setInterval(function(){
          audio.play();
        }, 60000/bpm);
        console.log(60000/bpm)
    }else{
        audio.stop();
        console.log("STOP")
        return;
    }

}

metronome_button.addEventListener('click', function(){
    appui = !appui;
    if(!appui){
        metronome(0);
        dot.style.background = "red";
        console.log("OFF")
    }else{
        metronome(100);
        dot.style.background = "green";
        console.log("ON")
    }
});
