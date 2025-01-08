{{-- @extends('layouts.admins')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('booking-chart').getContext('2d');
var bookingChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        datasets: [{
            label: 'Jumlah Booking',
            data: [20, 15, 25, 18, 30, 22, 10],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Tren Booking Harian'
            }
        }
    }
});

</script>
@section('content-admin')
<div class="container">
        <div class="row justify-content-center">
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 col-xl-6 grid-margin stretch-card">
                    <div class="row w-100 flex-grow">
                        <div class="col-md-12 grid-margin stretch-card">
                        </div>
                    </div>
                    </div>
                </div>
                <!-- row end -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                <footer class="footer">
                <div class="card">
                    <div class="card-body">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
                    </div>
                    </div>
                </div>
                </footer>
                <!-- partial -->
            </div>
        </div>
</div>
@endsection --}}
