const video3 = document.getElementsByClassName("input3")[0];
var cal1 = document.querySelector('.calibrage1');
var cal2 = document.querySelector('.calibrage2');
const out3 = document.getElementsByClassName("output3")[0];
const controlsElement = document.getElementsByClassName("upload1")[0];
const controls = window;
const canvasCtx = out3.getContext("2d");
const button = document.getElementById("start");
const square = document.getElementById("square");
const circle = document.getElementById("circle");
const fpsControl = new FPS();

let width = 1280;
let height = 720;

let distance_auriculaire = 0;
let dist_index_gauche = 0;
let distanc = 0;
let distance_annulaire = 0;
let distance_majeur = 0;
let distance_pouce = 0;

let distance_auriculaire2 = 0;
let dist_index_gauche2 = 0;
let distanc2 = 0;
let distance_annulaire2 = 0;
let distance_majeur2 = 0;
let distance_pouce2 = 0;

let distance_auriculaire3 = 0;
let dist_index_gauche3 = 0;
let distanc3 = 0;
let distance_annulaire3 = 0;
let distance_majeur3 = 0;
let distance_pouce3 = 0;

let radianindexmajeurgauche = 0;
let angleindexmajeurgauche = 0;

let radianindexmajeurgauche2 = 0;
let angleindexmajeurgauche2 = 0;

let radianindexmajeurgauche3 = 0;
let angleindexmajeurgauche3 = 0;


let now = new Date();

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

      //console.log(results.multiHandLandmarks);
      /*
      let distance_auriculaire = Math.sqrt(Math.pow((results.multiHandLandmarks[0][17].x-results.multiHandLandmarks[0][20].x), 2)+Math.pow((results.multiHandLandmarks[0][17].y-results.multiHandLandmarks[0][20].y), 2)+Math.pow((results.multiHandLandmarks[0][17].z-results.multiHandLandmarks[0][20].z), 2));   
      let dist_index_gauche = Math.sqrt(Math.pow((results.multiHandLandmarks[0][8].x-results.multiHandLandmarks[0][5].x), 2)+Math.pow((results.multiHandLandmarks[0][8].y-results.multiHandLandmarks[0][5].y), 2)+Math.pow((results.multiHandLandmarks[0][8].z-results.multiHandLandmarks[0][5].z), 2));   
      let distanc = Math.sqrt(Math.pow((results.multiHandLandmarks[0][17].x-results.multiHandLandmarks[0][20].x), 2)+Math.pow((results.multiHandLandmarks[0][17].y-results.multiHandLandmarks[0][20].y), 2)+Math.pow((results.multiHandLandmarks[0][17].z-results.multiHandLandmarks[0][20].z), 2));
      let distance_annulaire = Math.sqrt(Math.pow((results.multiHandLandmarks[0][13].x-results.multiHandLandmarks[0][16].x), 2)+Math.pow((results.multiHandLandmarks[0][13].y-results.multiHandLandmarks[0][16].y), 2)+Math.pow((results.multiHandLandmarks[0][13].z-results.multiHandLandmarks[0][16].z), 2));
      let distance_majeur = Math.sqrt(Math.pow((results.multiHandLandmarks[0][12].x-results.multiHandLandmarks[0][9].x), 2)+Math.pow((results.multiHandLandmarks[0][12].y-results.multiHandLandmarks[0][9].y), 2)+Math.pow((results.multiHandLandmarks[0][12].z-results.multiHandLandmarks[0][9].z), 2));
      let distance_pouce = Math.sqrt(Math.pow((results.multiHandLandmarks[0][2].x-results.multiHandLandmarks[0][4].x), 2)+Math.pow((results.multiHandLandmarks[0][2].y-results.multiHandLandmarks[0][4].y), 2)+Math.pow((results.multiHandLandmarks[0][2].z-results.multiHandLandmarks[0][4].z), 2));
      */
      //console.log("Distance : ", distance);

      //calculMarker(distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2);


      let radianindexmajeurgauche = Math.atan(results.multiHandLandmarks[0][8].x - results.multiHandLandmarks[0][12].x, results.multiHandLandmarks[0][8].y - results.multiHandLandmarks[0][12].y) - Math.atan(results.multiHandLandmarks[0][9].x - results.multiHandLandmarks[0][12].x, results.multiHandLandmarks[0][9].y - results.multiHandLandmarks[0][12].y);
      let angleindexmajeurgauche = Math.abs(radianindexmajeurgauche*180.0/Math.PI);
      if (angleindexmajeurgauche > 180.0) {
        angleindexmajeurgauche = 360-angleindexmajeurgauche;
      }
      //console.log("Angle entre l'index et le majeur (main gauche): ", angleindexmajeurgauche);
      //console.log("detendez votre index (main gauche): ", dist_index_gauche);
      let now2 = new Date()
      let diff = now2.getTime() - now.getTime();
      if( diff > 5000){
        console.log("Correction")
        correctionMain(angleindexmajeurgauche, dist_index_gauche, distance_auriculaire, distance_annulaire, distance_majeur, distance_pouce);
        now = new Date();
      }
    }
  }
  // coordonne des points
  //console.log(results.multiHandLandmarks);
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
  facingMode: 'environment',
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
//camera.start();

let saved = out3.captureStream(60);

// save the stream to a file
let recorder = new MediaRecorder(saved);
let chunks = [];
recorder.ondataavailable = function (e) {
  chunks.push(e.data);
};
recorder.onstop = async function (e) {
  let blob = new Blob(chunks, { type: "video/mp4" });
  await fetch(`includes/save_replay.php`, {method:"POST", body:blob})
                .then(response => {
                  console.log(response)
                  notification.showToast();
                })  
};

let appui = false;

function startRecording() {
  if (appui === false) {
    recorder.start();
    appui = true;
  } else {
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



cal1.addEventListener("click", calibrage1(onResults, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce, distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2));
cal2.addEventListener("click", calibrage2(onResults, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2, distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce));

function calibrage1(results, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce, distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2) {
  if (results.multiHandLandmarks) {
    distance_auriculaire = Math.sqrt(Math.pow((results.multiHandLandmarks[0][17].x-results.multiHandLandmarks[0][20].x), 2)+Math.pow((results.multiHandLandmarks[0][17].y-results.multiHandLandmarks[0][20].y), 2)+Math.pow((results.multiHandLandmarks[0][17].z-results.multiHandLandmarks[0][20].z), 2));   
    dist_index_gauche = Math.sqrt(Math.pow((results.multiHandLandmarks[0][8].x-results.multiHandLandmarks[0][5].x), 2)+Math.pow((results.multiHandLandmarks[0][8].y-results.multiHandLandmarks[0][5].y), 2)+Math.pow((results.multiHandLandmarks[0][8].z-results.multiHandLandmarks[0][5].z), 2));   
    distanc = Math.sqrt(Math.pow((results.multiHandLandmarks[0][17].x-results.multiHandLandmarks[0][20].x), 2)+Math.pow((results.multiHandLandmarks[0][17].y-results.multiHandLandmarks[0][20].y), 2)+Math.pow((results.multiHandLandmarks[0][17].z-results.multiHandLandmarks[0][20].z), 2));
    distance_annulaire = Math.sqrt(Math.pow((results.multiHandLandmarks[0][13].x-results.multiHandLandmarks[0][16].x), 2)+Math.pow((results.multiHandLandmarks[0][13].y-results.multiHandLandmarks[0][16].y), 2)+Math.pow((results.multiHandLandmarks[0][13].z-results.multiHandLandmarks[0][16].z), 2));
    distance_majeur = Math.sqrt(Math.pow((results.multiHandLandmarks[0][12].x-results.multiHandLandmarks[0][9].x), 2)+Math.pow((results.multiHandLandmarks[0][12].y-results.multiHandLandmarks[0][9].y), 2)+Math.pow((results.multiHandLandmarks[0][12].z-results.multiHandLandmarks[0][9].z), 2));
    distance_pouce = Math.sqrt(Math.pow((results.multiHandLandmarks[0][2].x-results.multiHandLandmarks[0][4].x), 2)+Math.pow((results.multiHandLandmarks[0][2].y-results.multiHandLandmarks[0][4].y), 2)+Math.pow((results.multiHandLandmarks[0][2].z-results.multiHandLandmarks[0][4].z), 2));
    calculMarker(distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2);
    console.log("calibrage 1 mis a jour :)");
  }
}

function calibrage2(results, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2, distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce) {
  if (results.multiHandLandmarks) {
    distance_auriculaire2 = Math.sqrt(Math.pow((results.multiHandLandmarks[0][17].x-results.multiHandLandmarks[0][20].x), 2)+Math.pow((results.multiHandLandmarks[0][17].y-results.multiHandLandmarks[0][20].y), 2)+Math.pow((results.multiHandLandmarks[0][17].z-results.multiHandLandmarks[0][20].z), 2));   
    dist_index_gauche2 = Math.sqrt(Math.pow((results.multiHandLandmarks[0][8].x-results.multiHandLandmarks[0][5].x), 2)+Math.pow((results.multiHandLandmarks[0][8].y-results.multiHandLandmarks[0][5].y), 2)+Math.pow((results.multiHandLandmarks[0][8].z-results.multiHandLandmarks[0][5].z), 2));   
    distanc2 = Math.sqrt(Math.pow((results.multiHandLandmarks[0][17].x-results.multiHandLandmarks[0][20].x), 2)+Math.pow((results.multiHandLandmarks[0][17].y-results.multiHandLandmarks[0][20].y), 2)+Math.pow((results.multiHandLandmarks[0][17].z-results.multiHandLandmarks[0][20].z), 2));
    distance_annulaire2 = Math.sqrt(Math.pow((results.multiHandLandmarks[0][13].x-results.multiHandLandmarks[0][16].x), 2)+Math.pow((results.multiHandLandmarks[0][13].y-results.multiHandLandmarks[0][16].y), 2)+Math.pow((results.multiHandLandmarks[0][13].z-results.multiHandLandmarks[0][16].z), 2));
    distance_majeur2 = Math.sqrt(Math.pow((results.multiHandLandmarks[0][12].x-results.multiHandLandmarks[0][9].x), 2)+Math.pow((results.multiHandLandmarks[0][12].y-results.multiHandLandmarks[0][9].y), 2)+Math.pow((results.multiHandLandmarks[0][12].z-results.multiHandLandmarks[0][9].z), 2));
    distance_pouce2 = Math.sqrt(Math.pow((results.multiHandLandmarks[0][2].x-results.multiHandLandmarks[0][4].x), 2)+Math.pow((results.multiHandLandmarks[0][2].y-results.multiHandLandmarks[0][4].y), 2)+Math.pow((results.multiHandLandmarks[0][2].z-results.multiHandLandmarks[0][4].z), 2));
    calculMarker(distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2);
    console.log("calibrage 2 mis a jour :)");
  }
}

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

function calculMarker(distance_auriculaire3, dist_index_gauche3, distanc3, distance_annulaire3, distance_majeur3, distance_pouce3, distance_auriculaire, dist_index_gauche, distanc, distance_annulaire, distance_majeur, distance_pouce, distance_auriculaire2, dist_index_gauche2, distanc2, distance_annulaire2, distance_majeur2, distance_pouce2){
  distance_auriculaire3 = distance_auriculaire2 - distance_auriculaire;
  dist_index_gauche3 = dist_index_gauche2 - dist_index_gauche;
  distanc3 = distanc2 - distanc;
  distance_annulaire3 = distance_annulaire2 - distance_annulaire;
  distance_majeur3 = distance_majeur2 - distance_majeur;
  distance_pouce3 = distance_pouce2 - distance_pouce;
  console.log("calcul de marqueur fait !");
}



function correctionMain(angleindexmajeurgauche, dist_index_gauche, distance_auriculaire, distance_annulaire, distance_majeur, distance_pouce) {
  let speech = false;
  console.log("majeur : ", distance_pouce);
  if(speech == false){
    speech = true;
    if (angleindexmajeurgauche > 4.50) {
      console.log("Rapprochez votre index de votre majeur !");
      var msg = new SpeechSynthesisUtterance();
      let text = "Rapprochez votre index de votre majeur ";
      responsiveVoice.speak(text,"French Canadian Male");
    }

    else if (distance_annulaire < 0.135) {
      console.log("detendez votre annulaire : ", distance_annulaire);
      var msg = new SpeechSynthesisUtterance();
      let text = "Detendez votre annulaire ";
      responsiveVoice.speak(text,"French Canadian Male");
    }

    else if (distance_majeur < 0.150) {
      console.log("detendez votre majeur : ", distance_majeur);
      var msg = new SpeechSynthesisUtterance();
      let text = "Detendez votre majeur ";
      responsiveVoice.speak(text,"French Canadian Male");
    }

    else if (distance_auriculaire < 0.09) {
      console.log("detendez votre auriculaire : ", distance_auriculaire);
      var msg = new SpeechSynthesisUtterance();
      let text = "Detendez votre auriculaire ";
      responsiveVoice.speak(text,"French Canadian Male");
    }

    else if (dist_index_gauche < 0.15) {
      console.log("detendez votre index : ", dist_index_gauche);
      var msg = new SpeechSynthesisUtterance();
      let text = "Detendez votre index ";
      responsiveVoice.speak(text,"French Canadian Male");
    }

    else if (distance_pouce < 0.125) {
      console.log("detendez votre pouce : ", distance_pouce);
      var msg = new SpeechSynthesisUtterance();
      let text = "Detendez votre pouce ";
      responsiveVoice.speak(text,"French Canadian Male");
    }
  }
}

let upload = document.getElementsByClassName("source-selection")[0];
console.log(upload);
upload.addEventListener("click",function(){
  camera.stop();
  console.log("")
});








/**
 * 
 * LISTE DES POINTS DE LA MAIN MEDIAPIPE *
 * 
 */



/*
  *
hands.WIRST = 0;
hands.THUMB_CMC = 1;
hands.THUMB_MCP = 2;
hands.THUMB_IP = 3;
hands.THUMB_TIP = 4;
hands.INDEX_FINGER_MCP = 5;
hands.INDEX_FINGER_PIP = 6;
hands.INDEX_FINGER_DIP = 7;
hands.INDEX_FINGER_TIP = 8;
hands.MIDDLE_FINGER_MCP = 9;
hands.MIDDLE_FINGER_PIP = 10;
hands.MIDDLE_FINGER_DIP = 11;
hands.MIDDLE_FINGER_TIP = 12;
hands.RING_FINGER_MCP = 13;
hands.RING_FINGER_PIP = 14;
hands.RING_FINGER_DIP = 15;
hands.RING_FINGER_TIP = 16;
hands.PINKY_MCP = 17;
hands.PINKY_PIP = 18;
hands.PINKY_DIP = 19;
hands.PINKY_TIP = 20;
  *
*/
