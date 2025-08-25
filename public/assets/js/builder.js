document.addEventListener("DOMContentLoaded", function() {
    const baseImg = document.getElementById('base');
    const overlayImg = document.getElementById('overlay');

    document.getElementById('color').addEventListener('change', function() {
        baseImg.src = '/assets/images/colors/' + this.value;
    });

    document.getElementById('design').addEventListener('change', function() {
        overlayImg.src = '/assets/images/designs/' + this.value;
    });
});
