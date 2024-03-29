
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
            <h1>Our Experience Doctors</h1>
        </div>
        <div class="row g-4">
            @foreach ($doctors as $doctor)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" style="width: 100%;height: 300px" src="storage/form-images/{{$doctor->image}}" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>{{$doctor->name}}</h5>
                        <p class="text-primary">{{$doctor->specialty}}</p>
                        <div class="team-social text-center">
                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
