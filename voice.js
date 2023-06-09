if ("webkitSpeechRecognition" in window) {
  // Initialize webkitSpeechRecognition
  let speechRecognition = new webkitSpeechRecognition();

  // String for the Final Transcript
  let final_transcript = "";

  // Set the properties for the Speech Recognition object
  speechRecognition.continuous = true;
  speechRecognition.interimResults = true;

  // Callback Function for the onStart Event
  speechRecognition.onstart = () => {
    // Show the Status Element
    document.querySelector("#status").style.display = "block";
  };
  speechRecognition.onerror = () => {
    // Hide the Status Element
    document.querySelector("#status").style.display = "none";
  };
  speechRecognition.onend = () => {
    // Hide the Status Element
    document.querySelector("#status").style.display = "none";
  };

  function turnOff() {
    speechRecognition.stop();
  }

  speechRecognition.onresult = (event) => {
    // Create the interim transcript string locally because we don't want it to persist like final transcript
    let interim_transcript = "";

    // Loop through the results from the speech recognition object.
    for (let i = event.resultIndex; i < event.results.length; ++i) {
      // If the result item is Final, add it to Final Transcript, Else add it to Interim transcript
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }

    // Set the Final transcript and Interim transcript.
    document.querySelector("#final").innerHTML = final_transcript;
    document.querySelector("#interim").innerHTML = interim_transcript;
    if (final_transcript == "turn on light") {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText, "a");
        }
      };
      xmlhttp.open("POST", "./bulb/insert.php", true);
      xmlhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xmlhttp.send("bulbState=1");
      setTimeout(turnOff, 5000);
    } else if (final_transcript == "turn off light") {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText, "a");
        }
      };
      xmlhttp.open("POST", "./bulb/insert.php", true);
      xmlhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xmlhttp.send("bulbState=0");
      setTimeout(turnOff, 5000);
    } else if (final_transcript == "turn on fan") {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText, "a");
        }
      };
      xmlhttp.open("POST", "./fan/insert.php", true);
      xmlhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xmlhttp.send("fanState=1");
      setTimeout(turnOff, 5000);
    } else if (final_transcript == "turn off fan") {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText, "a");
        }
      };
      xmlhttp.open("POST", "./fan/insert.php", true);
      xmlhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      xmlhttp.send("fanState=0");
      setTimeout(turnOff, 5000);
    }
  };

  // Set the onClick property of the start button
  document.querySelector("#start").onclick = () => {
    // Start the Speech Recognition
    speechRecognition.start();
  };

  // Set the onClick property of the stop button
  document.querySelector("#stop").onclick = () => {
    // Stop the Speech Recognition
    speechRecognition.stop();
  };
}

