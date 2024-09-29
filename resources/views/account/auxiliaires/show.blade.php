<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AUxiliaire-UserDashboard</title>
    <style>
        .rotate-45 {
            --transform-rotate: 45deg;
            transform: rotate(45deg);
        }

        .group:hover .group-hover\:flex {
            display: flex;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{ asset('./user.css') }}">
    <!-- Add this in your <head> section -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css'>
    <link rel="stylesheet" href="{{ asset('./user.css') }}">
    <link rel="icon" href="{{asset('welcome/images/favi.jpg')}}" type="image/gif" />

</head>

<body>
    <!-- partial:index.partial.html -->
    <!-- Component Start -->
    <div
        class="flex flex-col w-screen h-screen overflow-auto text-gray-700 bg-gradient-to-tr from-blue-200 via-indigo-200 to-pink-200">
        <div class="flex items-center flex-shrink-0 w-full h-16 px-10 bg-white bg-opacity-75">
            <a href="{{ route('account.logout') }}"
                onclick="return confirm('Êtes-vous sûr de vouloir se déconnecter ?')"><strong
                    class="mx-2">logout</strong></a>

                    <div class="ml-10">
                        <a class="mx-2 text-sm font-semibold text-indingo-800  " href="{{route('account.dashboard')}}">Acceuil</a>
                        <a class="mx-2 text-sm font-semibold text-indingo-800" href="{{route('account.auxiliaires.index')}}">Auxiliaires</a>
                        <a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.enfants.index')}}">Enfants</a>
                        <a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.conjoints.index')}}">Conjoints</a>
                        <a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.auxiliaires.export')}}">Exporter Auxiliaires</a>
                        <a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.enfants.export')}}">Exporter Enfants</a>
                        <a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.conjoints.export')}}">Exporter Conjoints</a>
                        <a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.auxiliaires.exportGlob')}}">Exportation Globale</a>
                    </div>
            <buton class="flex items-center justify-center w-8 h-8 ml-auto overflow-hidden rounded-full cursor-pointer">
                <img src="{{ asset('./welcome/images/userblue.webp') }}">
            </buton>

            <strong class="mx-2">{{ Auth::user()->Nom_Fr }} {{ Auth::user()->Prenom_Fr }}</strong>
        </div>
        <div class="px-10 mt-6">
            <button class="btn btn-info">
                <h1 class="text-2xl font-bold"><a href="{{ route('account.showEntiteTerritorielle') }}"><strong
                            class="mx-2">{{ $entiteTerritoriale->Nom }} --
                            {{ $entiteTerritoriale->Nom_Ar }}</strong></a></h1>
            </button>
            <div class="container mt-5">
                <h1 class="text-center mb-5">Détails de l'Auxiliaire</h1>
            
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ $auxiliaire->Nom_Fr }} {{ $auxiliaire->Prenom_Fr }}</h5>
                    </div>
            
                    <div class="card-body bg-light">
                        <!-- Auxiliaire Details -->
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Email :</strong> {{ $auxiliaire->Email }}</p>
                                <p><strong>Grade :</strong> {{ $auxiliaire->Grade }}</p>
                                <p><strong>CNIE :</strong> {{ $auxiliaire->CNIE }}</p>
                                <p><strong>RIB :</strong> {{ $auxiliaire->RIB }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Date de Naissance :</strong> {{ \Carbon\Carbon::parse($auxiliaire->date_de_naissance)->format('d/m/Y') }}</p>
                                <p><strong>Date de Recrutement :</strong> {{ \Carbon\Carbon::parse($auxiliaire->date_de_recrutement)->format('d/m/Y') }}</p>
                                <p><strong>Type :</strong> {{ $auxiliaire->Type }}</p>
                                <p><strong>Pensionné :</strong> {{ $auxiliaire->pensionne ? 'Oui' : 'Non' }}</p>
                            </div>
                        </div>
            
                        <hr class="my-4">
            
                        <!-- User Information -->
                        <h5 class="mb-4">Informations de son recruteur:</h5>
                        <p><strong>Nom :</strong> {{ $user->Nom_Ar }} {{ $user->Prenom_Ar }} | {{ $user->Nom_Fr }} {{ $user->Prenom_Fr }}</p>
                        <p><strong>Email :</strong> {{ $user->email }}</p>
            
                        <hr class="my-4">
            
                        <!-- Enfants Section -->
                        <h5 class="mb-4">Enfants</h5>
                        @if($auxiliaire->enfants->isEmpty())
                            <p class="text-muted">Aucun enfant enregistré.</p>
                        @else
                            <table class="table table-hover table-bordered bg-white">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nom (Français)</th>
                                        <th>Prénom (Français)</th>
                                        <th>Nom (Arabe)</th>
                                        <th>Prénom (Arabe)</th>
                                        <th>Date de Naissance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($auxiliaire->enfants as $enfant)
                                        <tr>
                                            <td>{{ $enfant->Nom_Fr }}</td>
                                            <td>{{ $enfant->Prenom_Fr }}</td>
                                            <td>{{ $enfant->Nom_Ar }}</td>
                                            <td>{{ $enfant->Prenom_Ar }}</td>
                                            <td>{{ \Carbon\Carbon::parse($enfant->Date_De_Naissance)->format('d/m/Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <a href="{{ route('account.enfants.createKnownAux', ['auxiliaire_id' => $auxiliaire->id]) }}" class="btn btn-outline-success mb-4">Ajouter un Enfant</a>
            
                        <!-- Conjoints Section -->
                        <h5 class="mb-4">Conjoints</h5>
                        @if($auxiliaire->conjoints->isEmpty())
                            <p class="text-muted">Aucun conjoint enregistré.</p>
                        @else
                            <table class="table table-hover table-bordered bg-white">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nom (Français)</th>
                                        <th>Prénom (Français)</th>
                                        <th>Nom (Arabe)</th>
                                        <th>Prénom (Arabe)</th>
                                        <th>CNIE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($auxiliaire->conjoints as $conjoint)
                                        <tr>
                                            <td>{{ $conjoint->Nom_Fr }}</td>
                                            <td>{{ $conjoint->Prenom_Fr }}</td>
                                            <td>{{ $conjoint->Nom_Ar }}</td>
                                            <td>{{ $conjoint->Prenom_Ar }}</td>
                                            <td>{{ $conjoint->CNIE }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <a href="{{ route('account.conjoints.createKnownAux', ['auxiliaire_id' => $auxiliaire->id]) }}" class="btn btn-outline-success mb-4">Ajouter un Conjoint</a>
                    </div>
            
                    <div class="card-footer bg-light text-right">
                        <a href="{{ route('account.auxiliaires.index') }}" class="btn btn-primary m-4">Retourner à la liste des Auxiliaires</a>
                    </div>
                </div>
            </div>
            
            
            <!-- Component End -->

            <div class="fixed bottom-0 m-4 p-4 right-0 flex items-center justify-center h-8 pl-1 pr-2 mb-6 mr-4 text-blue-100 bg-blue-600 rounded-full shadow-lg hover:bg-blue-600">
                <form action="{{ route('account.search.index') }}" method="GET" >
                    <input type="text" class="ml-1 text-sm leading-none btn m-2 p-1" style="cursor: default;" name="keyword" placeholder="recherche" required>
                </form>
                </div>
            <!-- partial -->

</body>

</html>
