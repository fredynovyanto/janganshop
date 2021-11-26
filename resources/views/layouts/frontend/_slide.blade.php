<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="{{asset('storage/1.jpg')}}" class="d-block w-100" alt="" srcset="">
            <div class="carousel-caption text-center">
                <h1 style="font-size:5vw;">Welcome To JanganShop</h1>
                <h4 style="font-size:1,5vw;">Melayani Semuanya Walaupun Permintaannya Aneh-Aneh</h4>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('storage/2.jpg')}}" class="d-block w-100" alt="" srcset="">
        </div>
        <div class="carousel-item">
            <img src="{{asset('storage/3.jpg')}}" class="d-block w-100" alt="" srcset="">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>