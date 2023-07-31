const SwalNotification = (titleText, text, icon, confirmButtonText) => {
    Swal.fire({
        titleText: titleText,
        text: text,
        icon: icon, // warning, error, success, info
        confirmButtonText: confirmButtonText
    });
};

const SwalNotification_HTML = (titleText, html, icon, confirmButtonText) => {
    Swal.fire({
        titleText: titleText,
        html: html,
        icon: icon, // warning, error, success, info
        confirmButtonText: confirmButtonText
    });
};

const SwalNotification_Toast = (icon, title, position = "bottom-end", timer = 4000) => {
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        }
    });

    Toast.fire({ icon: icon, title: title });
};

export { SwalNotification, SwalNotification_HTML, SwalNotification_Toast };
