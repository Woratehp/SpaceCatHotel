<title>Admin | รายละเอีดการจอง</title>
@extends('components/Layoutadmin')

@section('Content')  
        <div class="border border-gray-300 relative mt-4 flex items-center py-3">    

                <div class= " flex mx-auto text-xl">
                    <span>รายละเอียดการจองฝากเลี้ยง</span>
                </div>
            </div>
                   
        </div> 
        <!-- add_cat -->   
        <div class="relative rounded-lg border mt-[5em] mx-auto w-[80em] shadow-lg">
            <div class="flex items-center">
                <img src="{{ URL('/picture/'.'history-tell.png') }}" alt="" class=" w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                <p class="font-semibold">รายละเอียดการจอง</p>

            </div>
            

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
     <!-- head -->
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                <th scope="col" class="px-6 py-3">
                    ชื่อ
                </th>
                <th scope="col" class="px-6 py-3">
                    นามสกุล
                </th>
                <th scope="col" class="px-6 py-3">
                    ประเภท
                </th>
                <th scope="col" class="px-6 py-3">
                    เช็คอิน
                </th>
                <th scope="col" class="px-6 py-3">
                    เช็คอิน
                </th>
                <th scope="col" class="px-6 py-3">
                    สถานะ
                </th>
                <th scope="col" class="px-6 py-3">
                    บริการเสริม
                </th>
                <th scope="col" class="px-6 py-3">
                    จำนวน
                </th>
                <th scope="col" class="px-6 py-3">
                    ชื่อแมว
                </th>
                <th scope="col" class="px-6 py-3 ">
                    ราคาทั้งหมด
                </th>
                <th scope="col" class="px-6 py-3">
                    สถานะ
                </th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($reserve as $reserve)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $reserve->firstname }}
                </th>
                <td class="px-6 py-4 font-medium text-gray-900" >
                {{ $reserve->lastname }}
                </td>
                <td class="px-6 py-4">
                    @if($reserve->type === 0)
                        อาบน้ำตัดขน
                    @else
                        ฝากเลี้ยง
                    @endif
                </td>
                <td class="px-4 py-4">
                    {{ $reserve->r_start_date }}
                </td>
                <td class="px-4 py-4">
                    {{ $reserve->r_end_date }}
                </td>
                <td class="px-6 py-4">
                    @if($reserve->status === 0)
                        กำลังรอการยืนยัน
                    @elseif($reserve->status === 1)
                        ยืนยันแล้ว
                    @endif
                </td>
                <td class="px-6 py-4">
                    
                    {{ $reserve-> shower_serve }}
                </td>
                <td class="px-6 py-4">
                    
                    {{ $reserve-> cat_amount }} ตัว
                </td>
                <td class="px-6 py-4"> 
                    {{ $reserve-> r_cat_name }}
                </td>
                <td class="px-9 py-4 font-bold	">
                    
                    {{ $reserve-> r_total2 }} ฿
                </td>
                <td class="flex items-center px-6 py-4"> 
                    <button data-image="{{ URL('/uploads/'.$reserve->image_name) }}" class="btn-payment-image font-medium text-blue-600 dark:text-blue-500 hover:underline">ตรวจสอบ </button>
                    <button class="btn-confirm-payment font-medium text-blue-600 dark:text-blue-500 hover:underline ms-3"
                    data-reserve_id="{{ $reserve->r_id }}">ยืนยัน</button>
                </td>
            </tr>
        @endforeach  
           
        </tbody>
    </table>
</div>

           
         </div>
         <div id="modal-payment-image" class="modal hidden fixed z-[100] flex my-auto left-0 top-0 w-screen h-screen overflow-auto" onclick="closeModal()">
            <div class="modal-content bg-white m-auto p-[10px] rounded-md drop-shadow-xl w-[30%] max-md:w-[100%] gap-2" onclick="event.stopPropagation()">
                <!-- รายละเอียดแมว madal -->
                <div class="relative flex items-ceter justify-center">
                    <img id="payment_image" src="" class="w-full h-full object-cover" alt="">
                </div>
            </div>
        </div>

        
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#btn-details-delete').on('click', function() {
                        $('#modal-details-delete').removeClass('hidden');
                    });
                    $('#details-close').on('click', function() {
                        $('#modal-details-delete').addClass('hidden');
                    });
                    $('#btn-details-more').on('click', function() {
                        $('#modal-details-more').removeClass('hidden');
                    });
                    $('#details-close').on('click', function() {
                        $('#modal-details-more').addClass('hidden');
                    });

                    $('.btn-confirm-payment').on('click', function() {
                        Swal.fire({
                            title: `คุณตรวจสอบแล้วใช่หรือไม่?`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่, ตกลง',
                            cancelButtonText: 'ยกเลิก',
                            }).then((result) => {
                            if (result.isConfirmed) {
                                ConfirmPayment($(this).data('reserve_id'));
                            }
                        })
                    });
                    $('.btn-payment-image').on('click', function() {
                        $('#payment_image').attr('src', $(this).data('image'));
                        $('#modal-payment-image').removeClass('hidden');
                    });
                    $('#payment-close-image').on('click', function() {
                        $('#modal-payment-image').addClass('hidden');
                    });
                });
            // เมื่อคลิกที่อื่นรูปจะปิดทันที
            function closeModal() {
                document.getElementById("modal-payment-image").classList.add("hidden");
            }        
            function ConfirmPayment(reserve_id) {
                fetch("{{ Route('ConfirmPayment') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            reserve_id: reserve_id,
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

                    location.reload();
                })
                .catch((er) => {
                    console.log('Error' + er);
                });                    
            }
            var _image64_reserve = '';
            function fileChosen_Cat(event) {
                this.fileToDataUrl_Cat(event, src => this.fileHanddle_Cat(src));
            }
            function fileToDataUrl_Cat(event, callback) {
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
            function fileHanddle_Cat(src){
                $("#image_name").attr("src", src);

                _image64_reserve = src;
            }
                </script>
  @endsection