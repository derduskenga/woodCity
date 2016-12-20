@extends('layouts.app')

@section('style')

@endsection

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cart</div>
                <div class="panel-body">
                
                
                



                     <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <img class="img-responsive" src="http://placehold.it/750x400" alt="">
                                <br>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img class="img-responsive" src="http://placehold.it/150x100" alt="">
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <img class="img-responsive" src="http://placehold.it/150x100" alt="">
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <img class="img-responsive" src="http://placehold.it/150x100" alt="">
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <img class="img-responsive" src="http://placehold.it/150x100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                       <div class="container-fluid">
                           
                           <div class="row">
                               Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                           sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                           magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                           quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                           ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                           dolor in hendrerit in vulputate velit esse molestie consequat,
                           vel illum dolore eu feugiat nulla facilisis at vero eros et
                           accumsan et iusto odio dignissim qui blandit praesent luptatum
                           zzril delenit augue duis dolore te feugait nulla facilisi.
                           Nam liber tempor cum soluta nobis eleifend option congue
                           nihil imperdiet doming id quod mazim placerat facer possim
                           assum. Typi non habent claritatem insitam; est usus legentis
                           in iis qui facit eorum claritatem. Investigationes
                           demonstraverunt lectores legere me lius quod ii legunt saepius.
                           Claritas est etiam processus dynamicus, qui sequitur mutationem
                           consuetudium lectorum. Mirum est notare quam littera gothica,
                           quam nunc putamus parum claram, anteposuerit litterarum formas
                           humanitatis per seacula quarta decima et quinta decima. Eodem
                           modo typi, qui nunc nobis videntur parum clari, fiant sollemnes
                           in futurum.
                           </div>
                       </div>
                        
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <div>[rating]</div>
                <div>
                    <br>
                    <p><b>Listed Price: </b>KES {{ $product->price }}</p>
                    <p><b>Our Price: </b>KES {{ $product->price }}</p>
                    <br>
                </div>
                
                <h3>Product Detainls</h3>
                <ul>
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>
                <div>
                    <br>
                    Quatity: <input class="" type="number" name="qty"/>
                    <br><br>
                    <button class="btn btn-primary">Add To Cart</button>
                    <button class="btn btn-default">Add To Wishlist</button>
                </div>
            </div>

        </div>
                
                
                
        

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
