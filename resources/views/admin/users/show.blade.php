<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AUxiliaire-DashboardAdmin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('welcome/images/favi.jpg')}}" type="image/gif" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/e04a0d333b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('dashboard/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('users/style.css')}}" rel="stylesheet">

    <link href="{{asset('users/css.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img src="{{asset('dashboard/img/logo.png')}}" alt="#">AUxiliaire</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('dashboard/img/logol.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">EN-NOURY Hajar</h6>
                        </h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href=" {{route('admin.dashboard')}}" class="nav-item nav-link   "><i class="fa fa-tachometer-alt me-2 "></i>Dashboard</a>
                    <a href="  " class="nav-item nav-link active "><i class="fa fa-user me-2"></i>Users</a>
                    <a href="{{route('entiteterritorielles.index')}}" class="nav-item nav-link  "><i class="fa-solid fa-book-atlas me-2"></i>Entités Territorielles</a>
                    <a href="{{route('auxiliaires.index')}} " class="nav-item nav-link  "><i class="fa-solid fa-users-line me-2"></i>Auxiliaire d'autorité</a>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">familles des auxiliaires</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('conjoints.index')}}" class="dropdown-item">Leurs Conjoints</a>
                            <a href="{{route('enfants.index')}}" class="dropdown-item">Leurs Enfants</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Exportation Exel</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('entiteterritorielles.export')}}" class="dropdown-item">Entités Territorielles</a>
                            <a href="{{route('users.export')}}" class="dropdown-item">Managers</a>
                            <a href="{{route('auxiliaires.export')}}" class="dropdown-item">Auxiliaires</a>
                            <a href="{{route('enfants.export')}}" class="dropdown-item"> Enfants</a>
                            <a href="{{route('conjoints.export')}}" class="dropdown-item">Conjoints</a>
                            <a href="{{route('auxiliaires.exportGlob')}}" class="dropdown-item">Exportation Globale</a>
                            <a href="{{route('auxiliaires.exportCard')}}" class="dropdown-item">Exportation Des Cartes</a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="{{asset('dashboard/img/logo.png')}}" alt="#"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form action="{{ route('search.index') }}" method="GET" class="d-none d-md-flex ms-4">
                    <input type="text" class="form-control bg-dark border-0" name="keyword" placeholder="Rechercher..." required>
                </form>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{asset('dashboard/img/logol.jpg')}}" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">EN-NOURY Hajar</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                            <a href="{{ route('admin.logout') }}" class="btn btn-primary m-2">Log out</a>
                        </div>
                    </div>
                </div>
            </nav>
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <h4>Détails de l'utilisateur</h4>
    </div>
</div>


    <div class="card text-white bg-dark mb-3 m-4">
        <div class="card-header">
            <h4 class="text-center">{{ $user->Nom_Fr }} {{ $user->Prenom_Fr }} -------------------- {{ $user->Nom_Ar }} {{ $user->Prenom_Ar }}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Informations Générales</h5>
            <div class="row mb-3">
                
                    <p class="card-text"><strong>Nom (Français):</strong> <br>{{ $user->Nom_Fr }}</p>
                    <p class="card-text"><strong>Prénom (Français):</strong> <br>{{ $user->Prenom_Ar }}</p>
                    <p class="card-text"><strong>Nom (Arabe):</strong><br> {{ $user->Nom_Ar }}</p>
                    <p class="card-text"><strong>Prénom (Arabe):</strong><br> {{ $user->Prenom_Ar }}</p>
                    <p class="card-text"><strong>Email:</strong> <br>{{ $user->email }}</p>
                    </div>
        </div>     
        
     <!-- Table for listing Auxiliaires created by this User -->
     <div class="card-body">
        <h5 class="card-title">Auxiliaires créés par cet utilisateur</h5>
        @if (count($auxiliaires))
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nom (Français)</th>
                    <th>Prénom (Français)</th>
                    <th>CNIE</th>
                    <th>Grade</th>
                    <th>Date de Naissance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($auxiliaires as $auxiliaire)
                <tr>
                    <td>{{ $auxiliaire->Nom_Fr }}</td>
                    <td>{{ $auxiliaire->Prenom_Fr }}</td>
                    <td>{{ $auxiliaire->CNIE }}</td>
                    <td>{{ $auxiliaire->Grade }}</td>
                    <td>{{ $auxiliaire->date_de_naissance }}</td>
                    <td>
                        <a href="{{ route('auxiliaires.show', $auxiliaire->id) }}" class="btn btn-primary btn-sm">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm">
                    {{ $auxiliaires->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
        </div>
        @else
        <p>aucun auxiliaire n'est crée par cet utilisateur.</p>
        @endif
        <div class="bg-secondary rounded-top p-4 d-flex justify-content-between">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Modifier</a>
            
            <a href="{{ route('users.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
        
    </div>
    </div>


            


            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">AUxiliaire.</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <!-- Footer Start -->



        <!-- Footer End -->

        <!-- Content End -->


        <!-- Back to Top -->
        
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('dashboard/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('dashboard/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('dashboard/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('dashboard/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dashboard/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('dashboard/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('dashboard/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('dashboard/js/main.js')}}"></script>
    <script src="{{asset('users/script.js')}}"></script>
</body>

</html>