




document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".done-btn").forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Stop form submission for animation
            let taskItem = this.closest("li");
            taskItem.classList.add("completed"); // Add class for animation

            setTimeout(() => {
                this.parentElement.submit(); // Submit after animation
            }, 500); // Wait 0.5s before submitting
        });
    });
});
