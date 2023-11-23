@if (config('layout.extras.cart.dropdown.style') == 'light')
<div class="d-flex flex-column flex-center py-10 bg-dark-o-5 rounded-top bg-light">
    <h4 class="text-dark font-weight-bold">
       History of
    </h4>
    <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">Capellan Institute of Technology</span>
</div>
@else
<div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
    <h4 class="text-white font-weight-bold">
       History of
    </h4>
    <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">Capellan Institute of Technology</span>
</div>
@endif

{{-- Nav --}}
<div class="row row-paddingless">
    {{-- Item --}}
    <div class="col-12">
        <a href="#" class="d-block pb-10 pt-5 px-5 text-center bg-hover-light border-right border-bottom">
            {{-- {{ Metronic::getSVG("media/svg/icons/Shopping/Euro.svg", "svg-icon-3x svg-icon-success") }} --}}
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Globe.svg--><svg
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
            height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <path
                    d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                    fill="#000000" fill-rule="nonzero" />
                <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
            </g>
        </svg>
        <!--end::Svg Icon-->
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 my-4 mb-1">HISTORY</span>
            <span class="d-block text-dark-50 font-size-lg" >
                HOW WE STARTED?<br> Founded in 1991, it has the main objective of providing quality technical education of the youths. 
                Its first location is in Kapitolyo, Pasig City and became one of the first technical schools in the City of Pasig. 
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                Initially registered with the Department of Education (DepEd), it then transferred its registration to the Technical Education and Skills Development Authority (TESDA) sometime in 1995. 
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                Since 1991, CIT, as we are now known, had a long history of excellence and tradition.
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                For almost 30 years, we have been known to produce graduates who are competent in the fields of automotive, electrical, hotel and restaurant services and computer/IT for the people in Pasig City, San Pablo City, Laguna and Antipolo City, Rizal. 
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                For more than 25 years, we have been transforming minds and changing lives of thousands of graduates.

            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                CIT San Pablo City was established and started in 2006.
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                CIT Antipolo City was established and started in 2017.
            </span>
        </a>
    </div>


</div>