<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('site_setting')->insert([
            'address' => 'Griya Asri blok. P2 No. 20, Pakuwon City, Surabaya',
            'phone_number' => '081286628888',
            'wa_number' => '081286628888',
            'about_us' => 'Lokasi Hunian adalah website tempat anda mencari dan menawarkan properti di Indonesia yang senantiasa memberikan pelayanan profesional serta menawarkan harga terbaik untuk Anda. Jika anda merupakan seorang developer atau agen properti, hubungi jutaan pelanggan menggunakan layanan dari lokasihunian.com .',
            'privacy_policy' => '<p><strong>Kebijakan Privasi</strong><br />
            <strong>PENDAHULUAN</strong><br />
            Terima Kasih telah mengakses situs lokasihunian.com. Kami mengoperasikan situs web lokasihunian.com (&quot;Situs Web&quot;) yang dapat diakses menggunakan desktop komputer, telepon selular, tablet dan termasuk aplikasi (termasuk subdomain).<br />
            Kebijakan Privasi mengatur tata cara di mana kami mengumpulkan, menggunakan, mengungkapkan, menyimpan, memproses dan mengelola informasi pribadi yang terdapat pada situs web kami. Dengan mengunjungi atatu menggunakan situs web lokasihunian.com, berlangganan layanan kami atau membuat dan menandatangani suatu perjanjian dengan kami yang berkaitan dengan situs web, maka anda dianggap telah membaca, dan menyetujui pengumuplan, penggunaan, pengungkapan, penyimpanan, pemrosesan dan penanganan informasi pribadi Anda sesuai dengan Kebijakan Privasi.<br />
            <br />
            <strong>MENGHARGAI PRIVASI INFORMASI</strong><br />
            Kami mengenal pentingnya melidungi informasi pribadi sesuai dengan Peraturan Data Pribadi di Indonesia (yaitu, Peraturan Mentri Komunikasi dan Informatika No. 20 tahun 2016 tentang Perlidungan Data Pribadi dalam Sistem Elektronik) dan undang-undang, peraturan, kode praktik, pedoman atau pembimbingan setempat tentang perlidungan data pribadi yang berlaku sebagaimana dapat diterbitkan dari waktu ke waktu (sebagaimana keadaanya)(&quot;Undang-Undang Privasi&quot;) .<br />
            Dalam mengumpulkan dan menangani informasi pribadi, Kami terikat pada Undang-Undang Privasi, termasuk prinsip-prinsip/kewajiban-kewajiban perlidungan data pribadi dan peraturan privasi yang berlaku di Indonesia.<br />
            <br />
            <strong>INFORMASI PRIBADI YANG KAMI KUMPULKAN DARI ANDA</strong><br />
            Kami dapat mengumpulkan informasi pribadi tentang Anda, termasuk tetapi tidak terbatas pada nama, alamat, nomor telepon, email, gender, pekerjaan, kepentingan pribadi dan informasi lain yang Anda telah berikan. Untuk beberapa layanan dan produk, kami juga dapat mengumpulkan informasi pribadi Anda untuk memudahkan proses verifikasi atas identitas Anda, termasuk informasi dari KTP, dan Kartu NPWP Anda. Jika Anda mengakses setiap layanan kami melalui sebuah situs jejaring sosial, baik sepeti Facebook, Twitter, Instagram, dan sebagainya, kami akan mengumpulkan informasi terbatas yang diberikan kepada kami oleh situs jaringan sosial tersebut, misalnya username, ID, dan alamat email.&nbsp;<br />
            Anda diwajibkan untuk menyediakan kepada kami nama, informasi kontak Anda dan keterangan terperinci lainnya yang ditandai sebagai wajib sebagai mana diminta oleh Kami. Jika anda memilih untuk tidak memberikan data pribadi yang wajib yang diminta atau bermaksud menarik menarik persetujuan Anda atau secara signifikan membatasi pemrosesan data pribadi Anda, maka Anda setuju bahwa (terlepas dari perjanjian apa pun antara Anda dan Kami) kami dapat menyediakan layanan dan produk kami kepada Anda. &lt;br&gt;<br />
            Jika Anda mengajukan informasi pribadi kepada kami sehubungan dengan kesempatan kerja, kami juga dapat mengumpulkan informasi nonpribadi tentang Anda termasuk namun tidak terbatas pada, data yang berkaitan dengan kegiatan Anda pada situs web lokasihunian.com melalui teknologi pelacakan seperti cookies, web beacon, dan perangkat atau data pengukuran yang berkaitan dengan tanggapan survei.<br />
            Anda mengakui bahwa informasi pribadi yang Anda berikan kepada kami dan yang kami kumpulkan dari Anda adalah informasi Anda sendiri atau Informasi yang telah Anda berikan wewenang untuk disediakan kepada kami.<br />
            <br />
            <strong>BAGAIMANA KAMI MENGUMPULKAN INFORMASI PRIBADI ANDA</strong><br />
            Kami dapat mengumpulkan informasi pribadi tentang Anda dari berbagai sumber termasuk namun tidak terbatas pada :&nbsp;</p>
            
            <ol>
                <li>mendaftarkan penggunaan situs web atau bagian daripadanya melalui akun Anda pada situs web kami.</li>
                <li>melakukan log in untuk menggunakan situs web kami, termasuk melalui akun situs jejaring sosial Anda.</li>
                <li>berlangganan untuk menerima peringatan/brosur elektronik dan formulir pengajuan, survei atau riset aplikasi, berpartisipasi dalam kegiatan promosi dan kompetisi pada situs web dari layanan kami.</li>
                <li>menghubungi kami untuk alasan apa pun termasuk namun tidak terbatas pada, melaporkan permasalahan dengan situs web, meminta layanan lebih lanjut atau mencari bantuan dari kami.</li>
                <li>menempatkan atau mengkontribusikan materi pada situs web kami.</li>
                <li>dengan mengungkapkan informasi kepada agen penagihan untuk mengembalikan jumlah terutang Anda kepada kami.</li>
                <li>mengajukan lamaran kesempatan bekerja dengan kami secara langsung, atau melalui situs lain yang anda gunakan.</li>
            </ol>
            
            <p>Kami juga dapat mengumpulkan informasi pribadi Anda melalui badan usaha terkait, penyedia layanan, dan para pihak ketiga sehingga kami dapat menyediakan layanan atau produk yang lebih baik atau berkaitan kepada Anda.<br />
            <br />
            <strong>BAGAIMANA KAMI MENGGUNAKAN INFORMASI PRIBADI ANDA</strong><br />
            Kami menggunakan informasi pribadi yang kami telah kumpulkan secara banyak untuk keperluan menyediakan kepada Anda produk dan layanan yang telah Anda minta, menjawab pertanyaan Anda, membuat dan memelihara akun Anda dan menjamin Anda memenuhi dan mematuhi ketentuan penggunaan situs web kami.<br />
            Secara lebih spesifik, kami dapat menggunakan informasi pribadi yang telah dikumpulkan untuk:</p>
            
            <ol>
                <li>memastikan bahwa konten dari situs web disajikan dengan cara yang paling efektif untuk Anda.</li>
                <li>menyediakan layanan atau produk yang lebih baik kepada Anda.</li>
                <li>menggabungkan informasi pribadi Anda dengan informasi yang telah dikumpulkan oleh kami dari penyedia layananya, para pihak, cookies, atau web beacon agar menyediakan pengalaman pribadi yang lebih baik kepada Anda.</li>
                <li>melakukan pengaturan dan penyesuaian atas layanan, pengalaman, iklan Anda, dan konten yang Anda lihat dan gunakan pada situs web dan mitra bisnis kami.</li>
                <li>menanggapi atau menyediakan layanan, produk, informasi dan bantuan yang Anda minta dari kami.</li>
                <li>menghubungi Anda untuk melakukan survei, riset, dan pendapat anda mengenai produk, layanan atau situs web kami.</li>
                <li>memverifikasi identitas Anda pada saat Anda mendaftar atau melakukan log in pada situs web kami.</li>
                <li>memperbolehkan Anda berpartisipasi dalam fitur-fitur interaktif dari layanan kami, apabila Anda memilih untuk melakukan hal tersebut.</li>
                <li>membantu melaksanakan kewajiban-kewajiban kami yang timbul dari kontrak-kontrak yangdibuat dan ditandatangani antara Anda dan kami.</li>
                <li>memberitahukan kepada Anda mengenai perubahan atas produk dan layanan kami.</li>
                <li>mengunakan informasi pribadi Anda dalam pemasaran langsung dan/atau menyediakan informasi pribadi Anda kepada orang lain atau untuk mendapatkan dan/atau untuk digunakan oleh orang tersebut dalam pemasaran langsung sebagaimana diatur dalam bagian PENGUUNAAN DAN PENGUNGKAPAN INFORMASI PRIBADI Anda UNTUK KEPERLUAN PEMASARAN di bawah ini.</li>
            </ol>
            
            <p>Jika Anda mengajukan informasi pribadi kepada Anda berkenaan dengan kesempatan kerja dengan kami, kami juga dapat menggunakan informasi pribadi Anda untuk:</p>
            
            <ol>
                <li>mempertimbangkan Anda untuk jabatan yang telah Anda ajukan informasi pribadi Anda kepada kami atau jabatan lain apa pun yang tersedia atau menjadi tersedia di masa mendatang.</li>
                <li>menjawab Anda berkenaan dengan permohonan di masa mendatang yang Anda ajukan untuk kesempatan kerja dengan kami.</li>
                <li>menghubungi pemberi refrensi Anda untuk mengumpulkan informasi yang telah Anda izikan kepada kami untuk mengumpulkan informasi tentang Anda agar mempertimbangkan Anda dalam kesempatan kerja dengan kami.</li>
            </ol>
            
            <p><br />
            <strong>PENGGUNAAN INFORMASI PRIBADI ANDA UNTUK KEPERLUAN PEMASARAN</strong><br />
            Kami dapat:</p>
            
            <ol>
                <li>menggunakan informasi pribadi Anda (yaitu, nama, alamat, nomor telepon, dan email Anda) untuk menyediakan kepada Anda informasi tentang penawaran, promosi, barang atau jasa dan untuk real estate dengan pemasaran langsung, investasi dan/atau produk/jasa finansial yang kami yakini mungkin menarik bagi Anda.</li>
                <li>menyediakan informasi pribadi Anda (termasuk nama, alamat, nomor telepon, dan email Anda) kepada agen atau agensi, pengembang properti, pembangun, penyelengara, tuan tanah, penyedia keuangan, dan investasi yang memiliki daftar atau iklan pada situs web kami.</li>
            </ol>
            
            <p>Kami tidak dapat begitu menggunakan informasi pribadi Anda untuk pemasaran langsung atau membagikan informasi Anda kepada yang lain untuk pemasaran langsung, kecuali kami telah menerima persetujuan dari Anda. Selanjutnya, kami akan memberikan kepada Anda kesempatan untuk meminta bahwa informasi Anda tidak digunakan untuk pemasaran langsung lebih lanjut dimasa mendatang dalam komunikasi kami dengan Anda.<br />
            <br />
            <strong>KEPADA SIAPA KAMI MENGUNGKAPKAN INFORMASI PRIBADI ANDA</strong><br />
            Kami dapat menggunakan informasi pribadi kepada badan usaha, penyedia layanan, atau mitra bisnis kami yang terkait. Kami juga akan mengungkapkan informasi pribadi Anda:</p>
            
            <ol>
                <li>kepada agen atau agensi, pengembang, pembangun, penyelengara, penyedia keuangan dan investasi yang memiliki daftar atau iklan pada situs web kami dan yang telah meminta informasi dengan mengajukan pertanyaan.</li>
                <li>Kepada penyedia layanan yang kami (yang merupakan klien kami atau perusahaan jasa keuangan, penyedia layanan investasi dan penyedia layanan telekomunikasi) sehingga mereka dapat memberikan kepada Anda produk atau layanan atas nama kami atau produk atau layanan yang telah Anda minta secara langsung dari mereka, atau membantu kami menyediakan produk atau layanan kami.</li>
                <li>kepada paa pihak ketiga di mana Anda telah meminta informasi, layanan atau produk dari mereka.</li>
                <li>sehubungan dengan penjualan atau pengalihan serupa dari suatu bisnis.</li>
                <li>otoritas umum, pemerintah, atau pembuat peraturan yang terkait, perwakilan hukum kami atau pada pihak yang bersangkutan lainnya, dalam situasi khusus dimana kami mempunyai alasan untuk meyakini bahwa pengungkapan informasi pribadi Anda diperlukan untuk membantu mengidentifikasi, menghubungi, atau mengajukan upaya hukum terhadap siapa pun yang merugikan, melukai atau mencampuri (baik secara disengaja atau tidak disengaja) hak atau properti kami, para pengguna atau siapa pun lainnya yang dapat dirugikan oleh kegiatan-kegiatan tersebut.</li>
                <li>apabila kami dengan cara lain diberikan wewenang atau ditentukan oleh hukum untuk melakukan hal tersebut.</li>
            </ol>
            
            <p>Jika Anda meminta informasi dari organisasi apa pun dari situs web kami, maka Anda diwajibkan untuk memeriksa kebijakan privasi mereka agar mengetauhi bangaimana mereka menangani informasi pribadi Anda. Kami tidak bertanggung jawab atas bagaimana organisasi tersebut mengumpulkan, menggunakan, mengungkapkan, menyimpan, menangani informasi yang anda berikan kepada mereka melalui situs web kami.<br />
            <br />
            <strong>PIHAK KETIGA</strong><br />
            Kami dapat menyampaikan detail informasi pribadi Anda pada perusahaan lain dalam grup kami. Kami juga dapat menyampaikan detail informasi pribadi Anda pada agen kami. Kami dapat menggunakan layanan dari pihak ketiga untuk membantu kami memberi layanan kepada Anda, menerima pembayaran dari Anda, menganalisa data, dan menyediakan media pemasaran serta bantuan untuk Anda.&nbsp;<br />
            Selain daripada itu kami TIDAK akan menjual atau memberitahukan data pribadi Anda pada pihak ketiga tanpa mendapatkan persetujuan dari Anda kecuali demi tujuan yang pernting seperti yang tercantum dalam Kebijakan dan Privasi ini atau kecuali diminta secara hukum sesuai dengan peraturan yang berlaku di Indonesia.&nbsp;<br />
            Situs dapat berisi iklan dari pihak ketiga dan tautan ke situs lain, mohon diingat bahwa kami tidak bertanggung jawab pada konten dari pihak ketiga mana pun.<br />
            <br />
            <strong>KEAMANAN</strong><br />
            Kami berusaha untuk memastikan keamanan, integritas dan privasi dari informasi pribadi yang kami kumpulkan. Kami mengadakan penjagaan dan menggunakan tindakan keamanan yang wajar untuk melidungi informasi pribadi Anda dari akses, pengubahan, pengungkapan yang tida berwewenang. Karyawan, Kontraktor, Agen, dan penyedia layanan kami yang menyediakan layanan yang berkaitan dengan sistem informasi kami, wajib menjaga kerahasiaan dari setiap informasi kami, wajib menjaga kerahasiaan dari setiap informasi pribadi yang kami simpan. Kami menunjau ulang dan memberbarui tindakan keamanan kami sehubungan dengan teknologi terbaru. Namun disayangkan, tidak terdapat transmisi data pada internet yang dapat dijamin aman sepenuhnya.<br />
            <br />
            <strong>PERBAIKAN DAN AKSES</strong><br />
            Kami akan berupaya untuk mengambil seluruh langkah yang wajar untuk menjaga keakuratan dan pembaruan atas setiap informasi yang kami simpan mengenai Anda. Jika pada setiap saat Anda menemukan bahwa informasi yang disimpan mengenai Anda adalah tidak benar atau Anda bermaksud untuk meninjau ulang dan menegaskan keakuratan informasi pribadi Anda. Anda dapat mengubungi kami.<br />
            <br />
            <strong>PENYELESAIAN KELUHAN</strong><br />
            Kami terikat untuk menyediakan kepada para pelanggannya suatu sistem yang adil dan bertanggungjawab dalam menangani keluhan. Jika pada setiap saat Anda memiliki permasalahan, keluhan, atau pertanyaan yang berkaitan dengan dengan privasi Anda atau dengan pengoperasian layanan kami, silahkan menghubungi kami sehingga kami mungkin dapat menyelesaikan permasalahan Anda.<br />
            Untuk infomasi lebih lanjut tentang masalah privasi dan perlidungan data pribadi Anda, silakan kunjungi situs web Kementiran Komunikasi dan Informatika.<br />
            <br />
            <strong>COOKIES DAN WEB BEACONS</strong><br />
            Kami menggunakan cookies, web beacon dan perangkat pengukuran pada situs web kami serta penyedia layanan kami dan para pihak ketiga seperti mitra analitis, iklan, atau layanan iklan kami. Kami menggunakan dan mengungkapkan informasi yang dikumpulkan melalui pengunaan cookies, web beacons, dan alat pengukuran yang sesuai dengan Kebijakan Privasi ini. Hal ini termasuk menggunakan informasi untuk melaporkan statistik, menganalisa tren, mengurus layanan kami, memeriksa permasalahan serta menargetkan dan meningkatkan kualitas produk dan layanan kami.&nbsp;<br />
            Kami juga mengizinkan para pihak ketiga lainnya untuk menggunakan cookies dan web beacon mereka sendiri untuk mengumpulkan informasi tentang kunjungan Anda pada situs web kami. Kami tidak memiliki kendali atas cookies tersebut dan penggunaannya.<br />
            <br />
            <strong>HAK-HAK ANDA</strong><br />
            Anda juga dapat memperoleh akses ke informasi pribadi mengenai Anda yang kami simpan, dengan tunduk pada pengeculaian-pengecualian tertentu yang diatur oleh hukum. Untuk meminta akses ke informasi pribadi Anda, silahkan menhubungi kami untuk membatasi pemrosesan atau menghentikan permrosesan informasi pribadi Anda. Untuk melaksanakan hak ini, silahkan mengubungi kami.<br />
            <br />
            <strong>UMUM</strong><br />
            Kami dapat meperbarui Kebijakan Privasi ini setiap saat mengikuti ketentuan dan peraturan yang berlaku di Indonesia.</p>',
            'tnc' => '<p><strong>SYARAT DAN KETENTUAN</strong><br />
            Ketentuan Penggunaan ini merupakan dasar yang dapat anda gunakan untuk mengakses dan menggunakan layanan yang kami sediakan. dengan menggunakan layanan yang kami sediakan maka Anda dianggap telah membaca dan menerima ketentuan-ketentuan yang telah ditetapkan. Apabila Anda memiliki keberatan atas salah satu dari ketentuan penggunaan layanan kami maka pilihan Anda adalah untuk segera menghentikan penggunaan layanan yang telah kami sediakan kepada Anda.&nbsp;<br />
            Kami tidak menjamin bahwa konten, tautan, atau subdomain yang dimuat pada situs web kami akan tersedia dan daat selalu diakses oleh Anda. Kami dapat mengubah atau mengarahkan ulang alur atau lokasi suatu tautan konten yang dimuat dalam situs web kami sewaktu-waktu tanpa adanya pemberitahuan sebelumnya kepada Anda. Kami tidak mejamin bahwa suatu tautan akan tetap konstan pada waktu anda meneruskan atau mebaginya, karena tautan tersebut dapat beruba-ubah sewaktu-waktu tanpa pemberitahuan kepada Anda.<br />
            Perusahaan bertanggung jawab untuk menjaga situs kami dan seluruh publikasi yang telah dilakukan, lokasihunian.com tidak membuat jaminan apa pun tentang keakuratan informasi yang dimuat didalamnya (termasuk namun tidak terbatas pada setiap konten yang terpasang pada situs kami oleh atau atas nama Perusahaan, dan setiap konten dari pihak ketiga pada situs web kami) dan perusahaan dan entitas-entitas, para direktur, pejabat, dan agennya yang terkait menyangkal segala kewajiban dan tanggung jawab atas kerugian atau kerusakan baik secara langsung maupun tidak langsung yang mungkin diderita oleh suatu penerima dengan mengandalkan apa pun yang dimuat dalam atau dihilangkan dari situs kami.<br />
            <br />
            <strong>PEMBATASAN PENGGUNAAN SITUS WEB</strong><br />
            Dalam mengakses atau menggunakan platform kami Anda setuju bahwa Anda tidak akan:</p>
            
            <ol>
                <li>menggunakan perangkat, perangkat lunak, proses atau cara otomatis untuk mengakses, mengambil, mengumpulkan, atau membuat indeks pada layanan kami atau konten yang ada dalam situs web kami.</li>
                <li>menggunakan perangkat, perangkat lunak, prose atau cara apa pun untuk menganggu kerja yang benar pada situs web kami.</li>
                <li>mengambil tindakan apa pun yang akan mengenakan beban atau membuat permintaan akses yang berlebihan pada infrastruktur kami yang kami anggap sebagai pengunaan yang tidak wajar.</li>
                <li>menggunakan atau menyusun indeks untuk setiap konten atau data pada platform kami.</li>
                <li>mengirimkan spam, surat berantai, survei, baik yang bersifat komersial atau tidak.</li>
                <li>menggunakan konten dan layanan kami dengan cara apa pun yang menurut kami mutlak tidak wajar.</li>
                <li>melanggar hak-hak yang dimilki oleh pihak mana pun, termasuk hak cipta, rahasia dagang, hak privasi, atau setiap hak kekayaan intelektual atau hak kepemiliki lainnya.</li>
                <li>berpura-pura sebagai orang atau entitas mana pun atau berupaya untuk memperoleh uang, kata sandi, atau informasi pribadi dari orang mana pun.</li>
                <li>bertindak dengan melanggar Syarat dan Ketentuan layanan kami atau setiap hukum yang berlaku.</li>
                <li>mengadakan, mempublikasikan ulang, mengirim ulang, memodifikasi, mengadaptasi, mendistribusikan, menerjemahkan, membuat karya turunan atau adaptasi dari, menampilkan untuk publik, menjual, memperdagangkan, atau dengan cara apa pun konten yang tersedia dalam layanan kami.</li>
                <li>mengirimkan atau berusaha mengirimkan virus komputer seperti worm, trojan, atau hal lain yang bersifat destruktif.</li>
            </ol>
            
            <p><br />
            <strong>HAK CIPTA</strong><br />
            Seluruh konten dan materi yang tersedia dan dapat diakses melalui layanan kami adalah hak cipta. Perusahaan memberikan kepada para pengunjung izin untuk mengunduh mater hak cipta hanya untuk keperluan pribadi dan bukan komersial.<br />
            <br />
            <strong>KONTRIBUSI</strong><br />
            Data baik termasuk teks, video, gambar, dan audio atau materi lain yang anda bagikan atau posting ke layanan yang kami sediakan sebagaimana diizinkan berdasarkan ketentuan-ketentuan ini. Perusahaan dapat sewaktu-waktu, namun tanpa kewajiban Anda, menghapus, mengubah atau menonaktifkan akses kepada setiap atau seluruh kontribusi yang anda berikan tanpa pemberitahuan terlebih dahulu kepada Anda.&nbsp;<br />
            Perusahaan dapat menghapus atau menonaktifkan akses kepada kontribusi Anda jika pihaknya menganggap bahwa :&nbsp;</p>
            
            <ol>
                <li>kontribusi tersebut melanggar peraturan atau perundang-undangan.</li>
                <li>kontribusi tersebut melanggar hak atas kekayaan intelektual milik suatu pihak.</li>
                <li>kontribusi tersebut bersifat menyesatkan atau menipu, tidak sesuai dengan tujuan layanan, memiliki kemungkinan akan menyebabkan pelangaran, bersifat cabul, merusak nama baik, atau rusak.</li>
            </ol>
            
            <p>Anda memiliki semua hak kepemilikan atas kontribusi yang Anda berikan. Perusahaan tidak memiliki kewajiban apa pun untuk memperlakukan kontribusi anda sebagai informasi kepemilikan. Sepanjang suatu kontribusi yang anda berikan maka Perusahaan memiliki lisensi yang berlaku diseluruh dunia, tidak eksklusif, bebas royalti berkelanjutan, dapat dialihkan dan dapat ditarik kembali untuk menggunakan, memodifikasi, mempublikasikan kontribusi Anda di seluruh dunia pada media apa pun.<br />
            <br />
            <strong>JAMINAN LEBIH LANJUT</strong><br />
            Anda menyatakan dan menjamin bahwa :</p>
            
            <ol>
                <li>dalam penggunaan layanan kami, Anda akan selalu mematuhi ketentuan-ketentuan ini dan setiap arahan yang kami buat untuk &nbsp;Anda terkait penggunaan layanan kami dari waktu ke waktu.</li>
                <li>Anda memastikan bahwa Anda menyimpan nama pengguna dan kata sandi yang Anda gunakan untuk mengakses lokasihunian.com adalah rahasia dan selalu aman.</li>
                <li>Anda menerima seluruh tanggung jawab atas setiap penggunaan yang tidak sah dari setiap nama pengguna dan kata sandi yang berlaku kecuali yang diakibatkan oleh tindak kelalaian yang secara hukum berkaitan dengan Perusahaan.</li>
            </ol>
            
            <p><strong>GANTI RUGI</strong><br />
            Anda setuju untuk memberikan ganti rugi dan membebaskan Perusahaan dan afiliasinya (termasuk pejabat, agen, mitra dan karyawannya) terhadap setiap kerugian, kewajiban, klaim, atau permintaan yang timbul dari, atau sehubungan dengan penggunaan dan akses kepada layanan kami.<br />
            <br />
            <strong>BATAS TANGGUNG JAWAB</strong><br />
            Hak-hak dan upaya pemulihan tertentu dapat tersedia berdasarkan perundang-undangan perlidungan konsumen Indonesia dan mungkin tidak diizinkan untuk dikecualikan, dibatasi, atau dimodifikasi. Selain dari hak-hak dan upaya permulihan tersebut diizinkan oleh hukum.&nbsp;<br />
            Dalam hal apapun perusahaan tidak bertanggung jawab kepada Anda atau pihak ketiga mana pun atas ganti rugi yang bersifat tidak langsung, konsekuensial seperti kerugian laba, kehilangan pendapatan, kehilangan pelanggan, penghentian operasional, dan sebagainya.<br />
            <br />
            <strong>UMUM</strong><br />
            Kami dapat meperbarui Syarat dan Ketentuan ini setiap saat mengikuti ketentuan dan peraturan yang berlaku di Indonesia.&nbsp;</p>',
            'web_address' => url(''),
            'fb_profile' => '',
            'twitter_profile' => '',
            'ig_profile' => '',
            'yt_profile' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
