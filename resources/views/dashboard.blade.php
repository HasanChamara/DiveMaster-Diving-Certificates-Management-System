<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dive Master | Dashboard </title>
   @vite(['resources/css/dm-dashboard.css'])
   @vite(['resources/css/dm-tables.css'])
   @vite(['resources/css/dm-main.css'])
   @vite(['resources/js/scripts/dm-dashboard-chart.js'])
   @vite(['resources/js/scripts/dashboard-table.js'])
   <!-- Swiper.js CDN -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      crossorigin="anonymous" />


   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
   <link rel="icon" type="image/x-icon" href="/imgs/DiveMaster-Fav.png">

</head>

<body>
   <div class="trp-mx-w trp-main-wrapper">
      <aside class="trp-left-col trp-sidebar">
         <img class="mb-4" src="{{ asset('imgs/dive-master-logo-white.png') }}" width="120" alt="" />
         <ul class="trp-sidebar-links">
                <li class="active">
                    <a href="/dashboard">
                        <span><img src="{{ asset('imgs/dm-dashboard.png') }}" width="24" height="24" alt="" /></span>
                        Dashboard
                    </a>
                </li>
                @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))
                    <li>
                        <a href="/bookings">
                            <span><img src="{{ asset('imgs/dm-bookings.png') }}" width="24" height="24" alt="" /></span>
                            Booking Requests
                        </a>
                    </li>
                @endif

                @if(in_array(Auth::user()->role, ['Instructor']))
                    <li>
                        <a href="/instructor-bookings">
                            <span><img src="{{ asset('imgs/dive-logs.png') }}" width="24" height="24" alt="" /></span>
                            Assigned Bookings
                        </a>
                    </li>
                @endif

                @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))
                    <li>
                        <a href="#">
                            <span><img src="{{ asset('imgs/dm-office.png') }}" width="24" height="24" alt="" /></span>
                            Certifications
                        </a>
                    </li>
                @endif

                @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))

                    <li>
                        <a href="#">
                            <span><img src="{{ asset('imgs/exam.svg') }}" width="24" height="24" alt="" /></span>
                            Assignments
                        </a>
                    </li>
                @endif
                @if(in_array(Auth::user()->role, ['Admin', 'Instructor']))
                    <li>

                        <a href="/manage-dive-logs">
                            <span><img src="{{ asset('imgs/dive-logs.png') }}" width="24" height="24" alt="" /></span>
                            Dive Logs
                        </a>
                    </li>
                @endif
                
                @if(Auth::user()->role === 'Admin')
                    <li>
                        <a href="#">
                            <span><img src="{{ asset('imgs/dm-equipments.png') }}" width="24" height="24" alt="" /></span>
                            Equipments Management
                        </a>
                    </li>
                @endif
                @if(Auth::user()->role === 'Admin')
                    <li>
                        <a href="/admin/users">
                            <span><img src="{{ asset('imgs/users.png') }}" width="24" height="24" alt="" /></span>
                            Users
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('profile.edit') }}">
                        <span><img src="{{ asset('imgs/dm-cogwheel.png') }}" width="24" height="24" alt="" /></span>
                        Settings
                    </a>
                </li>
            </ul>

         <div class="trp-sidebar-bottom">
            <div class="trp-sidebar-bottom__info">
               <!-- <img class="trp-sidebar-bottom__info__user" src="{{ asset('imgs/Avatar.svg') }}" alt="" />
               <div>
                  <h5>{{ auth()->user()->name }}</h5>
                  <h6>{{ auth()->user()->email }}</h6>
               </div> -->
               <a href="{{ route('profile.edit') }}" style="text-decoration: none; color: inherit;">
                  <div style="display: flex; align-items: center;">
                     <img class="trp-sidebar-bottom__info__user" src="{{ asset(path: 'imgs/diver.png') }}"
                        style="width: 40px;" width="40" alt="" />
                     <div style="margin-left: 10px;">
                        <h5>{{ auth()->user()->name }}</h5>
                        <h6>{{ auth()->user()->email }}</h6>
                     </div>
                  </div>
               </a>
               <a href="/logout">
                  <img class="trp-sidebar-bottom__info__user__logout" src="{{ asset('imgs/user-logout.svg') }}"
                     alt="" />
               </a>
            </div>
         </div>
      </aside>
      <div class="trp-right-col trp-container" style="max-height: 100vh; overflow: auto;">
         <div class="trp-right-col-top">
            <div class="trp-col left" style="margin-bottom: 24px;">
               <h2>Welcome, {{ auth()->user()->name }}</h2>
               <!-- <p><a href="/logout">Logout</a></p> -->
            </div>

            <div class="trp-section trp-chart-container d-flex  justify-content-between" style="margin-bottom: 40px;">
               <div class="trp-pie-chart-container chart-wrapper" style="width: 360px;">
                  <div class="trp-chart-inner">
                     <div class="trp-chart-header d-flex align-items-center justify-content-between">
                        <h3 class="trp-h3 monthly-sale">Monthly Dives</h3>
                        <p class="trp-p monthly-sale-month" id="SaleMonth">February</p>
                     </div>
                     <div class="trp-total-sales">
                        <p class="trp-p trp-total-sales-count">Total Dives -<span id="trpTotalSales"> 48</span></p>
                        <h3 class="trp-h3 trp-total-profit">Rs 2,400,206.20</h3>
                     </div>
                     <div class="trp-chart-canvas" style="height: 210px; position: relative; margin-bottom: 20px;">
                        <canvas id="trpMonthlySalesChart"></canvas>
                     </div>
                     <div class="trp-monthly-sales-info-grid">
                        <div class="row">
                           <div class="col trp-cell">
                              <h5 id="trpSalesMethod">Scuba </h5>
                              <p id="trpSalesCount">500,000.00</p>
                           </div>
                           <div class="col trp-cell">
                              <h5 id="trpSalesMethod">Open Dive</h5>
                              <p id="trpSalesCount">500,000.00</p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col trp-cell">
                              <h5 id="trpSalesMethod">Snorkling </h5>
                              <p id="trpSalesCount">500,000.00</p>
                           </div>
                           <div class="col trp-cell">
                              <h5 id="trpSalesMethod">Training</h5>
                              <p id="trpSalesCount">500,000.00</p>
                           </div>
                        </div>

                     </div>
                  </div>

               </div>
               <div class="trp-bar-chart-container chart-wrapper" style="width: 100%;">
                  <div class="trp-chart-inner weekly-sale-chart-inner" style="position: relative;">
                     <div class="trp-chart-header d-flex align-items-center justify-content-between"
                        style="margin-bottom: 16px; position: relative;">
                        <h3 class="trp-h3 weekly-sale">Weekly Dives Report</h3>
                        <p class="trp-p weekly-sale-week" id="selectWeek">01 Mar 2025 -07 Mar 2025 </p>
                     </div>
                     <div class="trp-chart-canvas" style="height: 400px; position: relative; padding-top: 16px;">
                        <canvas id="trpWeeklyChart"></canvas>
                     </div>
                     <div class="trp-weekly-same-floating-card">
                        <div class="trp-total-sales">
                           <p class="trp-p trp-total-weekly-sales-count">Total Dives -<span id="trpTotalSales">
                                 12</span></p>
                        </div>
                        <div class="trp-monthly-sales-info-grid">
                           <div class="row">
                              <div class="col trp-cell">
                                 <h5 id="trpSalesMethod">Scuba</h5>
                                 <p id="trpSalesCount">3</p>
                              </div>
                              <div class="col trp-cell">
                                 <h5 id="trpSalesMethod">Open Dive</h5>
                                 <p id="trpSalesCount">5</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col trp-cell">
                                 <h5 id="trpSalesMethod">Snorkling</h5>
                                 <p id="trpSalesCount">5</p>
                              </div>
                              <div class="col trp-cell">
                                 <h5 id="trpSalesMethod">Training</h5>
                                 <p id="trpSalesCount">1</p>
                              </div>
                           </div>

                        </div>
                     </div>


                  </div>
               </div>
            </div>

            <h4 class="dashboard-table-heading" style="padding-bottom: 12px;">Upcoming Bookings</h4>

            <div class="trp-section trp-cus-mgmnt trp-table-container">
               <table class="table trp-table" id="trDataTableBestSelling">
                  <thead>
                     <tr>
                        <th>Customer Name</th>
                        <th>Activity</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Head Count</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Instructor</th>
                        <th>Payment Status</th>
                        <th colspan="2">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <script>
                        for (let i = 1; i <= 10; i++) {
                           const showSpan = Math.random() < 0.5; // 50% chance to show the <span>
                           const details = `Month Rent${showSpan ? ' <span class="trp-table-span"> RC</span>' : ''}`;

                           document.write(`<tr>
                                  <td>Alex Carder ${i}</td>
                                  <td>Scuba Dive</td>
                                  <td>Hikkaduwa</td>
                                  <td>2025/06/15</td>
                                  <td>3</td>
                                  <td>john@mail.com</td>
                                  <td>+91134568896</td>
                                  <td>Dayan Gamage</td>
                                  <td>Advance Paid</td>
                                  <td><button class="btn"><img src="{{ asset('imgs/edit-icon.svg') }}" /></button></td>
                                 <td><button class="btn"><img src="{{ asset('imgs/delete-icon.svg') }}" /></button></td>
                              </tr>`);
                        }
                     </script>
                  </tbody>
               </table>

               <nav class="trp-table-pagination-container">
                  <ul class="pagination d-flex align-items-center justify-content-between m-0 " id="paginationB2C">
                     <div class="trp-prev-arrow">
                        <li class="page-item"><a class="page-link trp-previous" href="#"
                              id="trBestSelling_prev">Previous</a></li>
                     </div>
                     <div class="trp-page-numbers trBestSelling d-flex"></div>
                     <div class="trp-next-arrow">
                        <li class="page-item"><a class="page-link trp-next" href="#" id="trBestSelling_next">Next</a>
                        </li>
                     </div>
                  </ul>
               </nav>
            </div>
         </div>



         <div class="trp-right-col-bottom">
            <p>© 2025, Dive Master. All Rights Reserved.</p>
         </div>
      </div>
   </div>

   <!-- scripts start -->
   <script type="module" src="./dashboard.js"></script>
   <script type="module" src="./detailed_dashboard.js"></script>
   <script type="module" src="./trp-table-script.js"></script>
   <script type="module" src="./customer-management.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

   <!-- scripts end -->
</body>

</html>