<title>Admin | จัดการโปรโมชั่น</title>

@extends('components/Layoutadmin')

@section('Content')
    <div class = "  flex"  >
        <div class="ml-[5em] flex col-span-4 gap-10 mt-[2em]">
            <div class="flex justify-center w-30">
                <section class="container w-full  h-fit mx-auto items-center">
                    <div class="flex">
                        <div class="px-4 py-6">
                            <div id="image-preview" class="max-w-sm p-8 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input onchange={fileChosen_Single(event)} id="promotion_deposit" type="file" class="hidden" accept="image/*" />
                                <label for="promotion_deposit" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="relative inline-flex items-center justify-center">
            <button onClick="Submitpromotion()" class="h-fit relative inline-flex  p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    เพิ่มโปรโมชั่นรูป
                    </span>
            </button>                 
        </div>
    </div> 
             <!-- โปรโมชั่น-->               
                <div class="w-1/6 p-10  ">
                    <div class="absulte min-w-[150px] min-h-[45px] text-[FFFFFF] text-center bg-[82C3FF]  border-2 border-white  p-2 shadow-lg origin-bottom -rotate-12 rounded-md  ">โปรโมชั่น</div>
                </div>
                @if(sizeof($promotion))   
                    <div class="grid grid-cols-3 gap-6 px-[10em] max-md:grid-cols-2 max-sm:grid-cols-1">
                        @foreach($promotion as $promotion)               
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow text-center ">
                            <img src="{{ URL('/uploads/'. $promotion->promotion_deposit) }}"class=" mt-3 mx-auto flex h-[15em] w-[19em]  flex items-center justify-center rounded-lg shadow-lg hover:scale-125 duration-300"/>  
                            <button type="button" data-promotion_id="{{$promotion->promotion_id}}" class="btn-promotion-delete text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 mt-5 ">ลบ</button>
                        </div>                                           
                    @endforeach               
                    </div>
                 @endif
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.btn-promotion-delete').on('click', function () {
                    Swal.fire({
                        title: `ต้องการที่จะลบหรือไม่? <br><b class="text-xl font-medium"></b>`,
                        text: "การดำเนินการนี้ไม่สามารถเรียกคืนได้",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่, ลบ',
                        cancelButtonText: 'ยกเลิก',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            SubmitPromotionDelete($(this).data('promotion_id'));
                        }
                    })
                 });
            });

            function SubmitPromotionDelete(promotion_id) {
                fetch("{{ Route('SubmitPromotionDelete') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            promotion_id: promotion_id,
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

            function Submitpromotion() {
                fetch("{{ Route('Submitpromotion') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            promotion_deposit: document.getElementById("promotion_deposit"),
                            imagePromotion: _image64_single
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
                            title: 'เพิ่มรูปไม่สำเร็จ!',
                            html: `${data.status}`,
                            confirmButtonText: 'ตกลง',
                        })

                        const error = (data && data.errorMessage) || "{{trans('general.warning.system_failed')}}" + " (CODE:"+response.status+")";
                        return Promise.reject(error);
                    }

                    Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'เพิ่มรูปสำเร็จ',
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
                $("#promotion").attr("src", src);
                _image64_single = src;
            }

            const uploadInput = document.getElementById('promotion_deposit');
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
                    `<img src="${e.target.result}" class="max-h-65 rounded-lg mx-auto" alt="Image preview" />`;
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

            
        </script>
 @endsection