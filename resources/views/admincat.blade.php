<title>Admin | รายละเอีดการจอง</title>
@extends('components/Layoutadmin')

@section('Content')  
        <div class="border border-gray-300 relative mt-4 flex items-center py-3">    
                <div class= " flex mx-auto text-xl">
                    <span>รายละเอียดสัตว์เลี้ยง</span>
                </div>
            </div>
                   
        </div> 
        <!-- add_cat -->   
        <div class="relative rounded-lg border mt-[10em] mx-auto w-[55em] shadow-lg">
            <div class="flex items-center">
                <img src="{{ URL('/picture/'.'history-tell.png') }}" alt="" class=" w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                <p class="font-semibold">รายละเอียด</p>

            </div>
            

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <!-- head -->
        @if(sizeof($cat))
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ชื่อ
                        </th>
                        <th scope="col" class="px-6 py-3">
                            นามสกุล
                        </th>
                        <th scope="col" class="px-6 py-3">
                            แก้ไข
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cat as $cat)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $cat->user_id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $cat->firstname }}
                        </th>
                        <td class="px-6=8 py-4] font-medium text-gray-900" >
                        {{ $cat->lastname }}
                        </td>
                       
                        <td class="flex items-center px-6 py-4"> 
                            <button  data-cat_pic="{{ URL('/uploads/' . $cat->cat_pic) }}"  data-cat_name="{{ $cat->cat_name }}" class="btn-payment-image font-medium text-blue-600 dark:text-blue-500 hover:underline">ดูแมว</button>
                            <button class="btn-confirm-payment font-medium text-blue-600 dark:text-blue-500 hover:underline ms-3"
                            >ยืนยัน</button>
                        </td>
                    </tr>
                @endforeach             
                </tbody>
            </table>
            @endif
        </div>
            <!-- <P class="border border-gray-200"></P> -->
         </div>

         <div id="modal-payment-image" class="modal hidden fixed z-[100] flex my-auto left-0 top-0 w-screen h-screen overflow-auto" onclick="closeModal()">
         <input id="editprofile_id" class="hidden" value=""> 
            <div class="modal-content bg-white m-auto p-[10px] rounded-md drop-shadow-xl w-[30%] max-md:w-[100%] gap-2" onclick="event.stopPropagation()">
                <!-- รายละเอียดแมว madal -->
                    <div class="flex flex-wrap mt-5 justify-center items-center ">   
                            <button onclick="toggleRing(this)" class="selectable-cat  focus:outline-none ring-blue-500 bg-gray-400 shadow-md rounded-md p-5 m-2 cursor-pointer transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg" >
                                <p id="namecat" class="flex items-center hover:text-white">
                                    <img src="{{ URL('/uploads/' . $cat->cat_pic) }}" class="w-6 h-6 me-2 rounded-full" alt="Jese image">
                                    {{ $cat->cat_name }}
                                </p>
                            </button>     
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
                        console.log($(this).data('payshower_id'));
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
                                ConfirmPayment_cat($(this).data('payshower_id'));
                            }
                        })
                    });
                    $('.btn-payment-image').on('click', function() {
                        // $('#payment_image').attr('src', $(this).data('image'));
                        $('#modal-payment-image').removeClass('hidden');
                    });
                    $('#payment-close-image').on('click', function() {
                        $('#modal-payment-image').addClass('hidden');
                    });
                });

                function closeModal() {
                document.getElementById("modal-payment-image").classList.add("hidden");
            }         
            function ConfirmPayment_cat(payshower_id) {
                fetch("{{ Route('ConfirmPayment_cat') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            payshower_id: payshower_id,
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