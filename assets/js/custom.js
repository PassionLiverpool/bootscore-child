jQuery(function ($) {

    // Modal video
    $('.modal-video-button').modalVideo();

}); // jQuery End

// Basic lightbox
document.addEventListener("DOMContentLoaded", () => {
    const galleryItems = document.querySelectorAll('.gallery-image');

    galleryItems.forEach(img => {
        img.addEventListener('click', () => {
            const fullSrc = img.getAttribute('data-full');
            const instance = basicLightbox.create(`
                <img src="${fullSrc}" width="1400" height="900" alt="">
            `);
            instance.show();
        });
    });
});
