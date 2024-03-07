<title>Home | Spacecathotal</title>

@extends('components/LayoutUser')

@section('Content')

    <div class="bg-[#ffff]" >
            <!-- พื้นหลังแมว --> 
            <div class="overflow-hidden flex items-center justify-center">
                <div class="image-moving relative flex max-h-[400px] " alt="Moving Image">
                    <img src="{{ URL('/picture/'.'hero-bg.webp') }}" class="min-w-[150%] h-full object-cover ">                   
                </div>  
                    <div class="bg-white absolute inset-x-0 mx-auto top-0 bottom-0 w-[40em] blur-3xl opacity-[95%] rounded-full fixed"></div>
                    <div id="slideText1" class="absolute z-10 text-center mt-[-5em] text-2xl slideText">ยินดีต้อนรับสู่จักรวาลแมว Space Cat Hotel</div>
                    <p  id="slideText1" class="absolute z-10 text-center mx-[28em] text-md  text-gray-700 font-light slideText">จองออนไลน์ง่าย รวดเร็ว และปลอดภัย</p>
                    
                    <img src="https://cdn.discordapp.com/attachments/890449035993972738/1207716887459270727/output-onlinegiftools.gif?ex=65e0a900&is=65ce3400&hm=98910252b2769dab055302c0832dc4ac1c3cc20134d246f2501242630e1cd1d5&" alt="เคลื่อนไหว" class="slideText w-[10em] h-[8em] absolute mt-[10em]">
                    
            </div>
    
        <div id="fixedNavbar" class="slideText flex fixed top-0 inset-x-0 transition-transform duration-300 transform translate-y-full">
                <div class="z-100 inline-flex bg-gray-200 mx-auto border-2 rounded-md px-4 py-2 shadow-lg gap-2">
                <div class= "flex bg-white w-full text-blue-800 text-sm font-medium border-2 rounded-md max-lg:grid max-lg:grid-cols-1">
                        <img src="{{ URL('/picture/'.'footcat.png') }}"class="h-12 pl-3 max-lg:hidden">
                        <div class="mx-4 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED] opacity-100 max-lg:hidden"></div>

                        <!-- date--> 
                        <div date-rangepicker class="flex items-center max-lg:p-2 max-lg:gap-4">
                            <div class="relative inline-flex">
                                <div class="flex items-center mr-2 pointer-events-none">
                                    <img src="{{ URL('/picture/'.'checkin.png') }}"class="min-w-7 min-h-7"/>
                                </div>
                                <input oninput="validateDates();" id="input_start_date" name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Select date start">
                            </div>

                            <span class=" mx-8 text-gray-500 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED]  opacity-100  max-lg:hidden"> </span>
        
                            <div class="relative inline-flex">
                                <div class="flex items-center mr-2 pointer-events-none">
                                    <img src="{{ URL('/picture/'.'checkout.png') }}"class="min-w-7 min-h-7"/>
                                </div>
                                <input  oninput="validateDates();" id="input_end_date" name="end" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Select date end">
                            </div>
                            <!-- เส้นแบ่งตรงกลาง -->
                            <div class="mx-5 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED] opacity-100 max-lg:hidden"></div>
                        </div>           

                        <!-- เพิ่มจำนวนแมว    -->
                        
                        <div class = "inline-flex  mr-2">
                            <img src="{{ URL('/picture/'.'cat1.png') }}"class="w-8 h-8 my-auto  ">   
                            <div class="flex-col">
                                <p class = "w-fit text-[C1C1C1]" >แมว : </p> 
                                <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" data-input-counter-min="1"  data-input-counter-max="6" class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="0" required>
                            </div>
                            <form class="max-w-xs my-auto ">
                                <div class="relative flex items-center max-w-[8rem]">
                                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-9 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-2 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                
                                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-9 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>                       
                        </div>                
                    </div>

                    <!-- ปุ่มกดไปหน้าจองห้อง -->
                    <div onclick="SendFilter()" class="h-full flex items-center">
                        <button id="btnroom" type="button"  class="relative flex h-fit bg-[#DEB489] hover:bg-[#FFF8EE] border border-[FFFFFF] rounded-md shadow-lg w-20">
                            <img src="{{ URL('/picture/'.'right-arrow1.png') }}" class=" w-12 ml-3 "/>
                        </button>
                    </div>
                    
                </div>      
        </div>
        <p class="text-center mx-[28em] text-md  text-gray-700 font-light slideText text-red-700">*เพื่อความปลอดภัยทางร้านขอรับแมวที่มีเอกสารการฉีดวัคซีนเท่านั้น</p>
          
            <!-- ข้อมูลร้าน -->
            <div id="slideText1"  class="slideText" >
                <img src="https://cdn.discordapp.com/attachments/890449035993972738/1207612970708770876/imageCatt_1.png?ex=65e04838&is=65cdd338&hm=d6dc563ce5eef0323e7d265fc868bb599af73954d42b3c24c16239f177b38b37&" alt="เคลื่อนไหว" class="w-[20em] h-[20em] float-right absolute right-0 top-0">
                <p  class="flex items-center justify-center font-md text-3xl mt-5 slide mt-10 slideText text-[#DEB489] " > Space Cat Hotel</p>
                <p class="text-center whitespace-pre-line font-light text-xl">
                    โรงแรมแมวหรือจักรวาลแมว (Space Cat Hotel) เริ่มต้นจากความรักแมว และประสบการณ์การเลี้ยงแมวเองอยู่แล้ว 
                    ทำให้เราเข้าใจความรู้สึกของเจ้าของน้องแมว ที่เวลาไปเที่ยว ไปธุระ ไม่มีใครดูแลน้องแมว 
                    <img src="https://cdn.discordapp.com/attachments/890449035993972738/1207607972146970644/gitCatsleep.gif?ex=65e04390&is=65cdce90&hm=aeacbf39dded10f21f3d04d874dc67e429bef6a1baa15cc8893f83ba31ba21a4&" alt="เคลื่อนไหว" class="w-[25em] h-[15em] absolute">
                    จึงเป็นความต้องการที่จะทำโรงแรมแมว  เพื่อให้ทาสแมวฝากแมวที่คุณรักได้อย่างหายห่วง
                    เพราะเราเลี้ยงน้องแมวทุกตัวด้วยความใส่ใจ ดังคติที่เรายึดมาตลอด
                    
                </p>
                <p class="text-center whitespace-pre-line font-light text-xl mt-5">
                    เราเชื่อว่าน้องแมวทุกตัวที่เจ้าของนำมาฝากให้ทางเราเลี้ยงต้องการความรัก ความอบอุ่น
                    และความเมตตาเช่นเดียวกับที่น้องได้รับจากเจ้าของ แต่ในขณะที่เจ้าของมีความจำเป็นต้องฝากน้องไว้ 
                    ให้เราดูแลเราจึงอยากให้น้องแมวได้รับบริการจากโรงแรมแมวของเราเหมือนมาเที่ยวหรือได้มาพักผ่อน
                    และพร้อมที่จะกลับบ้านอย่างแข็งแรงและสมบูรณ์ทั้งทางร่างกายและจิตใจ
                   
                </p>
            </div>

            <!-- ตัวอย่างห้องพัก -->
        <div id="slideEx" class="slide-animation flex items-center justify-center font-md text-3xl mt-20 mt-10 text-[#DEB489] ">
            ตัวอย่างห้องพัก & ราคา
        </div>
        <div id="slideImg" class="slide-animation flex flex-wrap item-center justify-center gap-[10em] mt-10 text-center ">
                <div>
                    <div class="max-w-sm w-fit  ">
                        <img class="rounded-t-lg " src="{{ URL('/picture/'.'juno.webp') }}" alt="" /> 
                        <div class= " bg-white border p-4 rounded-lg shadow-md mt-2 mb-3 texts-center w-fit ml-auto mr-auto">
                            <p class=" flex items-center justify-center font-bold" >JUNO ROOM</p>
                            <p class=" flex items-center justify-center" > สำหรับแมว 1-2 ตัว</p>
                            <p class=" flex items-center justify-center">เริ่มต้น 400 บาท/คืน</p>                
                        </div>
                    </div>
                </div>
                <div>
                    <div class="max-w-sm w-fit  ">
                        <img class="rounded-t-lg " src="{{ URL('/picture/'.'pluto.webp') }}" alt="" /> 
                        <div class= "bg-white border p-4 rounded-lg border mt-2 mb-3 texts-center w-fit ml-auto mr-auto">
                            <p class=" flex items-center justify-center font-bold" >PLUTO ROOM</p>
                            <p class=" flex items-center justify-center" > สำหรับแมว 3-4 ตัว</p>
                            <p class=" flex items-center justify-center">เริ่มต้น 800 บาท/คืน</p>                
                        </div>
                    </div>
                </div>
                <div>
                    <div class="max-w-sm w-fit">
                        <img class="rounded-t-lg  h-[20em]" src="{{ URL('/picture/'.'planetsuite.webp') }}" alt="" /> 
                        <div class= "bg-white border p-4 rounded-lg border mt-2 mb-3 texts-center w-fit ml-auto mr-auto">
                            <p class=" flex items-center justify-center font-bold" >PLANET SUITE ROOM</p>
                            <p class=" flex items-center justify-center" > สำหรับแมว 5-6 ตัว</p>
                            <p class=" flex items-center justify-center">เริ่มต้น 1200 บาท/คืน</p>                
                        </div>
                    </div>
                </div>
        </div>

            <!-- รายละเอียด -->
        <div id="slide1" class="scroll flex items-center justify-center font-md text-3xl mt-20 slide text-[#DEB489]" >
            ทำไมถึงต้องเลือกโรงแรมของเรา?
        </div>      
        <div id="roomDetails" class="grid grid-cols-1 sm:grid-cols-2 flex-justify-centr slide mt-10">
                <div id="" class="ml-[10em] mr-3 mb-5 sm:mb-0 md:flex-col mt-5 "> 
                    <div class="flex items-center">
                        <div class="bg-[#FFE5BA] rounded-full text-center p-3">
                            <img src="{{ URL('/picture/'.'home.png') }}" class="w-10 "/>
                        </div>
                        <span class="ml-3 font-bold text-xl">ห้องกว้าง มีวิวสวน</span>
                    </div>
                    <p class="px-[4.5em] sm:mx-0 overflow-hidden font-light">โรงแรมแมวของเรา สะอาด ปลอดภัยเพราะอยู่ในบ้านส่วนตัว มีหน้าต่างบานใหญ่ไว้ให้น้องแมวดูวิวสวน ห้องกว้างมาก และ มีชั้นไม้ให้น้องแมววิ่งเล่น ทำให้น้องแมวไม่เครียด แยกห้องไม่ปนกัน และไม่ขังกรง</p> 
                </div>

                <div id="" class="ml-[10em] mr-3 mb-5 sm:mb-0 md:flex-col mt-5 "> 
                    <div class="flex items-center">
                        <div class="bg-[#FFE5BA] rounded-full text-center p-3">
                            <img src="{{ URL('/picture/'.'thermometer.png') }}" class="w-10 "/>
                        </div>
                        <span class="ml-3 font-bold text-xl">เย็นสบาย พร้อมอากาศบริสุทธิ์</span>
                    </div>
                    <p class="px-[4.5em] sm:mx-0 overflow-hidden font-light">เปิดแอร์ 24ชม. พร้อมเครื่องกรองอากาศกรองฝุ่นPM2.5 และ แบคทีเรีย</p> 
                </div>


                <div class="ml-[10em] mr-3 mb-5 sm:mb-0 md:flex-col mt-8 "> 
                    <div class="flex items-center">
                        <div class="bg-[#FFE5BA] rounded-full text-center p-3">
                            <img src="{{ URL('/picture/'.'money.png') }}" class="w-10 "/>
                        </div>
                        <span class="ml-3 font-bold text-xl">ราคาเหมาะสม</span>
                    </div>
                    <p class="px-[4.5em] sm:mx-0 overflow-hidden font-light">คัดกรองน้องแมว Space Cat Hotel รับเฉพาะน้องแมวที่สุขภาพแข็งแรง ฉีดวัคซีนพื้นฐานครบถ้วน และ เลี้ยงในระบบปิด</p> 
                </div>

                <div class="ml-[10em] mr-3 mb-5 sm:mb-0 md:flex-col mt-8 "> 
                    <div class="flex items-center">
                        <div class="bg-[#FFE5BA] rounded-full text-center p-3">
                            <img src="{{ URL('/picture/'.'check-mark1.png') }}" class="w-10 "/>
                        </div>
                        <span class="ml-3 font-bold text-xl">คัดกรองน้องแมว</span>
                    </div>
                    <p class="px-[4.5em] sm:mx-0 font-light">เปิดแอร์ 24ชม. พร้อมเครื่องกรองอากาศกรองฝุ่นPM2.5 และ แบคทีเรีย</p> 
                </div>

                <div class="ml-[10em] mr-3 mb-5 sm:mb-0 md:flex-col mt-8"> 
                    <div class="flex items-center">
                        <div class="bg-[#FFE5BA] rounded-full text-center p-3">
                            <img src="{{ URL('/picture/'.'happiness.png') }}" class="w-10"/>
                        </div>
                        <span class="ml-3 font-bold text-xl">ฟรี! ทรายแมว และ น้ำดื่มสะอาด</span>
                    </div>
                    <p class="px-[4.5em] sm:mx-0 overflow-hidden font-light">ด้วยเครื่องกรองน้ำดื่มระบบ RO มาตรฐานเดียวกับน้ำคนดื่ม</p> 
                </div>

                <div class="ml-[10em] mr-3 mb-5 sm:mb-0 md:flex-col mt-8"> 
                    <div class="flex items-center">
                        <div class="bg-[#FFE5BA] rounded-full text-center p-3">
                            <img src="{{ URL('/picture/'.'family.png') }}" class="w-10"/>
                        </div>
                        <span class="ml-3 font-bold text-xl">ดูแลเหมือนคนในครอบครัว</span>
                    </div>
                    <p class="px-[4.5em] sm:mx-0 font-light">สามารถดูแล และ เล่นกับน้องแมวได้อย่างทั่วถึง "เพราะแมวคือส่วนหนึ่งของครอบครัว"</p> 
                </div>
        </div>

            <!-- โปรโมชั่น-->
            <div id="slidePromotion"  class="slide-animation w-1/6 p-10  ">
                <div class="absulte min-w-[150px] min-h-[45px] text-[FFFFFF] text-center bg-[82C3FF]  border-2 border-white  p-2 shadow-lg origin-bottom -rotate-12 rounded-md  ">โปรโมชั่น</div>
            </div>
            @if(sizeof($promotion))
                <div id="slidePromotionimage" class="slide-animation  grid grid-cols-3 gap-6 px-[10em] max-md:grid-cols-2 max-sm:grid-cols-1">
                    @foreach($promotion as $promotion)
                    <img src="{{ URL('/uploads/'. $promotion->promotion_deposit) }}"class=" mt-3 mx-auto flex h-[15em] w-[19em]  flex items-center justify-center rounded-lg shadow-lg hover:scale-125 duration-300"/>  
                    @endforeach   
                </div>
            @endif
            <div  id="slideMap"  class="slide-animation mt-10  p-10 flex items-cetner justify-center flex-wrap">
                <div class="mr-20 text-center mt-auto mb-auto text-2xl" >
                    <p class="mb-4">ที่อยู่ 687 13 ซอย เจริญนคร 11 </p> 
                    <p class="mb-5">คลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600 </p>
                    <a href="https://maps.app.goo.gl/3GgVfnQD2To8EcSB7" target="_blank" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-5">
                        เปิด Google Map
                    </a>
                </div>  
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.9354525185836!2d100.50656197508972!3d13.722357686666431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29967008c8edd%3A0x3c53d23617727182!2z4LmC4Lij4LiH4LmB4Lij4Lih4LmB4Lih4LinIFNQQUNFIENBVCBIb3RlbCDguIjguLHguIHguKPguKfguLLguKXguYHguKHguKcgOiDguJrguKPguLTguIHguLLguKPguKPguLHguJrguJ3guLLguIHguYHguKXguLDguK3guLLguJrguJnguYnguLPguYHguKHguKc!5e0!3m2!1sth!2sth!4v1707903160408!5m2!1sth!2sth" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
                class="w-[30em] h-[20em] rounded-lg"></iframe>
            </div>
    </div>
    <footer class="bg-gray-300 text-white py-12 flex grid grid-cols-3 ">
        <div class=" whitespace-pre-line font-light  text-center">
            <p class="border-2 mx-[13em]" ></p>
            SPACE CAT HOTEL จักรวาลแมว
            โรงแรมแมวแสนอบอุ่นญี่ปุ่นจ๋าย่านเจริญนคร เดินเพียง 5 นาทีจาก Icon Siam 
            รายล้อมไปด้วยโรงแรมริมน้ำ 5 ดาว และนี่คือโรงแรมแมวลับที่จะพาบรรดา
            ทาสทั้งหลายจินตนาการว่ากำลังเลี้ยงแมวอยู่ในตรอกที่โตเกียว
        </div>
        <div class="container mx-auto flex flex-col text-center">
            <div class="flex mb-4 items-center justify-center">
                <a href="https://www.instagram.com/spacecat_hotel/" class="mr-4">
                    <img src="{{ URL('/picture/'.'instagram.png') }}" alt="Instagram" class="w-10 h-10 ">
                </a>
                <a href="#" class="mr-4">
                <img src="{{ URL('/picture/'.'line.png') }}" alt="Line" class="w-/จ h-10 ">
                </a>
            </div>
            <div class="mb-4">
                <p>ติดต่อเรา:</p>
                <p>อีเมล: spacecathotel@example.com</p>
                <p>เบอร์โทร: 098-285-9134</p>
            </div>
            <div>
                <p>&copy; 2024 สงวนลิขสิทธิ์</p>
            </div>
        </div>
        <img src="https://cdn.discordapp.com/attachments/890449035993972738/1207608400200990791/gitCatplay.gif?ex=65e043f6&is=65cdcef6&hm=059a7490325c2c69e0b904c45b6a3c337f27ed108fa148c785ab5db3c3fe49ed&" alt="เคลื่อนไหว" class="w-[20em] h-[10em] ">
    </footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script >
            // Onclick
            var validateInput = false;
            function SendFilter() {
                validateDates();
                if(validateInput) {
                    fetch("{{ Route('roomFilter') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-Token": "{{ csrf_token() }}"
                        },
                        body:JSON.stringify(
                            {
                                start_date: document.getElementById("input_start_date").value,
                                end_date: document.getElementById("input_end_date").value,
                                cat_amount: document.getElementById("quantity-input").value,
                            }
                        )
                    })
                    .then(async response => {
                        const isJson = response.headers.get('content-type')?.includes('application/json');
                        const data = isJson ? await response.json() : null; 
    
                        console.log(data);
                        if(!response.ok){
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด!',
                                html: `${data.status}`,
                                confirmButtonText: 'ตกลง',
                            })
    
                            const error = (data && data.errorMessage) || "{{trans('general.warning.system_failed')}}" + " (CODE:"+response.status+")";
                            return Promise.reject(error);
                        }
                        
                        window.location.href = data.redirect_url;
    
                    })
                    .catch((er) => {
                        console.log('Error' + er);
                    });                    
                }
            } 

            function validateDates() {
                var startDateInput = document.getElementById("input_start_date");
                var endDateInput = document.getElementById("input_end_date");
                var endDate = new Date(document.getElementById("input_end_date").value);
                var startDate = new Date(startDateInput.value);
                var currentDate = new Date();
                currentDate.setDate(currentDate.getDate());
                currentDate.setHours(7, 0, 0, 0);

                if (startDate >= endDate) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'รูปแบบวันที่ไม่ถูกต้อง!',
                        html: 'วันที่เริ่มต้องไม่ <b class="text-rose-800">มากกว่าหรือเท่ากับ</b> วันที่สิ้นสุด',
                        confirmButtonText: 'ตกลง'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            startDateInput.classList.add("border-red-500");
                            endDateInput.value = currentDate.toISOString().split('T')[0];
                            startDateInput.value = currentDate.toISOString().split('T')[0];
                        }
                    });

                    startDateInput.classList.add("border-red-500");
                    endDateInput.classList.add("border-red-500");
                    // startDateInput.value = "";
                    return false;
                }
                if (startDate < currentDate) {
                    Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'วันที่ของคุณต้องไม่ต่ำกว่าปัจจุบัน!',
                            html: 'กรุณาเลือก<b class="text-rose-800">วันที่</b> ให้ถูกต้อง',
                            confirmButtonText: 'ตกลง'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                startDateInput.classList.add("border-red-500");
                                startDateInput.value = currentDate.toISOString().split('T')[0];
                            }
                        });
                       
                        // startDateInput.value = "";
                        
                        return false;
                }
                if (endDate < currentDate) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'วันที่ของคุณต้องไม่ต่ำกว่าปัจจุบัน!',
                        html: 'กรุณาเลือก<b class="text-rose-800">วันที่</b> ให้ถูกต้อง',
                        confirmButtonText: 'ตกลง'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            startDateInput.classList.add("border-red-500");
                            endDateInput.value = currentDate.toISOString().split('T')[0];
                        }
                    });
                    return false;
                }
                validateInput = true;
            }
            
            // ทำให้ค่อยๆปรากฏ
            document.addEventListener('DOMContentLoaded', function() {
                    var slide1 = document.getElementById('slideText');
                    var slide1Displayed = false;

                    window.addEventListener('scroll', function() {
                        var scrollTop = window.scrollY;
                        var slide1Top = slide1.offsetTop;
                        var windowHeight = window.innerHeight;

                        if (scrollTop + windowHeight >= slide1Top && !slide1Displayed) {
                            slide1Displayed = true;
                            startSlideAnimation();
                        }
                    });

                    // ฟังก์ชันสำหรับทำ slide animation
                    function startSlideAnimation() {
                        // เพิ่ม class เพื่อให้เกิด slide animation
                        slide1.classList.add('slide-animation');
                    }
                });
            // ทำให้สไลด์จากขวาเข้ามา
            document.addEventListener('DOMContentLoaded', function() {
                    var slides = document.querySelectorAll('.slide');

                    function startSlideAnimation() {
                        slides.forEach(function(slide, index) {
                            setTimeout(function() {
                                slide.classList.add('active');
                            }, (slides.length - index) * 100); 
                        });
                    }

                    // เมื่อมีการเลื่อนหน้าลงมา
                    window.addEventListener('scroll', function() {
                        var scrollTop = window.scrollY;
                        var windowHeight = window.innerHeight;

                        // หาตำแหน่งกลางของหน้าจอ
                        var middleOfScreen = scrollTop + windowHeight / 2;

                        // หา Element ที่มี id="slide1"
                        var slide1 = document.getElementById('slide1');
                        if (!slide1) return; // ถ้าไม่พบ Element ให้หยุดทำงาน

                        // หาตำแหน่งของ Element นั้น
                        var slide1Top = slide1.offsetTop;

                        // ถ้าตำแหน่งของ Element นั้นอยู่ในกลางของหน้าจอ
                        if (middleOfScreen >= slide1Top) {
                            startSlideAnimation(); // เริ่ม slide animation เมื่อเลื่อนลงมาถึงตำแหน่งของ Element ที่มี id="slide1"
                            window.removeEventListener('scroll', arguments.callee); // เมื่อเริ่ม slide animation แล้ว ให้ลบ event listener
                        }
                    });
            });
            
                
            window.addEventListener('scroll', () => {
                const slideEx = document.getElementById('slideEx');
                const slideExPosition = slideEx.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (slideExPosition < windowHeight * 0.75) { // เลือกส่วนที่ต้องการให้เลื่อนขึ้นมา
                    slideEx.classList.add('slide-show');
                }
            });

            window.addEventListener('scroll', () => {
                const slideImg = document.getElementById('slideImg');
                const slideImgPosition = slideImg.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (slideImgPosition < windowHeight * 0.75) { // เลือกส่วนที่ต้องการให้เลื่อนขึ้นมา
                    slideImg.classList.add('slide-show');
                }
            });

            window.addEventListener('scroll', () => {
                const slideImg = document.getElementById('slidePromotion');
                const slideImgPosition = slideImg.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (slideImgPosition < windowHeight * 0.75) { // เลือกส่วนที่ต้องการให้เลื่อนขึ้นมา
                    slideImg.classList.add('slide-show');
                }
            });
            window.addEventListener('scroll', () => {
                const slideImg = document.getElementById('slidePromotionimage');
                const slideImgPosition = slideImg.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (slideImgPosition < windowHeight * 0.75) { // เลือกส่วนที่ต้องการให้เลื่อนขึ้นมา
                    slideImg.classList.add('slide-show');
                }
            });
            
            window.addEventListener('scroll', () => {
                const slideImg = document.getElementById('slideMap');
                const slideImgPosition = slideImg.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (slideImgPosition < windowHeight * 0.75) { // เลือกส่วนที่ต้องการให้เลื่อนขึ้นมา
                    slideImg.classList.add('slide-show');
                }
            });



        </script>

        @endsection