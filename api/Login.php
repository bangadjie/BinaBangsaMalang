<?php
session_start();

if(isset($_SESSION['admin_logged_in'])){
    header("Location: Dashboard.php");
    exit;
}

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan kredensial yang Anda tentukan
    if ($username == "SMK" && $password == "binabangsa25") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: Dashboard.php");
        exit;
    } else {
        $error = "Username atau Password Salah";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Bina Bangsa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-900 via-blue-800 to-slate-900 flex items-center justify-center min-h-screen p-4">

    <div class="absolute top-6 left-6">
        <a href="../BinaBangsaMalang.html" class="flex items-center text-white/80 hover:text-white transition-all group">
            <div class="bg-white/10 p-2 rounded-full group-hover:bg-white/20 transition-all mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </div>
            <span class="font-medium">Kembali ke Beranda</span>
        </a>
    </div>

    <div class="glass-effect p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/20 transform transition-all">
        <div class="flex justify-center mb-6">
            <div class="bg-blue-100 p-4 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
        </div>

        <h2 class="text-3xl font-extrabold text-center text-slate-800 mb-2">Panel Admin</h2>
        <p class="text-center text-slate-500 mb-8 text-sm">Masukkan kredensial untuk akses database</p>
        
        <?php if(isset($error)): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm animate-pulse">
                <div class="flex italic">
                    <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <?php echo $error; ?>
                </div>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="space-y-5">
            <div>
                <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Username</label>
                <input type="text" name="username" autocomplete="off" required 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all" 
                       placeholder="Contoh: Admin">
            </div>
            <div>
                <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" required 
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all"
                       placeholder="••••••••">
            </div>
            
            <div class="pt-2">
                <button type="submit" name="login" 
                        class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-900/30 transition duration-300 transform hover:scale-[1.02] active:scale-[0.98]">
                    MASUK KE DASHBOARD
                </button>
            </div>
        </form>

        <footer class="mt-8 text-center">
            <p class="text-slate-400 text-xs">© 2026 SMK Bina Bangsa Malang</p>
        </footer>
    </div>
</body>
</html>