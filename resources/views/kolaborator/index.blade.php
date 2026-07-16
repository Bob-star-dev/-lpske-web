@extends('layout.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="section-title">Tim Kolaborator Proyek</h1>
        <p class="lead mb-5 text-muted">Orang-orang luar biasa yang terlibat dalam pengembangan website LPSKE ini</p>
        
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mb-4" id="kolaboratorTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" 
                        id="smk2-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#smk2" 
                        type="button" 
                        role="tab" 
                        aria-controls="smk2" 
                        aria-selected="true">
                    SMK N 2 Surakarta
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" 
                        id="enuma-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#enuma" 
                        type="button" 
                        role="tab" 
                        aria-controls="enuma" 
                        aria-selected="false">
                    Enuma Technology
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" 
                        id="aslab-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#aslab" 
                        type="button" 
                        role="tab" 
                        aria-controls="aslab" 
                        aria-selected="false">
                    Asisten Laboratorium LPSKE
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" 
                        id="mersif-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#mersif" 
                        type="button" 
                        role="tab" 
                        aria-controls="mersif" 
                        aria-selected="false">
                    Mersiflab
                </button>
            </li>
        </ul>
        <!-- Tab Content -->
        <div class="tab-content" id="kolaboratorTabsContent">
            <!-- Developer Tab -->
            <div class="tab-pane fade show active" 
                 id="smk2" 
                 role="tabpanel" 
                 aria-labelledby="smk2-tab">
                <div class="row g-4">
                <div class="col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm hover-shadow transition-all">
        <div class="card-body text-center">
            <div class="mb-3">
                <img src="{{ asset('images/fael.jpeg') }}" alt="Foto Saya" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
            </div>
                                <h5 class="card-title">Zafael Felix Putra Kurniawan</h5>
                                <p class="text-muted mb-2">Kelas 12 PPLG B/SMK N 2 Surakarta</p>
                                <p>2025/2026</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm hover-shadow transition-all">
        <div class="card-body text-center">
            <div class="mb-3">
                <img src="{{ asset('images/rayhan.jpeg') }}" alt="Foto Saya" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
            </div>
                                <h5 class="card-title">Rayhan Hafidz Adrian</h5>
                                <p class="text-muted mb-2">Kelas 12 PPLG B/SMK N 2 Surakarta</p>
                                <p>2025/2026</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm hover-shadow transition-all">
        <div class="card-body text-center">
            <div class="mb-3">
                <img src="{{ asset('images/eyud.jpeg') }}" alt="Foto Saya" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
            </div>
                                <h5 class="card-title">Philipus Radittya Tri Rudianto</h5>
                                <p class="text-muted mb-2">Kelas 12 PPLG B/SMK N 2 Surakarta</p>
                                <p>2025/2026</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm hover-shadow transition-all">
        <div class="card-body text-center">
            <div class="mb-3">
                <img src="{{ asset('images/bobby.jpeg') }}" alt="Foto Saya" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
            </div>
                                <h5 class="card-title">Ganendra Boby Enza Anshori</h5>
                                <p class="text-muted mb-2">Kelas 12 PPLG A/SMK N 2 Surakarta</p>
                                <p>2025/2026</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm hover-shadow transition-all">
        <div class="card-body text-center">
            <div class="mb-3">
                <img src="{{ asset('images/bagas.jpg') }}" alt="Foto Saya" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
            </div>
                                <h5 class="card-title"> Angga Bagas Pratama</h5>
                                <p class="text-muted mb-2">Kelas 12 PPLG B/SMK N 2 Surakarta</p>
                                <p>2025/2026</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
            <!-- Designer Tab -->
            <div class="tab-pane fade" 
                 id="enuma" 
                 role="tabpanel" 
                 aria-labelledby="enuma-tab">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm hover-shadow transition-all">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <div class="rounded-circle bg-warning bg-gradient d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-palette text-white" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                                <h5 class="card-title">Nama Designer 1</h5>
                                <p class="text-muted mb-2">UI/UX Designer</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Supervisor Tab -->
            <div class="tab-pane fade" 
                 id="aslab" 
                 role="tabpanel" 
                 aria-labelledby="aslab-tab">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm hover-shadow transition-all">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <div class="rounded-circle bg-info bg-gradient d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-user-tie text-white" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                                <h5 class="card-title">Nama Supervisor 1</h5>
                                <p class="text-muted mb-2">Project Supervisor</p>
                              
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm hover-shadow transition-all">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <div class="rounded-circle bg-secondary bg-gradient d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-chalkboard-teacher text-white" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                                <h5 class="card-title">Nama Supervisor 2</h5>
                                <p class="text-muted mb-2">Technical Advisor</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
            <!-- Mersiflab Tab -->
            <div class="tab-pane fade" 
                 id="mersif" 
                 role="tabpanel" 
                 aria-labelledby="mersif-tab">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm hover-shadow transition-all">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <div class="rounded-circle bg-info bg-gradient d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-user-tie text-white" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                                <h5 class="card-title">Nama Supervisor 1</h5>
                                <p class="text-muted mb-2">Project Supervisor</p>
                             
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm hover-shadow transition-all">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <div class="rounded-circle bg-secondary bg-gradient d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-chalkboard-teacher text-white" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                                <h5 class="card-title">Nama Supervisor 2</h5>
                                <p class="text-muted mb-2">Technical Advisor</p>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Thank You Section -->
        <div class="mt-5 p-4 bg-light rounded-4">
            <div class="text-center">
                <h4 class="text-primary mb-3">
                    <i class="fas fa-heart text-danger me-2"></i>
                    Terima Kasih
                </h4>
                <p class="mb-0 text-muted">
                    Kepada semua pihak yang telah berkontribusi dalam pengembangan website LPSKE ini. 
                    Tanpa kerja sama dan dedikasi kalian, proyek ini tidak akan terwujud dengan baik.
                </p>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Add hover effects and smooth transitions
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.hover-shadow');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
@endpush

<style>
    .section-title {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .hover-shadow {
        transition: all 0.3s ease;
    }
    
    .hover-shadow:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    }
    
    .transition-all {
        transition: all 0.3s ease;
    }
    
    .nav-tabs .nav-link {
        color: var(--primary-color);
        border: none;
        border-bottom: 2px solid transparent;
        font-weight: 500;
    }
    
    .nav-tabs .nav-link.active {
        background-color: transparent;
        border-bottom-color: var(--primary-color);
        color: var(--primary-color);
    }
    
    .nav-tabs .nav-link:hover {
        border-bottom-color: var(--primary-color);
        color: var(--primary-color);
    }
</style>
@endsection
