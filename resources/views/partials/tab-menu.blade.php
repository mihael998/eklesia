<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('*/home') ? "active" : "" }}" id="home-tab" href="{{route('home')}}" role="tab">Chiesa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('*/incontri') ? "active" : "" }}" id="profile-tab" href="{{route('incontri')}}" role="tab">Incontri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('*/comunicazioni') ? "active" : "" }}" id="contact-tab" href="{{route('comunicazioni')}}" role="tab">Comunicazioni</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('*/eventi') ? "active" : "" }}" id="contact-tab" href="{{route('eventi')}}" role="tab">Eventi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('*/prediche') ? "active" : "" }}" id="contact-tab" href="{{route('prediche')}}" role="tab">Prediche</a>
    </li>
</ul>
<div class="tab-content bg-white px-5 py-3" id="myTabContent">
    {{$slot}}
</div>