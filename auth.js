import { initializeApp } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js";

const firebaseConfig = {
  apiKey: "AIzaSyDPUWga3UqPkHR3GFSOC7M0sSuuBEnriJs",

  authDomain: "test-sae.firebaseapp.com",

  databaseURL:
    "https://test-sae-default-rtdb.europe-west1.firebasedatabase.app",

  projectId: "test-sae",

  storageBucket: "test-sae.appspot.com",

  messagingSenderId: "129679287559",

  appId: "1:129679287559:web:62ad7e8d6d7fcc14bb11a2",

  measurementId: "G-R30XBT2WG5",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
import {
  getAuth,
  createUserWithEmailAndPassword,
} from "https://www.gstatic.com/firebasejs/9.14.0/firebase-auth.js";

const auth = getAuth();
const signupForm = document.getElementById("signup-form");

signupForm.addEventListener("submit", async (e) => {
  const email = signupForm["email"].value;
  const password = signupForm["password"].value;
  console.log(email);
  createUserWithEmailAndPassword(email, password)
    .then((userCredential) => {
      location.reload();
      // Signed in
      let user = userCredential.user;
      console.log("user", user.email);
    })
    .catch((error) => {
      let errorCode = error.code;
      let errorMessage = error.message;
      console.log("error code", errorCode);
      console.log("error Message", errorMessage);
    });
});
