<title>Admin | จัดการข้อมูลโปรไฟล์</title>
@extends('components/Layoutadmin')

@section('Content')  
        <div class="border border-gray-300 relative mt-4 flex items-center py-3">    
                <div class= " flex mx-auto text-xl">
                    <span>ข้อมูลโปร์ไฟล์ลูกค้า</span>
                </div>
            </div>
                   
        </div> 
        <!-- add_cat -->   
        <div class="relative rounded-lg border mt-[10em] mx-auto w-[55em] shadow-lg">
            <div class="flex items-center">
                <img src="{{ URL('/picture/'.'history-tell.png') }}" alt="" class=" w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                <p class="font-semibold">ข้อมูลโปร์ไฟล์ลูกค้า</p>

            </div>           

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <!-- head -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            <th scope="col" class="px-6 py-3">
                                ชื่อผู้ใช้
                            </th>
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
                                เบอร์โทรศัพท์
                            </th>
                            <th scope="col" class="px-6 py-3">
                            
                            </th>
                            <th scope="col" class="px-6 py-3">
                        
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <p>{{ $user->username }}</p>
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white " >
                            <p>{{ $user->firstname }}</p>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <p>{{ $user->lastname }}</p>
                            </td>
                            <td class="px-6 py-4">
                            <p>
                            
                                @if ($user->role == 3)
                                <p class="text-red-700">Admin</p>
                                @else ($user->role == 1)
                                <p class="text-blue-700">User</p> 
                        
                                @endif</p>
                            </td>
                            <td class="px-6 py-4">
                            <p>{{ $user->tell }}</p>
                            </td>

                            <td class="flex items-center px-6 py-4">
                                <button data-user_id="{{ $user->user_id }}"  data-username="{{ $user->username }}" 
                                        data-user_firstname="{{ $user->firstname }}" data-user_lastname="{{ $user->lastname }}"
                                        data-user_tell="{{ $user->tell }}"  class="btn-edit-user font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                <button data-user_id="{{ $user->user_id }}" class="btn-user-delete font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </td>
                        </tr>     
                        @endforeach      
                    </tbody>
                </table>
            </div>
            
            <!-- start_modal_editcat -->
            <div id="modal-edit-user" class="modal hidden fixed z-[100] flex my-auto left-0 top-0 w-[100%] h-[100%] overflow-auto  ">
                        <div class="modal-content bg-white m-auto p-[10px] rounded-md drop-shadow-xl w-[65%] max-md:w-[100%] gap-2">
                            <span id="details-close-edit" class="text-gray-500 text-[30px] font-medium absolute top-0 right-0 mr-4 hover:text-indigo-600 cursor-pointer">&times;</span>   
                            <div class="relative rounded-lg border mt-[5em] mx-auto w-[55em] shadow-lg pb-[7em]">
                    <div class="flex items-center">
                        <img src="{{ URL('/picture/'.'report.png') }}" alt="" class="ml-5 mr-2 w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                        <p class="font-semibold">รายละเอียดการติดต่อ </p>

                    </div>
                    <P class="border border-gray-200"></P>
                    <input id="editprofile_id" class="hidden" value="{{ $user->user_id}}"> 

                    <div class = "flex relative rounded-lg border mt-[4em] mx-auto w-[50em]"><img src="{{ URL('/picture/'.'email.png') }}"class="mx-3 my-3 w-12 h-12 ">
                        <div class="mt-2">
                            ชื่อผู้ใช้ :
                            <div class=" ">
                            <input id="editprofile_username" class="text-gray-500 font-light w-[30em]"  type="username" name="username" placeholder="ชื่อผู้ใช้" readonly value="{{ $user->username}}"> 
                            </div>
                        </div>
                    </div> 

                    <div class = "flex relative rounded-lg border mt-[5px] mx-auto w-[50em]"><img src="{{ URL('/picture/'.'users.png') }}"class="mx-3 my-3 w-12 h-12 ">
                        <div class="mt-2">
                            ชื่อ :
                            <div class=" ">
                                <input id="editprofile_name" class="text-gray-500 font-light w-[30em]"  type="name" name="name" placeholder="ชื่อนามสกุล" value="{{ $user->firstname}}"> 
                            </div>
                        </div>
                    </div>

                    <div class = "flex relative rounded-lg border mt-[5px] mx-auto w-[50em]"><img src="{{ URL('/picture/'.'users.png') }}"class="mx-3 my-3 w-12 h-12 ">
                        <div class="mt-2">
                            นามสกุล :
                            <div class=" ">
                            <input id="editprofile_lastname" class="text-gray-500 font-light w-[30em]"  type="name" name="name" placeholder="นามสกุล" value="{{ $user->lastname}}"> 
                            </div>
                        </div>
                    
                    </div>

                    <div class = "flex relative rounded-lg border mt-[5px] mx-auto w-[50em]"><img src="{{ URL('/picture/'.'tell.png') }}"class="mx-3 my-3 w-12 h-12 ">
                        <div class="mt-2">
                            เบอร์โทร :
                            <div class=" ">
                            <input id="editprofile_tell" class="text-gray-500 font-light w-[30em]"  type="tel" name="tel" placeholder="เบอร์โทร" value="{{ $user->tell }}"> 
                            </div>
                        </div>
                    
                    </div>
                    <button onClick="SubmitProfileEdit()" class="flex ml-[45em] mt-[1em] bg-green-800 text-white py-2 px-4 rounded items-center">บันทึก<img src="{{ URL('/picture/'.'diskette.png') }}"class="ml-1 w-5 h-5 "></button>
                </div>
                <div class="relative rounded-lg border mt-[2em] mx-auto w-[55em] shadow-lg pb-[5em]">
                    <div class="flex items-center">
                        <img src="{{ URL('/picture/'.'key.png') }}" alt="" class="ml-5 mr-2 w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                        <p class="font-semibold">เปลี่ยนรหัสผ่าน </p>

                    </div>
                    <P class="border border-gray-200"></P>
                    
                    <div class = "flex relative rounded-lg border mt-[4em] mx-auto w-[50em]"><img src="{{ URL('/picture/'.'padlock.png') }}"class="mx-3 my-3 w-12 h-12 ">
                        <div class="mt-2">
                            รหัสผ่าน :
                            <div class=" ">
                            <input id="editprofile_password" class="font-light w-[30em]"  type="password" name="password" placeholder="รหัสผ่าน"> 
                            </div>
                        </div>
                    </div>

                    <div class = "flex relative rounded-lg border mt-[5px] mx-auto w-[50em]"><img src="{{ URL('/picture/'.'unlock.png') }}"class="mx-3 my-3 w-12 h-12 ">
                        <div class="mt-2">
                            ยืนยันรหัสผ่าน :
                            <div class=" ">
                            <input id="editprofile_confirmpassword" class="font-light w-[30em]"  type="password" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน"> 
                            </div>
                        </div>          
                    </div>
                    <button onClick="SubmitProfileEditPassword()" class="flex ml-[45em] mt-[1em] bg-blue-900 text-white py-2 px-4 rounded items-center">บันทึก<img src="{{ URL('/picture/'.'check-mark.png') }}"class="ml-1 w-5 h-5 "></button>
                    </div>   
                        </div>
                                    
                    </div>

                <!-- END MODAL CONTENT -->

                    <P class="border border-gray-200"></P>
            </div>

        
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('.btn-edit-user').on('click', function() {
                            $('#editprofile_id').val($(this).data('user_id'));
                            $('#editprofile_username').val($(this).data('username'));
                            $('#editprofile_name').val($(this).data('user_firstname'));
                            $('#editprofile_lastname').val($(this).data('user_lastname'));
                            $('#editprofile_tell').val($(this).data('user_tell'));

                            $('#modal-edit-user').removeClass('hidden');

                        });
                        $('#details-close-edit').on('click', function() {
                            $('#modal-edit-user').addClass('hidden');
                        });

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
                    });
                     // MODAL DELETE
                     $('.btn-user-delete').on('click', function () {
                        $('#user_id').val($(this).data('user_id'));
                            Swal.fire({
                                title: `คุณแน่ใจหรือไม่? <br><b class="text-xl font-medium"></b>`,
                                text: "การดำเนินการนี้ไม่สามารถเรียกคืนได้",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่, ลบ',
                                cancelButtonText: 'ยกเลิก',
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    SubmitUserDelete($(this).data('user_id'));
                                }
                            })
                        });
                
                function SubmitProfileEdit() {
                    console.log('value = ' + document.getElementById("editprofile_name").value);
                        fetch("{{ Route('SubmitProfileEdit') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-CSRF-Token": "{{ csrf_token() }}"
                            },
                            body:JSON.stringify(
                                {
                                    user_id: document.getElementById("editprofile_id").value,
                                    password: document.getElementById("editprofile_password").value,
                                    firstname: document.getElementById("editprofile_name").value,
                                    lastname: document.getElementById("editprofile_lastname").value,
                                    tell: document.getElementById("editprofile_tell").value,
                                    
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
                                    title: 'แก้ไขโปรไฟล์ไม่สำเร็จ!',
                                    html: `${data.status}`,
                                    confirmButtonText: 'ตกลง',
                                })

                                const error = (data && data.errorMessage) || "{{trans('general.warning.system_failed')}}" + " (CODE:"+response.status+")";
                                return Promise.reject(error);
                            }

                            Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'แก้ไขโปรไฟล์สำเร็จ',
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

                function SubmitUserDelete(user_id) {
                    fetch("{{ Route('SubmitUserDelete') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-Token": "{{ csrf_token() }}"
                        },
                        body:JSON.stringify(
                            {
                                user_id: user_id,
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

                function SubmitProfileEditPassword() {
                    fetch("{{ Route('SubmitProfileEditPassword') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-Token": "{{ csrf_token() }}"
                        },
                        body:JSON.stringify(
                            {
                                user_id: document.getElementById("editprofile_id").value,
                                password: document.getElementById("editprofile_password").value,
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
                                title: 'แก้ไขรหัสผ่านไม่สำเร็จ!',
                                html: `${data.status}`,
                                confirmButtonText: 'ตกลง',
                            })

                            const error = (data && data.errorMessage) || "{{trans('general.warning.system_failed')}}" + " (CODE:"+response.status+")";
                            return Promise.reject(error);
                        }

                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'เปลี่ยนรหัสผ่านสำเร็จ',
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
                    
                </script>
  @endsection