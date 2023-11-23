{{-- Header --}}
@if (config('layout.extras.notifications.dropdown.style') == 'light')

<div class="d-flex flex-column flex-center py-10 bg-dark-o-5 rounded-top bg-light">
    <h4 class="text-dark font-weight-bold">
       The Mission Of
    </h4>
    <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">Capellan Institute of Technology</span>
</div>
@else
<div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
    <h4 class="text-white font-weight-bold">
        The Mission Of
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
             <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Flag.svg--><svg
             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                 <rect x="0" y="0" width="24" height="24" />
                 <path
                     d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z"
                     fill="#000000" />
                 <path
                     d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z"
                     fill="#000000" opacity="0.3" />
             </g>
         </svg>
         <!--end::Svg Icon-->
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 my-4 mb-1">Our Mision</span>
            <span class="d-block text-dark-50 font-size-lg" >
                We are an educational institution that aims to provide the Filipino youth with competitive skills in the technological workplace.
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                We are committed to the preparation of our youth to the existing and future challenges brought by the advancement of global science and technology by providing them with the adequate technical instruction and training.
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                We recognize that our youth are the principal prime movers of the country. As such, we focus on their complete personal development and inculcate the values of professionalism in their related fields.
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                We appreciate the parents' role in the upbringing of their children to be responsible and useful citizen of this nation. We continuously work with them hand-in-hand in achieving this goal by providing their children with affordable world-class education.
            </span>
            <span class="d-block text-dark-50 font-size-lg" >
                We answer to the government's call in providing its citizenry with technical knowledge as the nation plunges into global competition. As such, we shall provide the nation and the international community with their required skilled manpower.
            </span>
            
        </a>
    </div>


</div>
