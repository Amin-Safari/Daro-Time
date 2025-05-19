@extends('layouts.master')
@section('name')
    @include('layouts.header')
    <br><br><br><br>
    <div class="container">
        <!-- دکمه افزودن دارو -->
        <div class="text-center mb-4">
            <br>
            <button id="add-drug-btn" class="btn btn-primary btn-lg ps-5 pe-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-prescription2" viewBox="0 0 16 16">
                    <path d="M7 6h2v2h2v2H9v2H7v-2H5V8h2z"/>
                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4zM3 3h10V1H3z"/>
                  </svg>
                افزودن داروی جدید
            </button>
        </div>

        <!-- داروهای در جریان -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">داروهای در جریان</h5>
            </div>
            <div class="card-body">
                <div id="active-drugs-container" class="row">
                    <!-- داروهای فعال اینجا لود می‌شوند -->
                </div>
            </div>
        </div>

        <!-- داروهای تمام شده -->
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">داروهای تمام شده</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>نام دارو</th>
                                <th>تعداد دوز</th>
                                <th>هر چند ساعت</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ اتمام</th>
                            </tr>
                        </thead>
                        <tbody id="completed-drugs-table">
                            @foreach ($completedDrugs as $completedDrug)
                                <tr>
                                    <td>{{ $completedDrug->name }}</td>
                                    <td>{{ $completedDrug->dosage }}</td>
                                    <td>{{ $completedDrug->frequency }}</td>
                                    <td>{{ \Carbon\Carbon::parse($completedDrug->start_date)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($completedDrug->last_reminder)->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- فرم افزودن دارو -->
        <div id="drug-form-container" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">افزودن داروی جدید</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="drug-form" action="{{ route('add-medicine') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">نام دارو</label>
                                <input type="text" name="medicine_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">تعداد دوز</label>
                                <input type="number" name="dosage" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">هر چند ساعت</label>
                                <input type="number" name="frequency" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">تاریخ شروع</label>
                                <input type="date" name="start_date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ساعت شروع</label>
                                <input type="time" name="start_time" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">نوع یادآوری</label>
                                <select name="reminder_type" class="form-select" required>
                                    <option value="email">ایمیل</option>
                                    <option value="sms">پیامک</option>
                                    <option value="notification">اعلان</option>
                                </select>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                                <button type="submit" class="btn btn-primary">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- مودال جزئیات دارو -->
        <div id="drug-details-modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">جزئیات دارو</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="update-drug-form">
                            @csrf
                            <input type="hidden" name="drug_id" id="update-drug-id">
                            <div class="mb-3">
                                <label class="form-label">نام دارو</label>
                                <input type="text" name="medicine_name" id="update-medicine-name" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">تعداد دوز باقی‌مانده</label>
                                <input type="number" name="remaining_dose" id="update-remaining-dose" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">هر چند ساعت</label>
                                <input type="number" name="frequency" id="update-frequency" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">نوع یادآوری</label>
                                <select name="reminder_type" id="update-reminder-type" class="form-select" required>
                                    <option value="email">ایمیل</option>
                                    <option value="sms">پیامک</option>
                                    <option value="notification">اعلان</option>
                                </select>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-danger" id="delete-drug-btn">حذف دارو</button>
                                <button type="submit" class="btn btn-primary">بروزرسانی</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- نوتیفیکیشن -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3"></div>
    </div>

    <!-- صداهای اعلان -->
    <audio id="notification-sound" src="/sounds/notification.mp3" preload="auto"></audio>

    <!-- Chart.js -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            let drugCharts = {};
            let notificationCheckInterval;

            // نمایش مودال با انیمیشن
            $('#add-drug-btn').click(function() {
                $('#drug-form-container').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#drug-form-container').modal('show');
            });

            // ارسال فرم با Ajax
            $('#drug-form').submit(function(event) {
                event.preventDefault();
                const $form = $(this);
                const $submitBtn = $form.find('button[type="submit"]');

                $submitBtn.prop('disabled', true)
                    .html('<span class="spinner-border spinner-border-sm"></span> در حال ارسال...');

                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: $form.serialize(),
                    success: function(response) {
                        $('#drug-form-container').modal('hide');
                        $form[0].reset();
                        loadActiveDrugs();
                        showToast('success', 'دارو با موفقیت اضافه شد');
                    },
                    error: function(xhr) {
                        showToast('error', 'خطا در ثبت دارو');
                    },
                    complete: function() {
                        $submitBtn.prop('disabled', false).html('ذخیره');
                    }
                });
            });

            // نمایش نوتیفیکیشن
            function showToast(type, message) {
                const toast = `
                    <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert">
                        <div class="d-flex">
                            <div class="toast-body">${message}</div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                `;
                $('.toast-container').append(toast);
                $('.toast').toast('show');
            }

            // بارگذاری داروهای فعال
            function loadActiveDrugs() {
                $.ajax({
                    url: '/active-drugs',
                    method: 'GET',
                    success: function(data) {
                        const container = $('#active-drugs-container');
                        container.empty();

                        data.forEach(function(drug) {
                            if (drug.remaining_dose > 0) {
                                const remainingMinutes = calculateRemainingTime(drug);
                                container.append(createDrugCard(drug, remainingMinutes));
                                createCircularChart(drug.id, remainingMinutes, drug.frequency *
                                    60);
                            }
                        });

                        checkNotifications(data);
                    },
                    error: function(xhr) {
                        showToast('error', 'خطا در بارگذاری داروها');
                    }
                });
            }

            function calculateRemainingTime(drug) {
                const currentTime = new Date();
                const lastReminderTime = new Date(drug.last_reminder);
                const frequency = drug.frequency;
                const nextReminderTime = new Date(lastReminderTime.getTime() + frequency * 60 * 1000);
                return Math.max(Math.floor((nextReminderTime - currentTime) / 1000 / 60), 0);
            }

            function createDrugCard(drug, remainingMinutes) {
                const totalMinutes = drug.frequency * 60;
                const percentage = (remainingMinutes / totalMinutes) * 100;

                return `
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 drug-card" data-drug-id="${drug.id}" style="cursor: pointer;">
                            <div class="card-body">
                                <h5 class="card-title">${drug.name} <span class="badge bg-primary">${drug.remaining_dose} دوز باقی‌مانده</span></h5>
                                <div class="text-center">
                                    <canvas id="chart-${drug.id}" width="50" height="50"></canvas>
                                </div>
                                <p class="card-text text-center mt-2">
                                    <i class="bi bi-clock"></i>
                                    ${remainingMinutes} دقیقه تا دوز بعدی
                                </p>
                            </div>
                        </div>
                    </div>
                `;
            }

            // ایجاد نمودار دایره‌ای برای هر دارو
            function createCircularChart(drugId, remainingMinutes, totalMinutes) {
                if (drugCharts[drugId]) {
                    drugCharts[drugId].destroy();
                }

                const ctx = document.getElementById(`chart-${drugId}`).getContext('2d');
                drugCharts[drugId] = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [remainingMinutes, totalMinutes - remainingMinutes],
                            backgroundColor: ['#4CAF50', '#E0E0E0'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        cutout: '70%',
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }

            // نمایش جزئیات دارو
            $(document).on('click', '.drug-card', function() {
                const drugId = $(this).data('drug-id');
                $.ajax({
                    url: `/drug/${drugId}`,
                    method: 'GET',
                    success: function(drug) {
                        $('#update-drug-id').val(drug.id);
                        $('#update-medicine-name').val(drug.name);
                        $('#update-remaining-dose').val(drug.remaining_dose);
                        $('#update-frequency').val(drug.frequency);
                        $('#update-reminder-type').val(drug.reminder_type);

                        $('#drug-details-modal').modal('show');
                    },
                    error: function() {
                        showToast('error', 'خطا در دریافت اطلاعات دارو');
                    }
                });
            });

            // بروزرسانی دارو
            $('#update-drug-form').submit(function(event) {
                event.preventDefault();
                const drugId = $('#update-drug-id').val();

                $.ajax({
                    url: `/drug/${drugId}`,
                    method: 'PUT',
                    data: $(this).serialize(),
                    success: function() {
                        $('#drug-details-modal').modal('hide');
                        loadActiveDrugs();
                        showToast('success', 'اطلاعات دارو با موفقیت بروزرسانی شد');
                    },
                    error: function() {
                        showToast('error', 'خطا در بروزرسانی اطلاعات دارو');
                    }
                });
            });

            // حذف دارو
            $('#delete-drug-btn').click(function() {
                if (confirm('آیا از حذف این دارو اطمینان دارید؟')) {
                    const drugId = $('#update-drug-id').val();

                    $.ajax({
                        url: `/drug/${drugId}`,
                        method: 'DELETE',
                        success: function() {
                            $('#drug-details-modal').modal('hide');
                            loadActiveDrugs();
                            showToast('success', 'دارو با موفقیت حذف شد');
                        },
                        error: function() {
                            showToast('error', 'خطا در حذف دارو');
                        }
                    });
                }
            });

            // بررسی اعلان‌ها
            function checkNotifications(drugs) {
                drugs.forEach(function(drug) {
                    const remainingMinutes = calculateRemainingTime(drug);
                    if (remainingMinutes === 0) {
                        showDrugNotification(drug);
                    }
                });
            }

            function showDrugNotification(drug) {
                // پخش صدای اعلان
                const audio = document.getElementById('notification-sound');
                audio.play();

                // نمایش نوتیفیکیشن
                const notification = new Notification('یادآوری مصرف دارو', {
                    body: `زمان مصرف داروی ${drug.name} فرا رسیده است.`,
                    icon: '/images/notification-icon.png'
                });

                // ارسال یادآوری
                $.ajax({
                    url: '/send-reminder',
                    method: 'POST',
                    data: {
                        drug_id: drug.id,
                        reminder_type: drug.reminder_type
                    },
                    success: function() {
                        loadActiveDrugs();
                    }
                });
            }

            // درخواست مجوز نوتیفیکیشن
            if (Notification.permission !== 'granted') {
                Notification.requestPermission();
            }

            // بارگذاری اولیه و به‌روزرسانی دوره‌ای
            loadActiveDrugs();
            setInterval(loadActiveDrugs, 60000);
        });
    </script>
@endsection
