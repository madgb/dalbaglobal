document.addEventListener('DOMContentLoaded', function() {

    const btnSave = document.getElementById("btnSave");


    if(btnSave) {
        btnSave.addEventListener("click", (e) => {
            e.preventDefault();

            clearAllerror();

            const joinFrm = document.getElementById("joinFrm");

            if(chkFrm(joinFrm)) {

                let formData = new FormData();
                
            }
        })
    }
}
)