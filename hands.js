const video3 = document.getElementsByClassName("input3")[0];
const out3 = document.getElementsByClassName("output3")[0];
const controlsElement = document.getElementsByClassName("control3")[0];
const controls = window;
const canvasCtx = out3.getContext("2d");
const button = document.getElementById("start");
const square = document.getElementById("square");
const circle = document.getElementById("circle");
const fpsControl = new FPS();

let width = 1280;
let height = 720;

function onResults(results) {
  canvasCtx.save();
  canvasCtx.clearRect(0, 0, out3.width, out3.height);
  canvasCtx.drawImage(results.image, 0, 0, out3.width, out3.height);
  if (results.multiHandLandmarks) {
    for (const landmarks of results.multiHandLandmarks) {
      drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, {
        color: "#00FF00",
        lineWidth: 5,
      });
      drawLandmarks(canvasCtx, landmarks, { color: "#FF0000", lineWidth: 2 });
    }
  }
  // coordonne des points
  console.log(results.multiHandLandmarks);
  canvasCtx.restore();
}

const hands = new Hands({
  locateFile: (file) => {
    return `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`;
  },
});

const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
if (isMobile) {
  /* your code here */
}

const camera = new Camera(video3, {
  onFrame: async () => {
    await hands.send({ image: video3 });
  },
  width: 1280,
  height: 720,
});
hands.setOptions({
  selfieMode: true,
  maxNumHands: 2,
  modelComplexity: 0,
  minDetectionConfidence: 0.9,
  minTrackingConfidence: 0.9,
});
hands.onResults(onResults);
camera.start();

let saved = out3.captureStream(60);

// save the stream to a file
let recorder = new MediaRecorder(saved);
let chunks = [];
recorder.ondataavailable = function (e) {
  chunks.push(e.data);
};
recorder.onstop = function (e) {
  let blob = new Blob(chunks, { type: "video/mp4" });
  fetch(`includes/save_replay.php`, {method:"POST", body:blob})
                .then(response => {
                  console.log(response)
                  notification.showToast();
                })  
};

let appui = false;

function startRecording() {
  if (appui === false) {
    circle.style.display = "none";
    square.style.display = "block";
    recorder.start();
    appui = true;
  } else {
    square.style.display = "none";
    circle.style.display = "block";
    recorder.stop();
    appui = false;
  }
}

new controls
    .ControlPanel(controlsElement, {
      selfieMode: true,
      maxNumHands: 1,
      modelComplexity: 1,
      minDetectionConfidence: 1,
      minTrackingConfidence: 1
    })
    .add([
      new controls.SourcePicker({
        onFrame:
            async (input= controls.InputImage, size= controls.Rectangle) => {
              const aspect = size.height / size.width;
              let width= 1920, height= 1080;
              if (window.innerWidth > window.innerHeight) {
                height = window.innerHeight;
                width = height / aspect;
              } else {
                width = window.innerWidth;
                height = width * aspect;
              }
              canvasCtx.width = width;
              canvasCtx.height = height;
              await hands.send({image: input});
            },
      }),
    ])

start.addEventListener("click", startRecording);

// let touchstartX = 0
// let touchendX = 0

// function checkDirection() {
//   if (touchendX < touchstartX && touchendX > 150) {
//     document.getElementById("right").style.display = "flex";
//   }
//   if(touchendX > touchstartX && touchendX > 150) {
//     document.getElementById("right").style.display = "none";
//   }
// }

// document.addEventListener('touchstart', e => {
//   touchstartX = e.changedTouches[0].screenX
// })

// document.addEventListener('touchend', e => {
//   touchendX = e.changedTouches[0].screenX
//   checkDirection()
// })
let notification = Toastify({
  text: "La vidéo a bien été enregistrée",
  duration: 2000,
  close: true,
  gravity: "bottom", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "#000",
  },
});

function generateString(length) {
  const characters ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  let result = " ";
  const charactersLength = characters.length;
  for (let i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }

  return result;
}

function addVideo(blob){
  console.log(blob);  
  let input = document.querySelector('video');
  let video = window.URL.createObjectURL(blob);
  input.src = video;
}
