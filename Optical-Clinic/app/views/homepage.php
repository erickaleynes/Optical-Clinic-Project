<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optical Clinic Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid p-4">
        <h1 class="h4 mb-4">Optical Clinic Dashboard</h1>
        
        <div class="row">
            <!-- Metrics Cards -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event h3 text-primary mb-3"></i>
                        <h5 class="card-title">Appointments</h5>
                        <p class="fs-4 mb-1"><?= $appointments_count ?? 0; ?></p>
                        <small class="text-muted">Scheduled this week</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-file-earmark-text h3 text-success mb-3"></i>
                        <h5 class="card-title">Prescriptions</h5>
                        <p class="fs-4 mb-1"><?= $prescriptions_count ?? 0; ?></p>
                        <small class="text-muted">Issued this month</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-eyeglasses h3 text-warning mb-3"></i>
                        <h5 class="card-title">Frames in Stock</h5>
                        <p class="fs-4 mb-1"><?= $frames_count ?? 0; ?></p>
                        <small class="text-muted">Available inventory</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-people h3 text-danger mb-3"></i>
                        <h5 class="card-title">Active Patients</h5>
                        <p class="fs-4 mb-1"><?= $patients_count ?? 0; ?></p>
                        <small class="text-muted">Registered in the system</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Quick Actions</h5>
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('Optical/appointments'); ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> New Appointment
                            </a>
                            <a href="<?= site_url('prescriptions/create'); ?>" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> New Prescription
                            </a>
                            <a href="<?= site_url('frames/add'); ?>" class="btn btn-warning">
                                <i class="bi bi-plus-circle"></i> Add Frames
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Summary</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Upcoming Appointments
                                <span class="badge bg-primary rounded-pill"><?= $upcoming_appointments ?? 0; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Recent Prescriptions
                                <span class="badge bg-success rounded-pill"><?= $recent_prescriptions ?? 0; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Low Stock Frames
                                <span class="badge bg-danger rounded-pill"><?= $low_stock_frames ?? 0; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
