{{-- Header --}}
@if (config('layout.extras.quick-actions.dropdown.style') == 'light')
    <div class="d-flex flex-column flex-center py-10 bg-dark-o-5 rounded-top bg-light">
        <h4 class="text-dark font-weight-bold">
           The Vision Of
        </h4>
        <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">Capellan Institute of Technology</span>
    </div>
@else
    <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
        <h4 class="text-white font-weight-bold">
           The Vision Of
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
             <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Star.svg--><svg
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                 <polygon points="0 0 24 0 24 24 0 24" />
                 <path
                     d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                     fill="#000000" />
             </g>
         </svg>
         <!--end::Svg Icon-->
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 my-4 mb-1">Our Vision</span>
            <span class="d-block text-dark-50 font-size-lg" >
                CAPELLAN INSTITUTE OF TECHNOLOGY <br> shall be the leading technical-vocational education and training provider of progams in the information and communications technology, electronics, electrical, automotive and tourism, in the Cities of Pasig, San Pablo and Antipolo, and in other surrounding provinces in the Philippines by Year 2025.​
            </span>
        </a>
    </div>


</div>
