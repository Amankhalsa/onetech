@php
     $setting = DB::table('sitesettings')->first();
@endphp


<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">OneTech
                            <img src="https://ecom.amankhalsa.in/public/frontend/images/logo.png" alt="">    
                        </a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">{{isset($setting->phone_one) ? $setting->phone_one : "NA"}}</div>
                    <div class="footer_contact_text">
                        <p>{{isset($setting->company_address) ? $setting->company_address : "NA"}}</p>
                        <p>Grester London NW18JR, UK</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="{{isset($setting->facebook) ? $setting->facebook : "#"}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{isset($setting->twitter) ? $setting->twitter : "#"}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{isset($setting->youtube) ? $setting->youtube : "#"}}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{isset($setting->youtube) ? $setting->youtube : "#"}}"><i class="fab fa-google"></i></a></li>
                            <li><a href="{{isset($setting->youtube) ? $setting->youtube : "#"}}"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    <ul class="footer_list">
                        <li><a href="#">Computers & Laptops</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Smartphones & Tablets</a></li>
                        <li><a href="#">TV & Audio</a></li>
                    </ul>
                    <div class="footer_subtitle">Gadgets</div>
                    <ul class="footer_list">
                        <li><a href="#">Car Electronics</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>