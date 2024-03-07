<title>Admin |รายงาน</title>

@extends('components/Layoutadmin')

@section('Content')
        <div class="relative h-screen">         
            <div class="border border-gray-300 relative mt-4 flex items-center py-3">    
                <div class= " flex mx-auto text-xl">
                    <span>รายงาน</span>
                </div>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="mr-[3em] text-dark bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">รายงานประจำวัน <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="monthreport" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">รายงานประจำเดือน</a>
                        </li>
                        <li>
                            <a href="yearreport" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">รายงานประจำปี</a>
                        </li>
                    </ul>
                </div>
            </div>  

            @if(sizeof($reserve) && sizeof($payshower))
                <div class="flex flex-wrap ml-[10em] gap-10 mt-5">
                    <!-- ส่วนของจำนวนครั้ง -->
                    <div class="border p-14 py-2 w-fit rounded-xl shadow-md bg-gray-100 hover:bg-gray-200 hover:shadow-lg transition duration-500 ">
                        <i class="fi fi-rr-sort-amount-up-alt text-3xl items-center flex justify-center"></i>
                        <p class="mt-2 text-gray-700">จำนวนครั้ง</p>
                        @php
                            $totalReservations = sizeof($reserve) + sizeof($payshower); // รวมจำนวนการฝากเลี้ยงและการอาบน้ำและตัดขน
                        @endphp
                        <p class="font-bold text-gray-900">{{ $totalReservations }}</p>
                    </div>
                    <!-- ส่วนของรายได้สุทธิ -->
                    <div class="border p-14 py-2 w-fit rounded-xl shadow-md bg-gray-100 hover:bg-gray-200 hover:shadow-lg transition duration-500 ">
                        <i class="fi fi-rr-piggy-bank text-3xl items-center flex justify-center"></i>
                        <p class="mt-2 text-gray-700">รายได้สุทธิ</p>
                        @php
                            $totalDepositBoarding = 0; // กำหนดค่าเริ่มต้นของผลรวมการฝากเลี้ยง
                            $totalDepositGrooming = 0; // กำหนดค่าเริ่มต้นของผลรวมการอาบน้ำและตัดขน
                            // คำนวณผลรวมของการฝากเลี้ยง
                            foreach($reserve as $item) {
                                $totalDepositBoarding += $item->r_total;
                            }
                            // คำนวณผลรวมของการอาบน้ำและตัดขน
                            foreach($payshower as $item) {
                                $totalDepositGrooming += $item->shower_total;
                            }
                            // คำนวณรายได้สุทธิโดยรวม
                            $totalRevenue = $totalDepositBoarding + $totalDepositGrooming;
                        @endphp
                        <p class="font-bold text-gray-900">${{ $totalRevenue }}</p>
                    </div>
                </div>
            @endif
            <!-- add_cat -->
            <div class="hidden flex items-center gap-5 mx-auto justify-center mt-[5em] flex-wrap">
                <!-- ส่วนของรายได้สุทธิ์ฝากเลี้ยง -->
                <div class="relative rounded-lg border w-fit h-fit shadow-lg p-3">
                    <div class="flex items-center">
                        <img src="{{ URL('/picture/'.'report.png') }}" alt="" class="ml-5 mr-2 w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                        <p class="font-semibold">รายงานประจำวัน - ฝากเลี้ยง</p>
                    </div>
                    @if(sizeof($reserve))
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            วันที่ใช้บริการ
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ชื่อ
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            ฝากเลี้ยง (บาท)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalDepositBoarding = 0; // กำหนดค่าเริ่มต้นของผลรวมเป็น 0
                                @endphp

                                @foreach($reserve as $item)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            {{ $item->r_start_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->firstname }}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            {{ $item->r_total }}
                                        </td>
                                        @php
                                        $totalDepositBoarding += $item->r_total; // เพิ่มค่ารายการในผลรวม
                                        @endphp
                                    </tr>
                                @endforeach

                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        รวมทั้งหมด
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{ $totalDepositBoarding }}
                                    </td>
                                </tr>
                    
                                </tbody>
                            </table>
                        </div>
                    @endif                                   
                </div>

                <!-- ส่วนของรายได้สุทธิ์อาบน้ำตัดขน -->
                <div class="relative rounded-lg border w-fit h-fit shadow-lg p-3">
                    <div class="flex items-center">
                        <img src="{{ URL('/picture/'.'report.png') }}" alt="" class="ml-5 mr-2 w-[40px] h-[40px] mb-[3px] mt-[3px] " alt="logo"/> 
                        <p class="font-semibold">รายงานประจำวัน - อาบน้ำและตัดขน</p>
                    </div>
                    @if(sizeof($payshower))
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            วันที่ใช้บริการ
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ชื่อ
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            อาบน้ำและตัดขน (บาท)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalDepositGrooming = 0; // กำหนดค่าเริ่มต้นของผลรวมเป็น 0
                                @endphp

                                @foreach($payshower as $item)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $item->shower_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                    {{ $item->firstname }}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    {{ $item->shower_total }}
                                    </td>      
                                    @php
                                        $totalDepositGrooming += $item->shower_total; // เพิ่มค่ารายการในผลรวม
                                    @endphp                        
                                </tr>
                                @endforeach   
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        รวมทั้งหมด
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{ $totalDepositGrooming }}
                                    </td>
                                </tr>                    
                                </tbody>
                            </table>
                        </div>
                    @endif                                          
                </div>
            </div>
            <canvas id="myChart" width="50" height="50" class="ml-[25em]"></canvas>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                });
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                        data: {
                            labels: ['จำนวนครั้ง', 'รายได้สุทธิ', 'รายได้สุทธิ - ฝากเลี้ยง', 'รายได้สุทธิ - อาบน้ำและตัดขน'],
                            datasets: [{
                                label: 'รายได้',
                                data: [
                                    {{ $totalReservations }}, // จำนวนครั้ง
                                    {{ $totalRevenue }}, // รายได้สุทธิ
                                    {{ $totalDepositBoarding }}, // รายได้สุทธิ - ฝากเลี้ยง
                                    {{ $totalDepositGrooming }} // รายได้สุทธิ - อาบน้ำและตัดขน
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'center' // กำหนดตำแหน่งของแท่งสี
                                },
                                title: {
                                    display: true,
                                    text: 'กราฟรายงาน 7 วันย้อนหลัง', // กำหนดชื่อของกราฟ
                                    position: 'top' // กำหนดตำแหน่งของชื่อกราฟ
                                }
                            }
                        }
                    });
            </script>
 @endsection