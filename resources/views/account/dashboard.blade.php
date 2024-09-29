
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
		
		<div class="ml-10 ">
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
		<button class="btn btn-info m-4">
		<h1 class="text-2xl font-bold"><a href="{{route('account.showEntiteTerritorielle')}}" ><strong class="mx-2">{{ $entiteTerritoriale->Nom }} --  {{ $entiteTerritoriale->Nom_Ar }}</strong></a></h1>
	</button>
	</div>
		
	<div class="content m-4">
		<h1 class="text-primary mb-4">Application de Gestion des Auxiliaires</h1>
		<p class="lead">Gérez facilement les autorités auxiliaires et leurs familles.</p>
		
		<h2 class="text-success p-4 mt-4 m-4">Fonctionnalités</h2>
		<ul class="list-group mb-4">
			<li class="list-group-item">Opérations CRUD pour les Auxiliaires, Enfants, et Conjoints</li>
			<li class="list-group-item">Fonctionnalité d'exportation en PDF et Excel</li>
			<li class="list-group-item">Fonction de recherche à travers les auxiliaires, enfants, et conjoints</li>
			<li class="list-group-item">Accès spécifique par utilisateur pour gérer ses propres enregistrements</li>
			<li class="list-group-item">Interface intuitive avec thème sombre</li>
		</ul>
	
		<div class="alert alert-info m-4" role="alert">
			Cette application est conçue pour automatiser la gestion des autorités auxiliaires dans la région de Taroudant. Elle permet la gestion facile des données personnelles, des dépendants, et la génération de rapports.
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


