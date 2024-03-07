<title>Home | Puenmeaw</title>

@extends('components/LayoutUser')

@section('Content')
        <!-- พื้นหลังแมว --> 
        <div class="overflow-hidden">
            <div class="image-moving relative flex max-h-[400px]">
                <img src="{{ URL('/picture/'.'allcat.png') }}" class="min-w-[300%] h-full object-cover">
            </div>            
        </div>
        <!-- body -->
       <div class="flex">
           <div class = "z-20 inline-flex bg-[#EDEDED] mx-auto border-2 rounded-md px-[20px] py-2 mt-[-2%] shadow-lg gap-2">
               <div class= "flex bg-white w-full text-blue-800 text-sm font-medium border-2 rounded-md max-lg:grid max-lg:grid-cols-1">
                    <img src="{{ URL('/picture/'.'shower1.png') }}"class="h-10 pl-3 mt-1.5 max-lg:hidden">
                    <div class="mx-4 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED] opacity-100 max-lg:hidden"></div>

                    <!-- date--> 
                    <div date-rangepicker class="flex items-center max-lg:p-2 max-lg:gap-4">
                        <div class="relative inline-flex">
                            <div class="flex items-center mr-2 pointer-events-none">
                               <img src="{{ URL('/picture/'.'date.png') }}"class="min-w-7 min-h-7 w-12"/>
                            </div>
                            <input id="input_start_date_shawer" name="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Select date start">
                        </div>

                        <span class=" mx-3 text-gray-500 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED]  opacity-100  max-lg:hidden"> </span>
    
                        <div class="relative inline-flex">
                            <div class="flex items-center mr-2 ml-0 pointer-events-none">
                                <img src="{{ URL('/picture/'.'time.png') }}"class="min-w-7 min-h-7 w-[4em]"/>
                            </div>
                            <input  id="input_start_time_shawer" name="end" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Select date end">
                        </div>
            
                        <!-- เส้นแบ่งตรงกลาง -->
                        <div class="mx-5 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED] opacity-100 max-lg:hidden"></div>
                    </div>           

                     <!-- เพิ่มจำนวนแมว    -->
                     <div class = "inline-flex  mr-2">
                        <img src="{{ URL('/picture/'.'cat1.png') }}"class="w-8 h-8 my-auto  ">   
                        <div class="flex-col">
                            <p class = "w-fit text-[C1C1C1]" >แมว :</p> 
                            <input type="text" id="cat_amount_shawer" data-input-counter aria-describedby="helper-text-explanation" data-input-counter-min="1"  class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="0" required>
                        </div>
                        <form class="max-w-xs my-auto ">
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="decrement-button" data-input-counter-decrement="cat_amount_shawer" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-9 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-2 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                              
                                <button type="button" id="increment-button" data-input-counter-increment="cat_amount_shawer" class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-9 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </form>                       
                    </div>                
                </div>

                <!-- ปุ่มกดไปหน้าจองห้อง -->
                <div class="h-full flex items-center ">
                    <button id="btnShower" type="button"  class="relative flex h-fit bg-[4D994C] border border-[FFFFFF] rounded-md shadow-lg w-20">
                        <img src="{{ URL('/picture/'.'right-arrow1.png') }}" class=" w-12 ml-3   "/>
                    </button>
                </div>
            </div>      
       </div>

        <!-- โปรโมชั่น-->
        <div class="w-1/6 p-10  ">
            <div class="absulte min-w-[150px] min-h-[45px] text-[FFFFFF] text-center bg-[82C3FF]  border-2 border-white  p-2 shadow-lg origin-bottom -rotate-12 rounded-md  ">โปรโมชั่น</div>
        </div>
        <div class="grid grid-cols-3 gap-6 px-[10em] max-md:grid-cols-2 max-sm:grid-cols-1">
            <img src="{{ URL('/picture/'.'shower cat.jpg') }}"class=" h-[15em] w-[19em] flex items-center justify-center rounded-lg shadow-lg hover:scale-125 duration-300"/>     
            <img src="{{ URL('/picture/'.'shower3.jpg') }}"class=" h-[15em] w-[19em]  flex items-center justify-center rounded-lg shadow-lg hover:scale-125 duration-300"/>     
            <img src="{{ URL('/picture/'.'shower cat.jpg') }}"class=" h-[15em] w-[19em]  flex items-center justify-center rounded-lg shadow-lg hover:scale-125 duration-300"/>     

        </div>
        <div class=" relative flex justify-center items-center px-[8em] py-[10em] mt-3 bg-gray-300 h-20">
            <!-- จักรวาลแมว -->
            <div class ="flex-col  px-6 w-full  h-[300px] flex items-centers text-center">
                <div class="my-auto">
                    <hr class="h-[2px] bg-gray-700 w-[35px] mx-auto">
                    <p class = "">SPACE CAT HOTEL จักรวาลแมว</p>     
                    <p class = "">โรงแรมแมวแสนอบอุ่นญี่ปุ่นจ๋าย่านเจริญนคร เดินเพียง 5 นาทีจาก Icon Siam รายล้อมไปด้วยโรงแรมริมน้ำ 5 ดาว และนี่คือโรงแรมแมวลับๆ</p> 
                    <p class = "">ที่จะพาบรรดาทาสทั้งหลายจินตนาการว่ากำลังเลี้ยงแมวอยู่ในตรอกที่โตเกียว</p>          
                </div> 
            </div>      
        </div>

               <!-- start modal shower -->
            <div id="modal-Shower" class="modal hidden fixed z-[100] flex my-auto left-0 top-0 w-[100%] h-[100%] overflow-auto  ">
                <!-- START MODEL CONTENT -->
                <div class="modal-content bg-white m-auto p-[10px] rounded-md drop-shadow-xl w-[90%] max-md:w-[100%]">
                    <div class="flex items-center">
                        <p class="text-[20px] font-bold w-full ml-4 text-center">เลือกบริการ</p>
                        <span id="details-close-shower" class="text-gray-500 text-[30px] font-medium absolute top-0 right-0 mr-4 hover:text-indigo-600 cursor-pointer">&times;</span>
                    </div>
                    <hr class="mt-4">
                    <!-- body -->
                    <div class="mt-4 grid grid-cols-2 px-[5em] gap-4 ">
                        <!-- start grid1-->
                        <div class = "relative grid grid-cols-2 border rounded-lg shadow-xl ">
                            <div class="col-span-2 grid grid-cols-2 border-b-2 border-gray-200">
                                <div class="grid grid-cols-3 mx-1 my-2 border-r-2 border-gray-200">
                                    <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                        <img src="{{ URL('/picture/'.'checkin.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                    </div>
                                    <div class= "col-span-2 flex-col whitespace-nowrap">
                                        <span>วันที่ใช้บริการ</span>
                                        <p class="text-gray-300" id="input_start_date_shawer_modal">จาก 10:00</p>   
                                    </div>           
                                </div>
                                <!-- checkout -->
                                <div class="grid grid-cols-3 mx-1 my-2 ">
                                    <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                        <img src="{{ URL('/picture/'.'checkout.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                    </div>
                                    <div class= "col-span-2 flex-col whitespace-nowrap">
                                        <span>เวลา</span>
                                        <p class="text-gray-300 " id="input_start_time_shawer_modal" >จาก 10:00</p>   
                                    </div> 
                                </div>
                            </div>  
                            <!-- อาบน้ำและตัดขน -->
                                <div class="mx-auto mt-3 shadow-md rounded-lg">
                                    <div class="flex flex-wrap justify-center gap-3">                                        
                                        <label class="cursor-pointer ">
                                        <input type="radio" class="peer sr-only" name="pricing" onchange="updateHeaderText('shawer_cat_cut')" />
                                            <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                                                <div class="flex flex-col gap-1">
                                                    <div class="flex items-center justify-between">
                                                        <p id="shawer_cat_cut" class="text-sm font-semibold uppercase text-gray-500">อาบน้ำ & ตัดขน</p>
                                                        <div>
                                                            <svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="text-xs flex items-end justify-between">
                                                        <p>อาบน้ำและตัดขนน้องแมว</p>
                                                        <p id="total_price_cat_cut" class="text-sm font-bold ml-3" >฿500</p>
                                                        <span  class="text-sm font-bold">/ ตัว </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>    
                                 <!-- อาบน้ำ-->                                                                                                             
                                <div class="mx-auto mt-3 shadow-md rounded-lg">
                                    <div class="flex flex-wrap justify-center gap-3">                                                                            
                                        <label class="cursor-pointer">
                                           <input type="radio" class="peer sr-only" name="pricing" onchange="updateHeaderText('shawer_cat')" />
                                            <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                                                <div class="flex flex-col gap-1">
                                                    <div class="flex items-center justify-between">
                                                        <p id="shawer_cat" class="text-sm font-semibold uppercase text-gray-500">อาบน้ำ</p>
                                                        <div>
                                                            <svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="text-xs flex items-end justify-between">
                                                        <p>อาบน้ำน้องแมวอย่างเดียว</p>
                                                        <p class="text-sm font-bold">฿300 / ตัว</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>                                       
                                    </div>
                                </div>    
                                 <!-- ตัดขน-->                                                                                                             
                                 <div class="mx-auto mt-3 shadow-md rounded-lg mb-10">
                                    <div class="flex flex-wrap justify-center">                                                                            
                                        <label class="cursor-pointer">
                                        <input type="radio" class="peer sr-only" name="pricing" onchange="updateHeaderText('shawer_cut')" />
                                            <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                                                <div class="flex flex-col gap-1">
                                                    <div class="flex items-center justify-between">
                                                        <p id="shawer_cut" class="text-sm font-semibold uppercase text-gray-500">ตัดขน</p>
                                                        <div>
                                                            <svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="text-xs flex items-end justify-between">
                                                        <p>ตัดขนน้องแมวอย่างเดียว</p>
                                                        <p class="text-sm font-bold">฿300 / ตัว</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>                                       
                                    </div>
                                </div>
                                <!-- button select cat dropdown -->
                                <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" class="bg-[#F3F4F6] mx-auto mt-3 shadow-md rounded-lg mb-10 px-[4em] inline-flex items-center" type="button">
                                    <span id="selectedUserText">Project users</span> 
                                    <img id="selectedUserImage" src="" class="w-6 h-6 me-2 rounded-full" alt="Selected user image">
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>

                                <!-- Dropdown menu select cat -->
                                <div id="dropdownUsers" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                    <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUsersButton">
                                        @if(sizeof($cats))
                                            @foreach($cats as $cat)
                                                <li>
                                                    <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <img src="{{ URL('/uploads/' . $cat->cat_pic) }}" class="w-6 h-6 me-2 rounded-full" alt="Jese image">
                                                        {{ $cat->cat_name }}
                                                    </a>
                                                </li>               
                                            @endforeach
                                        @endif
                                    </ul>
                                    
                                </div>                                
                                <!-- amount -->
                                <div class="mx-auto rounded-lg bg-[#F3F4F6] mb-6 mt-[-15px]">
                                    <div class="flex flex-wrap ">                                                                                                                    
                                            <input type="radio" class="peer sr-only" name="pricing" />
                                            <div class="w-[15em] max-w-xl rounded-md p-5 ">
                                                <div class="flex flex-col gap-1">
                                                    <div class="flex items-center justify-between ">
                                                        <div class="relative bg-white overflow-hidden">
                                                            <i class="fi fi-sr-cat text-4xl"></i>
                                                        </div> 
                                                        <p class="text-sm font-light text-gray-400">จำนวนแมว :</p>
                                                        <div id="cat_amount_shawer_modal">
                                                        0
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                      
                                    </div>
                                </div>                                                       
                        </div>
                        <!-- end -->

                        <!-- start grid2 -->
                        <div class = " border rounded-lg shadow-xl h-[15em] mx-[5em] " >
                            <div class="flex gap-10 mt-2 ">
                                <img src="{{ URL('/picture/'.'showercat5.png') }}" alt="" class="w-[10em] h-[8em] px-3" alt="logo"/>
                                <div>
                                    <h2>บริการที่ท่านเลือก</h2>
                                    <h1 id="selected_text" class="text-gray-500">บริการ</h1>    
                                </div>                                                                       
                            </div> 
                            <div class=" mt-3  bg-gray-200 rounded-lg">
                                <div class=" mx-10 ">
                                    <p class="text-lg">รายละเอียดราคา</p>
                                    <div class="flex font-light text-sm mt-3 mb-3">
                                        <p >ราคา ( <p id="totalPriceContent">ราคา</p>x <p id="cat_amount_shawer_modal" >0</p>ตัว)</p>
                                        <p class="ml-auto mr-[1.5em]" id="price_all_shawer">0 </p><p>บาท</p>
                                    </div>       
                                </div>
                                <p class=" border-t-2 border-gray-300 w-full col-span-3 "></p>
                                <div class="flex mx-10 border mt-3 mb-3">
                                    <p>ราคารวม</p>
                                    <p >(<p id="totalPriceContentAll">ราคา</p> x <p id="cat_amount_shawer_modal" >0</p>ตัว)</p>
                                    <p class="ml-auto mr-4" id="totalPriceAll">0 </p><p>บาท</p>
                                </div>                                  
                                    <button id="btn-pay-shawer" class="mr-5 mt-2 mb-3 h-8 rounded-lg px-2 gra bg-red-500 hover:bg-red-700 duration-300 text-white w-full ">ชำระเงิน</button>
                            </div>                                
                        </div>
                        <!-- end -->

                        <!-- start grid3 -->
                                <div class = "border rounded-lg shadow-xl " >
                                    <div class="flex mx-5 mt-3">
                                    <img src="{{ URL('/picture/'.'detail.png') }}" alt="" class="ml-2" alt="logo"/>
                                        <p class="ml-2">รายละเอียกการติดต่อ</p>
                                    </div> 
                                    <P class="border border-gray-200 mt-3 "></P>
                                    
                                    <!-- ชื่อ -->
                                    <div class="border border-gray300 mt-3 flex mx-5 rounded-xl">
                                        <img src="{{ URL('/picture/'.'user.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-2" alt="logo"/>
                                        <div class="ml-4">
                                            <P >ชื่อ-นามสกุล:</P>
                                            <P class="text-gray-400">นายวรเทพ ปานเจริญ</P>                   
                                        </div>
                                    </div>
                                    <!-- เบอร์โทร -->
                                    <div class="border border-gray300 mt-3 flex mx-5 rounded-xl">
                                        <img src="{{ URL('/picture/'.'tell.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-2" alt="logo"/>
                                        <div class="ml-4">
                                            <P >เบอร์โทร :</P>
                                            <P class="text-gray-400">0806046944</P>                   
                                        </div>
                                    </div>
                                    <!-- email -->
                                    <div class="border border-gray300 mt-3 flex mx-5 rounded-xl">
                                        <img src="{{ URL('/picture/'.'email.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-2" alt="logo"/>
                                        <div class="ml-4">
                                            <P >Email:</P>
                                            <P class="text-gray-400">admin@gmail.com</P>                   
                                        </div>                                         
                                    </div>
                                    <div class="flex">
                                        <button class="ml-auto mr-5 mt-2 mb-2 rounded-lg px-4 py-2 bg-blue-500 hover:bg-[2344B8] duration-300 text-white">แก้ไข</button>
                                    </div>
                                </div>
                        <!-- end -->
                    </div>    
                </div>               
            </div>
            
                <!-- modalแสกนชำระเงิน -->
                <div id="modal-pay-shawer" class="modal hidden fixed z-[120] flex my-auto top-0 w-[100%] h-[100%] overflow-auto  ">
                    <!-- START MODEL CONTENT -->
                    <div  class="modal-content bg-gray-300 m-auto p-[10px] rounded-md drop-shadow-xl w-[50%] max-md:w-[100%] ">
                        <div class="flex items-center">
                            <p class="text-[20px] font-bold w-full ml-4 text-center">แสกนด้วยแอปธนาคารหรือแอปชำระเงินของคุณ</p>
                            <span id="details-close-qr" class="text-gray-500 text-[30px] font-medium absolute top-0 right-0 mr-4 hover:text-indigo-600 cursor-pointer">&times;</span>
                        </div>
                        <p class="border border-white-300 w-full mt-2"></p>
                        <div class="mt-3 items-center flex-col flex justify-center ">
                            <img src="{{ URL('/picture/'.'qr.png') }}" alt="" class="w-[10em] h-[10em] mx-auto" alt="logo"/>
                            <div >
                                <p>แอปธนาคารหรือแอปชำระเงินมากมายรองรับ PromptPay แล้ว</p>
                                <p> เช่น KBank, SCB, Bangkok Bank, Krunthai Bank และ Krungsri</p>
                            </div>
                            <p class="border border-white-300 w-full mt-2 "></p>                           
                                <div class=" text-center w-full">
                                    <label class="block mb-2 text-md font-medium text-gray-900 dark:text-white mt-2" for="file_input">Upload file</label>
                                    <div class="flex ml-[13em]">
                                        <input onchange={fileChosen_Single(event)} class="block w-fit h-fit text-sm text-gray-900 border border-gray-300 rounded-lg  bg-gray-50 " aria-describedby="file_input_help" id="file_input" type="file">         
                                        <div class="ml-auto mr-0">
                                            <button onclick={SubmitRoomReserve()} class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium
                                             rounded-lg text-sm px-5 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
                                              dark:focus:ring-blue-800">เสร็จสิ้น
                                            </button>   
                                        </div>              
                                    </div>
                                    <p class="mt-1 text-sm text-white-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>  
                                </div>       
                        </div>
                    </div>
                </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // modal การส่งข้อมูลไปยังที่ต่อไป
                        $('#btnShower').on('click', function() {
                            var dateInput = document.getElementById('input_start_date_shawer');
                            var timeInput = document.getElementById('input_start_time_shawer');
                            var amountInput = document.getElementById('cat_amount_shawer');
                            
                            $('.modal-content #input_start_date_shawer_modal').text(dateInput.value);
                            $('.modal-content #input_start_time_shawer_modal').text(timeInput.value);
                            $('.modal-content #cat_amount_shawer_modal').text(amountInput.value);
                            // jqery
                            // $('.modal-content #cat_amount_shawer_modal').text($(this).data('cat_amount_shawer'));

                            $('#modal-Shower').removeClass('hidden');
                        });
                        $('#details-close-shower').on('click', function() {
                            $('#modal-Shower').addClass('hidden');
                        }); 
                        // modal ชำระเงิน     
                        $('#btn-pay-shawer').on('click', function() {
                            console.log('test');
                            $('#modal-pay-shawer').removeClass('hidden');
                        });
                        $('#details-close-qr').on('click', function() {
                            $('#modal-pay-shawer').addClass('hidden');
                        });      
                    });  
                    // ดึงค่าให้เปลี่ยนอัตโนมัติ                 
                    function updateHeaderText(elementId) {
                        var selectedText = document.getElementById(elementId).textContent;
                        document.getElementById('selected_text').textContent = selectedText;
                        // กลับมาทวน
                        var totalPriceContent = document.getElementById('total_price_cat_cut').textContent;
                        document.getElementById('totalPriceContent').textContent = totalPriceContent;
                    
                        var price_select;
                        if (elementId === 'shawer_cat') {
                            price_select = 300 ; 
                        } else if (elementId === 'shawer_cut') {
                            price_select = 300 ; 
                        }else if (elementId === 'shawer_cat_cut') {
                            price_select = 500 ;
                        }else {
                        }
                            // Update the content of the target element กลับมาทวนยังไม่เข้าใจดี
                        document.getElementById('totalPriceContent').textContent = price_select || originalContent;
                        document.getElementById('totalPriceContentAll').textContent = price_select || originalContent;

                        var catAmount = parseInt(document.getElementById('cat_amount_shawer_modal').textContent);
                        // ifราคารวม
                        var price_all_shawer;
                        // Check the ID of the all_shawered radio button
                        if (elementId === 'shawer_cat') {
                            price_all_shawer = 300  * catAmount; 
                        } else if (elementId === 'shawer_cut') {
                            price_all_shawer = 300  * catAmount; 
                        }else if (elementId === 'shawer_cat_cut') {
                            price_all_shawer = 500  * catAmount; 
                        } else {
                        }
                        document.getElementById('price_all_shawer').textContent = price_all_shawer || totalPriceContentSum;
                        document.getElementById('totalPriceAll').textContent = price_all_shawer || totalPriceContentSum;       
                    }   
                    
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
                    
                    var dropdownButton = document.getElementById('dropdownUsersButton');
                    // รับอิงตัวแปร dropdown จาก ID ของ Dropdown
                    var dropdown = document.getElementById('dropdownUsers');

                    // เพิ่ม Event Listener เมื่อมีการคลิกที่ปุ่ม Dropdown
                    dropdownButton.addEventListener('click', function () {
                        // ตรวจสอบว่า Dropdown ถูกแสดงหรือไม่
                        var isDropdownVisible = dropdown.classList.contains('hidden');

                        // ถ้า Dropdown ยังไม่แสดง
                        if (!isDropdownVisible) {
                            // แสดง Dropdown
                            dropdown.classList.remove('hidden');
                        } else {
                            // ซ่อน Dropdown
                            dropdown.classList.add('hidden');
                        }
                    });

                    // เพิ่ม Event Listener ที่แต่ละรายการใน Dropdown
                    var dropdownItems = dropdown.getElementsByTagName('li');

                    for (var i = 0; i < dropdownItems.length; i++) {
                        dropdownItems[i].addEventListener('click', function () {
                            // ซ่อน Dropdown เมื่อเลือกรายการ
                            dropdown.classList.add('hidden');

                            // อัปเดตข้อความและรูปภาพบนปุ่ม Dropdown ด้วยข้อมูลจากรายการที่ถูกเลือก
                            var selectedText = this.textContent.trim();
                            var selectedImage = this.querySelector('img').src;

                            // อัปเดตข้อความบนปุ่ม Dropdown
                            var selectedUserText = document.getElementById('selectedUserText');
                            selectedUserText.textContent = selectedText;

                            // อัปเดตรูปภาพบนปุ่ม Dropdown
                            var selectedUserImage = document.getElementById('selectedUserImage');
                            selectedUserImage.src = selectedImage;
                        });
                    }
            
            // $(document).ready(function() {
            //     $('input[name="pricing"]').change(function() {
            //         var selectedText = $('#shower_cat').text();
            //         $('#selected_text').text(selectedText);
            //     });
            // });
            
                </script>                
        @endsection