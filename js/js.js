document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".sidebar-link").forEach(item => {
        item.addEventListener("click", function () {
            document.querySelectorAll(".sidebar-link").forEach(link => link.classList.remove("active"));

            this.classList.add("active");
        });
    });

    let lastActiveLink = null;


    var createBukuModal = document.getElementById("createBukuModal");
    if (createBukuModal) {
        createBukuModal.addEventListener("show.bs.modal", function () {
            lastActiveLink = document.querySelector(".sidebar-link.active");
        });

        createBukuModal.addEventListener("hidden.bs.modal", function () {
            document.querySelectorAll(".sidebar-link").forEach(link => link.classList.remove("active"));

            if (lastActiveLink) {
                lastActiveLink.classList.add("active");
            }
        });
    }

    var createPeminjamModal = document.getElementById("createPeminjamModal");
        if (createPeminjamModal) {
            createPeminjamModal.addEventListener("show.bs.modal", function () {
                lastActiveLink = document.querySelector(".sidebar-link.active");
            });

            createPeminjamModal.addEventListener("hidden.bs.modal", function () {
                document.querySelectorAll(".sidebar-link").forEach(link => link.classList.remove("active"));

                if (lastActiveLink) {
                    lastActiveLink.classList.add("active");
                }
            });
        }
});