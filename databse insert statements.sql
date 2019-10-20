/*
COMMAND TO LOOK AT TABLE PROPERTIES:
\d+ routines
\d+ table_name

CONNECT TO DATABASE:
heroku pg:psql --app shielded-caverns-87167


*/
DELETE FROM PersonalMealPlan
WHERE personalmealplanid = 0;

ALTER TABLE routines
ALTER COLUMN description type text;

ALTER TABLE exercises
ALTER COLUMN description type text;

ALTER TABLE meals
ALTER COLUMN description type text;

ALTER TABLE exercises
ADD defaultsets int;

ALTER TABLE PersonalRoutineExercises
ADD NumberOfSets int;

ALTER TABLE RoutineExercises
ADD DefaultOfSets int;

/*change name of column*/
ALTER TABLE routineexercises
rename column defaultofsets to defaultsets;


INSERT INTO Users
	(PersonID,
	 username,
	 password,
	 firstname,
	 lastname)
	 VALUES
	(0,
	 'test',
	 'test',
	 'Joe',
	 'Smith');
	 
INSERT INTO Users (PersonID, username, password, firstname, lastname)
	 VALUES (1, 'test', 'test', 'Joe', 'Smith');
	 
INSERT INTO routines (RoutineID, RoutineName, Description)
	VALUES (0, 'light workout', 'Focusing on exercises you can do at home in the morning before going to work');
	
INSERT INTO exercises (exerciseid, exercisename, description, defaultreps, burnedcalories, defaultsets)
	VALUES (0, 'Push-Ups', '1. keep your back straight <br> 2. bend arms at a 90 degree angle <br> 3. return to start position', 10, 400, 4);
	
INSERT INTO meals (MealID, MealName, Description, DefaultCalories, DefaultProtein)
	VALUES (0, 'Toast', 'White Bread lightly toasted', 200, 4);
	
INSERT INTO PersonalMealPlan (personalmealplanid, MealID, PersonID, MealPlanName, DateStarted, DateEnded)
	VALUES (0, 
			(SELECT mealID from meals where mealid = 0), 
			(SELECT PersonID from Users where PersonID = 1), 
			'Test Meal Plan', 
			'2019-10-19', 
			'2019-10-19');

INSERT INTO PERSONALMEALSEATEN (PersonalMealID, PersonalMealPlanID, MealID, Calories, Protein)
VALUES (0, 
		(SELECT personalmealplanid from personalmealplan where personalmealplanid = 0), 
		(SELECT MealID from meals where mealid = 0), 
		(SELECT defaultcalories from meals where mealID = 0), 
		(Select defaultprotein from meals where mealid = 0));
			
INSERT INTO personalroutines (PersonalRoutineID, PersonID, RoutineID, RoutineDate, Timetaken, Completed)
	VALUES (0, 
			(SELECT PersonID from Users where PersonID = 1), 
			(SELECT RoutineID from routines where routineid = 0), 
			'2019-10-19', 
			20, 
			TRUE);
		 
INSERT INTO RoutineExercises (RoutineExerciseID, RoutineID, ExerciseID, DefaultReps, DefaultSets)
	VALUES (0, 
			(select RoutineID from Routines where RoutineID = 0), 
			(select ExerciseID from Exercises where exerciseid = 0), 
			(select defaultReps from exercises where exerciseid = 0), 
			(select defaultsets from exercises where exerciseid = 0));
			
INSERT INTO PersonalRoutineExercises (PersonalRoutineExerciseID, PersonalRoutineID, RoutineExerciseID, NumberOfReps, NumberOfSets,  BurnedCalories)
	VALUES (0, 
			(select PersonalRoutineID from PersonalRoutines where PersonalRoutineID = 0), 
			(select routineExerciseID from RoutineExercises where routineexerciseid = 0), 
			(select defaultReps from exercises where exerciseid = 0), 
			(select defaultsets from exercises where exerciseid = 0), 
			(select burnedcalories from exercises where exerciseid = 0));
			
			