Jadi karena tadi Faridah update homepagenya dia, itu di update lagi dan disesuain sama yg aing buat sebelumnya.
Nanti cek dulu js/homejs.js nah disitu coba find (ctrl+f) "link-rekap-pendaftaran", "link-daftar-pelamar", "link-hasil-seleksi",
"link-buat-pendaftaran" (tanpa tanda kutip) terus kalo ketemu tinggal di replace sama link page nya

misal link-rekap-pendaftaran di ganti jadi rekappendaftaran.html 

terus nanti kalau mau ada header di page kalian tinggal liat header yang di index.html dan kalau perlu (kurang tau si perlu atau ngga, bisa jadi ngga karena pake session) (misal lagi login jadi pelamar, berarti meskipun udah ke form "link-hasil-seleksi" namun dia rolenya masih pelamar sehingga masih butuh header yang ngeluarin link-link dimana pelamar doang yg bisa liat) itu bisa langsung copas yg ada di js/home/js tadi 