// script.js
const exerciseData = {
    chest: [
        { name: "Push-ups", video: "pushup.mp4", description: "Get into a plank position, lower your body until your chest nearly touches the floor, then push back up." },
        { name: "Bench Press", video: "benchpress.mp4", description: "Lie on a flat bench, hold a barbell above your chest with arms extended, lower the bar to your chest, then press it back up." },
        { name: "Incline Bench Press", video: "incline-bench.mp4", description: "Get into a plank position, lower your body until your chest nearly touches the floor, then push back up." },
        { name: "Dip", video: "dip.mp4", description: "the exerciser supports themselves on a dip bar with their arms straight down and shoulders over their hands, then lowers their body until their arms are bent to a 90 degree angle at the elbows, and then lifts their body up, returning to the starting position." },
        { name: "Plate Press", video: "plate-press.mp4", description: ", lie on your back on a bench and press a weight plate upwards with both hands until your arms are fully extended." }
        // Add more chest exercises here
    ],
    arms: [
        { name: "Bicep Curls", video: "bicepcurl.mp4", description: " To perform a bicep curl, stand upright, hold a dumbbell in each hand with arms fully extended, and curl the weights upwards towards your shoulders while keeping your elbows stationary." },
        { name: "Tricep Dips", video: "tricep-dip.mp4", description: "Sit on a bench or chair, grip the edge with hands shoulder-width apart, scoot forward, lower your body until elbows are at 90 degrees, then push back up." },
        { name: "Pull-Ups", video: "pull-up.mp4", description: "To perform pull-ups, hang from a bar with palms facing away, then pull yourself up until your chin is above the bar, keeping your body straight throughout." },
        { name: "One Arm Row", video: "one arm row.mp4", description: "To perform a one-arm row, stand with one knee and hand on a bench, holding a dumbbell in the opposite hand, then pull the dumbbell towards your hip while keeping your back straight." },
        { name: "Shoulder Press", video: "shoulderpress.mp4", description: "To perform a shoulder press, sit or stand upright, hold dumbbells at shoulder height with palms facing forward, then press the weights upwards until arms are fully extended overhead." },
        // Add more arm exercises here
    ],
    legs: [
        { name: "Leg Press", video: "leg press.mp4", description: "Sit on a leg press machine, place feet shoulder-width apart on the platform, and push the weight away by extending your knees." },
        { name: "Squat", video: "squat.mp4", description: " Stand with feet shoulder-width apart, lower your body by bending knees and hips, keeping chest up and back straight, then push through heels to return to standing." },
        { name: "Lunges", video: "lunges.mp4", description: " Stand upright, step forward with one leg and lower your body until both knees are bent at 90 degrees, then push back up to starting position." },
        { name: "Leg Extension", video: "leg extensionn.mp4", description: "Sit on a leg extension machine, place feet under the padded bar, and extend your legs until knees are straight, then lower back down." },
        { name: "Calf Raises", video: "calf raises.mp4", description: "Stand with feet hip-width apart, rise onto the balls of your feet, then lower heels back down to the ground." },        
    ],

    back: [
        { name: "Deadlift", video: "deadlift.mp4", description: "Stand with feet shoulder-width apart, bend at hips and knees to lower the barbell to the ground, then lift it by straightening your hips and knees." },
        { name: "Lat Pulldown", video: "lat pulldown.mp4", description: "Sit at a lat pulldown machine, grip the bar wider than shoulder-width, pull the bar down to chest level, then slowly release it back up." },
        { name: "cable pullover", video: "cable pullover.mp4", description: "Sit on a bench or chair, grip the edge with hands shoulder-width apart, scoot forward, lower your body until elbows are at 90 degrees, then push back up." },
        { name: "Shoulder Press", video: "shoulderpress.mp4", description: "Sit on a bench or chair, grip the edge with hands shoulder-width apart, scoot forward, lower your body until elbows are at 90 degrees, then push back up." },
        { name: "Shoulder Press", video: "shoulderpress.mp4", description: "Sit on a bench or chair, grip the edge with hands shoulder-width apart, scoot forward, lower your body until elbows are at 90 degrees, then push back up." },

    ]

    // Define exercises for other body parts similarly
};

function generateExercises() {
    const bodyPart = document.getElementById("bodyPart").value;
    const exerciseList = document.getElementById("exerciseList");

    if (exerciseData.hasOwnProperty(bodyPart)) {
        const exercises = exerciseData[bodyPart];
        exerciseList.innerHTML = ""; // Clear previous exercises

        // Display up to 10 exercises
        for (let i = 0; i < Math.min(exercises.length, 10); i++) {
            const exercise = exercises[i];
            const exerciseCard = document.createElement("div");
            exerciseCard.classList.add("exercise-card");
            exerciseCard.innerHTML = `
                <div class="exercise-card-holder">
                    <div class="exercise-video">
                        <video autoplay loop muted playsinline style="width: 100%; height: 100%;">
                            <source src="videos/${exercise.video}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="exercise-details">
                        <h3>${exercise.name}</h3>
                        <p>${exercise.description}</p>
                    </div>
                </div>
            `;
            exerciseList.appendChild(exerciseCard);
        }
    } else {
        exerciseList.innerHTML = "<p>No exercises found for selected body part.</p>";
    }
}
