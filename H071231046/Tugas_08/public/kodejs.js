document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    counters.forEach(counter => {
        const animateCounter = () => {
            const target = +counter.getAttribute('data-target');
            let count = 0;
            const increment = target / speed;

            const updateCount = () => {
                count = Math.min(count + increment, target);
                counter.innerText = Math.ceil(count);

                if (count < target) {
                    setTimeout(updateCount, 10);
                }
            };
            updateCount();
        };

        // Menambahkan kelas "visible" untuk mengaktifkan animasi transisi
        counter.classList.add('visible');
        animateCounter();
    });
});
