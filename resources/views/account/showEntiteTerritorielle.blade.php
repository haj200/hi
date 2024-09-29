
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
	<main class="content-wrap"></main>
		
        <div class="container-fluid  pt-4 px-4">
            <div class="bg-light p-4 rounded-top ">
                <h4 class="text-dark">Détails de l'Entité Territoriale</h4>
            </div>
        </div>
        
        <div class="card text-dark bg-light m-4">
            <div class="card-header">
                <h4 class="text-center">{{ $entiteTerritoriale->Nom }}</h4> 
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Nom (Français):</strong> <br> {{ $entiteTerritoriale->Nom }}</p>
                <p class="card-text"><strong>Nom (Arabe):</strong> <br> {{ $entiteTerritoriale->Nom_Ar }}</p>
                <p class="card-text"><strong>Type:</strong> <br> {{ ucfirst($entiteTerritoriale->type) }}</p>
                <p class="card-text"><strong>Gestionnaire:</strong> <br> {{ $entiteTerritoriale->manager->Nom_Fr }} {{ $entiteTerritoriale->manager->Prenom_Fr }} -------- {{ $entiteTerritoriale->manager->Nom_Ar }} {{ $entiteTerritoriale->manager->Prenom_Ar }}</p>
                <p class="card-text"><strong>Créé le:</strong> <br> {{ $entiteTerritoriale->created_at->format('d/m/Y') }}</p>
                <p class="card-text"><strong>Mis à jour le:</strong> <br> {{ $entiteTerritoriale->updated_at->format('d/m/Y') }}</p>
            </div>
        
            <!-- Table for listing Auxiliaires of this Entité Territoriale -->
            
        
            <div class="bg-light rounded card-footer d-flex justify-content-between">
                
                <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary m-4">Retour</a>
            </div>
        </div>
        
            
        </div>
        
        
		
		
		
	</main>
		
	
	
	
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


