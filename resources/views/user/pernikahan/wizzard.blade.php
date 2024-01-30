<div class="wizard-steps">
    <div class="wizard-step {{Request::segment(3) == 'step-one' ? 'wizard-step-active' : ''}}">
        <div class="wizard-step-icon">
            <i class="far fa-calendar"></i>
        </div>
        <div class="wizard-step-label">
            Jadwal
        </div>
    </div>
    <div class="wizard-step {{Request::segment(3) == 'step-two' ? 'wizard-step-active' : ''}}">
        <div class="wizard-step-icon">
            <i class="fas fa-box-open"></i>
        </div>
        <div class="wizard-step-label">
            Lokasi
        </div>
    </div>
    <div class="wizard-step {{Request::segment(3) == 'step-three' ? 'wizard-step-active' : ''}}">
        <div class="wizard-step-icon">
            <i class="fas fa-male"></i>
        </div>
        <div class="wizard-step-label">
            Calon Suami
        </div>
    </div>
    <div class="wizard-step {{Request::segment(3) == 'step-four' ? 'wizard-step-active' : ''}}">
        <div class="wizard-step-icon">
            <i class="fas fa-female"></i>
        </div>
        <div class="wizard-step-label">
            Calon Istri
        </div>
    </div>
    <div class="wizard-step {{Request::segment(3) == 'step-five' ? 'wizard-step-active' : ''}}">
        <div class="wizard-step-icon">
            <i class="fas fa-handshake"></i>
        </div>
        <div class="wizard-step-label">
            Wali Nikah
        </div>
    </div>
    <div class="wizard-step {{Request::segment(3) == 'step-six' ? 'wizard-step-active' : ''}}">
        <div class="wizard-step-icon">
            <i class="fas fa-file"></i>
        </div>
        <div class="wizard-step-label">
            Data Dokumen
        </div>
    </div>
</div>
