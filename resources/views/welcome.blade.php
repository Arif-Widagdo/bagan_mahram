@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto mb-4">
        <div class="accordion" id="accordionExample">
            <div class="card mb-1">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="video1Click()">
                            Tutorial Menggunakan Aplikasi
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <video controls class="w-100 h-auto" id="video1">
                            <source src="{{ asset('assets/videos/tutorial1.mp4') }}" type="video/mp4">
                            Browser Anda tidak mendukung penggunaan video untuk aplikasi ini.
                        </video>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick="video2Click()">
                            Tutorial Lupa Kata Sandi
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <video controls class="w-100 h-auto" id="video2">
                            <source src="{{ asset('assets/videos/tutorial2.mp4') }}" type="video/mp4">
                            Browser Anda tidak mendukung penggunaan video untuk aplikasi ini.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mx-auto">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="d-flex align-items-center text-black">
                            <h2><i class="fa-solid fa-book-open mr-2 text-primary"></i> <span class="h5">Nasab</span>
                                </h4>
                        </div>
                        <p class="mt-2"> Para ulama tafsir dan fikih berbeda pendapat mengenai arti nasab. Jumhur
                            ulama mengatakan bahwa nasab adalah hubungan antara laki- laki dengan seorang anak yang
                            mencampuri ibunya
                            disebabkan adanya hubungan pernikahan yang sah. Hanafiyah berpendapat bahwa nasab adalah
                            hubungan antara
                            laki-laki dengan seorang anak karena adanya hubungan darah. Konsekuensi logis dari perbedaan
                            ini adalah berkenaan
                            dengan kewarisan. Jumhur ulama berpendapat bahwa kewarisan hanya melalui nasab yang sah,
                            sementara Hanafiyah
                            cenderung kepada adanya kewarisan disebabkan adanya hubungan darah.
                        </p>
                    </div>
                    <div>
                        <div class="d-flex align-items-center text-black">
                            <h2><i class="fa-solid fa-book-open mr-2 text-primary"></i> <span class="h5">Sebab
                                    Ditetapkan Nasab</span></h4>
                        </div>
                        <p class="mt-2"> Tetapan nasab seorang anak kepada ibunya adalah dikarenakan kelahiran
                            (wilâdah), baik secara syariat
                            maupun tidak. Bahwa “sebab-sebab ditetapkannya nasab seorang anak kepada ayahnya, yaitu:
                            pernikahan yang sah (al-zawâj al-shahîh), pernikahan yang rusak (al-zawâj al-fâsid), dan
                            persetubuhan subhat (al-wath'u bi al-syubhah).”
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <div class="d-flex align-items-center text-black">
                                    <h2><i class="fa-solid fa-book-open mr-2 text-primary"></i> <span
                                            class="h5">Pernikahan yang Sah</span></h4>
                                </div>
                                <p class="mt-2"> Para ulama fikih sepakat bahwa akad perkawinan yang sah merupakan sebab
                                    dalam ketetapan nasab seorang anak.
                                    Dengan demikian, anak-anak yang lahir dari perempuan dalam hubungan perkawinan yang
                                    sah adalah
                                    benar-benar anak sang suami, tanpa memerlukan adanya tuntutan ibu agar suami
                                    mengakui anak yang
                                    dilahirkannya adalah anaknya.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <div class="d-flex align-items-center text-black">
                                    <h2><i class="fa-solid fa-book-open mr-2 text-primary"></i> <span
                                            class="h5">Pernikahan yang Rusak</span></h4>
                                </div>
                                <p class="mt-2">Pernikahan fâsid ialah pernikahan yang dilangsungkan dalam keadaan cacat
                                    syarat sahnya.
                                    Para ulama sepakat bahwa penetapan nasab anak yang lahir dalam perkawinan fâsid sama
                                    dengan
                                    penetapan nasab anak yang lahir dalam perkawinan yang sah.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex align-items-center text-black">
                                    <h2><i class="fa-solid fa-book-open mr-2 text-primary"></i> <span
                                            class="h5">Mahram</span></h4>
                                </div>
                                <p class="mt-2"> Mahram adalah orang
                                    yang haram untuk dinikahi karena adanya sebab
                                    keturunan, persusuan, dan pernikahan dalam syariat
                                    Islam. Jadi, orang yang mempunyai pertalian nasab
                                    tidak boleh dinikahi. Sebagaimana dalam Alquran: "
                                    Diharamkan atas kamu (mengawini) ibu-ibumu anak-anakmu yang perempuan,
                                    saudara-saudaramu yang
                                    perempuan, saudara-saudara bapakmu yang perempuan,
                                    saudara-saudara ibumu yang perempuan, anak-anak
                                    perempuan dari saudara-saudaramu yang laki-laki,
                                    anakanak perempuan dari saudara-saudaramu yang
                                    perempuan, ibu-ibumu yang menyusui kamu, saudara
                                    perempuan sepersusuan, ibu-ibu istrimu (mertua), anak-anak istrimu yang dalam
                                    pemeliharaanmu dari istri yang
                                    telah kamu campuri, tetapi jika kamu belum campur
                                    dengan istrimu itu (dan sudah kamu ceraikan), maka
                                    tidak berdosa kamu mengawininya, (dan diharamkan
                                    bagimu) istri-istri anak kandungmu (menantu), dan
                                    menghimpunkan (dalam perkawinan) dua perempuan
                                    yang bersaudara, kecuali yang telah terjadi pada masa
                                    lampau; Sesungguhnya Allah Maha Pengampun lagi
                                    Maha Penyayang." (Q.s. An-Nisa : 23).
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex align-items-center text-black">
                                    <h2><i class="fa-solid fa-book-open mr-2 text-primary"></i> <span class="h5">Wali
                                            Nikah</span></h4>
                                </div>
                                <p class="mt-2">Bagi masyarakat muslim Indonesia, wali nikah merupakan
                                    salah satu syarat yang harus dipenuhi oleh calon mempelai
                                    perempuan ketika hendak melaksanakan akad nikah, artinya
                                    seseorang tidak dapat melangsungkan akad nikah tanpa dihadiri oleh
                                    wali nikahnya. Aturan tentang keharusan menghadirkan wali dalam
                                    perkawinan untuk calon pengantin wanita tersebut didasarkan pada
                                    ketentuan yang termaktub dalam Kompilasi Hukum Islam (KHI).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>

        function video2Click(){
            var video2 = document.getElementById('video2');

            $('#collapseTwo').on('shown.bs.collapse', function () {
                video2.play();
            });

            $('#collapseTwo').on('hidden.bs.collapse', function () {
                video2.pause();
            });
        }

        function video1Click(){
            var video1 = document.getElementById('video1');

            $('#collapseOne').on('shown.bs.collapse', function () {
                video1.play();
            });

            $('#collapseOne').on('hidden.bs.collapse', function () {
                video1.pause();
            });
        }

    </script>
</div>
@endsection
