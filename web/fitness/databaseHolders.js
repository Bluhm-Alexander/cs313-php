/*
databaseHolders.js

This script will hold all of the information retrieved from the database
it will then make the pages more dynamic putting in the information the 
user wants to see
*/

/**
 * Exercise Table Variables
 * !!!!!OLD STUFF!!!!! might need it so I'm keeping it around
 */
var eExerciseID;
var eExerciseName = new Array();
var Description;
var DefaultReps;
var DefaultSets;
var BurnedCalories;
var allresponse = new Array();

function seteExerciseID( info ) {
    eExerciseID = info;
}

function seteExerciseName( info ) {
    alert( "adding " + info );
    eExerciseName.push( info );
}

function setDescription( info ) {
    Description = info;
}

function setDefaultReps( info ) {
    DefaultReps = info;
}

/* END OF OLD STUFF */

/**
 * Run AJAX at page load
 */

$.ajax({
    type: "POST",
    url: "db-fitnessRetrieve.php",
    data: {command:'getMyData'},
    dataType:'JSON',
    success: function(response) {
        // import data into global variable
        // alert("response: " + response);
        setAllResponse( response );
        console.log(response);
        
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      console.log(err.Message);
    }
 });

/**
 * Set allresponse global
 */

 function setAllResponse( responseinfo ) {
    allresponse = responseinfo;
    console.log(allresponse);
    // alert ("Global allResponse: "+allresponse.exerciseTable[0].description);
 }

//make a sort of enumerator
function tableEnum ( strTable, row ) {
    switch( strTable ) {
        case "exercises":
            return allresponse.exerciseTable[row];
        case "users":
            return allresponse.exerciseTable[row];
    }
}

/**
 * 
 * @param {*} table 
 * @param {*} row 
 * 
 * Get description from the table exerciseName
 */
 function getExerciseInformation( table, row ) {
    //alert( "getExerciseInformation"+ tableEnum( table, row ).description );
    document.getElementById("exerciseDescription").innerHTML = tableEnum( table, row ).description;
    document.getElementById("exerciseReps").innerHTML = tableEnum( table, row ).defaultreps;
    document.getElementById("exerciseSets").innerHTML = tableEnum( table, row ).defaultsets;
    document.getElementById("exerciseCalories").innerHTML = tableEnum( table, row ).burnedcalories;
    document.getElementById("exerciseName").innerHTML = tableEnum( table, row ).exercisename;
 }