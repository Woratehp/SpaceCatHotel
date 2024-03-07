<title>ประวัติการจองฝากเลี้ยง | Spacecathotal</title>

@extends('components/LayoutUser')

@section('Content')
    <div class="modeal border border-gray-300 relative mt-4 flex items-center py-3">    
        <a href="{{ Route('Home')}}"class="absolute border border-gray-400 flex w-fit mt-2 mb-2 rounded-lg px-2 py-1 ml-7 shadow-lg">
                <img src="{{ URL('/picture/'.'arrow-right.png') }}" alt="" class=" w-[20px] h-[20px] mb-[3px] mt-[3px] " alt="logo"/>      
                <span class="">กลับ</span>
        </a>  
        <div class= " flex mx-auto text-xl">
            <span>รายละเอียดการจองฝากเลี้ยง</span>
        </div>
    </div>
    <div class="relative border border-gray-400 mt-[10em] mx-auto w-fit p-2">
            <div class="flex items-center">
                <img src="{{ URL('/picture/'.'history-tell.png') }}" alt="" class=" w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                <p class=" ">ประวัติการชำระเงิน</p>          
            </div>
            <P class="border border-gray-200"></P>
            @if(sizeof($reserve))
                @foreach($reserve as $reserve)
                    <div class="border border-gray300 mt-3 flex mx-5 rounded-xl py-2">
                        <img src="{{ URL('/picture/'.'user.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-1.5" alt="logo"/>
                        <div class="ml-4 items-center justify-center flex gap-5">
                            <P>สถานการชำระเงิน:</P>      
                            <span class="text-gray-300">จาก {{ $reserve->r_start_date }} ถึง {{ $reserve->r_end_date }}</span> 
                            @if($reserve->status === 0)
                                <span class="ml-8 text-yellow-400">รอการตรวจสอบ</span>
                            @elseif($reserve->status === 1)
                                <span class="ml-8 text-green-400">ชำระเงินสำเร็จ</span>
                            @endif
                            <button class="btn-details-room hover:text-green-900 mt-1.5"
                            data-reserve_id="{{ $reserve->r_id }}"
                            data-start_date="{{ $reserve->r_start_date }}"  data-end_date="{{ $reserve->r_end_date }}" 
                            data-cat_amount="{{ $reserve->cat_amount }}"
                            data-room_id="{{ $reserve->room_id }}"  data-room_detail="{{ $reserve->room_detail }}" 
                            data-room_price="{{ $reserve->room_price }}" data-room_size="{{ $reserve->room_size }}" 
                            data-room_hight="{{ $reserve->room_hight }}" data-room_cat="{{ $reserve->room_cat }}" 
                            data-room_pic="{{ URL('/uploads/' . $reserve->room_pic) }}" data-room_name="{{ $reserve->room_name }}"
                            data-r_postpon="{{ $reserve->r_postpon }}" data-r_total2="{{ $reserve->r_total2 }}" > 
                                <i class="fi fi-rr-angle-small-right text-3xl items-center "></i>
                            </button>                                   
                        </div>
                    </div>
                @endforeach
            @endif
    </div> 

         <!-- start modal -->
         <div id="modal-details-room" class="modal hidden fixed z-[100] flex my-auto left-0 top-0 w-[100%] h-[100%] overflow-auto">
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
                                     <p id="details_start_date"  class="flex outline-none  w-fit"> </p>
                                    <p class="text-gray-300">จาก 10:00</p>   
                                </div>           
                            </div>
                            <!-- checkout -->
                            <div class="grid grid-cols-3 mx-1 my-2 ">
                                <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                    <img src="{{ URL('/picture/'.'checkout.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                </div>
                                <div class= "col-span-2 flex-col whitespace-nowrap ">
                                    <span>เช็คเอาท์: </span>
                                    <p name="end" type="date" class="details_end_date"> </p> 
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
                                    <input id="total_date" name="total_date" type="total_date" class="w-10 outline-none" readonly>        
                                    <div class="flex whitespace-nowrap">
                                        <p class="text-red-500"> จองเพิ่ม</p>
                                        <p  name="date_postpon_add" type="date_postpon_add" class="postpon_date ml-4 w-10 outline-none text-red-500" readonly>  
                                        <p class="text-red-500 ml-2">วัน</p>                        
                                    </div>                    
                                </div>           
                            </div>

                            <div class="grid grid-cols-3 mx-1 my-2">
                                <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                    <img src="{{ URL('/picture/'.'catnumber.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                </div>
                                <div class= "flex-col">
                                    <span class="whitespace-nowrap">จำนวนแมว:</span>
                                    <input id="details_cat_amount" name="cat_amount" type="cat_amount" class="w-10 focus:outline-none" readonly>   
                                </div>           
                            </div>
                        </div>
    
                        <div class="col-span-2  my-2 border-t-2">
                            <div class= "flex w-fit h-auto mt-3 m-auto col-span-2 h-[10em] max-lg:overflow-hidden">                                                      
                                <button type="button" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex ">
                                    <svg aria-hidden="true" class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                    หากต้องการเลื่อนวันมารับน้องแมว
                                </button>
                                <!-- Main modal -->
                                <div id="crypto-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    เลื่อนวันรับฝากแมว
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crypto-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- รับขัอมูลเข้ามาก่อน -->
                                            <input type="hidden" id="reserve_id">
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
                                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">ถ้าท่านต้องการจะเลื่อนวันมารับฝากแมวของท่านทางร้านจะคิดเพิ่มเท่ากับราคาห้องต่อวัน และต้องทำการชำระเงินเพิ่มในวันที่มารับแมวของท่าน</p>
                                                <ul class="my-4 space-y-3">
                                                    <li>
                                                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                                            <svg aria-hidden="true" class="h-5" viewBox="0 0 292 292" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M145.7 291.66C226.146 291.66 291.36 226.446 291.36 146C291.36 65.5541 226.146 0.339844 145.7 0.339844C65.2542 0.339844 0.0400391 65.5541 0.0400391 146C0.0400391 226.446 65.2542 291.66 145.7 291.66Z" fill="#3259A5"/><path d="M195.94 155.5C191.49 179.08 170.8 196.91 145.93 196.91C117.81 196.91 95.0204 174.12 95.0204 146C95.0204 117.88 117.81 95.0897 145.93 95.0897C170.8 95.0897 191.49 112.93 195.94 136.5H247.31C242.52 84.7197 198.96 44.1797 145.93 44.1797C89.6904 44.1797 44.1104 89.7697 44.1104 146C44.1104 202.24 89.7004 247.82 145.93 247.82C198.96 247.82 242.52 207.28 247.31 155.5H195.94Z" fill="white"/></svg>
                                                            <input  oninput="validateDates();" id="date_postpon" name="end" type="date" class="flex-1 ms-3 whitespace-nowrap" > 
                                                        </a>
                                                    </li>         
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button onClick="SubmitEditDate()"   data-modal-hide="crypto-modal" type="button" class="btn-postpone text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ตกลง</button>
                                                        <button data-modal-hide="crypto-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">ยกเลิก</button>
                                                    </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="flex  justify-center mx-auto">
                                <div class= "inline-flex mb-4 mt-3 px-6 gap-2">
                                    <span class="flex items-center">จากวันที่</span>             
                                    <span name="end" type="date" class="details_end_date border p-2 rounded-xl shadow-md">  </span>                              
                                </div>
                                <div class= "inline-flex mb-4 mt-3 gap-7">
                                    <span class="flex items-center">ต้องการจะมารับน้องแมววันที่</span>             
                                    <span id="date_postpon1" name="end" class=" border p-2 rounded-xl shadow-md">0000-00-00</span>                 
                                </div>                              
                            </div>
                            
                        </div>
                    </div>
                    <!-- end -->

                    <!-- start grid2 -->
                        <div class = "border rounded-lg shadow-xl h-[17em] mx-[4.5em]" >      
                            <div class="px-5 flex col-span-4 gap-10 mt-2 mb-2">
                                <img id="room_pic" src=" " alt="" class="w-[15em] h-[7em] border border-red mx-auto" alt="logo"/>
                                <div class="whitespace-nowrap flex-col  h-fit ">
                                    <p class="whitespace-nowrap" id="room_name" ></p>
                                    <div class=" border border-gray-400 mt-2 rounded-xl flex font-light items-center justify-center w-fit">
                                        <div class="px-4 flex">
                                            <img src="{{ URL('/picture/'.'cat1.png') }}" alt="" class="w-full h-[25px] mb-[3px] mt-[3px] " alt="logo"/>
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
                            <div class="bg-gray-300 rounded-lg h-[9em]">
                                <div class="grid grid-cols-2 ">
                                    <div class="p-2">
                                        <h1>รายละเอียดราคา</h1>
                                        <p>ราคามาตรฐาน <span class="room_price"></span> x <span id="count_total_date">1</span> วัน</p>
                                    </div>
                                    <div class="p-2 inline-flex ml-auto mr-0 mt-auto mb-0">
                                        <p id="total_room_price2"></p><span class="ml-2">บาท</span>
                                    </div>
                                    <p class=" border-t-2 border-gray-300 w-full col-span-3 "></p>

                                    <div class="p-2 flex ">
                                        <p>ราคารวมทั้งหมด  <span class="room_price"></span> x <span id="count_total_date2">1</span> วัน</p> 
                                    </div>
                                    <div class="p-2 inline-flex ml-auto mr-0 ">
                                        <span id="total_room_price1"></span><span class="ml-2">บาท</span>
                                    </div>                     
                                </div> 
                                <div class="ml-2 text-red-700 font-medium mt-1">
                                    <span class="">*รายการที่ต้องจ่ายเพิ่ม</span>
                                    <span class="room_price" class="">0</span> x 
                                    <span class="postpon_date" >0</span>วัน
                                    <div class="gap-2 inline-flex  ml-auto mr-0">
                                        <span id="total_postpon" class="" >0</span>
                                        <span class=""> บาท</span>
                                    </div>
                                </div>                       
                            </div>                            
                        </div>
                        <!-- start grid3 -->
                        <div class = "border rounded-lg shadow-xl " >
                        <input id="editprofile_id" class="hidden" value=""> 
                            <div class="flex mx-5 mt-3">
                                <img src="{{ URL('/picture/'.'detail.png') }}" alt="" class="ml-2" alt="logo"/>
                                <p class="ml-2">รายละเอียดการติดต่อ</p>
                            </div> 
                            <P class="border border-gray-200 mt-3 "></P>
                            
                            <!-- ชื่อ -->
                            <div class="border border-gray300 mt-3 flex mx-5 rounded-xl">
                                <img src="{{ URL('/picture/'.'user.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-2" alt="logo"/>
                                <div class="ml-4">
                                    <P>ชื่อ:</P>
                                    <P class="text-gray-500">{{ Session::get('firstname')}}</P>                                                             
                                </div>
                            </div>
                            <div class="border border-gray300 mt-3 flex mx-5 rounded-xl">
                                <img src="{{ URL('/picture/'.'user.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-2" alt="logo"/>
                                <div class="ml-4">
                                    <P>นามสกุล:</P>
                                    <P class="text-gray-500">{{ Session::get('lastname')}}</P>    
                                                        
                                </div>
                            </div>
                            <!-- เบอร์โทร -->
                            <div class="border border-gray300 mt-3 flex mx-5 rounded-xl">
                                <img src="{{ URL('/picture/'.'tell.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-2" alt="logo"/>
                                <div class="ml-4">
                                    <P >เบอร์โทร :</P>
                                    <P class="text-gray-500" >{{ Session::get('tell')}}</P>                       
                                </div>
                            </div>
                            <!-- email -->
                            <div class="border border-gray300 mt-3 flex mx-5 rounded-xl">
                                <img src="{{ URL('/picture/'.'email.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-2" alt="logo"/>
                                <div class="ml-4">
                                    <P >Email:</P>
                                    <P class="text-gray-500">{{ Session::get('username')}}</P>                                  
                                </div>                                         
                            </div>
                            <div class="flex">
                                <a href="profile" class="ml-auto mr-5 mt-2 mb-2 rounded-lg px-4 py-2 bg-blue-600 hover:bg-[2344B8] duration-300 text-white">แก้ไข</a>
                            </div>
                            
                        </div>
                    <!-- end -->                           
                </div>                          
            </div>               
        </div>
                <!-- END MODAL CONTENT -->  
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Modal
            $(document).ready(function() {
                $('.btn-details-room').on('click', function() {
                    $('#details_start_date').text($(this).data('start_date'));
                    $('.details_end_date').text($(this).data('end_date'));
                    var start_date = new Date($(this).data('start_date'));
                    var end_date = new Date($(this).data('end_date'));
                    var total_date = end_date - start_date;                   
                    var days_difference = total_date / (1000 * 60 * 60 * 24);
                    
                    $('#total_date').val(days_difference);
                    $('#count_total_date').text(days_difference);
                    $('#count_total_date2').text(days_difference);
                    $('#details_cat_amount').val($(this).data('cat_amount'));
                    $('#room_id').val($(this).data('room_id'));
                    $('#room_name').text($(this).data('room_name'));
                    $('#room_detail').text($(this).data('room_detail'));
                    $('.room_price').text($(this).data('room_price'));
                    $('#room_size').text($(this).data('room_size'));
                    $('#room_hight').text($(this).data('room_hight'));
                    $('#room_cat').text($(this).data('room_cat'));
                    $('#room_pic').attr('src', $(this).data('room_pic'));                    
                    $('#total_room_price1').text($(this).data('r_total2') );
                    $('#total_room_price2').text($(this).data('room_price') * days_difference);
                    $('#reserve_id').val($(this).data('reserve_id'));
                    $('#modal-details-room').removeClass('hidden');
                   

                    if($(this).data('r_postpon')){
                        var postpon_date = new Date($(this).data('r_postpon'));
                        var postpon_add = postpon_date - end_date 
                        var postpon_difference = postpon_add / (1000 * 60 * 60 * 24);
                        $('#date_edit').val($(this).data('end_date'));
                        $('#date_postpon').val($(this).data('r_postpon'));
                        $('.postpon_date').text(postpon_difference); 
                        $('#total_postpon').text($(this).data('room_price') * postpon_difference);
                        console.log(total_postpon)
                        $('#date_postpon1').text($(this).data('r_postpon'));

                    }else{
                        $('.postpon_date').text(0);  
                        
                    }
                   
                });
                $('#details-close').on('click', function() {
                    $('#modal-details-room').addClass('hidden');
                });
                // $('.btn-postpone').on('click', function(){
                //     Swal.fire({
                //         title: `คุณแน่ใจว่าต้องการเลื่อนวันมารับน้องแมว? <br><b class="text-xl font-medium"></b>`,
                //         text: "การดำเนินการนี้ไม่สามารถย้อนกลับได้",
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: 'ตกลง',
                //         cancelButtonText: 'ยกเลิก',
                //         }).then((result) => {
                //         if (result.isConfirmed) {
                //             SubmitPromotionDelete($(this).data('SubmitEditDate'));
                //         }
                //     }) 
                // });
            });
           
            const session_username = "<?php echo Session::get('username'); ?>";
            function SubmitEditDate() {
                fetch("{{ Route('SubmitEditDate') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            reserve_id: document.getElementById('reserve_id').value,
                            date_edit: document.getElementById('date_postpon').value,
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
                    // ใช้รีเฟรชเมื่อทำเสร็จ
                    location.reload();
                })
                .catch((er) => {
                    console.log('Error' + er);
                });                    
            }

            function validateDates() {
                    var startDateInput = document.getElementById("date_postpon");
                    if(!startDateInput.value) {
                        return false;
                    }
                    
                    var startDate = new Date(startDateInput.value);
                    // = Dateการกำหนดให้เข้าใจว่าเป็นวันที่
                    var currentDate = new Date();
                    currentDate.setDate(currentDate.getDate());
                    currentDate.setHours(7, 0, 0, 0);

                    if (startDate <= currentDate) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'รูปแบบวันที่ไม่ถูกต้อง!',
                            html: 'กรุณาเลือก<b class="text-rose-800">วันที่</b> ให้ถูกต้อง',
                            confirmButtonText: 'ตกลง'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                startDateInput.classList.add("border-red-500");
                                startDateInput.value = currentDate.toISOString().split('T')[0];
                            }
                        });
                        startDateInput.classList.add("border-red-500");
                        // startDateInput.value = "";
                        return false;
                    }
                    validateInput = true;
                }
                    // เลือก element ด้วย ID
        </script>
     
@endsection
