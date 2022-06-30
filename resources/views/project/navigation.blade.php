@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item" aria-current="page">परियोजना </li>
        <li class="breadcrumb-item" aria-current="page">{{ $project->title ?? ''}} </li>
    </ol>
</nav>
@endsection

<div class="d-flex bg-white p-2 rounded justify-content-around">
    <div><a href="{{ route('project.show', $project) }}" class="btn z-depth-0 {{ Route::is('project.show') ? 'btn-primary' : 'btn-light' }}">परियोजना विवरण</a></div>
    <div><a href="{{ route('project.physical-progress.show', $project) }}" class="btn z-depth-0 {{ Route::is('project.physical-progress.show') ? 'btn-primary' : 'btn-light' }}">भौतिक प्रगति</a></div>
    <div><a href="{{ route('project.economic-progress.show', $project) }}" class="btn z-depth-0 {{ Route::is('project.economic-progress.show') ? 'btn-primary' : 'btn-light' }}">आर्थिक प्रगति</a></div>
    <div><a href="{{ route('project.acheivements.show', $project) }}" class="btn z-depth-0 {{ Route::is('project.acheivements.show') ? 'btn-primary' : 'btn-light' }}">उल्लेखनिए कार्यहरू</a></div>
    <div><a href="{{ route('project.photos.show', $project) }}" class="btn z-depth-0 {{ Route::is('project.photos.show') ? 'btn-primary' : 'btn-light' }}">योजनाका तस्बिरहरू</a></div>
</div>
