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
    <link rel="icon" href="{{asset('welcome/images/favi.jpg')}}" type="image/gif" />
    <!-- Add this in your <head> section -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css'>
    <link rel="stylesheet" href="{{ asset('./user.css') }}">

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
                        <a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700 " href="{{route('account.dashboard')}}">Acceuil</a>
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
           
<div class="container m-4">
    <h1 class="mb-4">Créer un Auxiliaire</h1>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            Ajouter l'Auxiliaire
        </div>
        <div class="card-body">
            <form action="{{ route('account.auxiliaires.store') }}" method="POST" >
                @csrf

                <div class="mb-3">
                    <label for="Nom_Fr" class="form-label">Nom (Français)</label>
                    <input type="text" class="form-control" id="Nom_Fr" name="Nom_Fr" required>
                </div>

                <div class="mb-3">
                    <label for="Prenom_Fr" class="form-label">Prénom (Français)</label>
                    <input type="text" class="form-control" id="Prenom_Fr" name="Prenom_Fr" required>
                </div>

                <div class="mb-3">
                    <label for="Nom_Ar" class="form-label">Nom (Arabe)</label>
                    <input type="text" class="form-control" id="Nom_Ar" name="Nom_Ar" required>
                </div>

                <div class="mb-3">
                    <label for="Prenom_Ar" class="form-label">Prénom (Arabe)</label>
                    <input type="text" class="form-control" id="Prenom_Ar" name="Prenom_Ar" required>
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="Email" required>
                </div>

                <div class="mb-3">
                    <label for="Grade" class="form-label">Grade</label>
                    <input type="text" class="form-control" id="Grade" name="Grade" required>
                </div>

                <div class="mb-3">
                    <label for="CNIE" class="form-label">CNIE</label>
                    <input type="text" class="form-control" id="CNIE" name="CNIE" required>
                </div>

                <div class="mb-3">
                    <label for="url_photo" class="form-label">Photo</label>
                    <input type="text" class="form-control" id="url_photo" name="url_photo"   >
                </div>

                <div class="mb-3">
                    <label for="RIB" class="form-label">RIB</label>
                    <input type="text" class="form-control" id="RIB" name="RIB" required>
                </div>

                <div class="mb-3">
                    <label for="date_de_naissance" class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
                </div>

                <div class="mb-3">
                    <label for="date_de_recrutement" class="form-label">Date de Recrutement</label>
                    <input type="date" class="form-control" id="date_de_recrutement" name="date_de_recrutement" required>
                </div>

                <div class="mb-3">
                    <label for="Type" class="form-label">Type</label>
                    <select class="form-control" id="Type" name="Type" required>
                        <option value="rural">Rural</option>
                        <option value="urbain">Urbain</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="pensionne" class="form-label">Pensionné</label>
                    <select class="form-control" id="pensionne" name="pensionne" required>
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="entiteterritorielle_id" class="form-label">Entité Territoriale</label>
                    <input type="text" class="form-control" value="{{ $entiteTerritoriale->Nom }} - {{ $entiteTerritoriale->Nom_Ar }}" id="entiteterritorielle_id" readonly>
                    <input type="hidden" name="entiteterritorielle_id" value="{{ $entiteTerritoriale->id }}">
                </div>
                

                <button type="submit" class="btn btn-primary">Créer l'Auxiliaire</button>
            </form>
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
