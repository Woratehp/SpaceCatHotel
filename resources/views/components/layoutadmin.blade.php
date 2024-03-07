@php $currentRoute = Request::route()->getName(); @endphp
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Layout</title>
        <link  href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/stlyes.css') }}" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/890449035993972738/1207716887459270727/output-onlinegiftools.gif?ex=65e0a900&is=65ce3400&hm=98910252b2769dab055302c0832dc4ac1c3cc20134d246f2501242630e1cd1d5&" />
        </script>
    </head>
    <body>
        <!-- Nav Bar -->
        <nav class="bg-white border-gray-200 dark:bg-gray-800 ">
            <div class="max-w-screen-xl-hidden flex flex-wrap items-center justify-between mr-[6em]">
                <a class="flex items-center space-x-3 rtl:space-x-reverse">     
                    <!-- dropdowadmin           -->
                    <div class="text-center ml-10">
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
                            <svg class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- drawer component -->
                    <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-85 shadow-xl h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
                            <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
                            <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close menu</span>
                            </button>
                        <div class="py-4 overflow-y-auto">
                            <ul class="space-y-2 font-medium">
                                <li>
                                    <a href="dayreport" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                        </svg>
                                        <span class="ms-3">รายงาน</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="adminedituser" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">โปรไฟล์</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="adminhome" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">รายละเอียดการจองฝากเลี้ยง</span>
                                        <!-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">2</span> -->
                                    </a>
                                </li>
                                <li>
                                    <a href="adminconfirmcat" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">รายละเอียดการจองอาบน้ำและตัดขน</span>
                                        <!-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> -->
                                    </a>
                                </li>
                                <li>
                                    <a href="admineditroom" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                                        <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                                        <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">ข้อมูลห้อง</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="adminpromotion" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">จัดการโปรโมชั่นฝากเลี้ยง</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="adminpromotioncat" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">จัดการโปรโมชั่นอาบน้ำตัดขน</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('Logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">ออกจากระบบ</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class=" text-center flex items-center" >
                        <img src="{{ URL('/picture/'.'cat.png') }}"class="h-20" alt="Flowbite Logo" />
                        <div>
                            <a href="adminhome" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white font-extrabold text-transparent text-2xl bg-clip-text bg-gradient-to-r from-purple-500 to-pink-600">Admin</a>
                            <p >space cat hotel</p>
                        </div>
                    </div>
                </a>
                <div class="hidden md:block md:w-auto flex  " id="navbar-default ">
                    <ul class="font-medium flex flex-col md:p-2 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-2 md:border-0 md:bg-white">
                        <div class= " flex items-center ">
                            @if($currentRoute === 'shower')
                                <img src="https://t.ly/T5_fM" class="h-5" alt="Flowbite Logo" />
                                <a href="{{ Route('Home') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">ฝากเลี้ยงสัตว์</a>
                            @elseif($currentRoute === 'Home')
                                <img src="https://t.ly/T5_fM" class="h-5" alt="Flowbite Logo" />
                                <a href="{{ Route('shower') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">อาบน้ำตัดขน</a>
                            @endif
                        </div>
                        @if(Session::get('authen')) 
                        <div class="hidden w-full md:block md:w-auto pt-1" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                        <li>
                            <div class= " flex items-center ">                             
                                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <a href="adminprofile" class="font-medium truncate flex items-center text-lg drop-shadow-md"><img src="{{ URL('/picture/'.'users.png') }}"class="mr-5 w-10 h-10 "> {{ Session::get('firstname')." ".Session::get('lastname') }}</a>
                                        <p class="text-gray-500 text-center mt-[-10px]"></p>
                                    </div>
                            </div>
                         </div>
                        @else
                            <li>
                                <button id="btnLogin" type="button" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">เข้าสู่ระบบ</button>
                            </li>
                            <li>
                                <button id="btnRegister" type="button" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">สมัครสมาชิก  </button>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            @yield('Content')
        </div>
        <!-- Modal Register -->
        <div id="modalRegister" class="modal hidden fixed z-[120] pt-[100px] left-0 top-0 w-[100%] h-[100%] overflow-auto max-md:px-[10px]">
            <!-- Modal content -->
                <section>
                    <div class="flex flex-col items-center justify-center ">
                        <div class="w-fit bg-white rounded-lg px-[2em]">
                            <div class="px-7 py-4 md:space-y-6 max-sm:p-8 relative">
                                <!-- ปุ่มกากบาท -->
                                <span id="closeRegister" class=" text-gray-500 text-[30px] font-medium absolute top-0 right-0 mr- hover:text-indigo-600 cursor-pointer">&times;</span>
                                    
                                <form class="space-y-4 mt-0" action="#!" method="post" onsubmit="return false;">
                                    <img src="{{ URL('/picture/'.'register.png') }}" class="h-[10em] mx-auto "/>
                                    <!-- อีเมลล์&รหัสผ่าน -->
                                    <div  class="flex gap-5">
                                        <div>
                                            <label for="username_register" class="block ml-2 text-sm font-medium text-gray-900 ">ชื่อผู้ใช้</label>
                                            <div class="p-2 rounded-xl border flex w-fit bg- bg-gray-100 shadow-md">
                                                <img src="{{ URL('/picture/'.'email.png') }}" class="h-5 mt-[2px]"/>    
                                                <input  id="username_register" class="ml-2  font-light  bg-gray-100 outline-none"  type="email"  placeholder="กรอกชื่อผู้ใช้">   
                                            </div>            
                                        </div>
                                        
                                        <div>
                                            <label for="password_register" class="ml-2 block text-sm font-medium text-gray-900 dark:text-white">รหัสผ่าน</label>
                                            <div class="p-2 rounded-xl border flex w-fit bg-gray-100 shadow-md">
                                                <img src="{{ URL('/picture/'.'lock1.png') }}" class="h-6"/>    
                                                <input id="password_register" class="ml-2 bg-gray-100 outline-none" type="password"  placeholder="••••••••">   
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ชื่อ&นามสกุล -->
                                    <div  class="flex gap-5 ">
                                        <div>
                                            <label for="firstname_register" class="block ml-2 text-sm font-medium text-gray-900 ">ชื่อ</label>
                                            <div class="p-2 rounded-xl border flex w-fit bg-gray-100 shadow-md">
                                                <img src="{{ URL('/picture/'.'user.png') }}" class="h-5"/>    
                                                <input id="firstname_register" class="ml-2 font-light bg-gray-100 outline-none" type="name"  placeholder="กรอกชื่อผู้ใช้">   
                                            </div>            
                                        </div>
                                        
                                        <div>
                                            <label for="lastname_register" class="ml-2 block text-sm font-medium text-gray-900 dark:text-white">นามสกุล</label>
                                            <div class="p-2 rounded-xl border flex w-fit bg-gray-100 shadow-md">
                                                <img src="{{ URL('/picture/'.'detail.png') }}" class="h-6"/>    
                                                <input  id="lastname_register" class="ml-2 font-light bg-gray-100 outline-none" type="last_name" placeholder="กรอกนามสกุล" >   
                                            </div>   
                                                
                                        </div>
                                    </div>
                                    <!-- เบอร์โทร-->
                                    <div  class="flex gap-5">
                                        <div>
                                            <label for="tell_register" class="block ml-2 text-sm font-medium text-gray-900 ">เบอร์โทร</label>
                                            <div class="p-2 rounded-xl border flex w-fit bg-gray-100 shadow-md">
                                                <img src="{{ URL('/picture/'.'tell.png') }}" class="h-5"/>    
                                                <input id="tell_register" type="tel"  class="ml-2 font-light bg-gray-100 outline-none" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="กรอกเบอร์โทร">   
                                            </div>            
                                        </div>
                                        
                                    </div>
                                    <button onClick="SubmitRegister()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">สมัครสมาชิก</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>           
        <!-- Modal Login -->
        <div id="modalLogin" class="modal hidden fixed z-[100] pt-[100px] left-0 top-0 w-[100%] h-[100%] overflow-auto max-md:px-[10px]">
            <section class="flex items-center justify-center">
                    <!-- login container -->
                    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center relative">
                         <!-- ปุ่มกากบาท -->
                         <span id="closeLogin" class=" mr-5 text-gray-500 text-[30px] font-medium absolute top-0 right-0 mr- hover:text-indigo-600 cursor-pointer">&times;</span>
                            <!-- form -->
                        <div class="md:w-1/2 px-5 md:px-16 relative">
                            <img src="{{ URL('/picture/'.'logo login.png') }}" class=" h-[10em] mx-auto"/>
                            <form action="#!" method="post" onsubmit="return false;" class="flex flex-col gap-4">

                                <input id="username_login" class="p-2 rounded-xl border" type="text" placeholder="Email">
                                <div class="relative">
                                <input id="password_login" class="p-2 rounded-xl border w-full" type="password" placeholder="Password">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                                </div>

                                <button onClick="LoginVerify()" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
                            </form>

                            <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                                <hr class="border-gray-400">
                                <p class="text-center text-sm"></p>
                                <hr class="border-gray-400">
                            </div>

                

                            <div class="mt-5 text-xs border-b border-[#002D74] py-4 text-[#002D74]">
                                <a href="#">Forgot your password?</a>
                            </div>

                            <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                                <p>Don't have an account?</p>
                                <button id="modalBtnRegister" class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Register</button>
                            </div>
                        </div>
                    
                        <!-- image -->
                        <div class="md:block hidden w-1/2">
                            <img src="{{ URL('/picture/'.'login p.png') }}"/>
                        </div>  
                       
                    </div>
            </section>
        </div>

        @yield('script')
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script>
            const currentRoute = '@php echo $currentRoute; @endphp';
            console.log(currentRoute);

            $(document).ready(function () {
                // Modal Login
                $('#btnLogin').on('click', function () {
                    $("#modalLogin").css("display","block");
                });
                $('#closeLogin').on('click', function () {
                    var modal = document.getElementById("modalLogin");
                    modal.classList.add("fade-out-modal");

                    setTimeout(function() {
                        modal.style.display = "none";
                        modal.classList.remove("fade-out-modal");
                    }, 500);
                });

                // Modal Register
                $('#btnRegister').on('click', function () {
                    $("#modalRegister").css("display","block");
                });
                $('#closeRegister').on('click', function () {
                    var modal = document.getElementById("modalRegister");
                    modal.classList.add("fade-out-modal");

                    setTimeout(function() {
                        modal.style.display = "none";
                        modal.classList.remove("fade-out-modal");
                    }, 500);
                });

                // Swap Modal from Login to Register
                $('#modalBtnRegister').on('click', function () {
                    $("#modalLogin").css("display","none");
                    $("#modalRegister").css("display","block");
                });
                // Swap Modal from Register to Login
                $('#modalBtnLogin').on('click', function () {
                    $("#modalRegister").css("display","none");
                    $("#modalLogin").css("display","block");
                });
            });

            function LoginVerify() {
                fetch("{{ Route('LoginVerify') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            username: document.getElementById("username_login").value,
                            password: document.getElementById("password_login").value
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
                            title: 'เข้าสู่ระบบไม่สำเร็จ!',
                            html: `${data.status}`,
                            confirmButtonText: 'ตกลง',
                        })

                        const error = (data && data.errorMessage) || "{{trans('general.warning.system_failed')}}" + " (CODE:"+response.status+")";
                        return Promise.reject(error);
                    }

                    Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'เข้าสู่ระบบสำเร็จ',
                            confirmButtonText: 'ตกลง',
                            timer: 1000,
                            timerProgressBar: true
                    }).then((result) => {
                        if(data.role === 3) {
                            location.href="{{ Route('adminhome') }}";
                        } else {
                            location.reload();
                        }
                    })
                })
                .catch((er) => {
                    console.log('Error' + er);
                });

            }

            function SubmitRegister() {
                fetch("{{ Route('SubmitRegister') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-Token": "{{ csrf_token() }}"
                    },
                    body:JSON.stringify(
                        {
                            username: document.getElementById("username_register").value,
                            password: document.getElementById("password_register").value,
                            firstname: document.getElementById("firstname_register").value,
                            lastname: document.getElementById("lastname_register").value,
                            tell: document.getElementById("tell_register").value,
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
                            title: 'เพิ่มบัญชีสำเร็จ',
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
    </body>
</html>