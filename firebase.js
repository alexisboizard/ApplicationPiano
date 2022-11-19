import { initializeApp } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-analytics.js";
import { getStorage, ref,listAll } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-storage.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDPUWga3UqPkHR3GFSOC7M0sSuuBEnriJs",
  authDomain: "test-sae.firebaseapp.com",
  projectId: "test-sae",
  storageBucket: "test-sae.appspot.com",
  messagingSenderId: "129679287559",
  appId: "1:129679287559:web:62ad7e8d6d7fcc14bb11a2",
  measurementId: "G-R30XBT2WG5",
  databaseURL: "https://test-sae-default-rtdb.europe-west1.firebasedatabase.app/"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

const storage = getStorage();


const currentDate = new Date();
const timestamp = currentDate.getTime();

const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generateString(length) {
    let result = ' ';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

const storageRef = ref(storage, 'videos/' + timestamp + '_' + generateString(10) + '.mp4');
const r = ref(storage, 'videos/');

let array = [];

listAll(r)
.then((res)=> {
    res.items.forEach((item) => {
      array.push(item);
    });
  }).catch((error)=>{
    console.log(error)
})

console.log(array.length)

export { storageRef, array };