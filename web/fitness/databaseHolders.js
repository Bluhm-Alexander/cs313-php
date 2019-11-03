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

/* Redirect to login page */
function toLoginPage() {
    alert ("change places");
    //window.location.replace("login.php");
}
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
function tableEnum ( strTable, ID ) {
    row = ID;
    switch( strTable ) {
        case "routines":
            return allresponse.routinesTable[row];
        case "routineExercises":
            return allresponse.routineExercisesTable[row];
        case "exercises":
            return allresponse.exerciseTable[row];
        case "users":
            row = ID - 1;
            return allresponse.exerciseTable[row];
    }
}

//Fill in default set and reps on the add exercise page
function fillInRepsandSets(table, row) {
    var reps = document.getElementById("REPS");
    var repsDefaultValue = tableEnum( table, row ).defaultreps;
    reps.setAttribute('value', repsDefaultValue);

    var sets = document.getElementById("SETS");
    var setsDefaultValue = tableEnum( table, row ).defaultsets;
    sets.setAttribute('value', setsDefaultValue);
}

function getRoutineExerciseInformation( table, row ) {
    document.getElementById("routineExerciseDescription").innerHTML = tableEnum( table, row ).description;
    document.getElementById("RoutineExerciseReps").innerHTML = tableEnum( table, row ).defaultreps;
    document.getElementById("RoutineExerciseSets").innerHTML = tableEnum( table, row ).defaultsets;
    document.getElementById("RoutineExerciseCalories").innerHTML = tableEnum( table, row ).burnedcalories;
    document.getElementById("routineExerciseName").innerHTML = tableEnum( table, row ).exercisename;
}

function getRoutineInformation( table, row ) {
    //populate Routine Name and Description
    document.getElementById("routineName").innerHTML = tableEnum( table, row ).routinename;
    document.getElementById("routineDescription").innerHTML = tableEnum( table, row ).description;


    //empty routine exercises select list
    var select = document.getElementById("routineExercises");
    var length = select.options.length;
    for (i = 0; i < length; i++) {
        select.options[i] = null;
    }

    //populate the exercises that are a part of the routine in the select boxes
    for (var i = 0; i < allresponse.routineExercisesTable.length; i++) {
        var opt = document.createElement("option");
        if (tableEnum( "routineExercises", i ).routineid == row) {
            exerciseID = tableEnum( "routineExercises", i ).exerciseid;
            opt.value = exerciseID;
            opt.innerHTML = tableEnum( "exercises", exerciseID ).exercisename;
            select.appendChild( opt );
        }
    }
}


 function getExerciseInformation( table, row ) {
    //alert( "getExerciseInformation"+ tableEnum( table, row ).description );
    document.getElementById("exerciseDescription").innerHTML = tableEnum( table, row ).description;
    document.getElementById("exerciseReps").innerHTML = tableEnum( table, row ).defaultreps;
    document.getElementById("exerciseSets").innerHTML = tableEnum( table, row ).defaultsets;
    document.getElementById("exerciseCalories").innerHTML = tableEnum( table, row ).burnedcalories;
    document.getElementById("exerciseName").innerHTML = tableEnum( table, row ).exercisename;
 }