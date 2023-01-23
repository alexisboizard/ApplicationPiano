import { initializeApp } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js";
const firebaseConfig = {
  apiKey: "AIzaSyAVbzqpEDr7NuSzNYmMZZiEPmiIMG0pXhQ",
  authDomain: "ptut-84cde.firebaseapp.com",
  projectId: "ptut-84cde",
  storageBucket: "ptut-84cde.appspot.com",
  messagingSenderId: "622517052847",
  appId: "1:622517052847:web:3e8aa48e80b7d01edf3b5a"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
import {
  getAuth,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  onAuthStateChanged
} from "https://www.gstatic.com/firebasejs/9.14.0/firebase-auth.js";

const auth = getAuth();
const signupForm = document.getElementById("signup-form");

signupForm.addEventListener("submit", async (e) => {
  const email = signupForm["email"].value;
  const password = signupForm["password"].value;
  console.log(email);
  createUserWithEmailAndPassword(auth,email, password)
    .then((userCredential) => {
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

let user;
const signinForm = document.getElementById("signinForm");

signinForm.addEventListener("submit", login());

async function login(){
  const email = signinForm["email"].value;
  const password = signinForm["password"].value;

  signInWithEmailAndPassword(auth,email,password)
  .then((userCredential) => {
    //login
    user = userCredential.user;
  })    
  .catch((error) => {
    let errorCode = error.code;
    let errorMessage = error.message;
    console.log("error code", errorCode);
    console.log("error Message", errorMessage);
  });
  window.location.replace("https://google.fr");
}

export {user};