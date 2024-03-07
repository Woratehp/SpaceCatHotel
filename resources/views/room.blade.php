<title>จองห้อง | Spacecathotal</title>

@extends('components/LayoutUser')

@section('Content')
<div class="flex">
           <div class = "inline-flex bg-[#EDEDED] mx-auto border-2 rounded-md w-full py-2  shadow-lg gap-2 mt-4">
                <button class="absolute border border-gray-400 flex w-fit mt-2 mb-2 rounded-lg px-2 py-1 ml-7  hover:bg-white">
                        <img src="{{ URL('/picture/'.'arrow-right.png') }}" alt="" class=" w-[20px] h-[20px] mb-[3px] mt-[3px] " alt="logo"/>      
                        <a href="{{ Route('Home')}}"> 
                            <span class="ml-1.5">กลับ</span>
                        </a>
                </button>  
               <div class= "flex bg-white  text-blue-800 text-sm font-medium border-2 rounded-md  mx-auto w-[95em] max-lg:grid max-lg:grid-cols-1"> 
                    <img src="{{ URL('/picture/'.'footcat.png') }}"class="h-12 pl-3 max-lg:hidden">
                    <!-- เส้นแบ่งตรงกลาง -->
                    <div class="mx-4 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED] opacity-100 max-lg:hidden"></div>
                    <!-- date--> 
                    <div date-rangepicker class="flex items-center max-lg:p-2 max-lg:gap-4">
                        <div class="relative inline-flex">
                            <div class="flex items-center mr-2 pointer-events-none">
                                <img src="{{ URL('/picture/'.'checkin.png') }}"class="min-w-7 min-h-7"/>
                            </div>
                            <input value="{{ $start_date }}" name="start" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[23em] p-2 text-center" placeholder="Select date start">
                        </div>

                        <span class=" mx-8 text-gray-500 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED]  opacity-100  max-lg:hidden"> </span>
    
                        <div class="relative inline-flex">
                            <div class="flex items-center mr-2 pointer-events-none">
                                <img src="{{ URL('/picture/'.'checkout.png') }}"class="min-w-7 min-h-7"/>
                            </div>
                            <input value="{{ $end_date }}" name="end" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2  w-[23em] p-2 text-center" placeholder="Select date end">
                        </div>
                        <!-- เส้นแบ่งตรงกลาง -->
                        <div class="mx-5 inline-block h-[50px] min-h-[1em] w-0.5 self-stretch bg-[#EDEDED] opacity-100 max-lg:hidden"></div>
                    </div>           

                    <!-- เพิ่มจำนวนแมว    -->
                    <div class = "inline-flex  mr-2">
                        <img src="{{ URL('/picture/'.'cat1.png') }}"class="w-8 h-8 my-auto  ">   
                        <div class="flex-col">
                            <p class = "w-fit text-[C1C1C1]" >แมว :</p> 
                            <input value="{{ $cat_amount }}" type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" data-input-counter-min="1"  class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="0" required>
                        </div>
                        <form class="max-w-xs my-auto ">
                            
                        </form>                       
                    </div>                
                </div>

                
            </div>      
       </div>

       <!-- ห้องแมว -->
       <div  class=" flex grid grid-cols-5  gap-2 mt-3 px max-lg:grid max-lg:grid-cols-2 max-md:grid-col-1 px-[6em]">
                  <!-- ห้องแมว -->
                  @if(sizeof($rooms))
                    @foreach($rooms as $room)
                        
                        <div class= "relative border border-gray-200 rounded-2xl shadow-xl duration-500 hover:scale-105 hover:shadow-xl ">
                            <div class="relative">
                                <img src="{{ URL('/uploads/' . $room->room_pic) }}"class="w-full h-[15em] my-auto ">
                                <div class="absolute top-1 left-1 px-2 ">
                                    <i class="fi fi-rs-heart  text-white text-2xl "></i>
                                </div>
                            </div>
                            <div class = "mt-[1em] flex-col space-y-1 px-3 mb-[0.7em]">
                                <div class=" flex">
                                    <span class= "text-center uppercase w-fit">{{ $room->room_name }}</span>
                                    @if($room->status_room === 0)
                                        <p  class="text-green-700 ml-auto mr-0">
                                            <i class="fi fi-ss-bullet text-sm text-center"></i> ว่าง
                                        </p>
                                    @elseif($room->status_room === 1)
                                        <p  class="text-red-700 ml-auto mr-0">
                                            <i class="fi fi-ss-bullet text-sm text-center"></i> เต็ม
                                        </p>
                                    @endif
                                </div>
                                <div class="font-light text-gray-500 grid grid-cols-2 flex text-sm">
                                    <p  class=""> จำนวนแมว : {{ $room->room_cat }}</p>
                                    <p  class="underline ml-auto mr-0">{{ $room->room_price }} บาท/คืน</p>
                                </div>
                                @if($room->status_room === 0)
                                <div class = "mt-[1em] ">
                                    <button type="button" class="btn-details-room w-full text-amber-600 border border-[C09369] rounded-full py-1 hover:bg-[C09369] duration-300"
                                    data-room_id="{{ $room->room_id }}"  data-room_detail="{{ $room->room_detail }}" data-room_price="{{ $room->room_price }}" data-room_size="{{ $room->room_size }}" data-room_hight="{{ $room->room_hight }}" 
                                    data-room_cat="{{ $room->room_cat }}" data-room_pic="{{ URL('/uploads/' . $room->room_pic) }}" data-room_name="{{ $room->room_name }}">จองห้อง</button>
                                </div>
                                @elseif($room->status_room === 1)
                                    <div class = "mt-[1em] hidden">
                                        <button type="button" class="btn-details-room w-full text-amber-600 border border-[C09369] rounded-full py-1 hover:bg-[C09369] duration-300"
                                        data-room_id="{{ $room->room_id }}"  data-room_detail="{{ $room->room_detail }}" data-room_price="{{ $room->room_price }}" data-room_size="{{ $room->room_size }}" data-room_hight="{{ $room->room_hight }}" 
                                        data-room_cat="{{ $room->room_cat }}" data-room_pic="{{ URL('/uploads/' . $room->room_pic) }}" data-room_name="{{ $room->room_name }}">จองห้อง</button>
                                    </div>
                                @endif
                            </div>   
                        </div> 
                    @endforeach
                 @endif 
       </div>

                <!-- start modal -->
                <div id="modal-details-room" class="modal hidden fixed z-[100] flex my-auto left-0 top-0 w-[100%] h-[100%] overflow-auto  ">
                    <!-- START MODEL CONTENT -->
                    <div class="modal-content bg-white m-auto p-[10px] rounded-md drop-shadow-xl w-[90%] max-md:w-[100%]">
                        <div class="flex items-center">
                            <p class="text-[20px] font-bold w-full ml-4 text-center">แก้ไขรายละเอียดห้อง</p>
                            <span id="details-close" class="text-gray-500 text-[30px] font-medium absolute top-0 right-0 mr-4 hover:text-indigo-600 cursor-pointer">&times;</span>
                        </div>                       
                        <hr class="mt-4">
                        <!-- body --> 
                        <div class="mt-4 grid grid-cols-2 px-[5em] gap-4 ">
                            <input id="room_id" type="hidden">
                            <!-- start grid1-->
                            <div class = "grid grid-cols-2 border rounded-lg shadow-xl ">
                                <div class="col-span-2 grid grid-cols-2 border-b-2 border-gray-200">
                                    <div class="grid grid-cols-3 mx-1 my-2 border-r-2 border-gray-200">
                                       <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                           <img src="{{ URL('/picture/'.'checkin.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                       </div>
                                       <div class= "col-span-2 flex-col whitespace-nowrap">
                                           <span>เช็คอิน: </span>
                                           <input id="details_start_date" value="{{ $start_date }}" name="start" type="date" class="">
                                           <p class="text-gray-300">จาก 10:00</p>   
                                       </div>           
                                   </div>
                                    <!-- checkout -->
                                    <div class="grid grid-cols-3 mx-1 my-2 ">
                                        <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                           <img src="{{ URL('/picture/'.'checkout.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                       </div>
                                       <div class= "col-span-2 flex-col whitespace-nowrap">
                                           <span>เช็คเอาท์: </span>
                                           <input id="details_end_date" value="{{ $end_date }}" name="end" type="date" class="">
                                           <p class="text-gray-300">จาก 18:00</p>   
                                       </div> 
                                    </div>
                                </div>

                                <div class="col-span-2 grid grid-cols-2">
                                    <!-- checkin -->
                                   <div class="grid grid-cols-3 mx-1 my-2 border-r-2 border-gray-200">
                                       <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                           <img src="{{ URL('/picture/'.'calendar.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                       </div>
                                       <div class= "flex-col">
                                           <span class="whitespace-nowrap">จำนวนวันทั้งหมด :</span>
                                           <input id="total_date" name="cat_amount" type="cat_amount" class="w-10">
                                       </div>           
                                   </div>

                                   <div class="grid grid-cols-3 mx-1 my-2">
                                       <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                           <img src="{{ URL('/picture/'.'catnumber.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                       </div>
                                       <div class= "flex-col">
                                           <span class="whitespace-nowrap">จำนวนแมว:</span>
                                           <input id="details_cat_amount" value="{{  $cat_amount}}" name="cat_amount" type="cat_amount" class="w-10">   
                                           
                                       </div>           
                                   </div>
                                   
                                </div>
                                
                                <div class="mx-auto mt-3 shadow-md rounded-lg">
                                    <div class="flex flex-wrap justify-center gap-3">                                        
                                        <label class="cursor-pointer ">
                                        <input type="radio" class="peer sr-only" name="pricing" onchange="updateHeaderText('shawer_no_cut')"/>
                                            <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                                                <div class="flex flex-col gap-1">
                                                    <div class="flex items-center justify-between">
                                                        <p id="shawer_no_cut" class="text-sm font-semibold uppercase text-gray-500">ไม่รับบริการเสริม</p>
                                                        <div>
                                                            <svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="text-xs flex items-end justify-between">
                                                        <p>-</p>
                                                        <p class="text-sm font-bold ml-3" >฿0</p>
                                                        <span  class="text-sm font-bold">/ ตัว </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
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
                                                        <p id="shawer_cat_cut" class="text-sm font-semibold uppercase text-gray-500">อาบน้ำและตัดขน</p>
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
                                <div class="mx-auto mt-3 shadow-md rounded-lg mb-10">
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
                                                        <p class="text-sm font-bold">฿350 / ตัว</p>
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

                                    <div class="grid grid-cols-6 col-span-2  my-2 border-t-2">
                                        
                                       <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                           <img src="{{ URL('/picture/'.'search.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                       </div>
                                       <div class= "flex-col w-full col-span-2 h-[10em] max-lg:overflow-hidden">
                                       
                                           <span id="room_detail" class="  left-0">
                                                -
                                            </span> 
                                       </div>           
                                    </div>
                            </div>
                            <!-- end -->

                                <!-- start grid2 -->
                                <div class = "border rounded-lg shadow-xl mx-[4em] h-[13em]" >             
                                    <div class="px-10 flex col-span-4 gap-10 mt-2 mb-2">
                                        <img id="room_pic" src=" " alt="" class="w-[13em] h-[6em] rounded-lg mt-auto mb-2" alt="logo"/>
                                        <div class="whitespace-nowrap flex-col  h-fit ">
                                            <p class="whitespace-nowrap" id="room_name" ></p>
                                            <div class=" border border-gray-400 mt-2 rounded-xl flex font-light items-center justify-center w-fit">
                                                <div class="px-4 flex">
                                                    <img src="{{ URL('/picture/'.'cat1.png') }}" alt="" class="w-[25px] h-[25px] mb-[3px] mt-[3px] " alt="logo"/>
                                                    <p class="mt-1" id="room_cat"></p>
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <div class="border border-gray-400  mt-2 rounded-xl flex font-light">
                                                    <div class="items-center px-8 flex gap-2 py-[4px]">
                                                        <img src="{{ URL('/picture/'.'frame.png') }}" alt="" class=" w-[20px] h-[20px] mb-[3px] mt-[3px] " alt="logo"/>
                                                        <p class=" " id="room_size"></p>cm.
                                                    </div>              
                                                </div>
                                                <div class="border border-gray-400  mt-2 rounded-xl flex font-light mr-2 ">
                                                    <div class="items-center px-8 flex gap-2 py-[4px]">
                                                        <img src="{{ URL('/picture/'.'arrow.png') }}" alt="" class=" w-[20px] h-[20px] mb-[3px] mt-[3px] " alt="logo"/>
                                                        <p class=" " id="room_hight"></p>cm.
                                                    </div>              
                                                </div>
                                            </div>
                                        </div>                                      
                                    </div> 
                                    <div class="grid grid-cols-2 bg-gray-200 rounded-lg">
                                        <div class="p-2">
                                            <h1>รายละเอียดราคา</h1>
                                            <p>ราคามาตรฐาน <span id="room_price"></span> x <span id="count_total_date">1</span> วัน</p>
                                        </div>

                                        <div class="p-2 inline-flex ml-auto mr-0 mt-auto mb-0">
                                            <p id="total_room_price1"></p><span class="ml-2">บาท</span>
                                        </div>
                                        <p class=" border-t-2 border-gray-300 w-full col-span-3 "></p>

                                        <div class="p-2 flex ">
                                            <p>ราคาทั้งหมด  <span id="room_price"></span> x <span id="count_total_date2">1</span> วัน</p>
                                            
                                        </div>
                                            <div class="p-2 inline-flex ml-auto ">
                                                <span id="total_room_price2"></span><span class="ml-2">บาท</span>
                                            </div>
                                                                                                      
                            </div> 
                            <div class=" mt-3 ml-2">
                                    <h2>บริการที่เสริมที่ท่านเลือก</h2>
                                    <h1 id="selected_text" class="text-gray-500">ไม่รับบริการเสริม</h1> 
                                </div>            
                            <div class=" mt-3  bg-gray-200 rounded-lg">
                                <div class=" mx-10 ">
                                    <p class="text-lg">รายละเอียดราคา</p>
                                    <div class="flex font-light text-sm mt-3 mb-3">
                                        <p >ราคา ( <p id="totalPriceContent">ราคา</p>x <p class="cat_amount_shawer_modal" >0</p>ตัว)</p>
                                        <p class="ml-auto mr-[1.5em]" id="price_all_shawer">0 </p><p>บาท</p>
                                    </div>       
                                </div>
                                <p class=" border-t-2 border-gray-300 w-full col-span-3"></p>
                                <div class="flex mx-10 border mt-3 mb-3">
                                    <p>ราคารวม</p>
                                    <p >(<p id="totalPriceContentAll">ราคา</p> x <p class="cat_amount_shawer_modal" >0</p>ตัว)</p>
                                    <p class="ml-auto mr-4" id="totalPriceAll">0 </p><p>บาท</p>
                                </div>                                  
                                    <div class="mr-5 mt-2 mb-3 h-8 rounded-lg px-2 gra bg-red-500 hover:bg-red-700 duration-300 text-white w-full ">ราคาทั้งหมด
                                        <span id="total_price"></span>
                                    </div> 
                            </div>              
                                    </div>
                            <div class="flex col-span-3 gap-3">
                                <!-- start grid3 เลือกฝากเลี้ยงแมว -->
                                <div class = "border rounded-lg shadow-xl " >                            
                                    <input id="editprofile_id" class="hidden" value=""> 
                                        <div class="flex mx-5 mt-3">
                                            <img src="{{ URL('/picture/'.'detail.png') }}" alt="" class="ml-2" alt="logo"/>
                                            <p class="ml-2">เลือกแมวของท่าน</p>
                                        </div> 

                                        @if(sizeof($cats))
                                            <div class="flex flex-wrap mt-5 justify-center items-center ">
                                                @foreach($cats as $cat)
                                                    <button onclick="toggleRing(this)" class="selectable-cat  focus:outline-none ring-blue-500 bg-gray-400 shadow-md rounded-md p-5 m-2 cursor-pointer transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg" 
                                                    data-cat_name="{{ $cat->cat_name }}">
                                                        <p id="namecat" class="flex items-center hover:text-white">
                                                            <img src="{{ URL('/uploads/' . $cat->cat_pic) }}" class="w-6 h-6 me-2 rounded-full" alt="Jese image">
                                                            {{ $cat->cat_name }}
                                                        </p>
                                                    </button>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="p-2 flex items-center justify-end mr-10">
                                            <button id="btn-pay-room"  class="relative inline-block text-lg group ">
                                                <span class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-900 rounded-lg group-hover:text-white">
                                                <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
                                                <span class="absolute left-0 w-48 h-48 ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-blue-800 group-hover:-rotate-180 ease"></span>
                                                    <span class="relative">ชำระเงิน</span>
                                                    </span>
                                                    <span class="absolute bottom-0 right-0 w-full h-12 mb-1 -mr-1 transition-all duration-200 ease-linear bg-gray-900 rounded-lg group-hover:mb-0 group-hover:mr-0" data-rounded="rounded-lg"></span>
                                            </button>  
                                        </div>  
                                </div>

                                <!-- start grid 4 เลือกแมว -->
                                <div id="selectshower" class="border rounded-lg shadow-xl hidden " >           
                                    <input id="editprofile_id" class="hidden" value=""> 
                                        <div class="flex mx-5 mt-3">
                                            <img src="{{ URL('/picture/'.'detail.png') }}" alt="" class="ml-2" alt="logo"/>
                                            <p class="ml-2">เลือกแมวของท่าน</p>
                                        </div> 
                                        <span class="text-red-500">*หารต้องการอาบน้ำและตัดขนไปด้วย</span>
                                        <!-- showDropdown เลือกบริการ -->
                                        <button id="dropdownUsersButton" onclick="showDropdown()" class="bg-[#F3F4F6] p-3 mx-auto mt-3 shadow-md rounded-lg px-4 inline-flex items-center">
                                            <span id="selectedUserText" class="text-gray-800">เลือกบริการ</span> 
                                            <input id="selectedCatID" type="hidden">
                                                <img id="selectedUserImage" src="" class="w-6 h-6 me-2 rounded-full hidden" alt="Selected user image">
                                                <svg class="w-2.5 h-2.5 ms-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>
                                        <!-- showDropdown -->
                                        <div id="dropdownUsers" class="z-10 hidden rounded-lg shadow w-60 ">
                                            <!-- Dropdown menu select cat -->

                                            <!-- อาบน้ำ-->                                                                                                             
                                            <div class="mx-auto mt-3 shadow-md rounded-lg">
                                                <div class="flex flex-wrap justify-center gap-3">                                                                            
                                                    <button class="cursor-pointer hover:bg-gray-100" onclick="selectOption('shawer_cat', 'อาบน้ำ', '')">
                                                        <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all">
                                                            <div class="flex flex-col gap-1">
                                                                <div class="flex items-center justify-between">
                                                                    <p id="shawer_cat" class="text-sm font-semibold uppercase">อาบน้ำ</p>
                                                                </div>
                                                                <div class="text-xs flex items-end justify-between">
                                                                    <p>อาบน้ำน้องแมวอย่างเดียว</p>
                                                                    <p class="text-sm font-bold">฿350 / ตัว</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>                                       
                                                </div>
                                            </div>    
                                            <!-- ตัดขน-->                                                                                                             
                                            <div class="mx-auto mt-3 shadow-md rounded-lg mb-10">
                                                <div class="flex flex-wrap justify-center">                                                                            
                                                    <button class="cursor-pointer hover:bg-gray-100" onclick="selectOption('shawer_cut', 'ตัดขน', '')">
                                                        <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all">
                                                            <div class="flex flex-col gap-1">
                                                                <div class="flex items-center justify-between">
                                                                    <p id="shawer_cut" class="text-sm font-semibold uppercase">ตัดขน</p>
                                                                </div>
                                                                <div class="text-xs flex items-end justify-between">
                                                                    <p>ตัดขนน้องแมวอย่างเดียว</p>
                                                                    <p class="text-sm font-bold">฿300 / ตัว</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>                                       
                                                </div>
                                            </div>              
                                        </div>
                                    
                                        
                                </div>                        
                                <!-- start grid 5 เลือกแมว -->
                                <div id="selectcat" class="border rounded-lg shadow-xl hidden " >           
                                        <input id="editprofile_id" class="hidden" value=""> 
                                            <div class="flex mx-5 mt-3">
                                                <img src="{{ URL('/picture/'.'detail.png') }}" alt="" class="ml-2" alt="logo"/>
                                                <p class="ml-2">เลือกแมวของท่าน</p>
                                            </div> 
                                            <span class="text-red-500">*หารต้องการอาบน้ำและตัดขนไปด้วย</span>
                                            <!-- showDropdown เลือกบริการ -->
                                            <button id="dropdownUsersButton" onclick="showDropdown()" class="bg-[#F3F4F6] p-3 mx-auto mt-3 shadow-md rounded-lg px-4 inline-flex items-center">
                                                <span id="selectedUserText" class="text-gray-800">เลือกบริการ</span> 
                                                <input id="selectedCatID" type="hidden">
                                                    <img id="selectedUserImage" src="" class="w-6 h-6 me-2 rounded-full hidden" alt="Selected user image">
                                                    <svg class="w-2.5 h-2.5 ms-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </button>
                                            <!-- showDropdown -->
                                            <div id="dropdownUsers" class="z-10 hidden rounded-lg shadow w-60 ">
                                                <!-- Dropdown menu select cat -->
                                                <div class="mx-auto mt-3 shadow-md rounded-lg">
                                                    <div class="flex flex-wrap justify-center gap-3">                                        
                                                        <button class="cursor-pointer hover:bg-gray-100" onclick="selectOption('shawer_cat_cut', 'อาบน้ำและตัดขน', '')">
                                                            <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all">
                                                                <div class="flex flex-col gap-1">
                                                                    <div class="flex items-center justify-between">
                                                                        <p id="shawer_cat_cut" class="text-sm font-semibold uppercase">อาบน้ำและตัดขน</p>
                                                                    </div>
                                                                    <div class="text-xs flex items-end justify-between">
                                                                        <p>อาบน้ำและตัดขนน้องแมว</p>
                                                                        <p id="total_price_cat_cut" class="text-sm font-bold">฿500 / ตัว </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div> 
                                                <!-- อาบน้ำ-->                                                                                                             
                                                <div class="mx-auto mt-3 shadow-md rounded-lg">
                                                    <div class="flex flex-wrap justify-center gap-3">                                                                            
                                                        <button class="cursor-pointer hover:bg-gray-100" onclick="selectOption('shawer_cat', 'อาบน้ำ', '')">
                                                            <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all">
                                                                <div class="flex flex-col gap-1">
                                                                    <div class="flex items-center justify-between">
                                                                        <p id="shawer_cat" class="text-sm font-semibold uppercase">อาบน้ำ</p>
                                                                    </div>
                                                                    <div class="text-xs flex items-end justify-between">
                                                                        <p>อาบน้ำน้องแมวอย่างเดียว</p>
                                                                        <p class="text-sm font-bold">฿350 / ตัว</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>                                       
                                                    </div>
                                                </div>    
                                                <!-- ตัดขน-->                                                                                                             
                                                <div class="mx-auto mt-3 shadow-md rounded-lg mb-10">
                                                    <div class="flex flex-wrap justify-center">                                                                            
                                                        <button class="cursor-pointer hover:bg-gray-100" onclick="selectOption('shawer_cut', 'ตัดขน', '')">
                                                            <div class="w-[15em] max-w-xl rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all">
                                                                <div class="flex flex-col gap-1">
                                                                    <div class="flex items-center justify-between">
                                                                        <p id="shawer_cut" class="text-sm font-semibold uppercase">ตัดขน</p>
                                                                    </div>
                                                                    <div class="text-xs flex items-end justify-between">
                                                                        <p>ตัดขนน้องแมวอย่างเดียว</p>
                                                                        <p class="text-sm font-bold">฿300 / ตัว</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>                                       
                                                    </div>
                                                </div>              
                                            </div>
                                        
                                            
                                    </div>  
                                </div>
                            </div>                          
                    </div>               
                </div>

                <!-- แสกนชำระเงิน -->
                <div id="modal-room-payment" class="modal hidden fixed z-[120] flex my-auto top-0 w-[100%] h-[100%] overflow-auto  ">
                    <!-- START MODEL CONTENT -->
                    <div  class="modal-content bg-gray-300 m-auto p-[10px] rounded-md drop-shadow-xl w-[50%] max-md:w-[100%] ">
                        <div class="flex items-center">
                            <p class="text-[20px] font-bold w-full ml-4 text-center">แสกนด้วยแอปธนาคารหรือแอปชำระเงินของคุณ</p>
                            <span id="details-close-qr2" class="text-gray-500 text-[30px] font-medium absolute top-0 right-0 mr-4 hover:text-indigo-600 cursor-pointer">&times;</span>
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
                                            <button onclick={SubmitRoomReserve()} class="btn-confirm-reserve text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function()  {
                    // หน้าคิดเงิน
                    $('.btn-details-room').on('click', function() {
                        var start_date = new Date(document.getElementById('details_start_date').value);
                        var end_date = new Date(document.getElementById('details_end_date').value);
                        var total_date = end_date - start_date;
                        var days_difference = total_date / (1000 * 60 * 60 * 24);
                        var total_room_price = $(this).data('room_price') * days_difference;
                        

                        // เช็คเงื่อนไขว่ามีจำนวนวันมากกว่าหรือเท่ากับ 5 วันหรือไม่
                        if (days_difference == 3) {
                            // หากใช่ ให้ลบ 300 ออกจากราคาห้อง
                            total_room_price -= 100;
                        } if (days_difference >= 6) {
                            // หากใช่ ให้ลบ 300 ออกจากราคาห้อง
                            total_room_price -= 300;
                        }
                        if (days_difference >= 7) {
                            // หากใช่ ให้ลบ 300 ออกจากราคาห้อง
                            total_room_price -= 500;
                        }
                        $('.modal-content #totalPriceAll').val();
                        $('.modal-content #total_room_price2').text(total_room_price);
                        $('.modal-content #total_date').val(days_difference);
                        $('.modal-content #total_date').val(days_difference);
                        $('.modal-content #count_total_date').text(days_difference);
                        $('.modal-content #count_total_date2').text(days_difference);
                        $('.modal-content #room_id').val($(this).data('room_id'));
                        $('.modal-content #room_name').text($(this).data('room_name'));
                        $('.modal-content #room_detail').text($(this).data('room_detail'));
                        $('.modal-content #room_price').text($(this).data('room_price'));
                        $('.modal-content #room_size').text($(this).data('room_size'));
                        $('.modal-content #room_hight').text($(this).data('room_hight'));
                        $('.modal-content #room_cat').text($(this).data('room_cat'));
                        $('.modal-content #room_pic').attr('src', $(this).data('room_pic'));

                        $('.modal-content #total_room_price1').text($(this).data('room_price') * days_difference);
                        // $('.modal-content #total_room_price2').text($(this).data('room_price') * days_difference);

                        $('#modal-details-room').removeClass('hidden');

                    });
                    $('#btn-details-room').on('click', function() {
                        $('#modal-details-room').removeClass('hidden');
                    });
                    $('#details-close').on('click', function() {
                        $('#modal-details-room').addClass('hidden');
                    });
                    // แสกนชำระเงิน
                    $('#btn-pay-room').on('click', function() {
                        $('#modal-room-payment').removeClass('hidden');
                    });
                    $('#details-close-qr2').on('click', function() {
                        $('#modal-room-payment').addClass('hidden');
                    });    
                    // $('#btn-clik-roompluto').on('click', function() {
                    //     $('#modal-details-roompluto').removeClass('hidden');
                    // });
                    // $('#details-close').on('click', function() {
                    //     $('#modal-details-roompluto').addClass('hidden');
                    // });
                });
                function showDropdown() {
                    var dropdown = document.getElementById('dropdownUsers');
                    dropdown.classList.toggle('hidden');
                }

                function selectOption(optionId, optionText, optionImageSrc) {
                    document.getElementById('selectedCatID').value = optionId;
                    document.getElementById('selectedUserText').innerText = optionText;
                    if (optionImageSrc) {
                        document.getElementById('selectedUserImage').src = optionImageSrc;
                        document.getElementById('selectedUserImage').classList.remove('hidden');
                    } else {
                        document.getElementById('selectedUserImage').classList.add('hidden');
                    }
                    showDropdown(); // Hide the dropdown after selecting an option
                }
                function toggleRing(button) {
                    $('#details_cat_amount').val();
                    var amountcat =  $('#details_cat_amount').val();
                                        // เข้าถึงองค์ประกอบที่มีคลาสเดียวกัน
                    var elements = document.getElementsByClassName('cat_seleact_1');

                    // นับจำนวนขององค์ประกอบที่ตรงกับเงื่อนไข
                    var count = elements.length;

                    console.log("จำนวนขององค์ประกอบที่มีคลาส cat_seleact_1: " + count);
                    if(count < amountcat){ 
                        button.classList.toggle('ring-4'); // Toggle the ring effect
                         button.classList.toggle('ring-blue-500'); // Toggle the ring color
                         button.classList.toggle('cat_seleact_1'); // Toggle the ring color
                         
                    }else{
                        if (button.classList.contains('cat_seleact_1')) {
                        button.classList.toggle('ring-4'); // Toggle the ring effect
                         button.classList.toggle('ring-blue-500'); // Toggle the ring color
                        button.classList.remove('cat_seleact_1'); // ลบคลาสออก
                    }
                    }
                    
                    
                }
                // START GET SINGLE IMAGE BASE64
                var _image64_single = '';
                function fileChosen_Single(event) {
                    this.fileToDataUrl_Single(event, src => this.fileHanddle_Single(src));
                }
                function fileToDataUrl_Single(event, callback) {
                    if (! event.target.files.length){ 
                        callback('');
                        return
                    }

                    let file = event.target.files[0],
                        reader = new FileReader();

                    reader.readAsDataURL(file);
                    reader.onload = function (e) {
                        var img = new Image;
                        img.src = e.target.result;
                        img.onload = function(){
                            var canvas = document.createElement('canvas');
                            var ctx = canvas.getContext('2d');
                            var cw = canvas.width;
                            var ch = canvas.height;
                            var maxW = '1920';
                            var maxH = '1080';

                            var iw = img.width;
                            var ih = img.height;
                            if(iw <= maxW || ih <= maxH) {
                                var _avatar_base64 = img.src;
                            }else {
                                var scale = Math.min((maxW/iw),(maxH/ih));
                                var iwScaled = iw * scale;
                                var ihScaled = ih * scale;
                                canvas.width = iwScaled;
                                canvas.height = ihScaled;
                                ctx.drawImage(img,0,0,iwScaled,ihScaled);
                                var converted_img = canvas.toDataURL();
                                var _avatar_base64 = converted_img;        
                            }                        
                            callback(_avatar_base64);                        
                        }					
                    };
                }
                function fileHanddle_Single(src){
                    $("#room_pic1").attr("src", src);
                    _image64_single = src;
                }
                function SubmitRoomDelete(room_id) {
                    fetch("{{ Route('SubmitRoomDelete') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-Token": "{{ csrf_token() }}"
                        },
                        body:JSON.stringify(
                            {
                                room_id: room_id,
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
                                title: 'ลบห้องไม่สำเร็จ!',
                                html: `${data.status}`,
                                confirmButtonText: 'ตกลง',
                            })

                            const error = (data && data.errorMessage) || "{{trans('general.warning.system_failed')}}" + " (CODE:"+response.status+")";
                            return Promise.reject(error);
                        }

                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'ลบห้องสำเร็จ',
                                confirmButtonText: 'ตกลง',
                                timer: 1000,
                                timerProgressBar: true
                        }).then((result) => {
                            location.reload();
                        })
                    })
                    .catch((er) => {
                        console.log('Error' + er);
                    });                    
                }

                const uploadInput = document.getElementById('room_pic');
                const filenameLabel = document.getElementById('filename');
                const imagePreview = document.getElementById('image-preview');

                // Check if the event listener has been added before
                let isEventListenerAdded = false;

                uploadInput.addEventListener('change', (event) => {
                    const file = event.target.files[0];

                    if (file) {
                    filenameLabel.textContent = file.name;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                        imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

                        // Add event listener for image preview only once
                        if (!isEventListenerAdded) {
                        imagePreview.addEventListener('click', () => {
                            uploadInput.click();
                        });

                        isEventListenerAdded = true;
                        }
                    };
                    reader.readAsDataURL(file);
                    } else {
                    filenameLabel.textContent = '';
                    imagePreview.innerHTML =
                        `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
                    imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

                    // Remove the event listener when there's no image
                    imagePreview.removeEventListener('click', () => {
                        uploadInput.click();
                    });

                    isEventListenerAdded = false;
                    }
                });

                uploadInput.addEventListener('click', (event) => {
                    event.stopPropagation();
                });

                const session_username = "<?php echo Session::get('username'); ?>";
                function SubmitRoomReserve() {
                    var selectedCount = $('.cat_seleact_1').length;
                    console.log(selectedCount);
                    var selectedIds = $('.cat_seleact_1').map(function() {
                        return $(this).data('cat_name');
                    }).get();
                    console.log(selectedIds);
                    fetch("{{ Route('SubmitRoomReserve') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-Token": "{{ csrf_token() }}"
                        },
                        body:JSON.stringify(
                            {
                                room_id: document.getElementById("room_id").value,
                                start_date: document.getElementById("details_start_date").value,
                                end_date: document.getElementById("details_end_date").value,
                                cat_amount: document.getElementById("details_cat_amount").value,
                                shower_selected_text: document.getElementById("selected_text").innerHTML,
                                total_price: document.getElementById("total_price").innerHTML,
                                username: session_username,
                                image64: _image64_single,  
                                cats_selected: selectedIds
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
                                title: 'จองห้องไม่สำเร็จ!',
                                html: `${data.status}`,
                                confirmButtonText: 'ตกลง',
                            })

                            const error = (data && data.errorMessage) || "{{trans('general.warning.system_failed')}}" + " (CODE:"+response.status+")";
                            return Promise.reject(error);
                        }

                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'จองห้องสำเร็จ',
                                confirmButtonText: 'ตกลง',
                                timer: 1000,
                                timerProgressBar: true
                        }).then((result) => {
                            window.location.href = "<?php echo Route('payment'); ?>";
                        })
                    })
                    .catch((er) => {
                        console.log('Error' + er);
                    });                    
                }
                // ดึงค่าให้เปลี่ยนอัตโนมัติ                 
                function updateHeaderText(elementId) {
                    $('#details_cat_amount').val();
                    console.log( $('#details_cat_amount').val());
                    var amountcat =  $('#details_cat_amount').val();
                    var selectedText = document.getElementById(elementId).textContent;
                    document.getElementById('selected_text').textContent = selectedText;
                    // กลับมาทวน
                    var totalPriceContent = document.getElementById('total_price_cat_cut').textContent;
                    document.getElementById('totalPriceContent').textContent = totalPriceContent;
                
                    var price_select;
                    if (elementId === 'shawer_cat') {
                        price_select = 350 ; 
                    } else if (elementId === 'shawer_cut') {
                        price_select = 300 ; 
                    }else if (elementId === 'shawer_cat_cut') {
                        price_select = 500 ;
                    }else if (elementId === 'shawer_no_cut') {
                        price_select = 0 ;
                    }else {
                    }
                        // Update the content of the target element กลับมาทวนยังไม่เข้าใจดี
                    document.getElementById('totalPriceContent').textContent = price_select ;
                    document.getElementById('totalPriceContentAll').textContent = price_select ;
                    $('.cat_amount_shawer_modal').text(amountcat);
                    $('.cat_amount_shawer_modal1').text(amountcat * price_select);
                    // ifราคารวม
                    var price_all_shawer;
                    // Check the ID of the all_shawered radio button
                    if (elementId === 'shawer_cat') {
                        price_all_shawer = 350  * amountcat; 
                    } else if (elementId === 'shawer_cut') {
                        price_all_shawer = 300  * amountcat; 
                    }else if (elementId === 'shawer_cat_cut') {
                        price_all_shawer = 500  * amountcat; 
                    }else if (elementId === 'shawer_no_cut') {
                        price_all_shawer = 0  * amountcat;
                    } else {
                    }
                    
                    document.getElementById('price_all_shawer').textContent = price_all_shawer ;
                    document.getElementById('totalPriceAll').textContent = price_all_shawer;      
                    
                    var total_price = parseInt($('#total_room_price2').text()) + parseInt($('#totalPriceAll').text());
                    $('#total_price').text(total_price);
                }   
                    
                    
                
            </script>
        <!-- END MODAL ADD ADDRESS -->   
@endsection