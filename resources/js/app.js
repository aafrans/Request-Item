import 'flowbite';
// collapse item & kategori
function toggleCollapse(id) {
    const content = document.getElementById(id);
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
    } else {
        content.classList.add('hidden');
    }
}
// card
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('slider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let offset = 0;

        const updateSlider = () => {
            slider.style.transform = `translateX(-${offset}px)`;
        };

        prevBtn.addEventListener('click', () => {
            if (offset > 0) {
                offset -= slider.offsetWidth / 3;
                updateSlider();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (offset < slider.scrollWidth - slider.clientWidth) {
                offset += slider.offsetWidth / 3;
                updateSlider();
            }
        });
    });
// modal create kategori

    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });

    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

