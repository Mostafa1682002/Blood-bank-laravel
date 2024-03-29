<!--footer-->
<div class="footer">
    <div class="inside-footer">
        <div class="container">
            <div class="row">
                <div class="details col-md-4">
                    <img src="{{ asset('assets/front/imgs/logo.png') }}">
                    <h4>بنك الدم</h4>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                        العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى.
                    </p>
                </div>
                <div class="pages col-md-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list"
                            href="{{ route('client.index') }}" role="tab" aria-controls="home">الرئيسية</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list"
                            href="{{ route('client.about_us') }}" role="tab" aria-controls="profile">عن بنك الدم</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" href="#"
                            role="tab" aria-controls="messages">المقالات</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                            href="{{ route('client.donation_requests') }}" role="tab" aria-controls="settings">طلبات
                            التبرع</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                            href="{{ route('client.contact_us_form') }}" role="tab" aria-controls="settings">اتصل
                            بنا</a>
                    </div>
                </div>
                <div class="stores col-md-4">
                    <div class="availabe">
                        <p>متوفر على</p>
                        <a href="#">
                            <img src="{{ asset('assets/front/imgs/google1.png') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/front/imgs/ios1.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="other">
        <div class="container">
            <div class="row">
                <div class="social col-md-4">
                    <div class="icons">
                        <a href="{{ $settings->f_link }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $settings->i_link }}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $settings->t_link }}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $settings->w_link }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="rights col-md-8">
                    <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Footer-->
