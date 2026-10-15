<?php

$success = false;
$empty = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName  = htmlspecialchars($_POST['lastName']);
    $email     = htmlspecialchars($_POST['email']);
    $phone     = htmlspecialchars($_POST['phone']);
    $message   = htmlspecialchars($_POST['message']);

    // VALIDASI FORM
    if (
        empty($firstName) ||
        empty($lastName) ||
        empty($email) ||
        empty($phone) ||
        empty($message)
    ) {

        $empty = true;

    } else {

        $success = true;

    }

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Result</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-[#0f0f0f] min-h-screen flex items-center justify-center px-4 py-10">

<div class="w-full max-w-2xl">

    <!-- SUCCESS -->
    <?php if($success): ?>

    <div class="bg-[#181818] border border-green-500/30 rounded-[35px] overflow-hidden shadow-2xl">

        <!-- TOP -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-8 text-center">

            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center text-5xl mx-auto backdrop-blur-xl">
                ✅
            </div>

            <h1 class="text-4xl font-black text-white mt-6">
                Pesan Berhasil Masuk
            </h1>

            <p class="text-white/80 text-lg mt-3">
                Terima kasih sudah menghubungi kami.
            </p>

        </div>

        <!-- CONTENT -->
        <div class="p-8 text-white space-y-5">

            <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                <p class="text-gray-400 text-sm">
                    Nama Lengkap
                </p>

                <h3 class="text-xl font-bold mt-1">
                    <?php echo "$firstName $lastName"; ?>
                </h3>
            </div>

            <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                <p class="text-gray-400 text-sm">
                    Email
                </p>

                <h3 class="text-xl font-bold mt-1">
                    <?php echo $email; ?>
                </h3>
            </div>

            <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                <p class="text-gray-400 text-sm">
                    Nomor HP
                </p>

                <h3 class="text-xl font-bold mt-1">
                    <?php echo $phone; ?>
                </h3>
            </div>

            <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                <p class="text-gray-400 text-sm">
                    Pesan
                </p>

                <h3 class="text-lg leading-relaxed mt-2">
                    <?php echo $message; ?>
                </h3>
            </div>

            <!-- BUTTON -->
            <a 
                href="index.html"
                class="mt-6 inline-flex items-center justify-center w-full bg-orange-500 hover:bg-orange-600 transition py-4 rounded-2xl text-lg font-black text-white shadow-xl"
            >
                Kembali Ke Halaman Utama
            </a>

        </div>

    </div>

    <?php endif; ?>



    <!-- ERROR -->
    <?php if($empty): ?>

    <div class="bg-[#181818] border border-red-500/30 rounded-[35px] overflow-hidden shadow-2xl">

        <!-- TOP -->
        <div class="bg-gradient-to-r from-red-500 to-pink-500 p-8 text-center">

            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center text-5xl mx-auto backdrop-blur-xl">
                ❌
            </div>

            <h1 class="text-4xl font-black text-white mt-6">
                Form Gagal Dikirim
            </h1>

            <p class="text-white/80 text-lg mt-3">
                Semua data wajib diisi terlebih dahulu.
            </p>

        </div>

        <!-- CONTENT -->
        <div class="p-8 text-white">

            <div class="bg-white/5 rounded-2xl p-5 border border-white/10">

                <h3 class="text-xl font-bold text-red-400">
                    Kemungkinan Penyebab:
                </h3>

                <ul class="mt-4 space-y-3 text-gray-300">

                    <li>
                        • Nama depan belum diisi
                    </li>

                    <li>
                        • Nama belakang belum diisi
                    </li>

                    <li>
                        • Email belum diisi
                    </li>

                    <li>
                        • Nomor HP belum diisi
                    </li>

                    <li>
                        • Pesan masih kosong
                    </li>

                </ul>

            </div>

            <!-- BUTTON -->
            <div class="grid md:grid-cols-2 gap-4 mt-8">

                <!-- TRY AGAIN -->
                <a 
                    href="javascript:history.back()"
                    class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 transition py-4 rounded-2xl text-lg font-black text-white shadow-xl"
                >
                    Coba Lagi
                </a>

                <!-- BACK HOME -->
                <a 
                    href="index.html"
                    class="inline-flex items-center justify-center bg-white/10 hover:bg-white/20 transition py-4 rounded-2xl text-lg font-black text-white border border-white/10"
                >
                    Halaman Utama
                </a>

            </div>

        </div>

    </div>

    <?php endif; ?>

</div>

</body>
</html>