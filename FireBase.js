// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyCbB8pxsJ_XZFOBxDZbiJGOILN_vVe--94",
    authDomain: "sswmb-4e243.firebaseapp.com",
    databaseURL: "https://sswmb-4e243.firebaseio.com",
    projectId: "sswmb-4e243",
    storageBucket: "sswmb-4e243.appspot.com",
    messagingSenderId: "892185957794",
    appId: "1:892185957794:web:e695e53b5029218a400efb",
    measurementId: "G-E5NEHM3HNE"
};
// Initialize Firebase
var app = firebase.initializeApp(firebaseConfig);
// firebase.initializeApp(firebaseConfig);
var db = firebase.firestore(app);