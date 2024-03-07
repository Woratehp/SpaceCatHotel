<title>ประวัติการจองอาบน้ำ&ตัดขน | Spacecathotal</title>

@extends('components/LayoutUser')

@section('Content')
    <div class="modeal border border-gray-300 relative mt-4 flex items-center py-3">    
        <a href="{{ Route('shower')}}"class="absolute border border-gray-400 flex w-fit mt-2 mb-2 rounded-lg px-2 py-1 ml-7 shadow-lg">
                <img src="{{ URL('/picture/'.'arrow-right.png') }}" alt="" class=" w-[20px] h-[20px] mb-[3px] mt-[3px] " alt="logo"/>      
                <span class="">กลับ</span>
        </a>  
        <div class= " flex mx-auto text-xl">
            <span>รายละเอียดการจองอาบน้ำตัดขน</span>
        </div>
    </div>
    <div class="relative border border-gray-400 mt-[10em] mx-auto w-fit p-2">
            <div class="flex items-center">
                <img src="{{ URL('/picture/'.'history-tell.png') }}" alt="" class=" w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                <p class=" ">ประวัติการชำระเงิน</p>          
            </div>
            <P class="border border-gray-200"></P>
            @if(sizeof($payshower))
                @foreach($payshower as $payshower)
                    <div class="border border-gray300 mt-3 flex mx-5 rounded-xl py-2">
                        <img src="{{ URL('/picture/'.'user.png') }}" alt="" class="ml-2 w-7 h-[2em] mt-1.5" alt="logo"/>
                        <div class="ml-4 items-center justify-center flex gap-5">
                            <P>สถานการชำระเงิน:</P>      
                            <span class="text-gray-300">จาก {{ $payshower->shower_date }} เวลา {{ $payshower->shower_time }}</span> 
                            @if($payshower->shower_status === 0)
                                <span class="ml-8 text-yellow-400">รอการตรวจสอบ</span>
                            @elseif($payshower->shower_status === 1)
                                <span class="ml-8 text-green-400">ชำระเงินสำเร็จ</span>
                            @endif
                            <button class="btn-payshower hover:text-green-900 mt-1.5"
                            data-shower_date="{{ $payshower->shower_date }}"  
                            data-shower_time="{{ $payshower->shower_time}}" 
                            data-shower_amount="{{ $payshower->shower_amount}}"
                            data-shower_serve="{{ $payshower->shower_serve}}"  
                            data-shower_price="{{ $payshower->shower_price}}" 
                            data-shower_total="{{ $payshower->shower_total }}"
                            data-shower_cat_name="{{ $payshower->cat_name }}"
                            data-shower_cat_pic="{{ $payshower->cat_pic }}">
                            <i class="fi fi-rr-angle-small-right text-3xl items-center "></i>
                            </button>                                  
                        </div>
                    </div>
                @endforeach
            @endif
    </div> 
  
         <!-- start modal histoty -->
         <div id="modal-details-shower" class="modal hidden fixed z-[100] flex my-auto left-0 top-0 w-[100%] h-[100%] overflow-auto  ">
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
                                    <span>วันที่ใช้บริการ </span>
                                    <input  name="start" class="">
                                    <p class="text-gray-300" id="shower_date_detail">จาก 10:00</p>   
                                </div>           
                            </div>
                            <!-- checkout -->
                            <div class="grid grid-cols-3 mx-1 my-2 ">
                                <div class="relative bg-white min-w-[40px] min-h-[40px] max-w-[40px] max-h-[40px] p-1 overflow-hidden">
                                    <img src="{{ URL('/picture/'.'checkout.png') }}" alt="" class="w-full h-full object-cover my-auto" alt="logo"/>
                                </div>
                                <div class= "col-span-2 flex-col whitespace-nowrap">
                                    <span>เวลา: </span>
                                    <input  class="">
                                    <p class="text-gray-300" id="shower_time_detail">จาก 18:00</p>   
                                </div> 
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
                                                    <p class="shower_serve_detail text-sm font-semibold uppercase text-gray-500">ตัดขน</p>
                                                    <div>
                                                        <svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 13.8l-2.175-2.175q-.275-.275-.675-.275t-.7.3q-.275.275-.275.7q0 .425.275.7L9.9 15.9q.275.275.7.275q.425 0 .7-.275l5.675-5.675q.275-.275.275-.675t-.3-.7q-.275-.275-.7-.275q-.425 0-.7.275ZM12 22q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" /></svg>
                                                    </div>
                                                </div>
                                                <div class="text-xs flex items-end justify-between">
                                                    <p>ตัดขนน้องแมวอย่างเดียว</p>
                                                    <p class="shower_price_detail text-sm font-bold"></p><p class="text-sm font-bold">บาท</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>                                       
                                </div>
                            </div>
                            
                                <!-- button select cat dropdown -->
                                <button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" class="bg-[#F3F4F6] mx-auto mt-3 shadow-md rounded-lg mb-10 px-[4em] inline-flex items-center" type="button">
                                    <span id="shower_cat_name" > </span> 
                                    <img id="shower_cat_pic"  class="w-6 h-6 me-2 rounded-full" alt="Selected user image">
                                </button>    
                           
                             
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
                                                    <p class="shower_amount_detail">
                                                    0
                                                    </p>
                                                </div>
                                            </div>
                                        </div>                                      
                                </div>
                            </div>                      
                    </div>
                    <!-- end -->

                    <!-- start grid2 -->
                    <div class = " border rounded-lg shadow-xl h-[17em] mx-[5em] " >
                            <div class="flex gap-10 mt-2 ">
                                <img src="{{ URL('/picture/'.'showercat5.png') }}" alt="" class="w-[10em] h-[8em] px-3" alt="logo"/>
                                <div>
                                    <h2>บริการที่ท่านเลือก</h2>
                                    <h1 class="shower_serve_detail" class="text-gray-500">บริการ</h1> 
                                </div>                                                                       
                            </div> 
                            <div class=" mt-3  bg-gray-200 rounded-lg">
                                <div class=" mx-10 ">
                                    <p class="text-lg">รายละเอียดราคา</p>
                                    <div class="flex font-light text-sm mt-3 mb-3">
                                        <p >ราคา ( <p class="shower_price_detail">ราคา</p>x <p class="shower_amount_detail" >0</p>ตัว)</p>
                                        <p class="shower_total_detail ml-auto mr-[1.5em]" >0 </p><p>บาท</p>
                                    </div>       
                                </div>
                                <p class=" border-t-2 border-gray-300 w-full col-span-3"></p>
                                <div class="flex mx-10 border mt-3 mb-3">
                                    <p>ราคารวม</p>
                                    <p >(<p class="shower_price_detail">ราคา</p> x <p class="shower_amount_detail">0</p>ตัว)</p>
                                    <p class="shower_total_detail ml-auto mr-4 mb-3">0 </p><p>บาท</p>
                                </div>                                  
                                    <!-- <button id="btn-pay-shawer" class="mr-5 mt-2 mb-3 h-8 rounded-lg px-2 gra bg-red-500 hover:bg-red-700 duration-300 text-white w-full ">ชำระเงิน</button> -->
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
                $('.btn-payshower').on('click', function() {
                    $('#shower_date_detail').text($(this).data('shower_date'));
                    $('#shower_time_detail').text($(this).data('shower_time'));
                    $('.shower_amount_detail').text($(this).data('shower_amount'));
                    $('.shower_serve_detail').text($(this).data('shower_serve'));
                    $('.shower_price_detail').text($(this).data('shower_price'));
                    $('.shower_total_detail').text($(this).data('shower_total'));
                    $('#shower_cat_name').text($(this).data('shower_cat_name'));
                    console.log($(this).data('cat_name'));
                    const pathUploads = "{{ URL('/uploads/') }}/";
                    $('#shower_cat_pic').attr('src',pathUploads + $(this).data('shower_cat_pic'));
                    console.log($(this).data('shower_cat_pic'));
                    
                    
                    var start_date = new Date($(this).data('start_date'));
                    var end_date = new Date($(this).data('end_date'));
                    var total_date = end_date - start_date;
                    var days_difference = total_date / (1000 * 60 * 60 * 24);

                    $('#total_date').val(days_difference);                   
                    $('#room_id').val($(this).data('room_id'));           
                    $('#modal-details-shower').removeClass('hidden');
                });
                $('#details-close').on('click', function() {
                    $('#modal-details-shower').addClass('hidden');
                });
                
            });
           
            const session_username = "<?php echo Session::get('username'); ?>";
            function SubmitRoomReserve() {
                fetch("{{ Route('SubmitRoomReserve') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            start_date: document.getElementById("details_start_date").value,
                            end_date: document.getElementById("details_end_date").value,
                            cat_amount: document.getElementById("details_cat_amount").value,
                            username: session_username,
                            room_id: document.getElementById("room_id").value,
                            image64: _image64_single,
                            
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
                            title: 'เพิ่มบัญชีไม่สำเร็จ!',
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

            
        </script>
     
@endsection
