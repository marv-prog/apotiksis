<footer class="footer-custom mt-auto">
    <div class="container">
        <div class="row pt-5 pb-4">
            <div class="col-md-4 mb-4">
                <h5 class="footer-heading-custom">BANTUAN & PANDUAN</h5>
                <ul class="list-unstyled footer-links-custom">
                    <li><a href="{{ route('user.pengiriman') }}">Pengiriman</a></li>
                    <li><a href="{{ route('user.cara_order') }}">Cara Order</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="footer-heading-custom">KEBIJAKAN</h5>
                <ul class="list-unstyled footer-links-custom">
                    <li><a href="{{ route('user.kebijakan_privasi') }}">Kebijakan Privasi</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="footer-heading-custom">INFORMASI</h5>
                <ul class="list-unstyled footer-links-custom mb-3">
                    <li><a href="{{ route('user.tentang_kami') }}">Tentang Kami</a></li>
                    <li><span class="text-footer-info">Email: admin@mail.com</span></li>
                    <li><span class="text-footer-info">Tri : 089523429806</span></li>
                </ul>
            </div>
        </div>

        <div class="row border-top-footer pt-3 pb-4">
            <div class="col-12 text-center text-copyright-custom">
                © {{ date('Y') }}, APOTIK SIS Didukung oleh Kelompok 3 
            </div>
        </div>
    </div>
</footer>