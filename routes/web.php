<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', [GeneralController::class, 'landing'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');

    // Route::get('/forgot-password', function () {
    //     return view('auth.forgot-password');
    // })->name('password.request');

    // Route::get('/reset-password/{token}', function ($token) {
    //     return view('auth.reset-password', ['token' => $token]);
    // })->name('password.reset');
});
/* buka ini per rute beres

// Authenticated Routes (All user types)
Route::group(['middleware' => ['auth', 'verified']], function () {

    // Logout (available to all authenticated users)

    // Common Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');

    // ==========================================================================
    // SUPER ADMIN ROUTES (Level 1 - Highest Authority)
    // ==========================================================================
    Route::group(['prefix' => 'superadmin', 'middleware' => ['role:superadmin'], 'as' => 'superadmin.'], function () {

        // Dashboard
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');

        // System Management
        Route::resource('admins', SuperAdminController::class . '@adminCrud');
        Route::resource('hospitals', SuperAdminController::class . '@hospitalCrud');

        // Global System Settings
        Route::get('/system-settings', [SuperAdminController::class, 'systemSettings'])->name('system.settings');
        Route::put('/system-settings', [SuperAdminController::class, 'updateSystemSettings'])->name('system.settings.update');

        // Platform Analytics
        Route::get('/analytics', [SuperAdminController::class, 'analytics'])->name('analytics');
        Route::get('/reports/global', [ReportController::class, 'globalReports'])->name('reports.global');

        // License Management
        Route::get('/licenses', [SuperAdminController::class, 'licenses'])->name('licenses');
        Route::post('/licenses/{hospital}/activate', [SuperAdminController::class, 'activateLicense'])->name('licenses.activate');
        Route::post('/licenses/{hospital}/suspend', [SuperAdminController::class, 'suspendLicense'])->name('licenses.suspend');

        // Audit Logs
        Route::get('/audit-logs', [SuperAdminController::class, 'auditLogs'])->name('audit.logs');

        // Backup & Maintenance
        Route::get('/maintenance', [SuperAdminController::class, 'maintenance'])->name('maintenance');
        Route::post('/backup', [SuperAdminController::class, 'createBackup'])->name('backup.create');
    });

    // ==========================================================================
    // ADMIN ROUTES (Level 2 - System Administration)
    // ==========================================================================
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin'], 'as' => 'admin.'], function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Hospital Management
        Route::resource('hospitals', AdminController::class . '@hospitalManagement');
        Route::post('/hospitals/{hospital}/approve', [AdminController::class, 'approveHospital'])->name('hospitals.approve');
        Route::post('/hospitals/{hospital}/reject', [AdminController::class, 'rejectHospital'])->name('hospitals.reject');

        // User Management (Hospital staff)
        Route::resource('users', UserController::class);
        Route::post('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::post('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

        // System Reports
        Route::get('/reports', [ReportController::class, 'adminReports'])->name('reports');
        Route::get('/reports/hospitals', [ReportController::class, 'hospitalReports'])->name('reports.hospitals');
        Route::get('/reports/users', [ReportController::class, 'userReports'])->name('reports.users');

        // Configuration Management
        Route::get('/configurations', [AdminController::class, 'configurations'])->name('configurations');
        Route::put('/configurations', [AdminController::class, 'updateConfigurations'])->name('configurations.update');

        // Support Management
        Route::get('/support-tickets', [AdminController::class, 'supportTickets'])->name('support.tickets');
        Route::put('/support-tickets/{ticket}', [AdminController::class, 'updateTicket'])->name('support.tickets.update');
    });

    // ==========================================================================
    // HOSPITAL ROUTES (Level 3 - Hospital Management)
    // ==========================================================================
    Route::group(['prefix' => 'hospital', 'middleware' => ['role:hospital'], 'as' => 'hospital.'], function () {

        // Dashboard
        Route::get('/dashboard', [HospitalController::class, 'dashboard'])->name('dashboard');

        // Department Management
        Route::resource('departments', HospitalController::class . '@departmentManagement');

        // Doctor Management
        Route::resource('doctors', HospitalController::class . '@doctorManagement');
        Route::post('/doctors/{doctor}/approve', [HospitalController::class, 'approveDoctor'])->name('doctors.approve');
        Route::post('/doctors/{doctor}/suspend', [HospitalController::class, 'suspendDoctor'])->name('doctors.suspend');

        // Staff Management
        Route::resource('staff', HospitalController::class . '@staffManagement');

        // Patient Management (Hospital View)
        Route::get('/patients', [HospitalController::class, 'patients'])->name('patients.index');
        Route::get('/patients/{patient}', [HospitalController::class, 'showPatient'])->name('patients.show');
        Route::put('/patients/{patient}/status', [HospitalController::class, 'updatePatientStatus'])->name('patients.status');

        // Inventory Management
        Route::resource('inventory', InventoryController::class);
        Route::post('/inventory/{item}/reorder', [InventoryController::class, 'reorder'])->name('inventory.reorder');

        // Appointment Management (Hospital Overview)
        Route::get('/appointments', [HospitalController::class, 'appointments'])->name('appointments.index');
        Route::get('/appointments/calendar', [HospitalController::class, 'appointmentCalendar'])->name('appointments.calendar');

        // Hospital Reports
        Route::get('/reports', [ReportController::class, 'hospitalReports'])->name('reports');
        Route::get('/reports/revenue', [ReportController::class, 'revenueReports'])->name('reports.revenue');
        Route::get('/reports/patients', [ReportController::class, 'patientReports'])->name('reports.patients');
        Route::get('/reports/doctors', [ReportController::class, 'doctorReports'])->name('reports.doctors');

        // Hospital Settings
        Route::get('/settings', [HospitalController::class, 'settings'])->name('settings');
        Route::put('/settings', [HospitalController::class, 'updateSettings'])->name('settings.update');

        // Billing Management
        Route::resource('billing', HospitalController::class . '@billingManagement');
        Route::post('/billing/{bill}/send', [HospitalController::class, 'sendBill'])->name('billing.send');
    });

    // ==========================================================================
    // DOCTOR ROUTES (Level 4 - Medical Professional)
    // ==========================================================================
    Route::group(['prefix' => 'doctor', 'middleware' => ['role:doctor'], 'as' => 'doctor.'], function () {

        // Dashboard
        Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');

        // Patient Management (Doctor's Patients)
        Route::get('/patients', [DoctorController::class, 'myPatients'])->name('patients.index');
        Route::get('/patients/{patient}', [DoctorController::class, 'showPatient'])->name('patients.show');

        // Medical Records
        Route::resource('medical-records', MedicalRecordController::class);
        Route::post('/medical-records/{record}/sign', [MedicalRecordController::class, 'signRecord'])->name('medical-records.sign');

        // Appointments Management
        Route::resource('appointments', AppointmentController::class);
        Route::post('/appointments/{appointment}/confirm', [AppointmentController::class, 'confirm'])->name('appointments.confirm');
        Route::post('/appointments/{appointment}/reschedule', [AppointmentController::class, 'reschedule'])->name('appointments.reschedule');
        Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');

        // Schedule Management
        Route::get('/schedule', [DoctorController::class, 'schedule'])->name('schedule');
        Route::put('/schedule', [DoctorController::class, 'updateSchedule'])->name('schedule.update');
        Route::post('/schedule/availability', [DoctorController::class, 'setAvailability'])->name('schedule.availability');

        // Prescriptions
        Route::resource('prescriptions', DoctorController::class . '@prescriptionManagement');
        Route::post('/prescriptions/{prescription}/send', [DoctorController::class, 'sendPrescription'])->name('prescriptions.send');

        // Consultation Notes
        Route::resource('consultations', DoctorController::class . '@consultationManagement');

        // Doctor Reports
        Route::get('/reports', [ReportController::class, 'doctorReports'])->name('reports');
        Route::get('/reports/patients', [ReportController::class, 'myPatientReports'])->name('reports.patients');
        Route::get('/reports/appointments', [ReportController::class, 'appointmentReports'])->name('reports.appointments');

        // Professional Settings
        Route::get('/settings', [DoctorController::class, 'settings'])->name('settings');
        Route::put('/settings', [DoctorController::class, 'updateSettings'])->name('settings.update');
    });

    // ==========================================================================
    // PATIENT ROUTES (Level 5 - End User)
    // ==========================================================================
    Route::group(['prefix' => 'patient', 'middleware' => ['role:patient'], 'as' => 'patient.'], function () {

        // Dashboard
        Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('dashboard');

        // Profile & Medical History
        Route::get('/profile', [PatientController::class, 'profile'])->name('profile');
        Route::put('/profile', [PatientController::class, 'updateProfile'])->name('profile.update');
        Route::get('/medical-history', [PatientController::class, 'medicalHistory'])->name('medical-history');

        // Appointments
        Route::resource('appointments', PatientController::class . '@appointmentManagement');
        Route::get('/appointments/book/{doctor?}', [PatientController::class, 'bookAppointment'])->name('appointments.book');
        Route::post('/appointments/{appointment}/cancel', [PatientController::class, 'cancelAppointment'])->name('appointments.cancel');

        // Medical Records (View Only)
        Route::get('/medical-records', [PatientController::class, 'medicalRecords'])->name('medical-records.index');
        Route::get('/medical-records/{record}', [PatientController::class, 'showMedicalRecord'])->name('medical-records.show');
        Route::get('/medical-records/{record}/download', [PatientController::class, 'downloadMedicalRecord'])->name('medical-records.download');

        // Prescriptions
        Route::get('/prescriptions', [PatientController::class, 'prescriptions'])->name('prescriptions.index');
        Route::get('/prescriptions/{prescription}', [PatientController::class, 'showPrescription'])->name('prescriptions.show');
        Route::get('/prescriptions/{prescription}/download', [PatientController::class, 'downloadPrescription'])->name('prescriptions.download');

        // Test Results
        Route::get('/test-results', [PatientController::class, 'testResults'])->name('test-results.index');
        Route::get('/test-results/{result}', [PatientController::class, 'showTestResult'])->name('test-results.show');

        // Billing & Payments
        Route::get('/bills', [PatientController::class, 'bills'])->name('bills.index');
        Route::get('/bills/{bill}', [PatientController::class, 'showBill'])->name('bills.show');
        Route::post('/bills/{bill}/pay', [PatientController::class, 'payBill'])->name('bills.pay');

        // Health Records Export
        Route::get('/export/health-records', [PatientController::class, 'exportHealthRecords'])->name('export.health-records');

        // Emergency Contacts
        Route::resource('emergency-contacts', PatientController::class . '@emergencyContactManagement');

        // Feedback & Support
        Route::get('/feedback', [PatientController::class, 'feedback'])->name('feedback');
        Route::post('/feedback', [PatientController::class, 'submitFeedback'])->name('feedback.submit');
        Route::get('/support', [PatientController::class, 'support'])->name('support');
        Route::post('/support/ticket', [PatientController::class, 'createSupportTicket'])->name('support.ticket');
    });

    // ==========================================================================
    // SHARED ROUTES (Multiple Role Access)
    // ==========================================================================

    // Search functionality (available to all authenticated users)
    Route::get('/search', [UserController::class, 'search'])->name('search');

    // Notification Management (all users)
    Route::post('/notifications/{notification}/read', [UserController::class, 'markNotificationRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [UserController::class, 'markAllNotificationsRead'])->name('notifications.read-all');

    // File Downloads (with permission check)
    Route::get('/files/{file}/download', [UserController::class, 'downloadFile'])->name('files.download');

    // API Routes for AJAX calls
    Route::group(['prefix' => 'api/v1', 'as' => 'api.'], function () {
        Route::get('/doctors/availability/{doctor}', [DoctorController::class, 'getAvailability'])->name('doctors.availability');
        Route::get('/appointments/slots/{doctor}/{date}', [AppointmentController::class, 'getAvailableSlots'])->name('appointments.slots');
        Route::post('/notifications/check', [UserController::class, 'checkNotifications'])->name('notifications.check');
    });
});

// ==========================================================================
// ROLE-BASED REDIRECTS AFTER LOGIN
// ==========================================================================
Route::group(['middleware' => ['auth']], function () {
    Route::get('/redirect', function () {
        $user = auth()->user();

        switch ($user->role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'hospital':
                return redirect()->route('hospital.dashboard');
            case 'doctor':
                return redirect()->route('doctor.dashboard');
            case 'patient':
                return redirect()->route('patient.dashboard');
            default:
                return redirect()->route('dashboard');
        }
    })->name('redirect');
});

*/
