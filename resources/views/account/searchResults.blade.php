
<!DOCTYPE html>
<html lang="en" >
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
<link rel="stylesheet" href="{{asset('./user.css')}}">
<link rel="icon" href="{{asset('welcome/images/favi.jpg')}}" type="image/gif" />
<!-- Add this in your <head> section -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css'><link rel="stylesheet" href="{{asset('./user.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Component Start -->
<div class="flex flex-col w-screen h-screen overflow-auto text-gray-700 bg-gradient-to-tr from-blue-200 via-indigo-200 to-pink-200">
	<div class="flex items-center flex-shrink-0 w-full h-16 px-10 bg-white bg-opacity-75">
		<a href="{{route('account.logout')}}" onclick="return confirm('Êtes-vous sûr de vouloir se déconnecter ?')"><strong class="mx-2">logout</strong></a>
		
		<div class="ml-10">
            <a class="mx-2 text-sm font-semibold text-indingo-800 " href="{{route('account.dashboard')}}">Acceuil</a>
			<a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.auxiliaires.index')}}">Auxiliaires</a>
			<a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.enfants.index')}}">Enfants</a>
			<a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.conjoints.index')}}">Conjoints</a>
			<a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.auxiliaires.export')}}">Exporter Auxiliaires</a>
			<a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.enfants.export')}}">Exporter Enfants</a>
			<a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.conjoints.export')}}">Exporter Conjoints</a>
			<a class="mx-2 text-sm font-semibold text-gray-600 hover:text-indigo-700" href="{{route('account.auxiliaires.exportGlob')}}">Exportation Globale</a>
		</div>
		<buton class="flex items-center justify-center w-8 h-8 ml-auto overflow-hidden rounded-full cursor-pointer">
			<img src="{{asset('./welcome/images/userblue.webp')}}">
		</buton>
		
		<strong class="mx-2">{{ Auth::user()->Nom_Fr }} {{ Auth::user()->Prenom_Fr }}</strong>
	</div>
	<div class="px-10 mt-6">
		<button class="btn btn-info">
		<h1 class="text-2xl font-bold"><a href="{{route('account.showEntiteTerritorielle')}}" ><strong class="mx-2">{{ $entiteTerritoriale->Nom }} --  {{ $entiteTerritoriale->Nom_Ar }}</strong></a></h1>
	</button>
	</div>
		
	<div class="container p-4 my-4">
        <h1 class="text-dark m-4">Résultats de recherche pour "{{ request()->input('keyword') }}"</h1>
        <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary p-1 m-4">Retour</a>

        @php
            $noResults =  $auxiliaires->isEmpty()  && $enfants->isEmpty() && $conjoints->isEmpty();
        @endphp

        @if ($noResults)
            <div class="alert alert-danger" role="alert">
                Aucun résultat trouvé dans toutes les catégories.
            </div>
        @else
            

            <!-- Section pour les auxiliaires -->
            @if ($auxiliaires->isNotEmpty())
                
                <ul class="list-group mb-4">
                    <h4 class="bold text-dark m-4">Auxiliaires</h4>
                    @foreach ($auxiliaires as $auxiliaire)
                        <li class="list-group-item p-4 m-4">
                            {{ $auxiliaire->Nom_Fr }} {{ $auxiliaire->Prenom_Fr }} (CNIE: {{ $auxiliaire->CNIE }})
                            <a href="{{ route('account.auxiliaires.show', $auxiliaire->id) }}" class="btn btn-primary m-4 p-1">Voir</a>
                        </li>
                    @endforeach
                </ul>
            @endif

           

            <!-- Section pour les enfants -->
            @if ($enfants->isNotEmpty())
                
                <ul class="list-group mb-4 m-4">
                    <h4 class="bold text-dark">Enfants</h4>
                    @foreach ($enfants as $enfant)
                        <li class="list-group-item p-4 m-4">
                            {{ $enfant->Nom_Fr }} {{ $enfant->Prenom_Fr }}
                            <a href="{{ route('account.enfants.show', $enfant->id) }}" class="btn btn-primary m-4 p-1">Voir</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <!-- Section pour les conjoints -->
            @if ($conjoints->isNotEmpty())
                
                <ul class="list-group mb-4">
                    <h4 class="bold text-dark m-4">Conjoints</h4>
                    @foreach ($conjoints as $conjoint)
                        <li class="list-group-item p-4 m-4">
                            {{ $conjoint->Nom_Fr }} {{ $conjoint->Prenom_Fr }} (CNIE: {{ $conjoint->CNIE }})
                            <a href="{{ route('account.conjoints.show', $conjoint->id) }}" class="btn btn-primary m-4 p-1">Voir</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
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


