document.getElementById("registrationForm").addEventListener("submit", function (e) {
    const name = document.getElementById("name").value;
    const phone = document.getElementById("phone").value;
    const fileInput = document.getElementById("textFile");
    const file = fileInput.files[0];

    // Validasi panjang nama
    if (name.length < 3 || name.length > 50) {
        alert("Nama harus antara 3-50 karakter.");
        e.preventDefault();
        return;
    }

    // Validasi nomor telepon hanya angka
    if (!/^\d+$/.test(phone)) {
        alert("Nomor telepon hanya boleh berisi angka.");
        e.preventDefault();
        return;
    }

    // Validasi ukuran file dan tipe file
    if (file) {
        if (file.size > 1024 * 1024) {
            alert("Ukuran file tidak boleh lebih dari 1MB.");
            e.preventDefault();
            return;
        }
        if (!file.name.endsWith(".txt")) {
            alert("Hanya file teks (.txt) yang diperbolehkan.");
            e.preventDefault();
            return;
        }
    }
});
